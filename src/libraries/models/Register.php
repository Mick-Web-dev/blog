<?php
namespace Models;
use Http;
class Register extends Model
{
    protected $table = "users";

    /**
     * @param string $pseudo
     * @param string $password
     * @param string $mail
     */

    public function checkUser(string $pseudo, string $password, string $mail): string
    {

    }
}