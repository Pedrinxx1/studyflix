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

$area = $_GET['area'] ?? 'Natureza';

try {
    // CORREÇÃO SQL: Usa LOWER() para comparação case-insensitive
    $sql = "SELECT question_id, enunciado, option_a, option_b, option_c, option_d, option_e 
            FROM questions 
            WHERE LOWER(area) = LOWER(?) 
            ORDER BY RANDOM() 
            LIMIT 1";
            
    $stmt = $conn->prepare($sql);
    $stmt->execute([$area]); // Executa com o parâmetro

    if ($stmt->rowCount() > 0) {
        $question = $stmt->fetch(PDO::FETCH_ASSOC); 
        echo json_encode($question);
    } else {
        http_response_code(404); // Retorna 404 se não houver dados, o que é correto para o frontend
        echo json_encode(['error' => 'Nenhuma questão encontrada para a área: ' . htmlspecialchars($area)]);
    }

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Erro ao buscar questão (PDO): ' . $e->getMessage()]);
}

$conn = null; 
?>