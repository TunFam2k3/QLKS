<?php
		$incoming_msg = isset($_REQUEST["incoming_msg"]) ? $_REQUEST["incoming_msg"] : "";
		$outcoming_msg = isset($_REQUEST["outcoming_msg"]) ? $_REQUEST["outcoming_msg"] : "";
		$id = isset($_REQUEST["idr"]) ? $_REQUEST["idr"] : "";
		
		$time = date('H:i:s');
		$date = date('Y-m-d');
	
	
	
		
		$db="anh";
		$conn=new mysqli("localhost","root","",$db) or die ("Không connect đc với máy chủ");
		if (!empty($incoming_msg) || !empty($outcoming_msg) ) {
	
			$sql_add="INSERT INTO `messages` ( `incoming_msg`,`outcoming_msg`,`time`,`id`) VALUES ('$incoming_msg','$outcoming_msg','$time','$id')";


		mysqli_query($conn,$sql_add);	
		}	echo '<script>window.history.back();</script>';
		

?>