<?php
require_once 'db_config.php';

try {
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);
    
    if (!isset($data['question_id']) || !isset($data['answer'])) {
        http_response_code(400);
        echo json_encode(['error' => 'Dados incompletos']);
        exit();
    }
    
    $questionId = $data['question_id'];
    $userAnswer = strtolower($data['answer']);
    $userId = isset($data['user_id']) ? $data['user_id'] : 'guest';
    
    // Buscar questão
    $filter = ['question_id' => $questionId];
    $query = new MongoDB\Driver\Query($filter);
    $cursor = $mongoClient->executeQuery($dbName . '.questions', $query);
    $questions = $cursor->toArray();
    
    if (empty($questions)) {
        http_response_code(404);
        echo json_encode(['error' => 'Questão não encontrada']);
        exit();
    }
    
    $question = $questions[0];
    $correctOption = strtolower($question->correct_option);
    $isCorrect = ($userAnswer === $correctOption);
    
    // Salvar resposta
    $answerRecord = [
        'answer_id' => uniqid('ans_', true),
        'user_id' => $userId,
        'question_id' => $questionId,
        'answer' => $userAnswer,
        'is_correct' => $isCorrect,
        'timestamp' => date('c')
    ];
    
    $bulk = new MongoDB\Driver\BulkWrite;
    $bulk->insert($answerRecord);
    $mongoClient->executeBulkWrite($dbName . '.answers', $bulk);
    
    // Atualizar estatísticas
    $userFilter = ['user_id' => $userId];
    $userQuery = new MongoDB\Driver\Query($userFilter);
    $userCursor = $mongoClient->executeQuery($dbName . '.user_stats', $userQuery);
    $users = $userCursor->toArray();
    
    $bulkStats = new MongoDB\Driver\BulkWrite;
    
    if (empty($users)) {
        $bulkStats->insert([
            'user_id' => $userId,
            'username' => 'Usuário ' . substr($userId, 0, 8),
            'total_attempted' => 1,
            'total_correct' => $isCorrect ? 1 : 0,
            'last_updated' => date('c')
        ]);
    } else {
        $user = $users[0];
        $bulkStats->update(
            ['user_id' => $userId],
            ['$set' => [
                'total_attempted' => $user->total_attempted + 1,
                'total_correct' => $user->total_correct + ($isCorrect ? 1 : 0),
                'last_updated' => date('c')
            ]]
        );
    }
    
    $mongoClient->executeBulkWrite($dbName . '.user_stats', $bulkStats);
    
    echo json_encode([
        'is_correct' => $isCorrect,
        'correct_option' => $correctOption
    ]);
    
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Erro: ' . $e->getMessage()]);
}
?>