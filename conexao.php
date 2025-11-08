<?php
// Conexão com banco de dados Render (usando interno)
$host = 'dpg-d47ph0k9c44c73cbi1dg-a';
$port = '5432';
$dbname = 'studyflix_db_qurq';
$user = 'studyflix_user';
$password = 'C7RDk7jynwGOQqr78NGhBDB7a2QCapvo';

try {
    $conn = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "✅ Conexão bem-sucedida com o Render PostgreSQL!";
} catch (PDOException $e) {
    echo "❌ Erro na conexão: " . $e->getMessage();
}
?>
