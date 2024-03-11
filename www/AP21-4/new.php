<?php

require_once "autoloader.php";

$connection = new Connection();
$conn = $connection->getConn();

if (count($_POST) > 0){
    $id=$_POST["id"];
    $company=$_POST["company"];
    $investment=$_POST["investment"];
    $date=$_POST["date"];
    $active=$_POST["active"];

    $query = "INSERT INTO `investment`(id, company, investment, date, active)
    VALUES ('$id', '$company', '$investment','$date', '$active')";
    
    if(mysqli_query($conn, $query)) {
        header("location: index.php");
    }
    
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dates Visits</title>
    <style>
            form {
                border: 2px solid black;
                width: 400px;
                height: 300px;
                font-size: 25px;
            }
        </style>
</head>
<body>
    <center>
        <center><h1><a>Insert new Visit</a></h1></center>
           <form method="POST"> 
            <label for="id">Id:</label>
            <input type="text" id="id" name="id" required>
            <br>
            <br>
            <label for="company">Company:</label>
            <input type="text" id="company" name="company" required>
            <br>
            <br>
            <label for="investment">Investment:</label>
            <input type="text" id="investment" name="investment" required>
            <br>
            <br>
            <label for="date">Date:</label>
            <input type="Date" id="date" name="date" required>
            <br>
            <br>
            <label for="active">Active:</label>
            <select id="active" name="active" required>
                <option value="0">True</option>
                <option value="1">False</option>
            </select>

            <button type="submit" name="insert">Insert Visit</button>
        </form>
        </center>
</body>
</html>