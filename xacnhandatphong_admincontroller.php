<?php
session_name('admin');
session_start();

    $db = "anh";
    $conn = new mysqli("localhost", "root", "", $db) or die("Không connect được với máy chủ");

        $id=$_GET["iddp"];
        if (isset($_GET["action"])) {
        $action = $_GET["action"];

        if ($action == "hanhdong1") {
			
				$update_query = "UPDATE `datphong` SET `trangthaithanhtoan` = 'chuathanhtoan' WHERE `id` = '$id'";
				if ($conn->query($update_query) !== TRUE) {
					echo "Lỗi cập nhật quyền: " . $conn->error;
					}
			}
        else if ($action == "hanhdong2") {
           $delete="delete from datphong where id='$id'";
           if ($conn->query($delete) !== TRUE) {
            echo "Lỗi cập nhật quyền: " . $conn->error;
            }
        

        }
	
        $conn->close();
        header('Location: indexadmin.php?danhmuc=danhsachdatphong');
   
} else {
    echo "Không có dữ liệu được gửi từ form.";
}





?>
