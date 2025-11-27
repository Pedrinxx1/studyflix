<?php
// Conexão corrigida com HOST COMPLETO e SSLMODE=REQUIRE
$conn = pg_connect("host=dpg-d4kbinodl3ps73dh16l0-a.oregon-postgres.render.com 
                    dbname=studyflix_db_qurq_hi3g 
                    user=studyflix_user 
                    password=iofU2bx0K4LEvFJU7kHYjoHnXaKj2R2y 
                    port=5432 
                    sslmode=require"); 

if (!$conn) {
    die("Erro de conexão com o banco de dados.");
}

// ⚠️ Linha 11 e 12: SEM CARACTERES OCULTOS
$email = $_POST['email'];
$senha = $_POST['senha'];

$query = "SELECT * FROM usuarios WHERE email = $1";
$result = pg_query_params($conn, $query, array($email));

if ($row = pg_fetch_assoc($result)) {
    if (password_verify($senha, $row['senha'])) {
        echo "sucesso";
    } else {
        echo "Senha incorreta.";
    }
} else {
    echo "Usuário não encontrado.";
}

pg_close($conn);
?>