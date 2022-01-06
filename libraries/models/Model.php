<?php

require_once('libraries/database.php');
class Model
{
    // Cette function représente la connexion à la Bdd !
    protected $pdo;
    protected $table;
    //Contructeur
    public function __construct()
    {
        $this->pdo =getPdo();
    }

    /**
     * Retourne un post par son id
     * @param int $id
     * @return mixed
     */
    public function find(int $id) {

        $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id = :id");

        // On exécute la requête en précisant le paramètre :article_id
        $query->execute(['id' => $id]);

        // On trie le résultat pour extraire les données réelles du post
        $item = $query->fetch();

        return $item;
    }

    /**
     * Supprime un post
     * @param int $id
     * @return void
     */
    public function delete(int $id)
    {

        $query = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = :id");
        $query->execute(['id' => $id]);
    }
}