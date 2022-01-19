<?php
namespace Controllers;

use Http;

class Register extends Controller
{
    protected $modelName = \Models\Register::class;  // ou "\Models\Post"

    /**
     * @return void
     */
    public function create()
    {
        $registerModel = new \Models\Register();

        $pageTitle = "Inscription";
        \Renderer::render('pages/registration', compact('pageTitle', 'registerModel'));

    }

    /**
     * @return void
     */
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

        // Vérification finale des infos envoyées dans le formulaire
        if (!$pseudo || !$password || !$mail) {
            die("Votre formulaire a été mal rempli !");
        }



        // Insertion du nouvel utilisateur
        $this->model->insert($pseudo, $password, $mail);

        // Affichage
        $pageTitle = "Inscription";
        Http::redirect("index.php?controller=post&task=index");
    }

}