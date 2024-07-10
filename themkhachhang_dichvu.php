
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<script src="ckeditor/ckeditor.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
      
<style>
    body {
        font-family: Arial, sans-serif;
        background: url(https://th.bing.com/th/id/R.879c522d63acf0e33c3be4c33549937b?rik=7UdDaNUaVeLTVg&riu=http%3a%2f%2fwww.czxww.cn%2fmobile%2fpic%2f2022-09%2f13%2f1329091_3f8d51f0-8361-433f-a6ec-950103e267d8.jpg.2&ehk=Pes%2fid5U%2b7jLKMZhmk%2bpugqsR8dxDEeWmij6OqZVTr8%3d&risl=&pid=ImgRaw&r=0);
		background-size: cover;
    }
    .container {
        max-width: 400px;
        margin: 0 auto;
        padding: 24px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0px 8px 16px black;
		margin-top: 8%;
		
    }
	.container:hover{
		transform: scale(1.01);
	}
    h1 {
        text-align: center;
        color: #FF5733;
    }
    table {
        width: 100%;
		
    }
    table tr {
        text-align: left;
    }
    table tr td {
        padding: 10px;
    }
    input[type="number"],
    input[type="text"],
    input[type="file"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    input[type="submit"] {
        background-color: #FF5733;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        cursor: pointer;
    }
    input[type="submit"]:hover {
        background-color: #FF7044;
    }
</style>
	
<?php
	$sobg=15;
		$db="anh";
		$conn=new mysqli("localhost","root","",$db) or die ("Không connect đc với máy chủ");



				

                $querydichvu = "SELECT * FROM dichvu";
                $queryanhhh = "SELECT * FROM anhhh" ;
                
                $resultdichvu = mysqli_query($conn, $querydichvu);
                $resultanhhh = mysqli_query($conn, $queryanhhh);
		
			
				$stt_hang=0;
			while($row = mysqli_fetch_object($resultdichvu))
			{
			
			$stt_hang++;
			$ten_dichvu[$stt_hang]=$row->ten_dichvu;	
		    }
            while($row = mysqli_fetch_object($resultanhhh))
			{
			
			$stt_hang++;
			$id_phong[$stt_hang]=$row->id_phong;	
			$tinhtrang[$stt_hang]=$row->tinhtrang;	

		    }
	 

	
	
	
	
	

	$tong_bg = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `dichvu`"));
	mysqli_close($conn);
	
	
	
		
	
	?>
</head>

<body>
    <div class="container">
        <h1>Thông tin khách đặt</h1>
        <form action="add_datdichvucontroller.php" method="POST" enctype="multipart/form-data">
            <table class="tab-content ">
				<tr>
                    <td>Tên khách hàng</td>
                    <td><input type="text" name="ten_khach" required></td>
                </tr>
                <tr>
                <td>ID phòng</td>
                    <td><select class="form-select "  name="id_phong" id="">
						<?php for($i=1;$i<=150;$i++){
                            if($tinhtrang[$i]=="Đã đặt"){
						?>
							<option name="id_phong" value="<?php echo $id_phong[$i] ?>"><?php echo $id_phong[$i]?></option>
						<?php
						}}?>
						</select></td>
					
                </tr>

				
				<tr>
                    <td>Tên dịch vụ</td>
                    <td><select class="form-select "  name="ten_dichvu" id="">
						<?php for($i=1;$i<=$tong_bg;$i++){
						?>
							<option name="ten_dichvu" value="<?php echo $ten_dichvu[$i] ?>"><?php echo $ten_dichvu[$i]?></option>
						<?php
						}?>
						</select></td>
                </tr>
				<tr>
                    <td>Số lượng khách hàng</td>
                    <td><input type="number" name="soluong_khachhang" required></td>
                </tr>
				
				<tr>
                    
                    <td><input type="hidden" name="trangthai_datdichvu" value="Chờ xác nhận"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input  type="submit" value="Xác nhận"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
