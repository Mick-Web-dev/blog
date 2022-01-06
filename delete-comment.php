<?php

/**
 * DANS CE FICHIER ON CHERCHE À SUPPRIMER LE COMMENTAIRE DONT L'ID EST PASSE EN PARAMETRE GET !
 * 
 * Vérification du paramètre "id" présent en GET et correspondance avec le commentaire
 * Puis suppression
 */
require_once('libraries/database.php');
require_once('libraries/utils.php');
require_once('libraries/models/Comment.php');

$commentModel = new Comment();

/**
 * 1. Récupération du paramètre "id" en GET
 */
if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
    die("Ho ! Fallait préciser le paramètre id en GET !");
}

$id = $_GET['id'];


/**
 * 2. Connexion à la base de données avec PDO
 * Gestion des erreurs :
 * - Le mode d'erreur : le mode exception permet à PDO de nous prévenir
 * - Le mode d'exploitation : FETCH_ASSOC veut dire qu'on exploitera les données sous la forme de tableaux associatifs
 */

/**
 * 3. Vérification de l'existence du commentaire
 */
$commentaire = $commentModel->find($id);
if (!$commentaire) {
    die("Aucun commentaire n'a l'identifiant $id !");
}

/**
 * 4. Suppression réelle du commentaire
 * Récupération de l'identifiant du post avant de supprimer le commentaire
 */
$post_id = $commentaire['post_id'];
$commentModel->delete($id);

/**
 * 5. Redirection vers le post :
 */
redirect("post.php?id=" . $post_id);
