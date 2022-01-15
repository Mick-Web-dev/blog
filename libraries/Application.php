<?php

class Application {
    //Les actions de l'utilisateur appelant des fichiers dont la structure
    //est identique hormis le nom du fichier appelé, la classe Application a
    //pour but de générer la structure composite du blog via un process. Ainsi
    // seul le fichier index.php restera à la racine !
    // Puis aboutir à une requete Http → index.php?controller=article&task=show&id=...


    /*public static function process()
    {
        $controllerName = "post";//post
        $task = "index"; // index

        //gestion du controllerName
        if (!empty($_GET['controller'])) {
            $controllerName = ucfirst($_GET['controller']);
        }

        //gestion de la tâche (task)
        if (!empty($_GET['task'])) {
            $task = $_GET['task'];
        }

        $controllerName = "\Controllers\\" . $controllerName;

        $controller = new $controllerName();
        $controller->$task();
    }*/
    public static function controllers()
    {
        $controllerName = "post";//post
        $task = "index"; // index

        switch ($controllerName && $task) {
            case 1 :
                $controllerName = "contact";
                $task = "insert";
                //gestion du controllerName
                break;

            case 2 :
                $controllerName = "connexion";
                $task = "find";
                break;
        }

        if (!empty($_GET['controller'])) {
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