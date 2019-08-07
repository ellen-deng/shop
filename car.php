<?php
require("head.php");

$sqlCommand = "select * from car where u_id=".$_SESSION['u_id']." group by p_id ";
$result = mysqli_query($link, $sqlCommand);
$row = mysqli_fetch_assoc($result);
?>

<body> 
<form method="post" action="">
    <table width="70%" border="0" >
    
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