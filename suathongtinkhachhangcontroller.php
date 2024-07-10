<?php
if($_REQUEST['action']=='huy'){
    header("Location: indexadmin.php?danhmuc=thongtinnguoidung");

}
else {
    $db = "anh";
    $conn = new mysqli("localhost", "root", "", $db) or die("Không connect được với máy chủ");
    
    // Lấy dữ liệu từ form
    $id = $_REQUEST['id'];
    $hoten = $_REQUEST['hoten'];
    $ngaysinh = $_REQUEST['ngaysinh'];
    $gioitinh = $_REQUEST['gioitinh'];
    $sdt = $_REQUEST['sdt'];
    $diachi = $_REQUEST['diachi'];

    // Truy vấn UPDATE
    $update_query = "UPDATE `nguoidung` SET 
                     `hoten` = '$hoten', 
                     `ngaysinh` = '$ngaysinh', 
                     `gioitinh` = '$gioitinh', 
                     `sdt` = '$sdt', 
                     `diachi` = '$diachi' 
                     WHERE `id_nguoidung` = $id";

    if ($conn->query($update_query) === TRUE) {
        echo "Cập nhật thông tin thành công.";
        header("Location: indexadmin.php?danhmuc=thongtinnguoidung");
    } else {
        echo "Lỗi cập nhật thông tin: " . $conn->error;
    }

    $conn->close();
}
?>