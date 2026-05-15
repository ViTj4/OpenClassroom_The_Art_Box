<?php

function connexion(): PDO
{
    // Database Credentials
    $host = 'localhost';
    $dbname = 'projet_php_the_art_box';
    $username = 'root';
    $password = '';

    try {
        // PHP Data Object connexion
        $pdo = new PDO(
            "mysql:host=$host;dbname=$dbname;charset=utf8",
            $username,
            $password
        );
        // PDO config to show errors and get them in arrays
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $pdo;

    } catch (PDOException $e) {
        // Kill script if connexion return error
        die('Erreur de connexion : ' . $e->getMessage());
    }
}