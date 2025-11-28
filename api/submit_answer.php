<?php
// api/submit_answer.php - CÓDIGO FINAL CORRIGIDO
header('Content-Type: application/json; charset=utf-8');
include __DIR__ . '/db_config.php';

// Certifique-se de que $pdo está disponível via db_config.php
$db = $pdo ?? null;

if (!$db) {
    http_response_code(500);
    echo json_encode(['error' => 'Erro interno: Conexão com o banco não disponível. Verifique db_config.php.']);
    exit;
}

// Recebe dados como JSON
$input = file_get_contents('php://input');
$data = json_decode($input, true);

// Validação dos dados críticos
if (!isset($data['question_id'], $data['answer'], $data['user_id'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Dados incompletos: Faltando question_id, answer ou user_id.']);
    exit();
}

$question_id = $data['question_id'];
$user_answer = $data['answer'];
$user_id = $data['user_id']; 

try {
    $db->beginTransaction(); 

    // 1. Busca a resposta correta
    $stmt = $db->prepare("SELECT correct_option FROM questions WHERE question_id = ?");
    $stmt->execute([$question_id]);
    $question_data = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$question_data) {
        http_response_code(404);
        echo json_encode(['error' => 'Questão não encontrada no banco de dados.']);
        $db = null;
        exit();
    }

    $correct_option = $question_data['correct_option'];
    $is_correct = (strtolower($user_answer) === strtolower($correct_option));
    $is_correct_int = $is_correct ? 1 : 0;
    
    // 2. PostgreSQL UPSERT: Atualiza a pontuação
    // O valor de $user_id (ex: guest_12345) é o ID vindo do frontend.
    $username_value = ($user_id === 'guest') ? 'Visitante' : $user_id; 

    // 🚨 CORREÇÃO: A query inclui 'user_id' para resolver o erro NOT NULL violation (23502)
    $sql_upsert = "INSERT INTO user_scores (user_id, username, total_attempted, total_correct, display_name) 
                   VALUES (?, ?, 1, ?, ?)
                   ON CONFLICT (username) DO UPDATE 
                   SET total_attempted = user_scores.total_attempted + 1,
                       total_correct = user_scores.total_correct + ?,
                       display_name = EXCLUDED.display_name";

    $stmt = $db->prepare($sql_upsert);

    $stmt->execute([
        $user_id,             // 1. INSERT user_id (Valor bruto do ID)
        $username_value,      // 2. INSERT username (Chave de conflito e ID/Visitante)
        $is_correct_int,      // 3. INSERT total_correct
        $username_value,      // 4. INSERT display_name
        $is_correct_int       // 5. UPDATE total_correct (valor a ser adicionado)
    ]);

    $db->commit(); // Confirma transação

    // 3. Retorna o resultado
    echo json_encode([
        'is_correct' => $is_correct,
        'correct_option' => $correct_option,
        'message' => $is_correct ? 'Correto!' : 'Incorreto.'
    ]);

} catch (PDOException $e) {
    if ($db->inTransaction()) {
        $db->rollBack(); 
    }
    http_response_code(500);
    // Retorna o erro SQL detalhado
    echo json_encode(['error' => 'Erro SQL ao salvar resposta: ' . $e->getMessage()]);
}

$db = null;
?>