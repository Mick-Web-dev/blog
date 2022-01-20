<?php
namespace Models;


//Regroupe toutes les fonctions qui servent à manipuler les posts
class Post extends Model
{
    //Appelle la fonction find() du model mais ici la table post
    protected $table = "posts";
}