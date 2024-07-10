<?php
		$email = isset($_REQUEST["email"]) ? $_REQUEST["email"] : "";
		$description = isset($_REQUEST["noidung_phanhoi"]) ? $_REQUEST["noidung_phanhoi"] : "";
		$tenkhach = isset($_REQUEST["tenkhach"]) ? $_REQUEST["tenkhach"] : "";
		$chude = isset($_REQUEST["loai_phanhoi"]) ? $_REQUEST["loai_phanhoi"] : "";
		
		$thoigian = date('Y-m-d H:i:s');

        
	
	
	
	
		
		$db="anh";
		$conn=new mysqli("localhost","root","",$db) or die ("Không connect đc với máy chủ");
		if (!empty($email) &&!empty($tenkhach) && !empty($description)) {
	
			$sql_add="INSERT INTO `phanhoi` ( `tenkhach`,`email`,`thoigian_phanhoi`,`noidung_ phanhoi`, `loai_phanhoi`) VALUES ('$tenkhach','$email','$thoigian','$description','$chude')";


		mysqli_query($conn,$sql_add);	
		}	header("Location: lienhe.php");





?>