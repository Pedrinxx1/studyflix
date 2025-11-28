<?php
// api/get_ranking.php
header('Content-Type: application/json; charset=utf-8');

// Inclui a conexão (deve funcionar agora com as credenciais corretas)
include 'db_config.php'; 

$db = $pdo ?? null;

if (!$db) {
    // Retorna JSON limpo se db_config.php falhou antes de $pdo ser criado
    http_response_code(500);
    echo json_encode(['error' => 'Erro interno: Variável de conexão com o banco não disponível.']);
    exit;
}

try {
    // Query PostgreSQL: Tabela user_scores
    $sql = "SELECT username, display_name, total_correct, total_attempted 
            FROM user_scores 
            ORDER BY total_correct DESC, total_attempted DESC, last_session_date DESC 
            LIMIT 10";

    $stmt = $db->prepare($sql);
    $stmt->execute();
    $ranking_data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Retorna o JSON limpo do ranking
    echo json_encode($ranking_data);

} catch (PDOException $e) {
    // Retorna JSON de erro limpo em caso de falha na query SQL
    http_response_code(500);
    echo json_encode(['error' => 'Erro ao carregar ranking. Detalhe: ' . $e->getMessage()]);
}
?>