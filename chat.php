<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên hệ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css" rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
    .img_cont {
        position: relative;
        height: 70px;
        width: 70px;
    }
    .img_cont_msg {
	height: 40px;
	width: 40px;
    }

    .online_icon {
        position: absolute;
        height: 10px;
        width: 10px;
        background-color: #4cd137;
        border-radius: 50%;
        bottom: 13px;
        right: 13px;
        border: 1.5px solid white;
    }
    .user_img {
	height: 60px;
	width: 60px;
	border: 1.5px solid #f5f6fa;
}
.user_info span{
    font-size:  17px;
}
.user_info p{
    font-size:  13px;
}
.card {
	height: 450px;
	
	background-color: white;
}

.contacts_body {
	padding: 0.75rem 0 !important;
	overflow-y: auto;
	white-space: nowrap;
}
.search {
	border-radius: 15px 0 0 15px !important;
	background-color: rgba(0, 0, 0, 0.3) !important;
	border: 0 !important;
	color: white !important;
}
.search:focus {
	box-shadow: none !important;
	outline: 0px !important;
}
.search_btn {
	border-radius: 0 15px 15px 0 !important;
	background-color: rgba(0, 0, 0, 0.3) !important;
	border: 0 !important;
	color: white !important;
	cursor: pointer;
    height: 40px;
}
.img_cont {
	position: relative;
	height: 70px;
	width: 70px;
}

.img_cont_msg {
	height: 20px;
	width: 20px;
}
.user_img_msg {
	height: 30px;
	width: 30px;
	border: 1.5px solid #f5f6fa;
}

#action_menu_btn {
	position: absolute;
	right: 10px;
	top: 10px;
	color: white;
	cursor: pointer;
	font-size: 20px;
}

.action_menu {
	z-index: 1;
	position: absolute;
	padding: 15px 0;
	background-color: rgba(0, 0, 0, 0.5);
	color: white;
	border-radius: 15px;
	top: 30px;
	right: 15px;
	display: none;
}

.action_menu ul {
	list-style: none;
	padding: 0;
	margin: 0;
}

.action_menu ul li {
	width: 100%;
	padding: 10px 15px;
	margin-bottom: 5px;
}

.action_menu ul li i {
	padding-right: 10px;
}

.action_menu ul li:hover {
	cursor: pointer;
	background-color: rgba(0, 0, 0, 0.2);
}
.msg_time {
	position: absolute;
	left: 0;
	bottom: -15px;
	color: rgba(150, 150, 150, 10);
	font-size: 10px;
    
}

.msg_time_send {
	position: absolute;
	right: 0;
	bottom: -15px;
	color: rgba(150, 150, 150, 10);
	font-size: 10px;
    
}
.msg_cotainer {
	margin-top: auto;
	margin-bottom: auto;
	margin-left: 10px;
	border-radius: 25px;
	background-color: #82ccdd;
	padding: 10px;
	position: relative;
    font-size:14px;
}

.msg_cotainer_send {
	margin-top: auto;
	margin-bottom: auto;
	margin-right: 10px;
	border-radius: 25px;
	background-color: #78e08f;
	padding: 10px;
	position: relative;
    font-size:14px;
}
.type_msg {
	background-color: rgba(0, 0, 0, 0.3) !important;
	border: 0 !important;
	color: white !important;
	height: 40px ;
	overflow-y: auto;
    font-size:14px;
}

.type_msg:focus {
	box-shadow: none !important;
	outline: 0px !important;
}
.attach_btn {
	border-radius: 15px 0 0 15px !important;
	background-color: rgba(0, 0, 0, 0.3) !important;
	border: 0 !important;
	color: white !important;
	cursor: pointer;
    height: 40px;
}

.send_btn {
	border-radius: 0 15px 15px 0 !important;
	background-color: rgba(0, 0, 0, 0.3) !important;
	border: 0 !important;
	color: white !important;
	cursor: pointer;
    height: 40px;
}
body {
        background-color: #f0f0f0; 
    }	
.header{

        z-index: 9999;
        width: 100vw;

        
    }
    </style>
</head>


<?php

    $sobg = 20;
    $db = "anh";
    $conn = new mysqli("localhost", "root", "", $db) or die("Không connect đc với máy chủ");
    $current_page = (isset($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 1;

		$offset = ($current_page - 1) * $sobg;
    $inputsearch = "";
    if (isset($_POST['search'])) {
        $inputsearch = $_POST['search'];
    }

   if (!empty($inputsearch)) {
    $select = "SELECT * FROM `acc` WHERE `username` LIKE '%$inputsearch%' OR `full_name` LIKE '%$inputsearch%' OR `email` LIKE '%$inputsearch%' OR `role` LIKE '%$inputsearch%' OR `trangthai` LIKE '%$inputsearch%' LIMIT $offset, $sobg ";

} else {
    $select = "SELECT * FROM `acc` LIMIT $offset, $sobg";

}
$maxmsg="SELECT MAX(msg_id) FROM messages";
$querymsg = "SELECT * FROM messages";
$resultmsg = mysqli_query($conn, $querymsg);

    // $tong_tn="SELECT COUNT(DISTINCT msg_id) FROM `acc` LEFT JOIN `messages` ON messages.id = acc.id";
    $result = mysqli_query($conn, $select);
    
    $ms="SELECT * FROM `messages`";
    $stt_hang = 0;
   

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
    while ($row = mysqli_fetch_object($resultmsg)) {
        $stt_hang++;
        $incoming_msg[$stt_hang] = $row->incoming_msg;
        $outcoming_msg[$stt_hang] = $row->outcoming_msg;
        $time[$stt_hang] = $row->time;
        $id_tkms[$stt_hang] = $row->id;
    }
  
	
    $tong_bg = mysqli_num_rows(mysqli_query($conn, $select));
    $tong_ms = mysqli_num_rows(mysqli_query($conn, $querymsg));
    $max = mysqli_num_rows(mysqli_query($conn, $maxmsg));
    mysqli_close($conn);
    ?>





<body>
    <div class="header" style=" display:flex; z-index: 9999; " >
        
        <div class="position-fixed bottom-0 end-0 p-3 d-none " id="chatWindow" style="width: 400px; margin-bottom:50px;" >
            
                <?php for($a=1;$a<=$tong_bg;$a++){
                        if( $id_tk[$a] == 78){?>
                        
                <div class="card   " >   
                    <div class="card-header">
                        <div class="d-flex bd-highlight  ">
                            <div class="user_info">
                                <span>Chat</span>
                                <p>1767 Messages</p>
                            </div>
                           
                        </div>
                    </div>
                    
                    <div class="card-body overflow-auto"  style="height: 300px;" >        
                    <?php if(!empty($tong_ms)){ for($b=6;$b<=500;$b++){if(isset($id_tkms[$b])){if($id_tk[$a] == $id_tkms[$b]){
                        if(isset($incoming_msg[$b]) && !empty($incoming_msg[$b])) {?>   
                        <div class="d-flex justify-content-end mb-4">
                            <div class="msg_cotainer">
                            <?php echo $incoming_msg[$b] ?>
                                <span class="msg_time_send"><?php echo $time[$b]?></span>
                            </div>
                            
                        </div>       
                        
                        <?php }else if(isset($outcoming_msg[$b]) && !empty($outcoming_msg[$b])) {?>
                        <div class="d-flex justify-content-start mb-4">
                            
                            <div class="msg_cotainer_send">
                            <?php echo $outcoming_msg[$b] ?>
                                <span class="msg_time"><?php echo $time[$b]?></span>
                            </div>
                        </div>
                        <?php }}}}}?>
                    </div>
                    <div class="card-footer h-auto  ">
                        <form action="add_tinnhancontroller.php" method="POST" enctype="multipart/form-data">
                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text attach_btn"><i class="fas fa-paperclip"></i></span>
                                </div>
                                    <textarea  class="form-control type_msg" placeholder="Type your message..." name="outcoming_msg" required></textarea>
                                    <input type="text" name="idr" style="display: none;" value="<?php echo $id_tk[$a] ?>">    
                                    <div class="input-group-append">
                                    <button class="input-group-text send_btn"><i class="fas fa-location-arrow"></i>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> 



                <?php }}?>

            
            
        </div>

    </div>


    <div class="position-fixed bottom-0  end-0 p-4" style="z-index: 9999;">
        <a href="#" id="openChat">
            <img style="width:50px; height:50px; background: #fff; border-radius:80px;" src="img/chat.png" alt="">
            <!-- <button class="btn btn-primary "> Gửi tin nhắn</button> -->
        </a>
    </div>

    
</body>

<!-- Bản gốc của Boostrap CSS -->

<!-- Bản gốc của Boostrap JS -->
<!-- jQuery -->

<script>
    $(document).ready(function() {
  // Khi nhấp vào icon tin nhắn
  $('#openChat').click(function(e) {
    e.preventDefault();
    // Hiển thị cửa sổ tin nhắn
    $('#chatWindow').toggleClass('d-none');
  });


});
</script>
</html>