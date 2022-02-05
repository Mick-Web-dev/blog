<?php
namespace Controllers;

use Http;

class Contact extends Controller
{
    protected $modelName = \Blog\Models\Contact::class;  // ou "\Models\Post"

    //Ajout d'un nouveau contact
    /**
     * @return void
     */
    public function create()
    {
        $contactModel = new \Blog\Models\Contact();



        $pageTitle = "Contact";
        \Renderer::render('pages/contact', compact('pageTitle', 'contactModel'));

    }

    // Contrôle des champs saisis
    /**
     * @return void
     */
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
        // Vérification finale des infos envoyées dans le formulaire (donc dans le POST)
        if (!$nom || !$prenom || !$mail || !$message) {
            die("Votre formulaire a été mal rempli !");
        }

        // Insertion du contact et de son message
        $this->model->insert($nom, $prenom, $mail, $message);

        // Affichage
        $pageTitle = "Contact";
        Http::redirect("index.php?controller=post&task=index");
    }
}