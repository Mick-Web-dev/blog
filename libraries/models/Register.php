<?php
namespace Models;
use Http;

class Register extends Model
{
    protected $table = "users";

    /**
     * @param string $pseudo
     * @param string $password
     * @param string $mail
     * @return void
     */
    public function insert(string $pseudo, string $password,string $mail)
    {
        // si les identifiants n'existent pas
        $query = $this->pdo->prepare('INSERT INTO users SET  pseudo = :pseudo, password = :password, mail = :mail');
        $query->execute(compact('pseudo', 'password', 'mail'));
    }
}