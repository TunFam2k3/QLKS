<?php
$db = "anh";
$conn = new mysqli("localhost", "root", "", $db) or die ("Không connect đc với máy chủ");

if (isset($_GET['id'])) {
    $iddatphong = $_GET['id'];

   // $deleteQuery = "DELETE FROM `datphong` WHERE `id` = $iddatphong";
	$update_query = "UPDATE `datphong` SET `trangthaithanhtoan` = 'dahuy' WHERE `id` = '$iddatphong'";
    if ( mysqli_query($conn, $update_query)) {
            header("Location: dienthongtinnguoidung.php?xuli=lsdp");

    } else {
        echo "Lỗi: " ;
    }
    mysqli_close($conn);
}
?>
