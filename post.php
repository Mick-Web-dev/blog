<?php

/**
 * CE FICHIER DOIT AFFICHER UN POST ET SES COMMENTAIRES !
 * 
 * On doit d'abord récupérer le paramètre "id" qui sera présent en GET et vérifier son existence
 * Si on n'a pas de param "id", alors on affiche un message d'erreur ! Sinon, on se connecte
 * à la base de données et récupère les commentaires du plus ancien au plus récent.
 * On affiche le post puis ses commentaires
 */

/**
 * 1. Récupération et vérification du paramètre "id"
 */
// On part du principe qu'on ne possède pas de param "id"
$post_id = null;

// Mais s'il y en a un et que c'est un nombre entier, alors on peut ...
if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
    $post_id = $_GET['id'];
}

// On peut décider d'une erreur ou non
if (!$post_id) {
    die("Vous devez préciser un paramètre `id` dans l'URL !");
}

/**
 * 2. Connexion à la base de données avec PDO
 * Gestion des erreurs :
 * - Le mode d'erreur : le mode exception permet à PDO de nous prévenir
 * - Le mode d'exploitation : FETCH_ASSOC veut dire qu'on exploitera les données sous la forme de tableaux associatifs
 */
$pdo = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);

/**
 * 3. Récupération du post en question
 * On utilise une requête préparée tout en se protégeant des injections sql
 */
$query = $pdo->prepare("SELECT * FROM posts WHERE id = :post_id");

// On exécute la requête en précisant le paramètre :article_id 
$query->execute(['post_id' => $post_id]);

// On trie le résultat pour extraire les données réelles du post
$post = $query->fetch();

/**
 * 4. Récupération des commentaires du post en question
 * Requête préparée pour sécuriser la donnée fournie par l'utilisateur
 */
$query = $pdo->prepare("SELECT * FROM commentaires WHERE post_id = :post_id");
$query->execute(['post_id' => $post_id]);
$commentaires = $query->fetchAll();

/**
 * 5. On affiche 
 */
$pageTitle = $post['titre'];
ob_start();
require('templates/posts/show.html.php');
$pageContent = ob_get_clean();

require('templates/layout.html.php');
