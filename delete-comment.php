<?php

/**
 * DANS CE FICHIER ON CHERCHE À SUPPRIMER LE COMMENTAIRE DONT L'ID EST PASSE EN PARAMETRE GET !
 * 
 * Vérification du paramètre "id" présent en GET et correspondance avec le commentaire
 * Puis suppression
 */
require_once('libraries/database.php');
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
$pdo = getPdo();

/**
 * 3. Vérification de l'existence du commentaire
 */
$query = $pdo->prepare('SELECT * FROM commentaires WHERE id = :id');
$query->execute(['id' => $id]);
if ($query->rowCount() === 0) {
    die("Aucun commentaire n'a l'identifiant $id !");
}

/**
 * 4. Suppression réelle du commentaire
 * Récupération de l'identifiant du post avant de supprimer le commentaire
 */

$commentaire = $query->fetch();
$post_id = $commentaire['post_id'];

$query = $pdo->prepare('DELETE FROM commentaires WHERE id = :id');
$query->execute(['id' => $id]);

/**
 * 5. Redirection vers le post
 */
header("Location: post.php?id=" . $post_id);
exit();
