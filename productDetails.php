<?php 
require("head.php");

$result = $db->query("select * from product where p_id=".$_GET["p_id"]);
$row = $result->fetch();

if(isset($_POST["btnAddCar"])){
    $p_id = $_REQUEST["p_id"];

    if(isset($_SESSION["u_id"])){
        $u_id = $_SESSION["u_id"];       
        $qty = $_POST['qty'];

        $same_p = false;
        while($CarRow = $CarResult->fetch()){        
            if($CarRow["p_id"]==$p_id){            
                echo $same_p = true;
                $car_id = $CarRow["car_id"];
                $car_qty = $CarRow["c_qty"];
            }
        }

        if($same_p){
            $qty += $car_qty;
            $result = $db->query("UPDATE `car` SET `c_qty`=$qty WHERE car_id=$car_id");
            header("location: productDetails.php?p_id=$p_id");
        }else{
            $result = $db->query("INSERT INTO `car`( `p_id`, `u_id`, `c_qty`) VALUES ($p_id, $u_id, $qty)");
            header("location: productDetails.php?p_id=$p_id");
         }
       
    }else{ header("location: login.php?p_id=$p_id&backTo=productDetails.php");exit();}
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
    </form>
</body>
</html>