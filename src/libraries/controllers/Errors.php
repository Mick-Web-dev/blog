<?php
namespace Controllers;

use Http;

class Errors extends Controller
{
    protected $modelName = \Models\Errors::class;  // ou "\Models\Post"

    public function show()
    {
        $errorsModel = new \Models\Register();

        $pageTitle = "Erreurs";
        \Renderer::render('pages/errors', compact('pageTitle', 'errorsModel'));

    }

}