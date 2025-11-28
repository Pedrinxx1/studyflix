<?php
// login.php
session_start();
header('Content-Type: application/json');

include 'db_config.php'; 

$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

if (empty($email) || empty($senha)) {
    echo json_encode(['success' => false, 'message' => 'Preencha todos os campos.']);
    exit;
}

try {
    // --- NOVO: GARANTE QUE A VARIÁVEL DE CONEXÃO É USADA ---
    $db = isset($conn) ? $conn : (isset($pdo) ? $pdo : null);
    
    if (!$db) {
        throw new Exception("Falha na conexão: Variável de conexão (\$conn ou \$pdo) não encontrada.");
    }
    // -----------------------------------------------------

    // Busca o usuário pelo email
    $sql = "SELECT * FROM usuarios WHERE email = :email LIMIT 1";
    $stmt = $db->prepare($sql); // Usa $db (variável segura) no lugar de $conn
    $stmt->execute([':email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verifica senha
    if ($user && password_verify($senha, $user['senha'])) {
        
        // --- AS SESSÕES ESSENCIAIS ESTÃO AQUI E CORRETAS ---
        $_SESSION['user_id'] = $user['email'];    // O EMAIL (ID ÚNICO)
        $_SESSION['nome_completo'] = $user['nome']; // O NOME COMPLETO
        // -------------------------------------------------

        echo json_encode(['success' => true, 'message' => 'Login realizado!']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Email ou senha incorretos.']);
    }

} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Erro no banco: ' . $e->getMessage()]);
} catch (Exception $e) {
    // Captura o novo erro de conexão, caso ocorra
    echo json_encode(['success' => false, 'message' => 'Erro fatal: ' . $e->getMessage()]);
}
?>