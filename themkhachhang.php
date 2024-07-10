<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Người Dùng</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            height: 100vh;
        }

        .user-form {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 60%;
            margin:0 auto;
            align-items:center;
           
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .add-user-form {
            display: flex;
            flex-direction: column;
        }

        .form-img {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-img img {
            max-width: 100%;
            height: auto;
            border-radius: 50%;
            border: 3px solid #007bff;
        }

        .form-detail {
            width: 80%;
            margin: 0 auto;
        }

        .form-row {
            margin-bottom: 15px;
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            color: #555;
        }

        input, select {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        
        button, .submit {
            background-color: #007bff;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
            /* width:80%; */
            margin: 0 auto;
            text-decoration: none; 

        }

        button:hover, .submit:hover {
            background-color: #0056b3;
        }
        option{
            padding: 20px;
        }
        
    </style>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $fullname = $_POST["fullname"];
    $ngaysinh = $_POST["ngaysinh"];
    $gioitinh = $_POST["gioitinh"];
    $sdt = $_POST["sdt"];
    $diachi = $_POST["diachi"];
    $cccd = $_POST["cccd"];
    $loaikhach = $_POST["loaikhach"];


    $servername = "localhost";
    $username_db = "root";
    $password_db = "";
    $database = "anh";

    $conn = new mysqli($servername, $username_db, $password_db, $database);

    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    $sql = "INSERT INTO nguoidung (`username`,  `hoten`, `ngaysinh`, `gioitinh`, `sdt`, `diachi`, `avt`, `cccd`,`loaikhach`) 
    VALUES ('',  '$fullname', '$ngaysinh', '$gioitinh', '$sdt', '$diachi', 'images/avt.jpg', '$cccd', '$loaikhach')";


    if ($conn->query($sql) === TRUE) {
        echo "<p style='text-align: center; color: #28a745;'>Thêm thành công!</p>";
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>


<div class="user-form">
    <h2>Thêm Người Dùng</h2>
   
    <form action="" method="post" class="add-user-form">
        

        <div class="form-detail">
            <div class="form-row">
                <label for="fullname">Họ và tên:</label>
                <input type="text" id="fullname" name="fullname" required>
                <label for="ngaysinh">Ngày Sinh:</label>
                <input type="date" id="ngaysinh" name="ngaysinh" required>
            </div>

            

            <div class="form-row">
                <label for="gioitinh">Giới Tính:</label>
                <select name="gioitinh" id="gioitinh">
                    <option value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>
                </select>
        
                <label for="sdt">Số Điện Thoại:</label>
                <input type="tel" id="sdt" name="sdt" required>
            </div>

            <div class="form-row">
                <label for="diachi">Địa Chỉ:</label>
                <input type="text" id="diachi" name="diachi" required>
           
                <label for="cccd">CCCD:</label>
                <input type="text" id="cccd" name="cccd" required>
            </div>
            <div class="form-row">
                
                <label for="loaikhach">Loại khách hàng:</label>
                <select name="loaikhach" id="loaikhach">
                    <option value="Khách lẻ">Khách lẻ</option>
                    <option value="Khách đặt online">Khách đặt online</option>
                </select>
            </div>
        </div>

        <div class="form-row-buttonsubmit" >
            <button type="submit">Thêm Người Dùng</button>
            <button><a class="submit" href="suathongtinkhachhangcontroller.php?action=huy">Hủy</a></button>
        </div>


    </form>
</div>

</body>
</html>
