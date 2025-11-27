<?php
// api/user_data.php
session_start(); // <--- OBRIGATÓRIO PARA LER A SESSÃO
header('Content-Type: application/json');

if (isset($_SESSION['user_id']) && isset($_SESSION['nome_completo'])) {
    // Se a sessão existe, retorna os dados reais
    echo json_encode([
        'logged_in' => true,
        'username' => $_SESSION['user_id'],      // Email
        'display_name' => $_SESSION['nome_completo'] // Nome Real
    ]);
} else {
    // Se não, retorna falso
    echo json_encode([
        'logged_in' => false,
        'username' => null,
        'display_name' => null
    ]);
}
?>