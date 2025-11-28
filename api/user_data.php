<?php
// api/user_data.php - CONFIGURADO PARA USUÁRIOS LOGADOS
header('Content-Type: application/json; charset=utf-8');

// 🚨 CRÍTICO: INICIA A SESSÃO PARA LER O EMAIL
session_start(); 

include __DIR__ . '/db_config.php';

$db = $pdo ?? null;

if (!$db) {
    http_response_code(500);
    echo json_encode(['logged_in' => false, 'error' => 'Erro de conexão DB.']);
    exit;
}

// Assume que o email do usuário logado está em $_SESSION['user_email']
$user_email = $_SESSION['user_email'] ?? null; 

if ($user_email) {
    try {
        // Busca o email e o nome real do usuário
        // 🚨 AJUSTE ESTA QUERY se necessário!
        $stmt = $db->prepare("SELECT email, nome_completo FROM users WHERE email = ?");
        $stmt->execute([$user_email]);
        $user_data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user_data) {
            echo json_encode([
                'logged_in' => true,
                'username' => $user_data['email'],      
                'display_name' => $user_data['nome_completo'] 
            ]);
        } else {
            // Se o email na sessão não for encontrado no banco
            echo json_encode(['logged_in' => false, 'error' => 'Usuário logado não encontrado no banco de dados.']);
        }

    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(['logged_in' => false, 'error' => 'Erro SQL ao buscar dados.']);
    }
} else {
    // Não logado
    echo json_encode(['logged_in' => false]);
}
?>