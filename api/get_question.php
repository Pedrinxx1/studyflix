<?php
// Tenta obter a DATABASE_URL do ambiente do Render
$db_url = getenv('DATABASE_URL');
$conn = null;

if ($db_url) {
    // === CONEXÃO DE PRODUÇÃO (RENDER) ===
    
    // Processa a string DATABASE_URL para extrair as credenciais
    // Sua URL é: postgresql://studyflix_user:C7RDk7jynwGOQqr78NGhBDB7a2QCapvo@dpg-d47ph0k9c44c73cbi1dg-a.oregon-postgres.render.com/studyflix_db_qurq
    $url_parts = parse_url($db_url);
    
    $host    = $url_parts['host'];
    $port    = $url_parts['port'] ?? 5432; // Usa 5432 como padrão se a porta não estiver na URL
    $user    = $url_parts['user'];
    $pass    = $url_parts['pass'];
    $db_name = ltrim($url_parts['path'], '/'); 
    
    // Constrói a DSN (Data Source Name) para PDO
    $dsn = "pgsql:host=$host;port=$port;dbname=$db_name;sslmode=require";
    
    // O parâmetro 'sslmode=require' é crucial para a maioria dos serviços de DB externos/cloud, incluindo o Render.

    try {
        // Conecta usando PDO
        $conn = new PDO($dsn, $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    } catch (PDOException $e) {
        // Exibe um erro genérico e registra o detalhe (não deve exibir $e->getMessage() em produção)
        error_log("Erro Fatal de Conexão com o BD do Render: " . $e->getMessage());
        die("❌ Erro de Conexão com o Banco de Dados. Por favor, tente novamente mais tarde.");
    }

} else {
    // === FALLBACK PARA AMBIENTE LOCAL (DEV) ===
    // Use suas credenciais locais aqui, caso precise rodar o popular_banco.php no seu computador.
    $host    = 'localhost';
    $user    = 'seu_usuario_local';
    $pass    = 'sua_senha_local';
    $db_name = 'seu_banco_local';
    
    $dsn = "pgsql:host=$host;dbname=$db_name";
    
    try {
        $conn = new PDO($dsn, $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("❌ Erro de Conexão Local (PostgreSQL): " . $e->getMessage());
    }
}
?>