<?php
session_start(); // Bắt đầu phiên làm việc

if(isset($_SESSION['user'])) {
    // Xóa phiên làm việc để đăng xuất
    session_destroy();
}

// Chuyển hướng về trang chủ sau khi đăng xuất
header('Location: index.php');
exit();
?>
