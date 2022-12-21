<?php
	session_start();
	include "../config/db.php";

	
	$c_name = $_POST['c_name'];
	$c_owner = $_POST['c_owner'];
	$c_phone = $_POST['c_phone'];
	$postcode = $_POST['postcode'];
	$address = $_POST['address'];
	$detailAddress = $_POST['detailAddress'];
	$c_num = $_POST['c_num'];
	$c_wdate = date("Y-m-d H:i:s");
	$c_id = $_SESSION['id'];

		$tmpfile = $_FILES['c_thumbnail']['tmp_name']; //임시파일명으로 저장
	$o_name = $_FILES['c_thumbnail']['name']; //원래 파일명
	$file_size = $_FILES['c_thumbnail']['size'];
	$file_type = $_FILES['c_thumbnail']['type'];


	$filename = iconv("UTF-8","EUC-KR",$_FILES['c_thumbnail']['name']); //한글깨짐 방지 코드

	$file = explode(".",$filename); //.을 기준으로 분리하는 구문

	$file_name = $file[0];

	$file_ext = $file[1];


	$new_file_name = date("Y_m_d_H_i_s");
	$new_file_name1 = $new_file_name.".".$file_ext;

	$folder = "./upload/".$new_file_name1;

	move_uploaded_file($tmpfile,$folder);

	$sql = "insert into manage(c_name,c_owner,c_phone,postcode,address,detailaddress,c_num,c_thumbnail,c_wdate,c_id) 
	values('".$c_name."','".$c_owner."','".$c_phone."','".$postcode."','".$address."','".$detailAddress."','".$c_num."','".$new_file_name1."','".$c_wdate."','".$c_id."')";
	
	$result = mysqli_query($con,$sql);

?>

<script>
location.href="manage2.html";
</script>
