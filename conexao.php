<?php
$config = require __DIR__ . '/config.local.php';

try {
    $pdo = new PDO(
        "mysql:host={$config['host']};port={$config['port']};dbname={$config['banco']};charset=utf8mb4",
        $config['usuario'],
        $config['senha'],
    );
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $erro) {
    //Interrompe a execução
    die("Não foi possivel concectar ao banco de dados: " . $erro->getMessage());
}