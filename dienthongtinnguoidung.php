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

        .con {
			
            display: flex;
            width: 100%;
            max-width: 1200px;
            margin-top: 0 auto;
            padding-top: 100px;
        }

       
        .menuthongtin {
            
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
            
            font-weight: bold;
            transition: color 0.3s ease;
			display: block;
        }

        .menucontent li a:hover {
        
        }

        .contentchinh {
            width: 40%;
            background-color: #fff;
            padding: 20px;
        }
		.noidung{
			width: 60%;
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
