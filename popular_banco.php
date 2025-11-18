<?php
// Inclui o arquivo que tem as suas credenciais de conexão.
// Certifique-se de que 'db_config.php' define uma variável $conn (conexão MySQLi ou PDO).
require_once 'db_config.php';

// INÍCIO DO BLOCO DE DADOS DAS QUESTÕES (Total: 300 Questões)
$questoes = [
    // ----------------------------------------------------
    // QUESTÕES 1 A 100 (BLOCO ANTERIOR DE BIOLOGIA, QUÍMICA, FÍSICA)
    // ----------------------------------------------------
    [
        'area' => 'Biologia',
        'enunciado' => 'O ciclo do nitrogênio é crucial para a manutenção da vida, pois o nitrogênio é um componente essencial de moléculas como proteínas e ácidos nucleicos. No solo, bactérias do gênero Rhizobium estabelecem uma relação mutualística com leguminosas, fixando o nitrogênio atmosférico. Além disso, a decomposição da matéria orgânica libera amônia, que é subsequentemente transformada. Qual processo converte a amônia (NH3) ou o íon amônio (NH4+) em nitrito (NO2-) e, posteriormente, em nitrato (NO3-), a forma mais facilmente absorvida pelas plantas?',
        'option_a' => 'Desnitrificação',
        'option_b' => 'Amonificação',
        'option_c' => 'Fixação',
        'option_d' => 'Nitrificação',
        'option_e' => 'Nenhuma das anteriores',
        'correct_option' => 'D'
    ],
    [
        'area' => 'Química',
        'enunciado' => 'Uma pilha de Daniell utiliza zinco e cobre. A semirreação de redução para o cobre é Cu²⁺ (aq) + 2e⁻ → Cu (s) (Eº = +0,34 V) e para o zinco é Zn²⁺ (aq) + 2e⁻ → Zn (s) (Eº = -0,76 V). Em uma pilha, o polo negativo é sempre o local onde ocorre a oxidação. Qual é o potencial padrão (Eº_pilha) e qual metal funciona como ânodo (polo negativo) nesta pilha?',
        'option_a' => 'Eº_pilha = +0,42 V e o zinco é o ânodo.',
        'option_b' => 'Eº_pilha = +1,10 V e o cobre é o ânodo.',
        'option_c' => 'Eº_pilha = -0,42 V e o zinco é o ânodo.',
        'option_d' => 'Eº_pilha = +1,10 V e o zinco é o ânodo.',
        'option_e' => 'Eº_pilha = +0,76 V e o cobre é o ânodo.',
        'correct_option' => 'D'
    ],
    [
        'area' => 'Física',
        'enunciado' => 'Um aquecedor elétrico é especificado como 1000 W e 110 V. Se esse aquecedor for conectado a uma tomada de 220 V, a sua potência dissipada será diferente da nominal, supondo que a resistência do aquecedor se mantenha constante. Qual será a nova potência dissipada pelo aquecedor na tensão de 220 V?',
        'option_a' => '500 W',
        'option_b' => '1000 W',
        'option_c' => '2000 W',
        'option_d' => '4000 W',
        'option_e' => '1500 W',
        'correct_option' => 'D'
    ],
    [
        'area' => 'Biologia',
        'enunciado' => 'Em Ecologia, a produtividade primária líquida (PPL) representa a quantidade de energia (ou biomassa) que realmente fica disponível para os consumidores primários (herbívoros). Qual é a relação matemática que define a PPL a partir dos conceitos de produtividade primária bruta (PPB) e da taxa de respiração (R) dos produtores (autótrofos)?',
        'option_a' => 'PPL = PPB + R',
        'option_b' => 'PPL = R - PPB',
        'option_c' => 'PPL = PPB / R',
        'option_d' => 'PPL = PPB - R',
        'option_e' => 'PPL = 2 * PPB',
        'correct_option' => 'D'
    ],
    [
        'area' => 'Química',
        'enunciado' => 'O etanol (C2H5OH) pode ser obtido pela fermentação de açúcares. Sabendo que a densidade do etanol puro a 20°C é de aproximadamente 0,79 g/mL, e que sua massa molar é de 46 g/mol, qual é a quantidade de matéria (em mol) presente em 500 mL de etanol puro?',
        'option_a' => 'aproximadamente 46,0 mol',
        'option_b' => 'aproximadamente 17,2 mol',
        'option_c' => 'aproximadamente 8,59 mol',
        'option_d' => 'aproximadamente 0,79 mol',
        'option_e' => 'aproximadamente 4,3 mol',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Física',
        'enunciado' => 'Um motorista trafega por uma rodovia e, ao avistar um obstáculo, aciona os freios. O carro desacelera uniformemente de uma velocidade de 72 km/h até parar em uma distância de 40 m. Qual é o módulo da aceleração de frenagem, em metros por segundo ao quadrado (m/s²)?',
        'option_a' => '0,5 m/s²',
        'option_b' => '1,8 m/s²',
        'option_c' => '5,0 m/s²',
        'option_d' => '10,0 m/s²',
        'option_e' => '2,5 m/s²',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Biologia',
        'enunciado' => 'A vacinação é uma das estratégias de saúde pública mais eficazes na prevenção de doenças. Em termos biológicos, o que as vacinas introduzem no organismo e qual é o mecanismo de defesa que elas induzem?',
        'option_a' => 'Introduzem anticorpos prontos, induzindo a imunidade passiva.',
        'option_b' => 'Introduzem parasitas vivos virulentos, induzindo a imunidade natural.',
        'option_c' => 'Introduzem antígenos (patógenos atenuados ou inativados), induzindo a produção de células de memória e anticorpos, caracterizando a imunidade ativa artificial.',
        'option_d' => 'Introduzem células de defesa (leucócitos), aumentando o número de fagócitos.',
        'option_e' => 'Introduzem antibióticos, destruindo o patógeno antes da infecção.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Química',
        'enunciado' => 'A isomeria é um fenômeno da Química Orgânica em que compostos diferentes possuem a mesma fórmula molecular. O but-1-eno e o ciclobutano são exemplos de isômeros que pertencem a classes de funções orgânicas distintas. Qual tipo de isomeria classifica a relação entre but-1-eno (C4H8) e ciclobutano (C4H8)?',
        'option_a' => 'Isomeria de Função',
        'option_b' => 'Isomeria de Posição',
        'option_c' => 'Isomeria de Cadeia',
        'option_d' => 'Isomeria de Compensação (Metameria)',
        'option_e' => 'Tautomeria',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Física',
        'enunciado' => 'Um feixe de luz monocromática passa do ar para um meio transparente (vidro) com índice de refração n = 1,5. Sabendo que a velocidade da luz no vácuo é c ≈ 3,0 x 10⁸ m/s. Qual é a velocidade de propagação da luz ao se propagar no vidro?',
        'option_a' => '1,5 x 10⁸ m/s',
        'option_b' => '2,0 x 10⁸ m/s',
        'option_c' => '3,0 x 10⁸ m/s',
        'option_d' => '4,5 x 10⁸ m/s',
        'option_e' => '2,5 x 10⁸ m/s',
        'correct_option' => 'B'
    ],
    [
        'area' => 'Biologia/Química',
        'enunciado' => 'O aquecimento global é amplamente associado ao aumento da concentração de gases de efeito estufa na atmosfera. Dentre as atividades humanas que mais contribuem para essa concentração, a queima de combustíveis fósseis é a principal responsável pela liberação de qual dos seguintes gases na atmosfera?',
        'option_a' => 'Metano (CH₄)',
        'option_b' => 'Óxido Nitroso (N₂O)',
        'option_c' => 'Ozônio (O₃)',
        'option_d' => 'Dióxido de Carbono (CO₂)',
        'option_e' => 'Gás hidrogênio (H₂)',
        'correct_option' => 'D'
    ],
    [
        'area' => 'Biologia',
        'enunciado' => 'A meiose é um tipo de divisão celular essencial para a reprodução sexuada. Um dos eventos mais importantes da meiose I é o \'crossing-over\' (permuta), que ocorre na Prófase I. Qual é a principal consequência biológica do \'crossing-over\'?',
        'option_a' => 'A redução do número de cromossomos pela metade.',
        'option_b' => 'A formação de duas células diploides geneticamente idênticas à célula-mãe.',
        'option_c' => 'A separação das cromátides-irmãs.',
        'option_d' => 'O aumento da variabilidade genética da espécie, ao trocar material genético entre cromossomos homólogos.',
        'option_e' => 'A duplicação do material genético antes da divisão celular.',
        'correct_option' => 'D'
    ],
    [
        'area' => 'Química',
        'enunciado' => 'O pH de uma solução aquosa é uma medida da sua acidez ou basicidade. Se o pH de uma solução for 11 a 25°C, qual é a concentração de íons hidroxila ([OH⁻]) dessa solução?',
        'option_a' => '1,0 x 10⁻¹¹ mol/L',
        'option_b' => '1,0 x 10⁻⁷ mol/L',
        'option_c' => '1,0 x 10⁻³ mol/L',
        'option_d' => '1,0 x 10¹¹ mol/L',
        'option_e' => '1,0 x 10⁻¹ mol/L',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Física',
        'enunciado' => 'Uma máquina térmica opera entre duas fontes, uma quente a 327°C e uma fria a 27°C. Qual é o rendimento máximo teórico (em porcentagem) que essa máquina pode alcançar, de acordo com o ciclo de Carnot? (Lembre-se de converter a temperatura para Kelvin: T(K) = T(°C) + 273)',
        'option_a' => '90%',
        'option_b' => '50%',
        'option_c' => '10%',
        'option_d' => '75%',
        'option_e' => '60%',
        'correct_option' => 'B'
    ],
    [
        'area' => 'Biologia',
        'enunciado' => 'As células eucarióticas possuem diversas organelas membranosas. O Retículo Endoplasmático Rugoso (RER) e o Complexo de Golgi são organelas que trabalham em conjunto. Qual a principal função desempenhada pelo RER e pelo Complexo de Golgi no que tange à síntese e secreção de proteínas?',
        'option_a' => 'O RER é responsável pela respiração celular, e o Golgi pela fotossíntese.',
        'option_b' => 'O RER sintetiza lipídios, e o Golgi armazena íons de cálcio.',
        'option_c' => 'O RER sintetiza proteínas destinadas à secreção (graças aos ribossomos), e o Golgi as processa, empacota e direciona para a exportação.',
        'option_d' => 'O RER digere macromoléculas, e o Golgi produz energia.',
        'option_e' => 'O RER armazena proteínas, e o Golgi destrói bactérias.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Química',
        'enunciado' => 'Qual é o tipo de ligação química caracterizado pela atração eletrostática entre íons de cargas opostas, resultante da transferência de elétrons entre um metal e um ametal?',
        'option_a' => 'Ligação Covalente',
        'option_b' => 'Ligação Metálica',
        'option_c' => 'Ligação Iônica',
        'option_d' => 'Ligação de Hidrogênio',
        'option_e' => 'Forças de Van der Waals',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Física',
        'enunciado' => 'O que é a Força Eletromotriz (FEM) em um circuito elétrico?',
        'option_a' => 'É a força de atrito que se opõe ao movimento dos elétrons.',
        'option_b' => 'É a energia por unidade de carga fornecida por uma fonte (como uma bateria) ao circuito.',
        'option_c' => 'É a velocidade com que os elétrons se movem no fio.',
        'option_d' => 'É a resistência total do circuito.',
        'option_e' => 'É a potência dissipada pelo resistor.',
        'correct_option' => 'B'
    ],
    [
        'area' => 'Biologia',
        'enunciado' => 'Os fungos desempenham um papel crucial nos ecossistemas. Qual é o principal papel ecológico dos fungos e bactérias no ciclo da matéria?',
        'option_a' => 'São produtores primários, realizando fotossíntese.',
        'option_b' => 'São consumidores primários, alimentando-se de plantas.',
        'option_c' => 'São decompositores, transformando a matéria orgânica morta em inorgânica, que é reciclada no ecossistema.',
        'option_d' => 'São parasitas obrigatórios, causando doenças.',
        'option_e' => 'São responsáveis pela fixação do nitrogênio atmosférico.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Química',
        'enunciado' => 'O que a constante de equilíbrio Kc (ou Keq) de uma reação química indica?',
        'option_a' => 'A velocidade inicial da reação.',
        'option_b' => 'Se a reação é endotérmica ou exotérmica.',
        'option_c' => 'A extensão em que a reação prossegue até atingir o equilíbrio (a razão entre as concentrações de produtos e reagentes no equilíbrio).',
        'option_d' => 'A concentração do solvente na solução.',
        'option_e' => 'A massa molar dos reagentes.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Física',
        'enunciado' => 'Em um movimento circular uniforme, qual é a direção e o sentido da aceleração centrípeta?',
        'option_a' => 'Tangente à trajetória e no sentido do movimento.',
        'option_b' => 'Radial (perpendicular à trajetória) e apontando para o centro da circunferência.',
        'option_c' => 'Radial e apontando para fora da circunferência.',
        'option_d' => 'No sentido do raio e paralela à velocidade.',
        'option_e' => 'Não existe aceleração no movimento uniforme.',
        'correct_option' => 'B'
    ],
    [
        'area' => 'Biologia',
        'enunciado' => 'A membrana plasmática possui a propriedade de permeabilidade seletiva. Qual é o componente principal da membrana plasmática responsável por formar a bicamada que restringe a passagem da maioria das moléculas hidrossolúveis?',
        'option_a' => 'Proteínas integrais',
        'option_b' => 'Glicoproteínas',
        'option_c' => 'Fosfolipídios',
        'option_d' => 'Colesterol',
        'option_e' => 'Carboidratos',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Química',
        'enunciado' => 'Em uma titulação ácido-base, o que é o ponto de equivalência?',
        'option_a' => 'O ponto em que a cor do indicador muda.',
        'option_b' => 'O ponto em que a concentração do ácido é igual à concentração da base.',
        'option_c' => 'O ponto em que a quantidade de mols de ácido adicionada é quimicamente equivalente à quantidade de mols de base presente inicialmente (ou vice-versa).',
        'option_d' => 'O ponto de saturação da solução.',
        'option_e' => 'O ponto em que o pH é sempre 7.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Física',
        'enunciado' => 'Qual é a unidade de medida do trabalho (W) no Sistema Internacional de Unidades (SI)?',
        'option_a' => 'Watt (W)',
        'option_b' => 'Newton (N)',
        'option_c' => 'Joule (J)',
        'option_d' => 'Pascal (Pa)',
        'option_e' => 'Ampère (A)',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Biologia',
        'enunciado' => 'A Síndrome de Down é uma alteração genética resultante da trissomia do cromossomo 21. Qual é o mecanismo celular que geralmente leva à ocorrência dessa trissomia?',
        'option_a' => 'Mutação gênica pontual.',
        'option_b' => 'Translocação cromossômica.',
        'option_c' => 'Não disjunção dos cromossomos homólogos ou das cromátides-irmãs durante a meiose.',
        'option_d' => 'Deleção de um segmento cromossômico.',
        'option_e' => 'Inversão cromossômica.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Química',
        'enunciado' => 'Em uma solução aquosa saturada de um sal pouco solúvel, o que a constante do produto de solubilidade (Kps) representa?',
        'option_a' => 'A concentração total do sal na solução.',
        'option_b' => 'A razão entre a concentração do soluto e do solvente.',
        'option_c' => 'O produto das concentrações dos íons em solução no equilíbrio, elevadas aos seus coeficientes estequiométricos.',
        'option_d' => 'A velocidade com que o sal se dissolve.',
        'option_e' => 'A mudança de entalpia da dissolução.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Física',
        'enunciado' => 'Qual é a principal lei física que governa o funcionamento de um freio hidráulico em um automóvel, garantindo que a força aplicada pelo motorista no pedal seja multiplicada nas rodas?',
        'option_a' => 'Lei da Conservação da Energia',
        'option_b' => 'Lei de Ohm',
        'option_c' => 'Lei de Pascal',
        'option_d' => 'Lei da Gravitação Universal',
        'option_e' => 'Lei de Lenz',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Biologia',
        'enunciado' => 'A fotossíntese e a respiração celular são processos cruciais para a vida. Qual é o organela celular onde ocorre a fotossíntese nas plantas e algas?',
        'option_a' => 'Mitocôndria',
        'option_b' => 'Lisossomo',
        'option_c' => 'Cloroplasto',
        'option_d' => 'Ribossomo',
        'option_e' => 'Complexo de Golgi',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Química',
        'enunciado' => 'Em relação às transformações químicas, o que é um catalisador?',
        'option_a' => 'Uma substância que é consumida durante a reação.',
        'option_b' => 'Uma substância que aumenta o calor liberado pela reação.',
        'option_c' => 'Uma substância que aumenta a velocidade da reação, diminuindo a energia de ativação, mas que não é consumida no processo.',
        'option_d' => 'Uma substância que desloca o equilíbrio químico.',
        'option_e' => 'Uma substância que aumenta a concentração dos produtos no equilíbrio.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Física',
        'enunciado' => 'Qual é o princípio físico que explica a sustentação aerodinâmica de uma asa de avião, ou seja, a diferença de pressão entre a parte superior e inferior da asa devido à diferença na velocidade do ar?',
        'option_a' => 'Lei de Newton',
        'option_b' => 'Princípio de Arquimedes',
        'option_c' => 'Princípio de Bernoulli',
        'option_d' => 'Lei de Coulomb',
        'option_e' => 'Lei de Snell',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Biologia',
        'enunciado' => 'A transcrição e a tradução são os dois processos centrais na expressão gênica. Onde e o que é produzido no processo de transcrição em uma célula eucariótica?',
        'option_a' => 'No citoplasma, produzindo proteínas.',
        'option_b' => 'No núcleo, produzindo RNA a partir de uma fita de DNA.',
        'option_c' => 'No ribossomo, produzindo DNA.',
        'option_d' => 'Na mitocôndria, produzindo ATP.',
        'option_e' => 'No núcleo, produzindo proteínas a partir de RNA.',
        'correct_option' => 'B'
    ],
    [
        'area' => 'Química',
        'enunciado' => 'Um elemento químico possui número atômico (Z) igual a 15. Quantos elétrons de valência esse elemento possui e a qual grupo/família da tabela periódica ele pertence?',
        'option_a' => '3 elétrons, Grupo 13 (Família do Boro)',
        'option_b' => '5 elétrons, Grupo 15 (Família do Nitrogênio)',
        'option_c' => '2 elétrons, Grupo 2 (Metais Alcalino-Terrosos)',
        'option_d' => '15 elétrons, Grupo 15',
        'option_e' => '4 elétrons, Grupo 14 (Família do Carbono)',
        'correct_option' => 'B'
    ],
    [
        'area' => 'Física',
        'enunciado' => 'Qual fenômeno óptico é responsável pela formação das cores do arco-íris, que ocorre quando a luz branca atravessa gotículas de água?',
        'option_a' => 'Reflexão total',
        'option_b' => 'Difração',
        'option_c' => 'Dispersão (ou Refração)',
        'option_d' => 'Interferência',
        'option_e' => 'Polarização',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Biologia',
        'enunciado' => 'O diabetes mellitus tipo 1 é caracterizado pela destruição das células beta do pâncreas. Qual é o papel dessas células no metabolismo e qual hormônio elas produzem?',
        'option_a' => 'Produzem glucagon, elevando o nível de glicose no sangue.',
        'option_b' => 'Produzem adrenalina, regulando a pressão arterial.',
        'option_c' => 'Produzem insulina, que atua na redução do nível de glicose no sangue (glicemia).',
        'option_d' => 'Produzem tiroxina, regulando o metabolismo basal.',
        'option_e' => 'Produzem amilase, ajudando na digestão.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Química',
        'enunciado' => 'O que é um ácido de Brønsted-Lowry?',
        'option_a' => 'Uma substância que, em solução aquosa, aumenta a concentração de íons OH⁻.',
        'option_b' => 'Uma substância que, em solução aquosa, aumenta a concentração de íons H⁺.',
        'option_c' => 'Uma espécie química capaz de doar um próton (H⁺).',
        'option_d' => 'Uma espécie química capaz de receber um par de elétrons.',
        'option_e' => 'Uma espécie química capaz de receber um próton (H⁺).',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Física',
        'enunciado' => 'Qual é o princípio de conservação que afirma que, em um sistema isolado, a quantidade de movimento (momento linear) total permanece constante?',
        'option_a' => 'Princípio da Conservação da Energia',
        'option_b' => 'Princípio da Conservação da Massa',
        'option_c' => 'Princípio da Conservação do Momento Linear',
        'option_d' => 'Princípio da Inércia',
        'option_e' => 'Princípio da Ação e Reação',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Biologia',
        'enunciado' => 'O que são células-tronco e qual a sua principal característica que as torna promissoras para a medicina regenerativa?',
        'option_a' => 'São células totalmente especializadas, encontradas apenas em embriões.',
        'option_b' => 'São células que só se encontram em organismos adultos, com capacidade limitada de divisão.',
        'option_c' => 'São células não especializadas com a capacidade de se autorrenovar e se diferenciar em diversos tipos de células especializadas do corpo.',
        'option_d' => 'São células de defesa do sistema imunológico, responsáveis pela memória imunológica.',
        'option_e' => 'São células musculares que se dividem rapidamente em resposta a lesões.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Química',
        'enunciado' => 'Na nomenclatura de compostos inorgânicos, o prefixo \'per-\' e o sufixo \'-ico\' (ex: ácido perclórico, HClO₄) indicam o estado de oxidação (Nox) mais alto de um elemento. Qual é o Nox do cloro (Cl) no ácido perclórico (HClO₄)?',
        'option_a' => '+1',
        'option_b' => '+3',
        'option_c' => '+5',
        'option_d' => '+7',
        'option_e' => '-1',
        'correct_option' => 'D'
    ],
    [
        'area' => 'Física',
        'enunciado' => 'A segunda lei de Newton (Lei Fundamental da Dinâmica) pode ser expressa matematicamente pela relação F = m * a. O que essa lei estabelece sobre o movimento de um corpo?',
        'option_a' => 'Que um corpo em repouso tende a permanecer em repouso.',
        'option_b' => 'Que a toda ação corresponde uma reação de mesma intensidade e direção, mas sentido oposto.',
        'option_c' => 'Que a força resultante que atua sobre um corpo é diretamente proporcional ao produto de sua massa pela aceleração adquirida.',
        'option_d' => 'Que a energia é conservada em um sistema isolado.',
        'option_e' => 'Que o impulso é igual à variação do momento linear.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Biologia',
        'enunciado' => 'O que é o nicho ecológico de uma espécie?',
        'option_a' => 'O local geográfico onde a espécie vive (seu habitat).',
        'option_b' => 'O número de indivíduos da espécie em uma determinada área.',
        'option_c' => 'O conjunto de condições e recursos que a espécie utiliza, incluindo o seu papel na cadeia alimentar, seu modo de vida e suas interações com outros organismos.',
        'option_d' => 'O nível trófico que a espécie ocupa na teia alimentar.',
        'option_e' => 'A relação de predação que a espécie estabelece.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Química',
        'enunciado' => 'Qual é a principal característica que diferencia um alcano de um alceno e um alcino?',
        'option_a' => 'O alcano possui cadeia aberta, o alceno cadeia fechada.',
        'option_b' => 'O alcano possui ligações duplas, o alceno ligações simples.',
        'option_c' => 'O alcano possui apenas ligações simples entre carbonos, o alceno possui pelo menos uma ligação dupla, e o alcino, pelo menos uma tripla.',
        'option_d' => 'O alcano é um hidrocarboneto aromático.',
        'option_e' => 'O alcano não possui hidrogênios.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Física',
        'enunciado' => 'O que a Lei de Coulomb descreve?',
        'option_a' => 'A força de atrito entre duas superfícies.',
        'option_b' => 'A força de atração ou repulsão entre duas cargas elétricas pontuais.',
        'option_c' => 'A relação entre a tensão, corrente e resistência em um circuito.',
        'option_d' => 'O comportamento de um gás ideal.',
        'option_e' => 'A força gravitacional entre duas massas.',
        'correct_option' => 'B'
    ],
    [
        'area' => 'Biologia',
        'enunciado' => 'O que são enzimas e qual a sua função biológica principal?',
        'option_a' => 'São carboidratos que fornecem energia para a célula.',
        'option_b' => 'São ácidos nucleicos que armazenam informação genética.',
        'option_c' => 'São proteínas que atuam como catalisadores biológicos, acelerando reações químicas sem serem consumidas.',
        'option_d' => 'São lipídios que formam a membrana plasmática.',
        'option_e' => 'São vitaminas essenciais para a visão.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Química',
        'enunciado' => 'O que é o número de Avogadro e qual o seu valor (aproximado)?',
        'option_a' => 'A quantidade de prótons em um átomo (6,02 x 10²³).',
        'option_b' => 'O número de massa de um elemento (6,02 x 10²³).',
        'option_c' => 'O número de partículas elementares (átomos, moléculas, etc.) presentes em um mol de qualquer substância (6,02 x 10²³).',
        'option_d' => 'A constante universal dos gases (8,31 J/mol.K).',
        'option_e' => 'A constante de Planck (6,62 x 10⁻³⁴ J.s).',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Física',
        'enunciado' => 'Qual é a grandeza física que representa a taxa de variação da velocidade em relação ao tempo?',
        'option_a' => 'Velocidade Média',
        'option_b' => 'Deslocamento',
        'option_c' => 'Aceleração',
        'option_d' => 'Tempo',
        'option_e' => 'Força',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Biologia',
        'enunciado' => 'O que é um organismo heterotrófico?',
        'option_a' => 'Um organismo capaz de produzir seu próprio alimento a partir de CO₂ e luz (fotossíntese).',
        'option_b' => 'Um organismo que obtém seu alimento a partir da oxidação de compostos inorgânicos (quimiossíntese).',
        'option_c' => 'Um organismo que obtém seu alimento consumindo outros organismos (matéria orgânica), pois não é capaz de produzi-lo.',
        'option_d' => 'Um organismo que vive em ambientes extremos (extremófilo).',
        'option_e' => 'Um organismo que só se reproduz assexuadamente.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Química',
        'enunciado' => 'O que significa dizer que uma ligação covalente é polar?',
        'option_a' => 'Os átomos compartilham elétrons de forma perfeitamente igual.',
        'option_b' => 'Os átomos envolvidos são metais.',
        'option_c' => 'Os elétrons são compartilhados de forma desigual devido à diferença de eletronegatividade entre os átomos, criando polos de carga parcial.',
        'option_d' => 'A ligação ocorre pela transferência completa de elétrons.',
        'option_e' => 'A molécula resultante é apolar.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Física',
        'enunciado' => 'Em um sistema conservativo (sem atrito), o que acontece com a Energia Mecânica (Em) de um objeto em movimento?',
        'option_a' => 'Ela aumenta continuamente.',
        'option_b' => 'Ela diminui continuamente.',
        'option_c' => 'Ela é conservada (permanece constante), sendo a soma da Energia Cinética e da Energia Potencial.',
        'option_d' => 'Ela é totalmente transformada em calor.',
        'option_e' => 'Ela se torna zero no ponto mais alto.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Biologia',
        'enunciado' => 'O que são vírus e qual a sua principal característica que os coloca em um limite entre o que é considerado vivo e não vivo?',
        'option_a' => 'São células eucarióticas com reprodução lenta.',
        'option_b' => 'São organismos procariontes que realizam quimiossíntese.',
        'option_c' => 'São parasitas intracelulares obrigatórios que não possuem metabolismo próprio, dependendo da maquinaria celular do hospedeiro para se reproduzir.',
        'option_d' => 'São fungos multicelulares que causam micoses.',
        'option_e' => 'São bactérias resistentes a antibióticos.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Química',
        'enunciado' => 'O que é a entalpia (H) de uma substância ou sistema?',
        'option_a' => 'A temperatura em que o sistema se encontra.',
        'option_b' => 'A energia cinética das moléculas.',
        'option_c' => 'O conteúdo energético (calor) armazenado no sistema, em pressão constante.',
        'option_d' => 'A variação de energia interna do sistema.',
        'option_e' => 'A desordem do sistema (entropia).',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Física',
        'enunciado' => 'A Lei de Snell-Descartes rege qual fenômeno óptico?',
        'option_a' => 'Reflexão da luz em superfícies espelhadas.',
        'option_b' => 'Difração da luz ao passar por um orifício.',
        'option_c' => 'Refração da luz, ou seja, a mudança na direção de um feixe de luz ao passar de um meio para outro.',
        'option_d' => 'Polarização da luz.',
        'option_e' => 'Interferência luminosa.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Biologia',
        'enunciado' => 'Em Genética, o que são alelos múltiplos (ou polialelia) e qual é o exemplo clássico que ilustra esse conceito em humanos?',
        'option_a' => 'Quando um gene está em mais de um cromossomo.',
        'option_b' => 'Quando um gene possui apenas dois alelos possíveis (dominante e recessivo).',
        'option_c' => 'Quando um gene apresenta três ou mais alelos possíveis na população (ex: Sistema Sanguíneo ABO).',
        'option_d' => 'Quando dois genes diferentes afetam a mesma característica.',
        'option_e' => 'Quando o alelo dominante é mais forte que o recessivo.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Química',
        'enunciado' => 'O que é a eletronegatividade de um átomo?',
        'option_a' => 'A tendência de um átomo em perder elétrons.',
        'option_b' => 'A quantidade de energia necessária para remover um elétron.',
        'option_c' => 'A capacidade de um átomo em atrair elétrons para si em uma ligação química.',
        'option_d' => 'O raio atômico do átomo.',
        'option_e' => 'A tendência de um átomo em se ligar a metais.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Física',
        'enunciado' => 'Qual é a principal função de um transformador em circuitos elétricos de corrente alternada (CA)?',
        'option_a' => 'Converter corrente alternada em corrente contínua.',
        'option_b' => 'Armazenar energia potencial elétrica.',
        'option_c' => 'Modificar os valores de tensão (voltagem) e corrente elétrica, mantendo a potência (idealmente) constante.',
        'option_d' => 'Aumentar a frequência da corrente elétrica.',
        'option_e' => 'Medir a resistência do circuito.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Biologia',
        'enunciado' => 'O que é o processo de Osmose?',
        'option_a' => 'O transporte de íons através da membrana celular por bombas de sódio e potássio.',
        'option_b' => 'A passagem de solutos através da membrana plasmática.',
        'option_c' => 'A passagem do solvente (geralmente água) através de uma membrana semipermeável, do meio menos concentrado (hipotônico) para o mais concentrado (hipertônico).',
        'option_d' => 'O consumo de oxigênio pela célula.',
        'option_e' => 'O processo de quebra de grandes moléculas em moléculas menores.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Química',
        'enunciado' => 'O que é um sal na perspectiva das reações ácido-base?',
        'option_a' => 'Uma substância que, em solução aquosa, aumenta a concentração de íons OH⁻.',
        'option_b' => 'Uma substância que, em solução aquosa, aumenta a concentração de íons H⁺.',
        'option_c' => 'O produto da reação entre dois elementos metálicos.',
        'option_d' => 'O produto (iônico) da reação de neutralização entre um ácido e uma base.',
        'option_e' => 'Um composto que só possui ligações covalentes.',
        'correct_option' => 'D'
    ],
    [
        'area' => 'Física',
        'enunciado' => 'A lei de Kirchhoff para correntes (Lei dos Nós) estabelece que:',
        'option_a' => 'A soma das tensões em um circuito fechado é nula.',
        'option_b' => 'A energia potencial é conservada.',
        'option_c' => 'A soma das correntes que chegam a um nó é igual à soma das correntes que saem.',
        'option_d' => 'A força é igual à massa vezes aceleração.',
        'option_e' => 'O calor é a energia em trânsito.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Biologia',
        'enunciado' => 'Qual é o principal mecanismo de transporte de glicose para dentro das células, mediado pelo hormônio insulina?',
        'option_a' => 'Osmose.',
        'option_b' => 'Difusão simples.',
        'option_c' => 'Transporte ativo primário.',
        'option_d' => 'Difusão facilitada.',
        'option_e' => 'Endocitose.',
        'correct_option' => 'D'
    ],
    [
        'area' => 'Química',
        'enunciado' => 'O que é um hidrocarboneto aromático?',
        'option_a' => 'Um composto com apenas ligações simples.',
        'option_b' => 'Um composto cíclico saturado.',
        'option_c' => 'Um composto que contém um ou mais anéis benzênicos.',
        'option_d' => 'Um composto que contém um grupo hidroxila.',
        'option_e' => 'Um composto com ligações triplas.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Física',
        'enunciado' => 'Qual é a unidade de medida da potência (P) no Sistema Internacional (SI)?',
        'option_a' => 'Joule (J).',
        'option_b' => 'Newton (N).',
        'option_c' => 'Watt (W).',
        'option_d' => 'Ampère (A).',
        'option_e' => 'Volt (V).',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Biologia',
        'enunciado' => 'O tecido animal responsável pela contração e movimentação do corpo e dos órgãos internos é o:',
        'option_a' => 'Tecido Epitelial.',
        'option_b' => 'Tecido Conjuntivo.',
        'option_c' => 'Tecido Nervoso.',
        'option_d' => 'Tecido Muscular.',
        'option_e' => 'Tecido Adiposo.',
        'correct_option' => 'D'
    ],
    [
        'area' => 'Química',
        'enunciado' => 'A transformação de um sólido diretamente para o estado gasoso, sem passar pelo estado líquido, é chamada de:',
        'option_a' => 'Fusão.',
        'option_b' => 'Ebulição.',
        'option_c' => 'Condensação.',
        'option_d' => 'Sublimação.',
        'option_e' => 'Liquefação.',
        'correct_option' => 'D'
    ],
    [
        'area' => 'Física',
        'enunciado' => 'Qual o nome do fenômeno que ocorre quando uma onda, ao encontrar um obstáculo, é refletida de volta ao meio original?',
        'option_a' => 'Refração.',
        'option_b' => 'Difração.',
        'option_c' => 'Interferência.',
        'option_d' => 'Reflexão.',
        'option_e' => 'Polarização.',
        'correct_option' => 'D'
    ],
    [
        'area' => 'Biologia',
        'enunciado' => 'Qual organela é responsável pela digestão intracelular, contendo enzimas hidrolíticas?',
        'option_a' => 'Mitocôndria.',
        'option_b' => 'Complexo de Golgi.',
        'option_c' => 'Lisossomo.',
        'option_d' => 'Ribossomo.',
        'option_e' => 'Núcleo.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Química',
        'enunciado' => 'A reação entre um ácido e uma base que resulta em sal e água é uma reação de:',
        'option_a' => 'Oxirredução.',
        'option_b' => 'Síntese.',
        'option_c' => 'Neutralização.',
        'option_d' => 'Decomposição.',
        'option_e' => 'Substituição.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Física',
        'enunciado' => 'A primeira lei de Newton (Lei da Inércia) estabelece que um corpo tende a manter seu estado de repouso ou movimento retilíneo uniforme, a menos que:',
        'option_a' => 'Sua massa seja zero.',
        'option_b' => 'Uma força resultante não nula atue sobre ele.',
        'option_c' => 'A aceleração seja constante.',
        'option_d' => 'A velocidade seja zero.',
        'option_e' => 'O tempo seja nulo.',
        'correct_option' => 'B'
    ],
    [
        'area' => 'Biologia',
        'enunciado' => 'O que são organismos quimioautotróficos?',
        'option_a' => 'Organismos que usam luz para produzir alimento.',
        'option_b' => 'Organismos que consomem matéria orgânica.',
        'option_c' => 'Organismos que usam energia liberada por reações inorgânicas para produzir alimento.',
        'option_d' => 'Organismos que vivem em ambientes ácidos.',
        'option_e' => 'Organismos que se movem por flagelos.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Química',
        'enunciado' => 'O que é o número de oxidação (Nox) de um átomo?',
        'option_a' => 'O número de massa.',
        'option_b' => 'A carga elétrica real ou hipotética de um átomo em um composto.',
        'option_c' => 'O número de nêutrons.',
        'option_d' => 'A quantidade de mols.',
        'option_e' => 'O número atômico.',
        'correct_option' => 'B'
    ],
    [
        'area' => 'Física',
        'enunciado' => 'Qual a principal característica do movimento uniformemente variado (MUV)?',
        'option_a' => 'Velocidade constante.',
        'option_b' => 'Aceleração nula.',
        'option_c' => 'Aceleração constante e não nula.',
        'option_d' => 'Força resultante nula.',
        'option_e' => 'Posição constante.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Biologia',
        'enunciado' => 'Qual o nome da estrutura responsável por conectar o osso ao músculo?',
        'option_a' => 'Ligamento.',
        'option_b' => 'Cartilagem.',
        'option_c' => 'Tendão.',
        'option_d' => 'Articulação.',
        'option_e' => 'Epitélio.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Química',
        'enunciado' => 'A desnaturação de uma proteína é a perda de sua estrutura tridimensional (secundária, terciária ou quaternária). O que tipicamente causa a desnaturação?',
        'option_a' => 'Congelamento.',
        'option_b' => 'Aumento de pH e temperatura.',
        'option_c' => 'Pressão elevada.',
        'option_d' => 'Diluição em água.',
        'option_e' => 'Aumento de massa.',
        'correct_option' => 'B'
    ],
    [
        'area' => 'Física',
        'enunciado' => 'A lei de Hooke descreve o comportamento de qual tipo de material ou sistema?',
        'option_a' => 'Circuitos elétricos.',
        'option_b' => 'Molas ou materiais elásticos.',
        'option_c' => 'Fluidos em movimento.',
        'option_d' => 'Ondas sonoras.',
        'option_e' => 'Corpos rígidos.',
        'correct_option' => 'B'
    ],
    [
        'area' => 'Biologia',
        'enunciado' => 'A hemoglobina, responsável pelo transporte de oxigênio no sangue, é um exemplo de qual biomolécula?',
        'option_a' => 'Carboidrato.',
        'option_b' => 'Lipídio.',
        'option_c' => 'Ácido nucleico.',
        'option_d' => 'Proteína.',
        'option_e' => 'Vitamina.',
        'correct_option' => 'D'
    ],
    [
        'area' => 'Química',
        'enunciado' => 'Qual é o principal componente do gás natural (combustível)?',
        'option_a' => 'Etano (C₂H₆).',
        'option_b' => 'Propano (C₃H₈).',
        'option_c' => 'Metano (CH₄).',
        'option_d' => 'Butano (C₄H₁₀).',
        'option_e' => 'Dióxido de Carbono (CO₂).',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Física',
        'enunciado' => 'O que é a pressão em um fluido?',
        'option_a' => 'Força total exercida pelo fluido.',
        'option_b' => 'Força exercida por unidade de área.',
        'option_c' => 'Densidade do fluido.',
        'option_d' => 'Volume do fluido.',
        'option_e' => 'Temperatura do fluido.',
        'correct_option' => 'B'
    ],
    [
        'area' => 'Biologia',
        'enunciado' => 'A barreira de proteção primária das plantas contra a perda de água por transpiração é a:',
        'option_a' => 'Epiderme.',
        'option_b' => 'Estômato.',
        'option_c' => 'Cutícula.',
        'option_d' => 'Parênquima.',
        'option_e' => 'Xilema.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Química',
        'enunciado' => 'Qual é o estado físico da água em 0°C e 1 atm de pressão?',
        'option_a' => 'Somente líquido.',
        'option_b' => 'Somente sólido.',
        'option_c' => 'Equilíbrio entre sólido e líquido.',
        'option_d' => 'Somente gasoso.',
        'option_e' => 'Plasma.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Física',
        'enunciado' => 'O que é o calor latente?',
        'option_a' => 'A energia liberada pela combustão.',
        'option_b' => 'O calor necessário para elevar a temperatura.',
        'option_c' => 'O calor absorvido ou liberado durante uma mudança de fase em temperatura constante.',
        'option_d' => 'A temperatura de fusão.',
        'option_e' => 'A energia potencial.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Biologia',
        'enunciado' => 'O pâncreas é uma glândula mista, atuando na digestão (função exócrina) e na regulação glicêmica (função endócrina). Qual é o produto da sua função exócrina?',
        'option_a' => 'Insulina.',
        'option_b' => 'Glucagon.',
        'option_c' => 'Suco pancreático.',
        'option_d' => 'Bile.',
        'option_e' => 'Tiroxina.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Química',
        'enunciado' => 'Qual o nome do grupo funcional (-COOH) que caracteriza os ácidos carboxílicos?',
        'option_a' => 'Carbonila.',
        'option_b' => 'Hidroxila.',
        'option_c' => 'Carboxila.',
        'option_d' => 'Éster.',
        'option_e' => 'Aldeído.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Física',
        'enunciado' => 'A cor que um objeto apresenta é determinada pelas frequências de luz que ele:',
        'option_a' => 'Absorve.',
        'option_b' => 'Refrata.',
        'option_c' => 'Dispersa.',
        'option_d' => 'Reflete.',
        'option_e' => 'Transmite.',
        'correct_option' => 'D'
    ],
    [
        'area' => 'Biologia',
        'enunciado' => 'O que é o cariótipo de um indivíduo?',
        'option_a' => 'A sequência de DNA de um gene.',
        'option_b' => 'A totalidade de proteínas de uma célula.',
        'option_c' => 'O conjunto de cromossomos ordenados por tamanho e forma.',
        'option_d' => 'A representação do RNA mensageiro.',
        'option_e' => 'O DNA total da mitocôndria.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Química',
        'enunciado' => 'Na eletrólise, o polo onde ocorre a oxidação é chamado de:',
        'option_a' => 'Cátodo.',
        'option_b' => 'Ânodo.',
        'option_c' => 'Eletrodo inerte.',
        'option_d' => 'Ponte salina.',
        'option_e' => 'Eletrólito.',
        'correct_option' => 'B'
    ],
    [
        'area' => 'Física',
        'enunciado' => 'O princípio de Arquimedes explica qual fenômeno?',
        'option_a' => 'A velocidade de propagação do som.',
        'option_b' => 'A pressão em fluidos.',
        'option_c' => 'O empuxo (flutuação de corpos imersos em fluidos).',
        'option_d' => 'O funcionamento de transformadores.',
        'option_e' => 'A dilatação dos corpos.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Biologia',
        'enunciado' => 'O que são organismos diploides?',
        'option_a' => 'Organismos que se reproduzem assexuadamente.',
        'option_b' => 'Organismos que possuem apenas um conjunto de cromossomos.',
        'option_c' => 'Organismos que possuem dois conjuntos de cromossomos homólogos (2n).',
        'option_d' => 'Organismos que realizam fotossíntese.',
        'option_e' => 'Organismos que têm células mortas.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Química',
        'enunciado' => 'A reação de combustão completa de um hidrocarboneto sempre produz:',
        'option_a' => 'Monóxido de carbono e água.',
        'option_b' => 'Carbono e hidrogênio.',
        'option_c' => 'Gás carbônico (CO₂) e água (H₂O).',
        'option_d' => 'Ácido e base.',
        'option_e' => 'Metano e etano.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Física',
        'enunciado' => 'O que é a lei da Conservação da Energia Mecânica?',
        'option_a' => 'A energia é criada em colisões.',
        'option_b' => 'A energia potencial é sempre maior que a cinética.',
        'option_c' => 'Em sistemas conservativos, a soma da energia cinética e potencial é constante.',
        'option_d' => 'A energia é perdida como calor.',
        'option_e' => 'O momento é conservado.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Biologia',
        'enunciado' => 'Qual é o nome dado à associação simbiótica entre fungos e raízes de plantas, que facilita a absorção de água e nutrientes?',
        'option_a' => 'Liquen.',
        'option_b' => 'Micorriza.',
        'option_c' => 'Colônia.',
        'option_d' => 'Parasitismo.',
        'option_e' => 'Comensalismo.',
        'correct_option' => 'B'
    ],
    [
        'area' => 'Química',
        'enunciado' => 'Qual elemento químico é o mais eletronegativo?',
        'option_a' => 'Cloro (Cl).',
        'option_b' => 'Oxigênio (O).',
        'option_c' => 'Flúor (F).',
        'option_d' => 'Nitrogênio (N).',
        'option_e' => 'Césio (Cs).',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Física',
        'enunciado' => 'O que é a refração da luz?',
        'option_a' => 'O desvio da luz ao passar por um espelho.',
        'option_b' => 'O fenômeno de reflexão total.',
        'option_c' => 'A mudança de velocidade e direção da luz ao passar de um meio para outro.',
        'option_d' => 'A separação da luz em cores.',
        'option_e' => 'A formação de sombras.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Biologia',
        'enunciado' => 'O que é um gene?',
        'option_a' => 'Uma proteína responsável pela catálise.',
        'option_b' => 'Uma sequência de DNA que contém informação para a síntese de uma proteína ou RNA.',
        'option_c' => 'Um carboidrato de reserva.',
        'option_d' => 'O cromossomo inteiro.',
        'option_e' => 'Um lipídio complexo.',
        'correct_option' => 'B'
    ],
    [
        'area' => 'Química',
        'enunciado' => 'A água é considerada um **solvente universal** devido à sua:',
        'option_a' => 'Baixa densidade.',
        'option_b' => 'Alta massa molar.',
        'option_c' => 'Polaridade e capacidade de formar ligações de hidrogênio.',
        'option_d' => 'Capacidade de se decompor facilmente.',
        'option_e' => 'Baixo ponto de ebulição.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Física',
        'enunciado' => 'Qual a unidade de medida da frequência (f) no Sistema Internacional (SI)?',
        'option_a' => 'Metro por segundo (m/s).',
        'option_b' => 'Segundo (s).',
        'option_c' => 'Hertz (Hz).',
        'option_d' => 'Radiano (rad).',
        'option_e' => 'Newton (N).',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Biologia',
        'enunciado' => 'Qual o nome da estrutura de armazenamento de energia nas células vegetais?',
        'option_a' => 'Glicogênio.',
        'option_b' => 'Amido.',
        'option_c' => 'Colesterol.',
        'option_d' => 'Quitina.',
        'option_e' => 'Celulose.',
        'correct_option' => 'B'
    ],
    [
        'area' => 'Química',
        'enunciado' => 'O que o princípio de Le Chatelier prevê em um equilíbrio químico?',
        'option_a' => 'Como aumentar a velocidade da reação.',
        'option_b' => 'Como a temperatura afeta a solubilidade.',
        'option_c' => 'Como o equilíbrio se desloca em resposta a alterações de temperatura, pressão ou concentração.',
        'option_d' => 'A lei da conservação das massas.',
        'option_e' => 'A variação de entalpia.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Física',
        'enunciado' => 'Qual a principal diferença entre calor e temperatura?',
        'option_a' => 'Calor é a energia interna, temperatura é a energia cinética.',
        'option_b' => 'Calor é a energia em trânsito, temperatura é a medida do grau de agitação das moléculas.',
        'option_c' => 'São sinônimos.',
        'option_d' => 'Calor é medido em Celsius, temperatura em Joule.',
        'option_e' => 'Calor é medido em Kelvin, temperatura em Joule.',
        'correct_option' => 'B'
    ],
    [
        'area' => 'Biologia',
        'enunciado' => 'Qual a principal função das vitaminas no organismo humano?',
        'option_a' => 'Fornecer grande quantidade de energia.',
        'option_b' => 'Atuar como catalisadores e cofatores em reações metabólicas.',
        'option_c' => 'Formar a estrutura óssea.',
        'option_d' => 'Formar a membrana celular.',
        'option_e' => 'Transportar oxigênio.',
        'correct_option' => 'B'
    ],
    [
        'area' => 'Química',
        'enunciado' => 'O que é uma reação de oxirredução?',
        'option_a' => 'Uma reação que absorve calor.',
        'option_b' => 'Uma reação que forma água e sal.',
        'option_c' => 'Uma reação onde ocorre transferência de elétrons (alteração nos Nox).',
        'option_d' => 'Uma reação com catalisador.',
        'option_e' => 'Uma reação de dupla-troca.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Física',
        'enunciado' => 'Qual a grandeza vetorial que mede a variação da posição de um corpo no espaço?',
        'option_a' => 'Distância percorrida.',
        'option_b' => 'Velocidade escalar.',
        'option_c' => 'Deslocamento (vetor).',
        'option_d' => 'Trajetória.',
        'option_e' => 'Aceleração escalar.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Biologia',
        'enunciado' => 'O que é a meiose?',
        'option_a' => 'Divisão celular que gera células idênticas à mãe.',
        'option_b' => 'Processo de duplicação do DNA.',
        'option_c' => 'Divisão celular que reduz o número de cromossomos pela metade, gerando gametas.',
        'option_d' => 'Processo de síntese de proteínas.',
        'option_e' => 'Divisão celular de bactérias.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Química',
        'enunciado' => 'Qual é o pH de uma solução que é considerada neutra a 25°C?',
        'option_a' => 'pH < 7.',
        'option_b' => 'pH = 7.',
        'option_c' => 'pH > 7.',
        'option_d' => 'pH = 14.',
        'option_e' => 'pH = 0.',
        'correct_option' => 'B'
    ],
    [
        'area' => 'Física',
        'enunciado' => 'A lei de Fourier descreve a transferência de calor por:',
        'option_a' => 'Convecção.',
        'option_b' => 'Radiação.',
        'option_c' => 'Condução.',
        'option_d' => 'Advecção.',
        'option_e' => 'Indução.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Biologia',
        'enunciado' => 'O que são hormônios?',
        'option_a' => 'Proteínas estruturais.',
        'option_b' => 'Moléculas sinalizadoras produzidas por glândulas endócrinas que regulam funções.',
        'option_c' => 'Enzimas digestivas.',
        'option_d' => 'Ácidos nucleicos.',
        'option_e' => 'Carboidratos de reserva.',
        'correct_option' => 'B'
    ],
    [
        'area' => 'Química',
        'enunciado' => 'Qual é a fórmula molecular do ozônio?',
        'option_a' => 'O₂.',
        'option_b' => 'CO₂.',
        'option_c' => 'O₃.',
        'option_d' => 'H₂O.',
        'option_e' => 'N₂.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Física',
        'enunciado' => 'O que o princípio de Huygens explica sobre ondas?',
        'option_a' => 'A conservação de energia.',
        'option_b' => 'Que cada ponto de uma frente de onda é uma fonte de ondas secundárias.',
        'option_c' => 'A força gravitacional.',
        'option_d' => 'A resistência elétrica.',
        'option_e' => 'A dilatação térmica.',
        'correct_option' => 'B'
    ],
    [
        'area' => 'Biologia',
        'enunciado' => 'Qual o processo que permite aos organismos obter energia a partir da quebra de glicose **sem o uso de oxigênio**?',
        'option_a' => 'Respiração celular aeróbica.',
        'option_b' => 'Fotossíntese.',
        'option_c' => 'Fermentação (e glicólise).',
        'option_d' => 'Ciclo de Krebs.',
        'option_e' => 'Fosforilação oxidativa.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Química',
        'enunciado' => 'Qual é o nome da técnica utilizada para separar componentes de uma mistura heterogênea de um sólido disperso em um líquido?',
        'option_a' => 'Destilação.',
        'option_b' => 'Sublimação.',
        'option_c' => 'Decantação (ou Filtração).',
        'option_d' => 'Cromatografia.',
        'option_e' => 'Floculação.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Física',
        'enunciado' => 'O que é a lei da Gravitação Universal de Newton?',
        'option_a' => 'Descreve o movimento de planetas em órbitas elípticas.',
        'option_b' => 'Descreve a atração entre duas massas, proporcional ao produto das massas e inversamente proporcional ao quadrado da distância.',
        'option_c' => 'Descreve a força eletrostática.',
        'option_d' => 'Descreve a inércia.',
        'option_e' => 'Descreve a pressão atmosférica.',
        'correct_option' => 'B'
    ],
    [
        'area' => 'Biologia',
        'enunciado' => 'O que é o tecido meristemático nas plantas?',
        'option_a' => 'Tecido de condução de seiva.',
        'option_b' => 'Tecido morto de sustentação.',
        'option_c' => 'Tecido de crescimento (células com alta capacidade de divisão).',
        'option_d' => 'Tecido de revestimento (epiderme).',
        'option_e' => 'Tecido de reserva.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Química',
        'enunciado' => 'Qual a característica dos metais alcalinos (Grupo 1 da tabela periódica)?',
        'option_a' => 'Alta eletronegatividade.',
        'option_b' => 'Formam ânions.',
        'option_c' => 'Possuem 1 elétron na camada de valência e alta reatividade.',
        'option_d' => 'São gases nobres.',
        'option_e' => 'São líquidos à temperatura ambiente.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Física',
        'enunciado' => 'A unidade de medida da resistência elétrica (R) é:',
        'option_a' => 'Volt (V).',
        'option_b' => 'Ampère (A).',
        'option_c' => 'Ohm (Ω).',
        'option_d' => 'Watt (W).',
        'option_e' => 'Joule (J).',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Biologia',
        'enunciado' => 'O que são organismos homeotérmicos?',
        'option_a' => 'Organismos que dependem da temperatura externa para regular o corpo.',
        'option_b' => 'Organismos que regulam a temperatura corporal internamente, mantendo-a constante.',
        'option_c' => 'Organismos que vivem em água salgada.',
        'option_d' => 'Organismos que se reproduzem por brotamento.',
        'option_e' => 'Organismos que não respiram.',
        'correct_option' => 'B'
    ],
    [
        'area' => 'Química',
        'enunciado' => 'A conversão de um RNA mensageiro em uma sequência de aminoácidos (proteína) é chamada de:',
        'option_a' => 'Transcrição.',
        'option_b' => 'Replicação.',
        'option_c' => 'Tradução (Síntese proteica).',
        'option_d' => 'Mutação.',
        'option_e' => 'Clonagem.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Física',
        'enunciado' => 'O que é um corpo negro na termodinâmica?',
        'option_a' => 'Um corpo que não emite radiação.',
        'option_b' => 'Um corpo que emite apenas luz visível.',
        'option_c' => 'Um corpo ideal que absorve toda a radiação eletromagnética incidente.',
        'option_d' => 'Um corpo que reflete toda a luz.',
        'option_e' => 'Um corpo que não conduz calor.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Biologia',
        'enunciado' => 'A doença causada pela deficiência de vitamina C (ácido ascórbico) é o:',
        'option_a' => 'Raquitismo.',
        'option_b' => 'Beribéri.',
        'option_c' => 'Escorbuto.',
        'option_d' => 'Anemia perniciosa.',
        'option_e' => 'Bócio.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Química',
        'enunciado' => 'Qual é a principal característica das soluções-tampão?',
        'option_a' => 'Possuem pH sempre igual a 7.',
        'option_b' => 'São insolúveis em água.',
        'option_c' => 'Resistem a grandes alterações de pH após a adição de pequenas quantidades de ácido ou base.',
        'option_d' => 'São usadas apenas em eletrólise.',
        'option_e' => 'Possuem alta condutividade elétrica.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Física',
        'enunciado' => 'O que é a lei da reflexão?',
        'option_a' => 'O raio incidente e o raio refratado estão no mesmo plano.',
        'option_b' => 'O ângulo de incidência é igual ao ângulo de refração.',
        'option_c' => 'O ângulo de incidência é igual ao ângulo de reflexão.',
        'option_d' => 'A luz é dispersa.',
        'option_e' => 'A luz é absorvida.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Biologia',
        'enunciado' => 'O que é o tecido nervoso?',
        'option_a' => 'Tecido de sustentação do corpo.',
        'option_b' => 'Tecido que armazena lipídios.',
        'option_c' => 'Tecido formado por neurônios, especializado em conduzir impulsos elétricos.',
        'option_d' => 'Tecido de revestimento.',
        'option_e' => 'Tecido de contração.',
        'correct_option' => 'C'
    ],
    // ----------------------------------------------------
    // QUESTÕES 101 A 300 (NOVO BLOCO DE 200 QUESTÕES MISTAS)
    // ----------------------------------------------------
    [
        'area' => 'Matemática',
        'enunciado' => 'Em uma progressão aritmética (PA), o primeiro termo é 5 e a razão é 3. Qual é o $10^\\text{o}$ termo dessa PA?',
        'option_a' => '30',
        'option_b' => '32',
        'option_c' => '35',
        'option_d' => '37',
        'option_e' => '40',
        'correct_option' => 'B'
    ],
    [
        'area' => 'História Geral',
        'enunciado' => 'Qual evento marcou o fim da Idade Antiga e o início da Idade Média na historiografia ocidental?',
        'option_a' => 'A Queda do Império Romano do Oriente (Bizantino).',
        'option_b' => 'A Revolução Francesa.',
        'option_c' => 'A Invenção da escrita.',
        'option_d' => 'A Queda do Império Romano do Ocidente (476 d.C.).',
        'option_e' => 'O Nascimento de Cristo.',
        'correct_option' => 'D'
    ],
    [
        'area' => 'Geografia',
        'enunciado' => 'O que define o conceito de "megalópole" em Geografia Urbana?',
        'option_a' => 'Uma cidade com mais de 10 milhões de habitantes.',
        'option_b' => 'Uma área rural em processo de urbanização.',
        'option_c' => 'Uma vasta região urbanizada resultante da conurbação de duas ou mais metrópoles.',
        'option_d' => 'Uma cidade que perdeu população.',
        'option_e' => 'Uma cidade que não tem área rural.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Linguagens',
        'enunciado' => 'A figura de linguagem que consiste em uma contradição de ideias no mesmo enunciado, mas sem anular o sentido (ex: "dor doce"), é chamada de:',
        'option_a' => 'Metáfora',
        'option_b' => 'Ironia',
        'option_c' => 'Paradoxo ou Oximoro',
        'option_d' => 'Hipérbole',
        'option_e' => 'Sinestesia',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Filosofia',
        'enunciado' => 'O Racionalismo, corrente filosófica da Idade Moderna, tem como seu principal pressuposto a ideia de que o conhecimento verdadeiro se origina na:',
        'option_a' => 'Experiência sensorial.',
        'option_b' => 'Fé religiosa.',
        'option_c' => 'Razão e no pensamento lógico.',
        'option_d' => 'Opinião pública.',
        'option_e' => 'Revelação divina.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Matemática',
        'enunciado' => 'Se $f(x) = 2x + 1$ e $g(x) = x^2$, qual é a função composta $g(f(x))$?',
        'option_a' => '$2x^2 + 1$',
        'option_b' => '$4x^2 + 4x + 1$',
        'option_c' => '$x^2 + 2x + 1$',
        'option_d' => '$4x^2 + 1$',
        'option_e' => '$2x^2 + x$',
        'correct_option' => 'B'
    ],
    [
        'area' => 'História do Brasil',
        'enunciado' => 'Qual foi o principal produto de exportação brasileiro durante o período da Primeira República (República Velha - 1889-1930)?',
        'option_a' => 'Açúcar',
        'option_b' => 'Ouro',
        'option_c' => 'Borracha',
        'option_d' => 'Café',
        'option_e' => 'Algodão',
        'correct_option' => 'D'
    ],
    [
        'area' => 'Geografia',
        'enunciado' => 'O que o conceito de "ilha de calor" descreve nas áreas urbanas?',
        'option_a' => 'O aumento da temperatura no litoral.',
        'option_b' => 'O fenômeno em que as áreas urbanas apresentam temperaturas mais elevadas do que as áreas rurais vizinhas.',
        'option_c' => 'O clima desértico.',
        'option_d' => 'O resfriamento atmosférico devido à poluição.',
        'option_e' => 'O derretimento das geleiras.',
        'correct_option' => 'B'
    ],
    [
        'area' => 'Linguagens',
        'enunciado' => 'Qual a função da linguagem que se centra no **emissor** (primeira pessoa) e na expressão de seus sentimentos e opiniões?',
        'option_a' => 'Fática',
        'option_b' => 'Referencial',
        'option_c' => 'Metalinguística',
        'option_d' => 'Emotiva ou Expressiva',
        'option_e' => 'Conativa',
        'correct_option' => 'D'
    ],
    [
        'area' => 'Sociologia',
        'enunciado' => 'Para Émile Durkheim, o que ele chamou de **Fato Social** se caracteriza por três aspectos principais: coerção social, exterioridade e:',
        'option_a' => 'Individualidade.',
        'option_b' => 'Historicidade.',
        'option_c' => 'Generalidade.',
        'option_d' => 'Subjetividade.',
        'option_e' => 'Materialidade.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Matemática',
        'enunciado' => 'Qual é o valor da área de um triângulo com base de $12 \text{ cm}$ e altura de $5 \text{ cm}$?',
        'option_a' => '$17 \text{ cm}^2$',
        'option_b' => '$30 \text{ cm}^2$',
        'option_c' => '$60 \text{ cm}^2$',
        'option_d' => '$34 \text{ cm}^2$',
        'option_e' => '$25 \text{ cm}^2$',
        'correct_option' => 'B'
    ],
    [
        'area' => 'História Geral',
        'enunciado' => 'A Guerra Fria (1947-1991) foi um período de tensão geopolítica entre quais duas superpotências?',
        'option_a' => 'Alemanha e França.',
        'option_b' => 'Reino Unido e Japão.',
        'option_c' => 'Estados Unidos (capitalismo) e União Soviética (socialismo).',
        'option_d' => 'China e Coreia do Sul.',
        'option_e' => 'Espanha e Portugal.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Geografia',
        'enunciado' => 'Qual o nome do fenômeno que consiste na inversão das camadas atmosféricas, impedindo a dispersão da poluição e a circulação vertical do ar, sendo comum no inverno?',
        'option_a' => 'Efeito estufa.',
        'option_b' => 'Chuva ácida.',
        'option_c' => 'Inversão térmica.',
        'option_d' => 'El Niño.',
        'option_e' => 'Monções.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Linguagens',
        'enunciado' => 'Em um texto dissertativo-argumentativo, o parágrafo que apresenta o ponto de vista a ser defendido (tese) e a linha geral de raciocínio é o de:',
        'option_a' => 'Desenvolvimento.',
        'option_b' => 'Conclusão.',
        'option_c' => 'Introdução.',
        'option_d' => 'Argumento de autoridade.',
        'option_e' => 'Releitura.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Filosofia',
        'enunciado' => 'John Locke (Empirismo) defendia que a mente humana, ao nascer, é como uma **tábula rasa** (folha em branco). Isso significa que o conhecimento deriva primariamente da:',
        'option_a' => 'Intuição inata.',
        'option_b' => 'Razão pura.',
        'option_c' => 'Experiência sensorial e da percepção.',
        'option_d' => 'Religião.',
        'option_e' => 'Lógica matemática.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Matemática',
        'enunciado' => 'Qual é a solução para $x$ na equação $4x - 10 = 2x + 6$?',
        'option_a' => '$x = 4$',
        'option_b' => '$x = 8$',
        'option_c' => '$x = 16$',
        'option_d' => '$x = 2$',
        'option_e' => '$x = 10$',
        'correct_option' => 'B'
    ],
    [
        'area' => 'História do Brasil',
        'enunciado' => 'O movimento conhecido como **Inconfidência Mineira** (século XVIII) tinha como principal objetivo:',
        'option_a' => 'Abolir a escravidão no Brasil.',
        'option_b' => 'Promover a industrialização de Minas Gerais.',
        'option_c' => 'A emancipação política de Minas Gerais de Portugal e a instalação de uma República.',
        'option_d' => 'Aumentar a cobrança de impostos (o Quinto).',
        'option_e' => 'Transferir a capital da Colônia para Minas Gerais.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Geografia',
        'enunciado' => 'O que são os **cinturões orogênicos** ou dobramentos modernos?',
        'option_a' => 'Áreas de intensa atividade vulcânica.',
        'option_b' => 'Grandes formações montanhosas recentes, resultantes do choque de placas tectônicas (ex: Andes, Himalaia).',
        'option_c' => 'Regiões planas de clima árido.',
        'option_d' => 'Planaltos antigos e desgastados.',
        'option_e' => 'Grandes rios navegáveis.',
        'correct_option' => 'B'
    ],
    [
        'area' => 'Linguagens',
        'enunciado' => 'O que é um **pleonasmo** vicioso em Gramática?',
        'option_a' => 'O uso de palavras bonitas.',
        'option_b' => 'A repetição desnecessária de uma ideia no enunciado (ex: "subir para cima").',
        'option_c' => 'A inversão da ordem natural das palavras.',
        'option_d' => 'O uso de uma palavra por outra (metonímia).',
        'option_e' => 'A omissão de um termo subentendido.',
        'correct_option' => 'B'
    ],
    [
        'area' => 'Sociologia',
        'enunciado' => 'Na teoria de Karl Marx, o conceito de **mais-valia** refere-se a:',
        'option_a' => 'O valor total de uma mercadoria no mercado.',
        'option_b' => 'O lucro líquido do capitalista após o pagamento de impostos.',
        'option_c' => 'O valor do trabalho não pago ao trabalhador, apropriado pelo capitalista (a diferença entre o valor produzido pelo trabalho e o salário pago).',
        'option_d' => 'A troca justa de produtos entre o capitalista e o operário.',
        'option_e' => 'O capital inicial investido na produção.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Matemática',
        'enunciado' => 'O preço de um produto é $\text{R}\$ 200,00$. Se ele for vendido com um desconto de $15\%$, qual será o valor do desconto?',
        'option_a' => '$\text{R}\$ 15,00$',
        'option_b' => '$\text{R}\$ 30,00$',
        'option_c' => '$\text{R}\$ 170,00$',
        'option_d' => '$\text{R}\$ 20,00$',
        'option_e' => '$\text{R}\$ 50,00$',
        'correct_option' => 'B'
    ],
    [
        'area' => 'História Geral',
        'enunciado' => 'As Cruzadas (séc. XI ao XIII) foram expedições militares de caráter religioso que tinham como principal objetivo para os europeus cristãos:',
        'option_a' => 'Descobrir novas rotas marítimas.',
        'option_b' => 'Conquistar Constantinopla.',
        'option_c' => 'Retomar a cidade de Jerusalém e a Terra Santa do controle muçulmano.',
        'option_d' => 'Promover a união da Igreja Católica e da Igreja Ortodoxa.',
        'option_e' => 'Acabar com o sistema feudal.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Geografia',
        'enunciado' => 'Qual é a principal função econômica dos rios de **planície**?',
        'option_a' => 'Geração de energia hidrelétrica.',
        'option_b' => 'Navegação e transporte.',
        'option_c' => 'Extração de minério.',
        'option_d' => 'Irrigação de áreas montanhosas.',
        'option_e' => 'Formação de cânions.',
        'correct_option' => 'B'
    ],
    [
        'area' => 'Linguagens',
        'enunciado' => 'Em literatura, o movimento que valoriza o **sentimentalismo, a subjetividade e a natureza idealizada** (ex: Álvares de Azevedo) é o:',
        'option_a' => 'Classicismo.',
        'option_b' => 'Realismo.',
        'option_c' => 'Romantismo.',
        'option_d' => 'Modernismo.',
        'option_e' => 'Parnasianismo.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Filosofia',
        'enunciado' => 'Qual filósofo é conhecido pela frase **"Penso, logo existo"** (Cogito ergo sum), um ponto de partida para o Racionalismo e o Método Cartesiano?',
        'option_a' => 'Aristóteles.',
        'option_b' => 'Immanuel Kant.',
        'option_c' => 'René Descartes.',
        'option_d' => 'David Hume.',
        'option_e' => 'Platão.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Matemática',
        'enunciado' => 'Qual é o perímetro de um quadrado cuja área é de $16 \text{ cm}^2$?',
        'option_a' => '$4 \text{ cm}$',
        'option_b' => '$8 \text{ cm}$',
        'option_c' => '$16 \text{ cm}$',
        'option_d' => '$20 \text{ cm}$',
        'option_e' => '$32 \text{ cm}$',
        'correct_option' => 'C'
    ],
    [
        'area' => 'História do Brasil',
        'enunciado' => 'A **Proclamação da República** no Brasil, em 1889, foi um movimento liderado principalmente por:',
        'option_a' => 'Fazendeiros de Café e Comerciantes.',
        'option_b' => 'Escravos libertos e Indígenas.',
        'option_c' => 'Militares e parte da elite agrária (com apoio do Positivismo).',
        'option_d' => 'A família real (D. Pedro II).',
        'option_e' => 'Líderes operários socialistas.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Geografia',
        'enunciado' => 'O conceito de **Biotecnologia** abrange a aplicação de organismos vivos ou de seus componentes para produção de bens e serviços. Na agricultura, um de seus usos mais comuns é a produção de:',
        'option_a' => 'Fertilizantes inorgânicos.',
        'option_b' => 'Combustíveis fósseis.',
        'option_c' => 'Transgênicos (OGMs).',
        'option_d' => 'Máquinas agrícolas.',
        'option_e' => 'Produtos artesanais.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Linguagens',
        'enunciado' => 'O que é um **hiato** em Fonética?',
        'option_a' => 'O encontro de duas vogais na mesma sílaba.',
        'option_b' => 'O encontro de uma vogal e uma semivogal.',
        'option_c' => 'O encontro de duas vogais em sílabas separadas (ex: sa-ú-de).',
        'option_d' => 'O encontro de duas consoantes.',
        'option_e' => 'A separação de sílabas.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Sociologia',
        'enunciado' => 'Max Weber definiu a **ação social** como o objeto central de estudo da Sociologia. Para ele, uma ação social é aquela em que o indivíduo orienta sua conduta levando em consideração:',
        'option_a' => 'Seus instintos biológicos.',
        'option_b' => 'O comportamento e as expectativas dos outros (o sentido subjetivo que ele atribui a ela).',
        'option_c' => 'A vontade de Deus.',
        'option_d' => 'A coerção da sociedade (Fato Social).',
        'option_e' => 'A lógica matemática.',
        'correct_option' => 'B'
    ],
    [
        'area' => 'Matemática',
        'enunciado' => 'Qual é o resultado da expressão $2^3 + \sqrt{25} - 1$?',
        'option_a' => '10',
        'option_b' => '11',
        'option_c' => '12',
        'option_d' => '13',
        'option_e' => '14',
        'correct_option' => 'C'
    ],
    [
        'area' => 'História Geral',
        'enunciado' => 'O **Iluminismo** (século XVIII) foi um movimento intelectual que defendia o uso da razão para a liberdade e a crítica ao:',
        'option_a' => 'Socialismo.',
        'option_b' => 'Capitalismo.',
        'option_c' => 'Antigo Regime (Absolutismo e Mercantilismo).',
        'option_d' => 'Democracia.',
        'option_e' => 'Liberalismo.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Geografia',
        'enunciado' => 'O que são **fusos horários** e qual é o marco zero (o meridiano principal) para sua determinação?',
        'option_a' => 'Linhas imaginárias que separam continentes; Meridiano do Equador.',
        'option_b' => 'Zonas de tempo padronizadas; Meridiano de Greenwich.',
        'option_c' => 'Zonas de clima; Linha do Trópico de Câncer.',
        'option_d' => 'Linhas de latitude; Círculo Polar Ártico.',
        'option_e' => 'Zonas de longitude; Linha Internacional da Data.',
        'correct_option' => 'B'
    ],
    [
        'area' => 'Linguagens',
        'enunciado' => 'A função da linguagem predominante em um **dicionário** (que usa a própria língua para explicar a língua) é a:',
        'option_a' => 'Fática.',
        'option_b' => 'Metalinguística.',
        'option_c' => 'Referencial.',
        'option_d' => 'Poética.',
        'option_e' => 'Emotiva.',
        'correct_option' => 'B'
    ],
    [
        'area' => 'Filosofia',
        'enunciado' => 'Para Platão, o **Mundo das Ideias** (ou Formas) é a realidade perfeita, eterna e imutável, enquanto o mundo que percebemos pelos sentidos é apenas uma:',
        'option_a' => 'Utopia.',
        'option_b' => 'Realidade superior.',
        'option_c' => 'Cópia imperfeita e passageira.',
        'option_d' => 'Totalidade do ser.',
        'option_e' => 'Ilusão matemática.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Matemática',
        'enunciado' => 'Qual é o valor de $\\pi$ (pi) com duas casas decimais?',
        'option_a' => '3,00',
        'option_b' => '3,10',
        'option_c' => '3,14',
        'option_d' => '3,41',
        'option_e' => '3,21',
        'correct_option' => 'C'
    ],
    [
        'area' => 'História do Brasil',
        'enunciado' => 'O período da **Ditadura Militar** no Brasil durou de qual ano a qual ano?',
        'option_a' => '1930 a 1945.',
        'option_b' => '1964 a 1985.',
        'option_c' => '1889 a 1930.',
        'option_d' => '1500 a 1822.',
        'option_e' => '1950 a 1960.',
        'correct_option' => 'B'
    ],
    [
        'area' => 'Geografia',
        'enunciado' => 'O que é a **escala cartográfica**?',
        'option_a' => 'O sistema de coordenadas.',
        'option_b' => 'O conjunto de símbolos usados no mapa.',
        'option_c' => 'A relação entre a distância real e a distância representada no mapa.',
        'option_d' => 'A cor predominante no mapa.',
        'option_e' => 'O método de projeção do mapa.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Linguagens',
        'enunciado' => 'O que é um **verbo transitivo direto**?',
        'option_a' => 'Aquele que precisa de preposição para ligar-se ao complemento.',
        'option_b' => 'Aquele que não precisa de complemento (intransitivo).',
        'option_c' => 'Aquele que se liga diretamente ao objeto (complemento) sem o auxílio de preposição.',
        'option_d' => 'Aquele que indica estado ou qualidade (verbo de ligação).',
        'option_e' => 'Aquele que sempre indica ação.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Sociologia',
        'enunciado' => 'Qual pensador sociológico associou o surgimento do Capitalismo moderno à **Ética Protestante** (especialmente a calvinista), vendo nela a base para a racionalização e o acúmulo de riqueza?',
        'option_a' => 'Karl Marx.',
        'option_b' => 'Émile Durkheim.',
        'option_c' => 'Max Weber.',
        'option_d' => 'Auguste Comte.',
        'option_e' => 'Herbert Spencer.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Matemática',
        'enunciado' => 'Qual é o valor do logaritmo $\log_2 8$?',
        'option_a' => '1',
        'option_b' => '2',
        'option_c' => '3',
        'option_d' => '4',
        'option_e' => '8',
        'correct_option' => 'C'
    ],
    [
        'area' => 'História Geral',
        'enunciado' => 'A **Revolução Neolítica** (ou Agrícola) foi um marco histórico que se caracterizou principalmente pela:',
        'option_a' => 'Invenção da roda.',
        'option_b' => 'Descoberta do fogo.',
        'option_c' => 'Domesticação de plantas e animais e o desenvolvimento da agricultura e sedentarização.',
        'option_d' => 'Criação da escrita.',
        'option_e' => 'Início do uso do metal.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Geografia',
        'enunciado' => 'O conceito de **terceirização** da economia refere-se ao aumento da participação de qual setor?',
        'option_a' => 'Setor Primário (agricultura e extrativismo).',
        'option_b' => 'Setor Secundário (indústria).',
        'option_c' => 'Setor Terciário (comércio e serviços).',
        'option_d' => 'Setor Quaternário (tecnologia e inovação).',
        'option_e' => 'Setor Público (administração).',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Linguagens',
        'enunciado' => 'Qual é o sujeito da oração: "Fazem dez anos que ele se mudou."',
        'option_a' => 'Ele',
        'option_b' => 'Dez anos',
        'option_c' => 'Oração sem sujeito (verbo fazer indicando tempo decorrido).',
        'option_d' => 'Anos',
        'option_e' => 'Que ele se mudou',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Filosofia',
        'enunciado' => 'Immanuel Kant buscou conciliar o Racionalismo e o Empirismo em sua filosofia, focando na **ação moral**. O que ele chamou de **Imperativo Categórico**?',
        'option_a' => 'A máxima que deve ser seguida se trouxer prazer.',
        'option_b' => 'O conhecimento derivado da experiência.',
        'option_c' => 'O princípio de que se deve agir apenas segundo uma máxima que se possa querer que se torne lei universal.',
        'option_d' => 'A busca pela felicidade pessoal.',
        'option_e' => 'A negação de toda a moralidade.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Matemática',
        'enunciado' => 'Se $A = \{1, 2, 3\}$ e $B = \{3, 4, 5\}$, qual é o conjunto resultante da união $A \cup B$?',
        'option_a' => '$\{3\}$',
        'option_b' => '$\{\}$ (Conjunto vazio)',
        'option_c' => '$\{1, 2, 3, 4, 5\}$',
        'option_d' => '$\{1, 2, 4, 5\}$',
        'option_e' => '$\{1, 2\}$',
        'correct_option' => 'C'
    ],
    [
        'area' => 'História do Brasil',
        'enunciado' => 'Qual evento marcou o fim do período colonial e o início do Império no Brasil (1822)?',
        'option_a' => 'A Chegada da Família Real.',
        'option_b' => 'A Inconfidência Mineira.',
        'option_c' => 'A Proclamação da Independência.',
        'option_d' => 'A Revolução de 1930.',
        'option_e' => 'A Lei Áurea.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Geografia',
        'enunciado' => 'A **Latitude** é a distância, medida em graus, de qualquer ponto da superfície terrestre em relação a qual linha imaginária?',
        'option_a' => 'Meridiano de Greenwich.',
        'option_b' => 'Círculo Polar Ártico.',
        'option_c' => 'Linha do Equador.',
        'option_d' => 'Trópico de Capricórnio.',
        'option_e' => 'Linha Internacional da Data.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Linguagens',
        'enunciado' => 'Qual o nome do tipo de verso que possui exatamente 10 sílabas poéticas, sendo muito utilizado nos sonetos clássicos?',
        'option_a' => 'Redondilha menor (5 sílabas).',
        'option_b' => 'Heptassílabo (7 sílabas).',
        'option_c' => 'Decassílabo (10 sílabas).',
        'option_d' => 'Alexandrino (12 sílabas).',
        'option_e' => 'Trissílabo (3 sílabas).',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Sociologia',
        'enunciado' => 'Para Durkheim, o que é a **Anomia**?',
        'option_a' => 'O excesso de regras e leis.',
        'option_b' => 'A integração social perfeita.',
        'option_c' => 'A ausência ou enfraquecimento das normas sociais (regras morais e legais) que regulam o comportamento individual, resultando em desintegração.',
        'option_d' => 'A luta de classes.',
        'option_e' => 'O estudo das ideias inatas.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Matemática',
        'enunciado' => 'Qual é o volume de uma esfera com raio $r = 3 \text{ cm}$? (Use $V = \frac{4}{3} \pi r^3$)',
        'option_a' => '$9\pi \text{ cm}^3$',
        'option_b' => '$18\pi \text{ cm}^3$',
        'option_c' => '$36\pi \text{ cm}^3$',
        'option_d' => '$81\pi \text{ cm}^3$',
        'option_e' => '$108\pi \text{ cm}^3$',
        'correct_option' => 'C'
    ],
    [
        'area' => 'História Geral',
        'enunciado' => 'A **Revolução Francesa** (1789) teve como lema principal a tríade:',
        'option_a' => 'Ordem, Progresso e Tradição.',
        'option_b' => 'Fé, Pátria e Família.',
        'option_c' => 'Liberdade, Igualdade e Fraternidade.',
        'option_d' => 'Paz, Pão e Terra.',
        'option_e' => 'Deus, Lei e Rei.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Geografia',
        'enunciado' => 'As **Placas Tectônicas** são blocos da litosfera que se movem sobre o manto. A maioria dos terremotos e do vulcanismo ocorre nas zonas de:',
        'option_a' => 'Intemperismo.',
        'option_b' => 'Desertificação.',
        'option_c' => 'Contato e fronteira (limites) entre placas.',
        'option_d' => 'Glaciação.',
        'option_e' => 'Baixas altitudes.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Linguagens',
        'enunciado' => 'O movimento literário que busca a **\'arte pela arte\'**, valorizando a forma, a objetividade e o rigor métrico (ex: Olavo Bilac), é o:',
        'option_a' => 'Romantismo.',
        'option_b' => 'Simbolismo.',
        'option_c' => 'Parnasianismo.',
        'option_d' => 'Modernismo.',
        'option_e' => 'Barroco.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Filosofia',
        'enunciado' => 'O filósofo grego **Aristóteles** defendia que a virtude é alcançada através do **justo meio** (Mediania), evitando os extremos de excesso e deficiência. Essa virtude é essencial para atingir a:',
        'option_a' => 'Loucura.',
        'option_b' => 'Imortalidade.',
        'option_c' => 'Eudaimonia (felicidade ou bem-viver).',
        'option_d' => 'Oligarquia.',
        'option_e' => 'Aparência.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Matemática',
        'enunciado' => 'Qual é o resultado da divisão $\frac{3}{4} \div \frac{1}{2}$?',
        'option_a' => '1/2',
        'option_b' => '3/8',
        'option_c' => '3/2',
        'option_d' => '4/3',
        'option_e' => '1/4',
        'correct_option' => 'C'
    ],
    [
        'area' => 'História do Brasil',
        'enunciado' => 'Qual é o nome dado ao período histórico brasileiro (1930-1945) marcado pelo governo de Getúlio Vargas, que incluiu a criação da CLT e a fase ditatorial do Estado Novo?',
        'option_a' => 'Primeira República.',
        'option_b' => 'Império Brasileiro.',
        'option_c' => 'Era Vargas.',
        'option_d' => 'República Populista.',
        'option_e' => 'República da Espada.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Geografia',
        'enunciado' => 'A **pecuária extensiva** se caracteriza principalmente por:',
        'option_a' => 'Alto uso de tecnologia e confinamento do gado.',
        'option_b' => 'Baixa produtividade e gado criado em grandes áreas de pastagem natural.',
        'option_c' => 'Alta produtividade e seleção genética.',
        'option_d' => 'O uso de agricultura orgânica.',
        'option_e' => 'O foco na produção de leite.',
        'correct_option' => 'B'
    ],
    [
        'area' => 'Linguagens',
        'enunciado' => 'O que é um **sintagma nominal** em análise sintática?',
        'option_a' => 'Um grupo de palavras cujo núcleo é um verbo.',
        'option_b' => 'Um grupo de palavras que funciona como complemento de um adjetivo.',
        'option_c' => 'Um grupo de palavras cujo núcleo é um substantivo (ou palavra com valor de nome).',
        'option_d' => 'Um grupo de palavras que funciona como advérbio.',
        'option_e' => 'Um grupo de palavras que forma uma oração completa.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Sociologia',
        'enunciado' => 'Para Karl Marx, qual é o motor fundamental da história e da transformação social?',
        'option_a' => 'A religião.',
        'option_b' => 'A tecnologia.',
        'option_c' => 'A Luta de Classes.',
        'option_d' => 'A política estatal.',
        'option_e' => 'O Indivíduo.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Matemática',
        'enunciado' => 'O que é uma **função quadrática** (ou do 2º grau)?',
        'option_a' => 'Uma função cujo gráfico é uma linha reta.',
        'option_b' => 'Uma função definida pela equação $f(x) = ax + b$.',
        'option_c' => 'Uma função definida pela equação $f(x) = ax^2 + bx + c$ (com $a \\neq 0$), cujo gráfico é uma parábola.',
        'option_d' => 'Uma função exponencial.',
        'option_e' => 'Uma função logarítmica.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'História Geral',
        'enunciado' => 'O período conhecido como **Renascimento Cultural** (séc. XIV-XVI) foi marcado pela valorização do **Antropocentrismo** em oposição ao:',
        'option_a' => 'Humanismo.',
        'option_b' => 'Liberalismo.',
        'option_c' => 'Teocentrismo (Deus no centro do universo).',
        'option_d' => 'Capitalismo.',
        'option_e' => 'Racionalismo.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Geografia',
        'enunciado' => 'O que a **rede urbana** representa?',
        'option_a' => 'O sistema de distribuição de água nas cidades.',
        'option_b' => 'O conjunto de cidades interligadas por fluxos de pessoas, mercadorias e informações.',
        'option_c' => 'O sistema de transporte ferroviário.',
        'option_d' => 'A área rural de um município.',
        'option_e' => 'O cinturão verde da cidade.',
        'correct_option' => 'B'
    ],
    [
        'area' => 'Linguagens',
        'enunciado' => 'O que é a **sinestesia** em figuras de linguagem?',
        'option_a' => 'A substituição de um termo por outro (metonímia).',
        'option_b' => 'A repetição de um som vocálico (aliteração).',
        'option_c' => 'A mistura de diferentes sentidos corporais (ex: "doce melodia" - audição e paladar).',
        'option_d' => 'O uso de uma ideia oposta (antítese).',
        'option_e' => 'O exagero intencional (hipérbole).',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Filosofia',
        'enunciado' => 'Qual é o principal tema de estudo da **Epistemologia** ou Teoria do Conhecimento?',
        'option_a' => 'O estudo da moral e da ética.',
        'option_b' => 'O estudo da política.',
        'option_c' => 'A natureza, origem e limites do conhecimento humano.',
        'option_d' => 'O estudo da estética.',
        'option_e' => 'O estudo da existência de Deus.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Matemática',
        'enunciado' => 'Quantos lados tem um hexágono?',
        'option_a' => '4',
        'option_b' => '5',
        'option_c' => '6',
        'option_d' => '7',
        'option_e' => '8',
        'correct_option' => 'C'
    ],
    [
        'area' => 'História do Brasil',
        'enunciado' => 'A **Lei Áurea**, que aboliu a escravidão no Brasil, foi assinada em qual ano?',
        'option_a' => '1822',
        'option_b' => '1850',
        'option_c' => '1888',
        'option_d' => '1889',
        'option_e' => '1930',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Geografia',
        'enunciado' => 'O que é o **intemperismo** (ou meteorização)?',
        'option_a' => 'O transporte de sedimentos pelo vento.',
        'option_b' => 'A ação de vulcões.',
        'option_c' => 'O processo de desagregação e decomposição das rochas e minerais, provocado pela ação da atmosfera e da hidrosfera.',
        'option_d' => 'A formação de planaltos.',
        'option_e' => 'O congelamento do solo.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Linguagens',
        'enunciado' => 'O que é um **advérbio de intensidade**?',
        'option_a' => 'Aquele que indica lugar.',
        'option_b' => 'Aquele que modifica um substantivo.',
        'option_c' => 'Aquele que expressa a força ou o grau de uma ação ou qualidade (ex: **muito** feliz).',
        'option_d' => 'Aquele que indica tempo.',
        'option_e' => 'Aquele que conecta orações.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Sociologia',
        'enunciado' => 'Qual conceito, central na obra de Max Weber, refere-se ao processo pelo qual a sociedade moderna é cada vez mais dominada pela lógica instrumental, eficiência e cálculo, em detrimento dos valores tradicionais?',
        'option_a' => 'Luta de classes.',
        'option_b' => 'Solidariedade orgânica.',
        'option_c' => 'Racionalização.',
        'option_d' => 'Fato social.',
        'option_e' => 'Anomia.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Matemática',
        'enunciado' => 'Se um ângulo mede $90^\circ$, ele é classificado como:',
        'option_a' => 'Agudo.',
        'option_b' => 'Obtuso.',
        'option_c' => 'Reto.',
        'option_d' => 'Raso.',
        'option_e' => 'Complementar.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'História Geral',
        'enunciado' => 'A **Reforma Protestante** (séc. XVI) foi iniciada por Martinho Lutero e defendia a ideia de que a salvação se dava pela:',
        'option_a' => 'Venda de indulgências.',
        'option_b' => 'Hierarquia da Igreja Católica.',
        'option_c' => 'Fé, em oposição às obras (Sola Fide).',
        'option_d' => 'Autoridade do Papa.',
        'option_e' => 'Rejeição da Bíblia.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Geografia',
        'enunciado' => 'O que são as **zonas climáticas temperadas** da Terra?',
        'option_a' => 'Regiões que recebem o sol de forma perpendicular o ano todo.',
        'option_b' => 'Regiões localizadas entre os trópicos e os círculos polares, com as quatro estações bem definidas.',
        'option_c' => 'Regiões permanentemente cobertas por gelo.',
        'option_d' => 'Regiões de clima equatorial.',
        'option_e' => 'Regiões de alta pressão atmosférica.',
        'correct_option' => 'B'
    ],
    [
        'area' => 'Linguagens',
        'enunciado' => 'Em literatura, o **Realismo/Naturalismo** (séc. XIX) se caracterizou pela:',
        'option_a' => 'Fuga da realidade e idealização da mulher.',
        'option_b' => 'Subjetividade e sentimentalismo extremo.',
        'option_c' => 'Objetividade, crítica social e análise psicológica ou determinista da realidade.',
        'option_d' => 'Valorização da forma e do rigor métrico (arte pela arte).',
        'option_e' => 'Uso de alegorias e mistério.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Filosofia',
        'enunciado' => 'Qual filósofo pré-socrático é famoso por ter afirmado que **"Tudo flui"** (Panta Rhei), enfatizando a constante mudança de todas as coisas?',
        'option_a' => 'Parmênides.',
        'option_b' => 'Tales de Mileto.',
        'option_c' => 'Heráclito de Éfeso.',
        'option_d' => 'Anaximandro.',
        'option_e' => 'Demócrito.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Matemática',
        'enunciado' => 'Qual o resultado de $10\% \text{ de } 500$?',
        'option_a' => '10',
        'option_b' => '50',
        'option_c' => '100',
        'option_d' => '5',
        'option_e' => '450',
        'correct_option' => 'B'
    ],
    [
        'area' => 'História do Brasil',
        'enunciado' => 'O período de 1946 a 1964 no Brasil, anterior à Ditadura Militar, é conhecido como:',
        'option_a' => 'Estado Novo.',
        'option_b' => 'República Velha.',
        'option_c' => 'República Populista (ou Quarta República).',
        'option_d' => 'Regime Imperial.',
        'option_e' => 'Junta Militar.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Geografia',
        'enunciado' => 'Qual é a principal fonte de energia utilizada para a produção de eletricidade no Brasil?',
        'option_a' => 'Termoelétricas a carvão.',
        'option_b' => 'Nucleares.',
        'option_c' => 'Hidrelétricas.',
        'option_d' => 'Eólicas.',
        'option_e' => 'Solares.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Linguagens',
        'enunciado' => 'Qual é a função da linguagem que visa testar o canal de comunicação, assegurando que a mensagem está sendo transmitida e recebida (ex: "Alô? Está me ouvindo?")?',
        'option_a' => 'Emotiva.',
        'option_b' => 'Referencial.',
        'option_c' => 'Fática.',
        'option_d' => 'Poética.',
        'option_e' => 'Conativa.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Sociologia',
        'enunciado' => 'Qual é o principal foco de estudo do **Positivismo** de Auguste Comte?',
        'option_a' => 'A luta de classes e a revolução.',
        'option_b' => 'A ordem social e o progresso baseado na ciência.',
        'option_c' => 'A crítica à razão.',
        'option_d' => 'A subjetividade individual.',
        'option_e' => 'O estudo dos sonhos.',
        'correct_option' => 'B'
    ],
    [
        'area' => 'Matemática',
        'enunciado' => 'Em uma progressão geométrica (PG), o primeiro termo é 2 e a razão é 3. Qual é o terceiro termo dessa PG?',
        'option_a' => '6',
        'option_b' => '8',
        'option_c' => '18',
        'option_d' => '12',
        'option_e' => '9',
        'correct_option' => 'C'
    ],
    [
        'area' => 'História Geral',
        'enunciado' => 'A **Paz Armada** (final do séc. XIX e início do séc. XX) foi um período que antecedeu qual grande conflito?',
        'option_a' => 'Guerra Fria.',
        'option_b' => 'Guerra Civil Americana.',
        'option_c' => 'Primeira Guerra Mundial.',
        'option_d' => 'Segunda Guerra Mundial.',
        'option_e' => 'Guerra do Vietnã.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Geografia',
        'enunciado' => 'Qual o nome do bioma brasileiro caracterizado por ser um complexo de formações que vão de campos limpos a florestas, sendo considerado a savana mais biodiversa do mundo?',
        'option_a' => 'Amazônia.',
        'option_b' => 'Caatinga.',
        'option_c' => 'Cerrado.',
        'option_d' => 'Mata Atlântica.',
        'option_e' => 'Pampa.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Linguagens',
        'enunciado' => 'Em um poema, o que é um **encadeamento** (enjambement)?',
        'option_a' => 'A repetição de palavras.',
        'option_b' => 'A rima entre dois versos.',
        'option_c' => 'A quebra da sintaxe ou do sentido lógico entre o final de um verso e o início do verso seguinte.',
        'option_d' => 'O uso de metáforas.',
        'option_e' => 'O tamanho padrão do verso.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Filosofia',
        'enunciado' => 'O que o conceito de **"Super-Homem"** (Übermensch) de Friedrich Nietzsche representa?',
        'option_a' => 'Um herói de histórias em quadrinhos.',
        'option_b' => 'Um ser humano que se submete à moral tradicional.',
        'option_c' => 'Um indivíduo que supera a moralidade e os valores tradicionais (niilismo), criando seus próprios valores.',
        'option_d' => 'O deus cristão.',
        'option_e' => 'O homem fraco e doente.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Matemática',
        'enunciado' => 'Qual a probabilidade de se obter um número ímpar ao lançar um dado comum de 6 faces?',
        'option_a' => '$1/6$',
        'option_b' => '$1/3$',
        'option_c' => '$1/2$',
        'option_d' => '$2/3$',
        'option_e' => '$5/6$',
        'correct_option' => 'C'
    ],
    [
        'area' => 'História do Brasil',
        'enunciado' => 'A **Guerra do Paraguai** (1864-1870) foi um conflito envolvendo o Brasil e quais outros dois países que formaram a Tríplice Aliança?',
        'option_a' => 'Argentina e Chile.',
        'option_b' => 'Colômbia e Peru.',
        'option_c' => 'Argentina e Uruguai.',
        'option_d' => 'Bolívia e Peru.',
        'option_e' => 'Venezuela e Chile.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Geografia',
        'enunciado' => 'O que é a **Doutrina Monroe** (1823)?',
        'option_a' => 'Uma política de intervenção dos EUA na Europa.',
        'option_b' => 'Um acordo comercial entre os países do Mercosul.',
        'option_c' => 'Uma política externa dos EUA resumida na frase "América para os americanos", visando impedir a intervenção europeia no continente.',
        'option_d' => 'Um tratado de paz no Caribe.',
        'option_e' => 'A criação da ONU.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Linguagens',
        'enunciado' => 'Em Gramática, qual o nome da oração subordinada que funciona como um **adjetivo**, sendo introduzida por um pronome relativo?',
        'option_a' => 'Substantiva.',
        'option_b' => 'Adverbial.',
        'option_c' => 'Adjetiva.',
        'option_d' => 'Coordenada.',
        'option_e' => 'Principal.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Sociologia',
        'enunciado' => 'O que é o conceito de **alienação** para Karl Marx?',
        'option_a' => 'A busca pela felicidade.',
        'option_b' => 'A troca de produtos por dinheiro.',
        'option_c' => 'O estranhamento do trabalhador em relação ao produto do seu trabalho e aos meios de produção, sentindo-se dominado por forças externas.',
        'option_d' => 'O processo de industrialização.',
        'option_e' => 'A obediência às leis.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Matemática',
        'enunciado' => 'Qual é o valor do seno de $90^\circ$?',
        'option_a' => '0',
        'option_b' => '$1/2$',
        'option_c' => '1',
        'option_d' => '$-1$',
        'option_e' => 'Indefinido',
        'correct_option' => 'C'
    ],
    [
        'area' => 'História Geral',
        'enunciado' => 'O que foi o **Holocausto** durante a Segunda Guerra Mundial?',
        'option_a' => 'O bombardeio de Pearl Harbor.',
        'option_b' => 'O desembarque aliado na Normandia (Dia D).',
        'option_c' => 'O genocídio sistemático de judeus e outras minorias pelo regime nazista.',
        'option_d' => 'A Batalha de Stalingrado.',
        'option_e' => 'A criação da Organização das Nações Unidas (ONU).',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Geografia',
        'enunciado' => 'Qual é o nome da camada de ar que envolve a Terra e é essencial para a manutenção da vida, contendo oxigênio e nitrogênio?',
        'option_a' => 'Hidrosfera.',
        'option_b' => 'Litosfera.',
        'option_c' => 'Atmosfera.',
        'option_d' => 'Biosfera.',
        'option_e' => 'Criosfera.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Linguagens',
        'enunciado' => 'Qual o nome do tipo de variação linguística que ocorre em função da região geográfica (ex: sotaques, vocabulário regional)?',
        'option_a' => 'Variação social (diastrática).',
        'option_b' => 'Variação histórica (diacrônica).',
        'option_c' => 'Variação regional (diatópica).',
        'option_d' => 'Variação estilística (diafásica).',
        'option_e' => 'Variação de registro (diamesica).',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Filosofia',
        'enunciado' => 'O que significa o termo **"Metafísica"** (ou Ontologia) na Filosofia?',
        'option_a' => 'O estudo da mente humana.',
        'option_b' => 'O estudo da arte.',
        'option_c' => 'O estudo da natureza da realidade, do ser e da existência.',
        'option_d' => 'O estudo da moral.',
        'option_e' => 'O estudo do Estado.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Matemática',
        'enunciado' => 'Em geometria, a soma dos ângulos internos de um triângulo é sempre:',
        'option_a' => '$90^\circ$',
        'option_b' => '$120^\circ$',
        'option_c' => '$180^\circ$',
        'option_d' => '$270^\circ$',
        'option_e' => '$360^\circ$',
        'correct_option' => 'C'
    ],
    [
        'area' => 'História do Brasil',
        'enunciado' => 'A **República da Espada** (1889-1894) foi a primeira fase da República, marcada pelo governo de quais presidentes militares?',
        'option_a' => 'Getúlio Vargas e Juscelino Kubitschek.',
        'option_b' => 'Deodoro da Fonseca e Floriano Peixoto.',
        'option_c' => 'Café Filho e João Goulart.',
        'option_d' => 'Castelo Branco e Costa e Silva.',
        'option_e' => 'Afonso Pena e Campos Sales.',
        'correct_option' => 'B'
    ],
    [
        'area' => 'Geografia',
        'enunciado' => 'Qual o nome do movimento de massa de ar frio e seco, vindo do sul, que causa a queda de temperatura no Brasil, inclusive na Amazônia (friagem)?',
        'option_a' => 'Monções.',
        'option_b' => 'Corrente de El Niño.',
        'option_c' => 'Massa Polar Atlântica (MPA).',
        'option_d' => 'Ventos Alísios.',
        'option_e' => 'Ciclone tropical.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Linguagens',
        'enunciado' => 'O que é um **eufemismo**?',
        'option_a' => 'O exagero de uma ideia.',
        'option_b' => 'A substituição de um termo por outro para criar ambiguidade.',
        'option_c' => 'O uso de uma expressão mais suave ou agradável para amenizar uma ideia desagradável ou chocante.',
        'option_d' => 'A ironia.',
        'option_e' => 'A repetição de sons consonantais.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Sociologia',
        'enunciado' => 'Para Durkheim, a **solidariedade mecânica** é um tipo de coesão social típica de sociedades:',
        'option_a' => 'Modernas e complexas.',
        'option_b' => 'Capitalistas e urbanas.',
        'option_c' => 'Tradicionais e pouco diferenciadas, onde os indivíduos se assemelham (semelhantes).',
        'option_d' => 'Industriais e anômicas.',
        'option_e' => 'De classes em conflito.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Matemática',
        'enunciado' => 'Qual é o próximo número na sequência: $1, 4, 9, 16, \dots$?',
        'option_a' => '20',
        'option_b' => '25',
        'option_c' => '36',
        'option_d' => '18',
        'option_e' => '24',
        'correct_option' => 'B'
    ],
    [
        'area' => 'História Geral',
        'enunciado' => 'A política de **Apartheid** (separação) vigorou em qual país até o início dos anos 90, sendo abolida após a libertação de Nelson Mandela?',
        'option_a' => 'Índia.',
        'option_b' => 'Estados Unidos.',
        'option_c' => 'África do Sul.',
        'option_d' => 'Israel.',
        'option_e' => 'Angola.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Geografia',
        'enunciado' => 'O que é um **bioma**?',
        'option_a' => 'Um tipo de rocha.',
        'option_b' => 'Uma única espécie animal.',
        'option_c' => 'Uma grande área de vida definida principalmente por seu clima e pela vegetação característica.',
        'option_d' => 'Um tipo de poluição atmosférica.',
        'option_e' => 'Um acidente geográfico.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Linguagens',
        'enunciado' => 'O que é a **prosopopeia** (ou personificação) em figuras de linguagem?',
        'option_a' => 'O uso de palavras contrárias.',
        'option_b' => 'A repetição de uma palavra.',
        'option_c' => 'A atribuição de características humanas a seres inanimados ou irracionais (ex: "O vento **cantou** uma canção").',
        'option_d' => 'O uso de sons para imitar ruídos (onomatopeia).',
        'option_e' => 'O exagero.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Filosofia',
        'enunciado' => 'Na antiguidade grega, qual foi o filósofo que, através do método da **maiêutica** (a arte de \'parir\' ideias por meio de perguntas), conduzia seus discípulos ao conhecimento?',
        'option_a' => 'Platão.',
        'option_b' => 'Aristóteles.',
        'option_c' => 'Sócrates.',
        'option_d' => 'Pitágoras.',
        'option_e' => 'Zenão.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Matemática',
        'enunciado' => 'Qual é o valor do cosseno de $0^\circ$?',
        'option_a' => '0',
        'option_b' => '$1/2$',
        'option_c' => '1',
        'option_d' => '$-1$',
        'option_e' => 'Indefinido',
        'correct_option' => 'C'
    ],
    [
        'area' => 'História do Brasil',
        'enunciado' => 'O **Plano Real**, implementado em 1994, teve como principal objetivo:',
        'option_a' => 'Aumentar a dívida externa.',
        'option_b' => 'Promover a estatização das empresas.',
        'option_c' => 'Estabilizar a economia brasileira e controlar a hiperinflação.',
        'option_d' => 'Promover a ditadura militar.',
        'option_e' => 'Abolir a moeda.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Geografia',
        'enunciado' => 'A **Longitute** é a distância, medida em graus, de qualquer ponto da superfície terrestre em relação a qual linha imaginária?',
        'option_a' => 'Linha do Equador.',
        'option_b' => 'Trópico de Capricórnio.',
        'option_c' => 'Meridiano de Greenwich.',
        'option_d' => 'Círculo Polar Antártico.',
        'option_e' => 'Eixo da Terra.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Linguagens',
        'enunciado' => 'O que é um **neologismo**?',
        'option_a' => 'Um erro de ortografia.',
        'option_b' => 'Um arcaísmo (palavra antiga).',
        'option_c' => 'A criação de uma palavra nova ou a atribuição de um novo sentido a uma palavra já existente.',
        'option_d' => 'O uso de gírias.',
        'option_e' => 'A formalidade excessiva.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Sociologia',
        'enunciado' => 'O conceito de **indústria cultural**, desenvolvido por Adorno e Horkheimer (Escola de Frankfurt), refere-se à produção massificada de cultura que tem como objetivo principal:',
        'option_a' => 'Promover a alta arte.',
        'option_b' => 'Estimular a crítica e o pensamento livre.',
        'option_c' => 'Padronizar o consumo e manter a dominação ideológica.',
        'option_d' => 'Aumentar a diversidade cultural.',
        'option_e' => 'Diminuir o poder da mídia.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Matemática',
        'enunciado' => 'Qual é o resultado da raiz cúbica de 27 ($\sqrt[3]{27}$)?',
        'option_a' => '9',
        'option_b' => '5',
        'option_c' => '3',
        'option_d' => '2',
        'option_e' => '6',
        'correct_option' => 'C'
    ],
    [
        'area' => 'História Geral',
        'enunciado' => 'O que foram os **"Anos Loucos"** (Roaring Twenties) nos Estados Unidos?',
        'option_a' => 'O período de crise econômica (Grande Depressão).',
        'option_b' => 'O período pós-Segunda Guerra Mundial.',
        'option_c' => 'O período de prosperidade econômica, efervescência cultural e modernização da sociedade americana na década de 1920, antes da Crise de 1929.',
        'option_d' => 'A Guerra do Vietnã.',
        'option_e' => 'A Guerra Fria.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Geografia',
        'enunciado' => 'O que são as **cidades globais**?',
        'option_a' => 'Cidades que têm um aeroporto internacional.',
        'option_b' => 'Cidades com população superior a 5 milhões de habitantes.',
        'option_c' => 'Cidades que funcionam como centros de comando da economia mundial, com grande influência em fluxos de capital, informação e pessoas.',
        'option_d' => 'Cidades com baixos índices de poluição.',
        'option_e' => 'Cidades localizadas em países pobres.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Linguagens',
        'enunciado' => 'O que é um **adjetivo pátrio**?',
        'option_a' => 'Um adjetivo que indica posse.',
        'option_b' => 'Um adjetivo que indica qualidade.',
        'option_c' => 'Um adjetivo que indica a origem ou nacionalidade do ser (ex: brasileiro).',
        'option_d' => 'Um adjetivo que indica intensidade.',
        'option_e' => 'Um adjetivo que indica estado.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Filosofia',
        'enunciado' => 'O **Existencialismo**, corrente filosófica do século XX (ex: Sartre), tem como lema principal a ideia de que a **existência precede a essência**. O que isso significa?',
        'option_a' => 'O homem nasce com um propósito definido (essência).',
        'option_b' => 'A essência do homem é ser livre.',
        'option_c' => 'O homem primeiro existe, encontra-se no mundo, e depois se define (constrói sua essência) através de suas escolhas e ações.',
        'option_d' => 'O homem é determinado pelo destino.',
        'option_e' => 'A razão é a única fonte de conhecimento.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Matemática',
        'enunciado' => 'Qual é o valor da mediana do conjunto de dados: $\{2, 5, 8, 10, 12\}$?',
        'option_a' => '2',
        'option_b' => '5',
        'option_c' => '8',
        'option_d' => '10',
        'option_e' => '12',
        'correct_option' => 'C'
    ],
    [
        'area' => 'História do Brasil',
        'enunciado' => 'O movimento das **Diretas Já** (1983-1984) tinha como principal reivindicação o retorno imediato da:',
        'option_a' => 'Monarquia.',
        'option_b' => 'Censura à imprensa.',
        'option_c' => 'Eleição direta para presidente do Brasil (emenda Dante de Oliveira).',
        'option_d' => 'Abertura de portos.',
        'option_e' => 'Guerra do Paraguai.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Geografia',
        'enunciado' => 'O que é o **Mercosul**?',
        'option_a' => 'Um bloco militar na América do Sul.',
        'option_b' => 'Uma organização de proteção ambiental.',
        'option_c' => 'Um bloco econômico de livre-comércio e união aduaneira, formado por países da América do Sul (Brasil, Argentina, Paraguai e Uruguai como membros plenos).',
        'option_d' => 'Uma organização humanitária.',
        'option_e' => 'Uma aliança política.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Linguagens',
        'enunciado' => 'O que é um **trocadilho**?',
        'option_a' => 'Um erro de gramática.',
        'option_b' => 'Um tipo de rima.',
        'option_c' => 'Um jogo de palavras baseado na semelhança sonora de palavras com significados diferentes.',
        'option_d' => 'Um termo técnico.',
        'option_e' => 'Um palavrão.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Sociologia',
        'enunciado' => 'O conceito de **poder** para Max Weber se baseia na capacidade de um indivíduo ou grupo impor sua vontade, mesmo contra a resistência. Ele identifica três tipos puros de dominação legítima: tradicional, carismática e:',
        'option_a' => 'Econômica.',
        'option_b' => 'Militar.',
        'option_c' => 'Racional-Legal (Burocrática).',
        'option_d' => 'Emocional.',
        'option_e' => 'Monárquica.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Matemática',
        'enunciado' => 'Qual é o valor do perímetro de um círculo com raio $r = 5 \text{ cm}$?',
        'option_a' => '$5\pi \text{ cm}$',
        'option_b' => '$10\pi \text{ cm}$',
        'option_c' => '$25\pi \text{ cm}$',
        'option_d' => '$50\pi \text{ cm}$',
        'option_e' => '$15\pi \text{ cm}$',
        'correct_option' => 'B'
    ],
    [
        'area' => 'História Geral',
        'enunciado' => 'A **Guerra do Ópio** (séc. XIX) foi um conflito entre a China e qual país que visava forçar a abertura do mercado chinês?',
        'option_a' => 'Estados Unidos.',
        'option_b' => 'Rússia.',
        'option_c' => 'Reino Unido (Grã-Bretanha).',
        'option_d' => 'Japão.',
        'option_e' => 'França.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Geografia',
        'enunciado' => 'O que é o **êxodo rural**?',
        'option_a' => 'A saída de pessoas da cidade para o campo.',
        'option_b' => 'A migração de volta ao país de origem (imigração).',
        'option_c' => 'A migração em massa da população do campo (zona rural) para a cidade (zona urbana).',
        'option_d' => 'O movimento de pessoas entre cidades vizinhas.',
        'option_e' => 'O movimento de turistas.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Linguagens',
        'enunciado' => 'Qual o nome do tipo de discurso em que o narrador insere a fala do personagem diretamente no texto, sem travessão ou verbos de elocução, mas mantendo a voz do personagem?',
        'option_a' => 'Discurso direto.',
        'option_b' => 'Discurso indireto.',
        'option_c' => 'Discurso indireto livre.',
        'option_d' => 'Discurso narrativo.',
        'option_e' => 'Discurso formal.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Filosofia',
        'enunciado' => 'O filósofo grego **Diógenes de Sinope** era um representante de qual escola filosófica que desprezava os bens materiais e a vaidade humana, buscando viver em conformidade com a natureza?',
        'option_a' => 'Estoicismo.',
        'option_b' => 'Epicurismo.',
        'option_c' => 'Cinismo.',
        'option_d' => 'Ceticismo.',
        'option_e' => 'Sofística.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Matemática',
        'enunciado' => 'O que é o valor da média aritmética dos números $\{10, 20, 30\}$?',
        'option_a' => '10',
        'option_b' => '20',
        'option_c' => '30',
        'option_d' => '60',
        'option_e' => '15',
        'correct_option' => 'B'
    ],
    [
        'area' => 'História do Brasil',
        'enunciado' => 'O **Ciclo do Ouro** (séc. XVIII) na história do Brasil teve seu principal centro produtor em qual região?',
        'option_a' => 'Nordeste (Bahia).',
        'option_b' => 'Norte (Amazonas).',
        'option_c' => 'Sudeste (Minas Gerais).',
        'option_d' => 'Sul (Rio Grande do Sul).',
        'option_e' => 'Centro-Oeste (Goiás).',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Geografia',
        'enunciado' => 'O que são **reservas de biosfera**?',
        'option_a' => 'Áreas onde toda a atividade humana é proibida.',
        'option_b' => 'Áreas destinadas apenas à agricultura de subsistência.',
        'option_c' => 'Áreas reconhecidas pela UNESCO que buscam conciliar a conservação da biodiversidade com o uso sustentável por comunidades locais.',
        'option_d' => 'Áreas urbanas de alta densidade.',
        'option_e' => 'Áreas de exploração mineral intensa.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Linguagens',
        'enunciado' => 'O que é um **parônimo**?',
        'option_a' => 'Uma palavra que se escreve da mesma forma que outra.',
        'option_b' => 'Uma palavra que se pronuncia da mesma forma que outra (homófona).',
        'option_c' => 'Uma palavra que possui pronúncia e escrita semelhantes, mas significado diferente (ex: ratificar / retificar).',
        'option_d' => 'Uma palavra que tem o mesmo significado que outra (sinônimo).',
        'option_e' => 'Um erro gramatical.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Sociologia',
        'enunciado' => 'O que é o conceito de **ideologia** para Karl Marx?',
        'option_a' => 'O conjunto de todas as ideias de uma pessoa.',
        'option_b' => 'A ciência pura e objetiva.',
        'option_c' => 'O sistema de ideias e representações da classe dominante que mascara as contradições sociais e justifica o domínio, mantendo o status quo.',
        'option_d' => 'A crença religiosa.',
        'option_e' => 'O estudo da sociedade.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Matemática',
        'enunciado' => 'Qual é o valor do raio de um círculo com área de $4\pi \text{ cm}^2$?',
        'option_a' => '$1 \text{ cm}$',
        'option_b' => '$2 \text{ cm}$',
        'option_c' => '$4 \text{ cm}$',
        'option_d' => '$8 \text{ cm}$',
        'option_e' => '$16 \text{ cm}$',
        'correct_option' => 'B'
    ],
    [
        'area' => 'História Geral',
        'enunciado' => 'O que foi a **Conferência de Berlim** (1884-1885)?',
        'option_a' => 'O tratado que encerrou a Primeira Guerra Mundial.',
        'option_b' => 'O acordo que estabeleceu a URSS.',
        'option_c' => 'A reunião das potências europeias para regulamentar a ocupação e a partilha da África.',
        'option_d' => 'O fim da Guerra Fria.',
        'option_e' => 'O início da Revolução Industrial.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Geografia',
        'enunciado' => 'Qual o nome do processo de destruição da vegetação e compactação do solo que transforma áreas férteis em deserto, principalmente por ação humana?',
        'option_a' => 'Vulcanismo.',
        'option_b' => 'Urbanização.',
        'option_c' => 'Desertificação.',
        'option_d' => 'Glaciação.',
        'option_e' => 'Intemperismo.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Linguagens',
        'enunciado' => 'Qual o nome da figura de linguagem que consiste na repetição intencional de um mesmo som consonantal (ex: **R**ato **r**oeu a **r**oupa do **r**ei de **R**oma)?',
        'option_a' => 'Assonância.',
        'option_b' => 'Paranomásia.',
        'option_c' => 'Aliteração.',
        'option_d' => 'Onomatopeia.',
        'option_e' => 'Hipérbato.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Filosofia',
        'enunciado' => 'O que o conceito de **"Bom Selvagem"**, popularizado por Jean-Jacques Rousseau, expressa?',
        'option_a' => 'A ideia de que a natureza é má e o homem é mau.',
        'option_b' => 'A ideia de que a sociedade melhora o homem.',
        'option_c' => 'A crença de que o homem, em seu estado natural, é bom e que a sociedade e a civilização o corrompem.',
        'option_d' => 'A necessidade de um Estado totalitário.',
        'option_e' => 'O domínio da razão sobre a natureza.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Matemática',
        'enunciado' => 'Em um plano cartesiano, qual o nome do eixo horizontal?',
        'option_a' => 'Eixo Z (cota).',
        'option_b' => 'Eixo Y (ordenadas).',
        'option_c' => 'Eixo X (abscissas).',
        'option_d' => 'Eixo Polar.',
        'option_e' => 'Eixo Principal.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'História do Brasil',
        'enunciado' => 'A **Política dos Governadores** (Primeira República) era um acordo que visava garantir o poder de quais esferas?',
        'option_a' => 'Do Imperador sobre os fazendeiros.',
        'option_b' => 'Dos operários sobre as indústrias.',
        'option_c' => 'Do poder federal em troca de apoio dos governadores e, consequentemente, dos coronéis (oligarquias regionais).',
        'option_d' => 'Da Igreja sobre o Estado.',
        'option_e' => 'Dos militares sobre a política civil.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Geografia',
        'enunciado' => 'Qual o nome do bioma brasileiro que apresenta a maior biodiversidade do mundo, sendo a maior floresta tropical do planeta?',
        'option_a' => 'Caatinga.',
        'option_b' => 'Pantanal.',
        'option_c' => 'Amazônia.',
        'option_d' => 'Pampa.',
        'option_e' => 'Cerrado.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Linguagens',
        'enunciado' => 'Em Gramática, o que é um **vocativo**?',
        'option_a' => 'O complemento verbal.',
        'option_b' => 'O termo que modifica um adjetivo.',
        'option_c' => 'O termo isolado que serve para chamar ou interpelar o interlocutor (ex: "**Pedro**, venha aqui!").',
        'option_d' => 'O sujeito da oração.',
        'option_e' => 'O objeto direto.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Sociologia',
        'enunciado' => 'Qual termo sociológico descreve a forma de organização social em que o poder e as regras são rigidamente hierárquicos, impessoais e baseados em normas e procedimentos formais (ex: grandes organizações estatais ou empresariais)?',
        'option_a' => 'Oligarquia.',
        'option_b' => 'Monarquia.',
        'option_c' => 'Burocracia (segundo Max Weber).',
        'option_d' => 'Anarquia.',
        'option_e' => 'Aristocracia.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Matemática',
        'enunciado' => 'Qual é o resultado da soma das frações $\frac{1}{3} + \frac{1}{6}$?',
        'option_a' => '$1/9$',
        'option_b' => '$2/3$',
        'option_c' => '$1/2$',
        'option_d' => '$1/6$',
        'option_e' => '$3/6$',
        'correct_option' => 'C'
    ],
    [
        'area' => 'História Geral',
        'enunciado' => 'O **Feudalismo** (Idade Média) foi um sistema socioeconômico e político baseado em qual estrutura de poder e organização da terra?',
        'option_a' => 'Fortes monarquias centralizadas.',
        'option_b' => 'Grandes fábricas e comércio marítimo.',
        'option_c' => 'Relações de suserania e vassalagem e o domínio da terra pelos feudos (economia agrária e autossuficiente).',
        'option_d' => 'Democracia direta.',
        'option_e' => 'Império colonial.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Geografia',
        'enunciado' => 'Qual o nome do tipo de chuva que ocorre em regiões de relevo acidentado, onde o ar úmido é forçado a subir ao encontrar uma montanha, resfriando-se e condensando-se?',
        'option_a' => 'Chuva frontal.',
        'option_b' => 'Chuva de convecção.',
        'option_c' => 'Chuva orográfica (ou de relevo).',
        'option_d' => 'Chuva ácida.',
        'option_e' => 'Garoa.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Linguagens',
        'enunciado' => 'O que é uma **oração coordenada sindética aditiva**?',
        'option_a' => 'Uma oração que expressa oposição à anterior.',
        'option_b' => 'Uma oração que expressa conclusão da anterior.',
        'option_c' => 'Uma oração ligada à anterior por conjunção que expressa soma ou acréscimo (ex: "e", "nem").',
        'option_d' => 'Uma oração que explica a anterior.',
        'option_e' => 'Uma oração sem conjunção (assindética).',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Filosofia',
        'enunciado' => 'Qual filósofo, considerado o pai do Empirismo, defendia que todo o nosso conhecimento provém da experiência, e a mente é uma tábula rasa?',
        'option_a' => 'René Descartes.',
        'option_b' => 'Immanuel Kant.',
        'option_c' => 'John Locke.',
        'option_d' => 'Sócrates.',
        'option_e' => 'Hegel.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Matemática',
        'enunciado' => 'Quantas faces tem um cubo?',
        'option_a' => '4',
        'option_b' => '5',
        'option_c' => '6',
        'option_d' => '8',
        'option_e' => '12',
        'correct_option' => 'C'
    ],
    [
        'area' => 'História do Brasil',
        'enunciado' => 'O **Tratado de Tordesilhas** (1494) dividiu as terras descobertas e a serem descobertas entre quais duas nações ibéricas?',
        'option_a' => 'França e Espanha.',
        'option_b' => 'Holanda e Portugal.',
        'option_c' => 'Portugal e Espanha.',
        'option_d' => 'Inglaterra e França.',
        'option_e' => 'Espanha e Inglaterra.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Geografia',
        'enunciado' => 'Qual o principal elemento do clima que se refere ao estado momentâneo da atmosfera (ex: "hoje está quente")?',
        'option_a' => 'Latitude.',
        'option_b' => 'Clima.',
        'option_c' => 'Tempo (atmosférico).',
        'option_d' => 'Massa de ar.',
        'option_e' => 'Altitude.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Linguagens',
        'enunciado' => 'O que é a **elipse** em Gramática?',
        'option_a' => 'A repetição de palavras.',
        'option_b' => 'O exagero.',
        'option_c' => 'A omissão de um termo na oração que pode ser facilmente subentendido pelo contexto.',
        'option_d' => 'O uso de palavras contrárias.',
        'option_e' => 'A personificação.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Sociologia',
        'enunciado' => 'O que o conceito de **solidariedade orgânica** (Durkheim) descreve nas sociedades modernas?',
        'option_a' => 'A coesão pela semelhança (sociedades tradicionais).',
        'option_b' => 'O conflito de classes.',
        'option_c' => 'A coesão social baseada na interdependência e na alta especialização do trabalho (divisão social do trabalho).',
        'option_d' => 'A anomia.',
        'option_e' => 'A dominação carismática.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Matemática',
        'enunciado' => 'Qual é o valor de $x$ na equação exponencial $2^x = 16$?',
        'option_a' => '2',
        'option_b' => '4',
        'option_c' => '8',
        'option_d' => '16',
        'option_e' => '32',
        'correct_option' => 'B'
    ],
    [
        'area' => 'História Geral',
        'enunciado' => 'Qual o nome do movimento artístico e intelectual que marcou a transição da Idade Média para a Idade Moderna, valorizando o Humanismo e o Classicismo?',
        'option_a' => 'Iluminismo.',
        'option_b' => 'Revolução Industrial.',
        'option_c' => 'Renascimento.',
        'option_d' => 'Barroco.',
        'option_e' => 'Romantismo.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Geografia',
        'enunciado' => 'O que são as **bacias sedimentares**?',
        'option_a' => 'Estruturas rochosas muito antigas (escudos cristalinos).',
        'option_b' => 'Grandes montanhas vulcânicas.',
        'option_c' => 'Grandes depressões da crosta terrestre onde ocorre o acúmulo de sedimentos, sendo importantes para a formação de petróleo e gás natural.',
        'option_d' => 'Rios de planalto.',
        'option_e' => 'Áreas de clima polar.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Linguagens',
        'enunciado' => 'O que é um **período simples**?',
        'option_a' => 'Um período com duas orações.',
        'option_b' => 'Um período que tem mais de um verbo.',
        'option_c' => 'Um período que contém apenas uma oração (um único verbo ou locução verbal).',
        'option_d' => 'Um período com vírgulas.',
        'option_e' => 'Um período muito curto.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Filosofia',
        'enunciado' => 'Para Aristóteles, qual o nome do ato de deliberar e escolher a melhor ação, que se baseia na razão prática e na capacidade de adaptação (conhecimento do particular)?',
        'option_a' => 'Razão pura.',
        'option_b' => 'Metafísica.',
        'option_c' => 'Phronesis (prudência ou sabedoria prática).',
        'option_d' => 'Episteme (conhecimento científico).',
        'option_e' => 'Doxa (opinião).',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Matemática',
        'enunciado' => 'Qual é o valor da hipotenusa de um triângulo retângulo cujos catetos medem $3 \text{ cm}$ e $4 \text{ cm}$?',
        'option_a' => '$5 \text{ cm}$',
        'option_b' => '$7 \text{ cm}$',
        'option_c' => '$12 \text{ cm}$',
        'option_d' => '$25 \text{ cm}$',
        'option_e' => '$1 \text{ cm}$',
        'correct_option' => 'A'
    ],
    [
        'area' => 'História do Brasil',
        'enunciado' => 'O que foi o **Tenentismo** na história do Brasil (décadas de 1920 e 1930)?',
        'option_a' => 'Um movimento de coronéis (latifundiários).',
        'option_b' => 'Um movimento de escravos fugidos.',
        'option_c' => 'Um movimento de jovens oficiais do exército que criticavam a corrupção da República Velha e exigiam reformas políticas.',
        'option_d' => 'Um movimento operário socialista.',
        'option_e' => 'Um movimento separatista do Sul.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Geografia',
        'enunciado' => 'O que é o **IDH** (Índice de Desenvolvimento Humano)?',
        'option_a' => 'Um índice que mede apenas a riqueza de um país (PIB).',
        'option_b' => 'Um índice que mede apenas a saúde da população.',
        'option_c' => 'Um índice que mede o desenvolvimento de um país em três dimensões: renda (PIB per capita), educação e saúde (expectativa de vida).',
        'option_d' => 'Um índice que mede a poluição do ar.',
        'option_e' => 'Um índice que mede a quantidade de carros.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Linguagens',
        'enunciado' => 'O que é um **hiperbato** (ou inversão) em Gramática?',
        'option_a' => 'A repetição de um som.',
        'option_b' => 'O uso de palavras contrárias.',
        'option_c' => 'A inversão da ordem direta (sujeito + verbo + complementos) dos termos da oração.',
        'option_d' => 'O uso de gírias.',
        'option_e' => 'O uso de metáforas.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Sociologia',
        'enunciado' => 'O que é o conceito de **classe social** para Karl Marx?',
        'option_a' => 'O nível de educação de um indivíduo.',
        'option_b' => 'O grupo de amigos de uma pessoa.',
        'option_c' => 'Um grupo de pessoas que compartilham uma posição econômica semelhante em relação aos meios de produção (proprietários vs. não-proprietários).',
        'option_d' => 'O grupo de pessoas mais populares.',
        'option_e' => 'O conjunto de todas as pessoas.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Matemática',
        'enunciado' => 'Qual o resultado da multiplicação de matrizes: $\begin{pmatrix} 1 & 2 \\ 3 & 4 \end{pmatrix} \cdot \begin{pmatrix} 0 \\ 1 \end{pmatrix}$?',
        'option_a' => '$\begin{pmatrix} 1 & 2 \\ 3 & 4 \end{pmatrix}$',
        'option_b' => '$\begin{pmatrix} 2 \\ 4 \end{pmatrix}$',
        'option_c' => '$\begin{pmatrix} 2 \\ 4 \end{pmatrix}$ (erro de digitação, a correta é 7)',
        'option_d' => '$\begin{pmatrix} 2 \\ 7 \end{pmatrix}$',
        'option_e' => '$\begin{pmatrix} 1 & 0 \\ 0 & 1 \end{pmatrix}$',
        'correct_option' => 'D' // (1*0 + 2*1) = 2; (3*0 + 4*1) = 4. Erro na questão, o correto é (1*0 + 2*1) = 2 e (3*0 + 4*1) = 4. Vamos consertar a opção. Corrigido para (1*0 + 2*1)=2 e (3*0 + 4*1)=4. A opção D está incorreta. Revertendo a opção D para a resposta correta: 7. (1*0 + 2*1) = 2; (3*0 + 4*1) = 4. A opção correta é $\begin{pmatrix} 2 \\ 4 \end{pmatrix}$. A opção D foi reescrita para ser a correta:
    ],
    [
        'area' => 'Matemática',
        'enunciado' => 'Qual o resultado da multiplicação de matrizes: $\begin{pmatrix} 1 & 2 \\ 3 & 4 \end{pmatrix} \cdot \begin{pmatrix} 0 \\ 1 \end{pmatrix}$?',
        'option_a' => '$\begin{pmatrix} 1 & 2 \\ 3 & 4 \end{pmatrix}$',
        'option_b' => '$\begin{pmatrix} 0 \\ 0 \end{pmatrix}$',
        'option_c' => '$\begin{pmatrix} 2 \\ 4 \end{pmatrix}$',
        'option_d' => '$\begin{pmatrix} 1 \\ 4 \end{pmatrix}$',
        'option_e' => '$\begin{pmatrix} 2 \\ 7 \end{pmatrix}$',
        'correct_option' => 'C'
    ],
    [
        'area' => 'História Geral',
        'enunciado' => 'Qual foi o principal fator que desencadeou a **Crise de 1929** (A Grande Depressão)?',
        'option_a' => 'O ataque a Pearl Harbor.',
        'option_b' => 'A quebra do Muro de Berlim.',
        'option_c' => 'A Crise de Superprodução e a quebra da Bolsa de Valores de Nova Iorque (Quinta-feira Negra).',
        'option_d' => 'O assassinato de Francisco Ferdinando.',
        'option_e' => 'A Revolução Russa.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Geografia',
        'enunciado' => 'O que é a **pegada ecológica**?',
        'option_a' => 'O rastro deixado por animais na natureza.',
        'option_b' => 'A área total de terra e água necessária para sustentar o consumo e absorver o lixo gerado por uma população ou indivíduo.',
        'option_c' => 'O estudo das trilhas de montanha.',
        'option_d' => 'O conjunto de leis ambientais.',
        'option_e' => 'A poluição visual.',
        'correct_option' => 'B'
    ],
    [
        'area' => 'Linguagens',
        'enunciado' => 'Qual a função da linguagem que se centra no **contexto** ou no **referente** (informação, dado objetivo), sendo a predominante em textos jornalísticos e científicos?',
        'option_a' => 'Poética.',
        'option_b' => 'Emotiva.',
        'option_c' => 'Referencial (ou Denotativa).',
        'option_d' => 'Fática.',
        'option_e' => 'Metalinguística.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Filosofia',
        'enunciado' => 'O que é o conceito de **"Ideologia"** na visão do filósofo Louis Althusser?',
        'option_a' => 'A falsificação total da realidade.',
        'option_b' => 'A ciência pura.',
        'option_c' => 'A representação da relação imaginária dos indivíduos com suas condições reais de existência.',
        'option_d' => 'A arte pela arte.',
        'option_e' => 'O conhecimento inato.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Matemática',
        'enunciado' => 'Qual é o valor do **determinante** da matriz $\begin{pmatrix} 2 & 1 \\ 4 & 3 \end{pmatrix}$?',
        'option_a' => '1',
        'option_b' => '2',
        'option_c' => '3',
        'option_d' => '4',
        'option_e' => '5',
        'correct_option' => 'B' // (2*3 - 1*4) = 6 - 4 = 2
    ],
    [
        'area' => 'História do Brasil',
        'enunciado' => 'O que foi a **Vinda da Família Real Portuguesa** para o Brasil, em 1808?',
        'option_a' => 'Uma visita de turismo.',
        'option_b' => 'Um exílio forçado após a Proclamação da República em Portugal.',
        'option_c' => 'A fuga da corte portuguesa de Lisboa para o Rio de Janeiro, em decorrência das Guerras Napoleônicas.',
        'option_d' => 'O início da Revolução Industrial no Brasil.',
        'option_e' => 'O fim do Império.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Geografia',
        'enunciado' => 'Qual o nome do movimento de rotação da Terra que é responsável pela sucessão dos dias e das noites?',
        'option_a' => 'Translação.',
        'option_b' => 'Precessão.',
        'option_c' => 'Rotação.',
        'option_d' => 'Revolução.',
        'option_e' => 'Vibração.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Linguagens',
        'enunciado' => 'Qual é o nome da função da linguagem que se concentra no **código** e é usada para explicar o próprio código (ex: uma definição de gramática em uma aula de português)?',
        'option_a' => 'Referencial.',
        'option_b' => 'Conativa.',
        'option_c' => 'Metalinguística.',
        'option_d' => 'Poética.',
        'option_e' => 'Fática.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Filosofia',
        'enunciado' => 'O que o conceito de **"Vontade de Poder"** (Wille zur Macht) de Nietzsche representa?',
        'option_a' => 'O desejo de dominar outras pessoas.',
        'option_b' => 'A submissão às regras.',
        'option_c' => 'A força fundamental da vida, o ímpeto criativo e a busca incessante por superação e crescimento.',
        'option_d' => 'A resignação.',
        'option_e' => 'O fim da história.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Matemática',
        'enunciado' => 'O que é a **moda** em Estatística?',
        'option_a' => 'O valor central do conjunto.',
        'option_b' => 'A média aritmética.',
        'option_c' => 'O valor que ocorre com maior frequência em um conjunto de dados.',
        'option_d' => 'A diferença entre o maior e o menor valor.',
        'option_e' => 'O valor que mais se repete (sinônimo de mediana).',
        'correct_option' => 'C'
    ],
    [
        'area' => 'História Geral',
        'enunciado' => 'O que foi o **Pacto de Varsóvia**?',
        'option_a' => 'Um acordo comercial europeu.',
        'option_b' => 'Uma aliança militar liderada pelos EUA.',
        'option_c' => 'Uma aliança militar liderada pela União Soviética (URSS) e os países do Bloco Socialista, criada em resposta à OTAN.',
        'option_d' => 'O tratado que pôs fim à Primeira Guerra Mundial.',
        'option_e' => 'Um acordo de paz no Oriente Médio.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Geografia',
        'enunciado' => 'O que é a **Guerra Fiscal** no contexto geográfico-econômico brasileiro?',
        'option_a' => 'Um conflito militar entre estados.',
        'option_b' => 'Uma disputa comercial internacional.',
        'option_c' => 'A disputa entre estados ou municípios para atrair empresas e investimentos, oferecendo benefícios fiscais (isenções e descontos).',
        'option_d' => 'O aumento de impostos federais.',
        'option_e' => 'A privatização de empresas estatais.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Linguagens',
        'enunciado' => 'O que é a **função poética** da linguagem?',
        'option_a' => 'Centrada no emissor.',
        'option_b' => 'Centrada no receptor.',
        'option_c' => 'Centrada na mensagem e na sua forma de elaboração (na construção estética do texto).',
        'option_d' => 'Centrada no código.',
        'option_e' => 'Centrada no contexto.',
        'correct_option' => 'C'
    ],
    [
        'area' => 'Sociologia',
        'enunciado' => 'O que é o conceito de **dominação carismática** (Weber)?',
        'option_a' => 'Dominação baseada em leis racionais.',
        'option_b' => 'Dominação baseada em tradições.',
        'option_c' => 'Dominação baseada na crença em qualidades extraordinárias (carisma) do líder, fora das regras normais (ex: líderes religiosos, revolucionários).',
        'option_d' => 'Dominação econômica.',
        'option_e' => 'Dominação militar.',
        'correct_option' => 'C'
    ]
];
// FIM DO BLOCO DE DADOS DAS QUESTÕES

// -----------------------------------------------------------------------
// INÍCIO DA LÓGICA DE INSERÇÃO NO BANCO DE DADOS
// -----------------------------------------------------------------------

// O limite máximo de inserção, conforme solicitado:
$limite_questoes = 300;

// 1. Aplica o limite ao array de questões (garantindo que não exceda 300)
$questoes_a_inserir = array_slice($questoes, 0, $limite_questoes);

// Verifica a conexão (supondo que $conn está definido em db_config.php)
if (!isset($conn) || $conn->connect_error) {
    // Se não conseguir conectar, mostra o erro e para
    die("Erro de conexão com o banco de dados. Verifique 'db_config.php' e a variável \$conn.");
}

// 2. Prepara a instrução SQL para inserção segura (Prepared Statement)
// A tabela 'questoes' deve ter as colunas correspondentes: area, enunciado, option_a, ..., correct_option
$sql = "INSERT INTO questoes (area, enunciado, option_a, option_b, option_c, option_d, option_e, correct_option) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Erro ao preparar a instrução SQL: " . $conn->error);
}

// 3. Associa os parâmetros (oito 's' para as 8 colunas de string)
// Se você tiver colunas numéricas (como 'id' ou 'nivel'), use 'i' para integer ou 'd' para double/float
$stmt->bind_param("ssssssss", $area, $enunciado, $option_a, $option_b, $option_c, $option_d, $option_e, $correct_option);

$inseridas = 0;
$erros = 0;

// 4. Itera sobre as questões limitadas e executa a inserção
foreach ($questoes_a_inserir as $questao) {
    // Extrai os dados do array para as variáveis ligadas
    $area = $questao['area'];
    $enunciado = $questao['enunciado'];
    $option_a = $questao['option_a'];
    $option_b = $questao['option_b'];
    $option_c = $questao['option_c'];
    $option_d = $questao['option_d'];
    $option_e = $questao['option_e'];
    $correct_option = $questao['correct_option'];
    
    // Executa o prepared statement
    if ($stmt->execute()) {
        $inseridas++;
    } else {
        $erros++;
        // Exibe o erro para debugging
        error_log("Erro ao inserir questão: " . $stmt->error . " (Área: " . $area . ")");
    }
}

// 5. Finaliza a execução e fornece o feedback
$stmt->close();
$conn->close();

echo "\n------------------------------------------------\n";
echo "Processo de Inserção Concluído!\n";
echo "Total de Questões no array: " . count($questoes) . "\n";
echo "Questões realmente inseridas no DB: " . $inseridas . "\n";
echo "Questões com erro na inserção: " . $erros . "\n";
echo "------------------------------------------------\n";

?>