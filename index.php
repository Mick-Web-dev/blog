<?php

// GESTION CENTRALISEE DE L'AFFICHAGE DE L'APPLICATION
//ex: require_once('libraries/controllers/Post.php');
require_once('libraries/autoload.php');

// -> LIBRAIRIES -> Application.php
// $controllerName = "post";
// $task = "index";
//$controller = new \Controllers\Post();
//$controller->index();

\Application::process();