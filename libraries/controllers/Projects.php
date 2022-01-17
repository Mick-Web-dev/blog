<?php
namespace Controllers;

class Projects extends Controller
{
    protected $modelName = \Models\Project::class;  // ou "\Models\Post"

    public function index() {
        //Montrer la liste
        //Creation d'une nouvelle instance de la classe Post
        /**
         * 1. Récupération des posts
         */
        $projects = $this->model->findAll();

        /**
         * 2. Affichage
         */
        $pageTitle = "Projets";
        \Renderer::render('pages/projects', compact('pageTitle', 'projects'));

    }

}