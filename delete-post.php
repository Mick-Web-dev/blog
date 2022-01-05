<?php

/**
 * DANS CE FICHIER, ON CHERCHE À SUPPRIMER LE POST DONT L'ID EST PASSE EN GET
 * 
 * On s'assure qu'un paramètre "id" est bien passé en GET et que le post existe
 * Puis suppression du post et redirection vers la page d'accueil
 */
require_once('libraries/database.php');
require_once('libraries/utils.php');
/**
 * 1. Vérification que le GET possède bien un paramètre "id"
 */
if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
    die("Ho ?! Tu n'as pas précisé l'id de l'article !");
}

$id = $_GET['id'];

/**
 * 3. Vérification que le post existe
 */
$post = findPost($id);
if (!$post) {
    die("L'article $id n'existe pas, vous ne pouvez donc pas le supprimer !");
}

/**
 * 4. Suppression de l'article
 */
deletePost($id);

/**
 * 5. Redirection vers la page d'accueil :
 */
redirect("index.php");
