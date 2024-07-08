<?php
session_name('client');

session_start(); 
if(isset($_SESSION['userclient'])) {
    session_destroy();
}
header('Location: index.php');
exit();
?>
