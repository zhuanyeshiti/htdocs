<!DOCTYPE HTML>
<html>
<!--a href="./index.php" style="float:right">return to index</a-->
<script>
function jumpreturn() {
	//alert("click");
	window.location.href="./index.php";
}
</script>
<body style="padding-top:0px;margin-top:0px">
<div style="cursor:default;width:auto;padding-top:0px;margin-top:0px;background:orange;text-align:center;font-size:20px;color:black;">
<p style="padding-top:0px;margin-top:0px;-moz-user-select:none;-khtml-user-select:none;user-select:none">WELCOME TO MAIN PAGE</p>
<br/>
</div>
</body>
<button style="float:left;width:60px;" type="button" onclick="jumpreturn()">return</button>

<?php
$hash = '$2y$07$BCryptRequires22Chrcte/VlQH0piJtjXl.0t1XkA8pw9dMXTpOq';
if (password_verify('rasmuslerdorf', $hash)) {
    ;
} else {
    ;
}
?>
<div style="width:90%;height:90%;margin:auto;text-align:left;background:#0ff">
<?php
echo $_GET["name"];
echo "</br>";
echo "</br>";
echo "</br>";
$path=$_GET["name"];
$fp=fopen($path, "r");
echo fread($fp, "9999");
fclose($fp);
?>
</div>

</html>