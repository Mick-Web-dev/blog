<?php
namespace Models;


//Regroupe toutes les fonctions qui servent à manipuler les posts
class Contact extends Model
{
//Appelle la fonction find() du model mais ici la table post
protected $table = "contact"; //subscribe
    //besoins :
    //find si non-exist
    //insert si email verif ?
    public function insert(string $nom, string $prenom, $mail, $message): void
    {

        $query = $this->pdo->prepare('INSERT INTO contact SET  nom = :nom, prenom = :prenom, mail = :mail, message = :message');
        $query->execute(compact('nom', 'prenom', 'mail', 'message'));
    }
}