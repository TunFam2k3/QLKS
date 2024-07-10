<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List user</title>
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

if (!empty($search)) {
    $select = "SELECT * FROM `nguoidung` WHERE `hoten` LIKE '%$search%' OR `gioitinh` LIKE '%$search%' OR `ngaysinh` LIKE '%$search%' OR `sdt` LIKE '%$search%' OR `diachi` LIKE '%$search%' LIMIT $offset, $sobg";
} else {
    $select = "SELECT * FROM `nguoidung` ORDER BY `hoten` ASC LIMIT $offset, $sobg";
}

$result = mysqli_query($conn, $select);
$tong_bg = mysqli_num_rows(mysqli_query($conn, $select));
?>

<div class="search-container">
    <form method="POST" class="formtimkiem" style="margin-left:50%;">
        <input type="search" id="searchuser" name="searchuser" placeholder="Nhập từ khóa tìm kiếm" class="search-input">
        <input type="submit" value="Tìm kiếm" class="search-button">
    </form>
    <button><a href="indexadmin.php?danhmuc=themkhachhang">Thêm khách hàng mới</a></button>
</div>
<div class="info">
    <strong>Tổng số khách hàng: <?php echo $tong_bg?></strong>
</div>
<div class="user-list">
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<a class="xemchitiet" href="indexadmin.php?danhmuc=ctkhachhang&id=' . $row["id_nguoidung"] . '">';
            echo '<div class="user-card">';
            echo '<h3>' . $row["hoten"] . '</h3>';
            echo '<p>Ngày sinh: ' . $row["ngaysinh"] . '</p>';
            echo '<p>Giới tính: ' . $row["gioitinh"] . '</p>';
            echo '<p>Số điện thoại: ' . $row["sdt"] . '</p>';
            echo '<p>Loại khách hàng: ' . $row["loaikhach"] . '</p>';
            echo '<div class="user-details">';
            echo '</div>';
            echo '</div>';
            echo '</a>';
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
</html>
