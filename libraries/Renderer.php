<?php

class Renderer {
    /**
     * @param string $path
     * @param array $variables
     * @return void
     */
    public static function render(string $path, array $variables = [])
    {
        // ex->['post' => ..., 'var2' => "mickael"] -> $post = ...
        // ->Transformer les données du tableau associatif en véritables variables => fonction extract
        extract($variables);
        ob_start();
        require('templates/'. $path . '.html.php');
        $pageContent = ob_get_clean();

        require('templates/layout.html.php');
    }
}