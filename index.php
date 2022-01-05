<?php

/**
 * CE FICHIER A POUR BUT D'AFFICHER LA PAGE D'ACCUEIL !
 * 
 * Connection à la base de données, récupération des posts du plus récent au plus ancien
 * puis boucle pour afficher chaque post
 */

/**
 * 1. Connexion à la base de données avec PDO
 * Gestion des erreurs :
 * - Le mode d'erreur : le mode exception permet à PDO de nous prévenir
 * - Le mode d'exploitation : FETCH_ASSOC veut dire qu'on exploitera les données sous la forme de tableaux associatifs
 */
$pdo = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);

/**
 * 2. Récupération des posts
 */
// Utilisation de la méthode query (pas besoin de préparation car aucune variable n'entre en jeu)
$resultats = $pdo->query('SELECT * FROM posts ORDER BY date DESC');
// trie pour extraire les données réelles
$post = $resultats->fetchAll();

/**
 * 3. Affichage
 */
$pageTitle = "Accueil";
ob_start();
require('templates/posts/index.html.php');
$pageContent = ob_get_clean();

require('templates/layout.html.php');
