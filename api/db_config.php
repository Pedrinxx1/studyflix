<?php
// Credenciais do Render PostgreSQL
define('DB_HOST', 'dpg-d47ph0k9c44c73cbi1dg-a.oregon-postgres.render.com');
define('DB_USER', 'studyflix_user');
define('DB_PASS', 'C7RDk7jynwGOQqr78NGhBDB7a2QCapvo');
define('DB_NAME', 'studyflix_db_qurq');

// Configurações PDO
$options = [
    // Garante que o PHP lance exceções (erros) em caso de falha de DB
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    // Desliga a emulação de prepared statements (mais seguro)
    PDO::ATTR_EMULATE_PREPARES => false,
    // Força o modo de resultados associativos por padrão
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

// Tenta estabelecer a conexão PDO (PostgreSQL)
try {
    // 🚨 CORREÇÃO AQUI: Adiciona 'client_encoding=utf8' e 'sslmode=require'
    $dsn = "pgsql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";sslmode=require;client_encoding=utf8";

    $conn = new PDO(
        $dsn,
        DB_USER,
        DB_PASS,
        $options
    );
    // A codificação agora é tratada na string DSN acima.

} catch (PDOException $e) {
    // Retorna um JSON de erro em caso de falha de conexão (CORRETO)
    header('Content-Type: application/json');
    http_response_code(500);
    echo json_encode(['error' => 'Falha na conexão com o Banco de Dados. Detalhe: ' . $e->getMessage()]);
    exit();
}
// Conexão bem-sucedida, a variável $conn é o objeto PDO.
?>