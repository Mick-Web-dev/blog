<?php
namespace Models;


//Regroupe toutes les fonctions qui servent à manipuler les posts
class Register extends Model
{
    //Appelle la fonction find() du model mais ici la table post
    protected $table = "users";

    public function insert(string $pseudo, string $password,string $mail)
    {
        if($mail>0)
        {
            $mail = false;
            // l'utilisateur existe !
            echo "Vos identifiants sont présents dans notre base de donnée, veuillez vous connecter ou 
            les réinitialiser via l'option proposée sous le formulaire ";
        }else {
            $query = $this->pdo->prepare('INSERT INTO users SET  pseudo = :pseudo, password = :password, mail = :mail');
            $query->execute(compact('pseudo', 'password', 'mail'));
        }


    }

}