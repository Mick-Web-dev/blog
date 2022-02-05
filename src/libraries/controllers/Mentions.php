<?php
namespace Controllers;

class Mentions extends Controller
{
     // ou "\Models\Post"
    protected $modelName = \Blog\Models\Mentions::class;

    public function index() {
        //Affichage
        $pageTitle = "Mention Légales";
        \Renderer::render('pages/mentions', compact('pageTitle'));

    }
}