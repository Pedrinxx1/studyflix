<?php
header('Content-Type: application/json; charset=utf-8');
include 'db_config.php';

$input = file_get_contents('php://input');
$data = json_decode($input, true);

if (!isset($data['question_id'], $data['answer'], $data['user_id'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Dados incompletos fornecidos.']);
    exit();
}

$question_id = $data['question_id'];
$user_answer = $data['answer'];
$user_id = $data['user_id']; 

try {
    $conn->beginTransaction(); // Inicia transação

    // 1. Busca a resposta correta
    $stmt = $conn->prepare("SELECT correct_option FROM questions WHERE question_id = ?");
    $stmt->execute([$question_id]);
    $question_data = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt = null; 

    if (!$question_data) {
        http_response_code(404);
        echo json_encode(['error' => 'Questão não encontrada.']);
        $conn = null;
        exit();
    }

    $correct_option = $question_data['correct_option'];
    $is_correct = (strtolower($user_answer) === strtolower($correct_option));
    $is_correct_int = $is_correct ? 1 : 0;
    
    // 2. PostgreSQL UPSERT: Garante que o usuário existe e atualiza a pontuação
    $username = ($user_id === 'guest') ? 'Visitante' : $user_id;

    $sql_upsert = "INSERT INTO user_scores (user_id, username, total_attempted, total_correct) 
                   VALUES (?, ?, 1, ?)
                   ON CONFLICT (user_id) DO UPDATE 
                   SET total_attempted = user_scores.total_attempted + 1,
                       total_correct = user_scores.total_correct + ?
                   WHERE user_scores.user_id = ?"; // Necessário para evitar que a atualização afete todos os registros.
    
    $stmt = $conn->prepare($sql_upsert);
    $stmt->execute([$user_id, $username, $is_correct_int, $is_correct_int, $user_id]);
    $stmt = null;
    
    $conn->commit(); // Confirma transação

    // 3. Retorna o resultado
    echo json_encode([
        'is_correct' => $is_correct,
        'correct_option' => $correct_option,
        'message' => $is_correct ? 'Correto!' : 'Incorreto.'
    ]);

} catch (PDOException $e) {
    if ($conn->inTransaction()) {
        $conn->rollBack(); 
    }
    http_response_code(500);
    echo json_encode(['error' => 'Erro interno do servidor ao salvar resposta: ' . $e->getMessage()]);
}

$conn = null;
?>