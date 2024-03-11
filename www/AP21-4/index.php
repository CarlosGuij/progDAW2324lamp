<?php

require_once "autoloader.php";
$connection = new Connection();
$conn = $connection->getConn();

/*session_start();
if (!isset($_SESSION['user'])) {
    $user = $_GET[ 'username' ];
    } else {
        header("Location: index.php");
}*/
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    
</head>

<body>
    <h1><center>The Visits</center></h1>
    <table class="redTable">
        <thead>
            <tr>
                <td colspan="7">
                </td>
            </tr>
        </thead>
        <tbody>
        <?php
             
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $query = 'SELECT * From investment';

        $result = $conn->query($query);

        
        //Paginación

        $numRows = $result->num_rows;
        $rowsPag = 10;
        $numPag = ceil ($numRows / $rowsPag);

        $pagActive = (isset($_GET["page"])) ? $_GET["page"] : 1;
        $firstRow = ($pagActive -1) * $rowsPag;

        $lastRow = $firstRow + $rowsPag -1 ;
        $lastRow = ($lastRow > $numRows) ? $numRows-1 : $lastRow;
        
        echo '<table class="table table-striped">';
        echo '<tr>
                <th>Id</th>
                <th>Company</th>
                <th>Investment</th>
                <th>Date</th>
                <th>Active</th>
                <th colspan="3"><center>Actions</th></center>
            </tr>';
        //while ($value = $result->fetch_array(MYSQLI_ASSOC)){
            for ($i = $firstRow; $i <= $lastRow; $i++){
                $result->data_seek($i);
                $value = $result->fetch_array(MYSQLI_ASSOC);
                echo '<tr>';
                foreach ($value as $data){
                    echo '<td>' . $data . '</td>';
                }
                echo "<td><a href='delete.php?id=" . $value["id"] . "'><img src='img/del_icon.png' width='25'></a></td>";
                echo "<td><a href='edit.php?id=" . $value["id"] . "'><img src='img/edit.png' width='25'></a></td>";
                echo "<td><a href='new.php?id=" . $value["id"] . "'><img src='img/add.jpg' width='25'></a></td>";
                echo '</tr>';
            }
        //} 
        echo '</table>';

        //Para mostrar la Paginación
        $pagBefore = ($pagActive==1) ? 1 : $pagActive-1;
        echo " <a href='index.php?page=$pagBefore'><</a> ";

        for ($i=1; $i <= $numPag; $i++){
            if($i==$pagActive){
                echo " <strong>$i</strong> ";
            }else{
                echo " <a href='index.php?page=$i'>$i</a> ";
            }
        }
        $pagAfter = ($pagActive==$numPag) ?  $numPag : $pagActive+1;
        echo " <a href='index.php?page=$pagAfter'>></a> ";

        $result->close();

        ?>
        </tbody>
    </table>
</body>

</html>
