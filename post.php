<?php

/**
 * CE FICHIER DOIT AFFICHER UN POST ET SES COMMENTAIRES !
 * 
 * On doit d'abord récupérer le paramètre "id" qui sera présent en GET et vérifier son existence
 * Si on n'a pas de param "id", alors on affiche un message d'erreur ! Sinon, on se connecte
 * à la base de données et récupère les commentaires du plus ancien au plus récent.
 * On affiche le post puis ses commentaires
 */
require_once('libraries/autoload.php');

$controller = new \Controllers\Post();
$controller->show();