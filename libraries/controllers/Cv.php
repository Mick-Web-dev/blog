<?php
namespace Controllers;

class Cv extends Controller
{
    protected $modelName = \Models\Cv::class;

    public function index() {

        /**
         * 2. Affichage
         */
        $pageTitle = "CV";
        \Renderer::render('pages/cv', compact('pageTitle'));

    }

}