<?php

class Application {
    //Les actions de l'utilisateur appelant des fichiers dont la structure
    //est identique hormis le nom du fichier appelé, la classe Application a
    //pour but de générer la structure composite du blog via un process. Ainsi
    // seul le fichier index.php restera à la racine !
    // Puis aboutir à une requete Http → index.php?controller=article&task=show&id=...

    public static function process()
    {
        $controllerName = "post";
        $task = "index";

        //gestion du controllerName
        if (!empty($_GET['controller'])) {
            //GET => user
            // User
            $controllerName = ucfirst($_GET['controller']);
        }

        //gestion de la tâche (task)
        if (!empty($_GET['task'])) {
            $task = $_GET['task'];
        }

        $controllerName = "\Controllers\\" . $controllerName;

        $controller = new $controllerName();
        $controller->$task();
    }
}