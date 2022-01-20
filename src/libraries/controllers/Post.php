<?php
namespace Controllers;

class Post extends Controller
{
  protected $modelName = \Models\Post::class;  // ou "\Models\Post"

    /**
     * @return void
     */
    public function index() {
        //Montrer la liste
        //Creation d'une nouvelle instance de la classe Post
        // Récupération des posts
        $posts = $this->model->findAll("date DESC");

        // Affichage
        $pageTitle = "Accueil";
        \Renderer::render('posts/index', compact('pageTitle', 'posts'));

    }

    /**
     * @return void
     */
    public function show() {
        //Montre 1 element de la liste
        $commentModel = new \Models\Comment();

        // Récupération et vérification du paramètre "id"
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

        // Récupération du post en question

        $post = $this->model->find($post_id);

        // Récupération des commentaires du post en question
        $commentaires = $commentModel->findAllThisPost($post_id);

        // Affichage
        $pageTitle = $post['titre'];
        \Renderer::render('posts/show', compact('pageTitle', 'post', 'commentaires', 'post_id'));

    }

    /**
     * @return void
     */
    public function delete() {
        //Supprimer 1 element
        // Vérification que le GET possède bien un paramètre "id"

        if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
            die("Ho ?! Tu n'as pas précisé l'id de l'article !");
        }

        $id = $_GET['id'];

        // Vérification que le post existe

        $post = $this->model->find($id);
        if (!$post) {
            die("L'article $id n'existe pas, vous ne pouvez donc pas le supprimer !");
        }

        // Suppression de l'article

        $this->model->delete($id);

        // Redirection vers la page d'accueil :
        \Http::redirect("index.php");
    }
}