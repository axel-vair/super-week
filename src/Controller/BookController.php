<?php

namespace App\Controller;
use App\Model\User;
use App\Model\Book;

class BookController
{
    public User $user;
    public Book $book;
    public function __construct(){
        $this->user = new User();
        $this->book = new Book();
    }

    public function insertBook($title, $content, $id_user){
        $this->book->addBook($title, $content, $id_user);
    }
}