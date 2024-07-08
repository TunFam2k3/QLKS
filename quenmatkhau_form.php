<!DOCTYPE html>
<html>
<head>
    <title>Quên mật khẩu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .containerqmk {
            max-width: 400px;
            margin: 0 auto ;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
			transform:; 
        }

        .form-group {
            margin-bottom: 15px;
			
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="email"],
        input[type="password"] {
            width: 95%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 18px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="containerqmk">
        <h2>Đổi mật khẩu</h2>
        <form action="quenmatkhau_controller.php" method="post">
            <div class="form-group">
                <label for="email">Địa chỉ Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="new_password">Mật khẩu mới:</label>
                <input type="password" id="new_password" name="new_password" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Đặt Lại Mật Khẩu">
            </div>
        </form>
    </div>
</body>
</html>
