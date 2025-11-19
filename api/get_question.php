<?php
header('Content-Type: application/json');

// O caminho pode variar dependendo da estrutura do seu projeto.
// Assumimos que db_config.php está na raiz.
require_once '../db_config.php'; 

// Verifica se o objeto de conexão existe
if (!isset($conn)) {
    echo json_encode(['error' => 'Falha na conexão com o banco de dados.']);
    exit();
}

// 1. Obtém e limpa o parâmetro 'area'
$area = $_GET['area'] ?? null;

if (!$area) {
    echo json_encode(['error' => 'Área de estudo não especificada.']);
    exit();
}

// 2. Traduz as áreas da URL para os valores do DB
// Os valores do HTML (Natureza, Humanas, Matematica, Linguagens) precisam ser os mesmos
// que você usou ao popular o banco de dados. Vamos usar os mesmos nomes:
$allowed_areas = ['Natureza', 'Humanas', 'Matematica', 'Linguagens']; 

if (!in_array($area, $allowed_areas)) {
    echo json_encode(['error' => 'Área inválida.']);
    exit();
}

// 3. Monta a consulta SQL para buscar uma questão aleatória (compatível com PostgreSQL)
// RANDOM() é a função correta no PostgreSQL para obter um registro aleatório.
$sql = "SELECT id, enunciado, option_a, option_b, option_c, option_d, option_e, correct_option 
        FROM questoes 
        WHERE area = ? 
        ORDER BY RANDOM() 
        LIMIT 1";

try {
    $stmt = $conn->prepare($sql);
    $stmt->execute([$area]); // Binda a variável $area
    $questao = $stmt->fetch(PDO::FETCH_ASSOC); // Obtém a questão como array associativo

    if ($questao) {
        // Renomeia a coluna 'id' para 'question_id' para compatibilidade com o JS
        $questao['question_id'] = $questao['id'];
        unset($questao['id']);

        // Remove a resposta correta para não enviá-la ao front-end
        unset($questao['correct_option']); 

        // Retorna a questão em JSON
        echo json_encode($questao);
    } else {
        echo json_encode(['error' => "Nenhuma questão encontrada para a área: $area."]);
    }

} catch (PDOException $e) {
    // Em produção, você deve apenas logar este erro, não exibi-lo.
    error_log("Erro no DB ao buscar questão: " . $e->getMessage());
    echo json_encode(['error' => 'Erro interno do servidor ao carregar questão.']);
}
?>