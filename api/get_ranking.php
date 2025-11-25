<?php
require_once 'db_config.php';

try {
    $query = new MongoDB\Driver\Query(
        [],
        ['sort' => ['total_correct' => -1], 'limit' => 100]
    );
    
    $cursor = $mongoClient->executeQuery($dbName . '.user_stats', $query);
    
    $ranking = [];
    foreach ($cursor as $user) {
        $ranking[] = [
            'user_id' => $user->user_id,
            'username' => $user->username,
            'total_correct' => $user->total_correct,
            'total_attempted' => $user->total_attempted
        ];
    }
    
    echo json_encode($ranking, JSON_UNESCAPED_UNICODE);
    
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Erro: ' . $e->getMessage()]);
}
?>