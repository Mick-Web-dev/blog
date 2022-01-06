<?php

/**
 * CE FICHIER DOIT ENREGISTRER UN NOUVEAU COMMENTAIRE EST REDIRIGER SUR LE POST !
 * 
 * On doit d'abord vérifier que toutes les informations ont été entrées dans le formulaire
 * Si ce n'est pas le cas : un message d'erreur
 * Sinon, on sauvegarde les informations
 * 
 * Pour sauvegarder les informations, on vérifie que le post qu'on essaye de commenter existe
 * On fait donc une première requête et si le post existe alors on intègre le commentaire.
 * Puis on redirige l'utilisateur vers le post.
 */
require_once('libraries/autoload.php');

$controller = new \Controllers\Comment();
$controller->insert();
