	<?php include './header.php';


if (!isset($_SESSION['userclient'])) {
    header('Location: dangnhapclient.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phòng Khách Sạn</title>
	<link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css" rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
		
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
			
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
			margin-bottom: 20px;
			margin-top: 20px;
        }
		.container img{
			border-radius: 10px 10px 0 0;

		}

        .room {
            flex-basis: calc(25% - 20px);
            background-color: #fff;
            border-radius: 10px;
           	border: 1px solid rgba(209,207,207,1.00);
			margin-bottom: inherit;
			float: left;
			
            
        }

        .room:hover {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
            cursor: pointer;
        }

        .room img {
            width: 100%;
            height: auto;
        }

        .room-description {
            padding: 15px;
        }

        .room-description h2 {
            font-size: 18px;
            margin: 0;
        }

        .room-description p {
            font-size: 14px;
            margin: 10px 0;
        }

        .room-button {
            text-align: center;
            padding: 10px;
        }

        .room-button button {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .room-button button:hover {
            background-color: #e74c3c;
        }
		.slide{
			height: 300px;
			display: flex;
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
		.hienthimota {
			
			max-height: 100px; 
			overflow: hidden;
			
		}
		.description-button {
			color: #333; 
			background: #4CAF50; 
			padding: 5px 10px; 
			border-radius: 5px; 
			transition: background 0.3s ease-in-out; 
			display: inline; 
			text-decoration: none; 
		}

		.description-button:hover {
			background: #45a049;
			color: white;
		}
		h2{
			margin-top: 20px;
		}
    </style>
</head>
	
<body>
	
<?php	
		$db="anh";
		$conn=new mysqli("localhost","root","",$db) or die ("Không connect đc với máy chủ");
		
		$selectedLocation = isset($_POST['diadiem']) ? $_POST['diadiem'] : 'all';


		$selectdon = "SELECT * FROM `anhhh` WHERE `loaiphong`='Phòng đơn'";
		$selectdoi = "SELECT * FROM `anhhh` WHERE `loaiphong`='Phòng đôi'";
		$selectgiadinh = "SELECT * FROM `anhhh` WHERE `loaiphong`='Phòng gia đình'";
		$selectsuite = "SELECT * FROM `anhhh` WHERE `loaiphong`='Phòng Suite'";

		if ($selectedLocation != "all") {
			$selectdon .= " AND `diadiem`='$selectedLocation'";
			$selectdoi .= " AND `diadiem`='$selectedLocation'";
			$selectgiadinh .= " AND `diadiem`='$selectedLocation'";
			$selectsuite .= " AND `diadiem`='$selectedLocation'";
		}
				$result = mysqli_query($conn, $selectdon);
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
			$loaiphong[$stt_hang]=$row->loaiphong;	
		}
	$tong_bg = mysqli_num_rows(mysqli_query($conn, $selectdon));
	


					$bd = mysqli_query($conn, $selectdoi);
				$stt_hangbd=0;
			while($row = mysqli_fetch_object($bd))
			{
			
			$stt_hangbd++;
			$id_hangbd[$stt_hangbd]=$row->id_phong;
			$price0bd[$stt_hangbd]=$row->price;
			$description0bd[$stt_hangbd]=$row->description;
			$anhphongbd[$stt_hangbd]=$row->anhphong;
			$tinhtrangbd[$stt_hangbd]=$row->tinhtrang;
			$diadiembd[$stt_hangbd]=$row->diadiem;	
			$loaiphongbd[$stt_hangbd]=$row->loaiphong;	
		}
	$tong_bgbd = mysqli_num_rows(mysqli_query($conn, $selectdoi));
	
	
	
		$giadinh = mysqli_query($conn, $selectgiadinh);
				$stt_hanggiadinh=0;
			while($row = mysqli_fetch_object($giadinh))
			{
			
			$stt_hanggiadinh++;
			$id_hanggiadinh[$stt_hanggiadinh]=$row->id_phong;
			$price0giadinh[$stt_hanggiadinh]=$row->price;
			$description0giadinh[$stt_hanggiadinh]=$row->description;
			$anhphonggiadinh[$stt_hanggiadinh]=$row->anhphong;
			$tinhtranggiadinh[$stt_hanggiadinh]=$row->tinhtrang;
			$diadiemgiadinh[$stt_hanggiadinh]=$row->diadiem;	
			$loaiphonggiadinh[$stt_hanggiadinh]=$row->loaiphong;	
		}
	$tong_bggiadinh = mysqli_num_rows(mysqli_query($conn, $selectgiadinh));
	
	

	$suite = mysqli_query($conn, $selectsuite);
				$stt_hangsuite=0;
			while($row = mysqli_fetch_object($suite))
			{
			
			$stt_hangsuite++;
			$id_hangsuite[$stt_hangsuite]=$row->id_phong;
			$price0suite[$stt_hangsuite]=$row->price;
			$description0suite[$stt_hangsuite]=$row->description;
			$anhphongsuite[$stt_hangsuite]=$row->anhphong;
			$tinhtrangsuite[$stt_hangsuite]=$row->tinhtrang;
			$diadiemsuite[$stt_hangsuite]=$row->diadiem;	
			$loaiphongsuite[$stt_hangsuite]=$row->loaiphong;	
		}
	$tong_bgsuite = mysqli_num_rows(mysqli_query($conn, $selectsuite));
	mysqli_close($conn);

	?>
	
	
	
	
	
	<div class="container-fluid head" style="display: flex;">
		
		<div id="demo"  style="margin-top: 150px;width:100%;
		height:50px;">
           
        </div>
	</div>
	<div class="container">
		<a href="#phongdon"><button>Phòng đơn</button></a>
		<a href="#phongdoi"><button>Phòng đôi</button></a>
		<a href="#phonggiadinh"><button>Phòng gia đình</button></a>
		<a href="#phongsuite"><button>Phòng Suite</button></a>
	</div>
	<div class="container">
		<h2 id="phongdon">Danh sách phòng đơn</h2>
		<form method="POST"> 
			<label for="diadiem" style="font-weight: bold;">Chọn địa điểm:</label>
			<select id="diadiem" name="diadiem" style="padding: 5px; border: 1px solid #ccc; border-radius: 5px;">
				<option value="all">Tất cả địa điểm</option>
				<?php
					$tinhThanhList = array(
					"Hà Nội", "Hồ Chí Minh", "Đà Nẵng", "Hải Phòng", "Bà Rịa - Vũng Tàu",
					"An Giang", "Bạc Liêu", "Bắc Kạn", "Bắc Giang", "Bắc Ninh",
					"Bến Tre", "Bình Dương", "Bình Định", "Bình Phước", "Bình Thuận",
					"Cà Mau", "Cao Bằng", "Cần Thơ", "Đắk Lắk", "Đắk Nông",
					"Điện Biên", "Đồng Nai", "Đồng Tháp", "Gia Lai", "Hà Giang",
					"Hà Nam", "Hà Tĩnh", "Hải Dương", "Hậu Giang", "Hưng Yên",
					"Khánh Hòa", "Kiên Giang", "Kon Tum", "Lai Châu", "Lâm Đồng",
					"Lạng Sơn", "Lào Cai", "Long An", "Nam Định", "Nghệ An",
					"Ninh Bình", "Ninh Thuận", "Phú Thọ", "Phú Yên", "Quảng Bình",
					"Quảng Nam", "Quảng Ngãi", "Quảng Ninh", "Quảng Trị", "Sóc Trăng",
					"Sơn La", "Tây Ninh", "Thái Bình", "Thái Nguyên", "Thanh Hóa",
					"Thừa Thiên Huế", "Tiền Giang", "Trà Vinh", "Tuyên Quang", "Vĩnh Long",
					"Vĩnh Phúc", "Yên Bái"
				);

				foreach ($tinhThanhList as $tinhThanh) {
					echo '<option value="' . $tinhThanh . '">' . $tinhThanh . '</option>';
				}
    			?>
			</select>
			<input type="search" name ="timtheophong" placeholder="Timloaiphong">

			<input type="submit" value="Lọc" style="background-color: #3498db; color: #fff; border: none; padding: 10px 20px; border-radius: 5px; font-size: 16px; cursor: pointer;">
		</form>
	<?php
		$inputtimkiem=$_POST['timtheophong'];
		$select="select"
	?>


	</div>
    <div class="container">
		 <?php
			  for ($i = 1; $i <= $tong_bg ; $i++)
			  {
				 
			?>
        <div class="room"  >
           <img src="images/<?php echo $anhphong[$i]?>" style="height: 200px;" alt="Anh phong" >
            <div class="room-description">
                 <h2>Mô tả phòng <?php echo $i ?></h2>
					
						<p ><?php echo substr($description0[$i], 0, 100) . '...'; ?></p><!--Hiênr thị 200 chữ đầu tiên--><br>
						<a href="chitietphong.php?id_phong=<?php echo $id_hang[$i]; ?>" >Đọc thêm</a>

				
					<p><?php echo $price0[$i] ?></p>
					<p><strong><?php echo $diadiem[$i] ?></strong></p>
					<?php
					if ($tinhtrang[$i] == "Đã đặt") {
						echo '<p style="color: red;">Đã đặt</p>';
					} else {
						echo '<p style="color: green;">Còn trống</p>';
					}
					?>
						</div>
						<div class="room-button">
							<?php
							if ($tinhtrang[$i] == "Đã đặt") {
								echo '<button onclick="alert(\'Phòng này đã được đặt. Vui lòng chọn phòng khác.\')">Đặt phòng</button>';
							} else {
								echo '<a href="chitietphong.php?id_phong=' . $id_hang[$i] . '"><button>Đặt phòng</button></a>';
							}
							?>
						</div>
					</div>
					 <?php  
				  }
				  ?>
		</div>
	<div class="container">
		<h2 id="phongdoi">Danh sách phòng đôi</h2>
	</div>
	<div class="container">
		 <?php
			  for ($i = 1; $i <= $tong_bgbd ; $i++)
			  {
				 
			?>
        <div class="room"  >
           <img src="images/<?php echo $anhphongbd[$i]?>" style="height: 200px;" alt="Anh phong" >
            <div class="room-description">
                 <h2>Mô tả phòng <?php echo $i ?></h2>
									
					<p ><?php echo substr($description0bd[$i], 0, 200) . '...'; ?></p><!--Hiênr thị 200 chữ đầu tiên-->
						<a href="chitietphong.php?id_phong=<?php echo $id_hangbd[$i]; ?>" >Đọc thêm</a>
					<p><?php echo $price0bd[$i] ?></p>
					<p><strong><?php echo $diadiembd[$i] ?></strong></p>
					<?php
					if ($tinhtrangbd[$i] == "Đã đặt") {
						echo '<p style="color: red;">Đã đặt</p>';
					} else {
						echo '<p style="color: green;">Còn trống</p>';
					}
					?>
						</div>
						<div class="room-button">
							<?php
							if ($tinhtrangbd[$i] == "Đã đặt") {
								echo '<button onclick="alert(\'Phòng này đã được đặt. Vui lòng chọn phòng khác.\')">Đặt phòng</button>';
							} else {
								echo '<a href="chitietphong.php?id_phong=' . $id_hangbd[$i] . '"><button>Đặt phòng</button></a>';
							}
							?>
						</div>
					</div>
					 <?php  
				  }
				  ?>
		</div>
	
	
	<div class="container">
		<h2 id="phonggiadinh">Danh sách phòng gia đình</h2>
	</div>
	<div class="container">
		 <?php
			  for ($i = 1; $i <= $tong_bggiadinh ; $i++)
			  {
				 
			?>
        <div class="room"  >
           <img src="images/<?php echo $anhphonggiadinh[$i]?>" style="height: 200px;" alt="Anh phong" >
            <div class="room-description">
                 <h2>Mô tả phòng <?php echo $i ?></h2>
					 <p id="short-description-<?php echo $i; ?>"><?php echo substr($description0giadinh[$i], 0, 200) . '...'; ?></p><!--Hiênr thị 200 chữ đầu tiên-->
						<a href="chitietphong.php?id_phong=<?php echo $id_hanggiadinh[$i]; ?>" >Đọc thêm</a>
					<p><?php echo $price0giadinh[$i] ?></p>
					<p><strong><?php echo $diadiemgiadinh[$i] ?></strong></p>
					<?php
					if ($tinhtranggiadinh[$i] == "Đã đặt") {
						echo '<p style="color: red;">Đã đặt</p>';
					} else {
						echo '<p style="color: green;">Còn trống</p>';
					}
					?>
						</div>
						<div class="room-button">
							<?php
							if ($tinhtranggiadinh[$i] == "Đã đặt") {
								echo '<button onclick="alert(\'Phòng này đã được đặt. Vui lòng chọn phòng khác.\')">Đặt phòng</button>';
							} else {
								echo '<a href="chitietphong.php?id_phong=' . $id_hanggiadinh[$i] . '"><button>Đặt phòng</button></a>';
							}
							?>
						</div>
					</div>
					 <?php  
				  }
				  ?>
		</div>
	
	
	<div class="container">
		<h2 id="phongsuite">Danh sách phòng Suite</h2>
	</div>

	<div class="container">
		 <?php
			  for ($i = 1; $i <= $tong_bgsuite ; $i++)
			  {
				 
			?>
        <div class="room"  >
           <img src="images/<?php echo $anhphongsuite[$i]?>" style="height: 200px;" alt="Anh phong" >
            <div class="room-description">
                 <h2>Mô tả phòng <?php echo $i ?></h2>
				<p id="short-description-<?php echo $i; ?>"><?php echo substr($description0suite[$i], 0, 200) . '...'; ?></p><!--Hiênr thị 200 chữ đầu tiên-->
						<a href="chitietphong.php?id_phong=<?php echo $id_hangsuite[$i]; ?>" >Đọc thêm</a>
					<p><?php echo $price0suite[$i] ?></p>
					<p><strong><?php echo $diadiemsuite[$i] ?></strong></p>
					<?php
					if ($tinhtrangsuite[$i] == "Đã đặt") {
						echo '<p style="color: red;">Đã đặt</p>';
					} else {
						echo '<p style="color: green;">Còn trống</p>';
					}
					?>
						</div>
						<div class="room-button">
							<?php
							if ($tinhtrangsuite[$i] == "Đã đặt") {
								echo '<button onclick="alert(\'Phòng này đã được đặt. Vui lòng chọn phòng khác.\')">Đặt phòng</button>';
							} else {
								echo '<a href="chitietphong.php?id_phong=' . $id_hangsuite[$i] . '"><button>Đặt phòng</button></a>';
							}
							?>
						</div>
					</div>
					 <?php  
				  }
				  ?>
		</div>

     <?php include './footer.php'?>  
</body>
	

</html>
