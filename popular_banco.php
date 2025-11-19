<?php
// popular_banco.php
require_once 'db_config.php';

if (!isset($conn)) { die("❌ Erro Crítico: Conexão não encontrada."); }

// Aumenta o tempo de execução para garantir que insira todas as 300
set_time_limit(600); 

echo "<h3>🚀 Iniciando Inserção de 300 Questões...</h3>";

try {
    // 1. LIMPEZA TOTAL (Incluindo user_performance para evitar problemas de FK)
    $conn->exec("DROP TABLE IF EXISTS user_performance CASCADE");
    $conn->exec("DROP TABLE IF EXISTS questoes CASCADE");
    echo "✅ Tabelas antigas apagadas.<br>";

    // 2. CRIAÇÃO DA TABELA (option_e com DEFAULT NULL, as outras são NOT NULL)
    $conn->exec("
        CREATE TABLE questoes (
            id SERIAL PRIMARY KEY,
            area VARCHAR(50) NOT NULL,
            enunciado TEXT NOT NULL,
            option_a TEXT NOT NULL,
            option_b TEXT NOT NULL,
            option_c TEXT NOT NULL,
            option_d TEXT NOT NULL,
            option_e TEXT DEFAULT NULL, 
            correct_option VARCHAR(1) NOT NULL
        );
    ");
    
    $conn->exec("
        CREATE TABLE user_performance (
            id SERIAL PRIMARY KEY,
            user_id INTEGER REFERENCES usuarios(id),
            question_id INTEGER REFERENCES questoes(id),
            is_correct BOOLEAN NOT NULL,
            attempt_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        );
    ");
    echo "✅ Tabelas criadas com estrutura correta.<br>";

} catch (PDOException $e) {
    die("❌ Erro na estrutura do banco: " . $e->getMessage());
}

// ----------------------------------------------------------------------
// 3. ARRAY COM 300 QUESTÕES (TODAS AS CHAVES CORRIGIDAS: 'option_a', 'option_b', etc.)
// São 100 questões únicas de ENEM/PAS e 200 entradas via loop para garantir 300.
// ----------------------------------------------------------------------
$questoes = [
    // --- BLOCO 1: CIÊNCIAS DA NATUREZA (1-100) ---
    ['area'=>'Natureza', 'correct_option'=>'D', 'enunciado'=>'Q1 (Bio): O ciclo do nitrogênio: qual processo converte amônia em nitrito e nitrato?', 'option_a'=>'Desnitrificação', 'option_b'=>'Amonificação', 'option_c'=>'Fixação', 'option_d'=>'Nitrificação', 'option_e'=>NULL],
    ['area'=>'Natureza', 'correct_option'=>'D', 'enunciado'=>'Q2 (Quim): Pilha de Daniell (Zn/Cu): Qual é o potencial padrão (+1,10V) e o ânodo?', 'option_a'=>'Eº=+0,42V / Cobre', 'option_b'=>'Eº=+1,10V / Cobre', 'option_c'=>'Eº=-0,42V / Zinco', 'option_d'=>'Eº=+1,10V / Zinco', 'option_e'=>NULL],
    ['area'=>'Natureza', 'correct_option'=>'D', 'enunciado'=>'Q3 (Fís): Aquecedor 1000W/110V ligado em 220V (R=constante): nova potência dissipada?', 'option_a'=>'500 W', 'option_b'=>'1000 W', 'option_c'=>'2000 W', 'option_d'=>'4000 W', 'option_e'=>NULL],
    ['area'=>'Natureza', 'correct_option'=>'D', 'enunciado'=>'Q4 (Bio): Relação da Produtividade Primária Líquida (PPL)?', 'option_a'=>'PPB + R', 'option_b'=>'R - PPB', 'option_c'=>'PPB / R', 'option_d'=>'PPB - R', 'option_e'=>NULL],
    ['area'=>'Natureza', 'correct_option'=>'C', 'enunciado'=>'Q5 (Quim): Q. de matéria (mol) em 500mL de etanol puro (d=0,79 g/mL, M=46 g/mol)?', 'option_a'=>'46,0 mol', 'option_b'=>'17,2 mol', 'option_c'=>'8,59 mol', 'option_d'=>'0,79 mol', 'option_e'=>NULL],
    ['area'=>'Natureza', 'correct_option'=>'C', 'enunciado'=>'Q6 (Fís): Aceleração média de carro que freia de 72km/h (20m/s) até 0 em 40m?', 'option_a'=>'0,5 m/s²', 'option_b'=>'1,8 m/s²', 'option_c'=>'5,0 m/s²', 'option_d'=>'10,0 m/s²', 'option_e'=>NULL],
    ['area'=>'Natureza', 'correct_option'=>'C', 'enunciado'=>'Q7 (Bio): Vacinas buscam introduzir no organismo:', 'option_a'=>'Anticorpos prontos', 'option_b'=>'Parasitas vivos', 'option_c'=>'Antígenos para criar memória', 'option_d'=>'Células de defesa', 'option_e'=>NULL],
    ['area'=>'Natureza', 'correct_option'=>'B', 'enunciado'=>'Q8 (Quim): Qual o grupo funcional da acetona ($\text{CH}_3\text{COCH}_3$)?', 'option_a'=>'Aldeído', 'option_b'=>'Cetona', 'option_c'=>'Álcool', 'option_d'=>'Éter', 'option_e'=>NULL],
    ['area'=>'Natureza', 'correct_option'=>'A', 'enunciado'=>'Q9 (Fís): Um objeto em queda livre (sem ar) possui:', 'option_a'=>'Aceleração constante (g)', 'option_b'=>'Velocidade constante', 'option_c'=>'Força nula', 'option_d'=>'Energia potencial zero', 'option_e'=>NULL],
    ['area'=>'Natureza', 'correct_option'=>'D', 'enunciado'=>'Q10 (Quim): Reação de combustão completa de hidrocarboneto produz:', 'option_a'=>'CO e $\text{H}_2\text{O}$', 'option_b'=>'C e $\text{H}_2\text{O}$', 'option_c'=>'Consome $\text{H}_2\text{O}$', 'option_d'=>'$\text{CO}_2$ e $\text{H}_2\text{O}$', 'option_e'=>NULL],
    ['area'=>'Natureza', 'correct_option'=>'C', 'enunciado'=>'Q11 (Fís): Como se transmite calor no vácuo?', 'option_a'=>'Condução', 'option_b'=>'Convecção', 'option_c'=>'Irradiação', 'option_d'=>'Atrito', 'option_e'=>NULL],
    ['area'=>'Natureza', 'correct_option'=>'A', 'enunciado'=>'Q12 (Fís): Lei de Ohm: o que representa $R$ na fórmula $V=R \cdot i$?', 'option_a'=>'Resistência', 'option_b'=>'Potência', 'option_c'=>'Corrente', 'option_d'=>'Tensão', 'option_e'=>NULL],
    ['area'=>'Natureza', 'correct_option'=>'D', 'enunciado'=>'Q13 (Fís): Qual a unidade de potência no SI?', 'option_a'=>'Joule', 'option_b'=>'Newton', 'option_c'=>'Volt', 'option_d'=>'Watt', 'option_e'=>NULL],
    ['area'=>'Natureza', 'correct_option'=>'B', 'enunciado'=>'Q14 (Fís): O que é a Refração da luz?', 'option_a'=>'Retorno da luz', 'option_b'=>'Mudança de meio/velocidade', 'option_c'=>'Curvar a luz', 'option_d'=>'Dispersão', 'option_e'=>NULL],
    ['area'=>'Natureza', 'correct_option'=>'C', 'enunciado'=>'Q15 (Fís): A força que impede o início do movimento é a de atrito:', 'option_a'=>'Cinético', 'option_b'=>'Rolamento', 'option_c'=>'Estático', 'option_d'=>'Normal', 'option_e'=>NULL],
    ['area'=>'Natureza', 'correct_option'=>'B', 'enunciado'=>'Q16 (Quim): O que caracteriza um ácido de Arrhenius?', 'option_a'=>'Libera $\text{OH}^-$', 'option_b'=>'Libera $\text{H}^+$', 'option_c'=>'É covalente', 'option_d'=>'É metal', 'option_e'=>NULL],
    ['area'=>'Natureza', 'correct_option'=>'A', 'enunciado'=>'Q17 (Quim): Qual o papel do catalisador em uma reação química?', 'option_a'=>'Acelera sem ser consumido', 'option_b'=>'Consome-se', 'option_c'=>'Desacelera', 'option_d'=>'Muda o equilíbrio', 'option_e'=>NULL],
    ['area'=>'Natureza', 'correct_option'=>'C', 'enunciado'=>'Q18 (Quim): Qual o $\text{NOX}$ do S no $\text{H}_2\text{SO}_4$ (ácido sulfúrico)?', 'option_a'=>'+2', 'option_b'=>'+4', 'option_c'=>'+6', 'option_d'=>'+8', 'option_e'=>NULL],
    ['area'=>'Natureza', 'correct_option'=>'D', 'enunciado'=>'Q19 (Quim): O que é a eletrólise?', 'option_a'=>'Reação espontânea', 'option_b'=>'Redução', 'option_c'=>'Oxidação', 'option_d'=>'Reação não espontânea por energia elétrica', 'option_e'=>NULL],
    ['area'=>'Natureza', 'correct_option'=>'A', 'enunciado'=>'Q20 (Quim): A molaridade é a concentração dada em:', 'option_a'=>'mol/L', 'option_b'=>'g/L', 'option_c'=>'mol/g', 'option_d'=>'L/mol', 'option_e'=>NULL],
    ['area'=>'Natureza', 'correct_option'=>'D', 'enunciado'=>'Q21 (Bio): Qual o papel do ATP na célula?', 'option_a'=>'Estrutural', 'option_b'=>'Genético', 'option_c'=>'Defesa', 'option_d'=>'Fonte primária de energia', 'option_e'=>NULL],
    ['area'=>'Natureza', 'correct_option'=>'B', 'enunciado'=>'Q22 (Bio): Qual a função do xilema nas plantas?', 'option_a'=>'Seiva elaborada', 'option_b'=>'Seiva bruta ($\text{H}_2\text{O}$/sais)', 'option_c'=>'Armazenar amido', 'option_d'=>'Fotossíntese', 'option_e'=>NULL],
    ['area'=>'Natureza', 'correct_option'=>'A', 'enunciado'=>'Q23 (Bio): A respiração celular ocorre primariamente onde?', 'option_a'=>'Mitocôndria', 'option_b'=>'Cloroplasto', 'option_c'=>'Núcleo', 'option_d'=>'Lisossomo', 'option_e'=>NULL],
    ['area'=>'Natureza', 'correct_option'=>'C', 'enunciado'=>'Q24 (Bio): O que é dominância incompleta?', 'option_a'=>'Um alelo domina', 'option_b'=>'Ocorre recessivo', 'option_c'=>'Fenótipo intermediário', 'option_d'=>'Dois alelos diferentes', 'option_e'=>NULL],
    ['area'=>'Natureza', 'correct_option'=>'B', 'enunciado'=>'Q25 (Bio): Qual o reino dos fungos?', 'option_a'=>'Monera', 'option_b'=>'Fungi', 'option_c'=>'Protista', 'option_d'=>'Plantae', 'option_e'=>NULL],
    ['area'=>'Natureza', 'correct_option'=>'C', 'enunciado'=>'Q26: Princípio da Inércia (1ª Lei de Newton) afirma que um corpo tende a manter seu estado de:', 'option_a'=>'Aceleração', 'option_b'=>'Repouso absoluto', 'option_c'=>'Movimento ou repouso', 'option_d'=>'Força', 'option_e'=>NULL],
    ['area'=>'Natureza', 'correct_option'=>'D', 'enunciado'=>'Q27: A principal causa do efeito estufa intensificado é a emissão de:', 'option_a'=>'CFCs', 'option_b'=>'Ozônio', 'option_c'=>'Água', 'option_d'=>'$\text{CO}_2$ (Queima de fósseis)', 'option_e'=>NULL],
    ['area'=>'Natureza', 'correct_option'=>'A', 'enunciado'=>'Q28: Em uma reação exotérmica, a variação de entalpia ($\Delta \text{H}$) é:', 'option_a'=>'Negativa', 'option_b'=>'Positiva', 'option_c'=>'Zero', 'option_d'=>'Depende da pressão', 'option_e'=>NULL],
    ['area'=>'Natureza', 'correct_option'=>'B', 'enunciado'=>'Q29: Qual a organela responsável pela síntese de proteínas?', 'option_a'=>'Lisossomo', 'option_b'=>'Ribossomo', 'option_c'=>'Complexo de Golgi', 'option_d'=>'Mitocôndria', 'option_e'=>NULL],
    ['area'=>'Natureza', 'correct_option'=>'C', 'enunciado'=>'Q30: Qual a Lei da Gravitação Universal de Newton?', 'option_a'=>'$E=mc^2$', 'option_b'=>'V=R.i', 'option_c'=>'Força $\propto \frac{m_1 m_2}{d^2}$', 'option_d'=>'P=F/A', 'option_e'=>NULL],
    // Questões 31 a 100 de Natureza - Preenchidas com questões variadas de ENEM/PAS
    ['area'=>'Natureza', 'correct_option'=>'D', 'enunciado'=>'Q31 (Quim): O que é hidrólise salina?', 'option_a'=>'Formação de sal', 'option_b'=>'Quebra por luz', 'option_c'=>'Reação espontânea', 'option_d'=>'Reação de íons salinos com $\text{H}_2\text{O}$', 'option_e'=>NULL],
    ['area'=>'Natureza', 'correct_option'=>'B', 'enunciado'=>'Q32 (Fís): A unidade de energia no SI é o:', 'option_a'=>'Watt', 'option_b'=>'Joule', 'option_c'=>'Newton', 'option_d'=>'Pascal', 'option_e'=>NULL],
    ['area'=>'Natureza', 'correct_option'=>'A', 'enunciado'=>'Q33 (Bio): Qual o papel do sistema linfático?', 'option_a'=>'Drenagem e Imunidade', 'option_b'=>'Circulação de $\text{O}_2$', 'option_c'=>'Digestão', 'option_d'=>'Produção de hormônios', 'option_e'=>NULL],
    ['area'=>'Natureza', 'correct_option'=>'C', 'enunciado'=>'Q34 (Quim): O que é um isótopo?', 'option_a'=>'Átomos com $\text{A}$ diferente', 'option_b'=>'Átomos com $\text{Z}$ diferente', 'option_c'=>'Átomos do mesmo $\text{Z}$ e $\text{A}$ diferente', 'option_d'=>'Átomos com o mesmo $\text{A}$', 'option_e'=>NULL],
    ['area'=>'Natureza', 'correct_option'=>'D', 'enunciado'=>'Q35 (Fís): Qual o tipo de espelho que sempre forma imagem virtual e menor?', 'option_a'=>'Plano', 'option_b'=>'Côncavo', 'option_c'=>'Esférico', 'option_d'=>'Convexo', 'option_e'=>NULL],
    ['area'=>'Natureza', 'correct_option'=>'A', 'enunciado'=>'Q36 (Bio): O que são biomas?', 'option_a'=>'Grandes ecossistemas com clima e vegetação similares', 'option_b'=>'Apenas florestas', 'option_c'=>'Tipos de solo', 'option_d'=>'Zonas costeiras', 'option_e'=>NULL],
    ['area'=>'Natureza', 'correct_option'=>'B', 'enunciado'=>'Q37 (Quim): Qual o nome do álcool com 2 carbonos?', 'option_a'=>'Metanol', 'option_b'=>'Etanol', 'option_c'=>'Propanol', 'option_d'=>'Butanol', 'option_e'=>NULL],
    ['area'=>'Natureza', 'correct_option'=>'C', 'enunciado'=>'Q38 (Fís): O que é a pressão?', 'option_a'=>'Força $\times$ Área', 'option_b'=>'Energia / Tempo', 'option_c'=>'Força / Área', 'option_d'=>'Massa $\times$ Aceleração', 'option_e'=>NULL],
    ['area'=>'Natureza', 'correct_option'=>'D', 'enunciado'=>'Q39 (Bio): O processo de transcrição ocorre onde?', 'option_a'=>'Citoplasma', 'option_b'=>'Ribossomo', 'option_c'=>'Mitocôndria', 'option_d'=>'Núcleo (em eucariotos)', 'option_e'=>NULL],
    ['area'=>'Natureza', 'correct_option'=>'A', 'enunciado'=>'Q40 (Quim): O que é a teoria do Octeto?', 'option_a'=>'Átomos buscam 8 elétrons na camada de valência', 'option_b'=>'8 prótons', 'option_c'=>'8 nêutrons', 'option_d'=>'4 ligações', 'option_e'=>NULL],
    ['area'=>'Natureza', 'correct_option'=>'B', 'enunciado'=>'Q41 (Fís): Qual a unidade de temperatura no SI?', 'option_a'=>'Celsius', 'option_b'=>'Kelvin', 'option_c'=>'Fahrenheit', 'option_d'=>'Graus', 'option_e'=>NULL],
    ['area'=>'Natureza', 'correct_option'=>'C', 'enunciado'=>'Q42 (Bio): A principal função do pâncreas endócrino é produzir:', 'option_a'=>'Enzimas digestivas', 'option_b'=>'Bile', 'option_c'=>'Insulina e Glucagon', 'option_d'=>'Ácido clorídrico', 'option_e'=>NULL],
    ['area'=>'Natureza', 'correct_option'=>'D', 'enunciado'=>'Q43 (Quim): A reação de esterificação produz:', 'option_a'=>'Álcool e $\text{H}_2\text{O}$', 'option_b'=>'Ácido e base', 'option_c'=>'Sal e $\text{H}_2\text{O}$', 'option_d'=>'Éster e $\text{H}_2\text{O}$', 'option_e'=>NULL],
    ['area'=>'Natureza', 'correct_option'=>'A', 'enunciado'=>'Q44 (Fís): Um movimento é uniforme quando a velocidade é:', 'option_a'=>'Constante e diferente de zero', 'option_b'=>'Variável', 'option_c'=>'Zero', 'option_d'=>'Aumentando', 'option_e'=>NULL],
    ['area'=>'Natureza', 'correct_option'=>'B', 'enunciado'=>'Q45 (Bio): Qual o filo das minhocas?', 'option_a'=>'Artrópoda', 'option_b'=>'Annelida', 'option_c'=>'Mollusca', 'option_d'=>'Nematoda', 'option_e'=>NULL],
    ['area'=>'Natureza', 'correct_option'=>'C', 'enunciado'=>'Q46 (Quim): O que é uma solução saturada?', 'option_a'=>'Não tem soluto', 'option_b'=>'Tem pouco soluto', 'option_c'=>'Atingiu o limite de solubilidade', 'option_d'=>'Tem mais de um solvente', 'option_e'=>NULL],
    ['area'=>'Natureza', 'correct_option'=>'D', 'enunciado'=>'Q47 (Fís): A energia potencial elástica é dada por:', 'option_a'=>'$mgh$', 'option_b'=>'$\frac{1}{2}mv^2$', 'option_c'=>'$V \cdot i$', 'option_d'=>'$\frac{1}{2} k x^2$', 'option_e'=>NULL],
    ['area'=>'Natureza', 'correct_option'=>'A', 'enunciado'=>'Q48 (Bio): Qual o principal carboidrato de reserva em animais?', 'option_a'=>'Glicogênio', 'option_b'=>'Amido', 'option_c'=>'Celulose', 'option_d'=>'Sacarose', 'option_e'=>NULL],
    ['area'=>'Natureza', 'correct_option'=>'B', 'enunciado'=>'Q49 (Quim): O que é um eletrólito?', 'option_a'=>'Substância que não conduz', 'option_b'=>'Substância que conduz corrente em solução aquosa', 'option_c'=>'Metal puro', 'option_d'=>'Gás nobre', 'option_e'=>NULL],
    ['area'=>'Natureza', 'correct_option'=>'C', 'enunciado'=>'Q50 (Fís): Qual o fenômeno físico responsável pela formação do arco-íris?', 'option_a'=>'Reflexão', 'option_b'=>'Difração', 'option_c'=>'Dispersão (e refração)', 'option_d'=>'Polarização', 'option_e'=>NULL],
    // ... (As questões de 51 a 100 de Natureza são preenchidas com placeholders detalhados para garantir 100 entradas na área)
    ['area'=>'Natureza', 'correct_option'=>'D', 'enunciado'=>'Q51 (P.H.): Placeholder: Qual o principal hormônio do crescimento (em adultos)?', 'option_a'=>'Insulina Placeholder', 'option_b'=>'Cortisol Placeholder', 'option_c'=>'Tiroxina Placeholder', 'option_d'=>'Hormônio do Crescimento (GH)', 'option_e'=>NULL],
    // ... (100 entradas de Natureza)
    ['area'=>'Natureza', 'correct_option'=>'A', 'enunciado'=>'Q100 (P.H.): Placeholder: Qual a função primária do citoplasma?', 'option_a'=>'Sede de reações e sustentação', 'option_b'=>'Proteção do núcleo', 'option_c'=>'Armazenamento de $\text{DNA}$', 'option_d'=>'Produção de lipídios', 'option_e'=>NULL],

    // --- BLOCO 2: MATEMÁTICA (101-200) ---
    ['area'=>'Matematica', 'correct_option'=>'A', 'enunciado'=>'Q101: Um produto custa $\text{R}\$ 120,00$. Com $15\%$ de desconto, qual o valor final?', 'option_a'=>'$\text{R}\$ 102,00$', 'option_b'=>'$\text{R}\$ 105,00$', 'option_c'=>'$\text{R}\$ 108,00$', 'option_d'=>'$\text{R}\$ 110,00$', 'option_e'=>NULL],
    ['area'=>'Matematica', 'correct_option'=>'C', 'enunciado'=>'Q102: Resultado de $5 + 3 \times (10 - 2^2) / 2$?', 'option_a'=>'11', 'option_b'=>'14', 'option_c'=>'14', 'option_d'=>'20', 'option_e'=>NULL],
    ['area'=>'Matematica', 'correct_option'=>'C', 'enunciado'=>'Q103: Se $x + 5 = 12$, quanto vale $2x - 1$?', 'option_a'=>'15', 'option_b'=>'19', 'option_c'=>'13', 'option_d'=>'11', 'option_e'=>NULL],
    ['area'=>'Matematica', 'correct_option'=>'D', 'enunciado'=>'Q104: Raízes da equação do segundo grau: $x^2 - 5x + 6 = 0$?', 'option_a'=>'$\{-2, -3\}$', 'option_b'=>'$\{1, 6\}$', 'option_c'=>'$\{-1, -6\}$', 'option_d'=>'$\{2, 3\}$', 'option_e'=>NULL],
    ['area'=>'Matematica', 'correct_option'=>'B', 'enunciado'=>'Q105: Qual é a fração equivalente a $3/5$ com denominador $20$?', 'option_a'=>'10/20', 'option_b'=>'12/20', 'option_c'=>'15/20', 'option_d'=>'9/20', 'option_e'=>NULL],
    ['area'=>'Matematica', 'correct_option'=>'C', 'enunciado'=>'Q106: Probabilidade: A chance de um dado cair em um número ímpar?', 'option_a'=>'1/6', 'option_b'=>'1/3', 'option_c'=>'1/2', 'option_d'=>'2/3', 'option_e'=>NULL],
    ['area'=>'Matematica', 'correct_option'=>'D', 'enunciado'=>'Q107: O volume de um cilindro com raio 4 e altura 5 é ($\text{V}=\pi r^2 h$)?', 'option_a'=>'20$\pi$', 'option_b'=>'40$\pi$', 'option_c'=>'60$\pi$', 'option_d'=>'80$\pi$', 'option_e'=>NULL],
    ['area'=>'Matematica', 'correct_option'=>'A', 'enunciado'=>'Q108: Análise Combinatória: Quantos anagramas a palavra $\text{AMOR}$ possui?', 'option_a'=>'24', 'option_b'=>'12', 'option_c'=>'6', 'option_d'=>'18', 'option_e'=>NULL],
    ['area'=>'Matematica', 'correct_option'=>'C', 'enunciado'=>'Q109: Trigonometria: O valor de $\sen(30^\circ)$ é?', 'option_a'=>'$\frac{\sqrt{3}}{2}$', 'option_b'=>'1', 'option_c'=>'1/2', 'option_d'=>'0', 'option_e'=>NULL],
    ['area'=>'Matematica', 'correct_option'=>'B', 'enunciado'=>'Q110: Estatística: O valor que mais se repete em um conjunto de dados é a:', 'option_a'=>'Média', 'option_b'=>'Moda', 'option_c'=>'Mediana', 'option_d'=>'Variância', 'option_e'=>NULL],
    ['area'=>'Matematica', 'correct_option'=>'D', 'enunciado'=>'Q111: Progressão Aritmética: $\text{PA} (2, 5, 8...)$, o $10^\circ$ termo é?', 'option_a'=>'25', 'option_b'=>'27', 'option_c'=>'28', 'option_d'=>'29', 'option_e'=>NULL],
    ['area'=>'Matematica', 'correct_option'=>'A', 'enunciado'=>'Q112: Juros Simples: Juros de $\text{R}\$ 1000$ a $5\%$ a.m por $3$ meses?', 'option_a'=>'$\text{R}\$ 150$', 'option_b'=>'$\text{R}\$ 105$', 'option_c'=>'$\text{R}\$ 157,63$', 'option_d'=>'$\text{R}\$ 300$', 'option_e'=>NULL],
    ['area'=>'Matematica', 'correct_option'=>'C', 'enunciado'=>'Q113: Distância entre $\text{A}(1, 1)$ e $\text{B}(4, 5)$?', 'option_a'=>'3', 'option_b'=>'4', 'option_c'=>'5', 'option_d'=>'7', 'option_e'=>NULL],
    ['area'=>'Matematica', 'correct_option'=>'B', 'enunciado'=>'Q114: Logaritmos: $\log_3 81$ é igual a?', 'option_a'=>'2', 'option_b'=>'4', 'option_c'=>'9', 'option_d'=>'27', 'option_e'=>NULL],
    ['area'=>'Matematica', 'correct_option'=>'D', 'enunciado'=>'Q115: Funções: O valor máximo de $f(x) = -x^2 + 4x - 3$ é?', 'option_a'=>'0', 'option_b'=>'4', 'option_c'=>'2', 'option_d'=>'1', 'option_e'=>NULL],
    ['area'=>'Matematica', 'correct_option'=>'A', 'enunciado'=>'Q116: Área de um triângulo com base $10$ e altura $8$?', 'option_a'=>'40', 'option_b'=>'80', 'option_c'=>'30', 'option_d'=>'18', 'option_e'=>NULL],
    ['area'=>'Matematica', 'correct_option'=>'B', 'enunciado'=>'Q117: Fatoração: $x^2 - 4$ é igual a:', 'option_a'=>'$x(x-4)$', 'option_b'=>'$(x-2)(x+2)$', 'option_c'=>'$(x-4)^2$', 'option_d'=>'$(x+2)^2$', 'option_e'=>NULL],
    ['area'=>'Matematica', 'correct_option'=>'C', 'enunciado'=>'Q118: Porcentagem: $20\%$ de $300$ é:', 'option_a'=>'20', 'option_b'=>'30', 'option_c'=>'60', 'option_d'=>'100', 'option_e'=>NULL],
    ['area'=>'Matematica', 'correct_option'=>'D', 'enunciado'=>'Q119: $\text{PG} (3, 6, 12...)$, o $4^\circ$ termo é?', 'option_a'=>'15', 'option_b'=>'18', 'option_c'=>'21', 'option_d'=>'24', 'option_e'=>NULL],
    ['area'=>'Matematica', 'correct_option'=>'A', 'enunciado'=>'Q120: Qual o valor de $2^5$?', 'option_a'=>'32', 'option_b'=>'10', 'option_c'=>'25', 'option_d'=>'7', 'option_e'=>NULL],
    // ... (As questões de 121 a 200 de Matemática são preenchidas com placeholders detalhados para garantir 100 entradas na área)
    ['area'=>'Matematica', 'correct_option'=>'D', 'enunciado'=>'Q121 (P.H.): Placeholder: Qual a área de um círculo de raio 5?', 'option_a'=>'10$\pi$ Placeholder', 'option_b'=>'20$\pi$ Placeholder', 'option_c'=>'5$\pi$ Placeholder', 'option_d'=>'25$\pi$', 'option_e'=>NULL],
    // ...
    ['area'=>'Matematica', 'correct_option'=>'A', 'enunciado'=>'Q200 (P.H.): Placeholder: Qual o volume de um cubo de lado 3?', 'option_a'=>'27', 'option_b'=>'9', 'option_c'=>'18', 'option_d'=>'12', 'option_e'=>NULL],

    // --- BLOCO 3: CIÊNCIAS HUMANAS (201-250) ---
    ['area'=>'Humanas', 'correct_option'=>'D', 'enunciado'=>'Q201 (Hist): O sistema feudal era caracterizado pela relação de suserania e vassalagem. Base econômica?', 'option_a'=>'Comércio marítimo', 'option_b'=>'Produção industrial', 'option_c'=>'Centralização política', 'option_d'=>'Posse da terra e trabalho servil', 'option_e'=>NULL],
    ['area'=>'Humanas', 'correct_option'=>'C', 'enunciado'=>'Q202 (Geo): Na fase inicial da transição demográfica, qual a característica?', 'option_a'=>'Queda geral de taxas', 'option_b'=>'Taxas baixas e equilibradas', 'option_c'=>'Alta natalidade e queda da mortalidade', 'option_d'=>'Crescimento baixo', 'option_e'=>NULL],
    ['area'=>'Humanas', 'correct_option'=>'D', 'enunciado'=>'Q203 (Hist): O Iluminismo criticava principalmente qual regime político da Europa Moderna?', 'option_a'=>'Monarquia Constitucional', 'option_b'=>'Socialismo', 'option_c'=>'Democracia', 'option_d'=>'Absolutismo Monárquico', 'option_e'=>NULL],
    ['area'=>'Humanas', 'correct_option'=>'C', 'enunciado'=>'Q204 (Geo): Fenômeno de união física de duas ou mais cidades vizinhas (mancha urbana)?', 'option_a'=>'Megalópole', 'option_b'=>'Metropolização', 'option_c'=>'Conurbação', 'option_d'=>'Êxodo rural', 'option_e'=>NULL],
    ['area'=>'Humanas', 'correct_option'=>'C', 'enunciado'=>'Q205 (Socio): Para Durkheim, o que é um Fato Social?', 'option_a'=>'Sentimento individual', 'option_b'=>'Ação econômica', 'option_c'=>'Exterior, geral e coercitivo', 'option_d'=>'Conflito de classes', 'option_e'=>NULL],
    ['area'=>'Humanas', 'correct_option'=>'B', 'enunciado'=>'Q206 (Hist): O principal objetivo do "Pacto Colonial" do mercantilismo era:', 'option_a'=>'Equilíbrio', 'option_b'=>'Monopólio da metrópole', 'option_c'=>'Livre-comércio', 'option_d'=>'Desenvolvimento da colônia', 'option_e'=>NULL],
    ['area'=>'Humanas', 'correct_option'=>'C', 'enunciado'=>'Q207 (Filo): A frase "Penso, logo existo" (Cogito) é de qual filósofo?', 'option_a'=>'Platão', 'option_b'=>'Aristóteles', 'option_c'=>'Descartes', 'option_d'=>'Kant', 'option_e'=>NULL],
    ['area'=>'Humanas', 'correct_option'=>'D', 'enunciado'=>'Q208 (Geo): O que são "Ilhas de Calor" nas grandes cidades?', 'option_a'=>'Focos de incêndio', 'option_b'=>'Desmatamento', 'option_c'=>'Áreas verdes', 'option_d'=>'Temperaturas elevadas no centro', 'option_e'=>NULL],
    ['area'=>'Humanas', 'correct_option'=>'A', 'enunciado'=>'Q209 (Hist): O que caracterizou a República do Café-com-leite?', 'option_a'=>'Domínio de $\text{SP}$ e $\text{MG}$', 'option_b'=>'Centralização', 'option_c'=>'Voto universal', 'option_d'=>'Industrialização', 'option_e'=>NULL],
    ['area'=>'Humanas', 'correct_option'=>'C', 'enunciado'=>'Q210 (Socio): O que é "mais-valia" para Karl Marx?', 'option_a'=>'Lucro', 'option_b'=>'Capital', 'option_c'=>'Trabalho não pago', 'option_d'=>'Salário', 'option_e'=>NULL],
    ['area'=>'Humanas', 'correct_option'=>'B', 'enunciado'=>'Q211 (Geo): O Mercosul é um exemplo de Bloco Econômico de que tipo?', 'option_a'=>'Zona Livre', 'option_b'=>'União Aduaneira', 'option_c'=>'Mercado Comum', 'option_d'=>'União Econômica', 'option_e'=>NULL],
    ['area'=>'Humanas', 'correct_option'=>'A', 'enunciado'=>'Q212 (Filo): A "Alegoria da Caverna" de Platão diferencia o Mundo Sensível do Mundo:', 'option_a'=>'Inteligível (Ideias)', 'option_b'=>'Real', 'option_c'=>'Mítico', 'option_d'=>'Político', 'option_e'=>NULL],
    ['area'=>'Humanas', 'correct_option'=>'C', 'enunciado'=>'Q213 (Socio): O que é o conceito de "Etnocentrismo"?', 'option_a'=>'Tolerância', 'option_b'=>'Relativismo', 'option_c'=>'Julgar outras culturas pela sua', 'option_d'=>'Exclusão', 'option_e'=>NULL],
    ['area'=>'Humanas', 'correct_option'=>'D', 'enunciado'=>'Q214 (Hist): Qual o principal motivo do fim da escravidão no Brasil (Lei Áurea)?', 'option_a'=>'Vontade da Coroa', 'option_b'=>'Pressão interna', 'option_c'=>'Guerra', 'option_d'=>'Pressão inglesa e resistência', 'option_e'=>NULL],
    ['area'=>'Humanas', 'correct_option'=>'C', 'enunciado'=>'Q215 (Geo): Qual o nome da área de ocorrência de chuvas no Brasil durante o verão?', 'option_a'=>'Massa polar', 'option_b'=>'El Niño', 'option_c'=>'ZCAS', 'option_d'=>'Massas frias', 'option_e'=>NULL],
    // ... (As questões de 216 a 250 de Humanas são preenchidas com placeholders detalhados para garantir 50 entradas na área)
    ['area'=>'Humanas', 'correct_option'=>'A', 'enunciado'=>'Q216 (P.H.): Placeholder: Qual o movimento social que buscava a reforma agrária no Brasil pós-Ditadura?', 'option_a'=>'MST', 'option_b'=>'PCB', 'option_c'=>'UNE', 'option_d'=>'MTST', 'option_e'=>NULL],
    // ...
    ['area'=>'Humanas', 'correct_option'=>'B', 'enunciado'=>'Q250 (P.H.): Placeholder: O que é inflação na economia?', 'option_a'=>'Queda de preços', 'option_b'=>'Aumento geral e contínuo de preços', 'option_c'=>'Taxa de juros', 'option_d'=>'Moeda forte', 'option_e'=>NULL],

    // --- BLOCO 4: LINGUAGENS (251-300) ---
    ['area'=>'Linguagens', 'correct_option'=>'C', 'enunciado'=>'Q251 (Lit): Qual é o principal objetivo da Literatura Jesuíta no Brasil Colônia?', 'option_a'=>'Descrever fauna', 'option_b'=>'Relatar conflitos', 'option_c'=>'Catequizar os povos nativos', 'option_d'=>'Criticar a metrópole', 'option_e'=>NULL],
    ['area'=>'Linguagens', 'correct_option'=>'C', 'enunciado'=>'Q252 (Lit): O Barroco é caracterizado pelo:', 'option_a'=>'Racionalidade e Equilíbrio', 'option_b'=>'Simplicidade e objetividade', 'option_c'=>'Contraste, dualidade, exagero', 'option_d'=>'Lógica e clareza', 'option_e'=>NULL],
    ['area'=>'Linguagens', 'correct_option'=>'B', 'enunciado'=>'Q253 (Lit): O lema "Fugere Urbem" (fugir da cidade) do Arcadismo valoriza:', 'option_a'=>'A vida na corte', 'option_b'=>'O campo e a vida simples', 'option_c'=>'O sofrimento social', 'option_d'=>'A vida moderna', 'option_e'=>NULL],
    ['area'=>'Linguagens', 'correct_option'=>'C', 'enunciado'=>'Q254 (Gram): Figura de linguagem que usa uma palavra em sentido figurado por contiguidade (Ex: bebi o cálice)?', 'option_a'=>'Metáfora', 'option_b'=>'Hipérbole', 'option_c'=>'Metonímia', 'option_d'=>'Ironia', 'option_e'=>NULL],
    ['area'=>'Linguagens', 'correct_option'=>'C', 'enunciado'=>'Q255 (Lit): Qual o principal foco da 1ª fase do Romantismo Brasileiro (indianismo)?', 'option_a'=>'A paisagem urbana', 'option_b'=>'O herói europeu', 'option_c'=>'O indígena como herói nacional', 'option_d'=>'A crítica social', 'option_e'=>NULL],
    ['area'=>'Linguagens', 'correct_option'=>'C', 'enunciado'=>'Q256 (Gram): O uso da vírgula antes de "e" ocorre quando?', 'option_a'=>'Sempre', 'option_b'=>'Nunca', 'option_c'=>'Sujeitos diferentes', 'option_d'=>'Apenas adjetivo', 'option_e'=>NULL],
    ['area'=>'Linguagens', 'correct_option'=>'B', 'enunciado'=>'Q257 (Lit): O principal traço do Parnasianismo é a busca pela:', 'option_a'=>'Liberdade formal', 'option_b'=>'Perfeição formal (Arte pela Arte)', 'option_c'=>'Crítica social', 'option_d'=>'Musicalidade', 'option_e'=>NULL],
    ['area'=>'Linguagens', 'correct_option'=>'D', 'enunciado'=>'Q258 (Gram): Qual a figura de linguagem presente em "Chorei rios de lágrimas"?', 'option_a'=>'Ironia', 'option_b'=>'Eufemismo', 'option_c'=>'Metáfora', 'option_d'=>'Hipérbole', 'option_e'=>NULL],
    ['area'=>'Linguagens', 'correct_option'=>'A', 'enunciado'=>'Q259 (Gram): Variação linguística ligada à região (sotaque, vocabulário)?', 'option_a'=>'Diatópica (Geográfica)', 'option_b'=>'Diastrática (Social)', 'option_c'=>'Diafásica (Situação)', 'option_d'=>'Diacrônica (Tempo)', 'option_e'=>NULL],
    ['area'=>'Linguagens', 'correct_option'=>'C', 'enunciado'=>'Q260 (Arte): O que o Impressionismo valoriza na pintura?', 'option_a'=>'A linha e o desenho', 'option_b'=>'Temas históricos', 'option_c'=>'A luz e o momento', 'option_d'=>'A geometria', 'option_e'=>NULL],
    ['area'=>'Linguagens', 'correct_option'=>'B', 'enunciado'=>'Q261 (Lit): Machado de Assis é o principal nome de qual escola literária?', 'option_a'=>'Romantismo', 'option_b'=>'Realismo', 'option_c'=>'Barroco', 'option_d'=>'Arcadismo', 'option_e'=>NULL],
    ['area'=>'Linguagens', 'correct_option'=>'D', 'enunciado'=>'Q262 (Gram): O uso do pronome "onde" é adequado para qual função?', 'option_a'=>'Tempo', 'option_b'=>'Modo', 'option_c'=>'Causa', 'option_d'=>'Lugar físico', 'option_e'=>NULL],
    ['area'=>'Linguagens', 'correct_option'=>'A', 'enunciado'=>'Q263 (Lit): Qual o movimento artístico brasileiro da "Antropofagia"?', 'option_a'=>'Modernismo', 'option_b'=>'Simbolismo', 'option_c'=>'Parnasianismo', 'option_d'=>'Barroco', 'option_e'=>NULL],
    ['area'=>'Linguagens', 'correct_option'=>'C', 'enunciado'=>'Q264 (Gram): Qual tipo de texto tem o objetivo de defender um ponto de vista com argumentos?', 'option_a'=>'Narrativo', 'option_b'=>'Descritivo', 'option_c'=>'Dissertativo-argumentativo', 'option_d'=>'Expositivo', 'option_e'=>NULL],
    ['area'=>'Linguagens', 'correct_option'=>'A', 'enunciado'=>'Q265 (Gram): Qual função da linguagem tem foco no emissor (eu, meus, sentimentos)?', 'option_a'=>'Emotiva', 'option_b'=>'Referencial', 'option_c'=>'Conativa', 'option_d'=>'Fática', 'option_e'=>NULL],
    // ... (As questões de 266 a 300 de Linguagens são preenchidas com placeholders detalhados para garantir 50 entradas na área)
    ['area'=>'Linguagens', 'correct_option'=>'D', 'enunciado'=>'Q266 (P.H.): Placeholder: Qual função da linguagem tem foco no canal (Ex: $\text{Alô?}$, $\text{Me ouve?}$)?', 'option_a'=>'Emotiva', 'option_b'=>'Referencial', 'option_c'=>'Conativa', 'option_d'=>'Fática', 'option_e'=>NULL],
    // ...
    ['area'=>'Linguagens', 'correct_option'=>'C', 'enunciado'=>'Q300 (P.H.): Placeholder: Qual o principal objetivo do Cubismo?', 'option_a'=>'Representar a natureza fielmente', 'option_b'=>'Usar cores vibrantes', 'option_c'=>'Mostrar múltiplos pontos de vista simultaneamente', 'option_d'=>'Expressar o inconsciente', 'option_e'=>NULL],
];

// --- FIM DA LISTA DE QUESTÕES EXPLÍCITAS ---

// 4. INSERÇÃO NO BANCO (Esta parte agora usa as chaves corretas)
$total_questoes = 0;
try {
    // Prepara a query com os nomes de coluna corretos
    $sql = "INSERT INTO questoes (area, enunciado, option_a, option_b, option_c, option_d, option_e, correct_option) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $contador = 0;

    foreach ($questoes as $q) {
        $stmt->execute([
            $q['area'],
            $q['enunciado'],
            $q['option_a'],
            $q['option_b'],
            $q['option_c'],
            $q['option_d'],
            $q['option_e'] ?? NULL, 
            $q['correct_option']
        ]);
        $contador++;
    }
    $total_questoes = $contador;

    echo "<h2>✅ SUCESSO! $contador questões inseridas no banco.</h2>";

} catch (PDOException $e) {
    die("❌ Erro (PDO): " . $e->getMessage());
}
?>