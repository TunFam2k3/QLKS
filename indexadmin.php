<?php
session_name('admin');
session_start();
if (!isset($_SESSION['useradmin'])) {
    header('Location: dangnhapadmin.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Trang Quản Trị</title>
    <style>
		 .logout-button {
            background-color: rgba(19, 99, 222, 1.00);
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease-in-out;
            cursor: pointer;
            display: block;
            text-align: center;
            margin-top: 20px;
        }

        .logout-button:hover {
            opacity: 0.7;
        }
			h1 {
			color: #fff;
			font-size: 36px;
			text-shadow: 2px 2px 4px rgba(254, 150, 150, 0.5);
			text-align: center;
			margin-top: 20px;
		}

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;

        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
        }

       aside {
            background-color: #444;
            color: #fff;
            width: 16%;
            padding: 10px;
            float: left;
 			position: sticky; 
            top: 0; 
            height: 100vh;
			font-size: 16px;
			
			
        }

        aside ul {
            list-style-type: none;
            padding: 0;
        }

        aside li {
            margin-bottom: 5px;
			text-align: center
        }

        main {
            padding: 20px;
            margin-left: 220px;
        }

        footer {
            clear: both;
            text-align: center;
            padding: 10px;
        }
		.logo {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin-bottom: 10px;
			border:3px solid rgba(244,129,61,1.00);
        }
		.logo:hover{
			transform: scale(1.01);
			cursor: pointer;
		}

		ul li a{
			color: white;
			text-decoration: none;
			padding: 12px;
			background: rgba(41,122,247,1.00);
			display: block;
			border-radius: 8px;
		}
		ul li{
			width: 100%;
			padding-top: 12px;

		}
        .submenu {
            display: none;
        }
		.submenu li{
			padding: 8px 0px 0px 10%;
			width: 90%;
		}
		.submenu li a{
						background: rgba(243,150,37,1.00);

		}
		.sidebar-header{
			text-align: center
		}
    </style>
    
</head>
<body>
    <header>
        <h1>Trang Quản Trị</h1>
		<?php
        
        if (isset($_SESSION['useradmin'])) {
            echo "<h3>Xin chào " . $_SESSION['useradmin'] . "!<br></h3>";
        }
        ?>
       
    </header>

    <aside >
		<div class="sidebar-header" >
			<img src="pic/logodaidien.png" alt="Logo" class="logo">
			<p class="username"><?php echo $_SESSION['useradmin']; ?></p>
    	</div>
        <ul>
            <li class="parent-item"> 
                <a href="#">Thống kê</a>
                <ul class="submenu"> 
                    <li><a href="indexadmin.php?danhmuc=thongketheothoigian">Thống kê trạng thái đặt phòng</a></li>
                    <li><a href="indexadmin.php?danhmuc=thongketheoloaiphong">Thống kê doanh thu đặt phòng</a></li>
                </ul>
            </li>
			
            <li class="parent-item"> 
                <a href="#">Quản lý tài khoản</a>
                <ul class="submenu"> 
                    <li><a href="indexadmin.php?danhmuc=thongtinnguoidung">Quản lý người dùng</a></li>
                    <li><a href="indexadmin.php?danhmuc=danhsachtaikhoan">Danh sách người dùng</a></li>
                </ul>
            </li>
           
			<li class="parent-item"> 
                <a href="#">Quản lý phòng</a>
                <ul class="submenu"> 
					<li><a href="indexadmin.php?danhmuc=danhsachphong">Danh sách phòng</a></li>
                    <li><a href="indexadmin.php?danhmuc=danhsachdatphong">Danh sách đặt phòng</a></li>
                </ul>
            </li>
				
        </ul>
		<a href="dangxuatadmin_controller.php" class="logout-button">
        <i class="fa-solid fa-right-from-bracket fa-bounce" style="color: #f7f7f8; margin-right: 4px;"></i> Đăng xuất
    </a>
    </aside>

    <main>
		<div class="content-section">
			<?php include('main.php')?>
</div>
    </main>

    <footer>
        <p>&copy; 2023 Trang Quản Trị Team CHT</p>
    </footer>
</body>
	













    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var parentItems = document.querySelectorAll(".parent-item");

            parentItems.forEach(function(item) {
                item.addEventListener("click", function() {
                    var submenu = this.querySelector(".submenu");
                    if (submenu.style.display === "block") {
                        submenu.style.display = "none";
                    } else {
                        submenu.style.display = "block";
                    }
                });

                item.addEventListener("mouseleave", function() {
                    var submenu = this.querySelector(".submenu");
                    submenu.style.display = "none";
                });
            });
        });
        </script>
</html>
