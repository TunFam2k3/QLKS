
<?php 
				
				if(isset($_GET['danhmuc'])){
					$temp=$_GET['danhmuc'];
				}
				else{
					$temp="";
				}
				if ($temp == 'danhsachtaikhoan') {
					include('danhsachtaikhoan.php');
				}
					else if ($temp == 'danhsachchuyen') {
					include('./adminDanhSachChuyenDi.php');
				} else if ($temp == 'tour') {
					include('./Tabletour.php');
				} else if ($temp == 'diadiem') {
					include('./Tablediadiem.php');
				} else if ($temp == 'danhsachdatphong') {
					include('./danhsachdatphong.php');
				}
					else if ($temp == 'thongtinnguoidung') {
					include('./thongtinnguoidung.php');
				}else if ($temp == 'thongketrangthaidatphong') {
					include('./thongketrangthaidatphong.php');
				}else if ($temp == 'thongketheoloaiphong') {
					include('./thongketheoloaiphong.php');
				}else if ($temp == 'thongketheothoigian') {
					include('./thongkeslntheoloaiphong.php');
				}
				else if ($temp == 'thongketheochuyendi') {
					include('./thongkedoanhthubanvechuyendi.php');
				}
				else if ($temp == 'thongketheotour') {
					include('./thongketour.php');
				}
				else if ($temp == 'danhsachphong') {
					include('./danhsachphong_admin.php');
				
				}else if ($temp == 'danhsachdichvu') {
					include('./danhsachdichvu.php');
				}else if ($temp == 'danhsachdatdichvu') {
					include('./danhsachdatdichvu.php');
				}else if ($temp == 'quanlyphanhoi') {
					include('./quanlyphanhoi.php');
				}else if ($temp == 'quanly_phanhoikhachhang') {
					include('./quanly_phanhoikhachhang.php');
				}
				else if ($temp == 'lsdp') {
					include('./lich_su_dat_phong_admin.php');
				}
				else if ($temp == 'dspctt') {
					include('./danhsachphongchuathanhtoan.php');
				}
				else{
					include('./thongkeslntheoloaiphong.php');
				}
	
				
				?>
				</div>