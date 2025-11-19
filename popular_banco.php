<?php
// ----------------------------------------------------------------------
// CONFIGURAÇÃO E CONEXÃO
// ----------------------------------------------------------------------
require_once 'db_config.php';

// Garante que a conexão existe
if (!isset($conn)) {
    die("❌ Erro Crítico: Não foi possível conectar ao banco de dados. Verifique 'db_config.php'.");
}

// Aumenta o tempo limite de execução (inserir 300 itens pode levar alguns segundos no Render)
set_time_limit(300); 

echo "<h3>🚀 Iniciando Configuração do Banco de Dados...</h3>";

try {
    // 1. RESET TOTAL: Apaga a tabela antiga para garantir que a nova estrutura entre
    $conn->exec("DROP TABLE IF EXISTS questoes CASCADE");
    echo "✅ Tabela antiga removida.<br>";

    // 2. CRIAÇÃO DA TABELA (Corrigida para aceitar NULL na option_e)
    $sql_create = "
        CREATE TABLE questoes (
            id SERIAL PRIMARY KEY,
            area VARCHAR(100) NOT NULL,
            enunciado TEXT NOT NULL,
            option_a TEXT NOT NULL,
            option_b TEXT NOT NULL,
            option_c TEXT NOT NULL,
            option_d TEXT NOT NULL,
            option_e TEXT DEFAULT NULL, 
            correct_option VARCHAR(1) NOT NULL
        );
    ";
    $conn->exec($sql_create);
    echo "✅ Tabela 'questoes' recriada com sucesso.<br>";

} catch (PDOException $e) {
    die("❌ Erro na estrutura do banco: " . $e->getMessage());
}

// ----------------------------------------------------------------------
// 3. DADOS DAS QUESTÕES (BASE REAL + PREENCHIMENTO)
// ----------------------------------------------------------------------

$questoes = [];

// --- BLOCO 1: NATUREZA (Reais do seu arquivo) ---
$questoes_natureza = [
    ['area'=>'Natureza', 'correct_option'=>'A', 'enunciado'=>'O ciclo do nitrogênio é crucial para a manutenção da vida. Qual processo converte a amônia (NH3) em nitrito (NO2-) e depois em nitrato (NO3-)?', 'options'=>['Nitrificação','Amonificação','Fixação','Desnitrificação', null]],
    ['area'=>'Natureza', 'correct_option'=>'B', 'enunciado'=>'Em uma pilha de Daniell (Zn/Cu), qual é o potencial padrão (Eº) e o ânodo?', 'options'=>['+0,42V / Zinco','+1,10V / Zinco','-0,42V / Zinco','+1,10V / Cobre', null]],
    ['area'=>'Natureza', 'correct_option'=>'C', 'enunciado'=>'Um aquecedor de 1000W e 110V ligado em 220V terá qual potência dissipada?', 'options'=>['500 W','1000 W','4000 W','2000 W', null]],
    ['area'=>'Natureza', 'correct_option'=>'D', 'enunciado'=>'Qual a relação da Produtividade Primária Líquida (PPL)?', 'options'=>['PPB + R','R - PPB','PPB / R','PPB - R', null]],
    ['area'=>'Natureza', 'correct_option'=>'A', 'enunciado'=>'Quantidade de matéria em 500mL de etanol (d=0,79)?', 'options'=>['8,59 mol','46,0 mol','17,2 mol','0,79 mol', null]],
    ['area'=>'Natureza', 'correct_option'=>'B', 'enunciado'=>'Carro freia de 72km/h até 0 em 40m. Aceleração?', 'options'=>['0,5 m/s²','5,0 m/s²','1,8 m/s²','10,0 m/s²', null]],
    ['area'=>'Natureza', 'correct_option'=>'C', 'enunciado'=>'O que as vacinas introduzem no organismo?', 'options'=>['Anticorpos','Parasitas vivos','Antígenos','Células de defesa', null]],
    ['area'=>'Natureza', 'correct_option'=>'D', 'enunciado'=>'Isomeria entre but-1-eno e ciclobutano?', 'options'=>['Função','Posição','Cadeia','Compensação', null]],
    ['area'=>'Natureza', 'correct_option'=>'A', 'enunciado'=>'Velocidade da luz em vidro (n=1,5)?', 'options'=>['2,0 x 10^8 m/s','1,5 x 10^8 m/s','3,0 x 10^8 m/s','4,5 x 10^8 m/s', null]],
    ['area'=>'Natureza', 'correct_option'=>'B', 'enunciado'=>'Gás do efeito estufa liberado por combustíveis fósseis?', 'options'=>['Metano','CO2','Ozônio','N2O', null]]
];

// --- BLOCO 2: HUMANAS (Reais do seu arquivo) ---
$questoes_humanas = [
    ['area'=>'Humanas', 'correct_option'=>'D', 'enunciado'=>'O sistema feudal na Idade Média era caracterizado por:', 'options'=>['Comércio','Indústria','Centralização','Terra e servidão', null]],
    ['area'=>'Humanas', 'correct_option'=>'C', 'enunciado'=>'Fase inicial da transição demográfica:', 'options'=>['Queda geral','Baixas taxas','Alta natalidade/Queda mortalidade','Crescimento nulo', null]],
    ['area'=>'Humanas', 'correct_option'=>'C', 'enunciado'=>'Objetivo das leis trabalhistas na Era Vargas:', 'options'=>['Sindicatos livres','Livre comércio','Cooptar apoio/Controle estatal','Gestão operária', null]],
    ['area'=>'Humanas', 'correct_option'=>'C', 'enunciado'=>'Impacto do El Niño no Nordeste brasileiro:', 'options'=>['Chuvas','Frio','Secas severas','Marés', null]],
    ['area'=>'Humanas', 'correct_option'=>'D', 'enunciado'=>'Fontes de energia da 2ª Revolução Industrial:', 'options'=>['Carvão','Nuclear','Eólica','Petróleo e Eletricidade', null]],
    ['area'=>'Humanas', 'correct_option'=>'C', 'enunciado'=>'Divisão Internacional do Trabalho (DIT) atual:', 'options'=>['Commodities no norte','Indústria central','Descentralização industrial','Igualdade', null]],
    ['area'=>'Humanas', 'correct_option'=>'B', 'enunciado'=>'Objetivo das Capitanias Hereditárias:', 'options'=>['Igualdade','Transferir custos para privados','Centralizar','Comércio Oriente', null]],
    ['area'=>'Humanas', 'correct_option'=>'C', 'enunciado'=>'O que é Conurbação?', 'options'=>['Êxodo','Periferia','União física de cidades','Novas cidades', null]],
    ['area'=>'Humanas', 'correct_option'=>'D', 'enunciado'=>'O Iluminismo criticava principalmente:', 'options'=>['Monarquia Const.','Socialismo','Democracia','Absolutismo/Antigo Regime', null]],
    ['area'=>'Humanas', 'correct_option'=>'C', 'enunciado'=>'Função do Terraceamento na agricultura:', 'options'=>['Mecanização','Monocultivo','Reduzir erosão','Salinidade', null]]
];

// --- BLOCO 3: MATEMÁTICA (Reais do seu arquivo) ---
$questoes_matematica = [
    ['area'=>'Matemática', 'correct_option'=>'A', 'enunciado'=>'Produto de R$120 com 15% de desconto:', 'options'=>['R$ 102,00','R$ 105,00','R$ 108,00','R$ 100,00', null]],
    ['area'=>'Matemática', 'correct_option'=>'B', 'enunciado'=>'Expressão: 5 + 3 x (10 - 4) / 2?', 'options'=>['11','14','17','20', null]],
    ['area'=>'Matemática', 'correct_option'=>'C', 'enunciado'=>'Se x + 5 = 12, quanto vale 2x - 1?', 'options'=>['15','19','13','11', null]],
    ['area'=>'Matemática', 'correct_option'=>'D', 'enunciado'=>'Raízes de x² - 5x + 6 = 0?', 'options'=>['{-2, -3}','{1, 6}','{-1, -6}','{2, 3}', null]],
    ['area'=>'Matemática', 'correct_option'=>'B', 'enunciado'=>'Fração equivalente a 3/5 com denominador 20?', 'options'=>['10/20','12/20','15/20','9/20', null]]
];

// --- BLOCO 4: LINGUAGENS (Reais do seu arquivo) ---
$questoes_linguagens = [
    ['area'=>'Linguagens', 'correct_option'=>'C', 'enunciado'=>'Objetivo da Literatura Jesuíta no Brasil:', 'options'=>['Fauna','Conflitos','Catequizar','Criticar', null]],
    ['area'=>'Linguagens', 'correct_option'=>'C', 'enunciado'=>'Características do Barroco:', 'options'=>['Equilíbrio','Simplicidade','Contraste e Exagero','Luz natural', null]],
    ['area'=>'Linguagens', 'correct_option'=>'B', 'enunciado'=>'Lema "Fugere Urbem" do Arcadismo valoriza:', 'options'=>['Cidade','Campo/Vida simples','Corte','Mar', null]],
    ['area'=>'Linguagens', 'correct_option'=>'C', 'enunciado'=>'Romantismo x Classicismo na pintura:', 'options'=>['Perfeição','Objetividade','Emoção e Natureza','Cores primárias', null]],
    ['area'=>'Linguagens', 'correct_option'=>'C', 'enunciado'=>'Herói da 1ª fase do Romantismo Brasileiro:', 'options'=>['Português','Sertanejo','Indígena','Negro', null]]
];

// Adiciona os blocos reais ao array principal
$questoes = array_merge($questoes, $questoes_natureza, $questoes_humanas, $questoes_matematica, $questoes_linguagens);

// ----------------------------------------------------------------------
// 4. GERADOR DE PREENCHIMENTO (Para chegar a 300)
// ----------------------------------------------------------------------
// O código abaixo garante que teremos 300 questões no banco,
// distribuindo o restante equitativamente entre as áreas.

$total_atual = count($questoes);
$meta = 300;
$areas_disponiveis = ['Ciências da Natureza', 'Ciências Humanas', 'Matemática', 'Linguagens'];

echo "<p>Questões reais carregadas: <strong>$total_atual</strong></p>";
echo "<p>Gerando complemento até <strong>$meta</strong>...</p>";

for ($i = $total_atual + 1; $i <= $meta; $i++) {
    $area = $areas_disponiveis[$i % 4]; // Alterna as áreas
    $questoes[] = [
        'area' => $area,
        'enunciado' => "Questão Extra #$i de $area: Esta questão foi gerada para completar o banco de dados. (Substitua futuramente)",
        'option_a' => 'Alternativa A',
        'option_b' => 'Alternativa B',
        'option_c' => 'Alternativa C (Correta)',
        'option_d' => 'Alternativa D',
        'option_e' => NULL,
        'correct_option' => 'C'
    ];
}

// ----------------------------------------------------------------------
// 5. INSERÇÃO NO BANCO (PDO)
// ----------------------------------------------------------------------

try {
    $sql = "INSERT INTO questoes (area, enunciado, option_a, option_b, option_c, option_d, option_e, correct_option) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);

    $inseridas = 0;
    
    foreach ($questoes as $q) {
        $dados = [
            $q['area'],
            $q['enunciado'],
            $q['option_a'],
            $q['option_b'],
            $q['option_c'],
            $q['option_d'],
            $q['option_e'],
            $q['correct_option']
        ];
        
        if ($stmt->execute($dados)) {
            $inseridas++;
        }
    }

    echo "<h2>✅ Processo Concluído!</h2>";
    echo "<p>Total de questões inseridas no banco: <strong>$inseridas</strong></p>";
    echo "<p>Agora as áreas 'Ciências da Natureza', 'Ciências Humanas', 'Matemática' e 'Linguagens' possuem conteúdo.</p>";

} catch (PDOException $e) {
    die("❌ Erro na inserção: " . $e->getMessage());
}
?>