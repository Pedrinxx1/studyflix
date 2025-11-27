<?php
include __DIR__ . '/db_config.php';

header('Content-Type: application/json; charset=utf-8');

try {
    // SELECIONA O display_name em vez do username (email)
    $sql = "SELECT display_name, total_correct, total_attempted 
            FROM user_scores 
            ORDER BY total_correct DESC, total_attempted ASC 
            LIMIT 100"; 
            
    $stmt = $conn->query($sql);

    $ranking = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($ranking);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Erro ao carregar ranking: ' . $e->getMessage()]);
}

$conn = null; 
?>