<?php
// api/get_ranking.php
header('Content-Type: application/json; charset=utf-8');

// Inclui a conexão. Se db_config.php falhar, o script para aqui.
include 'db_config.php'; 

// CRÍTICO: db_config.php deve ter definido $pdo
$db = $pdo ?? null;

if (!$db) {
    // Se a conexão falhou no db_config.php (e ele não deu die()), retorna um JSON limpo 500.
    // Na maioria dos casos de Erro 500, o PHP falha ANTES de chegar nesta linha.
    http_response_code(500);
    echo json_encode(['error' => 'Erro interno: A conexão com o banco não foi estabelecida. Verifique db_config.php e logs do servidor.']);
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

    // Fecha a conexão (libera recursos)
    $db = null;

    // Retorna o JSON limpo do ranking
    echo json_encode($ranking_data);

} catch (PDOException $e) {
    // Se a query SQL falhar, retorna JSON de erro limpo
    http_response_code(500);
    echo json_encode(['error' => 'Erro ao executar a query no banco de dados. Detalhe: ' . $e->getMessage()]);
}
?>