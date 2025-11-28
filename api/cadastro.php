<?php
// cadastro.php - CÓDIGO FINAL E SINCRONIZADO
session_start();
header('Content-Type: application/json');

// Inclui a configuração do DB. Assumimos que db_config.php fornece $pdo.
include 'api/db_config.php'; 

// --- Coleta e Limpeza de Dados ---
$nome = $_POST['nome'] ?? '';
$email = $_POST['email'] ?? '';
$senha_clara = $_POST['senha'] ?? ''; // Senha antes do hash

$email = filter_var($email, FILTER_SANITIZE_EMAIL);

if (empty($nome) || empty($email) || empty($senha_clara)) {
    echo json_encode(['success' => false, 'message' => 'Preencha todos os campos.']);
    exit;
}

// Cria o hash da senha
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

    // 2. Insere o novo usuário (Usando PDO para segurança)
    $query = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
    $stmt = $db->prepare($query);
    $result = $stmt->execute([
        ':nome' => $nome, 
        ':email' => $email, 
        ':senha' => $senha_hash
    ]);

    if ($result) {
        // 🎉 CRÍTICO: SINCRONIZAÇÃO DA SESSÃO após o cadastro bem-sucedido
        $_SESSION['user_email'] = $email;    
        $_SESSION['user_display_name'] = $nome;

        // ✅ REDIRECIONAMENTO CORRETO: Manda para a página principal
        echo json_encode(['success' => true, 'message' => 'Cadastro realizado com sucesso!', 'redirect' => 'page.html']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Erro ao cadastrar.']);
    }

} catch (PDOException $e) {
    // Erro de banco de dados (ex: chave primária, etc.)
    echo json_encode(['success' => false, 'message' => 'Erro no banco: ' . $e->getMessage()]);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Erro fatal: ' . $e->getMessage()]);
}
?>