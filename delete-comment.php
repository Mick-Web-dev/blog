<?php

/**
 * DANS CE FICHIER ON CHERCHE À SUPPRIMER LE COMMENTAIRE DONT L'ID EST PASSE EN PARAMETRE GET !
 * 
 * Vérification du paramètre "id" présent en GET et correspondance avec le commentaire
 * Puis suppression
 */
require_once('libraries/autoload.php');

$controller = new \Controllers\Comment();
$controller->delete();
