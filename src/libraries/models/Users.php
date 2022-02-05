<?php
namespace Models;
use PDO;
use Http;

//Regroupe toutes les fonctions qui servent à manipuler les posts
class Users extends Model
{
    protected $table = "users";
    private $use = NULL;

    public function insert(string $pseudo, string $password, string $mail)
    {
        $query = $this->pdo->prepare('INSERT INTO users SET pseudo = :pseudo, password = :password, mail = :mail');
        $query->execute(compact('pseudo', 'password', 'mail'));

        // Les informations sont correctes !
        // Ouverture de la session user arrêt de la session à la fermeture du navigateur
        session_start();
        // Stockage des informations user

    }

    public function findUser()
    {
        $user = null;

        $query = $this->pdo->prepare('SELECT * FROM users WHERE pseudo = :pseudo');
        $query->bindValue(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
        $query->execute();
        $user = $query->fetch();
        //Verification de la présence de l'utilisateur en BDD en fonction de son role

        // L'utilisateur n'existe pas, on le redirige vers une page d'info d'erreur
        if (!$user){
            die("Vos informations n'existent pas, veuillez vous enregistrer !");

        } elseif
            // si l'utilisateur existe, verification du mot de passe
        (!password_verify($_POST['password'], $user['password'])){
            die("L'une des informations saisies ne passe pas la validation !");
        }

        // Les informations sont correctes, on vérifie le role
        if (!isset($user['role_admin'])){
            // Ouverture de la session user
            session_start();
            // Stockage des informations user
            $_SESSION['user'] = [
                'id' => $user['id'],
                'role' => $user['role_user']
            ];
        } elseif(isset($user['role_admin'])) {
            // Ouverture de la session user
            session_start();
            // Stockage des informations user
            $_SESSION['user'] = [
            'id' => $user['id'],
            'role' => $user['role_admin']
            ];
        }

    }
}