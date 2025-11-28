<?php
// api/db_config.php - Configuração para PostgreSQL (Render)

// Sua string de conexão (exposta no prompt, ajustada aqui para variáveis)
$db_url = "postgresql://studyflix_user:iofU2bx0K4LEvFJU7kHYjoHnXaKj2R2y@dpg-d4kbinodl3ps73dh16l0-a/studyflix_db_qurq_hi3g";

// Parseia a URL de conexão para obter as credenciais separadas
$url_parts = parse_url($db_url);

if ($url_parts === false || !isset($url_parts['host'], $url_parts['user'], $url_parts['pass'], $url_parts['path'])) {
    die("Erro: String de conexão PostgreSQL inválida.");
}

$host = $url_parts['host'];
$user = $url_parts['user'];
$password = $url_parts['pass'];
$dbname = ltrim($url_parts['path'], '/'); // Remove a barra inicial do nome do DB

try {
    // ⚠️ String de conexão DSN específica para PostgreSQL usando as variáveis
    $dsn = "pgsql:host=$host;dbname=$dbname";
    
    $pdo = new PDO($dsn, $user, $password);
    
    // Configura o PDO para lançar exceções em caso de erro
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    // Se a conexão falhar, o script para com um erro fatal que resultará em 500.
    // Isso confirma que o problema é a conexão se o erro persistir.
    die("Erro de Conexão com o PostgreSQL: " . $e->getMessage());
}
?>