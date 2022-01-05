<?php

/**
 * CE FICHIER DOIT AFFICHER UN POST ET SES COMMENTAIRES !
 * 
 * On doit d'abord récupérer le paramètre "id" qui sera présent en GET et vérifier son existence
 * Si on n'a pas de param "id", alors on affiche un message d'erreur ! Sinon, on se connecte
 * à la base de données et récupère les commentaires du plus ancien au plus récent.
 * On affiche le post puis ses commentaires
 */
require_once('libraries/database.php');
require_once('libraries/utils.php');

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
 * 3. Récupération du post en question
 */
$post = findPost($post_id);

/**
 * 4. Récupération des commentaires du post en question
 */
$commentaires = findAllComments($post_id);

/**
 * 5. On affiche 
 */
$pageTitle = $post['titre'];
render('posts/show', compact('pageTitle', 'post', 'commentaires', 'post_id'));
/* Fonction compact, identique à :
render('posts/show', ['pageTitle' => $pageTitle,
    'post' => $post,
    'commentaires' => $commentaires,
    'post_id' => $post_id
]);
*/