<?php
		$price = isset($_REQUEST["batdau_dichvu"]) ? $_REQUEST["batdau_dichvu"] : "";
		$price1 = isset($_REQUEST["ketthuc_dichvu"]) ? $_REQUEST["ketthuc_dichvu"] : "";
		$description = isset($_REQUEST["mota_dichvu"]) ? $_REQUEST["mota_dichvu"] : "";
		$tinhtrang = isset($_REQUEST["trangthai_dichvu"]) ? $_REQUEST["trangthai_dichvu"] : "";
		$diadiem = isset($_REQUEST["diadiem_dichvu"]) ? $_REQUEST["diadiem_dichvu"] : "";
		$loaiphong = isset($_REQUEST["ten_dichvu"]) ? $_REQUEST["ten_dichvu"] : "";
		$gia_sudungdv = isset($_REQUEST["gia_sudungdv"]) ? $_REQUEST["gia_sudungdv"] : "";
	
	
	//Xử lý ảnh tải lên
		$src_logo0 = "imgsvr/";
		$file_tmp = isset($_FILES['anh_dichvu']['tmp_name']) ? $_FILES['anh_dichvu']['tmp_name'] : ""; //lưu đường dẫn của tệp tạm thời khi tải lên máy chủ
		$file_name = isset($_FILES['anh_dichvu']['name']) ? $_FILES['anh_dichvu']['name'] : ""; //lưu tên gốc của tập tin trên máy
		$file_type = isset($_FILES['anh_dichvu']['type']) ? $_FILES['anh_dichvu']['type'] : ""; //lưu kiểu của tệp tin 
		$file_size = isset($_FILES['anh_dichvu']['size']) ? $_FILES['anh_dichvu']['size'] : ""; //lưu kích thước của tệp tin 
		$file_error = isset($_FILES['anh_dichvu']['error']) ? $_FILES['anh_dichvu']['error'] : "";//lưu mã lỗi của tệp tin (nếu có)

		$ngaygioUpfile=date("y")."_".date("m")."_".date("d")."_".date("H")."h_".date("m")."m_".date("s")."s"; 
		$file__name=$ngaygioUpfile.$file_name;
		copy ( $file_tmp, $src_logo0.$file__name);
	
	
		
		$db="anh";
		$conn=new mysqli("localhost","root","",$db) or die ("Không connect đc với máy chủ");
		if (!empty($price) &&!empty($price1) && !empty($description)) {
	
			$sql_add="INSERT INTO `dichvu` ( `ten_dichvu`,`batdau_dichvu`,`ketthuc_dichvu`,`mota_dichvu`, `anh_dichvu`,`trangthai_dichvu`,`diadiem_dichvu`,`gia_sudungdv`) VALUES ('$loaiphong','$price','$price1','$description','$file__name','$tinhtrang','$diadiem','$gia_sudungdv')";


		mysqli_query($conn,$sql_add);	
		}	header("Location: indexadmin.php?danhmuc=danhsachdichvu");





?>