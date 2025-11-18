<?php
// Configurações do Banco de Dados PostgreSQL no Render
// As credenciais foram extraídas da sua string de conexão.

define('DB_HOST', 'dpg-d47ph0k9c44c73cbi1dg-a.oregon-postgres.render.com'); 
define('DB_PORT', '5432');
define('DB_NAME', 'studyflix_db_qurq');
define('DB_USER', 'studyflix_user');
define('DB_PASS', 'C7RDk7jynwGOQqr78NGhBDB7a2QCapvo');


function getDbConnection() {
    // DSN (string de conexão) para PostgreSQL
    // sslmode=require é obrigatório no Render
    $dsn = "pgsql:host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME . ";sslmode=require";

    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    try {
         return new PDO($dsn, DB_USER, DB_PASS, $options);
    } catch (PDOException $e) {
         // Lançar um erro para o teste definitivo
         throw new Exception("Falha de Conexão com o Banco de Dados: " . $e->getMessage());
    }
}
?>