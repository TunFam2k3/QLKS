<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác Nhận Đặt Phòng</title>
    <style>
        body {
            background: linear-gradient(135deg, #3498db, #e74c3c); /* Gradient từ xanh đến đỏ */
            color: #fff;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .confirmation-form {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .confirmation-form h1 {
            font-size: 28px;
            margin-bottom: 20px;
        }

        .confirmation-form label {
            display: block;
            font-size: 16px;
            margin-bottom: 10px;
			    text-align: left;

        }

        .confirmation-form input[type="text"], input[type="date"], input[type="number"] {
            width: 90%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .confirmation-form button {
            background-color: #3498db;
            color: #fff;
            font-size: 18px;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .confirmation-form button:hover {
            background-color: #e74c3c;
        }

        .confirmation-message {
            margin-top: 20px;
            font-size: 16px;
            color: #fff;
        }
    </style>
</head>
	<?php
       if (isset($_GET['id_phong']) || isset($_GET['diadiem'])) {
			$phongId = $_GET['id_phong'];
		   $diadiem= $_GET['diadiem'];
		   $price= $_GET['price'];
		   $loaiphong= $_GET['loaiphong'];
		
		
		} else {
			echo "Không tìm thấy thông tin phòng";
		}
	?>
<body>
    <div class="confirmation-form">
        <h1>Xác Nhận Đặt Phòng</h1>
        <form action="xacnhandatphong_controller.php?id_phong=<?php echo $phongId?>&diadiem=<?php echo $diadiem?>&price=<?php echo $price ?>&loaiphong=<?php echo $loaiphong ?>" method="post" onsubmit="return validateForm();">
			<label for="loaiphong"><?php echo($loaiphong)?></label>
            <label for="tenkhach">Tên khách hàng:</label>
            <input type="text" id="tenkhach" name="tenkhach"  required>
            <label for="ngayden">Ngày đến:</label>
            <input type="date" id="ngayden" id="ngayden" name="ngayden" required>
            <label for="ngaydi">Ngày đi:</label>
            <input type="date" id="ngaydi" id="ngayden" name="ngaydi" required>
			<label for="soluongnguoi">Số lượng người:</label>
            <input type="number" id="soluongnguoi"  name="soluongnguoi" required>
			<p> Địa điểm: <?php echo($diadiem)?></p>
	        <button type="submit">Xác nhận</button>
        </form>
    </div>
   
</body>
	
	<script>
	function validateForm() {
		var ngayden = document.getElementById("ngayden").value;
		var ngaydi = document.getElementById("ngaydi").value;

		if (ngayden > ngaydi) {
			alert("Ngày đi phải sau ngày đến.");
			return false;
		}

		return true;
	}
	</script>

	
</html>
