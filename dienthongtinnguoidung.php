	<?php include './header.php';


if (!isset($_SESSION['userclient'])) {
    header('Location: dangnhapclient.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Cá Nhân</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .con {
			
            display: flex;
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 200px;
        }

       
        .menuthongtin {
            background-color: rgba(158, 155, 155, 1.00);
            padding: 20px;
			height: 100vh;
			
        }

        .menucontent {
            list-style: none;
            padding: 0;

        }

        .menucontent li {
            display: inline;
            margin-right: 20px;
        }

        .menucontent li a {
            text-decoration: none;
            color: black;
            font-weight: bold;
            transition: color 0.3s ease;
			display: block;
        }

        .menucontent li a:hover {
            color: #007BFF;
        }

        .contentchinh {
            width: 20%;
            background-color: #fff;
            padding: 20px;
        }
		.noidung{
			width: 80%;
		}

    </style>
</head>
<body>
    
    <div class="container">
            <div class="con">
			<div class="contentchinh">
            <div class="menuthongtin">
                <ul class="menucontent">
                    <li><a href="dienthongtinnguoidung.php?xuli=ttcn">Thông tin tài khoản</a></li>
                    <li><a href="dienthongtinnguoidung.php?xuli=doimatkhau">Đổi mật khẩu</a></li>
					<li><a href="dienthongtinnguoidung.php?xuli=lsdp"> Đặt phòng</a></li>
                    <li><a href="dienthongtinnguoidung.php?xuli=lsdvcd">Lịch sử đặt vé chuyến đi </a></li>
                    <li><a href="dienthongtinnguoidung.php?xuli=lsdvdulich">Lịch sử đặt vé tour </a></li>
                    <li><a href="dienthongtinnguoidung.php?xuli=lsdvdiadiem">Lịch sử đặt vé địa điểm </a></li>
                </ul>
            </div>
            
        </div>
		<div class="noidung">
		
					<?php include('xulimain.php')?>
</div>
		</div>
        
    </div>
</body>
	<?php include("footer.php")?>
</html>
