<?php
namespace Controllers;



class Comment extends Controller
{
    protected $modelName = \Models\Comment::class;  // ou "\Models\Comment"

    //Action : Insertion d'un commentaire
    public function insert()
    {

        $postModel = new \Models\Post();
        /**
         * 1. On vérifie que les données ont bien été envoyées en POST
         * D'abord, on récupère les informations à partir du POST
         * Ensuite, on vérifie qu'elles ne sont pas nulles
         */
// L'auteur
        $auteur = null;
        if (!empty($_POST['auteur'])) {
            $auteur = $_POST['auteur'];
        }

// Le commentaire
        $commentaire = null;
        if (!empty($_POST['commentaire'])) {
            // On contrôle la saisie de l'utilisateur
            $commentaire = htmlspecialchars($_POST['commentaire']);
        }

// L'id du commentaire
        $post_id = null;
        if (!empty($_POST['post_id']) && ctype_digit($_POST['post_id'])) {
            $post_id = $_POST['post_id'];
        }

// Vérification finale des infos envoyées dans le formulaire (donc dans le POST)
// S'il n'y a pas d'auteur OU qu'il n'y a pas de commentaire OU qu'il n'y a pas d'identifiant d'article
        if (!$auteur || !$post_id || !$commentaire) {
            die("Votre formulaire a été mal rempli !");
        }

        /**
         * 2. Vérification que l'id du post pointe bien vers un post qui existe
         * Connexion à la base de données puis une requête qui va aller chercher le post en question
         * Gestion des erreurs :
         * - Le mode d'erreur : le mode exception permet à PDO de nous prévenir en cas d'erreur
         * - Le mode d'exploitation : FETCH_ASSOC veut dire qu'on exploitera les données sous la forme de tableaux associatifs
         */

        $post = $postModel->find($post_id);

// Si rien n'est revenu, on fait une erreur
        if (!$post) {
            die("Ho ! L'article $post_id n'existe pas !");
        }

// 3. Insertion du commentaire
        $this->model->insert($auteur, $commentaire, $post_id);

// 4. Redirection vers le post  :
       \Http::redirect("post.php?id=" . $post_id);
    }

    //Action : Suppression d'un commentaire
    public function delete()
    {
        /**
         * 1. Récupération du paramètre "id" en GET
         */
        if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
            die("Ho ! Fallait préciser le paramètre id en GET !");
        }

        $id = $_GET['id'];


        /**
         * 2. Connexion à la base de données avec PDO
         * Gestion des erreurs :
         * - Le mode d'erreur : le mode exception permet à PDO de nous prévenir
         * - Le mode d'exploitation : FETCH_ASSOC veut dire qu'on exploitera les données sous la forme de tableaux associatifs
         */

        /**
         * 3. Vérification de l'existence du commentaire
         */
        $commentaire = $this->model->find($id);
        if (!$commentaire) {
            die("Aucun commentaire n'a l'identifiant $id !");
        }

        /**
         * 4. Suppression réelle du commentaire
         * Récupération de l'identifiant du post avant de supprimer le commentaire
         */
        $post_id = $commentaire['post_id'];
        $this->model->delete($id);

        /**
         * 5. Redirection vers le post :
         */
        \Http::redirect("post.php?id=" . $post_id);
    }
}