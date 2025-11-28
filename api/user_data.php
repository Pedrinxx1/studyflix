<?php
// api/user_data.php
session_start();
header('Content-Type: application/json');

// Verifica se os dados salvos pelo login.php existem
if (isset($_SESSION['user_id']) && isset($_SESSION['nome_completo'])) {
    echo json_encode([
        'logged_in' => true,
        'username' => $_SESSION['user_id'],      // Email (usado como ID único)
        'display_name' => $_SESSION['nome_completo'] // Nome Real (usado para exibir no ranking)
    ]);
} else {
    // Modo Convidado
    echo json_encode([
        'logged_in' => false,
        'username' => null,
        'display_name' => null
    ]);
}
?>