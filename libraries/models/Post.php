<?php
namespace Models;
require_once('libraries/models/Model.php');

//Regroupe toutes les fonctions qui servent à manipuler les posts
class Post extends Model
{
    //Appelle la fonction find() du model mais ici la table post
    protected $table = "posts";
}