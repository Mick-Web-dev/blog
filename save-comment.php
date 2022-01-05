<?php

/**
 * CE FICHIER DOIT ENREGISTRER UN NOUVEAU COMMENTAIRE EST REDIRIGER SUR L'ARTICLE !
 * 
 * On doit d'abord vérifier que toutes les informations ont été entrées dans le formulaire
 * Si ce n'est pas le cas : un message d'erreur
 * Sinon, on va sauver les informations
 * 
 * Pour sauvegarder les informations, ce serait bien qu'on soit sur que l'article qu'on essaye de commenter existe
 * Il faudra donc faire une première requête pour s'assurer que l'article existe
 * Ensuite on pourra intégrer le commentaire
 * 
 * Et enfin on pourra rediriger l'utilisateur vers l'article en question
 */

/**
 * 1. On vérifie que les données ont bien été envoyées en POST
 * D'abord, on récupère les informations à partir du POST
 * Ensuite, on vérifie qu'elles ne sont pas nulles
 */
// On commence par l'author
$auteur = null;
if (!empty($_POST['auteur'])) {
    $auteur = $_POST['auteur'];
}

// Ensuite le contenu
$commentaire = null;
if (!empty($_POST['commentaire'])) {
    // On fait quand même gaffe à ce que le gars n'essaye pas des balises cheloues dans son commentaire
    $commentaire = htmlspecialchars($_POST['commentaire']);
}

// Enfin l'id de l'article
$post_id = null;
if (!empty($_POST['post_id']) && ctype_digit($_POST['post_id'])) {
    $post_id = $_POST['post_id'];
}

// Vérification finale des infos envoyées dans le formulaire (donc dans le POST)
// Si il n'y a pas d'auteur OU qu'il n'y a pas de contenu OU qu'il n'y a pas d'identifiant d'article
if (!$auteur || !$post_id || !$commentaire) {
    die("Votre formulaire a été mal rempli !");
}

/**
 * 2. Vérification que l'id de l'article pointe bien vers un article qui existe
 * Ca nécessite une connexion à la base de données puis une requête qui va aller chercher l'article en question
 * Si rien ne revient, la personne se fout de nous.
 * 
 * Attention, on précise ici deux options :
 * - Le mode d'erreur : le mode exception permet à PDO de nous prévenir violament quand on fait une connerie ;-)
 * - Le mode d'exploitation : FETCH_ASSOC veut dire qu'on exploitera les données sous la forme de tableaux associatifs
 * 
 * PS : Ca fait pas genre 3 fois qu'on écrit ces lignes pour se connecter ?! 
 */
$pdo = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);

$query = $pdo->prepare('SELECT * FROM posts WHERE id = :post_id');
$query->execute(['post_id' => $post_id]);

// Si rien n'est revenu, on fait une erreur
if ($query->rowCount() === 0) {
    die("Ho ! L'article $post_id n'existe pas boloss !");
}

// 3. Insertion du commentaire
$query = $pdo->prepare('INSERT INTO commentaires SET auteur = :auteur, commentaire = :commentaire, post_id = :post_id, date = NOW()');
$query->execute(compact('auteur', 'commentaire', 'post_id'));

// 4. Redirection vers l'article en question :
header('Location: post.php?id=' . $post_id);
exit();
