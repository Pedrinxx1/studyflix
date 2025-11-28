<?php
// login.php
session_start(); // <--- OBRIGATÓRIO NA PRIMEIRA LINHA
header('Content-Type: application/json'); // Resposta sempre em JSON para o JS

include 'db_config.php'; // Usa a conexão PDO do seu db_config.php

$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

if (empty($email) || empty($senha)) {
    echo json_encode(['success' => false, 'message' => 'Preencha todos os campos.']);
    exit;
}

try {
    // Busca o usuário pelo email
    $sql = "SELECT * FROM usuarios WHERE email = :email LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verifica senha
    if ($user && password_verify($senha, $user['senha'])) {
        
        // --- A MÁGICA ACONTECE AQUI ---
        $_SESSION['user_id'] = $user['email']; // Email é o ID único
        $_SESSION['nome_completo'] = $user['nome']; // Nome para o Ranking
        // ------------------------------

        echo json_encode(['success' => true, 'message' => 'Login realizado!']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Email ou senha incorretos.']);
    }

} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Erro no banco: ' . $e->getMessage()]);
}
?>