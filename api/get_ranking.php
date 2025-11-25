<?php
header('Content-Type: application/json; charset=utf-8');
include 'db_config.php';

try {
    $sql = "SELECT username, total_correct, total_attempted 
            FROM user_scores 
            ORDER BY total_correct DESC, total_attempted ASC 
            LIMIT 100";
            
    $stmt = $conn->query($sql);

    // Busca todos os resultados como array associativo
    $ranking = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($ranking);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Erro ao carregar ranking: ' . $e->getMessage()]);
}

$conn = null; 
?>