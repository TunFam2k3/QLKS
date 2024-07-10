<?php
session_name('admin');
session_start();

if (isset($_POST['selected_ids'])) {
    $selected_ids = $_POST['selected_ids'];

    $db = "anh";
    $conn = new mysqli("localhost", "root", "", $db) or die("Không connect được với máy chủ");

    foreach ($selected_ids as $user_id) {
        $select_query = "SELECT acc.role, nguoidung.username 
        FROM nguoidung
        LEFT JOIN acc ON nguoidung.username = acc.username
        WHERE nguoidung.id_nguoidung = $user_id";
        
        $result = $conn->query($select_query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            if ($row['role'] !== 'Quản trị viên') {
                $delete_query = "DELETE nguoidung, acc FROM nguoidung 
                    LEFT JOIN acc ON acc.username = nguoidung.username
                    WHERE nguoidung.id_nguoidung = $user_id";
                if ($conn->query($delete_query) !== TRUE) {
                    echo "Lỗi xóa tài khoản hoặc người dùng: " . $conn->error;
                }
            } elseif ($row['username'] == '') {
                $delete_query = "DELETE FROM nguoidung 
                    WHERE id_nguoidung = $user_id";
                if ($conn->query($delete_query) !== TRUE) {
                    echo "Lỗi xóa người dùng: " . $conn->error;
                }
            }
        } else {
            $_SESSION['error'] = "Tài khoản này không thể xóa";
        }
    }

    $conn->close();
    header('Location: indexadmin.php?danhmuc=thongtinnguoidung');
} else {
    echo "Không có dữ liệu được gửi từ form.";
}
?>
