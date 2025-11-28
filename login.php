<?php
// login.php
session_start();
header('Content-Type: application/json');

// --- PONTO CORRIGIDO: O caminho para o db_config.php ---
include 'api/db_config.php'; 
// ----------------------------------------------------

$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

if (empty($email) || empty($senha)) {
    echo json_encode(['success' => false, 'message' => 'Preencha todos os campos.']);
    exit;
}

try {
    // Tenta usar $conn, se não existir, usa $pdo (adaptação para o db_config)
    $db = isset($conn) ? $conn : (isset($pdo) ? $pdo : null);
    
    if (!$db) {
        throw new Exception("Falha na conexão: Variável \$conn ou \$pdo não definida em db_config.php.");
    }
    
    $sql = "SELECT * FROM usuarios WHERE email = :email LIMIT 1";
    $stmt = $db->prepare($sql);
    $stmt->execute([':email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verifica senha
    if ($user && password_verify($senha, $user['senha'])) {
        
        // --- SALVANDO A SESSÃO DO USUÁRIO ---
        $_SESSION['user_id'] = $user['email']; 
        $_SESSION['nome_completo'] = $user['nome']; 
        
        echo json_encode(['success' => true, 'message' => 'Login realizado!']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Email ou senha incorretos.']);
    }

} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Erro no banco: ' . $e->getMessage()]);
} catch (Exception $e) {
     echo json_encode(['success' => false, 'message' => 'Erro geral: ' . $e->getMessage()]);
}
?>