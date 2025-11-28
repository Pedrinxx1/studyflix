<?php
// api/get_ranking.php
header('Content-Type: application/json; charset=utf-8');

require_once 'db_config.php';

try {
    // CORREÇÃO: Certifique-se de selecionar o campo 'display_name'
    $sql = "SELECT username, display_name, total_correct, total_attempted 
            FROM ranking 
            ORDER BY total_correct DESC, total_attempted DESC, last_session_date DESC 
            LIMIT 10";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $ranking_data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($ranking_data);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Erro ao carregar ranking: ' . $e->getMessage()]);
}
?>