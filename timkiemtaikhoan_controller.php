<?php
	$inputsearch = $_POST['search'];
	$db = 'anh';
	$conn = new mysqli('localhost', 'root', '', $db) or die('Không kết nối được với máy chủ');

	$sql_query = "SELECT * FROM acc WHERE `username` LIKE '%$inputsearch%' OR `full_name` LIKE '%$inputsearch%' OR `email` LIKE '%$inputsearch%' OR `trangthai` LIKE '%$inputsearch%' OR `role` LIKE '%$inputsearch%'";

	$result = mysqli_query($conn, $sql_query);

	if (mysqli_num_rows($result) > 0) {
		echo '<table align="center" border=1>';
		echo '<tr>';
		echo '<td colspan="8" align="center">Danh sách tài khoản</td>';
		echo '</tr>';
		echo '<tr align="center">';
		echo '<td width="38">STT</td>';
		echo '<td width="83">Username</td>';
		echo '<td width="83">Password</td>';
		echo '<td width="120">Fullname</td>';
		echo '<td width="83">Email</td>';
		echo '<td width="83">Role</td>';
		echo '</tr>';

		$stt_hang = 0;

		while ($row = mysqli_fetch_object($result)) {
			$stt_hang++;
			$id = $row->id;
			$username = $row->username;
			$password = $row->password;
			$full_name = $row->full_name;
			$email = $row->email;
			$role = $row->role;
		

			echo '<tr>';
			echo '<td>' . $stt_hang . '</td>';
			echo '<td>' . $username . '</td>';
			echo '<td>' . $password . '</td>';
			echo '<td>' . $full_name . '</td>';
			echo '<td>' . $email . '</td>';
			echo '<td>' . $role . '</td>';

		}

		echo '</table>';
	} else {
		echo '<p align="center">Không tìm thấy kết quả phù hợp.</p>';
	}

	$conn->close();
?>
