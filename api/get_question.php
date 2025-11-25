<?php
require_once 'db_config.php';

try {
    $area = isset($_GET['area']) ? $_GET['area'] : 'Natureza';
    
    $filter = ['area' => $area];
    $query = new MongoDB\Driver\Query($filter);
    $cursor = $mongoClient->executeQuery($dbName . '.questions', $query);
    $questions = $cursor->toArray();
    
    if (empty($questions)) {
        http_response_code(404);
        echo json_encode(['error' => 'Nenhuma questão encontrada para: ' . $area]);
        exit();
    }
    
    $randomQuestion = $questions[array_rand($questions)];
    
    echo json_encode([
        'question_id' => (string) $randomQuestion->question_id,
        'area' => $randomQuestion->area,
        'enunciado' => $randomQuestion->enunciado,
        'option_a' => $randomQuestion->option_a,
        'option_b' => $randomQuestion->option_b,
        'option_c' => $randomQuestion->option_c,
        'option_d' => $randomQuestion->option_d,
        'option_e' => isset($randomQuestion->option_e) ? $randomQuestion->option_e : null,
        'correct_option' => $randomQuestion->correct_option
    ], JSON_UNESCAPED_UNICODE);
    
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Erro: ' . $e->getMessage()]);
}
?>