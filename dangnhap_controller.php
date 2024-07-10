<?php
session_name('client');
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$db = "anh";
$conn = new mysqli("localhost", "root", "Tunfam8303@", $db) or die("Không connect được với máy chủ");

$select = "SELECT * FROM `acc` WHERE `username` = '$username' AND `password` = '$password'";
$result = mysqli_query($conn, $select);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    if ($row['trangthai'] == 'Đã khóa') {
        $_SESSION['login_error'] = "*Tài khoản của bạn đã bị khóa. Vui lòng liên hệ quản trị viên.";
        header('Location: dangnhapclient.php');
        exit(); 
    }

    if ($row['trangthai'] == 'Chưa kích hoạt') {
        $updateStatus = "UPDATE `acc` SET `trangthai` ='Đang hoạt động'  WHERE `username` = '$username'";
        mysqli_query($conn, $updateStatus);
    }

    $_SESSION['userclient'] = $username;
    header('Location: index.php');
} else {
    $_SESSION['login_error'] = "*Sai tên đăng nhập hoặc mật khẩu. Vui lòng nhập lại.";
    header('Location: dangnhapclient.php');
}

mysqli_close($conn);
?>
