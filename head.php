<?php
require("config.php");
$userName = "Guest";
$sign = '<a href="login.php">Login</a>';

if(isset($_SESSION["u_id"])){
    
    $sqlCar = "select * from car where u_id=".$_SESSION['u_id'];
    $CarResult = mysqli_query($link, $sqlCar);
    @$carCount = mysqli_num_rows($CarResult);

    $userName = $_SESSION["name"];
    $sign = '<a href="index.php">Home</a> | <a href="car.php">Car</a> ('.$carCount.') | 
        <a href="index.php?signout=1">Logout</a>';

}

if(isset($_GET["signout"])){
    unset($_SESSION["u_id"]);
    unset($_SESSION["name"]);
    header("location: index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="jquery-3.4.1.min.js"></script>
    <title>Document</title>
    <style>
        th, td {
            border-bottom: 1px solid #ddd;
        }
        body {font: 120% "Trebuchet MS", sans-serif; margin: 70px;margin-top: 45px;}
    </style>
</head>
    <h1>-SHOP-</h1>
    <p>Hello! <?= $userName." | ".$sign; ?></p>
    <hr>