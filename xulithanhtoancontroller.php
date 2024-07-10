<?php
$db = "anh";
$conn = new mysqli("localhost", "root", "Tunfam8303@", $db) or die ("Không connect được với máy chủ");

$id_giaodich = $_GET['id'];
$id_phong = $_GET['id_phong'];

// // Đảm bảo rằng giá trị của id_giaodich và id_phong là an toàn
// $id_giaodich = mysqli_real_escape_string($conn, $id_giaodich);
// $id_phong = mysqli_real_escape_string($conn, $id_phong);

$update_query = "UPDATE `datphong` SET `trangthaithanhtoan` = 'dathanhtoan' WHERE `id` = '$id_giaodich'";
$sql_update_phong = "UPDATE anhhh SET tinhtrang = 'Đã đặt' WHERE id_phong = '$id_phong'";

if (mysqli_query($conn, $update_query) && mysqli_query($conn, $sql_update_phong)) {
    mysqli_close($conn);
    header("Location: dienthongtinnguoidung.php?xuli=lsdp");
    exit;
} else {
    echo "Lỗi khi cập nhật trạng thái thanh toán hoặc trạng thái phòng: ";
}

mysqli_close($conn);
?>
