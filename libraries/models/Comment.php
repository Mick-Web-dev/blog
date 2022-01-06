<?php

require_once('libraries/models/Model.php');

//Regroupe toutes les fonctions qui servent à manipuler les commentaires
class Comment extends Model
{

    /**
     * Retourne la liste de tous les commentaires
     * @param int $post_id
     * @return array
     */
    public function findAllThisPost(int $post_id): array
    {

        $query = $this->pdo->prepare("SELECT * FROM commentaires WHERE post_id = :post_id");
        $query->execute(['post_id' => $post_id]);
        $commentaires = $query->fetchAll();

        return $commentaires;
    }

    /**
     * Retourne un commentaire par son id
     * @param int $id
     * @return mixed
     */
    public function find(int $id)
    {

        $query = $this->pdo->prepare('SELECT * FROM commentaires WHERE id = :id');
        $query->execute(['id' => $id]);
        $comment = $query->fetch();

        return $comment;

    }

    /**
     * Supprime un commentaire par son id
     * @param int $id
     * @return void
     */
    public function delete(int $id): void
    {

        $query = $this->pdo->prepare('DELETE FROM commentaires WHERE id = :id');
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
    public function insert(string $auteur, string $commentaire, int $post_id): void
    {

        $query = $this->pdo->prepare('INSERT INTO commentaires SET auteur = :auteur, commentaire = :commentaire, post_id = :post_id, date = NOW()');
        $query->execute(compact('auteur', 'commentaire', 'post_id'));
    }

}