<?php
require_once "autoloader.php";
$connection = new Connection();
$conn = $connection->getConn();

for ($i = 0; $i < 50; $i++) {
    $dia = rand(1, 31);
    $mes = rand(1, 12);
    $año = rand(1970, 2024);
    $company = ["Consum", "Amazon", "ValenciaCF"];

    $id = $i;
    $comp = $company[array_rand($company)];
    $investment = rand(1000, 100000);
    $date = "$año-$mes-$dia";
    $active = rand(0, 1);

    $query = "INSERT INTO `investment` (id, company, investment, date, active) 
    VALUES ('$id', '$comp', '$investment','$date', '$active')";

    if(mysqli_query($conn, $query)) {
        header("location: index.php");
    }
}
?>



