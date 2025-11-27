<?php
// api/save_score.php
header('Content-Type: application/json; charset=utf-8');

// Inclui a configuração do banco de dados
require_once 'db_config.php';

// Permite a leitura de dados JSON (como o JavaScript está enviando)
$data = json_decode(file_get_contents('php://input'), true);

if (empty($data)) {
    // Tenta ler como URL-encoded, caso o fetch no JS seja ajustado
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && 
        isset($_POST['username']) && isset($_POST['correct']) && isset($_POST['attempted']) && isset($_POST['display_name'])) {
        
        $username = $_POST['username'];
        $display_name = $_POST['display_name'];
        $correct = (int)$_POST['correct'];
        $attempted = (int)$_POST['attempted'];
        
    } else {
        echo json_encode(['success' => false, 'error' => 'Dados POST inválidos ou ausentes.']);
        exit;
    }
} else {
    // Leitura JSON (preferencial)
    $username = $data['username'] ?? null;
    $display_name = $data['display_name'] ?? null; // NOVO CAMPO
    $correct = (int)($data['correct'] ?? 0);
    $attempted = (int)($data['attempted'] ?? 0);
}


if (!$username || $attempted === 0) {
    echo json_encode(['success' => false, 'error' => 'Username ou dados da sessão (attempted=0) ausentes.']);
    exit;
}

try {
    // NOVO: Adicione 'display_name' na consulta SQL e na lista de parâmetros
    $sql = "INSERT INTO ranking (username, display_name, total_correct, total_attempted, last_session_date) 
            VALUES (:username, :display_name, :correct, :attempted, NOW())
            ON DUPLICATE KEY UPDATE 
            total_correct = total_correct + :correct_update, 
            total_attempted = total_attempted + :attempted_update,
            display_name = :display_name_update, 
            last_session_date = NOW()";

    $stmt = $pdo->prepare($sql);
    
    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':display_name', $display_name); // Salva o nome para exibição
    $stmt->bindValue(':correct', $correct);
    $stmt->bindValue(':attempted', $attempted);
    $stmt->bindValue(':correct_update', $correct);
    $stmt->bindValue(':attempted_update', $attempted);
    $stmt->bindValue(':display_name_update', $display_name); // Atualiza o nome (caso o usuário mude)

    $stmt->execute();

    echo json_encode(['success' => true, 'message' => 'Pontuação registrada com sucesso!']);

} catch (PDOException $e) {
    // Se ocorrer um erro no banco de dados, retorne uma resposta de erro
    http_response_code(500);
    echo json_encode(['success' => false, 'error' => 'Erro no banco de dados: ' . $e->getMessage()]);
}
?>