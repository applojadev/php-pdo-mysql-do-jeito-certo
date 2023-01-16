<?php
namespace App\Database;

use PDO;
use PDOException;

class DB
{

    private static $instance = null;
    private $con = null;    

    private static function getInstance() {
    
        if (self::$instance === NULL) {
            
            self::$instance = new DB();
            self::createConnection();

            echo '<pre>';  print_r('Create instance!');  echo '</pre>';
            
        }

        return self::$instance;

    }

    private static function createConnection() {
    
        include './config/db.php';

        $host       = $config['host'];
        $port       = $config['port'];
        $database   = $config['database'];
        $user       = $config['user'];
        $password   = $config['password'];
        $options    = $config['options'];

        try {
            $con = new PDO("mysql:host=$host;port=$port;dbname=$database", "$user","$password",$options);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $con->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $con->setAttribute(PDO::MYSQL_ATTR_FOUND_ROWS, true);

            $instance = self::$instance;
            $instance->con = $con;

        } catch (PDOException $error) {
            echo 'Erro o conectar com o banco de dados' . $error->getMessage();
        }

    }

    public static function PDO() {
    
        $instance = self::getInstance();
        $con = $instance->con;
        return $con;
    }

}