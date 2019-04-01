<?php
$password=$_GET["password"];
//echo $password;
//$hash = '$2y$07$BCryptRequires22Chrcte/VlQH0piJtjXl.0t1XkA8pw9dMXTpOq';
$hash = '$2y$10$Z8dtIu/OXj.US1v9l7gpJuWoK.cXBQsyIhmWcekFkmYK.LUsN6rCm';
//if (password_verify('rasmuslerdorf', $hash)) {
if (password_verify($password, $hash)) {
    //echo "valid";
	;
} else {
	//echo "invalid";
    header("location:./index.php");
}
?>
<!DOCTYPE html>
<html>
<a href="./index.php" style="float:right">return to index</a>
<br/>
<form action="button-submit.php" method="post">
<textarea name="title" rows="1" cols="200" style="resize:none;font-size:34px;color:#f00;width:90%;border-width:2px">this_is_title...</textarea>
<br/>
<textarea name="text" rows="10" cols="200" style="resize:none;font-size:24px;color:#f00;width:90%">this is textarea...</textarea>
<br/>
<!--input type="text" name="text">uu</input-->
<!--input type="submit">iiii</input-->
<button type="submit">submit</button>
<br/>
</form>
</html>