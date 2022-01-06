<?php

/**
 * DANS CE FICHIER, ON CHERCHE À SUPPRIMER LE POST DONT L'ID EST PASSE EN GET
 * 
 * On s'assure qu'un paramètre "id" est bien passé en GET et que le post existe
 * Puis suppression du post et redirection vers la page d'accueil
 */
require_once('libraries/controllers/Post.php');

$controller = new \Controllers\Post();
$controller->delete();
