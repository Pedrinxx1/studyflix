<?php
$host = "aws-1-us-east-1.pooler.supabase.com";
$dbname = "postgres";
$user = "postgres.hmaqoyajkalregfmdhdo";
$password = "AnnaLuisa12";
$port = "5432";

try {
    $conn = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "✅ Conexão bem-sucedida com o Supabase!";
} catch (PDOException $e) {
    echo "❌ Erro na conexão: " . $e->getMessage();
}
?>
