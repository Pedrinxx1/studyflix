<?php
// user_data.php
header('Content-Type: application/json; charset=utf-8');

// Inicia a sessão para acessar as variáveis de login
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Verifica se o usuário está logado
if (isset($_SESSION['email']) && isset($_SESSION['nome_completo'])) {
    $data = [
        'is_logged_in' => true,
        'username' => $_SESSION['email'],          // Chave única para o DB (username)
        'display_name' => $_SESSION['nome_completo'] // Nome para exibição no ranking
    ];
} else {
    // Se não estiver logado, usa dados de convidado e desativa o ranking
    $data = [
        'is_logged_in' => false,
        'username' => 'guest_'.uniqid(), // Garante um ID único temporário
        'display_name' => 'Convidado'
    ];
}

echo json_encode($data);
?>