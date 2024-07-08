
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>List user</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
	
	<style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            font-size: 14px;
            background-color: #f4f4f4;
        }

      

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            background-color: #fff;
        }

        th {
            background: linear-gradient(135deg, #FF5733, #FF7044);
            color: white;
            padding: 15px;
            text-align: center;
        }

        td {
            padding: 15px;
            text-align: center;
        }

        tr:hover {
            background-color: #ddd;
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
            color: #fff;
            background: linear-gradient(135deg, #FF5733, #FF7044);
            padding: 5px 10px;
            border-radius: 5px;
            transition: background 0.3s ease-in-out;
			display: inline;
        }

        i {
            color: black;
        }

        a[href="dangky.php"] button,
        a[href="indexadmin.php"] button,
        button[type="submit"],
        a[href="update_tkadmin_controller.php"] button {
            background-color: #ff5733;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease-in-out;
            cursor: pointer;
        }

        a[href="dangky.php"] button:hover,
        a[href="indexadmin.php"] button:hover,
        button[type="submit"]:hover,
        a[href="update_tkadmin_controller.php"] button:hover {
            background-color: #ff7044;
            opacity: 0.7;
        }
		.search-container {
			display: flex;
			justify-content: center;
			align-items: center;
			margin: 0 auto;
			width: 90%;
		}

		.search-input {
			width: 70%;
			padding: 12px;
			border-radius: 24px;
			font-size: 16px;
			border: 1px solid rgba(208, 205, 205, 1.00);
			margin-right: 5px;
		}

		.search-button {
			background: linear-gradient(135deg, #FF5733, #FF7044);
			color: white;
			padding: 10px 20px;
			text-decoration: none;
			border: none;
			border-radius: 5px;
			font-weight: bold;
			transition: background 0.3s ease-in-out;
			cursor: pointer;
		}

		.search-button:hover {
			background: linear-gradient(135deg, #FF7044, #FF5733);
		}
		.formtimkiem{
						display: flex;

		}
		
		button[type="submit"]:hover {
			background-color: #FF7044;
			
		}

		input[type="checkbox"] {
 			transform: scale(1.5)
		}

		i{
			font-size: 16px;
			color: #DFDFDF;
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

		if(isset($_POST['searchuser'])){
			$search = $_POST['searchuser'];
		}

		$offset = ($current_page - 1) * $sobg;

		if(!empty($search)){
			$select = "SELECT * FROM `nguoidung` WHERE `hoten` LIKE '%$search%' OR `gioitinh` LIKE '%$search%' OR `ngaysinh` LIKE '%$search%' OR `sdt` LIKE '%$search%' OR `diachi` LIKE '%$search%' LIMIT $offset, $sobg";
		}
		else {
    		$select = "SELECT * FROM `nguoidung` ORDER BY `hoten` ASC LIMIT $offset, $sobg";
		}

		$result = mysqli_query($conn, $select);
		$tong_bg = mysqli_num_rows(mysqli_query($conn, $select));

?>
		
	<div class="search-container">
<form method="POST" class="formtimkiem">
    <input type="search" id="searchuser" name="searchuser"  class="search-input">
    <input type="submit" value="Tìm kiếm" class="search-button">
</form>
</div>

	
		<form action="deleteussercontroller.php" method="post">
        <input type="hidden" name="selected_ids" id="selected_ids_hidden" value="">
		
	
	<table align="center" border="1" id="thongtintaikhoan">
            <tbody>
                <tr>
                    <td colspan="10" align="">Danh sách thông tin người dùng</td>
                </tr>
                <tr align="center">
					<?php
				if ($_SESSION['role'] !== "Admin") {?>
		                   <td width="38">   
							   <button type="submit" value="Xóa" class="search-button"><i class="fa-solid fa-trash-alt"></i></button>
							</td>
				<?php }
				?>
					
 
                    <td width="38">STT</td>
                    <td width="38">ID người dùng</td>
                    <td width="83">Username</td>
                    <td width="83">Họ tên</td>
                    <td width="83">Ngày sinh</td>
                    <td width="83">Giới tính</td>
                    <td width="83">Số điện thoại</td>
                    <td width="83">Địa chỉ</td>
                </tr>
                <?php
                $i = 0;
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $i++;
                        echo "<tr>";
						
							
				if ($_SESSION['role'] !== "Admin") { 
				
                        echo "<td><input type='checkbox' name='selected_ids[]' value='" . $row["id_nguoidung"] . "'></td>";}
                        echo "<td>" . $i . "</td>";
                        echo "<td>" . $row["id_nguoidung"] . "</td>";
                        echo "<td>" . $row["username"] . "</td>";
                        echo "<td>" . $row["hoten"] . "</td>";
                        echo "<td>" . $row["ngaysinh"] . "</td>";
                        echo "<td>" . $row["gioitinh"] . "</td>";
                        echo "<td>" . $row["sdt"] . "</td>";
                        echo "<td>" . $row["diachi"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='10'>Không có dữ liệu</td></tr>";
                }
                ?>
                <tr>
                    <td colspan="10" align="right">Có tổng số <?php echo $tong_bg?> tài khoản</td>
                </tr>
            </tbody>
        </table>
		<ul>
			<?php
	 $sql = "SELECT COUNT(*) AS total FROM datphong";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $totalRecords = $row["total"];
                $totalPages = ceil($totalRecords / $sobg);}
			for ($i = 1; $i <= $totalPages; $i++) {
				echo "<li><a class='chiso' href='indexadmin.php?danhmuc=thongtinnguoidung&page=$i'>$i</a></li>";
			}
			?>
		</ul>

		</form>
</body>

	<script>
		function updateSelectedIds() {
			var selectedIds = [];
			var checkboxes = document.querySelectorAll('input[name="selected_id[]"]:checked');
			for (var i = 0; i < checkboxes.length; i++) {
				selectedIds.push(checkboxes[i].value);
			}
			document.getElementById('selected_ids_hidden').value = selectedIds.join(',');
		}

		var checkboxList = document.querySelectorAll('input[name="selected_id[]"]');
		for (var i = 0; i < checkboxList.length; i++) {
			checkboxList[i].addEventListener('change', function () {
				if (this.checked) {
					updateSelectedIds();
				} else {
					var selectedIds = document.getElementById('selected_ids_hidden').value.split(',');
					var valueToRemove = this.value;
					var index = selectedIds.indexOf(valueToRemove);
					if (index !== -1) {
						selectedIds.splice(index, 1);
						document.getElementById('selected_ids_hidden').value = selectedIds.join(',');
					}
				}
			});
		}

	</script>
</html>