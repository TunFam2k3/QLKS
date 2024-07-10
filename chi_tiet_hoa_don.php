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
        padding: 20px;
      

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
    table {
        width: 70%;
		
    }
    table tr {
        text-align: left;
        padding: 10px;
    }
    table tr td {
        padding: 10px;
    }
</style>


</head>
	
	<?php
        $phongId = $_REQUEST["id_phong"];
        $conn=mysqli_connect("localhost","root","") or die ("Không connect đc với máy chủ");
        mysqli_select_db($conn,"anh") or die ("Không tìm thấy CSDL");
		
        

        $query_1 = "SELECT * FROM datphong WHERE datphong.id_phong = $phongId";
		$result_1 = $conn->query($query_1);
		$row_1 = mysqli_fetch_object($result_1);
			$username =$row_1->username ;
            $tenkhach =$row_1->tenkhach ;
			$ngaydat=$row_1->ngaydat;
			$ngayden=$row_1->ngayden;
			$ngaydi=$row_1->ngaydi;
			$soluongnguoi=$row_1->soluongnguoi;
            $trangthaithanhtoan=$row_1->trangthaithanhtoan;
            $loaiphong=$row_1->loaiphong;
            //  $anhphong =$row->anhphong ;
            //  $price=$row->price;
            //  $description=$row->description;
            //  $diadiem=$row->diadiem;

            $conn->close();
    

?>
<?php
 
 $conn=mysqli_connect("localhost","root","") or die ("Không connect đc với máy chủ");
 mysqli_select_db($conn,"anh") or die ("Không tìm thấy CSDL");
 
 $phongId = $_REQUEST["id_phong"];


 $query= "SELECT * FROM anhhh WHERE anhhh.id_phong = $phongId";
 $result = $conn->query($query);
 $row= mysqli_fetch_object($result);
     $anhphong =$row->anhphong ;
     $price=$row->price;
     $description=$row->description;
     $diadiem=$row->diadiem;
     $conn->close();

?>


	
<body>
    <div class="room-container">
        
    <div class="room-details">	
    <div class="room-price">
            <h2> Thông tin chi tiết đơn đặt phòng</h2>
</div>      
            
            </div>
            <div class="image-slider">
				<img src="images/<?php echo $anhphong; ?>" alt="Ảnh 1" id="sliderImage">
    		</div>
            
		
           
           <div class="room-price">
           <table align="center" >
    <tbody>
       
        <tr>
            <td>Tên khách hàng</td>
            <td><?php echo $tenkhach; ?></td>
           
        </tr>
        <!-- <tr>
            <td>Username</td>
            <td><?php echo $username; ?></td>
           
        </tr> -->
        <tr>
            <td>Ngày đặt </td>
            <td><?php echo $ngaydat; ?></td>
           
        </tr>
        <tr>
            <td>Ngày đến</td>
            <td><?php echo $ngayden; ?></td>
           
        </tr>
        <tr>
            <td>Ngày đi</td>
            <td><?php echo $ngaydi; ?></td>
           
        </tr>
        <tr>
            <td>Số lượng người</td>
            <td><?php echo $soluongnguoi; ?></td>
           
        </tr>
        <tr>
            <td>Gía phòng</td>
            <td><?php echo $price; ?></td>
           
        </tr>
        <tr>
            <td>Loại phòng</td>
            <td><?php echo $loaiphong; ?></td>
           
        </tr>
        <tr>
            <td>Địa chỉ</td>
            <td><?php echo $diadiem; ?></td>
           
        </tr>
       
    </tbody>
    </div>
</table>

           </div>
    </div>
</body>
	
</html>
