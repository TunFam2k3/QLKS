<?php

		$id_hang1=$_REQUEST["id_phong"];
		$price = isset($_REQUEST["price"]) ? $_REQUEST["price"] : "";
		$description = isset($_REQUEST["description"]) ? $_REQUEST["description"] : "";
		$tinhtrang = isset($_REQUEST["description"]) ? $_REQUEST["description"] : "";

	
		$src_logo0 = "images/";
		$file_tmp = isset($_FILES['anhphongmoi']['tmp_name']) ? $_FILES['anhphongmoi']['tmp_name'] : ""; 
		$file_name = isset($_FILES['anhphongmoi']['name']) ? $_FILES['anhphongmoi']['name'] : ""; 
		$file_type = isset($_FILES['anhphongmoi']['type']) ? $_FILES['anhphongmoi']['type'] : ""; 
		$file_size = isset($_FILES['anhphongmoi']['size']) ? $_FILES['anhphongmoi']['size'] : ""; 
		$file_error = isset($_FILES['anhphongmoi']['error']) ? $_FILES['anhphongmoi']['error'] : "";

		$ngaygioUpfile=date("y")."_".date("m")."_".date("d")."_".date("H")."h_".date("m")."m_".date("s")."s"; 
		$file__name=$ngaygioUpfile.$file_name;
		move_uploaded_file( $file_tmp, $src_logo0.$file__name);
	
	
		$db="anh";
		$conn=new mysqli("localhost","root","",$db) or die ("Không connect đc với máy chủ");
	
    	$sql_insert_hangxs = "UPDATE `anhhh` SET `price`='$price', `description`='$description', `anhphong`='$file__name' WHERE `id_phong`=$id_hang1";

		if ($conn->query($sql_insert_hangxs) === TRUE) {
			header("Location: indexadmin.php?danhmuc=danhsachphong");
		} else {
			echo "Lỗi trong quá trình cập nhật: " . $conn->error;
		}
    $conn->close();
	



	?>
   


