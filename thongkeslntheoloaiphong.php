<!DOCTYPE html>
<html>
<head>
    <title>Thống kê đặt phòng</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .tieudebang {
            text-align: center;
            margin-top: 20px;
            color: #333;
        }

        .thongkedautien {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .nhapngaydiden {
            text-align: center;
            max-width: 400px;
            width: 40%; 
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-right: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        .date-fields {
            width: 100%; 
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 8px;
        }

        input[type="date"] {
            width: 90%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
            background-color: #f9f9f9;
            position: relative;
            outline: none;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
            width: 100%; 
            margin-top: 15px;
        }

        #chartContainer {
            float: right;
            width: 50%;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            height: 420px;
        }

        canvas {
            max-width: 100%;
            height: auto;
        }

        .info-column {
            float: left;
            margin: 0 auto;
            margin-left: 10px;
            width: 40%;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .chart-column {
            float: left;
            width: 50%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }


        .overview {
            width: 55%; 
            display: flex;
            justify-content: space-between;
            background: #fff;
            border-radius: 8px;
            padding: 20px;
        }

        .overview-item {
            background-color: #F6F6F6;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 100%; 
            margin: 6px;
            height: 80px;
            border: 2px solid rgba(231, 95, 30, 1.00);
        }

        .overview-item:hover {
            transform: scale(1.01);
        }

        .pagination {
            margin-top: 20px;
            text-align: center;
        }

        .pagination a {
            display: inline-block;
            padding: 6px 12px;
            margin: 3px;
            border: 1px solid #ccc;
            border-radius: 3px;
            text-decoration: none;
            color: #333;
        }

        .pagination a:hover {
            background-color: #007bff;
            color: #fff;
            border-color: #007bff;
        }

        .pagination .current {
            background-color: #007bff;
            color: #fff;
            border-color: #007bff;
            pointer-events: none;
        }
        .chart-container {
            width: 100%;
            max-width: 500px; 
            text-align: center; 
            margin: 0 auto; 
        }

        canvas#chart {
            max-width: 100%;
            height: auto; 
        }

        .info-column {
            float: none;
            margin: 0 auto;
            width: 100%;
        }

        .chart-column {
            float: none;
            width: 100%;
        }
    </style>
</head>
<body>
<h1 class="tieudebang">Thống kê đặt phòng</h1>
<div class="thongkedautien">
    <div class="overview">
		<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "anh";

		$conn = new mysqli($servername, $username, $password, $dbname) or  die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);


		$totalRooms = 0;
		$totalBookedRooms = 0;
		$totalCustomers = 0;
		$totalBookings = 0;

		$sql1 = "SELECT COUNT(*) AS total FROM anhhh";
		$result1 = $conn->query($sql1);
		if ($result1->num_rows > 0) {
			$row1 = $result1->fetch_assoc();
			$totalRooms = $row1["total"];
		}

		$sql2 = "SELECT COUNT(*) AS total FROM anhhh WHERE `tinhtrang`='Đã đặt'";
		$result2 = $conn->query($sql2);
		if ($result2->num_rows > 0) {
			$row2 = $result2->fetch_assoc();
			$totalBookedRooms = $row2["total"];
		}

		$sql3 = "SELECT COUNT(DISTINCT tenkhach) AS total FROM datphong WHERE `trangthaithanhtoan`='dathanhtoan' OR `trangthaithanhtoan`='chuathanhtoan'";
		$result3 = $conn->query($sql3);
		if ($result3->num_rows > 0) {
			$row3 = $result3->fetch_assoc();
			$totalCustomers = $row3["total"];
		}

		$sql4 = "SELECT COUNT(*) AS total FROM datphong WHERE `trangthaithanhtoan`='dathanhtoan' OR `trangthaithanhtoan`='chuathanhtoan'";
		$result4 = $conn->query($sql4);
		if ($result4->num_rows > 0) {
			$row4 = $result4->fetch_assoc();
			$totalBookingeds = $row4["total"];
		}
			$sql0 = "SELECT COUNT(*) AS total FROM datphong ";
		$result0 = $conn->query($sql0);
		if ($result0->num_rows > 0) {
			$row0 = $result0->fetch_assoc();
			$totalBookings = $row0["total"];
		}


		?>
		
        <div class="overview-item">
            <p>Số phòng đã đặt: <?php echo "$totalBookedRooms / $totalRooms"; ?></p>
        </div>
        <div class="overview-item">
            <p>Số phòng chưa đặt: <?php echo ($totalRooms - $totalBookedRooms)." / $totalRooms"  ?></p>
        </div>
        <div class="overview-item">
            <p>Tổng số khách hàng: <?php echo "$totalCustomers"; ?></p>
        </div>
		<div class="overview-item">
            <p>Tổng số đơn đặt phòng: <?php echo "$totalBookingeds"; ?></p>
        </div>
    </div>
    <div class="nhapngaydiden">
    <h2>Nhập ngày bắt đầu và ngày kết thúc:</h2>
        <form method="POST">
            Ngày bắt đầu: <input type="date" name="start_date">
            Ngày kết thúc: <input type="date" name="end_date">
            <input type="submit" value="Kiểm tra và vẽ biểu đồ">
        </form>
    </div>
	</div>
	
	
	
	
	
	

	<?php


$sql = "SELECT * FROM datphong";
$result = $conn->query($sql);

?>
	<div class="info-column">
        <h2>Thông tin đặt phòng</h2>
		<form method="POST">
			<input type="search" id="searchInputdatphong" name="search" placeholder="Nhập từ khóa tìm kiếm" >
			<button id="searchInputdatphongbutton" type="submit">Tìm kiếm</button>
		</form>
        <table>
            <thead>
                <tr>
                    <th>Mã</th>
                    <th>Tên</th>
                    <th>Ngày đặt</th>
                    <th>Trạng thái</th>
                </tr>
            </thead>
            <tbody>
             <?php
				               $inputsearch = "";

				if (isset($_POST['search'])) {
					$inputsearch = $_POST['search'];
					if($inputsearch=="Đã hủy"){
							$inputsearch = "dahuy";
					}
					if($inputsearch=="Đã thanh toán"){
							$inputsearch = "dathanhtoan";
					}
					if($inputsearch=="Đang chờ thanh toán"){
							$inputsearch = "chuathanhtoan";
					}
				}

				$recordsPerPage = 10;
				$currentPage = 1;

				if (isset($_GET['page']) && is_numeric($_GET['page'])) {
					$currentPage = intval($_GET['page']);
				}

				$startIndex = ($currentPage - 1) * $recordsPerPage;


				if (!empty($inputsearch)) {
					$inputsearch = mysqli_real_escape_string($conn, $inputsearch);
					$sql = "SELECT * FROM datphong WHERE tenkhach LIKE '%$inputsearch%' OR trangthaithanhtoan LIKE '%$inputsearch%' LIMIT $startIndex, $recordsPerPage";
				}
				else {
					$sql = "SELECT * FROM datphong LIMIT $startIndex, $recordsPerPage";

				}

				$result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["tenkhach"] . "</td>";
                        echo "<td>" . $row["ngaydat"] . "</td>";
                        
                        if ($row["trangthaithanhtoan"] == "dahuy") {
                            echo "<td>Đã hủy</td>";
                        } else if ($row["trangthaithanhtoan"] == "dathanhtoan") {
                            echo "<td>Đã thanh toán</td>";
                        } else {
                            echo "<td>Đang chờ thanh toán</td>";
                        }
                        
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Không có dữ liệu</td></tr>";
                }
                ?>
        </tbody>
        </table>
		<div class="pagination">
            <?php
            $sql = "SELECT COUNT(*) AS total FROM datphong";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $totalRecords = $row["total"];
                $totalPages = ceil($totalRecords / $recordsPerPage);
                
                for ($i = 1; $i <= $totalPages; $i++) {
                   
            echo "<a href='indexadmin.php?danhmuc=thongketheothoigian&page=$i'>$i</a>";
                    
                    
                }
            }
            ?>
        </div>
    </div>
	
    <div class="container" style ="margin-left:30px; background:#fff; padding-bottom: 12px;">
        

        <?php
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "anh";
        $conn = mysqli_connect($host, $username, $password, $database);
            $start_date = "";
            $end_date = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["start_date"]) && isset($_POST["end_date"])) {
                $start_date = $_POST["start_date"];
                $end_date = $_POST["end_date"];
            }
        }
        
            
            $query = "SELECT trangthaithanhtoan, COUNT(*) AS soluong
                      FROM datphong 
                      WHERE ngaydat BETWEEN '$start_date' AND '$end_date'
                      GROUP BY trangthaithanhtoan";
            $result = mysqli_query($conn, $query);

            echo '<div class="chart">';
            ?>
            <h2>Biểu đồ thống kê tình trạng</h2>
            <?php 
            while ($row = mysqli_fetch_assoc($result)) {
                $trangthai = $row['trangthaithanhtoan'];
                if ($trangthai == 'dathanhtoan') {
                    $trangthai ='Đã thanh toán';
                } elseif ($trangthai == 'dahuy') {
                    $trangthai ='Đã hủy';
                } elseif ($trangthai == 'chuathanhtoan') {
                    $trangthai ='Chưa thanh toán';
                }
                $soluong = $row['soluong'];
            
                $colorClass = '';
                if ($trangthai == 'Đã thanh toán') {
                    $colorClass = 'rgba(0, 128, 0, 0.7)'; 
                } elseif ($trangthai == 'Đã hủy') {
                    $colorClass = 'rgba(255, 0, 0, 0.7)'; 
                } elseif ($trangthai == 'Chưa thanh toán') {
                    $colorClass = 'rgba(0, 0, 255, 0.7)'; 
                }
            
                $width = $soluong * 100; 
            
                echo '<div class="bar" style="width: 300px; ">' . $trangthai . ' (Số lượng: ' . $soluong . ')</div>';
                echo '<div class="bar" style="width: ' . $width . 'px; background-color: ' . $colorClass . '; padding: 5px 0;"></div>';
                echo '<br>';
            }
            echo '</div>';
            
        
        ?>
    </div>
	
	



<!--
	<script>
        document.getElementById("searchInput").addEventListener("input", function() {
        var searchText = this.value.toLowerCase(); 

        var table = document.querySelector("table"); 
        var rows = table.querySelectorAll("tbody tr"); 

        rows.forEach(function(row) {
            var cells = row.querySelectorAll("td"); 

            var found = false; 

            cells.forEach(function(cell) {
                if (cell.textContent.toLowerCase().indexOf(searchText) !== -1) {
                    found = true; 
                }
            });

            if (found) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    });
</script>
-->

	<!-- <script>
		document.getElementById('ngaybatdau').addEventListener('change', function () {
            document.getElementById('ngayketthuc').focus();
        });
		document.getElementById('ngayketthuc').addEventListener('change', function () {
            document.getElementById('ngaybatdau').focus();
        });
		document.querySelector("form").addEventListener("submit", function (event) {
			event.preventDefault(); // Ngăn chặn gửi yêu cầu mặc định

			var ngaybatdau = document.getElementById('ngaybatdau').value;
			var ngayketthuc = document.getElementById('ngayketthuc').value;

			var xhttp = new XMLHttpRequest();// gửi yêu cầu HTTP không đồng bộ đến máy chủ
			xhttp.onreadystatechange = function () {
				if (this.readyState === 4 && this.status === 200) {//kiểm tra xem yêu cầu Ajax đã hoàn thành readyState là 4 và có trạng thái HTTP 200 không thể thay đổi
					var responseData = JSON.parse(this.responseText);//chuyển đổi dữ liệu json được trả về từ máy chủ

					renderChart(responseData);
				}
			};

			xhttp.open("POST", "xulithongkesln.php", true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send("ngaybatdau=" + ngaybatdau + "&ngayketthuc=" + ngayketthuc);
		});

		function renderChart(data) {
			var ctx = document.getElementById('chart').getContext('2d');
			if (window.myChart) {
				// Nếu biểu đồ đã tồn tại, hủy nó trước khi vẽ lại
				window.myChart.destroy();
			}

			window.myChart = new Chart(ctx, {
				type: 'bar',
				data: {
					labels: ["Đã thanh toán", "Đã hủy", "Chưa thanh toán"],
					datasets: [{
						label: 'Số lượng',
						data: [
							data.datphong_da_thanh_toan,
							data.datphong_huy_dat,
							data.datphong_chua_xac_nhan
						],
						backgroundColor: [
							'rgba(75, 192, 192, 0.2)',
							'rgba(255, 99, 132, 0.2)',
							'rgba(255, 205, 86, 0.2)'
						],
						borderColor: [
							'rgba(75, 192, 192, 1)',
							'rgba(255, 99, 132, 1)',
							'rgba(255, 205, 86, 1)'
						],
						borderWidth: 1
					}]
				},
				options: {
					scales: {
						y: {
							beginAtZero: true
						}
					}
				}
			});
		}

    </script> -->
    
</body>
</html>
