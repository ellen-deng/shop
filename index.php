<?php
require("head.php");

$sqlCommand = "select * from product";
$result = mysqli_query($link, $sqlCommand);
$row = mysqli_fetch_assoc($result);

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
    <?php }while($row = mysqli_fetch_assoc($result)) ?>
    
    <div id="debug"></div>
    </table>
</form>
</body>
</html>

<script type="text/javascript" src="jquery.min.js"></script>
<script>

// $('#qty').on("change", function(){
// 		var s = $("#qty").text();
// 		var url = 'index.php?letter='+s;
		
// 		$.get(url, function(e){
// 			//$("#letterNumber").html(e);
// 			$("#debug").text(e);
// 		})
		
// 		$.ajax({
// 			type: "get", //post,get,put,delete
// 			url: 'index.php?letter='+s, // .com/cName/aName
// 			//contentType: "application/json"
// 			//data: JSON.stringify(dataToServer)
// 			success: function(e){
// 				$("#qty").text(e);
// 			}
// 		})

// 	})




// $(document).ready(function() {
//     $("#btnAddCar").click(function() { //ID 為 submitExample 的按鈕被點擊時
//         $.ajax({
//             type: "POST", //傳送方式
//             url: "index.php", //傳送目的地
//             dataType: "json", //資料格式
//             data: { //傳送資料
//                 nickname: $("#p_id").val(), //表單欄位 ID nickname
//                 qty: $("#qty").val() //表單欄位 ID gender
//             },
//             success: function(data) {
//                 if (data.nickname) { //如果後端回傳 json 資料有 nickname
//                     $("#demo")[0].reset(); //重設 ID 為 demo 的 form (表單)
//                     $("#result").html('<font color="#007500">您的暱稱為「<font color="#0000ff">' + data.nickname + '</font>」，性別為「<font color="#0000ff">' + data.gender + '</font>」！</font>');
//                 } else { //否則讀取後端回傳 json 資料 errorMsg 顯示錯誤訊息
//                     $("#demo")[0].reset(); //重設 ID 為 demo 的 form (表單)
//                     $("#result").html('<font color="#ff0000">' + data.errorMsg + '</font>');
//                 }
//             },
//             error: function(jqXHR) {
//                 $("#demo")[0].reset(); //重設 ID 為 demo 的 form (表單)
//                 $("#result").html('<font color="#ff0000">發生錯誤：' + jqXHR.status + '</font>');
//             }
//         })
//     })        
// });






// function addCar(Pqty){
//     var qty = getElementById("Pqty");
//     $.ajax({
// 		type: 'POST',
// 		url: '/index.php' ,
//         data: {id:"11111",name:Pname,num:},
//         //contentType: "application/x-www-form-urlencoded;charset=utf-8",
// 		success:  function (data) {
//             var obj=JSON.parse(data);
//                 console.log("yes!!!");
//                 console.log(obj);
// 			},
// 		error: function () {
// 				console.log("no!!!");
// 		}
// 	});
// }
</script>