<?php
session_name('client');
session_start(); 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Trang chủ</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">


    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

  
    <style>


            /* CSS cho slider */


        body {
            margin: 0;
            padding: 0;
            font-family: Arial, "Gill Sans", "Gill Sans MT", "Myriad Pro", "DejaVu Sans Condensed", Helvetica, Arial, "sans-serif";
            box-sizing: border-box;
            background-color: #f0f0f0; 
			font-size: bold;
			
        }	
		.header{
			position: fixed;
			z-index: 9999;
			width: 100vw;
			display: flex;
			flex-direction: column;
            
		}
	
        .child1 {
            background-color: aliceblue;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0px 20px 0 0;
        }

        .child1 img {
            height: 100px;
            width: 200px;
        }

        .child1 button {
            padding: 8px;
            margin-right: 12px;
            border-radius: 8px;
            border: 1px solid;
            background-color: rgba(1, 148, 243, 1.00);
            font-weight: 700;
            color: rgba(255, 255, 255, 1.00);
            cursor: pointer;
            transition: opacity 0.3s;
			font-size: 16px;
			opacity: 0.9;
        }

        .child1 button:hover {
            opacity: 0.7;
        }

        .child2 {
            background-color: rgba(242, 243, 243, 1.00);
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);
            position: relative;
			height: 60px;
        }

        .menu {
            width: 50%;
            display: flex;
            margin: 0 auto;
            justify-content: space-around;
        }

        .menu a {
            font-weight: 700;
            padding: 12px 12px;
            text-decoration: none;
            color:rgba(3, 18, 26, 1.00);
            transition: background-color 0.3s;
			opacity: 0.7;
        }

        .menu a:hover,.menu i:hover  {
            background-color: rgba(188, 188, 188, 1.00);
			color: black;
        }
		i{
			margin: 10px 10px 10px 0;
		}


    </style>
</head>
<?php
$current_page = basename($_SERVER['PHP_SELF']); // Lấy tên của trang hiện tại

function isActive($pageName) {
    global $current_page;
    if ($current_page == $pageName) {
        echo 'active';
    }
}
?>
<body>
    <div class="wrapper">
        <div class="header">
            
            <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar ftco-navbar-light" id="ftco-navbar">
                <div class="container">
                    <a class="navbar-brand" href="index.php">Novoland</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="oi oi-menu"></span> Menu
                    </button>
            
                    <div class="collapse navbar-collapse" id="ftco-nav">
                        <ul class="navbar-nav ml-auto">
                        <li class="nav-item <?php isActive('index.php'); ?>" ><a href="index.php" class="nav-link">Home</a></li>
                        <li class="nav-item <?php isActive('gioithieu.php'); ?>"><a href="gioithieu.php" class="nav-link">Giới thiệu</a></li>
                        <li class="nav-item <?php isActive('dichvu.php'); ?>"><a href="dichvu.php" class="nav-link">Dịch vụ</a></li>
                        <li class="nav-item <?php isActive('danhsachphongks.php'); ?>">
                            <a class="nav-link" href="javascript:void(0);" onclick="checkLoginAndRedirect()">Đặt phòng</a>
                        </li>
                        <li class="nav-item <?php isActive('lienhe.php'); ?>"><a href="lienhe.php" class="nav-link">Liên hệ</a></li>
                        <li style="padding-left:80px">
                            <?php
                            if(isset($_SESSION['userclient'])) {
                                echo '<a href="dienthongtinnguoidung.php"><img src="pic/nendangnhap.jpg" class="anhdaidien" style="width: 50px; height: 50px; border-radius: 50%;border: 3px solid rgba(233,138,54,1.00);" alt=""></a>';
                                echo '<li class="nav-item cta"><a href="dangxuat_controller.php" class="nav-link" data-toggle="modal" data-target="#modalRequest"><span>Đăng xuất</span></a></li>';

                            } else {
                                echo '<li class="nav-item cta"><a href="dangnhapclient.php" class="nav-link" data-toggle="modal" data-target="#modalRequest"><span>Đăng nhập</span></a></li>';
                                echo '<li class="nav-item cta"><a href="dangky.php" class="nav-link" data-toggle="modal" data-target="#modalRequest"><span>Đăng ký</span></a></li>';
                            
                            }
                            ?>
                        </li>
                    
                        </ul>
                    </div>
                </div>
            </nav>        
	    </div>
    </div>
</body>
<script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>


  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>


  <script src="js/scrollax.min.js"></script>

  <script src="js/main.js"></script>
  <script>
    function checkLoginAndRedirect() {
        <?php
        if(!isset($_SESSION['userclient'])) {
        ?>
            alert("Vui lòng đăng nhập để đặt phòng");
            window.location.href = "dangnhapclient.php";
        <?php
        }
        else {
            ?>
                window.location.href = "danhsachphongks.php";
            <?php
            }
        ?>
    }
</script>
</html>

