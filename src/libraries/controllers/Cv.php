<?php
namespace Controllers;

class Cv extends Controller
{
    protected $modelName = \Blog\Models\Cv::class;

    public function index() {

        // Affichage

        $pageTitle = "CV";
        \Renderer::render('pages/cv', compact('pageTitle'));

    }

}