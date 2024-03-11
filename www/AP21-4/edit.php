<?php

require_once "autoloader.php";

$connection = new Connection();
$conn = $connection->getConn();

$id=$_GET['id'];

$query = "SELECT * FROM investment WHERE id='$id' ";
$result = mysqli_query($conn, $query);
$client=mysqli_fetch_assoc($result);

if (count($_POST) >  0){
    $id=$_POST["id"];
    $company=$_POST["company"];
    $investment=$_POST["investment"];
    $date=$_POST["date"];
    $active=$_POST["active"];

    $query="UPDATE investment SET company='$company', investment= '$investment', date='$date', active='$active' WHERE id='$id' ";

    if (mysqli_query($conn, $query)) {
        header("location: index.php");
    }
}
?>
<html>
    <head>
        <title>Change</title>
        <style>
            form {
                border: 2px solid black;
                width: 400px;
                height: 500px;
                font-size: 25px;
            }
        </style>
    </head>
<center><h1>Change the Information</h1></center>
<body>
<center>
<form id="form_x" class="class_x" method="post">
<br>
<label for="id" >ID: </label>
<input type="id" name="id" value="<?php echo $client['id']; ?>" readonly>
<br>
<br>
<br>
<label for="company" >Company: </label>
<input type="company" name="company" value="<?php echo $client['company']; ?>">
<br>
<br>
<br>
<label for="investment">Investment: </label>
<input type="investment" name="investment" value="<?php echo $client['investment']; ?>">
<br>
<br>
<br>
<label for="date">Date: </label>
<input type="date" name="date" value="<?php echo $client['date']; ?>">
<br>
<br>
<br> 
<label for="active"> Active: </label>
<select id="active" name="active" value="<?php echo $client['active']; ?>">
    <option value="0">True</option>
    <option value="1">False</option>
</select>
<br>
<br>
<br>
<input id="submit" type="submit" value="Aceptar" />
</form>
</center>
</body>

</html>