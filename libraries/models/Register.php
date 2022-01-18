<?php
namespace Models;

use Http;
//Regroupe toutes les fonctions qui servent à manipuler les posts
class Register extends Model
{
    //Appelle la fonction find() du model mais ici la table post
    protected $table = "users";

    public function insert(string $pseudo, string $password,string $mail)
    {
        // si les identifiants n'existent pas
        $query = $this->pdo->prepare('INSERT INTO users SET  pseudo = :pseudo, password = :password, mail = :mail');
        $query->execute(compact('pseudo', 'password', 'mail'));
    }
}