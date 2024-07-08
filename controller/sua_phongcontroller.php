<?php

		$id_hang1=$_REQUEST["id"];
		$price = isset($_REQUEST["price"]) ? $_REQUEST["price"] : "";
		$description = isset($_REQUEST["description"]) ? $_REQUEST["description"] : "";
	
	
	//Xử lý ảnh tải lên
		$src_logo0 = "images/";
		$file_tmp = isset($_FILES['anhphongmoi']['tmp_name']) ? $_FILES['anhphongmoi']['tmp_name'] : ""; 
		$file_name = isset($_FILES['anhphongmoi']['name']) ? $_FILES['anhphongmoi']['name'] : ""; 
		$file_type = isset($_FILES['anhphongmoi']['type']) ? $_FILES['anhphongmoi']['type'] : ""; 
		$file_size = isset($_FILES['anhphongmoi']['size']) ? $_FILES['anhphongmoi']['size'] : ""; 
		$file_error = isset($_FILES['anhphongmoi']['error']) ? $_FILES['anhphongmoi']['error'] : "";

		$ngaygioUpfile=date("y")."_".date("m")."_".date("d")."_".date("H")."h_".date("m")."m_".date("s")."s"; //Lay gio cua he thong
		$file__name=$ngaygioUpfile.$file_name;
		move_uploaded_file( $file_tmp, $src_logo0.$file__name);
	
	
		$db="anh";
		$conn=new mysqli("localhost","root","",$db) or die ("Không connect đc với máy chủ");//tạo kết nối với server
		if (!empty($price) && !empty($description)) {
	
    	$sql_insert_hangxs = "UPDATE `anhhh` SET `price`='$price', `description`='$description', `anhphong`='$file__name' WHERE `id`=$id_hang1";

		if ($conn->query($sql_insert_hangxs) === TRUE) {
			header("Location: danhsachphongsauadd.php");
		} else {
			echo "Lỗi trong quá trình cập nhật: " . $conn->error;
		}
    $conn->close();
	} else {
		echo "Vui lòng điền đầy đủ thông tin.";
	}



	?>
   


