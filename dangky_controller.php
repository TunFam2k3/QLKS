<?php
$username = $_POST['username'];
$password = $_POST['password'];
$full_name = $_POST['full_name'];
$email = $_POST['email'];
$db = "anh";

$conn = new mysqli("localhost", "root", "", $db) or die("Không connect được với máy chủ");

$username_check = $username;
$email_check = $email;

$query = "SELECT * FROM acc WHERE username = '$username_check' OR email = '$email_check'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    echo "Tài khoản đã tồn tại.";
} else {
    $sql_add = "INSERT INTO `acc`(`username`, `password`, `email`, `full_name`,`role`,`trangthai`) VALUES ('$username','$password','$email','$full_name','User','<span style=\"color: rgba(255,35,38,1.00);\">Chưa giao dịch</span>')";
	$sql = "INSERT INTO nguoidung (username, hoten, ngaysinh, sdt, diachi, gioitinh)
VALUES ('$username', '$full_name', '', '', '', '')";
    mysqli_query($conn, $sql_add);
    mysqli_query($conn, $sql);
    header("Location: dangnhapclient.php");
}

mysqli_close($conn);
?>
