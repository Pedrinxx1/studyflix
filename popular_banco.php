<?php
// Inclui o arquivo que faz a conexão com o PostgreSQL do Render
require_once 'db_config.php';

// ATENÇÃO: É AQUI que você deve colocar todas as 500 questões.
// Eu vou deixar apenas 2 exemplos, mas você deve completar a lista.

$questoes = [
    [
        'area' => 'Matemática',
        'enunciado' => 'Se $x = 5$ e $y = 3$, qual é o valor de $x^2 + y$?',
        'option_a' => '13',
        'option_b' => '28',
        'option_c' => '22',
        'option_d' => '25',
        'option_e' => '30',
        'correct_option' => 'B' // Resposta correta: 25 + 3 = 28
    ],
    [
        'area' => 'História',
        'enunciado' => 'Qual civilização construiu as pirâmides de Gizé?',
        'option_a' => 'Romanos',
        'option_b' => 'Gregos',
        'option_c' => 'Egípcios',
        'option_d' => 'Maias',
        'option_e' => 'Incas',
        'correct_option' => 'C'
    ],
    // *** COLOQUE SUAS OUTRAS 498 QUESTÕES AQUI! ***
];


$count = 0;
try {
    $pdo = getDbConnection();
    
    // SQL para inserir os dados na tabela 'questions'
    $sql = "INSERT INTO questions (area, enunciado, option_a, option_b, option_c, option_d, option_e, correct_option) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);

    // Itera (passa por) cada questão no array e insere no banco
    foreach ($questoes as $q) {
        $stmt->execute([
            $q['area'],
            $q['enunciado'],
            $q['option_a'],
            $q['option_b'],
            $q['option_c'],
            $q['option_d'],
            $q['option_e'],
            $q['correct_option']
        ]);
        $count++;
    }

    echo "<h1>✅ Sucesso!</h1>";
    echo "<h2>$count questões inseridas no banco de dados com sucesso.</h2>";

} catch (Exception $e) {
    echo "<h1>❌ ERRO!</h1>";
    echo "<p>Não foi possível inserir as questões. Verifique a conexão com o banco e o formato dos seus dados.</p>";
    echo "<p>Detalhes do erro: " . $e->getMessage() . "</p>";
}
?>