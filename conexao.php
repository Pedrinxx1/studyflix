<?php
// Lê as variáveis de ambiente configuradas no Render
$host = getenv('dpg-d47ph0k9c44c73cbi1dg-a');
$port = getenv('5432');
$dbname = getenv('studyflix_db_qurq');
$user = getenv('studyflix_user');
$password = getenv('C7RDk7jynwGOQqr78NGhBDB7a2QCapvo');

try {
    $conn = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "✅ Conexão bem-sucedida!";
} catch (PDOException $e) {
    echo "❌ Erro na conexão: " . $e->getMessage();
    exit;
}
?>
