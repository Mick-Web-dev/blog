<?php
namespace Controllers;

class Mentions extends Controller
{
     // ou "\Models\Post"
    protected $modelName = \Models\Mentions::class;
    public function index() {
        /**
         * 2. Affichage
         */

        $pageTitle = "Mention Légales";
        \Renderer::render('pages/mentions', compact('pageTitle'));

    }
}