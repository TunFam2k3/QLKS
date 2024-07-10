<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sach phong</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    
      
	<style>
	/* h1 {
			color: #fff;
			font-size: 36px;
			text-shadow: 2px 2px 4px rgba(254, 150, 150, 0.5);
			text-align: center;
			margin-top: 20px;
		} */
		

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
            } */
            
            
            
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

                display: flex;
                justify-content: center;
                align-items: center;

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
	$sobg=15;
		$db="anh";
		$conn=new mysqli("localhost","root","",$db) or die ("Không connect đc với máy chủ");
		$current_page = (isset($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 1;
		$offset = ($current_page - 1) * $sobg;

		$inputsearch = "";
		if (isset($_POST['search'])) {
			$inputsearch = $_POST['search'];
		}


		if (empty($inputsearch)) {
				$select = "SELECT * FROM `datdichvu` JOIN  `dichvu` WHERE datdichvu.ten_dichvu = dichvu.ten_dichvu LIMIT $offset, $sobg";

		
		} else {
				$select = "SELECT * FROM `datdichvu` JOIN  `dichvu` WHERE datdichvu.ten_dichvu = dichvu.ten_dichvu AND `username` LIKE '%$inputsearch%' OR `tenkhach` LIKE '%$inputsearch%'  LIMIT $offset, $sobg";

		}


				$result = mysqli_query($conn, $select);
				$stt_hang=($current_page - 1) * $sobg;
			while($row = mysqli_fetch_object($result))
			{
			
			$stt_hang++;
			$id_phong[$stt_hang]=$row->id_phong;
            $id_datdichvu[$stt_hang]=$row->id_datdichvu;
            $ten_dichvu[$stt_hang]=$row->ten_dichvu;
			// $username[$stt_hang]=$row->username;
            $tenkhach[$stt_hang]=$row->tenkhach;
            $soluong_khachhang[$stt_hang]=$row->soluong_khachhang;
			$trangthai_datdichvu[$stt_hang]=$row->trangthai_datdichvu;
			$gia_sudungdv[$stt_hang]=$row->gia_sudungdv;
			
		}

		
	 

	
	
	
	
	
	$tong_controng = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `datdichvu` WHERE `trangthai_datdichvu`='Chờ xác nhận'"));
	$tong_dadat = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `datdichvu` WHERE `trangthai_datdichvu`='Xác nhận' "));
	$tong_bg = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `datdichvu`"));
	$tong_bgsearch = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `datdichvu` WHERE `username` LIKE '%$inputsearch%' OR `tenkhach` LIKE '%$inputsearch%' OR `ten_dichvu` LIKE '%$inputsearch%'"));
	$soluongtrang = ceil($tong_bg / $sobg);
	mysqli_close($conn);
	
	
	
		
	
	?>
	
	<br>
	
		<form method="post" class="timmiemformdanhsach">
			<div class="timkiemphong">
				
                <input type="search" id="searchInputdatphong" name="search" placeholder="Nhập từ khóa tìm kiếm" value="<?php echo $inputsearch; ?>">
                <button id="searchInputdatphongbutton" type="submit">
				  <i class="fa-solid fa-magnifying-glass" style="color: #f7f7f8;"></i>
                    Tìm kiếm
                </button>
		    </div>
	
		
		</form>
					


		
	<table  align="center" border="1">
	  <tbody >
		<tr>
		  <td colspan="7" style="height: 0px;"><h3>Danh sách đặt dịch vụ</h3></td>
          <td colspan="3" style="height: 0px;"><a class="btn btn-outline-primary " href="themkhachhang_dichvu.php" >Thêm</a></td>
		</tr>
		<tr class="border-1" align="center">
          <td width="20px">STT</td>

		  <td style="height: 30px;" width="80">Tên khách hàng</td>
          <td style="height: 30px;" width="20">ID phòng</td>    
		  <td style="height: 30px;" width="60">Dịch vụ</td>
		  <td style="height: 30px;" width="20">Số lượng</td>
          <td style="height: 30px;" width="30" >Thanh toán</td>
		  <td style="height: 30px;" width="50" >Trạng thái thanh toán</td>
		  <td style="height: 30px;" width="80">Chức năng</td>
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
		<tr class="border-1 ">
		  <td><?php echo $i?></td>
		  <td><?php echo $tenkhach[$i]?></td>
          <td><?php echo $id_phong[$i]?></td>
          <td><?php echo $ten_dichvu[$i]?></td>
          <td><?php echo $soluong_khachhang[$i]?></td>
            <td><?php echo $gia_sudungdv[$i]*$soluong_khachhang[$i]?></td>
           
			<td>
            <!-- <form action="add_datdichvucontroller.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="gia_sudungdv" value="" >
                 <button class="btn btn-success"   id="btnHienThi" onclick="hienThiChu()" >Xác nhận</button>
                 
                 <p id="chungtu"></p>
                </form>
            -->
            <?php
                if ($trangthai_datdichvu[$i] == "Chờ xác nhận") {?>	
                    <a class="btn btn-primary" href="add_datdichvucontroller.php?gia_thanhtoandv=<?php echo $gia_sudungdv[$i]*$soluong_khachhang[$i]?>&&id_datdichvu=<?php echo $id_datdichvu[$i]?>" >Xác nhận</a>
                    <?php } else {?>
                    <p style="color: green;">Hoàn tất</p>
                    <?php }?>	
                
                  
			</td> 

		  <td>
            <a href="xoa_datdichvucontroller.php?id_datdichvu=<?php echo $id_datdichvu[$i]?>" > <i class="fa-solid fa-trash"></i></a>
			</td>
		</tr>
		  <?php  
		  }
		  ?>
		  
		<tr>
		  <td colspan="8" align="right">Có tổng số <?php echo $tong_bg?> dịch vụ</td>
		</tr>
	  </tbody>
	</table>

	<ul >
			<?php
				for ($i = 1; $i <= $soluongtrang; $i++) {
        echo "<li class='chiso'><a class='chiso' href='indexadmin.php?danhmuc=danhsachdatdichvu&page=$i&search=$inputsearch'>$i</a></li> ";
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
        function deleteselect() {
            var selectedIds = [];
            var checkboxes = document.querySelectorAll('input[name="selected_id[]"]:checked');
            for (var i = 0; i < checkboxes.length; i++) {
                selectedIds.push(checkboxes[i].value);
            }
            document.getElementById('selected_ids_hidden').value = selectedIds.join(',');
        }
        
        var checkboxList = document.querySelectorAll('input[name="selected_id[]"]');
        for (var i = 0; i < checkboxList.length; i++) {
            checkboxList[i].addEventListener('change', deleteselect);
        }
    </script>
	
	<script>
    function hienThiChu() {
    document.getElementById("btnHienThi").style.display = "none";
      document.getElementById("chungtu").innerHTML = "Hoàn tất";
      
    }
  </script>
</html>