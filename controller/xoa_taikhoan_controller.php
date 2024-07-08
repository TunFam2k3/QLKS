
	<?php 
	$db="anh";
	$id_hang0=$_REQUEST["id"];
	$conn=new mysqli("localhost","root","",$db) or die ("Không connect đc với máy chủ");
	$sql_delete= "DELETE FROM acc WHERE `acc`.`id` = $id_hang0";
	mysqli_query($conn, $sql_delete);
	//Sau khi xóa sẽ trở lại trang danh sách
	header("Location: danhsachtaikhoan.php");
	

	?>
