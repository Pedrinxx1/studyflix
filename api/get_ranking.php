<?php
// TENTA FORÇAR RESPOSTA JSON EM CASO DE ERRO FATAL (Início do Script)
set_error_handler(function ($errno, $errstr, $errfile, $errline) {
    if (!(error_reporting() & $errno)) {
        return false;
    }
    header('Content-Type: application/json', true, 500);
    echo json_encode(['error' => "Erro no servidor PHP (Código: {$errno}): {$errstr} na linha {$errline} de {$errfile}"]);
    exit(1);
});

header('Content-Type: application/json; charset=utf-8');

// 🚨 Incluir o arquivo de configuração de conexão
include __DIR__ . '/db_config.php';

try {
    $sql = "SELECT username, total_correct, total_attempted 
            FROM user_scores 
            ORDER BY total_correct DESC, total_attempted ASC 
            LIMIT 100";
            
    $stmt = $conn->query($sql);

    $ranking = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($ranking);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Erro ao carregar ranking (PDO): ' . $e->getMessage()]);
}

$conn = null; 
?>