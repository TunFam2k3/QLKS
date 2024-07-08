<?php
$conn = new mysqli("localhost", "root", "", "anh");

if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

$ngaybatdau = $_POST["ngaybatdau"];
$ngayketthuc = $_POST["ngayketthuc"];

$sql = "SELECT 
    SUM(CASE WHEN trangthaithanhtoan = 'dathanhtoan' THEN 1 ELSE 0 END) AS datphong_da_thanh_toan,
    SUM(CASE WHEN trangthaithanhtoan = 'dahuy' THEN 1 ELSE 0 END) AS datphong_huy_dat,
    SUM(CASE WHEN trangthaithanhtoan = 'chuathanhtoan' THEN 1 ELSE 0 END) AS datphong_chua_xac_nhan
FROM datphong
WHERE ngayden BETWEEN '$ngaybatdau' AND '$ngayketthuc'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $datphong_da_thanh_toan = $row["datphong_da_thanh_toan"];
    $datphong_huy_dat = $row["datphong_huy_dat"];
    $datphong_chua_xac_nhan = $row["datphong_chua_xac_nhan"];
} else {
    $datphong_da_thanh_toan = 0;
    $datphong_huy_dat = 0;
    $datphong_chua_xac_nhan = 0;
}

$conn->close();

$data = [
    "datphong_da_thanh_toan" => $datphong_da_thanh_toan,
    "datphong_huy_dat" => $datphong_huy_dat,
    "datphong_chua_xac_nhan" => $datphong_chua_xac_nhan
];

header("Content-Type: application/json");// cho biết dữ liệu sẽ được trả về dưới dạng JSON
echo json_encode($data);//chuyển đổi một mảng hoặc đối tượng PHP thành chuỗi JSON
?>
