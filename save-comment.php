<?php

/**
 * CE FICHIER DOIT ENREGISTRER UN NOUVEAU COMMENTAIRE EST REDIRIGER SUR LE POST !
 * 
 * On doit d'abord vérifier que toutes les informations ont été entrées dans le formulaire
 * Si ce n'est pas le cas : un message d'erreur
 * Sinon, on sauvegarde les informations
 * 
 * Pour sauvegarder les informations, on vérifie que le post qu'on essaye de commenter existe
 * On fait donc une première requête et si le post existe alors on intègre le commentaire.
 * Puis on redirige l'utilisateur vers le post.
 */
require_once('libraries/database.php');
/**
 * 1. On vérifie que les données ont bien été envoyées en POST
 * D'abord, on récupère les informations à partir du POST
 * Ensuite, on vérifie qu'elles ne sont pas nulles
 */
// L'auteur
$auteur = null;
if (!empty($_POST['auteur'])) {
    $auteur = $_POST['auteur'];
}

// Le commentaire
$commentaire = null;
if (!empty($_POST['commentaire'])) {
    // On contrôle la saisie de l'utilisateur
    $commentaire = htmlspecialchars($_POST['commentaire']);
}

// L'id du commentaire
$post_id = null;
if (!empty($_POST['post_id']) && ctype_digit($_POST['post_id'])) {
    $post_id = $_POST['post_id'];
}

// Vérification finale des infos envoyées dans le formulaire (donc dans le POST)
// S'il n'y a pas d'auteur OU qu'il n'y a pas de commentaire OU qu'il n'y a pas d'identifiant d'article
if (!$auteur || !$post_id || !$commentaire) {
    die("Votre formulaire a été mal rempli !");
}

/**
 * 2. Vérification que l'id du post pointe bien vers un post qui existe
 * Connexion à la base de données puis une requête qui va aller chercher le post en question
 * Gestion des erreurs :
 * - Le mode d'erreur : le mode exception permet à PDO de nous prévenir en cas d'erreur
 * - Le mode d'exploitation : FETCH_ASSOC veut dire qu'on exploitera les données sous la forme de tableaux associatifs
 */
$pdo = getPdo();

$query = $pdo->prepare('SELECT * FROM posts WHERE id = :post_id');
$query->execute(['post_id' => $post_id]);

// Si rien n'est revenu, on fait une erreur
if ($query->rowCount() === 0) {
    die("Ho ! L'article $post_id n'existe pas boloss !");
}

// 3. Insertion du commentaire
$query = $pdo->prepare('INSERT INTO commentaires SET auteur = :auteur, commentaire = :commentaire, post_id = :post_id, date = NOW()');
$query->execute(compact('auteur', 'commentaire', 'post_id'));

// 4. Redirection vers le post en question :
header('Location: post.php?id=' . $post_id);
exit();
