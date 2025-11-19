<?php
header('Content-Type: application/json');

// O caminho pode variar, mantivemos o padrão 'subindo um nível'
require_once '../db_config.php'; 

if (!isset($conn)) {
    echo json_encode(['error' => 'Falha na conexão com o banco de dados.']);
    exit();
}

// ⚠️ SIMULAÇÃO DE USUÁRIO: Use um ID de um usuário existente (ex: 1)
// Em um sistema real, este ID viria da sessão após o login.
$user_id = 1; 

// 1. Recebe os dados JSON (question_id e answer)
$input = json_decode(file_get_contents('php://input'), true);
$question_id = $input['question_id'] ?? null;
$submitted_answer = $input['answer'] ?? null;

if (!$question_id || !$submitted_answer) {
    echo json_encode(['error' => 'Dados de resposta incompletos.']);
    exit();
}

try {
    // 2. Busca a resposta correta e a área da questão
    $sql = "SELECT correct_option FROM questoes WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$question_id]);
    $questao = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$questao) {
        echo json_encode(['error' => 'Questão não encontrada.']);
        exit();
    }
    
    $correct_option = $questao['correct_option'];
    $is_correct = (strtolower($submitted_answer) === strtolower($correct_option));

    // 3. REGISTRA A PERFORMANCE DO USUÁRIO
    // Insere o registro na tabela user_performance
    $sql_insert = "INSERT INTO user_performance (user_id, question_id, is_correct) VALUES (?, ?, ?)";
    $stmt_insert = $conn->prepare($sql_insert);
    // O valor 1 ou 0 para TRUE/FALSE em alguns drivers é mais seguro, mas aqui usamos o BOOLEAN.
    $stmt_insert->execute([$user_id, $question_id, $is_correct]); 
    
    // 4. Retorna o resultado para o JavaScript
    echo json_encode([
        'is_correct' => $is_correct,
        'correct_option' => $correct_option 
    ]);

} catch (PDOException $e) {
    error_log("Erro no DB ao submeter resposta e salvar performance: " . $e->getMessage());
    echo json_encode(['error' => 'Erro interno ao processar resposta.']);
}
?>