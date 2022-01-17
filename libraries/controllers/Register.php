<?php
namespace Controllers;

use Http;

class Register extends Controller
{
    protected $modelName = \Models\Register::class;  // ou "\Models\Post"

    public function create()
    {
        $registerModel = new \Models\Register();

        $pageTitle = "Inscription";
        \Renderer::render('pages/registration', compact('pageTitle', 'registerModel'));

    }

    public function insert(){
        // Le pseudo de l'utilisateur
        $pseudo = null;
        if (!empty($_POST['pseudo'])) {
            $pseudo = $_POST['pseudo'];
        }

// Le mot de passe
        $password = null;
        if (!empty($_POST['password'])) {
            // On contrôle la saisie de l'utilisateur
            $password = $_POST['password'];
        }

// Le mail
        $mail = null;
        if (!empty($_POST['mail']) && filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
            $mail = $_POST['mail'];
        }

// Vérification finale des infos envoyées dans le formulaire (donc dans le POST)
// S'il n'y a pas d'auteur OU qu'il n'y a pas de commentaire OU qu'il n'y a pas d'identifiant d'article
        if (!$pseudo || !$password || !$mail) {
            die("Votre formulaire a été mal rempli !");
        }

// 2. Insertion du nouvel utilisateur
        $this->model->insert($pseudo, $password, $mail);

        /**
         * 3. Affichage
         */
        $pageTitle = "Inscription";
        Http::redirect("index.php?controller=connect&task=show&id=");
    }

}