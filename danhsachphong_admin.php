<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List room</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            height: 100vh;
        }

        .container {
            width: 100%;
            margin: 0 auto;
        }

        .search-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .formtimkiem {
            display: flex;
            margin-left: auto;
        }

        .search-input {
            padding: 10px;
            border: 1px solid #007bff;
            border-radius: 4px;
        }

        .search-button {
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 10px 15px;
            cursor: pointer;
            margin-left: 10px;
        }

        button {
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 10px 15px;
            cursor: pointer;
            text-decoration: none;
        }

        .user-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
            float:left;
        }

        .user-card {
            width: 329px;
            margin: 10px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        .user-card img {
            max-width: 100%;
            height: auto;
            border-radius: 50%;
            border: 3px solid #007bff;
        }

        .user-details {
            margin-top: 10px;
        }
        a{
            color:#333;
            text-decoration: none;
        }
        a:hover{
            transform: scale(1.02);
        }
        .user-card:hover{
            background:#ddd;
        }
    </style>
</head>
<body>

<?php
$sobg = 20;
$db = "anh";
$conn = new mysqli("localhost", "root", "", $db) or die("Không connect đc với máy chủ");
$current_page = (isset($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 1;
$search = "";

if (isset($_POST['searchuser'])) {
    $search = $_POST['searchuser'];
}

$offset = ($current_page - 1) * $sobg;

$roomType = isset($_POST['roomType']) ? $_POST['roomType'] : '';

// Kiểm tra nếu không có giá trị hoặc giá trị là rỗng
if (empty($roomType)) {
    // Hiển thị tất cả các phòng
    $select = "SELECT * FROM `anhhh` ORDER BY `id_phong` ASC LIMIT $offset, $sobg";
} else {
    if (!empty($search)) {
        if ($roomType !== 'all') {
            $select = "SELECT * FROM `anhhh` WHERE (`hoten` LIKE '%$search%' OR `gioitinh` LIKE '%$search%' OR `ngaysinh` LIKE '%$search%' OR `sdt` LIKE '%$search%' OR `diachi` LIKE '%$search%') AND `loaiphong` = '$roomType' LIMIT $offset, $sobg";
        } else {
            // Hiển thị tất cả các phòng khi chọn "Tất cả"
            $select = "SELECT * FROM `anhhh` ORDER BY `id_phong` ASC LIMIT $offset, $sobg";
        }
    } else {
        if ($roomType !== 'all') {
            $select = "SELECT * FROM `anhhh` WHERE `loaiphong` = '$roomType' ORDER BY `id_phong` ASC LIMIT $offset, $sobg";
        } else {
            // Hiển thị tất cả các phòng khi chọn "Tất cả"
            $select = "SELECT * FROM `anhhh` ORDER BY `id_phong` ASC LIMIT $offset, $sobg";
        }
    }
}


$result = mysqli_query($conn, $select);
$tong_bg = mysqli_num_rows(mysqli_query($conn, $select));
?>

<div class="search-container">
    <form method="POST" class="formtimkiem" style="margin-left:50%;">
        <input type="search" id="searchuser" name="searchuser" placeholder="Nhập từ khóa tìm kiếm" class="search-input">
        <input type="submit" value="Tìm kiếm" class="search-button">
    </form>
    <button><a href="indexadmin.php?danhmuc=themphong">Thêm phòng</a></button>
</div>
<div class="info">
    <strong>Tổng số phòng: <?php echo $tong_bg?></strong>
</div>
<form id="roomForm" method="POST" style="padding:8px;">
    <button type="button" onclick="setRoomType('all')">Tất cả</button>
    <button type="button" onclick="setRoomType('Phòng gia đình')">Gia đình</button>
    <button type="button" onclick="setRoomType('Phòng Suite')">Suite</button>
    <button type="button" onclick="setRoomType('Phòng đơn')">Đơn</button>
    <button type="button" onclick="setRoomType('Phòng đôi')">Đôi</button>

    <!-- Thêm một input ẩn để giữ giá trị loại phòng -->
    <input type="hidden" id="roomType" name="roomType" value="">
</form>
<div class="user-list">
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Xác định màu nền dựa trên tình trạng phòng
            $backgroundColor = ($row["tinhtrang"] == 'Đã đặt') ? 'rgba(255, 0, 0, 0.5)' : (($row["tinhtrang"] == 'Đang được đặt') ? 'rgba(255, 255, 0, 0.5)' : 'rgba(144, 238, 144, 0.5)');
            $bgColor = ($row["tinhtrang"] == 'Đã đặt') ? 'red' : (($row["tinhtrang"] == 'Đang được đặt') ? 'yellow' : 'green');

            echo '<div class="user-card " style="background-color: ' . $backgroundColor . ';">';
            echo '<h3>Mã phòng: ' . $row["id_phong"] . '</h3>';
            echo '<p>Loại phòng: ' . $row["loaiphong"] . '</p>';
            echo '<p>Giá: ' . $row["price"] . ' VND</p>';
            echo '<p>Tình trạng: <strong style="background-color: ' . $bgColor . '; padding:4px;border-radius:4px;">' . $row["tinhtrang"] . '</strong></p>';
            // echo '<p>Loại khách hàng: ' . $row["loaikhach"] . '</p>';
            echo '<div class="user-details">';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo "<p>Không có dữ liệu</p>";
    }
    ?>
</div>



<!-- <ul>
    <?php
    $sql = "SELECT COUNT(*) AS total FROM datphong";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $totalRecords = $row["total"];
        $totalPages = ceil($totalRecords / $sobg);
    }
    for ($i = 1; $i <= $totalPages; $i++) {
        echo "<li><a class='chiso' href='indexadmin.php?danhmuc=thongtinnguoidung&page=$i'>$i</a></li>";
    }
    ?>
</ul> -->

</body>
<script>
// document.addEventListener('DOMContentLoaded', function() {
//     // Đảm bảo tất cả các phần tử đã được tải trước khi gắn sự kiện
//     var buttons = document.querySelectorAll('#roomForm button');
//     buttons.forEach(function(button) {
//         button.addEventListener('click', function() {
//             setRoomType(this.getAttribute('data-room-type'));
//         });
//     });
// });

function setRoomType(type) {
    document.querySelector('#roomType').value = type;
    document.querySelector('#roomForm').submit();
}

</script>

</html>
