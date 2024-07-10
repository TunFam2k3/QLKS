<?php
session_name('client');
session_start();

$host = "localhost";
$username = "root";
$password = "Tunfam8303@";
$database = "anh";

$conn = new mysqli($host, $username, $password, $database) or die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
$phongId = $_GET["id_phong"];
$loaiphong=$_GET["loaiphong"];
$tenkhach = $_POST["tenkhach"];
$ngayden = $_POST["ngayden"];
$ngaydi = $_POST["ngaydi"];
$soluong = $_POST["soluongnguoi"];
$diadiem=$_GET['diadiem'];
$username = $_SESSION['userclient'];
$tinhtrangthanhtoan='chuathanhtoan';
$pricetempt = $_GET["price"];
$ngaydentinh = new DateTime($ngayden);
$ngayditinh = new DateTime($ngaydi);

$ngayhientai = date("Y-m-d");
    $soNgay = $ngaydentinh->diff($ngayditinh)->days;

if($soNgay==0){
	$soNgay=1;
}
$price=$soNgay*$pricetempt;
try {
    $check_phong = "SELECT * FROM anhhh WHERE id = '$phongId' AND tinhtrang = 'Còn trống'";
    $result = $conn->query($check_phong);
    $sql_insert_datphong = "INSERT INTO `datphong`(`id_phong`, `username`, `tenkhach`,`ngaydat`, `ngayden`, `ngaydi`, `soluongnguoi`, `diadiem`, `price`, `loaiphong`, `trangthaithanhtoan`) VALUES ('$phongId','$username', '$tenkhach', '$ngayhientai','$ngayden', '$ngaydi','$soluong','$diadiem','$price','$loaiphong','$tinhtrangthanhtoan')";
	$updateQuery = "UPDATE acc SET `trangthai` = '<span style=\"color: #00CD00;\">Đang giao dịch</span>' 
                    WHERE `username` = '$username_datphong'";
	
    $conn->query($sql_insert_datphong);
    $conn->query($updateQuery);

	header("Location: dienthongtinnguoidung.php?xuli=lsdp");
     
} catch (Exception $e) {
    echo "Có lỗi xảy ra: " . $e->getMessage();
}

$conn->close();
?>

