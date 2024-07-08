<?php
		$id_hang0 = $_REQUEST['id'] ;
        $db = "anh";
		if(!empty($id_hang0)){
        $conn = new mysqli("localhost", "root", "", $db) or die("Không connect đc với máy chủ");
        $update_query = "UPDATE `acc` SET`role`='Admin' WHERE `id`='$id_hang0'";
        mysqli_query($conn, $update_query);
        mysqli_close($conn);

        header("Location: danhsachtaikhoan.php");}
		else{
			echo "loi";
		}
?>
