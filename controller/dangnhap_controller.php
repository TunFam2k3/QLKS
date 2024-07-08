<?php	
session_start();
	 	$username= $_POST['username'];
		$password= $_POST['password'];	
	
		$db= "anh";
		$conn= new mysqli("localhost","root","",$db) or die ("Không connect đc với máy chủ");
		$select="SELECT * FROM `acc` where `username`= '$username' and `password`= '$password'";
		$resutl=mysqli_query($conn,$select);
		  	if ( mysqli_num_rows($resutl) > 0) {
				$_SESSION['user'] = $username;
        		header('Location: index.php');
			}
			else {
				header('Location: dangnhapclient.php');
			}
    mysqli_close($conn);
	?>
