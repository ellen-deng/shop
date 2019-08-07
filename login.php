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
</head>
<body>
    <form method="post" action="">
        <table width="300" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#F2F2F2">
            <tr><td align="center" colspan="2"><font color="">SHOP-LOGIN</font></td></tr>
            <tr><td align="center" width="80">信箱</td><td align="center"><input type="text" name="mail"></td></tr>
            <tr><td align="center" width="80">密碼</td><td align="center"><input type="text" name="psw"></td></tr>
            <tr><td align="center" colspan="2">
            <input type="submit" name="btnLogin" value="登入" />  
            <input type="reset" name="btnLogin" value="重設" />  
            <input type="submit" name="btnHome" id="btnHome" value="回首頁" /></td></tr>
        </table>
    </form>
</body>
</html>