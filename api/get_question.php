<?php
header('Content-Type: application/json; charset=utf-8');
include 'db_connection.php'; // Usa a conexão PDO

$area = $_GET['area'] ?? 'Natureza';

try {
    // PostgreSQL usa RANDOM() para ordem aleatória
    $sql = "SELECT question_id, enunciado, option_a, option_b, option_c, option_d, option_e 
            FROM questions 
            WHERE area = ? 
            ORDER BY RANDOM() 
            LIMIT 1";
            
    $stmt = $conn->prepare($sql);
    $stmt->execute([$area]); // Executa com o parâmetro

    if ($stmt->rowCount() > 0) {
        $question = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch usando PDO
        echo json_encode($question);
    } else {
        http_response_code(404);
        echo json_encode(['error' => 'Nenhuma questão encontrada para a área: ' . htmlspecialchars($area)]);
    }

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Erro ao buscar questão: ' . $e->getMessage()]);
}

$conn = null; // Fecha a conexão PDO
?>