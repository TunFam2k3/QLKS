
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>List account</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<style>
body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    font-size: 14px;
}

h1 {
    color: #fff;
    font-size: 36px;
    text-shadow: 2px 2px 4px rgba(254, 150, 150, 0.5);
    text-align: center;
    margin-top: 20px;
}

table {
    width: 80%;
    margin: 20px auto;
    border-collapse: collapse;
    background-color: rgba(255, 255, 255, 0.9);
}

th, td {
    padding: 10px;
    text-align: center;
    border: 1px solid #ccc;
}

th {
    background: linear-gradient(135deg, #FF5733, #FF7044);
    color: white;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

img {
    border: 3px solid #ccc;
    border-radius: 10px;
    transition: transform 0.3s ease-in-out;
    display: block;
    margin: 0 auto;
}

img:hover {
    transform: scale(1.05);
    border-color: #FF5733;
}

a[href="addphong.php"] button {
    background: linear-gradient(135deg, #FF5733, #FF7044);
    color: white;
    padding: 10px 20px;
    text-decoration: none;
    border: none;
    border-radius: 5px;
    font-weight: bold;
    transition: background 0.3s ease-in-out;
    cursor: pointer;
    display: block;
    margin: 20px auto;
}

a[href="addphong.php"] button:hover {
    background: linear-gradient(135deg, #FF7044, #FF5733);
}

ul {
    list-style-type: none;
    padding: 0;
    text-align: center;
}

.chiso {
    text-decoration: none;
    color: #333;
    background: linear-gradient(135deg, #FF5733, #FF7044);
    padding: 5px 10px;
    border-radius: 5px;
    transition: background 0.3s ease-in-out;
    display: inline;
}

i {
    color: black;
}


button[type="submit"] {
    background-color: rgba(19, 99, 222, 1.00);
    color: white;
    padding: 10px 20px;
    text-decoration: none;
    border: none;
    border-radius: 5px;
    font-weight: bold;
    transition: background-color 0.3s ease-in-out;
    cursor: pointer;
}


button[type="submit"]:hover{
    opacity: 0.7;
}

.timkiem {
    display: flex;
    width: 80%;
    margin: 0 auto;
}

.main {
    width: 100%;
}

.timkiembutton {
    width: 20%;
    padding: 8px;
    border-radius: 24px;
    font-size: 16px;
    border: 1px solid rgba(208, 205, 205, 1.00);
}
	.timkieminput {
    width: 75%;
    padding: 8px;
    border-radius: 24px;
    font-size: 16px;
    border: 1px solid rgba(208, 205, 205, 1.00);
}


</style>
</head>
<body>
<?php
    $sobg = 20;
    $db = "anh";
    $conn = new mysqli("localhost", "root", "", $db) or die("Không connect được với máy chủ");
    $current_page = (isset($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 1;//kiểm tra xem page có tồn tại và là 1 số hay không

    $offset = ($current_page - 1) * $sobg;//Bắt đầu lấy dữ liệu từ đâu

    $searchValue = "";
    if (isset($_POST['search'])) {
        $searchValue = $_POST['searchValue'];
    }

    $select = "SELECT * FROM `datphong` WHERE `tenkhach` LIKE '%$searchValue%' LIMIT $offset, $sobg";
    $result = mysqli_query($conn, $select);
    $stt_hang = ($current_page - 1) * $sobg;

    while ($row = mysqli_fetch_object($result)) {
        $stt_hang++;
        $id_tk[$stt_hang] = $row->id;
        $id_phong[$stt_hang] = $row->id_phong;
        $username[$stt_hang] = $row->username;
        $tenkhach[$stt_hang] = $row->tenkhach;
        $ngayden[$stt_hang] = $row->ngayden;
        $ngaydi[$stt_hang] = $row->ngaydi;
        $diadiem[$stt_hang] = $row->diadiem;
    }

    $tong_bg = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `datphong` WHERE `tenkhach` LIKE '%$searchValue%'"));
    $soluongtrang = ceil($tong_bg / $sobg);//hàm làm tròn
    mysqli_close($conn);
?>
<div class="timkiem">
    <form method="post" style="display: flex; width: 70%; margin: 0 auto;justify-content: space-between" action="indexadmin.php?danhmuc=danhsachdatphong">
        <input type="search" name="searchValue" class="timkieminput" placeholder="Nhập tên khách cần tìm" value="<?php echo $searchValue; ?>">
        <input type="submit" name="search" value="Tìm kiếm" class="timkiembutton">
    </form>
</div>
<table align="center">
    <tbody>
        <tr>
            <td colspan="8" align="center"><h3>Danh sách lịch sử đặt phòng</h3></td>
        </tr>
        <tr align="center">
            <th>STT</th>
            <th>ID phòng</th>
            <th>Username</th>
            <th>Tên khách</th>
            <th>Ngày đến</th>
            <th>Ngày đi</th>
            <th>Địa điểm</th>
            <th>Chức năng</th>
        </tr>
        <?php
            for ($i = ($current_page - 1) * $sobg + 1; $i <= ($current_page - 1) * $sobg + $sobg; $i++) {
                if ($i > $tong_bg) {
                    break;
                }
        ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $id_phong[$i]; ?></td>
            <td><?php echo $username[$i]; ?></td>
            <td><?php echo $tenkhach[$i]; ?></td>
            <td><?php echo $ngayden[$i]; ?></td>
            <td><?php echo $ngaydi[$i]; ?></td>
            <td><?php echo $diadiem[$i]; ?></td>
            <td>
                <a href="xoa_taikhoan_controller.php?id=<?php echo $id_phong[$i]; ?>"><i class="fa-solid fa-trash"></i></a>
            </td>
        </tr>
        <?php
            }
        ?>
        <tr>
            <td colspan="8" align="right">Có tổng số <?php echo $tong_bg; ?> tài khoản</td>
        </tr>
    </tbody>
</table>
<ul>
    <?php
        for ($i = 1; $i <= $soluongtrang; $i++) {
            echo "<li><a class='chiso' href='indexadmin.php?danhmuc=danhsachdatphong&page=$i'>$i</a></li> ";
        }
    ?>
</ul>
</body>
</html>
