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
/////////////////////////////////////////////////
$f=$_GET["title"];
$fp=fopen("./vote/$f", "r");
$fp2=fopen("./vote/$f.tmp", "a");
while (true) {
	$char=fread($fp, "1");
	//echo $char;
	if ($char != "/") {
		fwrite($fp2, $char);
	} else {
		fwrite($fp2, $char);
		break;
	}
}
$ary=array();
$count=0;
$value=0;
while (true) {
	while (true) {
		$char=fread($fp, "1");
		//echo $char."</br>";
		if ($char == "<") {
			$count=0;
			continue;
		}
		if ($char == ">") {
			break;
		}
		if ($char == "/") {
			break;
		}
		$count=intval($count)*10+intval($char);
	}
	if ($char == "/") {
		break;
	}
	$value=0;
	//fwrite($fp2, "test");
	while (true) {
		$char=fread($fp, "1");
		//echo $char."</br>";
		if (($char != "<") && ($char != "/")) {
			$value=intval($value)*10+intval($char);
		} else {
			$position=ftell($fp);
			fseek($fp, -1, SEEK_CUR);
			break;
		}
	}
	$ary[$count]=$value;
	if ($char == "/") {
		break;
	}	
	//echo $count;
	//echo "</br>";
	//echo $value;
	//echo "</br>";
}
//echo "</br>";
//echo $count;
for ($i=1; $i<=$count; $i++) {
	//echo $_POST["selection"]."</br>";
	if ($i == $_POST["selection"]) {
		$ary[$i]=$ary[$i]+1;
	}
	fwrite($fp2, "<$i>$ary[$i]");
}
fwrite($fp2, "/");
fclose($fp);
fclose($fp2);
rename("./vote/$f.tmp", "./vote/$f");
//////////////////////////////////////////////////////
echo "题目: ";
echo $_GET["title"];
//echo $_POST["selection"];
echo "</br>";
echo "</br>";
$f=$_GET["title"];
//$len=strlen($f);
//echo $len;
$ft=fopen("./vote/$f", "r");
$itmp=0;
$count=0;
$iarray=array();
while($char=fread($ft, "1")) {
	if ($char == "/") {
		break;
	}
}
while(true) {
	$itmp=$itmp+1;
	while($char=fread($ft, "1")) {
		if ($char == "<") {
			$count=0;
		}
		if ($char == ">") {
			break;
		}
		if ($char == "/") {
			break;
		}
	}
	while(true) {
		$char=fread($ft, "1");
		//echo $char;
		//echo "</br>";
		if (($char != "<") && ($char != "/")) {
			$count=intval($count)*10+intval($char);
		} else if ($char == "<") {
			$position=ftell($ft);
			fseek($ft, -1, SEEK_CUR);
			break;
		} else {
			break;
		}
	}
	$iarray[$itmp]=$count;
	//echo $count;
	//echo "</br>";
	if ($char != "/") {
		;
	} else {
		break;
	}
}
fclose($ft);

$fd=fopen("./vote/$f", "r");
$i=0;
$count=0;
while($char=fread($fd, "1")) {
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

while(true) {
	$i=$i+1;
	while($char=fread($fd, "1")) {
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
			//echo "选择：";
			$s=fread($fd, "$count");			
			$j=0;
			$tmp="-";
			for ($j=0; $j<$iarray[$i]; $j++) {
				$tmp=$tmp."-";
				if (strlen($s.$tmp)>150) {
					break;
				}
			}
			$tmp=$tmp.$iarray[$i];
			//echo $tmp;
			echo "<div style='padding-top:0px;padding-bottom:0px;margin-top:0px;margin-bottom:0px;margin-left:0px;'><h>选择：</h><h style='padding-top:0px;padding-bottom:0px;margin-top:0px;margin-bottom:0px;background:yellow;'>$s$tmp</h></div>";
			//echo "</br>";
		}
	} else {
		break;
	}
}
echo "</br>";
//$sss="我是谁";
//echo strlen($sss);
fclose($fd);
?>
</div>
</html>