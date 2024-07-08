<?php
	session_name('admin');
	session_start();
	$db = "anh";
	$conn = new mysqli("localhost", "root", "", $db) or die("Không connect được với máy chủ");
	$_SESSION['role'] = ""; 
	$username = mysqli_real_escape_string($conn, $_POST['username']);//Hàm mysqli_real_escape_string được sử dụng để làm sạch và thoát ra khỏi chuỗi các ký tự đặc biệt có thể gây ra lỗ hổng bảo mật khi chúng được sử dụng
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	
	$select = "SELECT * FROM `acc` WHERE (`username` = '$username' AND `password` = '$password') AND (`role` = 'Admin' OR `role` = 'Quản trị viên')";
	$result = mysqli_query($conn, $select);

	if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['useradmin'] = $username;
		$_SESSION['role'] = $row['role'];

		header('Location: indexadmin.php');
	} else {
		header('Location: indexadmin.php');
	}
	mysqli_close($conn);
?>
