<?php
namespace Controllers;

use Http;

class Contact extends Controller
{
    protected $modelName = \Models\Contact::class;  // ou "\Models\Post"

    public function create()
    {
        $contactModel = new \Models\Contact();



        $pageTitle = "Contact";
        \Renderer::render('pages/contact', compact('pageTitle', 'contactModel'));

    }

    public function insert(){
        // Le nom du contact

        if (!empty($_POST['nom'])) {
            $nom = $_POST['nom'];
        }

// Le prenom

        if (!empty($_POST['prenom'])) {
            // On contrôle la saisie de l'utilisateur
            $prenom = $_POST['prenom'];
        }

// Le mail

        if (!empty($_POST['mail']) && filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
            $mail = $_POST['mail'];
        }

        // Le message

        if (!empty($_POST['message'])) {
            // On contrôle la saisie de l'utilisateur
            $message = htmlspecialchars($_POST['message']);
        }
        var_dump($nom,$prenom, $mail,$message);
// Vérification finale des infos envoyées dans le formulaire (donc dans le POST)
// S'il n'y a pas d'auteur OU qu'il n'y a pas de commentaire OU qu'il n'y a pas d'identifiant d'article
        if (!$nom || !$prenom || !$mail || !$message) {
            die("Votre formulaire a été mal rempli !");
        }

// 2. Insertion du contact et de son message
        $this->model->insert($nom, $prenom, $mail, $message);
        echo "Votre message à bien été transmis";

        /**
         * 3. Affichage
         */
        $pageTitle = "Contact";
        Http::redirect("index.php?controller=post&task=index");
    }

}