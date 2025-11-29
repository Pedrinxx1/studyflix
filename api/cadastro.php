<?php
// cadastro.php - CÓDIGO FINAL E SINCRONIZADO
// 🚨 CRÍTICO: Define o cookie para ser válido em todo o site
session_set_cookie_params([
    'lifetime' => 0,      
    'path' => '/',        
    'httponly' => true,   
    'samesite' => 'Lax'   
]);

session_start();
header('Content-Type: application/json');

include 'api/db_config.php'; 

$nome = $_POST['nome'] ?? '';
$email = $_POST['email'] ?? '';
$senha_clara = $_POST['senha'] ?? ''; 

$email = filter_var($email, FILTER_SANITIZE_EMAIL);

// 🚨 VERIFICAÇÃO DE TODOS OS CAMPOS (Incluindo confirmarSenha)
if (empty($nome) || empty($email) || empty($senha_clara) || empty($_POST['confirmarSenha'])) {
    echo json_encode(['success' => false, 'message' => 'Preencha todos os campos.']);
    exit;
}

// 🚨 NOVO: Validação de Comprimento Mínimo da Senha (Segurança crítica)
if (strlen($senha_clara) < 6) {
    echo json_encode(['success' => false, 'message' => 'A senha deve ter no mínimo 6 caracteres.']);
    exit;
}

// 🚨 NOVO: Validação de Confirmação da Senha no Back-end (Segurança crítica)
$confirmarSenha = $_POST['confirmarSenha'] ?? '';
if ($senha_clara !== $confirmarSenha) {
    echo json_encode(['success' => false, 'message' => 'As senhas não coincidem.']);
    exit;
}

$senha_hash = password_hash($senha_clara, PASSWORD_DEFAULT);

try {
    $db = $pdo ?? null; 
    if (!$db) {
        throw new Exception("Falha na conexão: Variável \$pdo não encontrada.");
    }
    
    // 1. Verifica se o email já existe
    $stmt_check = $db->prepare("SELECT email FROM usuarios WHERE email = ?");
    $stmt_check->execute([$email]);
    if ($stmt_check->fetch()) {
        echo json_encode(['success' => false, 'message' => 'Este email já está cadastrado.']);
        exit;
    }

    // 2. Insere o novo usuário
    $query = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
    $stmt = $db->prepare($query);
    $result = $stmt->execute([
        ':nome' => $nome, 
        ':email' => $email, 
        ':senha' => $senha_hash
    ]);

    if ($result) {
        // 🎉 CRÍTICO: SINCRONIZAÇÃO DA SESSÃO após o cadastro
        $_SESSION['user_email'] = $email;    
        $_SESSION['user_display_name'] = $nome;

        echo json_encode(['success' => true, 'message' => 'Cadastro realizado com sucesso!', 'redirect' => 'page.html']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Erro ao cadastrar.']);
    }

} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Erro no banco: ' . $e->getMessage()]);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Erro fatal: ' . $e->getMessage()]);
}
?>