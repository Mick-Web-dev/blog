<?php
require('views/View.php');

class ControllerAccueil
{

    /**
     * @throws Exception
     */
    public function __construct($url)
    {
        if (isset($posts) && count($posts) > 1)
            throw new Exception('Page introuvable');
        else
            $this->posts();
    }

    /**
     * @return void
     * Récupère l'ensemble des posts
     * @throws Exception
     */
    private function posts()
    {
        $_postManager = new PostManager;
        $posts = $_postManager->getPosts();

        $_view = new View('Accueil');
        $_view->generate(array('posts' => $posts));
    }

}