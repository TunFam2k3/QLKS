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
			background-color: #f7f7f8;
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

		a[href="addphong.php"] button,
		a[href="dangky.php"] button,
		a[href="indexadmin.php"] button,
		a[href="update_tkadmin_controller.php"] button {
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

		a[href="addphong.php"] button:hover,
		a[href="dangky.php"] button:hover,
		a[href="indexadmin.php"] button:hover,
		a[href="update_tkadmin_controller.php"] button:hover {
			background: linear-gradient(135deg, #FF7044, #FF5733);
		}

		i {
			color: black;
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

		.chiso:hover {
			background: linear-gradient(135deg, #FF7044, #FF5733);
		}

		ul.pagination {
			list-style-type: none;
			padding: 0;
			text-align: center;
		}

		ul.pagination li {
			display: inline;
			margin: 5px;
		}

		ul.pagination li a.chiso:hover {
			background: linear-gradient(135deg, #FF7044, #FF5733);
			color: white;
		}

		.noidungchinhdanhsach {
			margin-left: 40px;
			padding: 10px 0;
			border-radius: 8px;
		}

		.dongmenu {
			display: flex;
			list-style-type: none;
			padding: 0;
			width: 600px;
		}

		.dongmenu li {
			padding-top: 12px;
		}

		.menunut {
			display: block;
			background: #fff;
			color: #330000;
			border-radius: 0px;
			background: #9df99d;
		}

		.menunut:hover {
			background: rgba(176, 216, 33, 1.00);
		}

		.menu {
			margin-left: 20px;
		}

		.mainoverview {
			border: 3px solid black;
			width: 30%;
			border-radius: 8px;
			padding: 4px;
			background-color: rgba(157, 236, 84, 1.00);
		}

		.contentoverview {
			text-align: center;
		}

		.timkiem {
			display: flex;
			width: 60%;
			margin: 0 auto;height: 40px;
			margin-top: 12px;
		}

		#searchInputdatphong {
			width: 60%;
			padding: 12px;
			border-radius: 24px;
			font-size: 16px;
			border: 1px solid rgba(208, 205, 205, 1.00);
		}

		#searchInputdatphongbutton {
			width: 20%;
			background: linear-gradient(135deg, #FF5733, #FF7044);
			color: white;
			border: none;
			border-radius: 24px;
			font-size: 16px;
			cursor: pointer;
			transition: background 0.3s ease-in-out;
		}

		#searchInputdatphongbutton:hover {
			background: linear-gradient(135deg, #FF7044, #FF5733);
		}

		.menunutxoaadmin {
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

		.menunutxoaadmin:hover {
			background: linear-gradient(135deg, #FF7044, #FF5733);
		}
		.modal {
           display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 2;
        }

        .modal-content {
            background-color: white;
            margin: 15% auto;
            padding: 20px;
            width: 20%;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .close {
            float: right;
            font-size: 30px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover {
            color: #FF5733;
        }
		input[type="checkbox"] {
 			transform: scale(1.5)
		}
		.active {
			background-color: limegreen; 
			color: white; 
			padding: 4px;
			border-radius:4px;
			font-weight: 600;
		}

		.inactive {
			background-color:gold ; 
			color: white; 
			padding: 4px;
			border-radius:4px;
			font-weight: 600;
		}

		.locked {
			background-color: red; 
			color: white; 
			padding: 4px;
			border-radius:4px;
			font-weight: 600;
		}
	
	</style>
</head>

<body>
   <div class="noidungchinhdanhsach">
	 <?php
    $sobg = 5;
    $db = "anh";
    $conn = new mysqli("localhost", "root", "", $db) or die("Không connect đc với máy chủ");
    $current_page = (isset($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 1;

		$offset = ($current_page - 1) * $sobg;
    $inputsearch = "";
    if (isset($_POST['search'])) {
        $inputsearch = $_POST['search'];
    }

   if (!empty($inputsearch)) {
    $select = "SELECT * FROM `acc` WHERE `full_name` LIKE '%$inputsearch%' OR `email` LIKE '%$inputsearch%' OR `role` LIKE '%$inputsearch%' OR `trangthai` LIKE '%$inputsearch%' LIMIT $offset, $sobg";

} else {
    $select = "SELECT * FROM `acc` LIMIT $offset, $sobg";

}

    $result = mysqli_query($conn, $select);

    $stt_hang = ($current_page - 1) * $sobg;

    while ($row = mysqli_fetch_object($result)) {
        $stt_hang++;
        $id_tk[$stt_hang] = $row->id;
        $username[$stt_hang] = $row->username;
        $password[$stt_hang] = $row->password;
        $full_name[$stt_hang] = $row->full_name;
        $email[$stt_hang] = $row->email;
        $role[$stt_hang] = $row->role;
        $trangthai[$stt_hang] = $row->trangthai;
    }

   
    
    $tong_bg = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `acc` WHERE `full_name` LIKE '%$inputsearch%' OR `email` LIKE '%$inputsearch%' OR `role` LIKE '%$inputsearch%' OR `trangthai` LIKE '%$inputsearch%'"));

    $soluongtrang = ceil($tong_bg / $sobg);

    mysqli_close($conn);
    ?>

    <div class="overview" style="display: flex; width: 80%; margin: 0 auto;; justify-content: space-between;">
		<?php
				if ($_SESSION['role'] !== "Admin") {?>
		 <div class="menu">
			<ul class="dongmenu">
				<li><a class="menunut" href="dangky.php"><i class="fa-solid fa-user-plus"></i>Thêm tài khoản</a></li>
				<li><a class="menunut" href="#" id="showhopthoaixoaadmin"><i class="fa-solid fa-user-minus"></i>Xóa tất cả admin</a></li>
				<li><a class="menunut" href="#" id="showhopthoaicapnhat"><i class="fa-solid fa-user-check"></i>Xác nhận Admin</a></li>
				<li><a class="menunut" href="#" id="showhopthoaixoa"><i class="fa-solid fa-minus"></i>Xoá tài khoản</a></li>

				<?php }
				?>
			</ul>
		</div>
        
    </div>
    <form method="post">
        <div class="timkiem">
            <p>Tìm kiếm:</p>
            <input type="text" id="searchInputdatphong" name="search" placeholder="Nhập từ khóa tìm kiếm">
            <button id="searchInputdatphongbutton" type="submit">
                <i class="fa-solid fa-magnifying-glass" style="color: #f7f7f8;"></i>
                Tìm kiếm
            </button>

        </div>
    </form>
	<form id="myform" action="update_tkadmin_controller.php" method="post" name="accountForm">
		<input type="hidden" name="selected_ids" id="selected_ids_hidden" value=""> <!--phải để ở đây mới chạy được update-->
        <table align="center" border="1" id="thongtintaikhoan">
            <tbody>
                <tr>
                    <td colspan="9" align="">Danh mục tài khoản</td>
                </tr>
                <tr>
                    <?php if ($_SESSION['role'] !== "Admin") { ?>
                        <td>&nbsp;</td>
                    <?php } ?>
                    <td width="20">STT</td>
                    <td width="83">Username</td>
                    <td width="60">Password</td>
                    <td width="83">Fullname</td>
                    <td width="83">Email</td>
				<?php
				if ($_SESSION['role'] !== "Admin") {?>
                    <td width="83">Role</td>
				<?php }
				?>
                    <td width="100">Trạng thái</td>
                    <?php if ($_SESSION['role'] !== "Admin") { ?>
                        <td width="83">Chức năng</td>
                    <?php } ?>
                </tr>
                <?php
				for ($i = ($current_page - 1) * $sobg + 1; $i <= $stt_hang; $i++) {
//                    if ($i > $tong_bg) {
//                        break;
//                    }
                ?>
                    <tr>
                        <?php if ($_SESSION['role'] !== "Admin") { ?>
						<td><input name="selected_id[]" id="checks<?php echo $i ?>" value="<?php echo $id_tk[$i] ?>" type="checkbox"></td>

                        <?php } ?>
                        <td><?php echo $i ?></td>
                        <td><?php echo $username[$i] ?></td>
                        <td><?php echo $password[$i] ?></td>
                        <td><?php echo $full_name[$i] ?></td>
                        <td><?php echo $email[$i] ?></td>
						<?php
							if ($_SESSION['role'] !== "Admin") {?>
									<td><?php echo $role[$i] ?></td>
							<?php }
							?>
                        <td >
						<div class="<?php echo ($trangthai[$i] == 'Đang hoạt động') ? 'active' : (($trangthai[$i] == 'Chưa kích hoạt') ? 'inactive' : 'locked'); ?>">
							<?php echo $trangthai[$i] ?>
						</div>
						</td>
							<?php if ($_SESSION['role'] !== "Admin") { ?>
						<td>
							<a href="xoa_taikhoan_controller.php?id=<?php echo $id_tk[$i] ?>"><i class="fa-solid fa-trash"></i></a>
							<?php if ($trangthai[$i] == 'Đã khóa') { ?>
								<a href="capnhat_trangthai.php?id=<?php echo $id_tk[$i] ?>&action=mo_khoa"><i class="fa-solid fa-key"></i></a>
							<?php } else { ?>
								<a href="capnhat_trangthai.php?id=<?php echo $id_tk[$i] ?>&action=khoa"><i class="fa-solid fa-lock"></i></a>
							<?php } ?>
						</td>
					<?php } ?>


                    </tr>
                <?php
                }
                ?>
                <tr>
                    <td colspan="9" align="right">Có tổng số <?php echo $tong_bg ?> tài khoản</td>
                </tr>
            </tbody>
        </table>
        <ul class="pagination">
            <?php
            for ($i = 1; $i <= $soluongtrang; $i++) {
                echo "<li><a class='chiso' href='indexadmin.php?danhmuc=danhsachtaikhoan&page=$i'>$i</a></li> ";
            }
            ?>
        </ul>
     <div id="myModal" class="modal">
        <div class="modal-content">
            <p>Bạn có chắc chắn muốn xác nhận làm Admin?</p>
            <button class="menunutxoaadmin" type="submit" name="action" value="hanhdong1">Đồng ý</button>
            <button class="menunutxoaadmin" id="huy" >Hủy</button>
        </div>
    </div>
		<div id="myModalXoa" class="modal">
			<div class="modal-content">
				<p>Bạn có chắc chắn muốn xóa tài khoản?</p>
			 <button class="menunutxoaadmin" type="submit" name="action" value="hanhdong2">Xóa</button>
			 <button class="menunutxoaadmin" id="huyXoa">Hủy</button>
			</div>
		</div>
		<div id="myModalXoaadmin" class="modal">
			<div class="modal-content">
				<p>Bạn có chắc chắn muốn xóa tài khoản admin?</p>
				<button class="menunutxoaadmin" ><a href="xoaalladmincontroller.php" style="color: #fff; text-decoration: none;">Xóa</a></button>
				<button class="menunutxoaadmin" id="huyXoaadmin">Hủy</button>
			</div>
		</div>
    </form>
	

	
	</div>
	
</body>









	 <script>
        var showhopthoaicapnhat = document.getElementById("showhopthoaicapnhat");
        var modal = document.getElementById("myModal");
        var cancelButton = document.getElementById("cancelButton");
		 
		
        showhopthoaicapnhat.addEventListener("click", function() {
            modal.style.display = "block";
        });

        cancelButton.addEventListener("click", function() {
            modal.style.display = "none";
        });
		



        
    </script>
	<script>
			var showHopupXoa = document.getElementById("showhopthoaixoa");
			var modalXoa = document.getElementById("myModalXoa");
			var huyXoa = document.getElementById("huyXoa");

			showHopupXoa.addEventListener("click", function() {
				modalXoa.style.display = "block";
			});

			huyXoa.addEventListener("click", function() {
				modalXoa.style.display = "none";
			});
				</script>
			<script>
			var showHopupXoaadmin = document.getElementById("showhopthoaixoaadmin");
			var modalXoaadmin = document.getElementById("myModalXoaadmin");
			var huyXoa = document.getElementById("huyXoaadmin");

			showHopupXoaadmin.addEventListener("click", function() {
				modalXoaadmin.style.display = "block";
			});

			huyXoa.addEventListener("click", function() {
				modalXoaadmin.style.display = "none";
			});
        </script>
	
	
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
