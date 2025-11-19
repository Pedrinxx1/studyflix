<?php
header('Content-Type: application/json');

// O caminho pode variar, mantivemos o padrão 'subindo um nível'
require_once '../db_config.php'; 

// Verifica se a conexão falhou
if (!isset($conn)) {
    echo json_encode(['error' => 'Falha na conexão com o banco de dados.']);
    exit();
}

// 1. Mapeamento de nomes (Crucial para resolver o erro)
// O JS envia a chave (ex: 'Natureza'), o DB tem o valor completo (ex: 'Ciências da Natureza')
$area_map = [
    'Natureza' => 'Ciências da Natureza',
    'Humanas' => 'Ciências Humanas',
    'Matematica' => 'Matemática',
    'Linguagens' => 'Linguagens'
];

// 2. Obtém e limpa o parâmetro 'area'
$area_key = $_GET['area'] ?? null;

if (!isset($area_map[$area_key])) {
    echo json_encode(['error' => 'Área de estudo inválida ou não especificada.']);
    exit();
}

// Usa o nome mapeado para buscar no banco de dados (ex: 'Ciências da Natureza')
$area_to_search = $area_map[$area_key];

// 3. Monta e executa a consulta SQL para buscar uma questão aleatória (PostgreSQL)
$sql = "SELECT id, enunciado, option_a, option_b, option_c, option_d, option_e
        FROM questoes 
        WHERE area = ? 
        ORDER BY RANDOM() 
        LIMIT 1";

try {
    $stmt = $conn->prepare($sql);
    $stmt->execute([$area_to_search]);
    $questao = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($questao) {
        // Prepara e retorna o JSON para o JavaScript
        $questao['question_id'] = $questao['id'];
        unset($questao['id']);
        // IMPORTANTE: A resposta correta (correct_option) não deve ser enviada ao front-end aqui.
        unset($questao['correct_option']); 

        echo json_encode($questao);
    } else {
        // Retorna o erro que você estava vendo, mas agora com o nome que tentou buscar
        echo json_encode(['error' => "Nenhuma questão encontrada para a área: $area_to_search."]);
    }

} catch (PDOException $e) {
    error_log("Erro no DB ao buscar questão: " . $e->getMessage());
    echo json_encode(['error' => 'Erro interno do servidor ao carregar questão.']);
}
?>