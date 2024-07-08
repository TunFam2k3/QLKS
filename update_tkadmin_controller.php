<?php
if (isset($_POST['selected_ids'])) {
    $selected_ids_str = $_POST['selected_ids'];
    $selected_ids = explode(',', $selected_ids_str);

    $db = "anh";
    $conn = new mysqli("localhost", "root", "", $db) or die("Không connect được với máy chủ");


        if (isset($_POST["action"])) {
        $action = $_POST["action"];

        if ($action == "hanhdong1") {
			foreach ($selected_ids as $user_id) {
				$update_query = "UPDATE `acc` SET `role` = 'Admin' WHERE `id` = '$user_id'";
				if ($conn->query($update_query) !== TRUE) {
					echo "Lỗi cập nhật quyền: " . $conn->error;
					}
			}
        } else if ($action == "hanhdong2") {
			foreach ($selected_ids as $user_id) {
				$sql_delete= "DELETE nguoidung, acc FROM nguoidung 
			INNER JOIN acc ON nguoidung.username = acc.username
        WHERE acc.`id` = '$user_id'";
				mysqli_query($conn, $sql_delete);
			}
        }
    }
	
    

	
        $conn->close();
        header('Location: indexadmin.php?danhmuc=danhsachtaikhoan');
   
} else {
    echo "Không có dữ liệu được gửi từ form.";
}





?>
