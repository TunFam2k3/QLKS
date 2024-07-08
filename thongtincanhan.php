<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin cá nhân</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container1 {
            margin: 0 auto;
			max-width: 600px;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
        }

        h1 {
            text-align: center;
            color: #007BFF;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            color: #333;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="date"],
        textarea,
        select {
            width: 90%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            color: #333;
        }

        button {
            display: block;
            margin: 0 auto;
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        button:focus {
            outline: none;
        }
    </style>
</head>
<body>
    <div class="container1">
        <h1>Thông tin cá nhân</h1>
        <form action="xuliluuthongtinnguodung.php" method="POST">
            <div class="form-group">
                <label for="name">Họ và Tên:</label>
                <input type="text" id="name" name="name" required>
            </div>
			<div class="form-group">
                <label for="name">Ngày sinh:</label>
                <input type="date" id="ngaysinh" name="ngaysinh" required>
            </div>
            
            <div class="form-group">
                <label for="phone">Số Điện Thoại:</label>
                <input type="tel" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="address">Địa Chỉ:</label>
                <textarea id="address" name="address" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="gender">Giới Tính:</label>
                <select id="gender" name="gender" required>
                    <option value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>
                    <option value="other">Khác</option>
                </select>
            </div>
            <button type="submit">Lưu</button>
        </form>
    </div>
</body>
</html>
