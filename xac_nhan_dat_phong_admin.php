
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Lịch sử đặt phòng</title>
	<style>
		body {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, sans-serif;
		}

	

		table {
			width: 80%;
			margin: 20px auto;
			border-collapse: collapse;
			box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
			background: #fff;
		}

		th, td {
			padding: 15px;
			text-align: center;
			border: 1px solid #ccc;
		}

		th {
			background-color: #333;
			color: white;
		}

		tr:hover {
			background-color: #f5f5f5;
			cursor: pointer;
		}

		.button-cell {
			display: flex;
			justify-content: space-between;
			align-items: center;
		}

		.button-pay {
			background-color: #3498db;
			color: white;
			padding: 5px 10px;
			text-decoration: none;
			border: none;
			border-radius: 5px;
			font-weight: bold;
			cursor: pointer;
			margin-right: 8px; 
		}

		.button-pay:hover {
			background-color: #E93C1E;
		}

		.status-cell {
			display: flex;
			justify-content: space-between;
			align-items: center;
		}

		.paid-status {
			color: #28a745;
			font-weight: bold;
		}

		.canceled-status {
			color: #dc3545;
			font-weight: bold;
		}


		.main {
			display: flex;
			flex-direction: column;
		}
		
		
	</style>


</head>

<body>
	  <?php
				$sobg = 5;
				$db = "anh";
				$conn = new mysqli("localhost", "root", "", $db) or die ("Không connect đc với máy chủ");

				$tranghientai = (isset($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 1;
				// $usernamecheck = $_SESSION['userclient'];
				
			
				$select = "SELECT * FROM `datphong` WHERE `trangthaithanhtoan`='choxacnhan'  ";
				$result = mysqli_query($conn, $select);	
				$stt_hang = ($tranghientai - 1) * $sobg;

			while($row = mysqli_fetch_object($result)) 
			{
				$stt_hang++;
				$id[$stt_hang] = $row->id;    
				$id_hang[$stt_hang] = $row->id_phong;
				$username[$stt_hang] = $row->username;
				$ngayden[$stt_hang] = $row->ngayden;
				$ngaydi[$stt_hang] = $row->ngaydi;
				$tenkhach[$stt_hang] = $row->tenkhach;
				$soluong[$stt_hang] = $row->soluongnguoi;
				$diadiem[$stt_hang] = $row->diadiem;
				$price[$stt_hang] = $row->price;
				$trangthaithanhtoan[$stt_hang] = $row->trangthaithanhtoan;
			}
$tong_bg = mysqli_num_rows(mysqli_query($conn,$select ));
				$soluongtrang = ceil($tong_bg / $sobg);
			mysqli_close($conn);
    ?>

	 <div class="contentlichsu">
        <div class="main">
            <table Align="center" Border="1">
                <tbody>
                    <tr>
                        <td colspan="9" Align=""><h1>Thông tin đặt phòng  </h1></td>
                    </tr>
                    <tr Align="center">
                        <th width="38">STT</th>
                        <th width="83">Tên khách</th>
                        <th width="83">ID phòng</th>
                        <th width="83">Ngày đến</th>
                            <th width="83">Ngày đi</th>
                            <th width="83">Số lượng người</th>
                            <th width="83">Địa điểm</th>
                            <th width="83">Giá (VND)</th>
                        <th width="150"></th>
                    </tr>
                    <?php
                    for ($i = ($tranghientai - 1) * $sobg + 1; $i <= $stt_hang; $i++) {
                        if ($i > $tong_bg) {
                            break;
                        }
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $tenkhach[$i] ?></td>
                            <td><?php echo $id_hang[$i] ?></td>
                            <td><?php echo $ngayden[$i] ?></td>
                            <td><?php echo $ngaydi[$i] ?></td>
                            <td><?php echo $soluong[$i] ?></td>
                            <td><?php echo $diadiem[$i] ?></td>
                            <td><?php echo $price[$i] ?></td>
                            <td class="button-cell">
                                <?php if ($trangthaithanhtoan[$i] == "choxacnhan") { ?>
                                   
                                    <a href="xu_ly_xac_nhan_dat_phong_admin.php?id=<?php echo $id[$i] ?>&id_phong=<?php echo $id_hang[$i] ?>"
                                       class="button-pay">Xác nhận</a>
									   <a href="huydatphongcontroller.php?id=<?php echo $id[$i] ?>"
                                       class="button-pay">Hủy đặt</a>
									   
                                <?php } ?>

                                
                            </td>
                        </tr>
                    <?php } ?>
                    <tr>
<td colspan="9" Align="right">Có tổng số: <?php echo $tong_bg ?> lần giao dịch</td>
                    </tr>
                </tbody>
            </table>
            <ul>
                <?php
                for ($i = 1; $i <= $soluongtrang; $i++) {
                    echo "<li><a class='chiso' href='xac_nhan_dat_phong_admin.php?page=$i'>$i</a></li> ";
                }
                ?>
            </ul>
        </div>
    </div>
</body>
</html>
