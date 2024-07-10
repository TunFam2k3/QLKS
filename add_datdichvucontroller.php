<?php


if(isset($_GET['gia_thanhtoandv']) || $_GET['gia_thanhtoandv']!=NULL){
    $gia_thanhtoandv = isset($_REQUEST["gia_thanhtoandv"]) ? $_REQUEST["gia_thanhtoandv"] : "";
    $trangthai_datdichvu = isset($_REQUEST["trangthai_datdichvu"]) ? $_REQUEST["trangthai_datdichvu"] : "";
    $id_datdichvu =$_GET['id_datdichvu'];
    $db="anh";
    $conn=new mysqli("localhost","root","",$db) or die ("Không connect đc với máy chủ");
    

        $sql_add="UPDATE `datdichvu` SET `gia_thanhtoandv`='$gia_thanhtoandv',`trangthai_datdichvu`='$trangthai_datdichvu' WHERE id_datdichvu='$id_datdichvu'";


    mysqli_query($conn,$sql_add);	
    	header("Location: indexadmin.php?danhmuc=danhsachdatdichvu");
}else{


		$ten_khach = isset($_REQUEST["ten_khach"]) ? $_REQUEST["ten_khach"] : "";
		$id_phong = isset($_REQUEST["id_phong"]) ? $_REQUEST["id_phong"] : "";
		$ten_dichvu = isset($_REQUEST["ten_dichvu"]) ? $_REQUEST["ten_dichvu"] : "";
		$soluong_khachhang = isset($_REQUEST["soluong_khachhang"]) ? $_REQUEST["soluong_khachhang"] : "";
        
        
        $trangthai_datdichvu = isset($_REQUEST["trangthai_datdichvu"]) ? $_REQUEST["trangthai_datdichvu"] : "";

	
		
		$db="anh";
		$conn=new mysqli("localhost","root","",$db) or die ("Không connect đc với máy chủ");
		if (!empty($ten_khach) &&!empty($soluong_khachhang)) {
	
			$sql_add="INSERT INTO `datdichvu` ( `tenkhach`,`id_phong`,`ten_dichvu`,`soluong_khachhang`,`gia_thanhtoandv`,`trangthai_datdichvu`) VALUES ('$ten_khach','$id_phong','$ten_dichvu','$soluong_khachhang','$gia_sudungdv','$trangthai_datdichvu')";


		mysqli_query($conn,$sql_add);	
		}	header("Location: indexadmin.php?danhmuc=danhsachdatdichvu");

}



?>