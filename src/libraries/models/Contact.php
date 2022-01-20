<?php
namespace Models;

class Contact extends Model
{

    protected $table = "contacts";

    /**
     * @param string $nom
     * @param string $prenom
     * @param $mail
     * @param $message
     * @return void
     */
    public function insert(string $nom, string $prenom,$mail,$message)
    {

        $query = $this->pdo->prepare('INSERT INTO contacts SET date = NOW(), nom = :nom, prenom = :prenom, mail = :mail, message = :message');
        $query->execute(compact('nom', 'prenom', 'mail', 'message'));


    }

}