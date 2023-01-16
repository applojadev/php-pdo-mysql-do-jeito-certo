<link rel="stylesheet" href="style.css">

<?php

include './vendor/autoload.php';

use App\Database\DB;
use App\Utils\Tools;

$con = DB::PDO();

$sql = "INSERT INTO users (name) VALUES (?)";
try {
    $stmt = $con->prepare($sql);
    $stmt->execute(['José da Silva']);
} catch (PDOException $error) {

    echo "Erro ao inserir user:" . $error->getMessage();
}
$stmt = null;

$result = Tools::getUsers();

echo '<pre>';  print_r($result);  echo '</pre>';