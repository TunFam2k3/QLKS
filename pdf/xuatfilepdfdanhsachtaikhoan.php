<?php
require('tfpdf/tfpdf.php');

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
$pdf->SetTitle('Danh sách tài khoản');
$pdf->AddPage();
$pdf->AddFont('DejaVu', '', 'DejaVuSansCondensed.ttf', true);

// Header
$pdf->SetFont('DejaVu', '', 12);
$pdf->Cell(27, 10, 'Username', 1, 0, 'C', true);
$pdf->Cell(25, 10, 'Password', 1, 0, 'C', true);
$pdf->Cell(70, 10, 'Email', 1, 0, 'C', true);
$pdf->Cell(40, 10, 'Full Name', 1, 0, 'C', true);
$pdf->Cell(40, 10, 'Trạng thái', 1, 1, 'C', true);
$sql_in = "SELECT `username`, `password`, `email`, `full_name`, `role`, `trangthai` FROM `acc`  ";
$result = $mysqli->query($sql_in);
// Data
$pdf->SetFont('DejaVu', '', 12);
while ($row = $result->fetch()) {
    $pdf->Cell(27, 10, $row['username'], 1);
    $pdf->Cell(25, 10, $row['password'], 1);
    $pdf->Cell(70, 10, $row['email'], 1);
    $pdf->Cell(40, 10, $row['full_name'], 1);
    $pdf->Cell(40, 10, $row['trangthai'], 1);
    $pdf->Ln();
}

$pdf->Output('danhsachtaikhoan.pdf', 'D');
?>
