<?php
// api/submit_answer.php
header('Content-Type: application/json; charset=utf-8');
include __DIR__ . '/db_config.php';

// CRÍTICO: Garante que a variável de conexão correta ($pdo) seja usada
$db = $pdo ?? null;

if (!$db) {
    http_response_code(500);
    echo json_encode(['error' => 'Erro interno: Conexão com o banco não disponível.']);
    exit;
}

$input = file_get_contents('php://input');
$data = json_decode($input, true);

// A validação de dados é crucial para evitar o Erro 400
if (!isset($data['question_id'], $data['answer'], $data['user_id'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Dados incompletos: Faltando question_id, answer ou user_id.']);
    exit();
}

$question_id = $data['question_id'];
$user_answer = $data['answer'];
$user_id = $data['user_id']; 

try {
    // 1. Inicia transação
    $db->beginTransaction(); 

    // 2. Busca a resposta correta
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
    
    // 3. PostgreSQL UPSERT: Garante que o usuário existe e atualiza a pontuação
    // Usaremos 'username' como a chave de conflito, assim como no save_score.php.
    $username = ($user_id === 'guest') ? 'Visitante' : $user_id;
    
    $sql_upsert = "INSERT INTO user_scores (username, total_attempted, total_correct, display_name) 
                   VALUES (?, 1, ?, ?)
                   ON CONFLICT (username) DO UPDATE 
                   SET total_attempted = user_scores.total_attempted + 1,
                       total_correct = user_scores.total_correct + ?,
                       display_name = EXCLUDED.display_name"; // Atualiza o display_name se for o caso
    
    $stmt = $db->prepare($sql_upsert);
    
    // Os binds agora são para: INSERT (username, 1, is_correct_int, display_name), UPDATE (is_correct_int)
    $stmt->execute([
        $username,           // 1. INSERT username
        $is_correct_int,     // 2. INSERT total_correct
        $username,           // 3. INSERT display_name (usando username como display_name inicial)
        $is_correct_int      // 4. UPDATE total_correct (EXCLUDED.display_name pega o valor do INSERT)
    ]);
    
    $db->commit(); // Confirma transação

    // 4. Retorna o resultado
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
    echo json_encode(['error' => 'Erro interno do servidor ao salvar resposta: ' . $e->getMessage()]);
}

$db = null; // Fecha a conexão
?>