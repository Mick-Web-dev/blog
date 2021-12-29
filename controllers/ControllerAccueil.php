<?php
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
     */
    private function posts()
    {
        $this->_postManager = new PostManager;
        $posts = $this->_postManager->getPosts();

        require_once ('views/viewAccueil.php');
    }

}