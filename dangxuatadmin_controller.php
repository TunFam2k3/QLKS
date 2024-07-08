<?php
session_name('admin');

session_start(); 
if(isset($_SESSION['useradmin'])) {
	session_unset(); // xóa biến 
	session_destroy();//hủy phiên
}
header('Location: dangnhapadmin.php');
exit();
?>
