<?php
include __DIR__ . '/db_config.php'; 

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Método não permitido.']);
    exit;
}

if (!isset($_POST['username']) || !isset($_POST['correct']) || !isset($_POST['attempted']) || !isset($_POST['display_name'])) {
    http_response_code(400); 
    // AGORA EXIGE O display_name
    echo json_encode(['error' => 'Dados incompletos. São necessários username, correct, attempted e display_name.']);
    exit;
}

$username = trim($_POST['username']);
$correct = (int)$_POST['correct'];
$attempted = (int)$_POST['attempted'];
$display_name = trim($_POST['display_name']); // NOVO CAMPO

try {
    // 1. Tenta ATUALIZAR (UPDATE): soma a pontuação E atualiza o nome de exibição (caso o usuário mude)
    $sql_update = "UPDATE user_scores
                   SET total_correct = total_correct + :correct,
                       total_attempted = total_attempted + :attempted,
                       display_name = :display_name
                   WHERE username = :username";

    $stmt = $conn->prepare($sql_update);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':correct', $correct);
    $stmt->bindParam(':attempted', $attempted);
    $stmt->bindParam(':display_name', $display_name); // BIND DO NOVO CAMPO
    $stmt->execute();

    if ($stmt->rowCount() == 0) {
        // 2. Tenta INSERIR (INSERT): cria um novo registro com o nome de exibição
        $sql_insert = "INSERT INTO user_scores (username, total_correct, total_attempted, display_name)
                       VALUES (:username, :correct, :attempted, :display_name)";

        $stmt = $conn->prepare($sql_insert);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':correct', $correct);
        $stmt->bindParam(':attempted', $attempted);
        $stmt->bindParam(':display_name', $display_name); // BIND DO NOVO CAMPO
        $stmt->execute();
    }

    echo json_encode(['success' => true, 'message' => 'Pontuação salva/atualizada com sucesso!']);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Erro ao salvar a pontuação: ' . $e->getMessage()]);
}

$conn = null;
?>