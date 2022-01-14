<?php

spl_autoload_register(function ($className) {
    //Récupère le nom de la classe qui est chargée
    //var_dump($className);
    $className = str_replace("\\", "/", $className);
    require_once("libraries/$className.php");
});