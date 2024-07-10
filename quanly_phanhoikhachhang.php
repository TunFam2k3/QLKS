<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sach phong</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

	<style>
	/* h1 {
			color: #fff;
			font-size: 36px;
			text-shadow: 2px 2px 4px rgba(254, 150, 150, 0.5);
			text-align: center;
			margin-top: 20px;
		}
		 */

    th {
        background-color: #333;
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
        cursor: pointer;
    }


    img:hover {
        transform: scale(1.05); 
        border-color: #FF5733; 
    }

    a[href="addphong.php"] button , input[type="submit"] {
        background-color: rgba(19,99,222,1.00);
        color: white;
        padding: 10px 20px;
        text-decoration: none;
        border: none;
        border-radius: 5px;
        font-weight: bold;
        transition: background-color 0.3s ease-in-out;
        cursor: pointer;
    }
        .timkiembutton{
                margin: 8px 0 ;
            }
    a[href="addphong.php"] button:hover,a[href="indexadmin.php"] button:hover, input[type="submit"]:hover {
        background-color: #E4482D;
        
    }
    /* ul {
                list-style-type: none;
                padding: 0;
                text-align: center;
            }

        

            .chiso {
                text-decoration: none;
                color: #333;
                background: linear-gradient(135deg, #FF5733, #FF7044);
                padding: 5px 10px;
                border-radius: 5px;
                transition: background 0.3s ease-in-out;
                display: inline;
            } */

    /*
            ul li a:hover {
                background: linear-gradient(135deg, #FF7044, #FF5733);
                color: white;
                
            }
    */
            /* i{
                color: black;
            }
             */
            
            
            .timkiem{
                display: flex;
                width: 100%;
                margin: 0 auto;
            }
            .main{
                width: 100%;
            }
            .timkiembutton{
                width: 100%;
                padding: 12px;
                border-radius: 24px;
                font-size: 16px;
                border: 1px solid rgba(208,205,205,1.00);
            }
            .timmiemformdanhsach{
                display: flex;
                height: 45px !important;
                align-items: center;
            }
            
            .timkiemphong{
                display: flex;
                margin: 0 auto;
                width: 60%;
                height: 45px;
            }
            .hidden-description {
                
                max-height: 120px; 
                overflow: hidden;
                
            }
            .description-button {
                color: #333; 
                background: #4CAF50; 
                padding: 5px 10px; 
                border-radius: 5px; 
                transition: background 0.3s ease-in-out; 
                display: inline; 
                text-decoration: none; 
            }

            .description-button:hover {
                background: #45a049;
                color: white;
            }
    input[type="checkbox"] {
                transform: scale(1.5)
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

            
            .menucon{
                display: inline;
                font-size: 16px;
                color: #333;
                text-decoration: none;
                background: none;
                padding: 10px;
                
            }
            .menucon:hover{
                background: rgba(230,224,225,1.00)
            }
            .dongmenu{
                background: rgba(241,150,151,1.00);
                display: flex;
                justify-content: center;
                align-items: center;
                margin: 0 auto;
                height: 38px;
                width: 30%;
            }
            .menu{
                margin: 0 auto;
                margin-top: 12px;


            }
            
            
            .menunutxoaadmin{
                background-color: #E4482D;
                color: white;
                padding: 10px 20px;
                border: none;
                border-radius: 5px;
                font-weight: bold;
                transition: background-color 0.3s ease-in-out;
                cursor: pointer;
            }
            

        

        
            table {
                width: 90%;
                margin: 20px auto;
                border-collapse: collapse;
                background: white;
                box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            }
        
            



            .timmiemformdanhsach input[type="search"] {
                padding: 10px;
                border-radius: 5px;
                border: 1px solid #ccc;
                width: 60%;
                margin-right: 10px;
            }

            button[type="submit"] {
                background-color: rgba(19, 99, 222, 1.00);
                color: white;
                padding: 10px 20px;
                border: none;
                border-radius: 5px;
                font-weight: bold;
                transition: background-color 0.3s ease-in-out;
                cursor: pointer;
            }

            button[type="submit"]:hover {
                background-color: #E4482D;
            }
            .chiso{
                display: inline;
            }
            
	</style>


</head>

<body>
	<?php
	$sobg=100;
		$db="anh";
		$conn=new mysqli("localhost","root","",$db) or die ("Không connect đc với máy chủ");
		$current_page = (isset($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 1;
		$offset = ($current_page - 1) * $sobg;

		$inputsearch = "";
		if (isset($_POST['search'])) {
			$inputsearch = $_POST['search'];
		}


		if (empty($inputsearch)) {
				$select = "SELECT * FROM `phanhoi` LIMIT $offset, $sobg";

		
		} else {
				$select = "SELECT * FROM `phanhoi` WHERE `tenkhach` LIKE '%$inputsearch%' OR `email` LIKE '%$inputsearch%' OR `loai_phanhoi` LIKE '%$inputsearch%' LIMIT $offset, $sobg";

		}
				$result = mysqli_query($conn, $select);
				$stt_hang=($current_page - 1) * $sobg;
			while($row = mysqli_fetch_object($result))
			{
			
			$stt_hang++;
			$id_hang[$stt_hang]=$row->id_phanhoi;
			$email[$stt_hang]=$row->email;
			$description0[$stt_hang]=$row->noidung_phanhoi;
			
			
			$thoigian[$stt_hang]=$row->thoigian_phanhoi;
			$tenkhach[$stt_hang]=$row->tenkhach;
			$chude[$stt_hang]=$row->loai_phanhoi;
			
		}
	 

	
	
	
	
	
	
	$tong_bg = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `phanhoi`"));
	$tong_bgsearch = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `phanhoi` WHERE `tenkhach` LIKE '%$inputsearch%' OR `email` LIKE '%$inputsearch%' OR `loai_phanhoi` LIKE '%$inputsearch%'"));
	$soluongtrang = ceil($tong_bg / $sobg);
	mysqli_close($conn);
	
	
	
		
	
	?>
	
	<br>
	
		<form method="post" class="timmiemformdanhsach">
			<div class="timkiemphong">
				<p>Tìm kiếm:</p>
                <input type="search" id="searchInputdatphong" name="search" placeholder="Nhập từ khóa tìm kiếm" value="<?php echo $inputsearch; ?>">
                <button id="searchInputdatphongbutton" type="submit">
				  <i class="fa-solid fa-magnifying-glass" style="color: #f7f7f8;"></i>
                    Tìm kiếm
                </button>
		    </div>

		</form>
					

		<form action="xoa_phanhoicontroller.php" method="post">
        <input type="hidden" name="selected_ids" id="selected_ids_hidden" value="">

		
	<table  align="center" border="1">
	  <tbody>
		<tr>
		  <td colspan="8" style="height: 0px;"><h3>Danh sách phản hồi</h3></td>
		</tr>
		<tr align="center">
		  
		  <td style="height: 30px;" width="10">STT</td>
		  <td style="height: 30px;" width="38">Tên khách hàng</td>
          <td style="height: 30px;" width="83" >Email</td>
		  <td style="height: 30px;" width="83">Thời gian</td>
          <td style="height: 30px;" width="83" >Chủ đề</td>
		  <td style="height: 30px;" width="250">Phản hồi</td>

		  <td style="height: 30px;" width="50">Chức năng</td>
		</tr>
		  <?php
				for ($i = ($current_page - 1) * $sobg + 1; $i <=($current_page - 1) * $sobg + $sobg ; $i++) {
					if ($i > $tong_bg) {
						break;
					}
					else if($i > $tong_bgsearch){
						break;
					}
			?>
		<tr>
		 
		  <td><?php echo $i;?></td>
		  <td><?php echo $tenkhach[$i];?></td>
          <td><?php echo $email[$i];?></td>
		  <td><?php echo $thoigian[$i];?></td>
			<td><?php echo $chude[$i]?></td>
            <td>
				<div class="hidden-description "  id="description-<?php echo $i; ?>">
					<?php echo $description0[$i]?>
				</div>
				<a style="" href="" class="description-button">Xem chi tiết</a>
			</td>
		    <td>
				<a href="xoa_phanhoicontroller.php?id_phanhoi=<?php echo $id_hang[$i]?>" > <i class="fa-solid fa-trash"></i></a>

            <!-- <form  id="myForm" action="xoa_phanhoicontroller.php" method="post">
                    <input type="hidden" name="selected_ids" id="selected_ids_hidden" value="<?php echo $id_hang[$i]?>">
                        <div id="myModalXoaadmin" class="modal">
                    <div class="modal-content">
                        <p>Bạn có chắc chắn muốn xóa dịch vụ không?</p>
                        <button class="menunutxoaadmin" type="submit" name="action" value="xoaphong">Xóa</button>
                        <button class="menunutxoaadmin" id="huyXoaadmin">Hủy</button>
                    </div>
                </div>
            </form> -->
			</td>
		</tr>
		  <?php  
		  }
		  ?>
		  
		<tr>
		  <td colspan="8" align="right">Có tổng số <?php echo $tong_bg?> Phản hồi</td>
		</tr>
	  </tbody>
	</table>
		<div id="myModalXoaadmin" class="modal">
			<div class="modal-content">
				<p>Bạn có chắc chắn muốn xóa phản hồi không?</p>
			 	<button class="menunutxoaadmin" type="submit" name="action" value="xoaphong">Xóa</button>
				<button class="menunutxoaadmin" id="huyXoaadmin">Hủy</button>
			</div>
		</div>
	</form>
	<ul >
			<?php
				for ($i = 1; $i <= $soluongtrang; $i++) {
        echo "<li class='chiso'><a class='chiso' href='indexadmin.php?danhmuc=quanly_phanhoikhachhang&page=$i&search=$inputsearch'>$i</a></li> ";
				}
			?>
		</ul>
	
	
	
	
	
</body>
	






<script>
	const Buttons = document.querySelectorAll('.description-button');
	Buttons.forEach(button => {
	button.addEventListener('click', (event) => {
		// Ngăn chặn hành vi mặc định của sự kiện click
		event.preventDefault();

		// Tìm thẻ tr (dòng) chứa nút được nhấp
		const tr = button.closest('tr');
		
		// Tìm phần mô tả ẩn bên trong dòng đó
		const description = tr.querySelector('.hidden-description');
		
		if (description.style.maxHeight === '120px' ) {
		description.style.maxHeight = 'none'; 
		button.textContent = 'Ẩn chi tiết'; 
		} else {
		description.style.maxHeight = '120px'; 
		button.textContent = 'Xem chi tiết'; 
		}
	});
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
        // Lấy thẻ <a> và form
const linkToShowForm = document.getElementById('linkToShowForm');
const myForm = document.getElementById('myForm');

// Thêm sự kiện click cho thẻ <a>
linkToShowForm.addEventListener('click', function(e) {
    e.preventDefault(); // Ngăn chặn hành động mặc định của thẻ <a>

    // Ẩn/hiện form
    if (myForm.style.display === 'none') {
        myForm.style.display = 'block';
    } else {
        myForm.style.display = 'none';
    }
});
    </script>
	
	
</html>