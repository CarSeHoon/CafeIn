<?php
	include "../config/db.php";

	$user_id = $_POST['user_id'];
	$sql = "select * from join2 where user_id='".$user_id."'";
	echo $sql;
	$result = mysqli_query($con, $sql);

	$row = mysqli_fetch_array($result);

	if($row >= 1) {
		echo "존재하는 아이디입니다.";
	} else {
		echo "사용하실 수 있는 아이디입니다.";
	}
?>