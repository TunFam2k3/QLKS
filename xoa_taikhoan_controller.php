<?php 
session_name('admin');
session_start();
$db = "anh";
$id_hang0 = $_REQUEST["id"];
$conn = new mysqli("localhost", "root", "", $db) or die ("Không connect đc với máy chủ");

$sql_select = "SELECT * FROM acc WHERE id = '$id_hang0'";
$result = mysqli_query($conn, $sql_select);
$row = mysqli_fetch_assoc($result);

// Kiểm tra xem tài khoản là quản trị viên hay không
if ($row['role'] !== 'Quản trị viên') {
    $sql_delete = "DELETE nguoidung, acc FROM nguoidung 
                    INNER JOIN acc ON nguoidung.username = acc.username
                    WHERE acc.id = '$id_hang0'";
    mysqli_query($conn, $sql_delete);
    header('Location: indexadmin.php?danhmuc=danhsachtaikhoan');
} else {
	$_SESSION['error']="Tài khoản này không thể xóa";
	header('Location: indexadmin.php?danhmuc=danhsachtaikhoan');

}
?>
