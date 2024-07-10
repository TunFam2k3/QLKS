<?php
session_name('client');
session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<style>
		*{
			margin: 0;
			box-sizing: border-box;

		}


		.wrap{
			width: 80%;
			height: 350px;
			background-color: #FFFFFF;
			margin: 10% auto;
			border-radius: 20px;
			display: flex;

		}
		.mainlogin{
			width: 60%;
			height: 500px;
			background-color: #FFFFFF;
			margin-top: 8%;
			margin-left: 20%;
			border-radius: 20px;

		}
		.anh{

			width: 55%;
			height: 100%;
			margin: 22% 0 20% 0 ;


			display: block;

		}
		.main_login{
			width: 45%;
			top: 100px;
			right: 0;
			display: block;
			margin: 20% 0 20% 0 ;

		}

		.main_login>input,button{
			height: 45px;
			width: 100%;
			align-items: center;
			justify-content: center;
			border-radius: 5px;
			border-color: none;
		}
		button{
			background-color: #ffd43b;
			color: black;
			font-size: 15px;
		}
		button:hover{
			background-color: #AD8A0E;
			cursor: pointer;
		}
		.main_login>span{
			display: inline;
			float:right;
			font-size: 15px;
			font-weight: 500;
		}
		a{
			color: black;
			font-size: 16px;
		}
		body{
			background-image: url(https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RW195Si?ver=6dfb);
		}
		.mainlogin{
			box-shadow: 0 8px 8px black;
		}
		.input-container {
			position: relative;
			margin: 15px 0;
		}
		input[type="text"], input[type="password"] {
			width: 100%;
			padding: 10px;
			border: none;
			border-bottom: 2px solid rgba(222,189,7,1.00);
			background: transparent;
			font-size: 16px;
			color: black;
			transition: border-color 0.3s ease-in-out;
		}
		input[type="text"]:focus, input[type="password"]:focus {
			border-color: transparent;
		}
		label {
			position: absolute;
			left: 2px;
			top: 14px;
			color: black;
			background-color: white;
			padding: 0 5px;
            transition: transform 0.3s, font-size 0.3s, color 0.3s;
			            pointer-events: none; 

		}
		input[type="text"]:focus + label, input[type="password"]:focus + label {
            transform: translate(0px, -20px) scale(0.8);
			font-size: 14px;
			color: rgba(222,189,7,1.00);
		}
		input[type="text"]:valid + label, input[type="password"]:valid + label {
			transform: translateY(-25px) scale(0.8);
			font-size: 14px;
			color: rgba(222,189,7,1.00);
		}
		input[type="submit"] {
			background-color: rgba(222,189,7,1.00);
			border: none;
			padding: 10px 20px;
			border-radius: 5px;
			font-weight: bold;
			cursor: pointer;
			color: black;
			transition: opacity 0.3s;
		}
		input[type="submit"]:hover {
			opacity: 0.7;
		}
		.main_login {
			text-align: center;
		}
		a{
			font-weight: 600;

		}
		.error-container {
            margin-bottom: 15px;
			color: red;
            font-weight: 550;
			font-style:italic;
			font-size:13px;
			
        }

       
	</style>
</head>
<body>

	<form action="dangnhap_controller.php" method="post">
		<div class="nav">
		<div class="mainlogin"> 
			<div class="wrap">
				<div class="anh">
					<img src="pic/nendangnhap.jpg">
				</div>

				<div class="main_login">
    <p style="font-size: 25px; font-weight: 700; margin-bottom: 0">Đăng nhập hệ thống</p>
    <div class="input-container">
        <input type="text" name="username" required>
        <label for="username">Tên đăng nhập</label>
    </div>
    <div class="input-container">
        <input type="password" name="password" required>
        <label for="password">Mật khẩu</label>
    </div>
	<?php
    if (isset($_SESSION['login_error'])) {
        echo '<div class="error-container">' . $_SESSION['login_error'] . '</div>';
        // Xóa giá trị trong $_SESSION để không hiển thị lại lần sau
        unset($_SESSION['login_error']);
    }
    ?>
    <input type="submit" value="Đăng nhập">
    <br>
    <a href="dangky.php">Đăng ký</a>
    <a href="quenmatkhau_form.php">Quên mật khẩu?</a>
</div>

			</div>
			
			<div class="copyright" style="font-size: 15px;text-align: center;font-weight: bold;">Phần mềm 
				<img src="https://th.bing.com/th/id/OIP.c_TM8d_9EYJtmMEwNmZ19AAAAA?w=180&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7" style="width: 15px;">
				2023 Code bởi Team MNCường
			</div>
		</div>
	</div>
	
	</form>
	
</body>
</html>
