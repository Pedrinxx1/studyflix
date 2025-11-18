<?php
// Inclui o arquivo que tem as suas credenciais de conexão
require_once 'db_config.php';

// INÍCIO DO BLOCO DE DADOS DAS 500 QUESTÕES (Gerado automaticamente)
// As questões serão inseridas na tabela 'questions'

$questoes = [
    [
        'area' => 'Biologia',
        'enunciado' => 'O ciclo do nitrogênio é crucial para a manutenção da vida, pois o nitrogênio é um componente essencial de moléculas como proteínas e ácidos nucleicos. No solo, bactérias do gênero Rhizobium estabelecem uma relação mutualística com leguminosas, fixando o nitrogênio atmosférico. Além disso, a decomposição da matéria orgânica libera amônia, que é subsequentemente transformada. Qual processo converte a amônia (NH3) ou o íon amônio (NH4+) em nitrito (NO2-) e, posteriormente, em nitrato (NO3-), a forma mais facilmente absorvida pelas plantas?',
        'option_a' => 'Desnitrificação',
        'option_b' => 'Amonificação',
        'option_c' => 'Fixação',
        'option_d' => 'Nitrificação',
        'option_e' => '',
        'correct_option' => 'D'
    ],
    [
        'area' => 'Química',
        'enunciado' => 'Uma pilha de Daniell utiliza zinco e cobre. A semirreação de redução para o cobre é Cu^2+ (aq) + 2e- -> Cu (s) (Eº = +0,34 V) e para o zinco é Zn^2+ (aq) + 2e- -> Zn (s) (Eº = -0,76 V). Em uma pilha, o polo negativo é sempre o local onde ocorre a oxidação. Qual é o potencial padrão (Eº_pilha) e qual metal funciona como ânodo (polo negativo) nesta pilha?',
        'option_a' => 'Eº_pilha = +0,42 V e o zinco é o ânodo.',
        'option_b' => 'Eº_pilha = +1,10 V e o cobre é o ânodo.',
        'option_c' => 'Eº_pilha = -0,42 V e o zinco é o ânodo.',
        'option_d' => 'Eº_pilha = +1,10 V e o zinco é o ânodo.',
        'option_e' => '',
        'correct_option' => 'D'
    ],
    [
        'area' => 'Física',
        'enunciado' => 'Um aquecedor elétrico é especificado como 1000 W e 110 V. Se esse aquecedor for conectado a uma tomada de 220 V, a sua potência dissipada será diferente da nominal, supondo que a resistência do aquecedor se mantenha constante. Qual será a nova potência dissipada pelo aquecedor na tensão de 220 V?',
        'option_a' => '500 W',
        'option_b' => '1000 W',
        'option_c' => '2000 W',
        'option_d' => '4000 W',
        'option_e' => '',
        'correct_option' => 'D'
    ],
    [
        'area' => 'Biologia',
        'enunciado' => 'Em Ecologia, a produtividade primária líquida (PPL) representa a quantidade de energia (ou biomassa) que realmente fica disponível para os consumidores primários (herbívoros). Qual é a relação matemática que define a PPL a partir dos conceitos de produtividade primária bruta (PPB) e da taxa de respiração (R) dos produtores (autótrofos)?',
        'option_a' => 'PPL = PPB + R',
        'option_b' => 'PPL = R - PPB',
        'option_c' => 'PPL = PPB / R',
        'option_d' => 'PPL = PPB - R',
        'option_e' => '',
        'correct_option' => 'D'
    ],
    [
        'area' => 'Química',
        'enunciado' => 'O etanol (C2H5OH) pode ser obtido pela fermentação de açúcares. Sabendo que a densidade do etanol puro a 20°C é de aproximadamente 0,79 g/mL, e que sua massa molar é de 46 g/mol, qual é a quantidade de matéria (em mol) presente em 500 mL de etanol puro?',
        'option_a' => 'aproximadamente 46,0 mol',
        'option_b' => 'aproximadamente 17,2 mol',
        'option_c' => 'aproximadamente 8,59 mol',
        'option_d' => 'aproximadamente 0,79 mol',
        'option_e' => '',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Física',
        'enunciado' => 'Um motorista trafega por uma rodovia e, ao avistar um obstáculo, aciona os freios. O carro desacelera uniformemente de uma velocidade de 72 km/h até parar em uma distância de 40 m. Qual é o módulo da aceleração de frenagem, em metros por segundo ao quadrado (m/s²)?',
        'option_a' => '0,5 m/s²',
        'option_b' => '1,8 m/s²',
        'option_c' => '5,0 m/s²',
        'option_d' => '10,0 m/s²',
        'option_e' => '',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Biologia',
        'enunciado' => 'A vacinação é uma das estratégias de saúde pública mais eficazes na prevenção de doenças. Em termos biológicos, o que as vacinas introduzem no organismo e qual é o mecanismo de defesa que elas induzem?',
        'option_a' => 'Introduzem anticorpos prontos, induzindo a imunidade passiva.',
        'option_b' => 'Introduzem parasitas vivos virulentos, induzindo a imunidade natural.',
        'option_c' => 'Introduzem antígenos (patógenos atenuados ou inativados), induzindo a produção de células de memória e anticorpos, caracterizando a imunidade ativa artificial.',
        'option_d' => 'Introduzem células de defesa (leucócitos), aumentando o número de fagócitos.',
        'option_e' => '',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Química',
        'enunciado' => 'A isomeria é um fenômeno da Química Orgânica em que compostos diferentes possuem a mesma fórmula molecular. O but-1-eno e o ciclobutano são exemplos de isômeros que pertencem a classes de funções orgânicas distintas. Qual tipo de isomeria classifica a relação entre but-1-eno (C4H8) e ciclobutano (C4H8)?',
        'option_a' => 'Isomeria de Função',
        'option_b' => 'Isomeria de Posição',
        'option_c' => 'Isomeria de Cadeia',
        'option_d' => 'Isomeria de Compensação (Metameria)',
        'option_e' => '',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Física',
        'enunciado' => 'Um feixe de luz monocromática passa do ar para um meio transparente (vidro) com índice de refração n = 1,5. Sabendo que a velocidade da luz no vácuo é c ≈ 3,0 x 10^8 m/s. Qual é a velocidade de propagação da luz ao se propagar no vidro?',
        'option_a' => '1,5 x 10^8 m/s',
        'option_b' => '2,0 x 10^8 m/s',
        'option_c' => '3,0 x 10^8 m/s',
        'option_d' => '4,5 x 10^8 m/s',
        'option_e' => '',
        'correct_option' => 'B'
    ],
    [
        'area' => 'Biologia/Química',
        'enunciado' => 'O aquecimento global é amplamente associado ao aumento da concentração de gases de efeito estufa na atmosfera. Dentre as atividades humanas que mais contribuem para essa concentração, a queima de combustíveis fósseis é a principal responsável pela liberação de qual dos seguintes gases na atmosfera?',
        'option_a' => 'Metano (CH4)',
        'option_b' => 'Óxido Nitroso (N2O)',
        'option_c' => 'Ozônio (O3)',
        'option_d' => 'Dióxido de Carbono (CO2)',
        'option_e' => '',
        'correct_option' => 'D'
    ],
    [
        'area' => 'Biologia',
        'enunciado' => 'A meiose é um tipo de divisão celular essencial para a reprodução sexuada. Um dos eventos mais importantes da meiose I é o \'crossing-over\' (permuta), que ocorre na Prófase I. Qual é a principal consequência biológica do \'crossing-over\'?',
        'option_a' => 'A redução do número de cromossomos pela metade.',
        'option_b' => 'A formação de duas células diploides geneticamente idênticas à célula-mãe.',
        'option_c' => 'A separação das cromátides-irmãs.',
        'option_d' => 'O