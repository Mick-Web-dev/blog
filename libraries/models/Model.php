<?php
// Cette classe représente la connexion à la Bdd
require_once('libraries/database.php');
class Model
{
    //Ajout d'une propriété commune à toutes les fonctions
    protected $pdo;
    //Contructeur
    public function __construct()
    {
        $this->pdo =getPdo();
    }
}