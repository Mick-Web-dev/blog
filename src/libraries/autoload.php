<?php

spl_autoload_register(function ($className) {
    //Récupère le nom de la classe qui est chargée
    $className = str_replace("\\", "/", $className);
    require_once("src/libraries/$className.php");
});