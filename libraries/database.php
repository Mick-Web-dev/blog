<?php
// Ce fichier concerne les fonctionnalités liées à la base de données

//1- Fonctionnalités servant de connexion à la bdd.
/**
 * Retourne une connexion à la base de données
 * @return PDO
 */
function getPdo(): PDO {
    $pdo = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    return $pdo;
}