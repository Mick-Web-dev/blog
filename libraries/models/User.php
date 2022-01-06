<?php
namespace Models;
require_once('libraries/models/Model.php');

class User extends Model
{
    //On indique ici que la table à utiliser est users
    protected $table = "users";
}