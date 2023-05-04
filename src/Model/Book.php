<?php

namespace App\Model;
use PDO;
use PDOException;
class Book extends Database
{
    public function __construct()
    {
        parent::__construct();
    }

    public function addBook($title, $content, $id_user)
    {
        $sql = 'INSERT INTO book (title, content, id_user) VALUES (:title, :content, :id_user)';
        $sql_exe = $sql_exe = $this->db->prepare($sql);
        $sql_exe->execute([
            'title' => htmlspecialchars($title),
            'content' => htmlspecialchars($content),
            'id_user' => htmlspecialchars($id_user)
        ]);

        if ($sql_exe) {
            return true;
        } else {
            return false;
        }
    }

    public function displayBooks(){
        $sql = "SELECT * FROM book";
        $sql_exe = $this->db->prepare($sql);
        $sql_exe->execute([]);
        $result = $sql_exe->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function displayBookById($id){
        $sql = "SELECT * FROM book WHERE id = $id";
        $sql_exe = $this->db->prepare($sql);
        $sql_exe->execute([]);
        $result = $sql_exe->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}