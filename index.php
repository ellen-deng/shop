<?php
require("head.php");

$result = $db->query("select * from product");
$row = $result->fetch();
// $sqlCommand = "select * from product";
// $result = mysqli_query($link, $sqlCommand);
// $row = mysqli_fetch_assoc($result);

if(isset($_POST["btnAddCar"])){

    if(!isset($_SESSION["u_id"])){
       header("location: login.php");exit();
    }else{ }
}    
?>

<body> 
<form method="post" action="">
    <table  width="80%" border="0" >
    
        <?php do{ ?>
        <tr>
            <td align="center" width="25%" ><img width="130" src="img/<?= $row['picture']; ?>"></td>
            <td width="35%">
                <input type="hidden" name="" id="" value="">
                <h4><a href="productDetails.php?p_id=<?= $row['p_id'] ?>"><?= $row["name"]; ?></a></h4>
                <p><?= $row['info']; ?></p> 
                <p><?= "$".$row['price']; ?></p>		
            </td>
            <!--<td align="left">
                <input type="number" name="qty" id="qty" style="width:35%" min="0" max="<?= $row['p_qty'] ?>" step="1" value="1">
            </td>
            <td><input type="button" name="btnAddCar"  value="加入購物車" onclick=""></td>-->
        </tr>
    <?php }while($row = $result->fetch()) ?>
    
    <div id="debug"></div>
    </table>
</form>
</body>
</html>

<script type="text/javascript" src="jquery.min.js"></script>
<script>