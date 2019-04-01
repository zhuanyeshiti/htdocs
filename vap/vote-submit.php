<!DOCTYPE html>
<html>
<a href="./vap.php" style="float:right;">return to vap</a>
<?php
$len=0;
$s=$_POST["title"];
$fp=fopen("./vote/$s.vote", "a");
$s=$_POST["text"];
$len=strlen($s);
$count=0;
if ($len) {
	fwrite($fp, "<$len>");
	fwrite($fp, "$s");
} else {
	echo "error";
}
$s=$_POST["selection1"];
$len=strlen($s);
if ($len) {
	fwrite($fp, "<$len>");
	fwrite($fp, "$s");
	$count=$count+1;
}
$s=$_POST["selection2"];
$len=strlen($s);
if ($len) {
	fwrite($fp, "<$len>");
	fwrite($fp, "$s");
	$count=$count+1;
}
$s=$_POST["selection3"];
$len=strlen($s);
if ($len) {
	fwrite($fp, "<$len>");
	fwrite($fp, "$s");
	$count=$count+1;
}
$s=$_POST["selection4"];
$len=strlen($s);
if ($len) {
	fwrite($fp, "<$len>");
	fwrite($fp, "$s");
	$count=$count+1;
}
$s=$_POST["selection5"];
$len=strlen($s);
if ($len) {
	fwrite($fp, "<$len>");
	fwrite($fp, "$s");
	$count=$count+1;
}
$s=$_POST["selection6"];
$len=strlen($s);
if ($len) {
	fwrite($fp, "<$len>");
	fwrite($fp, "$s");
	$count=$count+1;
}
$s=$_POST["selection7"];
$len=strlen($s);
if ($len) {
	fwrite($fp, "<$len>");
	fwrite($fp, "$s");
	$count=$count+1;
}
$s=$_POST["selection8"];
$len=strlen($s);
if ($len) {
	fwrite($fp, "<$len>");
	fwrite($fp, "$s");
	$count=$count+1;
}
$s=$_POST["selection9"];
$len=strlen($s);
if ($len) {
	fwrite($fp, "<$len>");
	fwrite($fp, "$s");
	$count=$count+1;
}
$s=$_POST["selection10"];
$len=strlen($s);
if ($len) {
	fwrite($fp, "<$len>");
	fwrite($fp, "$s");
	$count=$count+1;
}
//header("location:./vap.php");
fwrite($fp, "/");
for ($i=1; $i<=$count; $i++) {
	fwrite($fp, "<$i>0");
}
fwrite($fp, "/");
fclose($fp);
?>
</html>