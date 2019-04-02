<!DOCTYPE html>
<html>
<script>
function jumpreturn() {
	window.location.href="./vap.php";
}
</script>
<body style="padding-top:0px;margin-top:0px">
<div style="cursor:default;width:auto;padding-top:0px;margin-top:0px;background:orange;text-align:center;font-size:20px;color:black;">
<p style="padding-top:0px;margin-top:0px;-moz-user-select:none;-khtml-user-select:none;user-select:none">WELCOME TO MAIN PAGE</p>
<br/>
</div>
</body>
<button style="float:left;width:60px;" type="button" onclick="jumpreturn()">return</button>

<div style="width:90%;height:90%;margin:auto;text-align:left;background:#0ff">
<?php
echo "题目: ";
echo $_GET["name"];
echo "</br>";
echo "</br>";
$f=$_GET["name"];
//$len=strlen($f);
//echo $len;
$fd=fopen("./vote/$f", "r");
$i=0;
$count=0;
while(true) {
	$char=fread($fd, "1")
	//echo $char;
	if ($char == "<") {
		$count=0;
	}
	if ($char == ">") {
		//echo $count;
		break;
	}
	if ($char == "/") {
		break;
	}
	$count=intval($count)*10+intval($char);
}
if ($char != "/") {
	if ($count == 0) {
		;
	} else {
		echo "正文：";
		$s=fread($fd, "$count");
		echo $s;
		echo "</br>";
		echo "</br>";
	}
}
//echo fread($fd, "9999");

echo "<form action='show-vote2.php?title=$f' method='post'>";
while(true) {
	$i=$i+1;
	while(true) {
		$char=fread($fd, "1")
		//echo $char;
		if ($char == "<") {
			$count=0;
		}
		if ($char == ">") {
			//echo $count;
			break;
		}
		if ($char == "/") {
			break;
		}
		$count=intval($count)*10+intval($char);
	}
	if ($char != "/") {
		if ($count == 0) {
			;
		} else {
			echo "选择：";
			$s=fread($fd, "$count");
			if ($i == 1) {
				echo "<input type='radio' name='selection' value='$i' checked>$s</input>";
			} else {
				echo "<input type='radio' name='selection' value='$i'>$s</input>";
			}
			//echo $s;
			echo "</br>";
		}
	} else {
		break;
	}
}
echo "<button type='submit'>提交</button>";
echo "</form>";
//$sss="我是谁";
//echo strlen($sss);
fclose($fd);
?>
</div>
</html>