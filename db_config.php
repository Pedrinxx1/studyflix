<?php
// Credenciais do Render PostgreSQL (Extraídas da sua string de conexão)
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
        // Adiciona charset=utf8 na string de conexão para PostgreSQL
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::PGSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'" // Opção mais segura
        ] 
    );
    
    // REMOVA: A linha $conn->exec("SET NAMES 'utf8mb4'"); foi removida ou comentada.
    // O PDO e o driver PostgreSQL geralmente lidam com a codificação corretamente
    // Se a linha PGSQL_ATTR_INIT_COMMAND acima não funcionar, tente remover esta linha
    // $conn->exec("SET NAMES 'utf8'");

} catch (PDOException $e) {
    // Se esta seção for executada, o front-end receberá um JSON de erro (CORRETO)
    header('Content-Type: application/json');
    http_response_code(500);
    echo json_encode(['error' => 'Falha na conexão com o Banco de Dados (PostgreSQL). Detalhe: ' . $e->getMessage()]);
    exit();
}
// Conexão bem-sucedida, a variável $conn agora é um objeto PDO.
?>