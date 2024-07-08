<?php
$username = $_POST['username'];
$password = $_POST['password'];
$full_name = $_POST['full_name'];
$email = $_POST['email'];
$db = "anh";

// Kết nối đến cơ sở dữ liệu
$conn = new mysqli("localhost", "root", "", $db) or die("Không connect được với máy chủ");

// Kiểm tra tài khoản trùng
$username_check = $username;
$email_check = $email;

$query = "SELECT * FROM acc WHERE username = '$username_check' OR email = '$email_check'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    echo "Tài khoản đã tồn tại.";
} else {
    $sql_add = "INSERT INTO `acc`(`username`, `password`, `email`, `full_name`) VALUES ('$username','$password','$email','$full_name')";
    mysqli_query($conn, $sql_add);
    header("Location: dangnhapclient.php");
}

// Đóng kết nối cơ sở dữ liệu
mysqli_close($conn);
?>
