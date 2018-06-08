<?php

session_start();
ob_start();

try {
    $db = new \PDO("mysql:host=localhost;dbname=adoteumpet;charset=utf8mb4", 'root', 'password') or die("Não foi possível conectar com o banco de dados!");
} catch (exception $e) {
    die("Erro de conexão: " . $e->getMessage());
}
