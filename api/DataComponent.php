<?php 
    function bdConnetion() {
        $host = 'localhost';
        $db = 'jogo';
        $user = 'root';
        $pass = '';
        $port = '3306';

        try {
            $pdo = new PDO("mysql:host=$host;dbname=$db;port=$port", $user, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die("Erro na conexão: " . $e->getMessage());
        }
    }
?>