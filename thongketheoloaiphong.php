<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biểu đồ doanh thu theo loại phòng</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
			background-color: #f0f0f0;
		}

		.tieudetklp {
			color: #333;
			padding: 10px;
			text-align: center;
			margin: 0;
		}

		form {
			text-align: center;
			margin: 20px auto;
			padding: 20px;
			background-color: #fff;
			border: 1px solid #ddd;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
			max-width: 50%;
		}

		label {
			font-weight: bold;
			margin-right: 10px;
		}

		input[type="date"] {
			padding: 5px;
			border: 1px solid #ddd;
			border-radius: 3px;
		}

		button {
			background-color: #007bff;
			color: #fff;
			padding: 10px 20px;
			border: none;
			cursor: pointer;
						margin-top: 20x;

		}

		table {
			margin: 20px auto;
			border-collapse: collapse;
			width: 80%;
			max-width: 800px;
			background-color: #fff;
			border: 1px solid #ddd;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		}

		table th, table td {
			padding: 10px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}

		table th {
			background-color: #007bff;
			color: #fff;
		}

		
	</style>
</head>
<body>
    <h1 class="tieudetklp">Thống kê doanh thu theo loại phòng</h1>
    
    <form method="POST" action="">
        <label for="ngaybatdau">Từ ngày:</label>
        <input type="date" name="ngaybatdau" required>
        <label for="ngayketthuc">Đến ngày:</label>
        <input type="date" name="ngayketthuc" required>
        <button class="thongke"type="submit">Thống kê</button>
		<div id="myfirstchart" style="height: 250px;"></div>

    </form>

    <?php
	 	 if ($_SERVER["REQUEST_METHOD"] == "POST") {
			 
			 
            $ngaybatdau = $_POST["ngaybatdau"];
            $ngayketthuc = $_POST["ngayketthuc"];
        
		 }else{
			  $ngaybatdau = date("Y-m-d");//lấy ngày hiện tại
            $ngayketthuc = date("Y-m-d");
		 }
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "anh";

        $conn = new mysqli($servername, $username, $password, $dbname) or die("Kết nối đến cơ sở dữ liệu thất bại: 0");

       

        $sql = "SELECT loaiphong, SUM(price) as doanhThu FROM datphong WHERE trangthaithanhtoan='dathanhtoan' AND ngaydat BETWEEN '$ngaybatdau' AND '$ngayketthuc' GROUP BY loaiphong";
        $result = $conn->query($sql);
		$doanhthu = 0; 

    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>Loại phòng</th><th>Doanh thu</th><th>Số lượng phòng</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["loaiphong"] . "</td>";

            $sqlCount = "SELECT COUNT(*) as soluong FROM datphong WHERE trangthaithanhtoan='dathanhtoan' AND ngaydat BETWEEN '$ngaybatdau' AND '$ngayketthuc' AND loaiphong = '" . $row["loaiphong"] . "'";
            $resultCount = $conn->query($sqlCount);
            $rowCount = $resultCount->fetch_assoc();


            echo "<td >" . number_format($row["doanhThu"], 0, ',', '.') . " VND</td>";
			            echo "<td>" . $rowCount["soluong"] . "</td>";

            echo "</tr>";

            $doanhthu += $row["doanhThu"]; }

        echo "<tr style=background:rgba(238,109,24,1.00);><td ><strong>Tổng doanh thu</strong></td>><td colspan=2 ><strong>" . number_format($doanhthu, 0, ',', '.') . " VND</strong></td></tr>";
        echo "</table>";
    } else {
        echo "Không có dữ liệu doanh thu.";
    }
        $conn->close();
		 
    
    ?>
</body>
	
  

<!-- biểu đồ -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script>
   var char = new Morris.Area({
  element: 'myfirstchart', 
 data: [
    { month: '2023-1', Total:  0},
    { month: '2023-2', Total:  0},
    { month: '2023-3', Total: 0 },
    { month: '2023-4', Total: 0 },
    { month: '2023-5', Total: 0 },
    { month: '2023-6', Total: 0 },
    { month: '2023-7', Total: 0 },
    { month: '2023-8', Total: 250000 },
    { month: '2023-9', Total: 350000 },
    { month: '2023-10', Total: 300000 } 
  ], 
  xkey: 'month',
  ykeys: ['Total'],
  labels: ['Tổng tiền']
});
</script>




</html>
