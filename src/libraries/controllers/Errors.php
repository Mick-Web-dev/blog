<?php
namespace Controllers;

use Http;

class Errors extends Controller
{
    protected $modelName = \Blog\Models\Errors::class;

    public function getMessage()
    {
        $errorsModel = $this->getMessage($message);

        $pageTitle = "Erreurs";
        \Renderer::render('pages/errors', compact('pageTitle', 'errorsModel'));

    }

}