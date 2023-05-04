<?php

namespace App\Controller;
use App\Model\User;

class AuthController
{
    public User $user;
    public function __construct(){
    $this->user = new User();
    }

    public function register($email, $firstname, $lastname, $password){
        $success = $this->user->insertUser($email, $firstname, $lastname, $password);
        return ['success' => $success];
    }
}