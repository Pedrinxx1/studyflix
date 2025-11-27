<?php
// Configuração robusta para lidar com erros e garantir resposta JSON
set_error_handler(function ($errno, $errstr, $errfile, $errline) {
    // Se o erro for um Warning (como a falha de include anterior), 
    // tentamos enviar um JSON de erro para o frontend
    if (!(error_reporting() & $errno)) {
        return false;
    }
    header('Content-Type: application/json', true, 500);
    echo json_encode(['error' => "Erro no servidor PHP (Código: {$errno}): {$errstr} na linha {$errline} de {$errfile}"]);
    exit(1);
});

header('Content-Type: application/json; charset=utf-8');

// 🚨 CORREÇÃO ESSENCIAL: Usa __DIR__ para garantir que o PHP encontre o arquivo
// Confirme se o nome do seu arquivo de credenciais é db_config.php
include __DIR__ . '/db_config.php'; 

// Obtém a área da URL, usa 'Natureza' como padrão
$area = $_GET['area'] ?? 'Natureza';

try {
    // 1. PostgreSQL usa RANDOM() para ordem aleatória
    $sql = "SELECT question_id, enunciado, option_a, option_b, option_c, option_d, option_e 
            FROM questions 
            WHERE area = ? 
            ORDER BY RANDOM() 
            LIMIT 1";
            
    $stmt = $conn->prepare($sql);
    $stmt->execute([$area]); // Executa com o parâmetro

    if ($stmt->rowCount() > 0) {
        $question = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch usando PDO
        echo json_encode($question);
    } else {
        http_response_code(404);
        echo json_encode(['error' => 'Nenhuma questão encontrada para a área: ' . htmlspecialchars($area)]);
    }

} catch (PDOException $e) {
    // 2. Se a conexão falhar aqui, retorna um JSON de erro (conexão com DB)
    http_response_code(500);
    echo json_encode(['error' => 'Erro ao buscar questão (PDO): ' . $e->getMessage()]);
}

$conn = null; // Fecha a conexão PDO
?>