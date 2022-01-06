<?php
namespace Controllers;

require_once('libraries/utils.php');

class Post extends Controller
{
  protected $modelName = \Models\Post::class;  // ou "\Models\Post"

    public function index() {
        //Montrer la liste
        //Creation d'une nouvelle instance de la classe Post
        /**
         * 1. Récupération des posts
         */
        $posts = $this->model->findAll("date DESC");

        /**
         * 2. Affichage
         */
        $pageTitle = "Accueil";
        render('posts/index', compact('pageTitle', 'posts'));

    }

    public function show() {
        //Montrer 1 element de la liste

        $commentModel = new \Models\Comment();

        /**
         * 1. Récupération et vérification du paramètre "id"
         */
// On part du principe qu'on ne possède pas de param "id"
        $post_id = null;

// Mais s'il y en a un et que c'est un nombre entier, alors on peut ...
        if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
            $post_id = $_GET['id'];
        }

// On peut décider d'une erreur ou non
        if (!$post_id) {
            die("Vous devez préciser un paramètre `id` dans l'URL !");
        }

        /**
         * 3. Récupération du post en question
         */
        $post = $this->model->find($post_id);

        /**
         * 4. Récupération des commentaires du post en question
         */
        $commentaires = $commentModel->findAllThisPost($post_id);

        /**
         * 5. On affiche
         */
        $pageTitle = $post['titre'];
        render('posts/show', compact('pageTitle', 'post', 'commentaires', 'post_id'));

    }

    public function delete() {
        //Supprimer 1 element
        /**
         * 1. Vérification que le GET possède bien un paramètre "id"
         */
        if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
            die("Ho ?! Tu n'as pas précisé l'id de l'article !");
        }

        $id = $_GET['id'];

        /**
         * 3. Vérification que le post existe
         */
        $post = $this->model->find($id);
        if (!$post) {
            die("L'article $id n'existe pas, vous ne pouvez donc pas le supprimer !");
        }

        /**
         * 4. Suppression de l'article
         */
        $this->model->delete($id);

        /**
         * 5. Redirection vers la page d'accueil :
         */
        redirect("index.php");
    }
}