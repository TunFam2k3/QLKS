<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/your-font-awesome-kit-id.js" crossorigin="anonymous"></script>
    <title>Xem Chi Tiết Người Dùng</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            
            height: 100vh;
        }

        .user-details {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            max-width: 600px;
            width: 100%;
            margin:0 auto;
            transform:translatey(30%);
        }

        .avatar {
            width: 300px;
            height: 300px;
            /* background-color: #f0f0f0; */
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            border-radius:18px;
            margin-top:8%;
        }

        .avatar img {
            width: 180px;
            height: 180px;
            border-radius: 20px;
            object-fit: cover;
            border-radius:50%;

        }

        .info {
            width: 100%;
            padding: 20px;
            display: flex;
            flex-direction: column;
        }

        .info h2 {
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        .info-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .info-row p {
            width: calc(50% - 10px);
            margin-bottom: 10px;
        }

        strong {
            font-weight: bold;
            color: #333;
        }

        .info-row input {
            width: calc(100% - 10px);
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .button-row {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .button-row button {
            background-color: #4CAF50; 
            color: white; 
            padding: 10px 15px; 
            border: none; 
            border-radius: 4px;
            cursor: pointer;
            margin-right: 10px; 
        }

        .button-row button a {
            text-decoration: none; 
            color: white; 
        }

        .button-row button:hover {
            background-color: #45a049;
            color: #333; 
        }

        .button-row button a:hover {
            color: #333; 
        }

        /* Responsive Styles */
        @media(max-width: 768px) {
            .user-details {
                flex-direction: column;
            }

            .avatar, .info {
                width: 100%;
            }

            .info-row p {
                width: calc(100% - 10px);
            }

            .info-row input {
                width: calc(100% - 10px);
            }
        }
    </style>
</head>
<body>

<?php
$db = "anh";
$conn = new mysqli("localhost", "root", "", $db) or die("Không connect được với máy chủ");
$id = $_REQUEST['id'];
$select = "SELECT * FROM `nguoidung` WHERE id_nguoidung = $id";

$result = $conn->query($select);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    ?>

    <div class="user-details">
        <div class="avatar">
            <img src="<?php echo $row['avt']; ?>" alt="Avatar">
        </div>
        <div class="info">
            <form action="suathongtinkhachhangcontroller.php" method="GET">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="hidden" name="action" value="sua">
                <h2>Thông tin khách hàng</h2>
                <div class="info-row">
                    <p><strong>Họ Tên:</strong> <input type="text" value="<?php echo $row['hoten']; ?>" name="hoten"></p>
                    <p><strong>Giới Tính:</strong> <input type="text" value="<?php echo $row['gioitinh']; ?>" name="gioitinh"></p>

                </div>
                <div class="info-row">
                    <p><strong>Ngày Sinh:</strong> <input type="date" value="<?php echo $row['hoten']; ?>" name="hoten"></p>
                    <p><strong>Số Điện Thoại:</strong> <input type="text" value="<?php echo $row['sdt']; ?>" name="sdt"></p>

                </div>
                <div class="info-row">
                    <p><strong>Địa Chỉ:</strong> <input type="text" value="<?php echo $row['diachi']; ?>" name="diachi"></p>
                    <p><strong>Loại khách hàng:</strong> <input type="text" value="<?php echo $row['loaikhach']; ?>" name="loaikhach"></p>

                </div>
                <div class="button-row">
                    <button type="submit">Sửa</button>
                    <button><a href="suathongtinkhachhangcontroller.php?action=huy">Hủy</a></button>
                </div>
            </form>
        </div>
    </div>

    <?php
} else {
    echo "Không có dữ liệu.";
}

$conn->close();
?>
</body>
</html>
