<?php
require("config.php");
$userName = "Guest";
$sign = '<a href="login.php">登入</a>';

if(isset($_SESSION["u_id"])){
    $userName = $_SESSION["name"];
    $sign = '<a href="index.php?signout=1">登出</a>';
}

if(isset($_GET["signout"])){
    unset($_SESSION["u_id"]);
    unset($_SESSION["name"]);
    header("location: index.php");
}

if(isset($_POST["btnAddCar"])){
    $sqlCommand = "INSERT INTO `car`( `p_id`, `u_id`, `qty`) VALUES ()";
    $result = mysqli_query($link, $sqlCommand);
    
}

$sqlCommand = "select * from product";
$result = mysqli_query($link, $sqlCommand);
$row = mysqli_fetch_assoc($result);
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
<body>
    <form action="">
        <h1>SHOP</h1>
        <p>Hello!<?= $userName." | ".$sign; ?></p>
        <hr>
        <table width="70%" border="0" >
        
            <?php do{ ?>
            <tr>
                <td align="center"><img width="100" src="img/<?= $row['picture']; ?>"></td>
                <td>
                    <h4><a href="product_details.php?id=<?= $row['id'] ?>"><?= $row["name"]; ?></a></h4>
                    <p><?= $row['info']; ?></p> 
                    <span class="ui-li-count"><?= "$".$row['price']; ?></span>		
                </td>
                <td>
                    <select name="qty">
                    <?php $qty = $row['qty'];if($row['qty']>10){$qty = 10;}
                     for($i = 1; $i<=$qty; $i++){ ?>
                    　<option value="1"><?= $i; ?></option>
                    <?php } ?>
                    </select>
                </td>
                <td><input type="submit" name="btnAddCar<?= $row['id'] ?>" value="加入購物車"></td>
            </tr>
        <?php }while($row = mysqli_fetch_assoc($result)) ?>
        
        </table>
    </form>
</body>
</html>