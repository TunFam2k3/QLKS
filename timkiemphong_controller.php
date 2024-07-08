<?php
	$inputsearch = $_POST['search'];
	$db = 'anh';
	$conn = new mysqli('localhost', 'root', '', $db) or die('Không kết nối được với máy chủ');

	$sql_query = "SELECT * FROM anhhh WHERE `price` LIKE '%$inputsearch%' OR `description` LIKE '%$inputsearch%' OR `tinhtrang` LIKE '%$inputsearch%' ";

	$result = mysqli_query($conn, $sql_query);

	if (mysqli_num_rows($result) > 0) {
		echo '<table align="center" border=1>';
		echo '<tr>';
		echo '<td colspan="8" align="center">Kết quả tìm kiếm</td>';
		echo '</tr>';
		echo '<tr align="center">';
		echo '<td width="38">STT</td>';
		echo '<td width="83">Giá</td>';
		echo '<td width="83">Mô tả</td>';
		echo '<td width="120">Hình ảnh </td>';
		echo '<td width="83">Tình trạng</td>';
		echo '</tr>';

		$stt_hang = 0;

		while ($row = mysqli_fetch_object($result)) {
			$stt_hang++;
			$id = $row->id_phong;
			$price = $row->price;
			$description = $row->description;
			$anhphong = $row->anhphong;
			$tinhtrang = $row->tinhtrang;
		

			echo '<tr align="center">';
			echo '<td>' . $stt_hang . '</td>';
			echo '<td>' . $price . '</td>';
			echo '<td>' . $description . '</td>';
			echo '<td><img src="images/' . $anhphong . '" width="100px" height="100px" alt="Anh tro"></td>';
			echo '<td>' . $tinhtrang . '</td>';

		}

		echo '</table>';
	} else {
		echo '<p align="center">Không tìm thấy kết quả phù hợp.</p>';
	}

	$conn->close();
?>
