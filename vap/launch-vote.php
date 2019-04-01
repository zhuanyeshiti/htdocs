<?php
$password=$_GET["password"];
//$hash = '$2y$07$BCryptRequires22Chrcte/VlQH0piJtjXl.0t1XkA8pw9dMXTpOq';
$hash = '$2y$10$Z8dtIu/OXj.US1v9l7gpJuWoK.cXBQsyIhmWcekFkmYK.LUsN6rCm';
if (password_verify($password, $hash)) {
    //echo "valid";
	;
} else {
	//echo "invalid";
    header("location:./vap.php");
}
?>

<!DOCTYPE html>
<html>
<script>
function jumpreturn() {
	//alert("click");
	window.location.href="./vap.php";
}
function jumpvote() {
	window.location.href="./launch-vote.php";
}
</script>
<body style="padding-top:0px;margin-top:0px">
<div style="cursor:default;width:auto;padding-top:0px;margin-top:0px;background:orange;text-align:center;font-size:20px;color:black;">
<p style="padding-top:0px;margin-top:0px;-moz-user-select:none;-khtml-user-select:none;user-select:none">WELCOME TO MAIN PAGE</p>
<br/>
</div>
</body>
<button style="float:left;width:60px;" type="button" onclick="jumpreturn()">return</button>
<!--button style="float:right;width:60px;" type="button" onclick="jumpvote()">vote</button-->

<div style="width:90%;height:90%;margin:auto;text-align:center;background:#0ff">
<form action="vote-submit.php" method="post">
<textarea name="title" rows="1" cols="200" style="resize:none;font-size:24px;color:#f00;width:90%;border-width:2px">this_is_title...</textarea>
<br/>
<textarea name="text" rows="10" cols="200" style="resize:none;font-size:16px;color:#f00;width:90%">this is textarea...</textarea>
<br style="text-align:left;">selections</br>
<textarea name="selection1" rows="1" cols="200" style="resize:none;font-size:16px;color:#f00;width:90%"></textarea>
<br/>
<textarea name="selection2" rows="1" cols="200" style="resize:none;font-size:16px;color:#f00;width:90%"></textarea>
<br/>
<textarea name="selection3" rows="1" cols="200" style="resize:none;font-size:16px;color:#f00;width:90%"></textarea>
<br/>
<textarea name="selection4" rows="1" cols="200" style="resize:none;font-size:16px;color:#f00;width:90%"></textarea>
<br/>
<textarea name="selection5" rows="1" cols="200" style="resize:none;font-size:16px;color:#f00;width:90%"></textarea>
<br/>
<textarea name="selection6" rows="1" cols="200" style="resize:none;font-size:16px;color:#f00;width:90%"></textarea>
<br/>
<textarea name="selection7" rows="1" cols="200" style="resize:none;font-size:16px;color:#f00;width:90%"></textarea>
<br/>
<textarea name="selection8" rows="1" cols="200" style="resize:none;font-size:16px;color:#f00;width:90%"></textarea>
<br/>
<textarea name="selection9" rows="1" cols="200" style="resize:none;font-size:16px;color:#f00;width:90%"></textarea>
<br/>
<textarea name="selection10" rows="1" cols="200" style="resize:none;font-size:16px;color:#f00;width:90%"></textarea>
<br/>
<button type="submit">submit</button>
<br/>
</form>

</div>
</html>