<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css" rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
	
	<?php	
		$db="anh";
		$conn=new mysqli("localhost","root","",$db) or die ("Không connect đc với máy chủ");
		
				$select = "SELECT * FROM `anhhh` where `loaiphong`='Phòng đơn'";
				$result = mysqli_query($conn, $select);
				$stt_hang=0;
			while($row = mysqli_fetch_object($result))
			{
			
			$stt_hang++;
			$id_hang[$stt_hang]=$row->id_phong;
			$price0[$stt_hang]=$row->price;
			$description0[$stt_hang]=$row->description;
			$anhphong[$stt_hang]=$row->anhphong;
			$tinhtrang[$stt_hang]=$row->tinhtrang;
			$diadiem[$stt_hang]=$row->diadiem;
			
			
		}
	$tong_bg = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `anhhh`"));
	mysqli_close($conn);
	?>
<body>
	<div class="container-fluid " style="display:flex;padding-top:80px;">
		
		<div id="demo" class="carousel slide" data-bs-ride="carousel">

            <!-- Indicators/dots -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
            </div>

            <!-- The slideshow/carousel -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/img3.jpg"
                        alt="slide 1" class="d-block w-100">	
                </div>
                <div class="carousel-item ">
				<img src="img/img2.jpg"
                        alt="slide 2" class="d-block w-100">
                </div>
                <div class="carousel-item ">
                    <img src="img/img1.jpg"
                        alt="slide 3" class="d-block w-100">
                </div>
            </div>

            <!-- Left and right controls/icons -->
            <button class="carousel-control-prev" style="margin-top:100px;"  type="button" data-bs-target="#demo" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" style="margin-top:100px;" type="button" data-bs-target="#demo" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
	</div>
	<div class="container-fluid">

	
		<div class="content2"style="margin-bottom: 30px; margin-top: 100px;">
		<div class="content21 container">
			<h2 align="center"><strong>Vì sao lại chọn khách sạn của chúng tôi </strong></h2>
			<div class="cacbox">
				<div class="box top">
					<img src="img/img2.jpg" alt="Image 1">
					<br>
					<strong>KIẾN TRÚC THÚ VỊ THEO PHONG CÁCH HIỆN ĐẠI</strong>
					<p>Với mặt tiền độc đáo gợi nhớ đến những con sóng của Biển Đông và phong cách nội thất phản chiếu vỏ sò của Bãi biển Mỹ Khê, Stella Maris Beach Đà Nẵng mang một đẳng cấp thiết kế khác biệt. Và kiến ​​trúc kiểu dáng đẹp và hiện đại được bổ sung bởi bảng màu thương hiệu sang trọng gồm đen, bạc và xanh lam trong toàn bộ khuôn viên.</p>
				</div>
				<div class="box top">
					<img src="img/img4.jpg" alt="Image 2">
					<br>
					<strong>MÓN ẨM THỰC PHẨM Việt NAM VÀ QUỐC TẾ TUYỆT VỜI</strong>
					<p>Các món ăn ngon của Việt Nam và quốc tế đang chờ đón bạn tại Le Paul's Kitchen, Café Maris, và quầy bar & sảnh khách trên tầng mái có một không hai của chúng tôi, Crystal Blu. Bạn cũng sẽ tìm thấy những món ăn đường phố địa phương ngon lành chỉ cách chúng tôi vài phút khi khám phá khu vực bãi biển Mỹ Khê xinh đẹp.</p>
				</div>
				<div class="box top">
					<img src="img/img5.jpg" alt="Image 3">
					<br>
					<strong>BÃI BIỂN MỸ KHÊ NỔI TIẾNG THẾ GIỚI BÊN NGOÀI ĐƯỜNG!</strong>
					<p>Stella Maris Beach Đà Nẵng cách bãi biển Mỹ Khê tuyệt đẹp 50m, được Forbes và New York Times bình chọn là một trong những bãi biển đẹp nhất thế giới. Bơi lội, thư giãn và tận hưởng vẻ đẹp mê hoặc của đại dương xanh như pha lê và bán đảo Sơn Trà.</p>
				</div>
			</div>
			<div class="cacbox">
				<div class="box top">
					<img src="img/img6.jpg" alt="Image 1">
					<br>
					<strong>ĐỪNG BỎ LỠ HỒ BƠI TRÊN MÁI CỦA CHÚNG TÔI!</strong>
					<p>Với cảnh hoàng hôn thơ mộng, đường chân trời vô tận và cảnh bình minh tuyệt đẹp nhất mà bạn từng thấy, hồ bơi trên sân thượng của chúng tôi—nằm cạnh Crystal Blu, sảnh khách trên sân thượng—có tầm nhìn bao quát 180 độ ra Bãi biển Mỹ Khê và Bán đảo Sơn Trà tuyệt đẹp. Hãy tụ tập cùng gia đình và bạn bè bên một ly cocktail sảng khoái, ngâm mình sảng khoái và ghi lại một số kỷ niệm.</p>
				</div>
				<div class="box top">
					<img src="img/img1.jpg" alt="Image 2">
					<br>
					<strong>HỌC TẬP LÀ VUI VẺ TẠI STELLA MARIS!</strong>
					<p>Chúng tôi yêu trẻ em tại Stella Maris và Little Stars là một chuyến phiêu lưu học tập kéo dài một giờ, trong đó con bạn sẽ trải nghiệm văn hóa Việt Nam trong sự kết hợp hoàn hảo giữa học tập, tập thể dục và niềm vui phiêu lưu. Được dẫn dắt bởi giáo viên tiếng Anh Việt yêu trẻ. Kính mời quý phụ huynh tham gia!</p>
				</div>
				<div class="box top">
					<img src="img/img3.jpg" alt="Image 3">
					<br>
					<strong>BẠN xứng đáng được TRẺ HÓA - SỰ ĐẶC BIỆT CỦA CHÚNG TÔI</strong>
					<p>Bạn xứng đáng được nghỉ ngơi, sảng khoái và trẻ hóa tại... Rejuvena—trung tâm chăm sóc sức khỏe và spa Stella Maris Beach Đà Nẵng. Tại đây bạn sẽ được trải nghiệm thư giãn và chữa lành, đây sẽ là một trong những điểm nổi bật trong trải nghiệm kỳ nghỉ ở bãi biển của bạn. Trở về nhà với một sức sống và năng lượng mới hơn bao giờ hết.</p>
				</div>
			</div>
		</div>
		
	</div>
	
		<br>
	<div class="content2">
		<div class="content21">
        <h2><strong>Gợi ý phòng đơn</strong></h2>
			<?php
			  for ($i = 1; $i <= 4 ; $i++)
			  {
				 
			?>
        	<div class="image-description" style="height: 300px; ">
				<div class="image" >
					<a href="">
						<img src="images/<?php echo $anhphong[$i]?>" alt="" style="height: 300px;">
					</a>
				</div>
				<div class="description" style="margin-left: 40px; display: flex;flex-direction: column">
					<div class="descriptioncon">
					<h4><strong>Mô tả</strong></h4>
					<p class="description-text"><?php echo $description0[$i] ?></p>
				</div>
				<a href="danhsachphongks.php" style="margin-top: 12px;"><button>Đặt phòng</button></a>
			</div>	
        </div>
			 <?php  
				  }
				  ?>
    </div>
	</div>
		<br>

	<div class="content">
		<h2 style="margin-left: 40%;" ><strong>Đặt phòng ngay</strong></h2>
	</div>
		<br>

	<div class="content2" style="justify-content: space-between;" >
		<?php
			  for ($i = 1; $i <= 3 ; $i++)
			  {
				 
			?>
		<div class="khoi"  style=" width: 32%;">
				 <img src="images/<?php echo $anhphong[$i]?>" alt="Card image" style="height: 300px; width: 100%; border-radius: 8px;">
				 <div class="card-body">
					<h4 class="card-title">Hà Nội</h4>
					<p class="card-text">Nhanh tay nào!</p>
					
					 <a href=""><button>Đặt phòng</button></a>
				 </div>
		</div>
		<?php
			  }
		?>

	</div>
	<br>
	
	</div>
	
	
	
</body>
</html>