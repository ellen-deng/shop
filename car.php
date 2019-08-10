<?php
require("head.php");

$result = $db->query("select * from car c join product p on c.p_id=p.p_id where c.u_id=".$_SESSION['u_id']);
$row = $result->fetch();
$Count = $result->rowCount();
// $sqlCommand = "select * from car c join product p on c.p_id=p.p_id where c.u_id=".$_SESSION['u_id'] ;
// $result = mysqli_query($link, $sqlCommand);
// $row = mysqli_fetch_assoc($result);
// $Count = mysqli_num_rows($result);
$total=0;

if($Count==0){
    echo "*目前無商品*";
    exit();
}

if(isset($_POST["btnUpdCar"])){
    //  $result2 = mysqli_query($link, $sqlCommand);
    $result2 = $db->query("select * from car c join product p on c.p_id=p.p_id where c.u_id=".$_SESSION['u_id']);

    while($row2 = $result2->fetch()){
       
        $c = $row2["car_id"];
        $c_qty = $_POST["c_qty_$c"];
        // $sqlUpdCar = "UPDATE `car` SET `c_qty`=$c_qty WHERE car_id=$c";    
        $resultUpdCar = $db->query("UPDATE `car` SET `c_qty`=$c_qty WHERE car_id=$c");
    }
    
    header("location: car.php");
    exit();
}

if(isset($_POST["btnDelCar"])){
    //$result3 = mysqli_query($link, $sqlCommand);
    $result3 = $db->query("select * from car c join product p on c.p_id=p.p_id where c.u_id=".$_SESSION['u_id']);

    while($row3 = $result3->fetch()){
        if(isset($_POST[$row3["car_id"]])){
            $c = $row3["car_id"];
            //$sqlUpdCar = "DELETE FROM `car` WHERE car_id=$c";    
            $resultUpdCar = $db->query("DELETE FROM `car` WHERE car_id=$c");
        }         
    }
    
    header("location: car.php");
    exit();
}
?>

<body> 
<form method="post" action="">
    <table width="70%" border="0" >
    
        <?php do{ $total += $row["c_qty"]*$row["price"];?>
        <tr><td align="center"><input type="checkbox" name="<?=$row["car_id"]?>" id="<?=$row["car_id"]?>" value=""></td>
            <td><img width="130" src="img/<?= $row['picture']; ?>"></td>
            <td>
                <h4><a href="productDetails.php?p_id=<?= $row['p_id'] ?>"><?= $row["name"]; ?></a></h4>
                <p><?= $row['info']; ?></p> 
                <p><?= "$".$row['price']; ?></p>		
            </td>
            <td align="" colspan="">                
                <input type="number" name="c_qty_<?=$row['car_id']?>" style="width:35%" min="1" max="<?= $row['p_qty'] ?>" step="1" value="<?= $row['c_qty'] ?>">
            </td>    
            <td style="color:" align="right"><?="$ ".number_format($row['price']*$row['c_qty'])?></td>           
        </tr>
    <?php }while($row = $result->fetch()) ?>

    <tr>
        <td align="center"><!--<input type="checkbox" name="clickAll" id="clickAll" value="">--></td>
        <td align="right" colspan="4" style="color:red"> NT$ <?= number_format($total)?></td>
    </tr>
    <tr>
        <td align="center"><input type="submit" name="btnDelCar" id="btnDelCar" value="刪除" onclick=""></td>
        <td></td>
        <td align="right"></td><td align="" colspan=""><input type=submit name="btnUpdCar" value="變更數量" onclick=""></td>
        <td align="right"><input type="submit" name="btn" value="前往結帳" onclick=""></td>
    </tr>
    </table>
</form>
</body>
</html>
<script>
// $("#clickAll").click(function() {
//    if($("#clickAll").prop("checked")) {
//      $("#input[name='checkbox_']").each(function() {
//          $(this).prop("checked", true);
//      });
//    } else {
//      $("#input[name='checkbox_']").each(function() {
//          $(this).prop("checked", false);
//      });           
//    }
// });

$(document).ready(function() { 
    $('#btnDelCar').click(function() {
        return confirm('確定刪除??');
    });	  
});

</script>