<?php
	$id=$_REQUEST["id_phong"];
	$conn=mysqli_connect("localhost","root","") or die ("Không connect đc với máy chủ");
	mysqli_select_db($conn,"anh") or die ("Không tìm thấy CSDL");
	$sql1="DELETE FROM `anhhh` WHERE `anhhh`.`id_phong`='$id'";
	mysqli_query($conn,$sql1);
    header('Location: indexadmin.php?danhmuc=danhsachphong');

?>

