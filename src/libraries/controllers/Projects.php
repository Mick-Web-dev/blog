<?php
namespace Controllers;

class Projects extends Controller
{
    protected $modelName = \Blog\Models\Project::class;  // ou "\Models\Post"

    /**
     * @return void
     */
    public function index() {
        //Montrer la liste
        //Creation d'une nouvelle instance de la classe Project
        // Récupération des projects

        $projects = $this->model->findAll();

        // Affichage

        $pageTitle = "Projets";
        \Renderer::render('pages/projects', compact('pageTitle', 'projects'));

    }

}