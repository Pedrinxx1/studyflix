<?php
// api/submit_answer.php - DIAGNÓSTICO DE ERRO SQL

// Define o cabeçalho para texto simples, ignorando o JSON do frontend
header('Content-Type: text/plain; charset=utf-8');
include __DIR__ . '/db_config.php';

$db = $pdo ?? null;

if (!$db) {
    die("ERRO 1: Conexão PDO não disponível.");
}

// Recebe dados como JSON
$input = file_get_contents('php://input');
$data = json_decode($input, true);

if (!isset($data['question_id'], $data['answer'], $data['user_id'])) {
    die("ERRO 400: Dados incompletos recebidos.");
}

$question_id = $data['question_id'];
$user_answer = $data['answer'];
$user_id = $data['user_id']; 

try {
    $db->beginTransaction(); 

    // Busca a resposta correta (Vamos testar esta primeira query)
    $stmt = $db->prepare("SELECT correct_option FROM questions WHERE question_id = ?");
    $stmt->execute([$question_id]);
    $question_data = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$question_data) {
        die("ERRO 404: Questão ID não encontrada.");
    }
    
    // O erro 500 provavelmente está no UPSERT abaixo:
    $is_correct_int = (strtolower($user_answer) === strtolower($question_data['correct_option'])) ? 1 : 0;
    $username = ($user_id === 'guest') ? 'Visitante' : $user_id;

    $sql_upsert = "INSERT INTO user_scores (username, total_attempted, total_correct, display_name) 
                   VALUES (?, 1, ?, ?)
                   ON CONFLICT (username) DO UPDATE 
                   SET total_attempted = user_scores.total_attempted + 1,
                       total_correct = user_scores.total_correct + ?,
                       display_name = EXCLUDED.display_name";
    
    echo "Query UPSERT a ser executada...\n\n";

    $stmt = $db->prepare($sql_upsert);
    $stmt->execute([
        $username, $is_correct_int, $username, $is_correct_int
    ]);
    
    $db->commit(); 
    
    die("SUCESSO: A transação de salvar a resposta funcionou. O erro 500 é do frontend.");

} catch (PDOException $e) {
    if ($db->inTransaction()) {
        $db->rollBack(); 
    }
    // 💥 A MENSAGEM CRÍTICA QUE EU PRECISO ESTÁ AQUI 💥
    header('Content-Type: text/plain; charset=utf-8', true, 500); 
    die("ERRO 500 REAL NO BANCO DE DADOS:\n" . $e->getMessage());
}
?>