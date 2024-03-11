<?php

require_once "autoloader.php";

$connection = new Connection();
$conn = $connection->getConn();


/*$id=($_GET['id']);
$query = "DELETE FROM investment WHERE id = '$id'";

    if(mysqli_query($conn, $query) == TRUE) {
    header("location: index.php");
    }*/

for ($i=0; $i < 200; $i++){
    $sql = "DELETE FROM investment ";

    if($conn->query($sql) == TRUE) {
        header("location: index.php");
} else {
    echo  "Error deleting record: " . $conn->error;
}
}
?>