<?php
// api/get_ranking.php - Versão de Diagnóstico de Query

// MUDANÇA CRÍTICA: Retorna texto simples para não falhar o JSON no navegador
header('Content-Type: text/plain; charset=utf-8'); 

// Inclui a conexão (que sabemos que funciona)
include 'db_config.php'; 

$db = $pdo ?? null;

if (!$db) {
    die("ERRO 1: A variável \$pdo não foi definida corretamente em db_config.php.");
}

try {
    echo "Conexão com \$pdo bem-sucedida. Tentando Query...\n\n";

    $sql = "SELECT username, display_name, total_correct, total_attempted 
            FROM user_scores 
            ORDER BY total_correct DESC, total_attempted DESC, last_session_date DESC 
            LIMIT 10";

    // Executa a query
    $stmt = $db->prepare($sql);
    $stmt->execute();
    
    // Se chegou até aqui, a query está OK.
    $ranking_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Altera o cabeçalho para JSON e imprime o resultado
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($ranking_data);
    
} catch (PDOException $e) {
    // ⬇️ ESTA É A MENSAGEM QUE EU PRECISO! ⬇️
    header('Content-Type: text/plain; charset=utf-8', true, 500); 
    die("ERRO 2 - FALHA NA QUERY:\n\n" . $e->getMessage());
}
?>