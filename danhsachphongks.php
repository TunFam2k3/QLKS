
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css" rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
		
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
			
        }

        .containerb {
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
		.containerb img{
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

		
		.container-fluidb{
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
<?php 

include './header.php';
if (!isset($_SESSION['userclient'])) {
    header('Location: dangnhapclient.php');
    exit;
}

	include 'chat.php';
	
?>
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
	
	
	
	<div class="container-fluid " style="padding-top:80px;">
		
		<div id="demo" class="carousel slide" data-bs-ride="carousel">

            <!-- Indicators/dots -->
            <div class="carousel-indicators">
				<button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
			<?php
			  for ($i = 2; $i <= $tong_bg ; $i++)
			  {
			?>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="<?php echo $i-1?>"></button>
                <?php }?>
            </div>

            <!-- The slideshow/carousel -->
            <div class="carousel-inner">
				<div class="carousel-item active">
                    <img src="images/<?php echo $anhphong[1]?>"
                        alt="slide 0" class="d-block w-100 h-100">	
                </div>
			<?php
			  for ($i = 2; $i <=$tong_bg ; $i++)
			  {
			?>
                <div class="carousel-item ">
				<img src="images/<?php echo $anhphong[$i]?>"
                        alt="slide <?php echo $i-1?>" class="d-block w-100 h-100">
                </div>
				<?php }?>
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
	
	<div class="container-fluidb head" style="display: flex;">
		
		<div id="demo"  style="margin-top: 30px;width:100%;
		height:50px;">
           
        </div>
	</div>
	<div class="containerb">
		<a href="#phongdon"><button style="background-color: #3498db;" class="btn btn-info ">Phòng đơn</button></a>
		<a href="#phongdoi"><button style="background-color: #3498db;" class="btn btn-info ">Phòng đôi</button></a>
		<a href="#phonggiadinh"><button style="background-color: #3498db;" class="btn btn-info ">Phòng gia đình</button></a>
		<a href="#phongsuite"><button style="background-color: #3498db;" class="btn btn-info ">Phòng Suite</button></a>
	</div>
	<div class="containerb">
		<h2 id="phongdon">Danh sách phòng đơn</h2>
		<form class="form-label " method="POST"> 
			
			<input type="search" name ="timtheophong" placeholder="Timloaiphong">

			<input type="submit" value="Lọc" style="background-color: #3498db; color: #fff; border: none; padding: 10px 20px; border-radius: 5px; font-size: 16px; cursor: pointer;">
		</form>
	<?php
	if(isset($inputtimkiem)){
		$inputtimkiem=$_POST['timtheophong'];
		$select="select";}
	?>


	</div>
    <div class="containerb">
		 <?php
			  for ($i = 1; $i <= $tong_bg ; $i++)
			  {
				 
			?>
        <div class="room"  >
           <img src="images/<?php echo $anhphong[$i]?>" style="height: 200px;" alt="Anh phong" >
            <div class="room-description">
                 <h2>Phòng số: <?php echo $i ?></h2>
					
						
				
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
								?> 
								<button data-bs-toggle="modal" data-bs-target="#modal<?php echo $i?>">Đặt phòng</button>
								<?php
							}
							?>
						</div>
					</div>
					 <?php  
				  }
				  ?>
		</div>
		<?php for($i=1;$i<=$tong_bg;$i++){?>
        <Section class="ftco-section">
            <div class="modal" id="modal<?php echo $i?>" style="padding-top: 100px;width: 100%; ">
                <div class="modal-dialog modal-lg  w-100 "> 
                    <div class="modal-content">
                        <div class="modal-header"><strong>Phòng <?php echo $id_hang[$i] ?></strong></div>
                        <div class="modal-body">
                            <?php echo $description0[$i] ?>
                            <p><strong>Địa điểm:</strong> <?php echo $diadiem[$i] ?> </p>
                            <p><strong>Giá:</strong> <?php echo $price0[$i] ?> VND/ ngày </p>
                            <img class="img-fluid " src="images/<?php echo $anhphong[$i]?>"  style="background-size: ; margin-top:20px;margin-bottom:20px; border-radius: 24px; ">
                            
                        </div>
                        <div class="modal-footer">
							<div class="book-button">
								<a href="xacnhandatphong.php?id_phong=<?php echo $id_hang[$i] ?>&diadiem=<?php echo $diadiem[$i] ?>&price=<?php echo $price0[$i] ?>&loaiphong=Phòng đơn"><button class="btn btn-danger ">Đặt phòng</button></a>
							</div>
						</div>
                    </div>
                </div>
            </div>
        </Section>
    <?php }?>
	<div class="containerb">
		<h2 id="phongdoi">Danh sách phòng đôi</h2>
	</div>
	<div class="containerb">
		 <?php
			  for ($i = 1; $i <= $tong_bgbd ; $i++)
			  {
				 
			?>
        <div class="room"  >
           <img src="images/<?php echo $anhphongbd[$i]?>" style="height: 200px;" alt="Anh phong" >
            <div class="room-description">
                 <h2>Phòng số: <?php echo $i ?></h2>
				 <p id="short-description-<?php echo $i; ?>"><?php echo substr($description0giadinh[$i], 0, 200) . '...'; ?></p><!--Hiênr thị 200 chữ đầu tiên-->

					
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
								?> 
								<button data-bs-toggle="modal" data-bs-target="#modal1<?php echo $i?>">Đặt phòng</button>
								<?php
							}
							?>
						</div>
					</div>
					 <?php  
				  }
				  ?>
		</div>
		<?php for($i=1;$i<=$tong_bgbd;$i++){?>
        <Section class="ftco-section">
            <div class="modal" id="modal1<?php echo $i?>" style="padding-top: 100px;width: 100%; ">
                <div class="modal-dialog modal-lg  w-100 "> 
                    <div class="modal-content">
                        <div class="modal-header"><strong>Phòng <?php echo $id_hangbd[$i] ?></strong></div>
                        <div class="modal-body">
                            <?php echo $description0bd[$i] ?>
                            <p><strong>Địa điểm:</strong> <?php echo $diadiembd[$i] ?> </p>
                            <p><strong>Giá:</strong> <?php echo $price0bd[$i] ?> VND/ ngày </p>
                            <img class="img-fluid " src="images/<?php echo $anhphongbd[$i]?>"  style="background-size: ; margin-top:20px;margin-bottom:20px; border-radius: 24px; ">
                            
                        </div>
                        <div class="modal-footer">
							<div class="book-button">
								<a href="xacnhandatphong.php?id_phong=<?php echo $id_hangbd[$i] ?>&diadiem=<?php echo $diadiembd[$i] ?>&price=<?php echo $price0bd[$i] ?>&loaiphong=Phòng đôi"><button class="btn btn-danger ">Đặt phòng</button></a>
							</div>
						</div>
                    </div>
                </div>
            </div>
        </Section>
    <?php }?>
	
	
	<div class="containerb">
		<h2 id="phonggiadinh">Danh sách phòng gia đình</h2>
	</div>
	<div class="containerb">
		 <?php
			  for ($i = 1; $i <= $tong_bggiadinh ; $i++)
			  {
				 
			?>
        <div class="room"  >
           <img src="images/<?php echo $anhphonggiadinh[$i]?>" style="height: 200px;" alt="Anh phong" >
            <div class="room-description">
                 <h2>Phòng số: <?php echo $i ?></h2>
				 <p id="short-description-<?php echo $i; ?>"><?php echo substr($description0giadinh[$i], 0, 200) . '...'; ?></p><!--Hiênr thị 200 chữ đầu tiên-->
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
								?> 
								<button data-bs-toggle="modal" data-bs-target="#modal2<?php echo $i?>">Đặt phòng</button>
								<?php
							}
							?>
						</div>
					</div>
					 <?php  
				  }
				  ?>
		</div>
		<?php for($i=1;$i<=$tong_bggiadinh;$i++){?>
        <Section class="ftco-section">
            <div class="modal" id="modal2<?php echo $i?>" style="padding-top: 100px;width: 100%; ">
                <div class="modal-dialog modal-lg  w-100 "> 
                    <div class="modal-content">
                        <div class="modal-header"><strong>Phòng <?php echo $id_hanggiadinh[$i] ?></strong></div>
                        <div class="modal-body">
                            <?php echo $description0giadinh[$i] ?>
                            <p><strong>Địa điểm:</strong> <?php echo $diadiemgiadinh[$i] ?> </p>
                            <p><strong>Giá:</strong> <?php echo $price0giadinh[$i] ?> VND/ ngày </p>
                            <img class="img-fluid " src="images/<?php echo $anhphonggiadinh[$i]?>"  style="background-size: ; margin-top:20px;margin-bottom:20px; border-radius: 24px; ">
                            
                        </div>
                        <div class="modal-footer">
							<div class="book-button">
								<a href="xacnhandatphong.php?id_phong=<?php echo $id_hanggiadinh[$i] ?>&diadiem=<?php echo $diadiemgiadinh[$i] ?>&price=<?php echo $price0giadinh[$i] ?>&loaiphong=Phòng gia đình"><button class="btn btn-danger ">Đặt phòng</button></a>
							</div>
						</div>
                    </div>
                </div>
            </div>
        </Section>
    <?php }?>
	
	
	<div class="containerb">
		<h2 id="phongsuite">Danh sách phòng Suite</h2>
	</div>

	<div class="containerb">
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
							} else { ?> 
								<button data-bs-toggle="modal" data-bs-target="#modal3<?php echo $i?>">Đặt phòng</button>
								<?php
							}
							?>
						</div>
					</div>
					 <?php  
				  }
				  ?>
		</div>


		<?php for($i=1;$i<=$tong_bgsuite;$i++){?>
        <Section class="ftco-section">
            <div class="modal" id="modal3<?php echo $i?>" style="padding-top: 100px;width: 100%; ">
                <div class="modal-dialog modal-lg  w-100 "> 
                    <div class="modal-content">
                        <div class="modal-header"><strong>Phòng <?php echo $id_hangsuite[$i] ?></strong></div>
                        <div class="modal-body">
                            <?php echo $description0suite[$i] ?>
                            <p><strong>Địa điểm:</strong> <?php echo $diadiemsuite[$i] ?> </p>
                            <p><strong>Giá:</strong> <?php echo $price0suite[$i] ?> VND/ ngày </p>
                            <img class="img-fluid " src="images/<?php echo $anhphongsuite[$i]?>"  style="background-size: ; margin-top:20px;margin-bottom:20px; border-radius: 24px; ">
                            
                        </div>
                        <div class="modal-footer">
							<div class="book-button">
								<a href="xacnhandatphong.php?id_phong=<?php echo $id_hangsuite[$i] ?>&diadiem=<?php echo $diadiemsuite[$i] ?>&price=<?php echo $price0suite[$i] ?>&loaiphong=Phòng Suite"><button class="btn btn-danger ">Đặt phòng</button></a>
							</div>
						</div>
                    </div>
                </div>
            </div>
        </Section>
    <?php }?>

     <?php include './footer.php'?>  
</body>
	

</html>
