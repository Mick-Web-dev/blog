<?php
require_once('libraries/models/Model.php');

//Regroupe toutes les fonctions qui servent à manipuler les posts
class Post extends Model
{
    //Appelle la fonction find() du model mais ici la table post
    protected $table = "posts";
    /**
     * Retourne la liste des posts classés par date de création
     * @return array
     */
    public function findAll(): array {

        // Utilisation de la méthode query (pas besoin de préparation car aucune variable n'entre en jeu)
        $resultats = $this->pdo->query('SELECT * FROM posts ORDER BY date DESC');
        // trie pour extraire les données réelles
        $posts = $resultats->fetchAll();

        return $posts;
    }
}