<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        text-align: center;
    }

    .nav {
        background-color: #fff;
        border: 1px solid #ccc;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin: 20px auto;
        padding: 20px;
        width: 30%;
    }

    p {
        font-size: 18px;
        font-weight: bold;
    }

    input[type="submit"] {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
        margin-top: 10px;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }
		</style>
</head>

<body>
	<?php
			$id_hang0=$_REQUEST["id"];
			$db="anh";
			$conn=new mysqli("localhost","root","",$db) or die ("Không connect đc với máy chủ");//tạo kết nối với server
			$select="Select * from `acc` where id=$id_hang0";
		$row=mysqli_fetch_object(mysqli_query($conn, $select));
			
			$id_hang0=$row->id;
			$username=$row->username;
			$full_name=$row->full_name;
			$email=$row->email;

		
	?>
	<br>
	<form action="update_tkadmin_controller.php?id=<?php echo $id_hang0?>" method="post">
		<div class="nav">
			<p>Bạn có muốn thêm tài khoản này làm admin?</p>
				<?php echo 'Tài khoản: '.$username.'<br>';
					echo 'Họ tên: '.$full_name.'<br>';
					echo 'Email: '.$email.'<br>'?>
			<input type="submit" value="Xác nhận ">
	
	
		</div>
	</form>
</body>
</html>