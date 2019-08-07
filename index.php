<?php
require("head.php");

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
                <h4><a href="productDetails.php?p_id=<?= $row['p_id'] ?>"><?= $row["name"]; ?></a></h4>
                <p><?= $row['info']; ?></p> 
                <span class="ui-li-count"><?= "$".$row['price']; ?></span>		
            </td>
            <td>
                <select name="qty_<?= $row['id'] ?>" id="qty_<?= $row['id'] ?>">
                <?php $qty = $row['p_qty'];if($row['p_qty']>10){$qty = 10;}
                    for($i = 1; $i<=$qty; $i++){ ?>
                　<option value="<?=$i ?>"><?= $i; ?></option>
                <?php } ?>
                </select>
            </td>
            <td><input type=submit name="btnAddCar" value="加入購物車" onclick="addCar(qty_<?= $row['id'] ?>)"></td>
        </tr>
    <?php }while($row = mysqli_fetch_assoc($result)) ?>
    
    </table>
</form>
</body>
</html>


<script>
function addCar(Pqty){
    var qty = getElementById("Pqty");
    $.ajax({
		type: 'POST',
		url: '/index.php' ,
        data: {id:"11111",name:Pname,num:},
        //contentType: "application/x-www-form-urlencoded;charset=utf-8",
		success:  function (data) {
            var obj=JSON.parse(data);
                console.log("yes!!!");
                console.log(obj);
			},
		error: function () {
				console.log("no!!!");
		}
	});
}

</script>