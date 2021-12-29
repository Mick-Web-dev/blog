<?php
class Router
{
    private $_ctrl;
    private $_view;

    public function routeReq()
    {
        try
        {
            /**
             * Chargement automatique des classes
             */
            spl_autoload_register(function ($class){
                require('models/'.$class.'.php');
            });
            $url = '';
            /**
             * Le controller est inclus selon l'action de l'utilisateur
             */
            if (isset($_GET['url']))
            {
                $url = explode('/', filter_var($_GET['url'],
            FILTER_SANITIZE_URL));

               $controller = ucfirst(strtolower($url[0]));
               $controllerClass = "Controller".$controller;
               $controllerFile = "Controllers/".$controllerClass.".php";

               if (file_exists($controllerFile))
               {
                   require($controllerFile);
                   $this->_ctrl = new $controllerClass($url);
               }
               else
                   throw new Exception('Page introuvable');
            }
            else
            {
                require('controllers/ControllerAccueil.php');
                $this->_ctrl = new ControllerAccueil($url);
            }
        }
        /**
         * Gestion des erreurs
         */
        catch (Exception $e)
        {
            $errorMsg = $e->getMessage();
            require('views/viewError.php');
        }
    }
}