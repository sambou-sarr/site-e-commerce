<?php
    
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASSWORD', '');
    define('DATABASE', 'db_commerce');
    define('PORT', 3306);
    try {
        $db = new PDO('mysql:host='.HOST.';port='.PORT.';dbname='.DATABASE.';charset=utf8', USER, PASSWORD);
    } catch (PDOException $e) {
        die("Erreur de connexion à la BDD : " . $e->getMessage());
    }
?>