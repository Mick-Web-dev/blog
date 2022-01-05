<?php

/**
 * DANS CE FICHIER, ON CHERCHE À SUPPRIMER LE POST DONT L'ID EST PASSE EN GET
 * 
 * On s'assure qu'un paramètre "id" est bien passé en GET et que le post existe
 * Puis suppression du post et redirection vers la page d'accueil
 */

/**
 * 1. Vérification que le GET possède bien un paramètre "id"
 */
if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
    die("Ho ?! Tu n'as pas précisé l'id de l'article !");
}

$id = $_GET['id'];

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
 * 3. Vérification que le post existe
 */
$query = $pdo->prepare('SELECT * FROM posts WHERE id = :id');
$query->execute(['id' => $id]);
if ($query->rowCount() === 0) {
    die("L'article $id n'existe pas, vous ne pouvez donc pas le supprimer !");
}

/**
 * 4. Suppression de l'article
 */
$query = $pdo->prepare('DELETE FROM posts WHERE id = :id');
$query->execute(['id' => $id]);

/**
 * 5. Redirection vers la page d'accueil
 */
header("Location: index.php");
exit();