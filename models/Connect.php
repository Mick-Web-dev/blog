<?php

abstract class Connect
{
    private static $_bdd;

    /**
     * @return void Instancie la connexion à la BDD
     */
    private static function setBdd()
    {
        self::$_bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
        self::$_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    /**
     * @return mixed récupère la connexion à la BDD
     */
    protected function getBdd()
    {
        if (self::$_bdd == null)
            $this->setBdd();
        return self::$_bdd;
    }

    protected function getAll($table, $obj)
    {
        $var = [];
        $req = self::$_bdd->prepare('SELECT * FROM' .$table. 'ORDER BY id desc');
        $req->execute();
        while ($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            $var[] = new $obj($data);
        }
        return $var;
        $req->closeCursor();
    }
}