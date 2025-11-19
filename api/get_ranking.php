<?php
header('Content-Type: application/json');

require_once '../db_config.php'; 

if (!isset($conn)) {
    echo json_encode(['error' => 'Falha na conexão com o banco de dados.']);
    exit();
}

try {
    // SQL para calcular o ranking
    // Usamos o JOIN na sua tabela 'usuarios' e calculamos a soma de acertos.
    $sql = "SELECT u.nome AS username, 
                   SUM(CASE WHEN p.is_correct = TRUE THEN 1 ELSE 0 END) AS total_correct, 
                   COUNT(p.id) AS total_attempted
            FROM user_performance p
            JOIN usuarios u ON p.user_id = u.id
            GROUP BY u.id, u.nome
            ORDER BY total_correct DESC, total_attempted ASC
            LIMIT 10"; // Limite de 10 melhores

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $ranking = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Retorna a lista de rankings
    echo json_encode($ranking);

} catch (PDOException $e) {
    error_log("Erro no DB ao buscar ranking: " . $e->getMessage());
    echo json_encode(['error' => 'Erro interno do servidor ao carregar ranking.']);
}
?>