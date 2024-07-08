<?php
	session_start();
	$username = $_POST['username'];
	$password = $_POST['password'];
	$db = "anh";
	$conn = new mysqli("localhost", "root", "", $db) or die("Không connect được với máy chủ");
	$select = "SELECT * FROM `acc` WHERE `username` = '$username' AND `password` = '$password' AND `role` = 'admin'";
	$result = mysqli_query($conn, $select);

	if (mysqli_num_rows($result) > 0) {
		// Đăng nhập thành công với vai trò "admin"
		$_SESSION['user'] = $username;
		header('Location: indexadmin.php');
	} else {
		// Đăng nhập thất bại hoặc không có quyền admin, hiển thị hộp thoại thông báo

		echo '<script type="text/javascript">alert("Tên đăng nhập hoặc mật khẩu không đúng. Vui lòng thử lại.");</script>';
		//header('Location: dangnhapadmin.php');
	}

	mysqli_close($conn);
?>


