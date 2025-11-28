<?php
// api/save_score.php

include __DIR__ . '/db_config.php'; 

header('Content-Type: application/json; charset=utf-8');

// Tenta obter a conexão (usando $conn ou $pdo)
$db = isset($conn) ? $conn : (isset($pdo) ? $pdo : null);
if (!$db) {
    http_response_code(500);
    echo json_encode(['error' => 'Erro de conexão: Variável de conexão indisponível.']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Método não permitido.']);
    exit;
}

if (!isset($_POST['username']) || !isset($_POST['correct']) || !isset($_POST['attempted']) || !isset($_POST['display_name'])) {
    http_response_code(400); 
    echo json_encode(['error' => 'Dados incompletos. São necessários username, correct, attempted e display_name.']);
    exit;
}

$username = trim($_POST['username']);
$correct = (int)$_POST['correct'];
$attempted = (int)$_POST['attempted'];
$display_name = trim($_POST['display_name']); 
// Adiciona o timestamp para rastrear a última sessão
$last_session_date = date('Y-m-d H:i:s'); 

if ($attempted === 0) {
    echo json_encode(['success' => true, 'message' => 'Nenhuma tentativa registrada, pontuação não salva.']);
    exit;
}

try {
    // A query de UPSERT nativa do PostgreSQL usando ON CONFLICT
    // IMPORTANTE: O campo 'username' DEVE ser uma UNIQUE KEY na tabela user_scores!
    $sql = "INSERT INTO user_scores (username, display_name, total_correct, total_attempted, last_session_date) 
            VALUES (:username, :display_name, :correct, :attempted, :last_session_date)
            ON CONFLICT (username) DO UPDATE 
            SET total_correct = user_scores.total_correct + :correct_update, 
                total_attempted = user_scores.total_attempted + :attempted_update,
                display_name = :display_name_update, 
                last_session_date = :last_session_date_update";

    $stmt = $db->prepare($sql);
    
    // Binds para a parte INSERT (primeira tentativa)
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':display_name', $display_name);
    $stmt->bindParam(':correct', $correct);
    $stmt->bindParam(':attempted', $attempted);
    $stmt->bindParam(':last_session_date', $last_session_date);

    // Binds para a parte UPDATE (se houver conflito)
    // Os campos de atualização precisam de aliases diferentes (ex: _update)
    $stmt->bindParam(':correct_update', $correct);
    $stmt->bindParam(':attempted_update', $attempted);
    $stmt->bindParam(':display_name_update', $display_name);
    $stmt->bindParam(':last_session_date_update', $last_session_date); 
    
    $stmt->execute();

    echo json_encode(['success' => true, 'message' => 'Pontuação registrada/atualizada com sucesso!']);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'error' => 'Erro no banco de dados: ' . $e->getMessage()]);
}

$db = null; // Fecha a conexão
?>