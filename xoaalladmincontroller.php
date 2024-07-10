<?php
$servername = "localhost";
$username = "root";
$password = "Tunfam8303@";
$database = "anh";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

	$sql = "DELETE nguoidung, acc FROM nguoidung 
			INNER JOIN acc ON nguoidung.username = acc.username
        WHERE acc.role = 'Admin'";
if ($conn->query($sql) === TRUE) {
    header("Location:indexadmin.php?danhmuc=danhsachtaikhoan");
} else {
    echo "Lỗi: " . $conn->error;
}

$conn->close();
?>
