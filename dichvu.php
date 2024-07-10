<!DOCTYPE html>
<html lang="en">
<?php 
	include './header.php';
    if(isset($_SESSION['userclient'])){
        include './chat.php';

    }
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
      
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<?php	
		$db="anh";
		$conn=new mysqli("localhost","root","",$db) or die ("Không connect đc với máy chủ");
		
				$select = "SELECT * FROM `dichvu`";
				$result = mysqli_query($conn, $select);
				$stt_hang=0;
			while($row = mysqli_fetch_object($result))
			{
			
			$stt_hang++;
			$id_hang[$stt_hang]=$row->id_dichvu;
            $ten_hang[$stt_hang]=$row->ten_dichvu;
			$price0[$stt_hang]=$row->batdau_dichvu;
            $price1[$stt_hang]=$row->ketthuc_dichvu;
			$description0[$stt_hang]=$row->mota_dichvu;
			$anhphong[$stt_hang]=$row->anh_dichvu;
			$tinhtrang[$stt_hang]=$row->trangthai_dichvu;
			$diadiem[$stt_hang]=$row->diadiem_dichvu;
			
			
		}
	$tong_bg = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `dichvu`"));
	mysqli_close($conn);
	?>

<body>
    <div class="container-fluid " style="display:flex;padding-top:80px;">
            <div id="demo" class="carousel slide" data-bs-ride="carousel">

                <!-- The slideshow/carousel -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="img/img3.jpg"
                            alt="slide 1" class="d-block w-100">	
                </div>
            </div>
        </div>
    </div>
    <?php for($i=1;$i<=$tong_bg;$i++){?>
        <Section class="ftco-section">
        <div class="modal" id="modal<?php echo $i?>" style="padding-top: 100px;width: 100%; ">
            <div class="modal-dialog modal-lg  w-100 "> 
                <div class="modal-content">
                    <div class="modal-header"><strong><?php echo $ten_hang[$i] ?></strong></div>
                    <div class="modal-body">
                        <?php echo $description0[$i] ?>
                        <p><strong>Địa điểm:</strong> <?php echo $diadiem[$i] ?> </p>
                        <p><strong>Thời gian:</strong> <?php echo $price0[$i] ?> - <?php echo $price1[$i] ?> </p>
                        <img class="img-fluid " src="imgsvr/<?php echo $anhphong[$i]?>"   style="background-size: ; margin-top:20px;margin-bottom:20px; border-radius: 24px; ">
                        
                    </div>
                    
                </div>
            </div>
        </div></Section>
    <?php }?>
        
    <section class="ftco-section">
        <div class="container ftco-animate text-center" style="padding-top: 120px;" >
            <h1 class="font-weight-bold mb-5" ><strong>Dịch vụ</strong></h1>
            <?php
			  for ($i = 1; $i <= $tong_bg ; $i++)
			  {if($i%2==0){ 
			?>
            
            <div class="row d-md-flex justify-content-between ">
                
                <div class="col-md-6 ftco-animate img about-image " style="background-size: cover;background-image: url(imgsvr/<?php echo $anhphong[$i]?>); margin-top:20px;margin-bottom:20px; border-radius: 24px; ">
	    		</div>
                <div class="col-md-6 ftco-animate p-md-5 text-wrap">
                    <h2 class="mb-4 "><?php echo $ten_hang[$i] ?></h2>
                    <p><?php 
                    
                        $paragraphs = explode("\n", $description0[$i]);

                        // Lấy hai đoạn đầu tiên từ mảng
                        $first_two_paragraphs = array_slice($paragraphs, 0, 3);
                        
                        // Ghép lại hai đoạn văn thành một chuỗi
                        $result = implode("\n", $first_two_paragraphs);
                        
                        // Hiển thị kết quả
                        echo $result;
                    
                    ?></p>
                    <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modal<?php echo $i?>" >Xem thêm</button>
                    
                </div>
            </div><?php }
            else{ ?>
                <div class="row d-md-flex justify-content-between" style="margin-top:20px;">
                    <div class="col-md-6 ftco-animate p-md-5">
                        <h2><?php echo $ten_hang[$i] ?></h2>
                        <p><?php 
                        
                            $paragraphs = explode("\n", $description0[$i]);

                            // Lấy hai đoạn đầu tiên từ mảng
                            $first_two_paragraphs = array_slice($paragraphs, 0, 3);
                            
                            // Ghép lại hai đoạn văn thành một chuỗi
                            $result = implode("\n", $first_two_paragraphs);
                            
                            // Hiển thị kết quả
                            echo $result;
                        
                        ?></p>
                        <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modal<?php echo $i?>">Xem thêm</button>
                    </div>
                    <div class="col-md-6 ftco-animate img about-image" style="background-size: cover;background-image: url(imgsvr/<?php echo $anhphong[$i]?>); margin-top:20px;margin-bottom:20px;border-radius: 24px;">
                    </div>
                    
                </div>
            <?php } ?>
            <?php } ?>
        </div>
    </secsion>




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
    <?php 
	include './footer.php';
?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="js/main.js"></script>
</html>