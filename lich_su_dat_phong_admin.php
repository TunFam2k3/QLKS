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
        .top{
            background:#008080;
        }

		h1 {
			font-size: 36px;
            text-align: center;
            color: #fff;

		}
         .container {
            max-width: 340px;
            margin: 0 auto;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
			margin-bottom: 20px;
			margin-top: 20px;
            width: 600px;
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
			font-size:  14px;
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
			font-size: 14px;
		}

		.canceled-status {
			color: #dc3545;
			font-weight: bold;
		}

		/* ul>.chiso {
			list-style-type: none;
			padding: 0;
			text-align: center;
		}

		ul li {
			display: inline;
			margin: 5px;
		}

		.chiso {
			text-decoration: none;
			color: #333;
			background: linear-gradient(135deg, #FF5733, #FF7044);
			padding: 5px 10px;
			border-radius: 5px;
			transition: background 0.3s ease-in-out;
		}

		.chiso:hover {
			background: linear-gradient(135deg, #FF7044, #FF5733);
			color: white;
		}

		i {
			color: black;
		} */

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
				
				$offset = ($tranghientai - 1) * $sobg;
				$select = "SELECT * FROM datphong LIMIT $offset, $sobg";
				$result = mysqli_query($conn, $select);	
				$stt_hang = ($tranghientai - 1) * $sobg;

			while($row = mysqli_fetch_object($result)) 
			{
				$stt_hang++;
				$id[$stt_hang] = $row->id;    
				$id_hang[$stt_hang] = $row->id_phong;
				// $username[$stt_hang] = $row->username;
				$ngayden[$stt_hang] = $row->ngayden;
				$ngaydi[$stt_hang] = $row->ngaydi;
				$tenkhach[$stt_hang] = $row->tenkhach;
				$soluong[$stt_hang] = $row->soluongnguoi;
				$diadiem[$stt_hang] = $row->diadiem;
				$price[$stt_hang] = $row->price;
				$trangthaithanhtoan[$stt_hang] = $row->trangthaithanhtoan;
			}
$tong_bg = mysqli_num_rows(mysqli_query($conn, $select));
				$soluongtrang = ceil($tong_bg / $sobg);
		
    ?>

	 <div class="contentlichsu">
        
        <div class="main">
            <div class ="top">
                <h1>Lịch sử đặt phòng</h1>
            </div>
            <table Align="center" Border="1">
                <tbody>
                    
                    <tr>
                        <td colspan="9" Align=""></td>
                    </tr>
                    <tr>
        <div class="container">
		
		<form method="POST" name ="timkiem"> 
		
			<input type="search" name ="timtheophong" placeholder="Nhập từ khóa ">

			<input type="submit"  value="Tìm kiếm" name="timkiem" style="background-color: #3498db; color: #fff; border: none; padding: 8px 12px; border-radius: 5px; font-size: 14px; cursor: pointer; ">
		</form>
	<?php
    
    ?>
    <?php
    if ( isset( $_POST[ 'timkiem' ] ) && $_POST[ 'timtheophong' ] != "" ) {
        $tim = $_POST[ 'timtheophong' ];
        $select_search = "SELECT * FROM datphong WHERE tenkhach LIKE '%$tim%' or ngaydenlike'%$tim%' or trangthaithanhtoanlike'%$tim%'  ";
        $result_search = mysqli_query($conn, $select_search);	
        $stt_hang_search = ($tranghientai - 1) * $sobg;
    
    while($row = mysqli_fetch_object($result_search)) 
    {
        $stt_hang_search++;
        $id_search[$stt_hang_search] = $row->id;    
        $id_hang_search[$stt_hang_search] = $row->id_phong;
        $username_search[$stt_hang_search] = $row->username;
        $ngayden_search[$stt_hang_search] = $row->ngayden;
        $ngaydi_search[$stt_hang_search] = $row->ngaydi;
        $tenkhach_search[$stt_hang_search] = $row->tenkhach;
        $soluong_search[$stt_hang_search] = $row->soluongnguoi;
        $diadiem_search[$stt_hang_search] = $row->diadiem;
        $price_search[$stt_hang_search] = $row->price;
        $trangthaithanhtoan_search[$stt_hang_search] = $row->trangthaithanhtoan;
    }
    $tong_bg_search = mysqli_num_rows(mysqli_query($conn, $select_search));
        $soluongtrang_search = ceil($tong_bg_search / $sobg);
    mysqli_close($conn);
      ?>

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
                    for ($i = ($tranghientai - 1) * $sobg + 1; $i <= $stt_hang_search; $i++) {
                        if ($i > $tong_bg) {

                            break;
                        }
                        ?>
						
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $tenkhach_search[$i] ?></td>
                            <td><?php echo $id_hang_search[$i] ?></td>
                            <td><?php echo $ngayden_search[$i] ?></td>
                            <td><?php echo $ngaydi_search[$i] ?></td>
                            <td><?php echo $soluong_search[$i] ?></td>
                            <td><?php echo $diadiem_search[$i] ?></td>
                            <td><?php echo $price_search[$i] ?></td>
                            <td class="button-cell">
							
                                <?php if($trangthaithanhtoan_search[$i]=="choxacnhan"){?>
									 <p class="paid-status">Đang chờ xử lý</p>
									
								<?php
								 break;}else if ($trangthaithanhtoan_search[$i] == "dathanhtoan") { ?>
                                   
									<p class="paid-status">Đã thanh toán</p>
									
                                <?php } else if ($trangthaithanhtoan_search[$i] == "chuathanhtoan") { ?>
                                    <p class="paid-status">Chưa thanh toán</p>
									
									   
                                <?php } else { ?>
									
                                    <p class="canceled-status">Đã hủy</p>
									
                                <?php } ?>
                            </td>
                        </tr>
                       
                    <?php } ?>
                    <tr>
                    <td colspan="9" Align="right">Có tổng số: <?php echo $tong_bg_search ?> lần giao dịch</td>
                    </tr>
	</div>
    <?php
        
            }else{
                ?>
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
							
                                <?php if($trangthaithanhtoan[$i]=="choxacnhan"){?>
									 <p class="paid-status">Đang chờ xử lý</p>
									
								<?php
								 break;}else if ($trangthaithanhtoan[$i] == "dathanhtoan") { ?>
                                   
									<p class="paid-status">Đã thanh toán</p>
									
                                <?php } else if ($trangthaithanhtoan[$i] == "chuathanhtoan") { ?>
                                    <p class="paid-status">Chưa thanh toán</p>
									
									   
                                <?php } else { ?>
									
                                    <p class="canceled-status">Đã hủy</p>
									
                                <?php } ?>
                            </td>
                        </tr>
                       
                    <?php } ?>
                    <tr>
                    <td colspan="9" Align="right">Có tổng số: <?php echo $tong_bg ?> lần giao dịch</td>
                    </tr>
    
                <?php
            }
      ?>
    
                    </tr>

                    


                </tbody>
              
            </table>
            <ul>
                <?php
                for ($i = 1; $i <= $soluongtrang; $i++) {
                    echo "<li><a class='chiso' href='lichsudatphong.php?page=$i'>$i</a></li> ";
                }
                ?>
            </ul>
            
        </div>
       
    </div>
</body>
</html>