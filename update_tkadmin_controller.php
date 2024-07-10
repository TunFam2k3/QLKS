<?php
session_name('admin');
session_start();
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
        }else if ($action == "hanhdong2") {
            foreach ($selected_ids as $user_id) {
                // Lấy thông tin về tài khoản cần xóa
                $sql_select = "SELECT * FROM acc WHERE id = '$user_id'";
                $result = mysqli_query($conn, $sql_select);
                $row = mysqli_fetch_assoc($result);
        
                // Kiểm tra xem tài khoản là quản trị viên hay không
                if ($row['role'] !== 'Quản trị viên') {
                    // Nếu không phải là quản trị viên, thực hiện xóa
                    $sql_delete = "DELETE nguoidung, acc FROM nguoidung 
                                    INNER JOIN acc ON nguoidung.username = acc.username
                                    WHERE acc.id = '$user_id'";
                    mysqli_query($conn, $sql_delete);
                } else {
                    $_SESSION['error']="Tài khoản này không thể xóa";

                }
            }
        }
        
    }
	
    

	
        $conn->close();
        header('Location: indexadmin.php?danhmuc=danhsachtaikhoan');
   
} else {
    echo "Không có dữ liệu được gửi từ form.";
}





?>
