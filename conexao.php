<?php
// Dados da conexão Render PostgreSQL
$host = 'dpg-d46m637gi27c73au64t0-a';  // servidor
$port = '5432';                        // porta padrão do PostgreSQL
$dbname = 'studyflix_db';              // nome do banco
$user = 'studyflix_db_user';           // usuário
$password = 'jAvxXoAmej1Zz1mlgUmLWbs4Sg9lAj1Z'; // senha

try {
    $conn = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "✅ Conexão bem-sucedida com o Render PostgreSQL!";
} catch (PDOException $e) {
    echo "❌ Erro na conexão: " . $e->getMessage();
}
?>
