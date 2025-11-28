<?php
// api/get_ranking.php

// BLOCO DE SEGURANÇA CONTRA ERROS HTML
ini_set('display_errors', 0);
error_reporting(E_ALL);
header('Content-Type: application/json; charset=utf-8');

try {
    if (!file_exists(__DIR__ . '/db_config.php')) {
        throw new Exception("Arquivo db_config.php não encontrado.");
    }
    require_once __DIR__ . '/db_config.php';

    $db = isset($conn) ? $conn : (isset($pdo) ? $pdo : null);
    if (!$db) {
        throw new Exception("Conexão com banco de dados falhou.");
    }

    // --- A QUERY DO RANKING: Seleciona display_name ---
    $sql = "SELECT 
                username, 
                COALESCE(display_name, username) as display_name, 
                total_correct, 
                total_attempted 
            FROM user_scores 
            ORDER BY total_correct DESC, total_attempted ASC 
            LIMIT 50";

    $stmt = $db->prepare($sql);
    $stmt->execute();
    
    $ranking_data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($ranking_data);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        "error" => true,
        "message" => $e->getMessage()
    ]);
}
?>