<?php
	include "../config/db.php";

	$menu_price_val = $_POST['menu_price_val'];
	$menu_name = $_POST["menu_name"];

	$count1 = count($_POST["menu_name"]);
	for ($i=0; $i<$count1; $i++) {
		$menu_name[$i];
	}

	$menu_price = $_POST["menu_price"];
	$count2 = count($_POST["menu_price"]);
	for ($i=0; $i<$count2; $i++) {
		$menu_price[$i];
	}


	$menu_price = $_POST['menu_price'];
	$c_open = $_POST['c_open'];
	$c_close = $_POST['c_close'];
	$c_break = $_POST['c_break'];
	$c_break2 = $_POST['c_break2'];
	$c_rehol = $_POST['c_rehol'];
	$in_park = $_POST['in_park'];
	$val_park = $_POST['val_park'];
	$input_check = $_POST['input_check'];
	$c_wdate = date("Y-m-d H:i:s");
	$c_id = $_SESSION['id'];
	
	
	
	$files = $_FILES["menu_img"];
	$count = count($files["name"]);
			
	$upload_dir = 'upload/';  #경로

	for ($i=0; $i<$count; $i++)
	{
		$upfile_name[$i]     = $files["name"][$i];
		$upfile_tmp_name[$i] = $files["tmp_name"][$i];
		$upfile_type[$i]     = $files["type"][$i];

		
		$upfile_size[$i]     = $files["size"][$i];
		$upfile_error[$i]    = $files["error"][$i];
      
	
		$file = explode(".", $upfile_name[$i]);
		$file_name = $file[0];
		$file_ext  = $file[1];

		if (!$upfile_error[$i])
		{
			$new_file_name = date("Y_m_d_H_i_s");
			$new_file_name = $new_file_name."_".$i;
			$copied_file_name[$i] = $new_file_name.".".$file_ext;      
			$uploaded_file[$i] = $upload_dir.$copied_file_name[$i];

			if( $upfile_size[$i]  > 51200000 ) {
				echo("
				<script>
				alert('업로드 파일 크기가 지정된 용량(5MB)을 초과합니다!<br>파일 크기를 체크해주세요! ');
				history.go(-1)
				</script>
				");
				exit;
			}

			if ( ($upfile_type[$i] != "image/gif") &&
				($upfile_type[$i] != "image/jpg") &&
				($upfile_type[$i] != "image/png") &&
				($upfile_type[$i] != "image/bmp") &&
				($upfile_type[$i] != "application/pdf") &&
				($upfile_type[$i] != "application/hwp") &&
				($upfile_type[$i] != "application/octet-stream") &&
				($upfile_type[$i] != "image/jpeg") )
			{
				echo("
					<script>
						alert('업로드가 불가능한 확장자입니다.!');
						history.go(-1)
					</script>
					");
				exit;
			}

			if (!move_uploaded_file($upfile_tmp_name[$i], $uploaded_file[$i]) )
			{
				echo("
					<script>
					alert('파일을 지정한 디렉토리에 복사하는데 실패했습니다.');
					history.go(-1)
					</script>
				");
				exit;
			}
		}
	}

$sql = "insert into manage2 (menu_price_val,menu_name_0,menu_name_1,menu_name_2,menu_name_3,menu_name_4,menu_price_0,menu_price_1,menu_price_2,menu_price_3,menu_price_4,file_copied_0,file_copied_1,file_copied_2,file_copied_3,file_copied_4,c_open,c_close,c_break,c_break2,c_rehol,in_park,val_park,input_check,c_wdate,c_id)
values ('".$menu_price_val."','".$menu_name[0]."','".$menu_name[1]."','".$menu_name[2]."','".$menu_name[3]."','".$menu_name[4]."','".$menu_price[0]."','".$menu_price[1]."','".$menu_price[2]."','".$menu_price[3]."','".$menu_price[4]."','".$copied_file_name[0]."','".$copied_file_name[1]."','".$copied_file_name[2]."','".$copied_file_name[3]."','".$copied_file_name[4]."','".$c_open."','".$c_close."','".$c_break."','".$c_break2."','".$c_rehol."','".$in_park."','".$val_park."','".$input_check."','".$c_wdate."','".$c_id."')";

 $result = mysqli_query($con,$sql);


	
?>

<script>
alert("업체 등록을 완료하였습니다.");
location.href="/CafeIn/";
</script>
