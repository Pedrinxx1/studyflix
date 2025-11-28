<?php
// api/save_score.php
header('Content-Type: application/json; charset=utf-8');

require_once 'db_config.php';

// Tenta obter a conexão (adaptando para $conn ou $pdo)
$db = isset($conn) ? $conn : (isset($pdo) ? $pdo : null);
if (!$db) {
    echo json_encode(['success' => false, 'error' => 'Erro de configuração do banco.']);
    exit;
}

// Lendo dados do POST (form-urlencoded é o que o JS está enviando)
$username = $_POST['username'] ?? null;
$display_name = $_POST['display_name'] ?? null; 
$correct = (int)($_POST['correct'] ?? 0);
$attempted = (int)($_POST['attempted'] ?? 0);

if (!$username || $attempted === 0) {
    echo json_encode(['success' => false, 'error' => 'Dados da sessão ausentes ou incompletos.']);
    exit;
}

try {
    // POSTGRESQL/PDO: Usamos o comando ON CONFLICT para fazer o UPSERT (INSERT OR UPDATE)
    // O conflito é verificado no campo 'username' (que deve ser UNIQUE KEY)
    $sql = "INSERT INTO user_scores (username, display_name, total_correct, total_attempted, last_session_date) 
            VALUES (:username, :display_name, :correct, :attempted, NOW())
            ON CONFLICT (username) DO UPDATE 
            SET total_correct = user_scores.total_correct + :correct_update, 
                total_attempted = user_scores.total_attempted + :attempted_update,
                display_name = :display_name_update, 
                last_session_date = NOW()";

    $stmt = $db->prepare($sql);
    
    // Bind dos parâmetros
    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':display_name', $display_name);
    $stmt->bindValue(':correct', $correct);
    $stmt->bindValue(':attempted', $attempted);
    $stmt->bindValue(':correct_update', $correct);
    $stmt->bindValue(':attempted_update', $attempted);
    $stmt->bindValue(':display_name_update', $display_name);

    $stmt->execute();

    echo json_encode(['success' => true, 'message' => 'Pontuação registrada/atualizada!']);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'error' => 'Erro no banco de dados: ' . $e->getMessage()]);
}
?>