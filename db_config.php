<?php
// Credenciais do Render PostgreSQL (Extraídas da sua string de conexão)
// ATENÇÃO: Verifique se estes são os valores corretos no seu painel do Render.

define('DB_HOST', 'dpg-d47ph0k9c44c73cbi1dg-a.oregon-postgres.render.com');
define('DB_USER', 'studyflix_user');
define('DB_PASS', 'C7RDk7jynwGOQqr78NGhBDB7a2QCapvo');
define('DB_NAME', 'studyflix_db_qurq');

// Tenta estabelecer a conexão PDO (PostgreSQL)
try {
    $conn = new PDO(
        "pgsql:host=" . DB_HOST . ";dbname=" . DB_NAME,
        DB_USER,
        DB_PASS,
        // Configurações para garantir exceções em caso de erro
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION] 
    );
    // Garante que a codificação seja UTF-8 para caracteres especiais
    $conn->exec("SET NAMES 'utf8mb4'");
} catch (PDOException $e) {
    // Retorna um JSON de erro para o front-end
    header('Content-Type: application/json');
    http_response_code(500);
    echo json_encode(['error' => 'Falha na conexão com o Banco de Dados (PostgreSQL). Detalhe: ' . $e->getMessage()]);
    exit();
}
// Conexão bem-sucedida, a variável $conn agora é um objeto PDO.
?>