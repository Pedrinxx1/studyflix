<?php
// Configuração do MongoDB
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

try {
    // Conectar ao MongoDB
    $mongoClient = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    $dbName = "test_database";  // ⚠️ Troque se necessário
    
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Erro ao conectar: ' . $e->getMessage()]);
    exit();
}
?>