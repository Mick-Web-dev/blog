<?php
namespace Controllers;

use Http;

class Contact extends Controller
{
    protected $modelName = \Models\Contact::class;  // ou "\Models\Comment"

    //Action : Insertion d'un commentaire
    public function insert()
    {

        $contactModel = new \Models\Contact();
        /**
         * 1. On vérifie que les données ont bien été envoyées en POST
         * D'abord, on récupère les informations à partir du POST
         * Ensuite, on vérifie qu'elles ne sont pas nulles
         */
// L'auteur
        $nom = null;
        if (!empty($_POST['nom'])) {
            $nom = $_POST['nom'];
        }

// Le commentaire
        $prenom = null;
        if (!empty($_POST['prenom'])) {
            // On contrôle la saisie de l'utilisateur
            $prenom = htmlspecialchars($_POST['prenom']);
        }

// L'id du commentaire
        $mail = null;
        if (!empty($_POST['mail']) && ctype_digit($_POST['mail'])) {
            $maild = $_POST['mail'];
        }
// L'id du commentaire
        $message = null;
        if (!empty($_POST['message']) && ctype_digit($_POST['message'])) {
            $message = $_POST['message'];
        }

// Vérification finale des infos envoyées dans le formulaire (donc dans le POST)
// S'il n'y a pas d'auteur OU qu'il n'y a pas de commentaire OU qu'il n'y a pas d'identifiant d'article
        if (!$nom || !$prenom || !$mail || !$message) {
            die("Votre formulaire a été mal rempli !");
        }

        /**
         * 2. Vérification que l'id du post pointe bien vers un post qui existe
         * Connexion à la base de données puis une requête qui va aller chercher le post en question
         * Gestion des erreurs :
         * - Le mode d'erreur : le mode exception permet à PDO de nous prévenir en cas d'erreur
         * - Le mode d'exploitation : FETCH_ASSOC veut dire qu'on exploitera les données sous la forme de tableaux associatifs
         */

        $user = $contactModel->find($nom);


// 3. Insertion du commentaire
        $this->model->insert($nom, $prenom, $mail, $message);

// 4. Redirection vers le post  :
        Http::redirect("index.php?controller=post&task=index" . $user);
    }
}