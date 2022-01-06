<?php

/**
 * CE FICHIER A POUR BUT D'AFFICHER LA PAGE D'ACCUEIL !
 * 
 * Connection à la base de données, récupération des posts du plus récent au plus ancien
 * puis boucle pour afficher chaque post
 */
require_once('libraries/database.php');
require_once('libraries/utils.php');
require_once('libraries/models/Post.php');

//Creation d'une nouvelle instance de la classe Post
$model = new Post();

/**
 * 1. Récupération des posts
 */
$posts = $model->findAll();

/**
 * 2. Affichage
 */
$pageTitle = "Accueil";
render('posts/index', compact('pageTitle', 'posts'));

/* Fonction compact, identique à :
render('posts/index', ['pageTitle' => $pageTitle,
    'posts' => $posts
]);
*/