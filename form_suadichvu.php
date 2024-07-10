<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sửa dịch vụ</title>
	<script src="ckeditor/ckeditor.js"></script>

	<?php
			$id_hang0=$_REQUEST["id_dichvu"];
			$db="anh";
			$conn=new mysqli("localhost","root","",$db) or die ("Không connect đc với máy chủ");//tạo kết nối với server
			$select_hangxs="Select * from `dichvu` where id_dichvu=$id_hang0";
			$result_se_hang=mysqli_query($conn,$select_hangxs);
			$row=mysqli_fetch_object($result_se_hang);
				$id_hang0=$row->id_dichvu;
				$price=$row->batdau_dichvu;
                $price1=$row->ketthuc_dichvu;
				$description=$row->mota_dichvu;
				$tinhtrang=$row->trangthai_dichvu;
				$diadiem=$row->diadiem_dichvu;
				

	?>
<style>
        /* Form styling */
        body {
            font-family: Arial, sans-serif;
             background: url(https://th.bing.com/th/id/R.879c522d63acf0e33c3be4c33549937b?rik=7UdDaNUaVeLTVg&riu=http%3a%2f%2fwww.czxww.cn%2fmobile%2fpic%2f2022-09%2f13%2f1329091_3f8d51f0-8361-433f-a6ec-950103e267d8.jpg.2&ehk=Pes%2fid5U%2b7jLKMZhmk%2bpugqsR8dxDEeWmij6OqZVTr8%3d&risl=&pid=ImgRaw&r=0);
			background-size: cover;
        }
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            transition: transform 0.2s ease-in-out;
			margin-top: 8%;
        }
        .container:hover {
            transform: scale(1.01); /* Slightly zoom in on hover */
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
        input[type="file"],
		select{
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
            transition: background-color 0.3s ease-in-out;
        }
        input[type="submit"]:hover {
            background-color: #FF7044;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sửa Phòng</h1> 
        <form action="sua_dichvucontroller.php?id_dichvu=<?php echo $id_hang0?>" method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Thời gian</td>
                    <td><input type="time" name="batdau_dichvu" value="<?php echo $price?>"> <input type="time" name="ketthuc_dichvu" value="<?php echo $price1?>"  ></td>
                    
                </tr>
                <tr>
                    <td>Mô tả</td>
                    <td><textarea name="mota_dichvu" id="description"><?php echo $description?></textarea> </td>
                </tr>
				<tr>
                    <td>Ảnh</td>
                    <td><input type="file" name="anhdichvumoi" ></td>
                </tr>
				<tr>
                    <td>Tình trạng</td>
                    <td><input type="text" name="trangthai_dichvu"  value="<?php echo $tinhtrang?>" ></td>
                </tr>
				
				<tr>
                    <td>Địa điểm</td>
                    <td><input type="text" name="diadiem_dichvu" value="<?php echo $diadiem?>"></td>
					
                </tr>
                
                <tr>
                    <td></td>
                    <td><input type="submit" value="Lưu Thay Đổi"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
	<script>
	CKEDITOR.replace('description');</script>
</html>