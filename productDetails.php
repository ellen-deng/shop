<?php 
require("head.php");

$sqlCommand = "select * from product where p_id=".$_GET["p_id"];
$result = mysqli_query($link, $sqlCommand);
$row = mysqli_fetch_assoc($result);

if(isset($_POST["btnAddCar"])){
    echo $u_id = $_SESSION["u_id"];
    echo $p_id = $_REQUEST["p_id"];
    echo $qty = $_POST['qty'];

    $same_p = false;
    while($carRow = mysqli_fetch_assoc($CarResult)){
        echo 1;
        if($carRow["p_id"]==$p_id){
            echo 2;
            $same_p = true;
            $car_id = $carRow["car_id"];
            $car_qty = $carRow["c_qty"];
        }
    }

    if($same_p){
        $qty += $car_qty;
        $sqlCommand = "UPDATE `car` SET `c_qty`=$qty WHERE car_id=$car_id";
    }else{
        $sqlCommand = "INSERT INTO `car`( `p_id`, `u_id`, `c_qty`) VALUES ($p_id, $u_id, $qty)";      
    }$result = mysqli_query($link, $sqlCommand);

    if($result){
        header("location: productDetails.php?p_id=$p_id");
    }

}
?>

<body>
    <form method="post" action="">
            
            <table width="80%" border="0" > 
            <tr>
                <td rowspan="2" align="center"><img width="45%" src="img/<?= $row['picture']; ?>"></td>
                <td align="">
                    <input type="hidden" name="p_id" value="<?= $_GET["p_id"]; ?>">
                    <h4><?= $row["name"]; ?></h4>
                    <p><?= $row['info']; ?></p> 
                    <span class="ui-li-count"><?= "$".$row['price']; ?></span>	
                </td>
            </tr>
            <tr>        
                <td align="">
                <input type="number" name="qty" min="0" max="<?= $row['p_qty'] ?>" step="1" value="1">
                <br>
                <input type=submit name="btnAddCar" value="加入購物車" >
                </td>
            </tr>                         
        </table>
    </form
</body>
</html>