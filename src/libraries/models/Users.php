<?php
namespace Models;
use PDO;

//Regroupe toutes les fonctions qui servent à manipuler les posts
class Users extends Model
{
    protected $table = "users";

    public function insert(string $pseudo, string $password, string $mail)
    {
        $query = $this->pdo->prepare('INSERT INTO users SET pseudo = :pseudo, password = :password, mail = :mail');
        $query->execute(compact('pseudo', 'password', 'mail'));

        // Les informations sont correctes !
        // Ouverture de la session user arrêt de la session à la fermeture du navigateur
        session_start();
        // Stockage des informations user
        $_SESSION["user"] = [
            "pseudo" => $user["id"],
            'role' => ['role']
        ];
    }

    public function findUser()
    {
        $query = $this->pdo->prepare('SELECT * FROM users WHERE pseudo = :pseudo');
        $query->bindValue(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
        $query->execute();
        $user = $query->fetch();
        var_dump($user);
        // L'utilisateur n'existe pas
        if (!$user){
            die("Vos informations n'existent pas, veuillez vous enregistrer !");

        } elseif
            // L'utilisateur existe, verification du mot de passe
        (!password_verify($_POST['password'], $user['password'])){
            die("L'une des informations saisies ne passe pas la validation !");
        }
        // Les informations sont correctes !
        // Ouverture de la session user arrêt de la session à la fermeture du navigateur
        session_start();
        // Stockage des informations user
        $_SESSION["user"] = [
            "pseudo" => $user["pseudo"],
            'role' => $user['role']
        ];
    }
}