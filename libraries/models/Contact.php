<?php
namespace Models;


//Regroupe toutes les fonctions qui servent à manipuler les posts
class Contact extends Model
{
    //Appelle la fonction find() du model mais ici la table post
    protected $table = "contact";

    public function insert(string $nom, string $prenom,$mail,$message)
    {

        $query = $this->pdo->prepare('INSERT INTO contact SET date = NOW(), nom = :nom, prenom = :prenom, mail = :mail, message = :message');
        $query->execute(compact('nom', 'prenom', 'mail', 'message'));


    }

}