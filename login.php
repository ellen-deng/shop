<?php
require("config.php");

if(isset($_POST["btnHome"])){
    header("location: index.php");
    //exit();
}

if(isset($_POST["btnLogin"])){

    echo $mail = $_POST["mail"];

    $sqlCommand = "select * from member where mail = '$mail'";
    $result = mysqli_query($link, $sqlCommand);
    $row = mysqli_fetch_assoc($result);
    $row_count = mysqli_num_rows($result);

    if($row_count != 0){
        $_SESSION["u_id"] = $row["user_id"];
        $_SESSION["name"] = $row["name"];
        header("location: index.php");
        exit();
    }



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
        body {font: 120% "Trebuchet MS", sans-serif; margin: 70px;}
    </style>
</head>
<body>
    <form method="post" action="">
        <table width="300" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#F2F2F2">
            <tr><td align="center" colspan="2"><font color="">SHOP-LOGIN</font></td></tr>
            <tr><td align="center" width="80">mail :</td><td align=""><input type="text" name="mail"></td></tr>
            <tr><td align="center" width="80">psw :</td><td align=""><input type="password" name="psw"></td></tr>
            <tr><td align="center" colspan="2">
            <input type="submit" name="btnLogin" value="login" />  
            <input type="reset" name="btnLogin" value="reset" />  
            <input type="submit" name="btnHome" id="btnHome" value="home" /></td></tr>
        </table>
    </form>
</body>
</html>