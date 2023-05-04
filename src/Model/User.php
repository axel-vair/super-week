<?php

namespace App\Model;

use App\Model\Database;

use PDO;
use PDOException;

class User extends Database
{
    public ?string $last_name;
    public ?string $first_name;
    public ?string $email;

    public ?int $id;

    public function __construct()
    {
        parent::__construct();
    }

    public function findAll()
    {
        $sql = "SELECT * FROM user";
        $sql_exe = $this->db->prepare($sql);
        $sql_exe->execute([]);
        $result = $sql_exe->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function userById($id){
        $sql = "SELECT * FROM user WHERE id = $id";
        $sql_exe = $this->db->prepare($sql);
        $sql_exe->execute([]);
        $result = $sql_exe->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function verifUser($email)
    {
        $sql = "SELECT * FROM user WHERE email = :email";
        $sql_exe = $this->db->prepare($sql);
        $sql_exe->execute([
            'email' => $email
        ]);
        $result = $sql_exe->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function insertUser($email, $firstname, $lastname, $password)
    {
        if (!$this->verifUser($email)) {
            $sql = 'INSERT INTO user (email, first_name, last_name, password) VALUES (:email, :first_name, :last_name, :password)';
            $sql_exe = $this->db->prepare($sql);
            $sql_exe->execute([
                'email' => htmlspecialchars($email),
                'first_name' => htmlspecialchars($firstname),
                'last_name' => htmlspecialchars($lastname),
                'password' => htmlspecialchars(password_hash($password, PASSWORD_DEFAULT))
            ]);
           if($sql_exe){
               return true;
           }else{
               return false;
           }
        } else {
            return false;
        }
    }

    public function connection($email, $password){
        $sql = 'SELECT * 
                FROM user
                WHERE email = :email ';
        $sql_exe = $this->db->prepare($sql);
        $sql_exe->execute([
            'email' => $email,
        ]);
        $results = $sql_exe->fetch(PDO::FETCH_ASSOC);
        if ($results) {
            $hashed_password = $results['password'];
            if (password_verify($password, $hashed_password)) {
                session_start();
                $userId = $results['id'];
                $_SESSION['id'] = $userId;
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
