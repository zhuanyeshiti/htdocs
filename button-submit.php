<!DOCTYPE html>
<html>
<a href="./index.php" style="float:right">return to index</a>
<?php
//$date=date(Y-m-d);
echo date("Y-m-d")."<br/>";
echo $_POST["title"];
echo "<br/>";
echo $_POST["text"];
$dir3=iconv("UTF-8", "GBK", date("Ymd"));
$file3=$_POST["title"];
if (!file_exists($dir3)) {
	mkdir($dir3, 0777, false);
}
$i=0;
$dir=opendir($dir3);
while ($d=readdir($dir)) {
	$i++;
}
closedir($dir);
if ($i <=10) {
	//echo "write to file";
	//echo $dir3;
	//echo $file3;
	//echo "</br>";
	$fp=fopen("$dir3/$file3", "a");
	//echo $fp;
	//echo "</br>";
	//echo 1;
	fwrite($fp, $_POST["text"]);
	fclose($fp);
} else {
	echo "</br>";
	echo "</br>";
	echo "</br>";
	echo "contents exceed limit";
	echo "</br>";
}
?>
</html>
