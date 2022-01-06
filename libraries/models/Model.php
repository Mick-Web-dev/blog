<?php
namespace Models;

abstract class Model
{
    // Cette function représente la connexion à la Bdd !
    protected $pdo;
    protected $table;
    //Contructeur
    public function __construct()
    {
        $this->pdo = \Database::getPdo();
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
     * Retourne la liste des posts classés par date de création
     * @return array
     */
    public function findAll(?string $order = ""): array
    {
        $sql = "SELECT * FROM {$this->table}";
        // si je reçois qqchose dans la variable $order alors ...
        if ($order) {
            // on rajoute à la variable $sql l'ordre ORDER BY la trace inclue dans $order
            $sql .= " ORDER BY " . $order;
        }
        // Utilisation de la méthode query (pas besoin de préparation, car aucune variable n'entre en jeu)
        $resultats = $this->pdo->query($sql);
        // trie pour extraire les données réelles
        $post = $resultats->fetchAll();

        return $post;
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