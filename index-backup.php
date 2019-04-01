<!DOCTYPE html>
<html>
<head>
<link type="text/css" rel="stylesheet" href="./layout.css"></link>
<script>
function jumpwrite()
{
	var password = prompt("输入密码");
	alert("如密码错误会停留在此页面");
	window.location.href="./button-write.php?password=" + password;
}
function clickdir(e)
{
	//var id = document.getElementById(e.id).style.display = "none";
	var tmp;
	var value = document.getElementById(e.id).innerText;
	if (value.charAt(value.length - 1) == "+") {
		//alert(value.charAt(value.length - 1));
		tmp = value.substr(0, value.length - 1);
		//alert(tmp);
		document.getElementById(e.id).innerText = tmp + "-";
		for (var i=1; i<10; i++) {
			//alert(i);
			document.getElementById(e.id * 10 + i).style.display = "block";
		}
	} else if (value.charAt(value.length - 1) == "-") {
		//alert(value.charAt(value.length - 1));
		tmp = value.substr(0, value.length - 1);
		//alert(tmp);
		document.getElementById(e.id).innerText = tmp + "+";
		for (var i=1; i<10; i++) {
			document.getElementById(e.id * 10 + i).style.display = "none";
		}
	} else {
		alert("error");
	}
	//var value2 = document.getElementById(e.id).innerText = value + "-";
	//alert(e.id);
}
</script>
</head>
<body style="padding-top:0px;margin-top:0px">
<div class="div1" style="cursor:default">
<p class="p" style="-moz-user-select:none;-khtml-user-select:none;user-select:none">WELCOME TO MAIN PAGE</p>
<br/>
</div>
</body>
<button class="button" type="button" onclick="jumpwrite()">write</button>
<!--br/-->
<div style="width:90%;height:90%;margin:auto;text-align:center;background:#0ff">
<!--a href="./article1.html">article1</a>
<br/>
<a href="./article2.html">article2</a>
<br/>
<a href="./article3.php">article3</a>
<br/-->
<?php
//echo "jjjj";
//echo readfile("tmp.txt");
$path="./";
$dir=opendir($path);
$value1=0;
$value2=0;
$tmp;
$i=0;
$j=0;
while($d=readdir($dir)) {
	if(is_dir($d) && (($d!=".")&&($d!=".."))) {
		//echo $d;
		//echo "</br>";
		$i++;
	}
}
rewinddir($dir);
while($d=readdir($dir)) {
	//echo $d;
	if ($i == 0) {
		break;
	}
	if(is_dir($d) && (($d!=".")&&($d!=".."))) {
		$j++;
		if ($j == $i) {
			$j=0;
			$i--;
			rewinddir($dir);
		} else {
			continue;
		}
	}
	if(is_dir($d) && (($d!=".")&&($d!=".."))) {
		$value1++;
		$value2=0;
		if ($value1 == 1) {
			echo "<p onclick=clickdir(this) style=cursor:pointer;margin:0px;background:green;width:120px;-moz-user-select:none;-khtml-user-select:none;user-select:none id=$value1>$d-</p>";
		} else {
			echo "<p onclick=clickdir(this) style=cursor:pointer;margin:0px;background:green;width:120px;-moz-user-select:none;-khtml-user-select:none;user-select:none id=$value1>$d+</p>";
		}
		//echo $d;
		//echo "<br/>";
		//echo "<a href=$d/article1.html>article1</a>";
		//echo "<br/>";
		$dir2=opendir($d);
		echo "<div style=width:auto;margin-left:40px>";
		while($f=readdir($dir2)) {
			if(is_file("$d/$f")) {
				$value2++;
				$tmp=$value1*10+$value2;
				if ($value1 == 1) {
					echo "<a href='./show-contents.php?name=$d/$f' style=display:block;width:90%;background:yellow;-moz-user-select:none;-khtml-user-select:none;user-select:none id=$tmp>$f</a>";
				} else {
					echo "<a href='./show-contents.php?name=$d/$f' style=display:none;width:90%;background:yellow;-moz-user-select:none;-khtml-user-select:none;user-select:none id=$tmp>$f</a>";
				}
				//echo "<br style=display:none />";
			}
		}
		echo "</div>";
		closedir($dir2);
	}
}
closedir($dir);
?>
</div>
<!--a href="./show-contents.php?name=123">show-contents</a-->
<!--br/-->
<!--textarea rows="10" cols="200" style="resize:none;font-size:34px;color:#f00;width:90%">this is textarea...</textarea-->
<br/>
<!--button type="submit">submit</button-->
</html>
