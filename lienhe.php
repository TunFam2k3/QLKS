<!DOCTYPE html>
<html lang="en">

<?php 
    include './header.php';
    if(isset($_SESSION['userclient'])){
        include './chat.php';

    }
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <!-- External CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <div class="container-fluid" style="display:flex; padding-top:80px;">
        <div id="demo" class="carousel slide" data-bs-ride="carousel">
            <!-- The slideshow/carousel -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/img3.jpg" alt="slide 1" class="d-block w-100">
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="content2" style="margin-bottom: 30px; margin-top: 100px;">
            <div class="content21 container">
                <div class="frm_lienhe" style="text-align: center; font-size: 30px;">
                    <strong>LIÊN HỆ VỚI CHÚNG TÔI</strong>
                </div>
                <div class="content">
                    <div class="contentleft">
                        <strong class="contentleft-strong">Gửi tin nhắn cho chúng tôi</strong>
                        <form action="addlienhecontroller.php" method="POST" enctype="multipart/form-data">
                            <div class="lienheinput bg-white" style="gap: 20px;">
                                <input type="text" name="tenkhach" placeholder="Tên của bạn">
                                <input type="email" name="email" placeholder="Email của bạn">
                            </div>
                            <div class="lienheinput bg-white" style="height: 70px;">
                                <select class="container form-select border-1" name="loai_phanhoi" id="loai_phanhoi" placeholder="Chủ đề">
                                    <option class="bg-white" value="Đặt phòng">Đặt phòng</option>
                                    <option class="bg-white" value="Dịch vụ">Dịch vụ</option>
                                    <option class="bg-white" value="Thông tin">Thông tin</option>
                                    <option class="bg-white" value="Vấn đề khác">Vấn đề khác</option>
                                </select>
                            </div>
                            <div class="lienheinput bg-white">
                                <textarea class="multi-line-input" name="noidung_phanhoi" id="noidung_phanhoi" placeholder="Tin nhắn"></textarea>
                            </div>
                            <div class="lienheinput bg-white">
                                <button class="lienhebutton" type="submit" name="Gửi tin nhắn">Gửi tin nhắn</button>
                            </div>
                        </form>
                    </div>
                    <div class="contentright">
                        <div class="contentright-strong">
                            <strong class="contentright-strong">Liên lạc</strong>
                        </div>
                        <div class="i4">
                            <i class="fa-solid fa-location-pin" style="color: #ffffff;"></i><a>2 P. Thái Hà, Str, Wd, Hà Nội</a>
                        </div>
                        <div class="i4">
                            <i class="fa-solid fa-phone" style="color: #ffffff;"></i><a>024 3857 5588</a>
                        </div>
                        <div class="i4">
                            <i class="fa-solid fa-phone" style="color: #ffffff;"></i><a>+84 5847 5847</a>
                        </div>
                        <div class="i4">
                            <i class="fa-solid fa-envelope" style="color: #ffffff;"></i><a>info@novotelthaiha.com</a>
                        </div>
                        <div class="i4">
                            <i class="fa-brands fa-aws" style="color: #ffffff;"></i><a>novotelthaiha.com</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.56937808395!2d105.82144807530052!3d21.009891980634745!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ad8a205928b5%3A0x46e77ee250af2fa8!2sNovotel%20Hanoi%20Thai%20Ha!5e0!3m2!1svi!2s!4v1701079460175!5m2!1svi!2s"
            width="80%" height="500px" style="border-radius: 10px; justify-content: center; align-items: center; margin-left: 10%;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <?php 
        include './footer.php';
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description');
    </script>
</body>

</html>
