<?php
session_name('admin');
session_start();

$db = "anh";
$conn = new mysqli("localhost", "root", "", $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$_SESSION['role'] = "";

$username = $conn->real_escape_string($_POST['username']);
$password = $conn->real_escape_string($_POST['password']);

$select = "SELECT * FROM `acc` WHERE (`username` = ? AND `password` = ?) AND (`role` = 'Admin' OR `role` = 'Quản trị viên')";
$stmt = $conn->prepare($select);
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
if ($row['trangthai'] == 'Đã khóa') {
    $_SESSION['login_error'] = "*Tài khoản của bạn đã bị khóa. Vui lòng liên hệ quản trị viên.";
    header('Location: dangnhapadmin.php');
    exit(); 
}
if ($result->num_rows > 0) {
    if ($row['trangthai'] == 'Chưa kích hoạt') {
        $updateStatus = "UPDATE `acc` SET `trangthai` ='Đang hoạt động'  WHERE `username` = ?";
        $stmt = $conn->prepare($updateStatus);
        $stmt->bind_param("s", $username);
        $stmt->execute();

    }
	$_SESSION['useradmin'] = $username;
	$_SESSION['role'] = $row['role'];
	header('Location: indexadmin.php');
	exit();
} else {
    $_SESSION['login_error'] = "*Sai tên đăng nhập hoặc mật khẩu. Vui lòng nhập lại.";

    header('Location: dangnhapadmin.php');
    exit();
}

$stmt->close();
$conn->close();
?>
