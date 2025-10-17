<?php
include 'conexao.php'; // Arquivo de conexão com o banco

// Verifica se o método é POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Prepara e executa a consulta
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = :email AND senha = :senha");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senha);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo "sucesso";
    } else {
        echo "❌ E-mail ou senha incorretos!";
    }
}
?>
