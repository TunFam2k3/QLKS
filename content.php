<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css" rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
	<style>
		
		body{
			margin: 0;
			padding: 0;
			font-family:Arial, "Gill Sans", "Gill Sans MT", "Myriad Pro", "DejaVu Sans Condensed", Helvetica, Arial, "sans-serif";
			box-sizing: border-box;
			background-color: #f0f0f0
		}
		
		.content1{
			padding-top: 127px;
			display: flex;
			width: 100%;
			margin: 0 auto;
            min-height: calc(300px - 100px);
            
		}
		.child1_content {
			width: 100%;
			height: 300px;
			display: flex;
			background-color: linear-gradient(90deg, rgba(2,0,36,1), rgba(241,242,245,1) , rgba(0,212,255,1));
			justify-content: center;
    		align-items: center;
		}
		.child1_content img{
			width: 80%;
			margin-left:50%;
			transform: translateX(-50%);
			height: 300px;
		}
		.content2{
			background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
			padding: 8px;
			display: flex;
			width: 80%;
			margin: 0 auto;
		}
		.content21{
			
			margin-top: 52px;
			width: 100%;
		}
		.button-container{
			height: 48px;
			
		}
		.button-container button{
			border-radius: 16px;
			padding: 8px;
			border: 1px;
			font-weight: 700;
			background-color:#C8CCCE; 
			background-color:#00aaff; 
			
		}
		.button-container button:hover{
			cursor: pointer;
			opacity: 0.7;
		}
		.image-container img{
			
			height: 200px;
			margin-right: 8px;
			border-radius: 6px;
		}
		.content21 a>img{
			width: 100%;
			height: 150px;
			
			border-radius: 6px;
		}
		h2>strong{
			display: inline;
			max-width: 100%;
		}
		.image-description{
			margin-top: 50px;
			display: flex;
		}
		.image a>img{
			height: 200px;
			width: 600px;
			z-index: -1;
		}
		
		.description button{
			padding: 8px;
			margin-right: 12px;
			border-radius: 8px;
			border: 1px solid ;
			background-color: #FF0000;
			font-weight: 700;
			color: rgba(255,255,255,1.00);
		}.description button:hover{
			cursor: pointer;
			opacity: 0.7;
		}
		.khoi button{
			padding: 8px;
			margin-right: 12px;
			border-radius: 8px;
			border: 1px solid ;
			background-color: #FF0000;
			font-weight: 700;
			color: rgba(255,255,255,1.00);
		}.khoi button:hover{
			cursor: pointer;
			opacity: 0.7;
		}
		.khoi img{
			
			width: calc(90%);
		}
		
		.slide{
			height: 300px;
		}
		.carousel-item{
			height: 300px;
			background-size: contain;
		}
		.container-fluid{
			margin: 0;
			padding: 0;
			z-index: -2;
		}
		
		.khoi:hover{
			transform: scale(1.01);
			cursor: pointer;
			
			border-radius: 8px;
		
		}
		
		.descriptioncon{
			overflow: scroll;
		}
		.content2 {
			background-color: #fff;
			border-radius: 10px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
			padding: 8px;
			display: flex;
			justify-content: space-between;
			margin: 0 auto;
		}

		.box {
			width: 30%; 
			padding: 10px;
			box-sizing: border-box;
			text-align: center;
			margin-top: 20px;
			margin-bottom: 20px;
		}

		.box img {
			width: 100%;
			max-width: 100px;
			height: auto;
		}

		.top {
			margin-top: 20px;
		}

		.box strong {
			font-weight: bold;
		}

		.box p {
			font-size: 14px;
			margin-top: 10px;
		}
		.cacbox{
			display: flex;
		}
		

	</style>
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
	<div class="container-fluid " style="display:flex;padding-top:100px;">
		
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
                    <img src="https://img-s-msn-com.akamaized.net/tenant/amp/entityid/AA11N9kp.img"
                        alt="Los Angeles" class="d-block w-100">
                </div>
                <div class="carousel-item active">
                    <img src="https://img-s-msn-com.akamaized.net/tenant/amp/entityid/AA11N9kp.img"
                        alt="Chicago" class="d-block w-100">
                </div>
                <div class="carousel-item active">
                    <img src="https://img-s-msn-com.akamaized.net/tenant/amp/entityid/AA11N9kp.img"
                        alt="New York" class="d-block w-100">
                </div>
            </div>

            <!-- Left and right controls/icons -->
            <button class="carousel-control-prev" style="margin-top:150px;"  type="button" data-bs-target="#demo" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" style="margin-top:150px;" type="button" data-bs-target="#demo" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
	</div>
	<div class="container-fluid">
	
		
		
	
		<div class="content2"style="margin-bottom: 30px; margin-top: 20px;">
		<div class="content21 container">
		        <h2><strong>Vì sao lại chọn CHTravel </strong></h2>
				<div class="cacbox">
					<div class="box top">
				<img src="HinhAnh/Icon1.png" alt="Image 1">
				<br>
				<strong>Mạng bán tour</strong>
				<p>Ứng dụng công nghệ mới nhất</p>
			</div>
			<div class="box top">
				<img src="HinhAnh/Icon2.png" alt="Image 2">
				<br>
				<strong>Sản phẩm & Dịch vụ</strong>
				<p>Đa dạng – Chất lượng – An toàn</p>
			</div>
			<div class="box top">
				<img src="HinhAnh/Icon3.png" alt="Image 3">
				<br>
				<strong>Giá cả</strong>
				<p>Luôn có mức giá tốt nhất</p>
			</div>
			<div class="box">
				<img src="HinhAnh/Icon4.png" alt="Image 4">
				<br>
				<strong>Đặt tour</strong>
				<p>Dễ dàng & nhanh chóng chỉ với 3 bước</p>
			</div>
			<div class="box">
				<img src="HinhAnh/Icon5.png" alt="Image 5">
				<br>
				<strong>Thanh toán</strong>
				<p>An toàn & linh hoạt</p>
			</div>
			<div class="box">
				<img src="HinhAnh/Icon6.png" alt="Image 6">
				<br>
				<strong>Hỗ trợ</strong>
				<p>Hotline & trực tuyến (08h00 - 22h00)</p>
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
		<h2 align="center" ><strong>Đặt phòng ngay</strong></h2>
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