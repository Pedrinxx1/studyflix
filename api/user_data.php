<?php
// api/user_data.php - EXCLUSIVO PARA USUÁRIOS LOGADOS
header('Content-Type: application/json; charset=utf-8');
include __DIR__ . '/db_config.php';

$db = $pdo ?? null;

if (!$db) {
    http_response_code(500);
    echo json_encode(['logged_in' => false, 'error' => 'Erro de conexão DB.']);
    exit;
}

// ⚠️ AJUSTE AQUI: Use o mecanismo REAL de sessão/login do seu site.
// Assumimos que o email do usuário logado está em $_SESSION['user_email'].
session_start(); 
$user_email = $_SESSION['user_email'] ?? null; 

if ($user_email) {
    try {
        // Busca o email e o nome real do usuário na tabela 'users'
        // 🚨 AJUSTE ESTA QUERY para a sua tabela de usuários e colunas (se necessário)!
        $stmt = $db->prepare("SELECT email, nome_completo FROM users WHERE email = ?");
        $stmt->execute([$user_email]);
        $user_data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user_data) {
            echo json_encode([
                'logged_in' => true,
                'username' => $user_data['email'],      // O ID Único para o ranking é o email
                'display_name' => $user_data['nome_completo'] // Nome para ser exibido
            ]);
        } else {
            // Se o email estiver na sessão, mas não no banco (erro de integridade)
            echo json_encode(['logged_in' => false, 'error' => 'Usuário logado não encontrado no banco de dados.']);
        }

    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(['logged_in' => false, 'error' => 'Erro SQL ao buscar dados.']);
    }
} else {
    // Não logado - Resposta clara para o JS bloquear o quiz.
    echo json_encode(['logged_in' => false]);
}
?>