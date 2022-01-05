<?php

// Le but de ce fichier est de faire du rendu HTML !
// L'idée est d'afficher le fichier nécessaire par le chemin: render('posts/show')
// et un tableau associatif pour identifier les variables du fichier

/**
 * @param string $path
 * @param array $variables
 * @return void
 */
function render(string $path, array $variables = [])
{
    // ex->['post' => ..., 'var2' => "mickael"] -> $post = ...
    // ->Transformer les données du tableau associatif en véritables variables => fonction extract
    extract($variables);
    ob_start();
    require('templates/'. $path . '.html.php');
    $pageContent = ob_get_clean();

    require('templates/layout.html.php');
}

/**
 * @param string $url
 * @return void
 */
function redirect(string $url): void
{
    //ex-> redirect('index.php')
    header("Location: $url" );
    exit();
}