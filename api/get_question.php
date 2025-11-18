<?php
// O caminho '..' volta uma pasta para achar o db_config.php na raiz
require_once '../db_config.php';
session_start();

// --- CÓDIGO TEMPORÁRIO DE TESTE CRÍTICO ---
try {
    // Tenta abrir a conexão com o banco usando as credenciais
    $pdo = getDbConnection();
    
    // Se esta mensagem aparecer, a conexão e o caminho do arquivo estão PERFEITOS!
    die("Conexão com o banco SUCESSO! A API está no lugar certo."); 
} catch (Exception $e) {
    // Se esta mensagem aparecer, as credenciais estão ERRADAS.
    http_response_code(500);
    die("ERRO DE CONEXÃO: " . $e->getMessage()); 
}
// --- FIM DO CÓDIGO TEMPORÁRIO ---

?>