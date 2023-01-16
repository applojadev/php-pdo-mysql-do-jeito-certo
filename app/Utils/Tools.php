<?php
namespace App\Utils;

use App\Database\DB;
use PDO;
use PDOException;

class Tools
{

    public static function getUsers() {
    
        $con = DB::PDO();

        $sql = "SELECT * FROM users";
        try {
            $stmt = $con->prepare($sql);
            $stmt->execute();
            $users = $stmt->fetchALL(PDO::FETCH_ASSOC);
        } catch (PDOException $error) {

            echo "Erro ao carregar users" . $error->getMessage();
        }
        $stmt = null;

        return $users;
    }

}