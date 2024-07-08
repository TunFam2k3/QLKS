<?php
		$email= $_POST['email'];
		$new_password= $_POST['new_password'];	
		$db= "anh";
		$conn= new mysqli("localhost","root","",$db) or die ("Không connect đc với máy chủ");
		$select="SELECT * FROM `acc` where `email`= '$email'";
		$resutl=mysqli_query($conn,$select);
		  	if ( mysqli_num_rows($resutl) > 0) {
        		$sql_update="UPDATE acc SET `password`='$new_password' 	WHERE `email`='$email'";
				mysqli_query($conn, $sql_update);
				header('Location:dangnhapclient.php');
			}
			else {
				echo "Sai email";
			}
    mysqli_close($conn);


?>