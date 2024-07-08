<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-image: url('https://www.ruleranalytics.com/wp-content/uploads/travel-marketing-statistics-www.ruleranalytics.com_.png');
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: rgba(251, 241, 241, 0.8);
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.4);
            width: 320px;
            text-align: center;
            padding: 20px;
            color: #fff;
        }

        .container h2 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #007bff;
        }

        .input-container {
            position: relative;
            margin: 15px 0;
        }

        .input-container input {
            width: 90%;
            padding: 10px;
            border: none;
            border-bottom: 2px solid #007bff;
            background: transparent;
            font-size: 16px;
            color: #000;
            transition: border-color 0.3s ease-in-out;
            z-index: 1;
            margin-top: 18px;
            position: relative;
        }

        .input-container input:focus {
            border-color: #e6007e;
        }

        .input-container label {
            position: absolute;
            left: 10px;
            bottom: 8px;
            color: #007bff;
            transition: transform 0.3s, font-size 0.3s, color 0.3s;
            z-index: 1;
            pointer-events: none; 
        }

        .input-container input:focus + label,
        .input-container input:valid + label {
            transform: translate(0, -25px) scale(0.8);
            font-size: 16px;
            color: #e6007e;
			background: rgba(251, 241, 241, 0.8); 
		}

        .container input[type="submit"] {
            width: 100%;
            padding: 12px;
            background: linear-gradient(to right, #e6007e, #007bff);
            border: none;
            border-radius: 25px;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease-in-out;
        }

        .container input[type="submit"]:hover {
            background: linear-gradient(to right, #007bff, #e6007e);
        }

        .container a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }

        .container a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Đăng nhập Admin</h2>
        <form action="dangnhapadmin_controller.php" method="post">
            <div class="input-container">
                <input type="text" id="username" name="username" required>
                <label for="username">Tên đăng nhập</label>
            </div>
            <div class="input-container">
                <input type="password" id="password" name="password" required>
                <label for="password">Mật khẩu</label>
            </div>
            <input type="submit" value="Đăng nhập">
        </form>
        <p style="color: black">Chưa có tài khoản? <a href="dangky.php">Đăng ký ngay</a></p>
        <a href="quenmatkhau_form.php">Quên mật khẩu?</a>
    </div>
</body>
</html>
