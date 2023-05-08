<?php

namespace App\Controller;
use App\Model\User;
use App\Model\Database;

class UserController
{
    public User $user;

    public function __construct(){
     $this->user = new User();
    }
    public function list(){
      echo json_encode($this->user->findAll());
    }

    public function getUserById($id){
        echo json_encode($this->user->userById($id));
    }

}