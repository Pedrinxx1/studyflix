<?php
$host = "localhost";
$port = "5433"; // porta do PostgreSQL
$dbname = "studyflix_db"; // nome do banco
$user = "postgres"; // seu usuário
$password = "SUA_SENHA_AQUI"; // substitui pela sua senha do PostgreSQL

try {
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "✅ Conectado com sucesso ao PostgreSQL!";
} catch (PDOException $e) {
    echo "❌ Erro na conexão: " . $e->getMessage();
}
?>
