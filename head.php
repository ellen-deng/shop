<?php
require("config.php");
$userName = "Guest";
$sign = '<a href="login.php">登入</a>';

if(isset($_SESSION["u_id"])){
    
    $sqlCar = "select * from car where u_id=".$_SESSION['u_id'];
    $CarResult = mysqli_query($link, $sqlCar);
    $carCount = mysqli_num_rows($CarResult);

    $userName = $_SESSION["name"];
    $sign = '<a href="index.php">首頁</a> | <a href="car.php">購物車</a> ('.$carCount.') | 
        <a href="index.php?signout=1">登出</a>';

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
    <title>Document</title>
    <style>
        th, td {
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
    <h1>SHOP</h1>
    <p>Hello!<?= $userName." | ".$sign; ?></p>
    <hr>