<!DOCTYPE html>
<html>
<script>
function jumpreturn() {
	//alert("click");
	window.location.href="../index.php";
}
function jumpvote() {
	var password = prompt("输入密码");
	alert("如密码错误会停留在此页面");
	window.location.href="./launch-vote.php?password=" + password;
}
</script>
<body style="padding-top:0px;margin-top:0px">
<div style="cursor:default;width:auto;padding-top:0px;margin-top:0px;background:orange;text-align:center;font-size:20px;color:black;">
<p style="padding-top:0px;margin-top:0px;-moz-user-select:none;-khtml-user-select:none;user-select:none">WELCOME TO MAIN PAGE</p>
<br/>
</div>
</body>
<button style="float:left;width:60px;" type="button" onclick="jumpreturn()">return</button>
<button style="float:right;width:60px;" type="button" onclick="jumpvote()">vote</button>

<div style="width:90%;height:90%;margin:auto;text-align:center;background:#0ff">
<?php
//echo $_SERVER['REMOTE_PORT'];
//echo "</br>";
//echo $_SERVER['REMOTE_ADDR'];
//echo "</br>";
//echo $_SERVER['SERVER_PORT'];
//echo "</br>";
//echo $_SERVER['SERVER_ADDR'];
$path="./vote/";
$dir=opendir($path);
while($d=readdir($dir)) {
	if (substr($d, -5)==".vote") {
		//echo "</br>";
		//echo $d;
		echo "<a href='./show-vote.php?name=$d' style=text-align:center;display:block;width:100%;background:#0ff;-moz-user-select:none;-khtml-user-select:none;user-select:none>$d</a>";
	}
}
?>
</div>

</html>

