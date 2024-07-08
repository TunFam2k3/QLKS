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
    <style>
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
<body>
    <div class="wrapper">
        <div class="header">
            <div class="child1">
                <div class="child11"><img src="pic/logodaidien.png" alt=""></div>
                <div class="child11" style="width: 50%;">
                   <?php
                        if(isset($_SESSION['userclient'])) {
							    ?>
						<marquee behavior="scroll" direction="right" scrollamount="10" style="font-size: 24px; "><?php echo "Welcome " . $_SESSION['userclient'] . "!<br>";?></marquee>
					<?php
						}?>
				
               </div>
                <div class="child11" style="display: flex;">
                    <?php
                    if(isset($_SESSION['userclient'])) {
						echo '<a href="dienthongtinnguoidung.php"><img src="pic/nendangnhap.jpg" class="anhdaidien" style="width: 50px; height: 50px; border-radius: 50%;border: 3px solid rgba(233,138,54,1.00);" alt=""></a>';
                        echo '<a href="dangxuat_controller.php"><button><i class="fa-solid fa-right-from-bracket" style="color: #fff;"></i>Đăng xuất</button></a>';
                    } else {
                        echo '<a href="dangnhapclient.php"><button><i class="fa-regular fa-user" style="color: #fff;"></i>Đăng nhập</button></a>';
                        echo '<a href="dangky.php"><button><i class="fa-solid fa-right-to-bracket" style="color: #f5f5f5;"></i>Đăng ký</button></a>';
                    }
                    ?>
                </div>
            </div>
            <div class="child2">
                <div class="menu">
                    <a href="index.php"><i class="fa-solid fa-house" style="color: #000000;"></i>Home</a>
                    
                    <a href="danhsachphongks.php"><i class="fa-solid fa-bed" style="color: #000000;"></i>Đặt phòng</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

