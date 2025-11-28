<?php
// login.php
session_start();
header('Content-Type: application/json');

// Certifique-se de que db_config.php está retornando $conn ou $pdo
include 'db_config.php'; 

$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

// Adiciona limpeza de e-mail (Segurança e Validação)
$email = filter_var($email, FILTER_SANITIZE_EMAIL);

if (empty($email) || empty($senha)) {
 echo json_encode(['success' => false, 'message' => 'Preencha todos os campos.']);
 exit;
}

try {
    // --- GARANTE QUE A VARIÁVEL DE CONEXÃO É USADA ---
 $db = isset($conn) ? $conn : (isset($pdo) ? $pdo : null);
 if (!$db) {
 throw new Exception("Falha na conexão: Variável de conexão (\$conn ou \$pdo) não encontrada.");
}
    // -----------------------------------------------------

    // Busca o usuário pelo email
 $sql = "SELECT email, nome, senha FROM usuarios WHERE email = :email LIMIT 1"; // Melhoria: Seleciona apenas as colunas necessárias
 $stmt = $db->prepare($sql);
 $stmt->execute([':email' => $email]);
 $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verifica se o usuário existe E se a senha é válida
    // DICA: Se a coluna da senha for 'password_hash', troque $user['senha'] para $user['password_hash']
if ($user && password_verify($senha, $user['senha'])) {
 
        // DICA: Se a coluna do nome for 'nome_completo', troque $user['nome'] para $user['nome_completo']
 $_SESSION['user_id'] = $user['email']; // O EMAIL (ID ÚNICO)
 $_SESSION['nome_completo'] = $user['nome']; // O NOME COMPLETO

 echo json_encode(['success' => true, 'message' => 'Login realizado!', 'redirect' => 'questoes.html']);
 } else {
        // Retorna a mesma mensagem para ambos os erros para evitar enumerar e-mails válidos.
 echo json_encode(['success' => false, 'message' => 'Email ou senha incorretos.']);
 }

} catch (PDOException $e) {
 echo json_encode(['success' => false, 'message' => 'Erro no banco: ' . $e->getMessage()]);
} catch (Exception $e) {
 echo json_encode(['success' => false, 'message' => 'Erro fatal: ' . $e->getMessage()]);
}
?>