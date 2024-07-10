
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List account</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            
            height: 100vh;
        }

        .noidungchinhdanhsach {
            width: 100%;
            margin: 0 auto;
        }

        .overview {
            display: flex;
            justify-content: space-between;
        }

        .menu {
            margin-top: 20px;
        }

        .dongmenu {
            list-style: none;
            display: flex;
            width: 100%;
        }

        .dongmenu li {
            margin-right: 15px;
        }

        .menunut {
            text-decoration: none;
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border-radius: 4px;
        }

        .timkiem {
            margin-top: 20px;
            display: flex;
            align-items: center;
        }

        .timkiem p {
            margin-right: 10px;
        }

        #searchInputdatphong,
        #searchInputdatphongbutton {
            padding: 10px;
            border: 1px solid #007bff;
            border-radius: 4px;
        }

        #searchInputdatphongbutton {
            background-color: #007bff;
            color: white;
            cursor: pointer;
            border: none;
            margin-left: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }

        .pagination {
            list-style: none;
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .pagination li {
            margin: 0 10px;
        }

        .pagination a {
            text-decoration: none;
            padding: 10px 15px;
            border: 1px solid #007bff;
            border-radius: 4px;
            color: #007bff;
            transition: background-color 0.3s, color 0.3s;
        }

        .pagination a.active,
        .pagination a:hover {
            background-color: #007bff;
            color: white;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 50%;
        }

        .modal-content p {
            margin-bottom: 20px;
        }

        .menunutxoaadmin {
            background-color: #28a745;
            color: white;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 10px;
        }
        td .active {
            background-color: #28a745; /* Màu xanh lá cây */
            color: white;
            text-align:center;
            padding: 3px;
            border-radius:4px;
        }

        td .inactive {
            background-color: #ffc107; /* Màu vàng gold */
            color: white;
            text-align:center;
            padding: 3px;
            border-radius:4px;
        }

        td .locked {
            background-color: #dc3545; /* Màu đỏ */
            color: white;
            text-align:center;
            padding: 3px;
            border-radius:4px;
        }
        .chucnang {
            text-decoration: none;
            padding: 5px;
            margin-right: 6px;
            border-radius: 4px;
            cursor: pointer;
            display: inline-block;
        }

        .chucnang i {
            margin-right: 5px;
        }

        .fa-trash {
            padding:8px;
            border-radius:4px;
            color: #dc3545;
            background-color: #f8d7da; /* Màu nền đỏ nhạt cho nút xóa */
        }

        .fa-key {
            padding:8px;
            border-radius:4px;
            color: #28a745;
            background-color: #d4edda; /* Màu nền xanh lá cây nhạt cho nút mở khóa */
        }

        .fa-lock {
            padding:8px;
            border-radius:4px;
            color: #007bff;
            background-color: #cce5ff; /* Màu nền xanh dương nhạt cho nút khóa */
        }
    </style>
</head>

<body>
<?php
$sobg = 10;
$db = "anh";
$conn = new mysqli("localhost", "root", "", $db) or die("Không connect được với máy chủ");
$current_page = (isset($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 1;
$inputsearch = "";

if (isset($_POST['search'])) {
    $inputsearch = $_POST['search'];
}
$offset = ($current_page - 1) * $sobg;

if (!empty($inputsearch)) {
    $select = "SELECT * FROM `acc` WHERE `full_name` LIKE '%$inputsearch%' OR `email` LIKE '%$inputsearch%' OR `role` LIKE '%$inputsearch%' OR `trangthai` LIKE '%$inputsearch%' LIMIT $offset, $sobg";
} else {
    $select = "SELECT * FROM `acc` LIMIT $offset, $sobg";
}

$result = mysqli_query($conn, $select);
$tong_bg = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `acc` WHERE `full_name` LIKE '%$inputsearch%' OR `email` LIKE '%$inputsearch%' OR `role` LIKE '%$inputsearch%' OR `trangthai` LIKE '%$inputsearch%'"));
$soluongtrang = ceil($tong_bg / $sobg);

mysqli_close($conn);
?>
<div class="noidungchinhdanhsach">
    <div class="overview" style="display: flex; width: 80%; margin: 0 auto; justify-content: space-between;">
        <?php
        if ($_SESSION['role'] !== "Admin") {?>
        <div class="menu">
            <ul class="dongmenu">
                <li><a class="menunut" href="pdf/xuatfilepdfdanhsachtaikhoan.php"><i class="fa-regular fa-file-pdf"></i> Xuất danh sách pdf</a></li>
                <li><a class="menunut" href="dangky.php"><i class="fa-solid fa-user-plus"></i>Thêm tài khoản</a></li>
                <li><a class="menunut" href="#" id="showhopthoaixoaadmin"><i class="fa-solid fa-user-minus"></i>Xóa tất cả admin</a></li>
                <li><a class="menunut" href="#" id="showhopthoaicapnhat"><i class="fa-solid fa-user-check"></i>Xác nhận Admin</a></li>
                <li><a class="menunut" href="#" id="showhopthoaixoa"><i class="fa-solid fa-minus"></i>Xoá tài khoản</a></li>
            </ul>
        </div>
        <?php } ?>
    </div>
    <?php
    if (isset($_SESSION['error'])) {
        echo '<script>alert("Tài khoản này không thể xóa.");</script>';
        unset($_SESSION['error']);
    }
    ?>
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
        <input type="hidden" name="selected_ids" id="selected_ids_hidden" value="">
        <table>
                <thead>
                    <tr>
                        <?php if ($_SESSION['role'] !== "Admin") { ?>
                            <th>&nbsp;</th>
                        <?php } ?>
                        <th>STT</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Fullname</th>
                        <th>Email</th>
                        <?php if ($_SESSION['role'] !== "Admin") { ?>
                            <th>Role</th>
                        <?php } ?>
                        <th>Trạng thái</th>
                        <?php if ($_SESSION['role'] !== "Admin") { ?>
                            <th>Chức năng</th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $i++;
                    ?>
                            <tr>
                                <?php if ($_SESSION['role'] !== "Admin") { ?>
                                    <td><input name='selected_id[]' id='checks<?= $i ?>' value='<?= $row["id"] ?>' type='checkbox'></td>
                                <?php } ?>
                                <td><?= $i ?></td>
                                <td><?= $row['username'] ?></td>
                                <td><?= $row['password'] ?></td>
                                <td><?= $row['full_name'] ?></td>
                                <td><?= $row['email'] ?></td>
                                <?php if ($_SESSION['role'] !== "Admin") { ?>
                                    <td><?= $row['role'] ?></td>
                                <?php } ?>
                                <td>
                                    <div style="font-weight:600" class='<?= ($row['trangthai'] == 'Đang hoạt động') ? 'active' : (($row['trangthai'] == 'Chưa kích hoạt') ? 'inactive' : 'locked') ?>'>
                                        <?= $row['trangthai'] ?>
                                    </div>
                                </td>
                                <?php if ($_SESSION['role'] !== "Admin") { ?>
                                    <td>
                                        <a href='xoa_taikhoan_controller.php?id=<?= $row["id"] ?>'><i class='fa-solid fa-trash'></i></a>
                                        <?php
                                            if ($_SESSION['role'] !== "Admin") {
                                                
                                                if ($row['trangthai'] == 'Đã khóa') {
                                                    echo "<a class='chucnang' href='capnhat_trangthai.php?id={$row["id"]}&action=mo_khoa' style='margin-right:6px'><i class='fa-solid fa-key'></i></a>";
                                                } else {
                                                    echo "<a class='chucnang' href='capnhat_trangthai.php?id={$row["id"]}&action=khoa'><i class='fa-solid fa-lock'></i></a>";
                                                }
                                              
                                            }
                                            ?>

                                    </td>
                                <?php } ?>
                            </tr>
                    <?php }
                    }
                  ?>
                </tbody>
            </table>
        <ul class="pagination">
            <?php
            for ($i = 1; $i <= $soluongtrang; $i++) {
                $searchParam = (!empty($inputsearch)) ? "&search=" . urlencode($inputsearch) : "";
                echo "<li><a class='chiso' href='indexadmin.php?danhmuc=danhsachtaikhoan&page=$i$searchParam'>$i</a></li> ";
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