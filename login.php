<?php
// login.php
session_start();
header('Content-Type: application/json');

// LINHA CORRIGIDA: Inclui o arquivo dentro da pasta 'api'
include 'api/db_config.php'; 
// ----------------------------------------------------

$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

if (empty($email) || empty($senha)) {
    echo json_encode(['success' => false, 'message' => 'Preencha todos os campos.']);
    exit;
}

try {
    // Busca o usuário pelo email
    $sql = "SELECT * FROM usuarios WHERE email = :email LIMIT 1";
    
    // Use $conn se seu db_config.php usa $conn, ou $pdo se usa $pdo
    $db = isset($conn) ? $conn : $pdo; 
    
    $stmt = $db->prepare($sql);
    $stmt->execute([':email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verifica senha
    if ($user && password_verify($senha, $user['senha'])) {
        
        // SALVA OS DADOS DO USUÁRIO NA SESSÃO
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