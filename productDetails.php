<?php 
require("head.php");

$sqlCommand = "select * from product where id=".$_GET["p_id"];
$result = mysqli_query($link, $sqlCommand);
$row = mysqli_fetch_assoc($result);

if(isset($_POST["btnAddCar"])){
    $u_id = $_SESSION["u_id"];
    $p_id = $_POST["p_id"];
    $qty = $_POST['qty'];

    $same_p = false;
    while($carRow = mysqli_num_rows($CarResult)){
        if($carRow["p_id"]==$p_id){
            $same_p = ture;
            $car_id = $carRow["car_id"];
            $car_qty = $carRow["qty"];
        }
    }

    if($same_p){
        $qty += $car_qty;
        $sqlCommand = "UPDATE `car` SET `qty`=$qty WHERE car_id=$car_id";
    }else{
        $sqlCommand = "INSERT INTO `car`( `p_id`, `u_id`, `qty`) VALUES ($p_id, $u_id, $qty)";      
    }$result = mysqli_query($link, $sqlCommand);

    

}
?>

<body>
<form method="post" action="">
        
        <table width="70%" border="0" >                  
            <tr>
                <td align="center"><img width="100" src="img/<?= $row['picture']; ?>"></td>
                <td>
                    <input type="hidden" name="p_id" value="<?= $_GET["p_id"]; ?>">
                    <h4><?= $row["name"]; ?></h4>
                    <p><?= $row['info']; ?></p> 
                    <span class="ui-li-count"><?= "$".$row['price']; ?></span>		
                </td>
                <td>
                    <select name="qty">
                    <?php $qty = $row['qty'];if($row['qty']>10){$qty = 10;}
                     for($i = 1; $i<=$qty; $i++){ ?>
                    　<option value="<?=$i ?>"><?= $i; ?></option>
                    <?php } ?>
                    </select>
                </td>
                <td><input type=submit name="btnAddCar" value="加入購物車" ></td>
            </tr>               
        </table>
    </form
</body>
</html>