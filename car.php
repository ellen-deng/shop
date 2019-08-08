<?php
require("head.php");

$sqlCommand = "select * from car c join product p on c.p_id=p.p_id where c.u_id=".$_SESSION['u_id'] ;
$result = mysqli_query($link, $sqlCommand);
$row = mysqli_fetch_assoc($result);
$total=0;



?>

<body> 
<form method="post" action="">
    <table width="70%" border="0" >
    
        <?php do{ $total += $row["c_qty"]*$row["price"];?>
        <tr>
            <td align="center"><img width="130" src="img/<?= $row['picture']; ?>"></td>
            <td>
                <h4><?= $row["name"]; ?></h4>
                <p><?= $row['info']; ?></p> 
                <p><?= "$".$row['price']; ?></p>		
            </td>
            <td align="" colspan="2">
                <input type="number" min="0" max="<?= $row['p_qty'] ?>" step="1" value="<?= $row['c_qty'] ?>">
            </td>    
                       
        </tr>
    <?php }while($row = mysqli_fetch_assoc($result)) ?>

    <tr><td align="right" colspan="4"><input type=submit name="btnUpdCar" value="變更數量" onclick=""></td></tr>
    <tr><td></td><td align="right"></td><td align="" colspan=""> $ <?= number_format($total)?></td><td align="right"><input type=submit name="btnUpdCar" value="結帳" onclick=""></td></tr>
    </table>
</form>
</body>
</html>