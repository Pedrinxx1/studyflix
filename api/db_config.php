<?php
// Credenciais do Render PostgreSQL
define('DB_HOST', 'dpg-d4kbinodl3ps73dh16l0-a'); // <<< NOVO HOST
define('DB_USER', 'studyflix_user'); // Mantido
define('DB_PASS', 'iofU2bx0K4LEvFJU7kHYjoHnXaKj2R2y'); // <<< NOVA SENHA
define('DB_NAME', 'studyflix_db_qurq'); // Mantido

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $dsn = "pgsql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";sslmode=require;client_encoding=utf8";
    
    $conn = new PDO(
        $dsn,
        DB_USER,
        DB_PASS,
        $options
    );
} catch (PDOException $e) {
    header('Content-Type: application/json');
    http_response_code(500);
    echo json_encode(['error' => 'Falha na conexão com o Banco de Dados. Detalhe: ' . $e->getMessage()]);
    exit();
}
?>