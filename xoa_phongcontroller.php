<?php
if (isset($_POST['selected_ids'])) {
    $db = "anh";
    $conn = new mysqli("localhost", "root", "Tunfam8303@", $db) or die("Không connect được với máy chủ");
        if(isset($_POST['action'])){

    $selected_ids = explode(',', $_POST['selected_ids']);
    
			foreach ($selected_ids as $id_phong) {
		   $update_query = "DELETE FROM anhhh WHERE id_phong = $id_phong";
			if ($conn->query($update_query) !== TRUE) {
				echo "Lỗi cập nhật quyền: " . $conn->error;
			} else {
				echo "Đã xóa phòng có ID $id_phong";
			}
		}
	}
    $conn->close();
    header('Location: indexadmin.php?danhmuc=danhsachphong');
} else {
    echo "Không có dữ liệu được gửi từ form.";
}
?>
