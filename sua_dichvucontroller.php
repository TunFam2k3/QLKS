<?php

		$id_hang1=$_REQUEST["id_dichvu"];
		$price = isset($_REQUEST["batdau_dichvu"]) ? $_REQUEST["batdau_dichvu"] : "";
		$price1 = isset($_REQUEST["ketthuc_dichvu"]) ? $_REQUEST["ketthuc_dichvu"] : "";
		$description = isset($_REQUEST["mota_dichvu"]) ? $_REQUEST["mota_dichvu"] : "";
		$tinhtrang = isset($_REQUEST["trangthai_dichvu"]) ? $_REQUEST["trangthai_dichvu"] : "";

	
		$src_logo0 = "imgsvr/";
		$file_tmp = isset($_FILES['anhdichvumoi']['tmp_name']) ? $_FILES['anhdichvumoi']['tmp_name'] : ""; 
		$file_name = isset($_FILES['anhdichvumoi']['name']) ? $_FILES['anhdichvumoi']['name'] : ""; 
		$file_type = isset($_FILES['anhdichvumoi']['type']) ? $_FILES['anhdichvumoi']['type'] : ""; 
		$file_size = isset($_FILES['anhdichvumoi']['size']) ? $_FILES['anhdichvumoi']['size'] : ""; 
		$file_error = isset($_FILES['anhdichvumoi']['error']) ? $_FILES['anhdichvumoi']['error'] : "";

		$ngaygioUpfile=date("y")."_".date("m")."_".date("d")."_".date("H")."h_".date("m")."m_".date("s")."s"; 
		$file__name=$ngaygioUpfile.$file_name;
		move_uploaded_file( $file_tmp, $src_logo0.$file__name);
	
	
		$db="anh";
		$conn=new mysqli("localhost","root","",$db) or die ("Không connect đc với máy chủ");
	
    	$sql_insert_hangxs = "UPDATE `dichvu` SET `batdau_dichvu`='$price',`ketthuc_dichvu`='$price1', `mota_dichvu`='$description', `anh_dichvu`='$file__name' WHERE `id_dichvu`=$id_hang1";

		if ($conn->query($sql_insert_hangxs) === TRUE) {
			header("Location: indexadmin.php?danhmuc=danhsachdichvu");
		} else {
			echo "Lỗi trong quá trình cập nhật: " . $conn->error;
		}
    $conn->close();
	



	?>
   


