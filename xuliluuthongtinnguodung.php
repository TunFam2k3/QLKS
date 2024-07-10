<?php
session_name('client');
session_start();
$servername = "localhost";
$username = "root";
$password = "Tunfam8303@";
$dbname = "anh"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

$tenDangNhap = $_SESSION['userclient']; 
$hoTen = $_POST["name"];
$ngaySinh = $_POST["ngaysinh"];
$soDienThoai = $_POST["phone"];
$diaChi = $_POST["address"];
$gioiTinh = $_POST["gender"];

$sql = "UPDATE `nguoidung` SET `hoten`='$hoTen',`ngaysinh`='$ngaySinh',`gioitinh`='$gioiTinh',`sdt`='$soDienThoai',`diachi`='$diaChi' WHERE `username`='$tenDangNhap'";

if ($conn->query($sql) === TRUE) {
    echo "Lưu thông tin cá nhân thành công!";
} else {
    echo "Lỗi: " . $sql . "<br>" . $conn->error;
}
header("location:dienthongtinnguoidung.php");
$conn->close();
?>
