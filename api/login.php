<?php
// login.php
session_start();
header('Content-Type: application/json');

// CORREÇÃO AQUI: Assumindo que o arquivo de configuração está na subpasta 'api/'
// Se estiver diretamente na pasta raiz (junto com login.php), use apenas include 'db_config.php';
include 'api/db_config.php'; 

$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

// Adiciona limpeza de e-mail (Segurança)
$email = filter_var($email, FILTER_SANITIZE_EMAIL);

if (empty($email) || empty($senha)) {
    echo json_encode(['success' => false, 'message' => 'Preencha todos os campos.']);
    exit;
}

try {
    // --- GARANTE QUE A VARIÁVEL DE CONEXÃO É USADA ---
    $db = isset($conn) ? $conn : (isset($pdo) ? $pdo : null);
    
    if (!$db) {
        // Esta linha agora só será acionada se o db_config.php for incluído, mas não definir a conexão.
        throw new Exception("Falha na conexão: Variável de conexão (\$conn ou \$pdo) não encontrada.");
    }
    // -----------------------------------------------------

    // Seleciona apenas as colunas necessárias para o login e sessão
    $sql = "SELECT email, nome, senha FROM usuarios WHERE email = :email LIMIT 1"; 
    $stmt = $db->prepare($sql);
    $stmt->execute([':email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verifica se o usuário existe E se a senha é válida
    if ($user && password_verify($senha, $user['senha'])) {
        
        // SESSÕES ESSENCIAIS PARA O RANKING
        $_SESSION['user_id'] = $user['email'];      // O EMAIL (ID ÚNICO)
        $_SESSION['nome_completo'] = $user['nome']; // O NOME COMPLETO

        echo json_encode(['success' => true, 'message' => 'Login realizado!', 'redirect' => 'questoes.html']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Email ou senha incorretos.']);
    }

} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Erro no banco: ' . $e->getMessage()]);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Erro fatal: ' . $e->getMessage()]);
}
?>