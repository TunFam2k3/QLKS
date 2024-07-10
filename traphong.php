<?php
require('tfpdf/tfpdf.php');
$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';

$host = 'localhost';
$db   = 'anh';
$user = 'root';
$pass = '';
$charset = 'utf8';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $mysqli = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

$pdf = new tFPDF();
$pdf->SetFillColor(193, 229, 252);
$pdf->SetCreator('MNC');
$pdf->SetAuthor('MNC');
$pdf->SetTitle('Bill');
$pdf->AddPage();
$pdf->AddFont('DejaVu', '', 'DejaVuSans-BoldOblique.ttf', true);
$pdf->SetFont('Arial', '', 15); // Sử dụng font Arial mặc định


$sql_query = "SELECT dp.id, dp.id_phong, dp.username, dp.tenkhach, dp.ngayden, dp.ngaydi, dp.soluongnguoi, dp.price, ddv.ten_dichvu, ddv.gia_thanhtoandv, ddv.soluong_khachhang 
                FROM datphong dp 
                LEFT JOIN datdichvu ddv ON dp.id_phong = ddv.id_phong 
                WHERE dp.id='$id'";
                $result = $mysqli->query($sql_query);
               
if ($result->rowCount() > 0) {
    $row = $result->fetch();
   // Tạo đối tượng DateTime cho ngày đến
$ngayDen = new DateTime($row['ngayden']);

// Tạo đối tượng DateTime cho ngày đi
$ngayDi = new DateTime($row['ngaydi']);

// Trừ ngày đến từ ngày đi
$thoiGianCachNhau = $ngayDen->diff($ngayDi);

// Lấy số ngày cách nhau
$soNgay = $thoiGianCachNhau->days;

$ngayDenFormatted = $ngayDen->format('d/m/Y');
$ngayDiFormatted = $ngayDi->format('d/m/Y');



// Calculate the total price based on the number of days
$thanhtien = $soNgay * $row['price'];

    $pdf->SetFont('DejaVu', '', 20); 
  

    $pdf->Cell(0, 10, 'Hóa đơn', 0, 1, 'C');
    $pdf->SetFont('DejaVu', '', 14);
    $pdf->Cell(0, 10, '-----------------------------------------------', 0, 1, 'C');
    $pdf->Cell(0, 10, 'Thông tin khách hàng:', 0, 1);
    $pdf->Cell(0, 10, 'Mã phòng: ' . $row['id_phong'], 0, 1);
    $pdf->Cell(0, 10, 'Họ tên: ' . $row['tenkhach'], 0, 1);

    $pdf->Cell(0, 10, '--------------------------------------------------------------------------------------------------------------', 0, 1, 'C');
    $pdf->Cell(0, 10, 'Thông tin chi tiết:', 0, 1);
    $pdf->Cell(0, 10, 'Ngày đến: ' . $ngayDenFormatted, 0, 1);
    $pdf->Cell(0, 10, 'Ngày đi: ' . $ngayDiFormatted, 0, 1);
    $pdf->Cell(0, 10, 'Số lượng người: ' . $row['soluongnguoi'], 0, 1);
    $pdf->Cell(0, 10, 'Giá thành: ' . $row['price'], 0, 1);

if(!isset($row['ten_dichvu'])){
    $tendichvu="Không";
}
else{
    $tendichvu=$row['ten_dichvu'];
}
if(!isset($row['soluong_khachhang'])){
    $soluongkhach=0;
}else{
    $soluongkhach=$row['soluong_khachhang'];
}
if(!isset($row['giathanhtoan'])){
    $giathanhtoan=0;
}
else{
    $giathanhtoan=isset($row['giathanhtoan']);
}

    $pdf->SetTextColor(255, 0, 0); // Đặt màu chữ là đỏ (RGB: 255, 0, 0)
    $pdf->Cell(0, 10, 'Thành tiền: ' . $thanhtien, 0, 1);
    $pdf->SetTextColor(0, 0, 0); // Đặt lại màu chữ về màu đen
    $pdf->Cell(0, 10, '--------------------------------------------------------------------------------------------------------------', 0, 1, 'C');
    $pdf->Cell(0, 10, 'Thông tin dịch vụ:', 0, 1);
    $pdf->Cell(0, 10, 'Tên dịch vụ: ' .$tendichvu, 0, 1);
    $pdf->Cell(0, 10, 'Số lượng dịch vụ: ' . $soluongkhach, 0, 1);

    $pdf->SetTextColor(255, 0, 0); // Đặt màu chữ là đỏ (RGB: 255, 0, 0)
    $pdf->Cell(0, 10, 'Thành tiền: ' . $giathanhtoan, 0, 1);
    $pdf->SetTextColor(0, 0, 0); // Đặt lại màu chữ về màu đen

    $tongtien=$thanhtien+$row['gia_thanhtoandv'];
    $pdf->Cell(0, 10, '--------------------------------------------------------------------------------------------------------------', 0, 1, 'C');
        $pdf->SetTextColor(255, 0, 0); // Đặt màu chữ là đỏ (RGB: 255, 0, 0)
        $pdf->SetFont('DejaVu', '', 20); 
        $pdf->Cell(0, 10, 'Tổng số tiền phải trả:                                   ' . $tongtien." VND", 0, 1);

	// $pdf->Ln(10);
	// $pdf->Ln(10);
	// $pdf->Ln(10);
	// $pdf->Ln(10);
	// $pdf->Ln(10);
	// $pdf->Ln(10);
	// $pdf->Ln(10);
	// $pdf->Ln(10);
    // $pdf->Ln(10);
	// $pdf->Ln(10);
	// $pdf->Ln(10);
	// $pdf->Ln(10);
	// $pdf->Ln(10);
	// $pdf->Ln(10);


    
    // Xuất PDF vào đầu ra
    $pdf->Output('Hoadon.pdf', 'D');
    
} else {
    // Trường hợp không tìm thấy dữ liệu với id cung cấp
    echo 'Không tìm thấy dữ liệu với ID cung cấp.';
}
?>
<?php
$db = "anh";
$conn = new mysqli("localhost", "root", "", $db) or die ("Không connect được với máy chủ");

$id_phong = $_GET['id_phong'];

// // Đảm bảo rằng giá trị của id_giaodich và id_phong là an toàn
// $id_giaodich = mysqli_real_escape_string($conn, $id_giaodich);
// $id_phong = mysqli_real_escape_string($conn, $id_phong);
$id_giaodich = $_GET['id'];
$update_query = "UPDATE `datphong` SET `trangthaithanhtoan` = 'dathanhtoan' WHERE `id` = '$id_giaodich'";
$sql_update_phong = "UPDATE anhhh SET tinhtrang = 'Còn trống' WHERE id_phong = '$id_phong'";

if ( mysqli_query($conn, $sql_update_phong)&&mysqli_query($conn,$update_query)) {
    mysqli_close($conn);
    header("Location: indexadmin.php?danhmuc=danhsachdatphong");
    exit;
} else {
    echo "Lỗi khi cập nhật trạng thái thanh toán hoặc trạng thái phòng: ";
}

mysqli_close($conn);
?>