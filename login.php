<?php
session_start(); // Inicia a sessão

$conn = pg_connect("host=dpg-d47ph0k9c44c73cbi1dg-a 
                    dbname=studyflix_db_qurq 
                    user=studyflix_user 
                    password=C7RDk7jynwGOQqr78NGhBDB7a2QCapvo 
                    port=5432");

if (!$conn) {
    die("❌ Erro na conexão com o banco de dados.");
}

$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

$query = "SELECT * FROM usuarios WHERE email = $1";
$result = pg_query_params($conn, $query, array($email));

if ($result && $row = pg_fetch_assoc($result)) {
    if (password_verify($senha, $row['senha'])) {
        // Guarda o login na sessão
        $_SESSION['usuario_id'] = $row['id'];
        $_SESSION['usuario_nome'] = $row['nome'];

        // ✅ Redireciona para page.html
        header("Location: page.html");
        exit();
    } else {
        echo "❌ Senha incorreta.";
    }
} else {
    echo "❌ Usuário não encontrado.";
}

pg_close($conn);
?>
