<?php
require_once('libraries/database.php');

//Regroupe toutes les fonctions qui servent à manipuler les posts
class Post {
    /**
     * Retourne la liste des posts classés par date de création
     * @return array
     */
    public function findAll(): array {
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
    public function find(int $id) {
        $pdo = getPdo();
        $query = $pdo->prepare("SELECT * FROM posts WHERE id = :post_id");

        // On exécute la requête en précisant le paramètre :article_id
        $query->execute(['post_id' => $id]);

        // On trie le résultat pour extraire les données réelles du post
        $post = $query->fetch();

        return $post;
    }

    /**
     * Supprime un post
     * @param int $id
     * @return void
     */
    public function delete(int $id)
    {
        $pdo = getPdo();
        $query = $pdo->prepare('DELETE FROM posts WHERE id = :id');
        $query->execute(['id' => $id]);
    }
}