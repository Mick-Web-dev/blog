<?php

/**
 * CE FICHIER A POUR BUT D'AFFICHER LA PAGE D'ACCUEIL !
 * 
 * Connection à la base de données, récupération des posts du plus récent au plus ancien
 * puis boucle pour afficher chaque post
 */
//require_once('libraries/controllers/Post.php');
require_once('libraries/autoload.php');

$controller = new \Controllers\Post();
$controller->index();