<?php
// Conexão com o PostgreSQL (Render)
$conn = pg_connect("host=dpg-d47ph0k9c44c73cbi1dg-a 
                    dbname=studyflix_db_qurq 
                    user=studyflix_user 
                    password=C7RDk7jynwGOQqr78NGhBDB7a2QCapvo 
                    port=5432");

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
