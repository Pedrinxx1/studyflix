<?php
// api/get_ranking.php
header('Content-Type: application/json; charset=utf-8'); // Retornando para JSON

include 'db_config.php'; 

$db = $pdo ?? null;

if (!$db) {
    http_response_code(500);
    echo json_encode(['error' => 'Erro interno: A conexão com o banco não foi estabelecida.']);
    exit;
}

try {
    // CORREÇÃO CRÍTICA: Removido o last_session_date da query
    // Motivo: O nome da coluna provavelmente não é todo minúsculo ou não existe.
    // Para resolver imediatamente e garantir o ranking, vamos remover a coluna
    // que está causando a falha.
    $sql = "SELECT username, display_name, total_correct, total_attempted 
            FROM user_scores 
            ORDER BY total_correct DESC, total_attempted DESC
            LIMIT 10";

    $stmt = $db->prepare($sql);
    $stmt->execute();
    $ranking_data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $db = null; // Fecha a conexão

    // Retorna o JSON limpo do ranking
    echo json_encode($ranking_data);

} catch (PDOException $e) {
    // Se a query SQL falhar (agora menos provável), retorna JSON de erro limpo
    http_response_code(500);
    echo json_encode(['error' => 'Erro ao executar a query no banco de dados. Detalhe: ' . $e->getMessage()]);
}
?>