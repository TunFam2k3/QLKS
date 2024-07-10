<?php
session_name('admin');
session_start();
if (!isset($_SESSION['useradmin'])) {
    header('Location: dangnhapadmin.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/your-font-awesome-kit-id.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">


    <title>Admin-Trang chủ</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            height: 100vh;
            overflow: hidden;
        }

        .containeradmin {
            display: flex;
            height: 100vh;
        }

        .sidebar {
            background-color: cadetblue;
            color: #fff;
            padding: 20px;
            min-width: 250px;
            height: 100vh;
            overflow-y: auto;
        }

        .sidebar .sidebar-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .sidebar .logo {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 10px;
            border: 3px solid rgba(244, 129, 61, 1.00);
            transition: transform 0.3s ease-in-out;
        }

        .sidebar .logo:hover {
            transform: scale(1.01);
            cursor: pointer;
        }

        .sidebar .username {
            color: #fff;
            margin-top: 10px;
            font-weight: bold;
        }

        .sidebar h1 {
            margin-bottom: 20px;
            font-size: 1.5em;
            text-align: center;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar li {
            margin-bottom: 10px;
        }

        .sidebar a {
            text-decoration: none;
            color: #fff;
            padding: 12px;
            display: block;
            border-radius: 8px;
            transition: background-color 0.3s ease-in-out;
        }

        .sidebar a:hover {
            background: rgba(19, 99, 222, 1.00);
        }

        .sidebar .submenu {
            display: none;
            padding-left: 10px;
            /* border: 1px solid #fff;
            margin-top:6px;
            margin-left:16px;
            padding-left:0px; */
        }

        .sidebar .submenu li {
            margin-bottom: 5px;
            margin: 0 5px 5px 5px;
        }

        .sidebar .parent-item.active .submenu {
            display: block;
        }

        .sidebar .submenu.active {
            display: block;
        }

        .content {
            padding: 20px;
            flex-grow: 1;
            background-color: #f4f4f4;
        }


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
            background-color: rgba(19, 79, 192, 1.00);
        }
        main{
            overflow: scroll;
        }
        
    </style>

    </style>
</head>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "anh";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$useradmin = $_SESSION['useradmin'];
$sql = "SELECT avt, hoten FROM nguoidung WHERE username = '$useradmin'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $avatar = $row['avt'];
        $hoten = $row['hoten'];
    }
}

$conn->close();
?>

<body>
    <div class="containeradmin">
        <aside class="sidebar">
            <div class="sidebar-header">
                <?php
                if (isset($avatar)) {
                    echo '<img src="' . $avatar . '" alt="Avatar" class="logo">';
                }
                ?>
                <p class="username"><?php echo isset($hoten) ? $hoten : $_SESSION['useradmin']; ?></p>
            </div>
            <h1>Trang quản trị</h1>
            <hr>
            <ul>
                
                <li class="parent-item">
                    <a id="thongke" href="#"><i class="fa-solid fa-chart-simple"></i> Thống kê</a>
                    <ul class="submenu">
                        <li><a href="indexadmin.php?danhmuc=thongketheothoigian">Thống kê đặt phòng</a></li>
                        <li><a href="indexadmin.php?danhmuc=thongketheoloaiphong">Thống kê theo loại phòng </a></li>
                    </ul>
                </li>
                <li class="parent-item">
                    <a id="quanlytaikhoan" href="#"><i class="fa-solid fa-users"></i> Quản lý khách hàng</a>
                    <ul class="submenu">
                        <li><a href="indexadmin.php?danhmuc=thongtinnguoidung">Thông tin khách hàng</a></li>
                        <li><a href="indexadmin.php?danhmuc=danhsachtaikhoan">Tài khoản khách hàng</a></li>
                    </ul>
                </li>
                <li class="parent-item">
                    <a id="quanlyphong" href="#"><i class="fa-solid fa-bed"></i> Quản lý phòng</a>
                    <ul class="submenu">
                        <li><a href="indexadmin.php?danhmuc=danhsachphong">Danh sách phòng</a></li>
                        <li><a href="indexadmin.php?danhmuc=danhsachdatphong">Danh sách đặt phòng</a></li>
                        <li><a href="indexadmin.php?danhmuc=xacnhandatphong">Danh sách phòng chờ xác nhận</a></li>
                        <li><a href="indexadmin.php?danhmuc=lsdp">Lịch sử đặt phòng</a></li>
                        <li><a href="indexadmin.php?danhmuc=dspctt">Danh sách phòng chưa thanh toán</a></li>
                    </ul>
                </li>
                <li class="parent-item"> 
                    <a href="#">Quản lý dịch vụ</a>
                    <ul class="submenu"> 
                        <li><a href="indexadmin.php?danhmuc=danhsachdichvu">Danh sách dịch vụ</a></li>
                        <li><a href="indexadmin.php?danhmuc=danhsachdatdichvu">Danh sách đặt dịch vụ</a></li>
                    </ul>
                </li>
                <li class="parent-item"> 
                    <a href="#">Quản lý phản hồi</a>
                    <ul class="submenu"> 
                        <li><a href="indexadmin.php?danhmuc=quanlyphanhoi">Đã đăng ký</a></li>
                        <li><a href="indexadmin.php?danhmuc=quanly_phanhoikhachhang">Chưa đăng ký</a></li>
                    </ul>
                </li>

                
            </ul>
            <hr>
            <a href="dangxuatadmin_controller.php" class="logout-button">
                <i class="fa-solid fa-right-from-bracket fa-bounce" style="color: #f7f7f8; margin-right: 4px;"></i> Đăng xuất
            </a>
        </aside>
        <main class="content">
            <div class="content-section">
                <?php include('main.php')?>
            </div>
        </main>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var parentItems = document.querySelectorAll(".parent-item");

            parentItems.forEach(function(item) {
                item.addEventListener("mouseenter", function() {
                    var submenu = this.querySelector(".submenu");
                    submenu.classList.add("active");
                });

                item.addEventListener("mouseleave", function() {
                    var submenu = this.querySelector(".submenu");
                    submenu.classList.remove("active");
                });
            });
            
            var quanLyTaiKhoanLink = document.getElementById("quanlytaikhoan");
            var quanLyPhongLink = document.getElementById("quanlyphong");
            var thongKeLink = document.getElementById("thongke");
            
            quanLyTaiKhoanLink.addEventListener("click", function(event) {
                event.preventDefault();
            });
            
            quanLyPhongLink.addEventListener("click", function(event) {
                event.preventDefault();
            });
            
            thongKeLink.addEventListener("click", function(event) {
                event.preventDefault();
            });
        });
    </script>

</body>
</html>