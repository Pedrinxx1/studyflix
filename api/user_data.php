<?php
// api/user_data.php

// Define o cabeçalho para garantir que o navegador entenda a resposta como JSON
header('Content-Type: application/json; charset=utf-8');

// Inicia a sessão para acessar as variáveis de login
if (session_status() == PHP_SESSION_NONE) {
 session_start();
}

// Verifica se o usuário está logado e se temos as informações necessárias
// CORRIGIDO: Agora verifica 'user_id' em vez de 'email'
if (isset($_SESSION['user_id']) && isset($_SESSION['nome_completo'])) {
 $data = [
 'logged_in' => true, // Mudei de 'is_logged_in' para 'logged_in' para consistência futura
        // O email é a chave única para identificar o usuário no DB de ranking
 'username' => $_SESSION['user_id'], // Usa o ID único da sessão
        // O nome completo é usado para exibição no ranking
 'display_name' => $_SESSION['nome_completo'] 
 ];
} else {
    // Se não estiver logado, usa dados de convidado (guest)
 $data = [
 'logged_in' => false,
 'username' => 'guest_'.uniqid(), // Garante um ID único temporário
'display_name' => 'Convidado'
 ];
}

// Retorna os dados como JSON
echo json_encode($data);
?>