<?php

namespace App\Model;

use App\Model\Database;

use PDO;
use PDOException;


class User extends Database {
    public ?string $last_name;
    public ?string $first_name;
    public ?string $email;


    public function __construct ()
    {
        parent::__construct();
    }

    public function findAll(){
        $sql = "SELECT * FROM user";
        $sql_exe = $this->db->prepare($sql);
        $sql_exe->execute([]);
        $result = $sql_exe->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
