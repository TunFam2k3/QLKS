<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<script src="ckeditor/ckeditor.js"></script>
<style>
    body {
        font-family: Arial, sans-serif;
		background-size: cover;
    }
    .container {
        max-width: 400px;
        margin: 0 auto;
        padding: 24px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0px 8px 16px black;
		margin-top: 8%;
		
    }
	.container:hover{
		transform: scale(1.01);
	}
    h1 {
        text-align: center;
        /* color: #FF5733; */
    }
    table {
        width: 100%;
		
    }
    table tr {
        text-align: left;
    }
    table tr td {
        padding: 10px;
    }
    input[type="number"],
    input[type="text"],
    input[type="file"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    input[type="submit"] {
        background-color: #FF5733;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        cursor: pointer;
    }
    input[type="submit"]:hover {
        background-color: #FF7044;
    }
</style>
	

</head>

<body>
    <div class="container">
        <?php
        $db="anh";
        $conn=new mysqli("localhost","root","",$db) or die ("Không connect đc với máy chủ");
        $query_loaiphong="SELECT * FROM `loai_phong`";
				$result=$conn->query($query_loaiphong);
				$stt_hang_loaiphong=0;
				while($row = mysqli_fetch_object($result))// trả về kết quả theo dòng
				{

				$stt_hang_loaiphong++;
				$id_loai_phong[$stt_hang_loaiphong]=$row->id;
				$loaiphong[$stt_hang_loaiphong]=$row->loaiphong;
				}
					$tong_bg_loaiphong = mysqli_num_rows(mysqli_query($conn, $query_loaiphong));// trả về số lượng bản ghi
        ?>
        <h1>Thêm Phòng</h1>
        <form action="add_phongcontroller.php" method="POST" enctype="multipart/form-data">
            <table>
				<tr>
                    <td>Loại phòng</td>
                    <td>
                    <select name="loaiphong" id="">
          <?php
          for ( $i = 1; $i <= $tong_bg_loaiphong; $i++ ) {
            ?>
          <option value="<?php echo $loaiphong[$i]?>"><?php echo $loaiphong[$i]?></option>
          <?php
          }
          ?>
        </select>
					</td>
                </tr>
                <tr>
                    <td>Giá</td>
                    <td><input type="number" name="price" ></td>
                </tr>
                <tr>
                    <td>Mô tả</td>
                    <td><textarea name="description" id="description"></textarea></td>
                </tr>
                <tr>
                    <td>Ảnh</td>
                    <td><input type="file"  name="anhphong" ></td>
                </tr>
				<tr>
                    <td>Tình trạng</td>
                    <td><input type="text" name="tinhtrang"  readonly value="Còn trống"></td>
                </tr>
				
				
				
				<?php 
				
				$query="SELECT * FROM tinhthanh";
				$result=$conn->query($query);
				$stt_hang=0;
				while($row = mysqli_fetch_object($result))// trả về kết quả theo dòng
				{

				$stt_hang++;
				$id_tinh[$stt_hang]=$row->id_tinh;
				$tinhthanh[$stt_hang]=$row->tinhthanh;
				}
					$tong_bg = mysqli_num_rows(mysqli_query($conn, $query));// trả về số lượng bản ghi

					?>
				<tr>
                    <td>Địa điểm</td>
                    <td><select name="diadiem" id="">
						<?php for($i=1;$i<=$tong_bg;$i++){
						?>
							<option name="diadiem" value="<?php echo $tinhthanh[$i] ?>"><?php echo $tinhthanh[$i]?></option>
						<?php
						}?>
						</select></td>
                </tr>
                <tr>
                    <td></td>
                                   
      <script type="text/javascript">

function testConfirmDialog()  {

     var result = confirm("Bạn có chắc muốn thêm phòng ?");

     if(result)  {
        alert("Thêm phòng thành công");
        return true;
     } else {
        return false;
     }
}

</script>
                    <td Align="center" ><button onclick ="testConfirmDialog()"value="Xác nhận"> Xác nhận</button></td>
                    <td>        <button><a href=""></a>Hủy</button>
</td>
                </tr>
            </table>
        </form>
    </div>
</body>
	<script>
	CKEDITOR.replace('description');
	</script>
</html>
