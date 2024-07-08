
	<?php 
	$db="anh";
	$id_hang0=$_REQUEST["id"];
	$conn=new mysqli("localhost","root","",$db) or die ("Không connect đc với máy chủ");
	$sql_delete= "DELETE nguoidung, acc FROM nguoidung 
			INNER JOIN acc ON nguoidung.username = acc.username
        WHERE acc.`id` = '$id_hang0'";
	mysqli_query($conn, $sql_delete);
    header('Location: indexadmin.php?danhmuc=danhsachtaikhoan');
	

	?>
