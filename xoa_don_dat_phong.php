<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
    <?php
    function function_alert($message){
        echo"<script>alert($message);</script>";
    }
    ?>
    <?php
	$id=$_REQUEST["id_phong"];
	    $db="anh";
			$conn=new mysqli("localhost","root","",$db) or die ("Không connect đc với máy chủ");//tạo kết nối với server
			$select_hangxs="Select * from `datphong` where id= $id";
			$result_se_hang=mysqli_query($conn,$select_hangxs);
			$row=mysqli_fetch_object($result_se_hang);
			
                $trangthaithanhtoan=$row->trangthaithanhtoan;
    if(strcmp($trangthaithanhtoan,"dahuy")==0){
        $delete = "DELETE  FROM `datphong` WHERE `id`='$id'";
        mysqli_query($conn, $delete);
        function_alert("Xoa thanh cong");
    }else{
        
        function_alert("Xoa khong thanh thanh cong");

    }
    
   header('Location: indexadmin.php?danhmuc=xoa_don_dat_phong');

?>

</body>
</html>


