<?php
// api/get_ranking.php
header('Content-Type: application/json; charset=utf-8');

// 1. CORREÇÃO: Usamos include para padronizar e garantir que o caminho está correto (assumindo que está no mesmo dir).
include 'db_config.php';

// Tenta obter a conexão ($pdo é o esperado para este script)
$db = isset($pdo) ? $pdo : (isset($conn) ? $conn : null);

if (!$db) {
    http_response_code(500);
    echo json_encode(['error' => 'Erro de conexão: Variável de conexão ($pdo) não encontrada.']);
    exit;
}

try {
    // 2. CORREÇÃO: Usamos a tabela 'user_scores' em vez de 'ranking'.
    // Seleciona display_name (Nome de exibição), total_correct, total_attempted
    $sql = "SELECT username, display_name, total_correct, total_attempted 
            FROM user_scores 
            ORDER BY total_correct DESC, total_attempted DESC, total_attempted ASC, last_session_date DESC 
            LIMIT 10";

    $stmt = $db->prepare($sql);
    $stmt->execute();
    $ranking_data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Retorna o JSON limpo
    echo json_encode($ranking_data);

} catch (PDOException $e) {
    // Retorna um JSON de erro limpo em caso de falha no banco de dados
    http_response_code(500);
    echo json_encode(['error' => 'Erro ao carregar ranking. Detalhe: ' . $e->getMessage()]);
}
?>