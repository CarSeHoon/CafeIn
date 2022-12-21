<?php
	session_start();
	include "../config/db.php";
	
	$postcode = $_POST['postcode'];
	$user_address1 = $_POST['user_address1'];
	$user_address2 = $_POST['user_address2'];
	$user_email = $_POST['user_email'];
	$user_phone = $_POST['user_phone'];

	$sql = "update join2 set postcode = '".$postcode."',user_address1 = '".$user_address1."',user_address2 = '".$user_address2."',user_email = '".$user_email."',user_phone = '".$user_phone."'
	where user_id = '".$_SESSION['id']."'";

	$result = mysqli_query($con,$sql);


?>
<script>
alert('정보를 수정하였습니다.');
location.href="/CafeIn/";
</script>