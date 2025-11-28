<?php
// api/login.php - CÓDIGO FINAL E SINCRONIZADO
session_start();
header('Content-Type: application/json');

include 'db_config.php'; 

$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

$email = filter_var($email, FILTER_SANITIZE_EMAIL);

if (empty($email) || empty($senha)) {
    echo json_encode(['success' => false, 'message' => 'Preencha todos os campos.']);
    exit;
}

try {
    // Usa a conexão PDO ($pdo) do db_config.php
    $db = $pdo ?? null; 
    
    if (!$db) {
        throw new Exception("Falha na conexão: Variável \$pdo não encontrada.");
    }

    // Tabela: usuarios (ajustada para o seu código)
    $sql = "SELECT email, nome, senha FROM usuarios WHERE email = :email LIMIT 1"; 
    $stmt = $db->prepare($sql);
    $stmt->execute([':email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verifica se o usuário existe E se a senha é válida
    if ($user && password_verify($senha, $user['senha'])) {
        
        // 🚨 CRÍTICO: SINCRONIZAÇÃO DA SESSÃO
        $_SESSION['user_email'] = $user['email'];    // Chave lida pelo user_data.php
        $_SESSION['user_display_name'] = $user['nome']; // Nome para exibição

        // ✅ REDIRECIONAMENTO CORRETO: Manda para a página principal
        echo json_encode(['success' => true, 'message' => 'Login realizado!', 'redirect' => 'page.html']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Email ou senha incorretos.']);
    }

} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Erro no banco: ' . $e->getMessage()]);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Erro fatal: ' . $e->getMessage()]);
}
?>