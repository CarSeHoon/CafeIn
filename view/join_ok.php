<?php
	include "../config/db.php";
	include "../password.php";

	$user_id = $_POST['user_id'];
	$user_pass = $_POST['user_pass'];
	$user_pass1 = $_POST['user_pass1'];

	if ($user_pass != $user_pass1) {
		echo "<script>alert('비밀번호가 일치하지 않습니다.');history.back();</script>";
	}
	$user_pass = password_hash($user_pass,PASSWORD_DEFAULT);

	$user_name = $_POST['user_name'];
	$postcode = $_POST['postcode'];
	$user_address1 = $_POST['user_address1'];
	$user_address2 = $_POST['user_address2'];
	$user_email = $_POST['user_email'];
	$user_phone = $_POST['user_phone'];
	$user_wdate = date("Y-m-d H:i:s");
	
	$id_check = "select * from join2 where user_id='".$user_id."'";
	$result = mysqli_query($con,$id_check);
	$row = mysqli_fetch_array($result);
	if($row >= 1) {
		echo "<script>alert('중복된 아이디입니다.');history.back();</script>";
	} else {


	$sql = "insert into join2(user_id,user_pass,user_name,postcode,user_address1,user_address2,user_email,user_phone,user_wdate)
	values('".$user_id."','".$user_pass."','".$user_name."','".$postcode."','".$user_address1."','".$user_address2."','".$user_email."','".$user_phone."','".$user_wdate."')";

	$result = mysqli_query($con,$sql);

	echo $sql;
	?>
	
	<script>
	alert("회원가입이 완료되었습니다.");
	location.href="/CafeIn/";
	</script>
	<?php
	}
	?>