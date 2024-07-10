<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên hệ</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
        height: 15px;
        width: 15px;
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

.card {
	height: 600px;
	
	background-color: rgba(0, 0, 0, 0.05) !important;
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
	height: 40px;
	width: 40px;
}
.user_img_msg {
	height: 40px;
	width: 40px;
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
}

.msg_cotainer_send {
	margin-top: auto;
	margin-bottom: auto;
	margin-right: 10px;
	border-radius: 25px;
	background-color: #78e08f;
	padding: 10px;
	position: relative;
}
.type_msg {
	background-color: rgba(0, 0, 0, 0.3) !important;
	border: 0 !important;
	color: white !important;
	height: 60px !important;
	overflow-y: auto;
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
    height: 60px;
}

.send_btn {
	border-radius: 0 15px 15px 0 !important;
	background-color: rgba(0, 0, 0, 0.3) !important;
	border: 0 !important;
	color: white !important;
	cursor: pointer;
    height: 60px;
}
.active {
	background-color: rgba(0, 0, 0, 0.3);
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
    $select = "SELECT * FROM acc WHERE username LIKE '%$inputsearch%' OR full_name LIKE '%$inputsearch%' OR email LIKE '%$inputsearch%' OR role LIKE '%$inputsearch%' OR trangthai LIKE '%$inputsearch%' LIMIT $offset, $sobg ";

} else {
    $select = "SELECT * FROM acc LIMIT $offset, $sobg";

}
$maxmsg="SELECT MAX(msg_id) FROM messages";
$querymsg = "SELECT * FROM messages";
$resultmsg = mysqli_query($conn, $querymsg);

    // $tong_tn="SELECT COUNT(DISTINCT msg_id) FROM acc LEFT JOIN messages ON messages.id = acc.id";
    $result = mysqli_query($conn, $select);
    
    $ms="SELECT * FROM messages";
    $stt_hang = 0;
   

    while ($row = mysqli_fetch_object($result)) {
        $stt_hang++;
        $id_tk[$stt_hang] = $row->id;
        $username[$stt_hang] = $row->username;
        // $password[$stt_hang] = $row->password;
        // $email[$stt_hang] = $row->email;
        $full_name[$stt_hang] = $row->full_name;

        $role[$stt_hang] = $row->role;
        // $trangthai[$stt_hang] = $row->trangthai;
        
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
    <div style=" display:flex;">
        <div class="col-md-4  text-light card  ">
            <div class="card-header timkiem ">  
                <form method="post" class=" ">
                    <div class="timkiem input-group">                  
                        <input class="form-control search" type="text" id="searchInputdatphong" name="search" placeholder="Tìm kiếm...">
                        <button id="searchInputdatphongbutton"  class="input-group-text search_btn" type="submit">
                            <i class="fa-solid fa-magnifying-glass" style="color: #f7f7f8;"></i>
                        </button>
                    </div>
                </form>
            </div>
            <div class=" ">
                 <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class=" nav-pills "  >
                    <?php for($i=1;$i<=$tong_bg;$i++){
                        if($role[$i]=="User"){if( $id_tk[$i] == 78){?>         
                        <a class="nav-link active" id="<?php echo $username[$i]?>-tab" data-toggle="pill" href="#v-pills-<?php echo $username[$i]?>" role="tab" aria-controls="<?php echo $username[$i]?>" aria-selected="true">
                            <div class="d-flex bd-highlight">
                                <div class="img_cont">
                                    <img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img">
                                    <span class="online_icon"></span>
                                </div>
                                <div class="user_info">
                                    <span><?php echo $full_name[$i]?></span>
                                    <p><?php echo $username[$i]?></p>
                                </div>
                            </div>
                        </a>
                    <?php }else{ ?>
                        <a class="nav-link" id="<?php echo $username[$i]?>-tab" data-toggle="pill" href="#v-pills-<?php echo $username[$i]?>" role="tab" aria-controls="<?php echo $username[$i]?>" aria-selected="false">
                            <div class="d-flex bd-highlight  ">
                                <div class="img_cont">
                                    <img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img">
                                    <span class="online_icon"></span>
                                </div>
                                <div class="user_info">
                                    <span><?php echo $full_name[$i]?></span>
                                    <p><?php echo $username[$i]?></p>
                                </div>
                            </div>
                        </a>
                    
                        <?php } ?>
                        <?php }}?>
                    </li>
                </ui>
            </div>
        </div>
        <div class="col-md-8 ">
            <div class=" tab-content" id="v-pills-tabContent" >
                <?php for($a=1;$a<=$tong_bg;$a++){
                        if($role[$a]=="User"){if( $id_tk[$a] == 78){?>
                        
                <div class="card tab-pane fade show active" id="v-pills-<?php echo $username[$a]?>" role="tabpanel" aria-labelledby="v-pills-<?php echo $username[$a]?>-tab" >   
                    <div class="card-header">
                        <div class="d-flex bd-highlight  ">
                            <div class="img_cont">
                                <img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img">
                                <span class="online_icon"></span>
                            </div>
                            <div class="user_info">
                                <span><?php echo $full_name[$a]?></span>
                                <p>1767 Messages</p>
                            </div>
                            <div class="video_cam">
                                <span><i class="fas fa-video"></i></span>
                                <span><i class="fas fa-phone"></i></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card-body msg_card_body overflow-auto" id="myTabContent" style="height: 400px;" >        
                    <?php if(!empty($tong_ms)){ for($b=6;$b<=500;$b++){if(isset($id_tkms[$b])){if($id_tk[$a] == $id_tkms[$b]){
                        if(isset($outcoming_msg[$b]) && !empty($outcoming_msg[$b])) {?>          
                        <div class="d-flex justify-content-start mb-4">
                            <div class="img_cont_msg">
                                <img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img_msg">
                            </div>
                            <div class="msg_cotainer">
                            <?php echo $outcoming_msg[$b] ?>
                                <span class="msg_time"><?php echo $time[$b]?></span>
                            </div>
                        </div>
                        <?php }else if(isset($incoming_msg[$b]) && !empty($incoming_msg[$b])) {?>
                        <div class="d-flex justify-content-end mb-4">
                            <div class="msg_cotainer_send">
                            <?php echo $incoming_msg[$b] ?>
                                <span class="msg_time_send"><?php echo $time[$b]?></span>
                            </div>
                            
                        </div>
                        <?php }}}}}?>
                    </div>
                    <div class="card-footer">
                        <form action="add_tinnhancontroller.php" method="POST" enctype="multipart/form-data">
                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text attach_btn"><i class="fas fa-paperclip"></i></span>
                                </div>
                                    <textarea  class="form-control type_msg" placeholder="Type your message..." name="incoming_msg" required></textarea>
                                    <input type="text" name="idr" style="display: none;" value="<?php echo $id_tk[$a] ?>">    
                                    <div class="input-group-append">
                                    <button class="input-group-text send_btn"><i class="fas fa-location-arrow"></i>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> 



                <?php }else { ?>






                    
                <div class="card tab-pane fade " id="v-pills-<?php echo $username[$a]?>" role="tabpanel" aria-labelledby="v-pills-<?php echo $username[$a]?>-tab" >   
                    <div class="card-header">
                        <div class="d-flex bd-highlight  ">
                            <div class="img_cont">
                                <img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img">
                                <span class="online_icon"></span>
                            </div>
                            <div class="user_info">
                                <span><?php echo $full_name[$a]?></span>
                                <p>1767 Messages</p>
                            </div>
                            <div class="video_cam">
                                <span><i class="fas fa-video"></i></span>
                                <span><i class="fas fa-phone"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="card-body msg_card_body overflow-auto " id="myTabContent" style="height: 400px;">
                    <?php
                        for ($b = 6; $b <= 500; $b++) {
                            if (isset($id_tkms[$b])) {
                                $current_id = intval($a); // Chắc chắn rằng $a là một số nguyên
                                if ($id_tk[$current_id] == $id_tkms[$b]) {
                                    if (isset($outcoming_msg[$b]) && !empty($outcoming_msg[$b])) { ?>
                                        <div class="d-flex justify-content-start mb-4">
                                            <div class="img_cont_msg">
                                                <img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img_msg">
                                            </div>
                                            <div class="msg_cotainer">
                                                <?php echo $outcoming_msg[$b] ?>
                                                <span class="msg_time"><?php echo $time[$b] ?></span>
                                            </div>
                                        </div>
                                    <?php } else if (isset($incoming_msg[$b]) && !empty($incoming_msg[$b])) { ?>
                                        <div class="d-flex justify-content-end mb-4">
                                            <div class="msg_cotainer_send">
                                                <?php echo $incoming_msg[$b] ?>
                                                <span class="msg_time_send"><?php echo $time[$b] ?></span>
                                            </div>
                                        </div>
                                    <?php }
                                }
                            }
                        }
                        ?>

                    </div>
                    <div class="card-footer">
                        <form action="add_tinnhancontroller.php"  method="POST" enctype="multipart/form-data">
                            <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text attach_btn"><i class="fas fa-paperclip"></i></span>
                                    </div>
                                        <textarea  class="form-control type_msg" placeholder="Type your message..." name="incoming_msg" required></textarea>
                                    <input type="text" name="idr" style="display: none;" value="<?php echo $id_tk[$a] ?>">    
                                    <div class="input-group-append">
                                        <button  class="input-group-text send_btn"><i class="fas fa-location-arrow"></i>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div> 

                <?php } }}?>

            </div> 
            
        </div>

    </div>




    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<!-- Bản gốc của Boostrap CSS -->

<!-- Bản gốc của Boostrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    
        $('.nav-pills a').on('click', function(e) {
            e.preventDefault();
            $(this).tab('show');
        });
    
</script>
<script>
    function checkLoginAndRedirect() {
        <?php
        if(!isset($_SESSION['userclient'])) {
        ?>
            alert("Vui lòng đăng nhập để đặt phòng");
            window.location.href = "dangnhapclient.php";
        <?php
        }
        else {
            ?>
                window.location.href = "danhsachphongks.php";
                
            <?php
            }
        ?>
    }
</script>
</html>
