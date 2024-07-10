<?php
if (isset($_POST['selected_ids'])) {
    $selected_ids = $_POST['selected_ids'];

    $db = "anh";
    $conn = new mysqli("localhost", "root", "Tunfam8303@", $db) or die("Không connect được với máy chủ");

    foreach ($selected_ids as $user_id) {
       
            $delete_query = " DELETE nguoidung, acc FROM nguoidung 
			INNER JOIN acc ON acc.username = nguoidung.username  /*innerjoin kết hợp dữ liệu 2 bảng với điều kiện on */
            WHERE nguoidung.id_nguoidung = $user_id;";
            if ($conn->query($delete_query) !== TRUE) {
                echo "Lỗi xóa tài khoản hoặc người dùng: " ;
            }
        }
    

    $conn->close();
    header('Location: indexadmin.php?danhmuc=thongtinnguoidung');
} else {
    echo "Không có dữ liệu được gửi từ form.";
}
?>
<!--
  foreach ($selected_ids as $user_id) {
        $get_username_query = "SELECT username FROM acc WHERE id = $user_id";
        $result = $conn->query($get_username_query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $username = $row['username'];

            $delete_query = "DELETE FROM acc WHERE username = '$username';
                             DELETE FROM nguoidung WHERE id_nguoidung = $user_id;";
            if ($conn->multi_query($delete_query) !== TRUE) {
                echo "Lỗi xóa tài khoản hoặc người dùng: " . $conn->error;
            }
        }
    }-->
