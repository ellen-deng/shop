<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<script type="text/javascript" src="jquery.min.js"></script>
</head>
<body>

<!--
 
畫面左右各有一個下拉式選單，
左邊的下拉式選單若選擇  A 這項時，右邉的下拉式選單要改成 A01, A02, A03, A04, A05;
左邊的下拉式選單若改選  B 這項時，右邉的下拉式選單要改成 B01, B02, B03, B04, B05;
左邊的下拉式選單若改選  C 這項時，右邉的下拉式選單要改成 C01, C02, C03, C04, C05

-->

	<form method="post" action="http://exec.hostzi.com/echo.php">
		
		<select name="letter" id="letter">
			<option value="0">A</option>
			<option value="1">B</option>
			<option value="2">C</option>
		</select>&nbsp;|&nbsp; 
		<select name="letterNumber" id="letterNumber">
			<option value="0">A01</option>
			<option value="1">B02</option>
			<option value="2">C03</option>
		</select> 
		<input type="submit" value="OK" /> 
	</form>
<div id="debug"></div>
</body>


<script>
	
	$('#letter').on("change", function(){
		var s = $("#letter option:selected").text();
		var url = 'getLetterNumber.php?letter='+s;
		
		// $.get(url, function(e){
		// 	$("#letterNumber").html(e);
		// 	//$("#debug").text(e);
		// })
		
		$.ajax({
			type: "get", //post,get,put,delete
			url: 'getLetterNumber.php?letter='+s, // .com/cName/aName
			//contentType: "application/json"
			//data: JSON.stringify(dataToServer)
			success: function(e){
				$("#letterNumber").html(e);
			}
		})

	})
</script>
</html>