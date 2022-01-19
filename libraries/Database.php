<?php

class Database {
    private static $instance = null;

    /**
     * Retourne une connexion à la base de données
     * @return PDO
     */
    public static function getPdo(): PDO
    {
        if (self::$instance === null) {
            self::$instance = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '', [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);

        }
        return self::$instance;
    }
}
