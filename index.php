<?php
require("head.php");

// if(isset($_POST["btnAddCar"])){
//     $sqlCommand = "INSERT INTO `car`( `p_id`, `u_id`, `qty`) VALUES ()";
//     $result = mysqli_query($link, $sqlCommand);
    
// }

// if(isset($_GET["p_id"])){
//     echo $p_id = $_GET["p_id"];
//     echo $qty = $_POST['qty_'.$p_id];
    // $sqlCommand = "INSERT INTO `car`( `p_id`, `u_id`, `qty`) VALUES ()";
    // $result = mysqli_query($link, $sqlCommand);
    
//}

$sqlCommand = "select * from product";
$result = mysqli_query($link, $sqlCommand);
$row = mysqli_fetch_assoc($result);

?>
<body> 
<form method="post" action="">
    <table  width="80%" border="0" >
    
        <?php do{ ?>
        <tr>
            <td align="center"><img width="100" src="img/<?= $row['picture']; ?>"></td>
            <td>
                <h4><a href="productDetails.php?p_id=<?= $row['id'] ?>"><?= $row["name"]; ?></a></h4>
                <p><?= $row['info']; ?></p> 
                <span class="ui-li-count"><?= "$".$row['price']; ?></span>		
            </td>
            <td>
                <select name="qty_<?= $row['id'] ?>">
                <?php $qty = $row['qty'];if($row['qty']>10){$qty = 10;}
                    for($i = 1; $i<=$qty; $i++){ ?>
                　<option value="<?=$i ?>"><?= $i; ?></option>
                <?php } ?>
                </select>
            </td>
            <td><input type=submit name="btnAddCar" value="加入購物車" onclick="location='index.php?p_id=<?= $row['id'] ?>';"></td>
        </tr>
    <?php }while($row = mysqli_fetch_assoc($result)) ?>
    
    </table>
</form>
</body>
</html>