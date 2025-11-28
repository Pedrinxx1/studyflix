<?php
// api/submit_answer.php - COM BLOQUEIO DE CONVIDADO E ASSOCIAÇÃO DE NOME
header('Content-Type: application/json; charset=utf-8');
include __DIR__ . '/db_config.php';

$db = $pdo ?? null;

if (!$db) {
    http_response_code(500);
    echo json_encode(['error' => 'Erro interno: Conexão com o banco não disponível.']);
    exit;
}

// Recebe dados como JSON
$input = file_get_contents('php://input');
$data = json_decode($input, true);

if (!isset($data['question_id'], $data['answer'], $data['user_id'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Dados incompletos.']);
    exit();
}

$question_id = $data['question_id'];
$user_answer = $data['answer'];
$user_id = $data['user_id']; // Esperamos receber o email aqui

// 🚨 BLOQUEIO CRÍTICO: Rejeita se o user_id for um ID de convidado ou vazio.
if (empty($user_id) || str_starts_with($user_id, 'guest_')) {
    http_response_code(403); // Proibido
    echo json_encode(['error' => 'Acesso negado. É necessário estar logado para salvar a pontuação.']);
    exit();
}

try {
    $db->beginTransaction(); 

    // 1. Busca a resposta correta
    $stmt = $db->prepare("SELECT correct_option FROM questions WHERE question_id = ?");
    $stmt->execute([$question_id]);
    $question_data = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$question_data) {
        http_response_code(404);
        echo json_encode(['error' => 'Questão não encontrada no banco de dados.']);
        $db->rollBack();
        exit();
    }

    $correct_option = $question_data['correct_option'];
    $is_correct = (strtolower($user_answer) === strtolower($correct_option));
    $is_correct_int = $is_correct ? 1 : 0;
    
    // 2. Busca o nome real (display_name)
    // 🚨 AJUSTE ESTA QUERY para a sua tabela de usuários e colunas (se necessário)!
    $stmt_name = $db->prepare("SELECT nome_completo FROM users WHERE email = ?");
    $stmt_name->execute([$user_id]);
    $user_data = $stmt_name->fetch(PDO::FETCH_ASSOC);

    // Usa o nome real do banco. Se não encontrar (erro), usa o email como fallback.
    $display_name_value = $user_data['nome_completo'] ?? $user_id; 

    
    // 3. PostgreSQL UPSERT: user_id e username são o email do usuário.
    // Isso resolve o erro NOT NULL e associa a pontuação ao email.
    $sql_upsert = "INSERT INTO user_scores (user_id, username, total_attempted, total_correct, display_name) 
                   VALUES (?, ?, 1, ?, ?)
                   ON CONFLICT (username) DO UPDATE 
                   SET total_attempted = user_scores.total_attempted + 1,
                       total_correct = user_scores.total_correct + ?,
                       display_name = EXCLUDED.display_name"; // Mantém o nome de exibição mais recente do INSERT

    $stmt = $db->prepare($sql_upsert);

    $stmt->execute([
        $user_id,             // 1. INSERT user_id (Email)
        $user_id,             // 2. INSERT username (Email - Chave Única para CONFLICT)
        $is_correct_int,      // 3. INSERT total_correct
        $display_name_value,  // 4. INSERT display_name (Nome Real)
        $is_correct_int       // 5. UPDATE total_correct
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
    echo json_encode(['error' => 'Erro SQL ao salvar resposta: ' . $e->getMessage()]);
}

$db = null;
?>