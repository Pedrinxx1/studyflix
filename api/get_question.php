<?php
require_once '../db_config.php';
session_start();

// O ID do usuário logado será usado para pular questões já respondidas
$user_id = $_SESSION['user_id'] ?? 1; // Usando 1 para teste temporário

if (!isset($_GET['area'])) {
    http_response_code(400);
    die(json_encode(['error' => 'Área da questão não especificada.']));
}

$area = $_GET['area'];

try {
    $pdo = getDbConnection();
    
    // Busca uma questão aleatória que não foi respondida por este usuário
    $stmt = $pdo->prepare("
        SELECT q.question_id, q.enunciado, q.option_a, q.option_b, q.option_c, q.option_d, q.option_e
        FROM questions q
        LEFT JOIN user_answers ua ON q.question_id = ua.question_id AND ua.user_id = ?
        WHERE q.area = ? AND ua.answer_id IS NULL
        ORDER BY RANDOM()
        LIMIT 1
    ");
    
    $stmt->execute([$user_id, $area]);
    $question = $stmt->fetch();

    header('Content-Type: application/json');
    if ($question) {
        echo json_encode($question);
    } else {
        // Mensagem de sucesso se o usuário respondeu todas
        echo json_encode(['error' => 'Parabéns! Você respondeu todas as questões desta área!']);
    }

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Erro ao buscar questão: ' . $e->getMessage()]);
}
?>