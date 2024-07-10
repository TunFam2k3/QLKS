<?php
if (isset($_GET['id_phanhoi']) || $_GET['id_phanhoi']!=NULL) {
    $db = "anh";
    $conn = new mysqli("localhost", "root", "", $db) or die("Không connect được với máy chủ");

    $id_phanhoi =$_GET['id_phanhoi'];
    

		   $update_query = "DELETE FROM phanhoi WHERE id_phanhoi = $id_phanhoi";
			if ($conn->query($update_query) !== TRUE) {
				echo "Lỗi cập nhật quyền: " . $conn->error;
			} else {
				echo "Đã xóa phòng có ID $id_phanhoi";
			}

	
    $conn->close();
    header('Location: indexadmin.php?danhmuc=quanly_phanhoikhachhang');
} else {
    echo "Không có dữ liệu được gửi từ form.";
}
?>
