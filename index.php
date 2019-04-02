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
function jumpvap()
{
	window.location.href="./vap/vap.php";
}
function jumpnavig()
{
	window.location.href="./navig/navig.php";
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
<button class="button" style="width:60px" type="button" onclick="jumpwrite()">write</button>
<button style="float:left;width:60px;" type="button" onclick="jumpvap()">vap</button>
<button style="float:left;width:60px;position:relative;top:25px;left:-60px" type="button" onclick="jumpnavig()">vap2</button>
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
//echo password_hash("yimingjingren", PASSWORD_DEFAULT);
$path="./";
$dir=opendir($path);
$value1=0;
$value2=0;
$tmp;
$i=0;
$j=0;
$files=array();
while($d=readdir($dir)) {
	if(is_dir($d) && (($d!=".")&&($d!="..")&&($d!="vap")&&($d!="navig")&&($d!=".git"))) {
		//echo $d;
		//echo "</br>";
		$i++;
		$files[$i]=$d;
	}
}
$ii=0;
$jj=0;
for ($ii=$i; $ii>0; $ii--) {
	for ($jj=1; $jj<$ii; $jj++) {
		if ($files[$jj] < $files[$jj+1]) {
			$tmp = $files[$jj];
			$files[$jj] = $files[$jj+1];
			$files[$jj+1] = $tmp;
		}
	}
}
/*for($ii=1; $ii<=$i; $ii++) {
	//echo $files[$ii];
	//echo "</br>";
	;
}*/
//rewinddir($dir);
$ii=1;
while($d=$files[$ii]) {
	//echo $d;
	$ii++;
	if(is_dir($d) && (($d!=".")&&($d!="..")&&($d!="vap")&&($d!="navig")&&($d!=".git"))) {
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
//echo "<p style=display:block;width:100%;background:#0ff;-moz-user-select:none;-khtml-user-select:none;user-select:none></p>";
//echo "<a href='./vap/vap.php' style=display:block;width:100%;background:#0ff;-moz-user-select:none;-khtml-user-select:none;user-select:none>vote american president</a>";
closedir($dir);
?>
</div>
<!--a href="./vap/vap.php">show-contents</a-->
<!--br/-->
<!--textarea rows="10" cols="200" style="resize:none;font-size:34px;color:#f00;width:90%">this is textarea...</textarea-->
<br/>
<!--button type="submit">submit</button-->
</html>
