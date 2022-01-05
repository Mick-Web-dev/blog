<?php
// Ce fichier concerne les fonctionnalités liées à la base de données

//1- Fonctionnalités servant de connexion à la bdd.


/**
 * Retourne une connexion à la base de données
 * @return PDO
 */
function getPdo(): PDO {
    $pdo = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    return $pdo;
}

/**
 * Retourne la liste des posts classés par date de création
 * @return array
 */
function findAllPosts(): array {
    $pdo = getPdo();
    // Utilisation de la méthode query (pas besoin de préparation car aucune variable n'entre en jeu)
    $resultats = $pdo->query('SELECT * FROM posts ORDER BY date DESC');
    // trie pour extraire les données réelles
    $posts = $resultats->fetchAll();

    return $posts;
}

/**
 * Retourne un post par son id
 * @param int $id
 * @return mixed
 */
function findPost(int $id) {
    $pdo = getPdo();
    $query = $pdo->prepare("SELECT * FROM posts WHERE id = :post_id");

// On exécute la requête en précisant le paramètre :article_id
    $query->execute(['post_id' => $id]);

// On trie le résultat pour extraire les données réelles du post
    $post = $query->fetch();

    return $post;
}

/**
 * Retourne la liste de tous les commentaires
 * @param int $post_id
 * @return array
 */
function findAllComments(int $post_id): array
{
    $pdo = getPdo();
    $query = $pdo->prepare("SELECT * FROM commentaires WHERE post_id = :post_id");
    $query->execute(['post_id' => $post_id]);
    $commentaires = $query->fetchAll();

    return $commentaires;
}

/**
 * Supprime un post
 * @param int $id
 * @return void
 */
function deletePost(int $id)
{
    $pdo = getPdo();
    $query = $pdo->prepare('DELETE FROM posts WHERE id = :id');
    $query->execute(['id' => $id]);
}


/**
 * Retourne un commentaire par son id
 * @param int $id
 * @return mixed
 */
function findComment(int $id)
{
    $pdo = getPdo();
    $query = $pdo->prepare('SELECT * FROM commentaires WHERE id = :id');
    $query->execute(['id' => $id]);
    $comment = $query->fetch();

    return $comment;

}

/**
 * Supprime un commentaire par son id
 * @param int $id
 * @return void
 */
function deleteComment(int $id): void
{
    $pdo = getPdo();
    $query = $pdo->prepare('DELETE FROM commentaires WHERE id = :id');
    $query->execute(['id' => $id]);
}


/**
 * Insère un commentaire dans un post en récupérant les paramètres :
 * l'auteur, le commentaire, l'id du post
 * @param string $auteur
 * @param string $commentaire
 * @param int $post_id
 * @return void
 */
function insertComment(string $auteur, string $commentaire, int $post_id): void
{
    $pdo = getPdo();
    $query = $pdo->prepare('INSERT INTO commentaires SET auteur = :auteur, commentaire = :commentaire, post_id = :post_id, date = NOW()');
    $query->execute(compact('auteur', 'commentaire', 'post_id'));
}

