<?php
require_once('views/View.php');

class ControllerAccueil
{
    private $_postManager;
    private $_view;

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
        $this->_postManager = new PostManager;
        $posts = $this->_postManager->getPosts();

        $this->_view = new View('Accueil');
        $this->_view->generate(array('posts' => $posts));
    }

}