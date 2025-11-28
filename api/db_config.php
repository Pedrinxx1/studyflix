<?php
// api/db_config.php - Configuração para PostgreSQL (Render)
// 🚨 CRÍTICO: Removendo die() e garantindo que o JSON de erro seja retornado pelo script principal.

// Inicializa a variável $pdo como null
$pdo = null;

// Sua string de conexão (ajustada para variáveis)
$db_url = "postgresql://studyflix_user:iofU2bx0K4LEvFJU7kHYjoHnXaKj2R2y@dpg-d4kbinodl3ps73dh16l0-a/studyflix_db_qurq_hi3g";

// Parseia a URL de conexão para obter as credenciais separadas
$url_parts = parse_url($db_url);

// Verifica se o parse_url foi bem-sucedido e se as partes cruciais existem
if ($url_parts === false || !isset($url_parts['host'], $url_parts['user'], $url_parts['pass'], $url_parts['path'])) {
    // Se a string de conexão for inválida, $pdo permanece null
    return;
}

$host = $url_parts['host'];
$user = $url_parts['user'];
$password = $url_parts['pass'];
$dbname = ltrim($url_parts['path'], '/'); 
$port = $url_parts['port'] ?? 5432; // Adiciona a porta padrão 5432, se não estiver na URL

try {
    // ... dentro do bloco try no submit_answer.php (após a linha $is_correct_int = ...)

$is_correct_int = $is_correct ? 1 : 0;

// Usamos o ID do usuário/convidado como o valor para username e display_name (se for 'guest' será 'Visitante', senão será o ID)
// O valor de 'user_id' é o ID bruto para a coluna 'user_id'
$username_value = ($user_id === 'guest') ? 'Visitante' : $user_id; 
    
// 🚨 CORREÇÃO: Adicionamos a coluna 'user_id' e seu valor à query INSERT para evitar NOT NULL violation (23502)
// A query deve ser executada apenas pelo PHP/PDO.
$sql_upsert = "INSERT INTO user_scores (user_id, username, total_attempted, total_correct, display_name) 
               VALUES (?, ?, 1, ?, ?)
               ON CONFLICT (username) DO UPDATE 
               SET total_attempted = user_scores.total_attempted + 1,
                   total_correct = user_scores.total_correct + ?,
                   display_name = EXCLUDED.display_name";
    
$stmt = $db->prepare($sql_upsert);
    
// Binds:
$stmt->execute([
    $user_id,             // 1. INSERT user_id (Ex: guest_1764...)
    $username_value,      // 2. INSERT username (Ex: guest_1764... ou Visitante)
    $is_correct_int,      // 3. INSERT total_correct
    $username_value,      // 4. INSERT display_name 
    $is_correct_int       // 5. UPDATE total_correct (valor a ser adicionado)
]);
    
$db->commit();

// ... restante do código PHP

} catch (PDOException $e) {
    // Se a conexão falhar, define $pdo como null (não usa die()!)
    $pdo = null; 
    // O script principal (submit_answer.php ou user_data.php) checará se $pdo é null e retornará o erro JSON.
}

// REMOVA A TAG DE FECHAMENTO ?>