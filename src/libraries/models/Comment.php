<?php
namespace Models;

//Regroupe toutes les fonctions qui servent à manipuler les commentaires
class Comment extends Model
{
    //Appelle la fonction find() du model mais ici la table commentaire
    protected $table = "comments";

    /**
     * Retourne la liste de tous les commentaires
     * @param int $post_id
     * @return array
     */
    public function findAllThisPost(int $post_id): array
    {

        $query = $this->pdo->prepare("SELECT * FROM comments WHERE post_id = :post_id");
        $query->execute(['post_id' => $post_id]);
        $comments = $query->fetchAll();

        return $comments;
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

        $query = $this->pdo->prepare('INSERT INTO comments SET auteur = :auteur, commentaire = :commentaire, post_id = :post_id, date = NOW()');
        $query->execute(compact('auteur', 'commentaire', 'post_id'));
    }

}