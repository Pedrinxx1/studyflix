<?php
// --- BLOCO DE SEGURANÇA CONTRA ERROS HTML ---
// Desativa a exibição de erros na tela (evita o erro "Unexpected token <")
ini_set('display_errors', 0);
// Relata erros apenas no log do servidor
error_reporting(E_ALL);

// Define que a resposta é OBRIGATORIAMENTE JSON
header('Content-Type: application/json; charset=utf-8');

try {
    // Verifica se o arquivo de configuração existe
    if (!file_exists(__DIR__ . '/db_config.php')) {
        throw new Exception("Arquivo db_config.php não encontrado.");
    }

    // Inclui a conexão
    require_once __DIR__ . '/db_config.php';

    // Garante que a variável de conexão ($conn ou $pdo) existe
    // (Adaptação caso seu db_config use $conn ou $pdo)
    $db = isset($conn) ? $conn : (isset($pdo) ? $pdo : null);

    if (!$db) {
        throw new Exception("Falha na conexão: Variável \$conn ou \$pdo não definida.");
    }

    // --- A QUERY DO RANKING ---
    // Seleciona o display_name (se existir) ou usa o username como fallback
    // Ordena por Acertos (Maior -> Menor) e Tentativas (Menor -> Maior)
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

    // Retorna os dados limpos em JSON
    echo json_encode($ranking_data);

} catch (Exception $e) {
    // Se der qualquer erro, retorna um JSON de erro (não HTML!)
    http_response_code(500);
    echo json_encode([
        "error" => true,
        "message" => $e->getMessage()
    ]);
}
?>