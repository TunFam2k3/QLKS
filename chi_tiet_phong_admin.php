<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Phòng</title>
    <style>
    body {
        background: #f9f9f9;
        color: #333;
        font-family: Arial, sans-serif;
        display: flex;
        justify-content: center;/*trục ngang*/
        align-items: center;/*trục dọc*/
        min-height: 100vh;/*viewport height */
        margin: 0;
    }

    .room-container {
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        width: 80%;
        max-width: 800px;
        display: flex;
        flex-direction: column;
        overflow: hidden;
    }

    .room-details {
        padding: 20px;
        text-align: center;
    }

    .room-details h2 {
        font-size: 28px;
        margin-bottom: 10px;
    }

    .room-details img {
        max-width: 100%;
        height: auto;
        border-radius: 10px;
        margin: 20px 0;
    }

    .room-details p {
        font-size: 18px;
        line-height: 1.4;
        margin-bottom: 20px;
    }

    .room-price {
        background: #3498db;
        color: #fff;
        border-radius: 0 0 10px 10px;
        padding: 10px;
    }

    .room-price p {
        font-size: 18px;
        line-height: 1.4;
        margin-bottom: 10px;
    }

    .book-button {
        margin-top: 20px;
    }

    .book-button a {
        text-decoration: none;
    }

    .book-button button {
        background-color: #e74c3c;
        color: #fff;
        font-size: 18px;
        padding: 12px 24px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .book-button button:hover {
        background-color: #c0392b;
    }

    .image-slider {
        position: relative;
        max-width: 70%;
        margin: 0 auto;
    }

    .slider-button {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background-color: rgba(0, 0, 0, 0.6);
        color: #fff;
        border: none;
        padding: 12px;
        cursor: pointer;
        font-size: 1.2em;
        z-index: 1;
    }

    #prevBtn {
        left: 0;
    }

    #nextBtn {
        right: 0;
    }

    #sliderImage {
        width: 100%;
        height: auto;
        display: block;
        border-radius: 10px;
        border: 1px solid #ddd;
    }
</style>


</head>
	
	<?php
	if (isset($_GET['id_phong'])) {
		$conn = new mysqli("localhost", "root", "", "anh")or  die("Kết nối thất bại: " );
		$phongId = $_GET['id_phong'];
		$query = "SELECT * FROM anhhh WHERE id_phong = $phongId";
		$result = $conn->query($query);
		$row = mysqli_fetch_object($result);
			$price=$row->price;
			$description=$row->description;
			$anh=$row->anhphong;
			$diadiem=$row->diadiem;
			$loaiphong=$row->loaiphong;
			$conn->close();
		} else {
			echo "Không tìm thấy thông tin phòng";
		}

?>
	
	
	
<body>
    <div class="room-container">
        <div class="room-details">
			
            <h2>Thông tin chi tiết</h2>
            <div class="image-slider">
				<img src="images/<?php echo $anh; ?>" alt="Ảnh 1" id="sliderImage">
    		</div>
            </div>
		
            <div class="room-price" >
				
				<p ><strong><?php echo $loaiphong; ?></strong></p>
				<p  ><strong>Mô tả:</strong> <?php echo $description; ?></p>
                <p>Giá phòng: <?php echo $price; ?>VND/ngày</p>
                <p><strong>Địa điểm: <?php echo $diadiem; ?></strong></p>
                
        </div>
    </div>
</body>
	
</html>
