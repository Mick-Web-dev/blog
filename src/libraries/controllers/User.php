<?php
namespace Controllers;

use Http;

class User extends Controller
{
    protected $modelName = \Blog\Models\Users::class;  // ou "\Models\Post"

    /**
     * @return void
     */
    public function register()
    {
        $registerModel = new \Blog\Models\Users();

        $pageTitle = "Inscription";
        \Renderer::render('auth/registration', compact('pageTitle', 'registerModel'));

    }

    public function connect()
    {
        $connectModel = new \Blog\Models\Users();

        $pageTitle = "Connexion";
        \Renderer::render('auth/connection', compact('pageTitle', 'connectModel'));

    }

    /**
     * @return void
     */
    public function create(){
        // Vérification de l'envoi du formulaire
        if (!empty($_POST))
        {
            //Vérification des champs
            if (isset($_POST['pseudo'], $_POST['password'], $_POST['mail']) && !empty($_POST['pseudo'])
                && !empty($_POST['password']) && !empty($_POST['mail'])){
                // Les champs sont complétés ! -> protection des données (xss)
                $pseudo = strip_tags($_POST['pseudo']);
                // Vérification que le mail est un email
                if (!filter_var($_POST['mail'],FILTER_VALIDATE_EMAIL)){
                    die("Votre adresse email est incorrect");
                }
                $mail = $_POST['mail'];
                //SECURITY PASSWORD
                // INFO: cost (int) - le coût algorithmique à utiliser.
                // Des exemples de ces valeurs peuvent être trouvés sur la page de la documentation de la fonction crypt().
                //Si omis, une valeur par défaut de 10 sera utilisée.
                $options = [
                    //nbre de caractères
                    'cost' => 15,
                ];
                //Hashage du mot de passe
                $password = password_hash($_POST['password'], PASSWORD_BCRYPT, $options);

                //Enregistrement en BDD
                $this->model->insert($pseudo, $password, $mail);
            }else {
                die("le formulaire est incomplet");
            }
        }

        // Connexion de l'utilisateur : Affichage
        $pageTitle = "Accueil";
        Http::redirect("index.php?controller=user&task=connect");

    }
    public function login(){
        // Vérification de l'envoi du formulaire
        if (!empty($_POST))
        {
            //Vérification des champs
            if (isset($_POST['pseudo'], $_POST['password']) && !empty($_POST['pseudo'])
                && !empty($_POST['password'])){
                // Les champs sont complétés ! -> protection des données (xss)
                $pseudo = strip_tags($_POST['pseudo']);

                //Hashage du mot de passe
                $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

                //Enregistrement en BDD
                $this->model->findUser($pseudo, $password);
            }

        }

        // Connexion de l'utilisateur : Affichage
        $pageTitle = "Accueil";
        Http::redirect("index.php?controller=post&task=index");

    }

    public function auth($user){
        //verification des droits utilisateurs
        if (!isset($user['role_admin'])){
            $user = ['role_user'];
            // Connexion de l'utilisateur : Affichage
            $pageTitle = "Accueil";
            Http::redirect("index.php?controller=user&task=user");
        } else {
            $pageTitle = "Administration";
            Http::redirect("index.php?controller=user&task=admin");
        }
    }

    public function admin(){
        $adminModel = new \Blog\Models\Users();

        $pageTitle = "Administration";
        \Renderer::render('auth/admin', compact('pageTitle', 'adminModel'));

    }

    public function user(){
        $userModel = new \Blog\Models\Users();

        $pageTitle = "Compte";
        \Renderer::render('auth/user', compact('pageTitle', 'userModel'));

    }

    public function errors(){
        $pageTitle = "Erreurs";
        Http::redirect("index.php?controller=errors&task=getMessage");
    }

}