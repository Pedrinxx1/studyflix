<?php
// Conexão corrigida com HOST COMPLETO e SSLMODE=REQUIRE
$conn = pg_connect("host=dpg-d4kbinodl3ps73dh16l0-a.oregon-postgres.render.com 
                    dbname=studyflix_db_qurq_hi3g 
                    user=studyflix_user 
                    password=iofU2bx0K4LEvFJU7kHYjoHnXaKj2R2y 
                    port=5432
                    sslmode=require"); // <<< ADICIONADO

if (!$conn) {
    die("Erro de conexão com o banco de dados.");
}

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

$query = "INSERT INTO usuarios (nome, email, senha) VALUES ($1, $2, $3)";
$result = pg_query_params($conn, $query, array($nome, $email, $senha));

if ($result) {
    echo "Cadastro realizado com sucesso!";
} else {
    echo "Erro ao cadastrar.";
}

pg_close($conn);
?>