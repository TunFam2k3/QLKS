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
$pdf->AddFont('DejaVu', '', 'DejaVuSansCondensed.ttf', true);
$pdf->SetFont('Arial', '', 15); // Sử dụng font Arial mặc định


$sql_query = "SELECT dp.id, dp.id_phong, dp.username, dp.tenkhach, dp.ngayden, dp.ngaydi, dp.soluongnguoi, dp.price, ddv.ten_dichvu, ddv.gia_dichvu, ddv.soluong_dichvu 
                FROM datphong dp 
                LEFT JOIN datdichvu ddv ON dp.id = ddv.id_datphong 
                WHERE dp.id='$id'";
                $result = $mysqli->query($sql_query);

if ($result->rowCount() > 0) {
    $row = $result->fetch();
    $ngayDenFormatted = date('d/m/Y', strtotime($row['ngayden']));
    $ngayDiFormatted = date('d/m/Y', strtotime($row['ngaydi']));
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

    $pdf->SetTextColor(255, 0, 0); // Đặt màu chữ là đỏ (RGB: 255, 0, 0)
    $pdf->Cell(0, 10, 'Thành tiền: ' . $row['price'], 0, 1);
    $pdf->SetTextColor(0, 0, 0); // Đặt lại màu chữ về màu đen
    $pdf->Cell(0, 10, '--------------------------------------------------------------------------------------------------------------', 0, 1, 'C');
    $pdf->Cell(0, 10, 'Thông tin dịch vụ:', 0, 1);
    $pdf->Cell(0, 10, 'Tên dịch vụ: ' . $row['ten_dichvu'], 0, 1);
    $pdf->Cell(0, 10, 'Số lượng dịch vụ: ' . $row['soluong_dichvu'], 0, 1);

    $pdf->SetTextColor(255, 0, 0); // Đặt màu chữ là đỏ (RGB: 255, 0, 0)
    $pdf->Cell(0, 10, 'Thành tiền: ' . $row['gia_dichvu'], 0, 1);
    $pdf->SetTextColor(0, 0, 0); // Đặt lại màu chữ về màu đen

    $tongtien=$row['price']+$row['gia_dichvu'];
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
    $pdf->Output('invoice.pdf', 'I');
} else {
    // Trường hợp không tìm thấy dữ liệu với id cung cấp
    echo 'Không tìm thấy dữ liệu với ID cung cấp.';
}
?>
