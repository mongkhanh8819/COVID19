<?php
session_start();
 if(isset($_SESSION['user']) && isset($_SESSION['pass']))
 {
	include("Class/ClsDangNhap.php");
	$q=new login();
	$q->confirmlogin($_SESSION['user'],$_SESSION['pass']);
 }
 else
 {
	header("location:DangNhap.php");	 
 }
include("Class/ClsXuLi.php");
$p = new COVID();

	
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Đặt câu hỏi</title>
<link rel="stylesheet" type="text/css" href="CSS/style.css"/>
<link rel="stylesheet" type="text/css" href="CSS/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="CSS/all.css" />
<script type="text/javascript" src="JS/solid.min.js"></script>
<script type="text/javascript" src="JS/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="JS/bootstrap.min.js"></script>
<script type="text/javascript" src="JS/fontawesome.min.js"></script>
	<script>
		$(document).ready(function(){
			
			function kiemtratd(){
				var Tieude = $('#tieude').val();
				//var regTieude= /^([A-Za-z0-9_-]*\s)*([A-Za-z0-9_-]*)$/;
				var words = $('#tieude').val().length;
				if(Tieude == "")
				{
						$("#tbtieude").html("Chưa nhập tiêu đề");
				}
				else{ 
					if(words > 10){
						$('#tbtieude').html("");
						return true;
					}
					else{
						$('#tbtieude').html("Vui lòng nhập tiêu đề ít nhất 10 kí tự");
						return false;
					}
				}
			}
			$("#tieude").blur(kiemtratd);
			///

			function kiemtrand(){
				var Noidung = $('#noidung').val();
				var words = $('#noidung').val().length;
				//var regNoidung= /^[A-Za-z0-9_-]{30,200}$/;
				//var regNoidung= /^([A-Za-z0-9_-]{1,7}\s){50,}([A-Za-z0-9_-]*)$/;
				//var regNoidung= /^\w{5,10}$/;
				if(Noidung == "")
				{
					$("#tbnoidung").html("Chưa nhập nội dung ");
				}
				else{ 
					if(words > 50){
						$('#tbnoidung').html("");
						return true;
					}
					else{
						$('#tbnoidung').html("Vui lòng nhập nội dung ít nhất 50 kí tự");
						return false;
					}
				}
			}
			$("#noidung").blur(kiemtrand);

			$("#button").click(function() {
       		 if (kiemtratd() == true && kiemtrand() == true) {
        		return true;
        	}
       		 else{
       		 	$("#thongbao").html("Mời bạn nhập đúng thông tin!");
            	return false;
        	}
    });
		
		})
	</script>
</head>

<body>
	<div class="container-fluid">
	<div class="header">
		<div class="top-header">
			<div id="logan">HÃY GIỮ AN TOÀN CHO BẠN, GIA ĐÌNH VÀ CỘNG ĐỒNG TRƯỚC ĐẠI DỊCH COVID-19</div>
		</div>
		<div class="content">
			<div id="logo"><img src="IMG/image 1.png" height="80"/></div>
			<div id="title">ChiEmCovid</div>
			<div id="logo2"><img src="IMG/image 2.png"height="110"/></div>
			<div id="contact"><b style="padding-left: 50px;">HOTLINE</b>: 19006868 <br> <b>Email</b>: chiemcaykhe@gmail.com</div>
			<div id="sig" style="margin-top:">
				<ul class="menu" style="float: left">
					<li id="dn"><a href="DangNhap.php" style="padding-right: 15px;text-decoration:none;color:#000000;li"><i class="fas fa-user" style="font-size:25px;"></i>
					<?php
						echo $_SESSION['user'];
						$sodienthoai = $_SESSION['user'];

						$p->select_mabenhnhan("SELECT * FROM taikhoanbn JOIN benhnhan ON taikhoanbn.SoDienThoai = benhnhan.SoDienThoai_TK WHERE taikhoanbn.SoDienThoai = '$sodienthoai'");
						$mabn = $_SESSION['MaBenhNhan'];

					?></a>
						<ul id="cn">
							<li><a href="QuanTriHeThong/DangNhapQTHT.php" >Quản trị hệ thống</a></li>
							<li><a href="YTePhuong/DangNhapCBYTP.php">Cán bộ y tế phường</a></li>
						</ul>
					</li>
					
					</ul>
				<a href="DangKy.php" style="text-decoration: none;color:#000000;">Đăng ký</a>
			</div>
		</div>
	</div>
		<div class="nav">
			<ul>
				<li><a href="index.php">Trang chủ</a></li>
				<li><a href="XuatGiayXacNhan.php">Xuất giấy xác nhận</a></li>
				<li><a href="KhaiBaoYTe.php">Khai báo y tế</a></li>
				<li><a href="DatCauHoi.php">Đặt câu hỏi</a></li>
				<li><a href="HTDT/index.php?htdt">Lựa chọn hình thức điều trị</a></li>
				<li><a href="#">Tư vấn hỗ trợ</a></li>
			</ul>
		</div>
	  	<div class="session" style="font-family: Baskerville, 'Palatino Linotype', Palatino, 'Century Schoolbook L', 'Times New Roman', 'serif'">
			<div class="TMHD">THẮC MẮC & HỎI ĐÁP </div>
			<form method="POST">
				<table style="margin-left: 200px;">
					<tr>
						<td><label style="font-size:20px;font-weight: bold">Tiêu đề</label></td>
					</tr>
					<tr>
					<td><input type="text" name="tieude" id="tieude" style="font-size:20px;width: 1097px;background-color:#3EE6E8 " /></br>
					<span id="tbtieude" style="color: red"></span>	
					</td>
					</tr>
					<tr>
						<td><label style="font-size:20px;font-weight: bold">Nội dung</label></td>
					</tr>
					<tr>
						<td><textarea name="noidung" id="noidung" cols="130" rows="15" style="background-color:#3EE6E8;resize: none"></textarea></br>
						<span id="tbnoidung" style="color: red"></span>
						</td>
					</tr>
					<tr style="text-align: center">
					<td><input type="submit" value="Gửi" id="button" name="button"/>
					<span id="thongbao" style="color: red"></span></td>	
					</tr>
				</table>
				<div align="center">
				<?php
							switch($_POST['button'])
							{
								case 'Gửi':
								{
									$TieuDe = $_REQUEST['tieude'];
									$NoiDung = $_REQUEST['noidung'];
									if($TieuDe != "" && $NoiDung != ""){
										if($p->themxoasua("INSERT INTO cauhoi(MaBenhNhan,TieuDe,NoiDung) VALUES('$mabn','$TieuDe','$NoiDung')")==1 && $TieuDe!="" && $NoiDung !="")
										{
											echo 'Lưu thành công';
											
										}
										else {
											echo 'Lưu không thành công';
										}
									}else{
										echo "Lưu không thành công";
									}
								}
								break;
							}
				?>
					</div>
			</form>
		</div>
		<div class="footer">
			<div id="ft_contact"><b style="padding-left: 50px;">HOTLINE</b>: 19006868 <br> <b>Email</b>: chiemcaykhe@gmail.com</div>
			<div class="ft_nav">
				<ul>
					<li>Hướng dẫn</li>
					<li>Tư vấn - Hỗ trợ</li>
					<li>Điều khoản sử dụng</li>
				</ul>
			</div>
		</div>
		<div class="hotline-phone-ring" style="position: fixed;right: 0 ;bottom: 80px">
			  <div class="hotline-phone-ring-circle" style="border: 2px solid #2168f3;"></div>
			  <div class="hotline-phone-ring-circle-fill" style="background-color: #2168f3"></div>
			  <div class="hotline-phone-ring-img-circle" style="background-color: #2168f3"> <a href="tel:0989.8989.99" class="pps-btn-img">
				<i style="color:#fff;font-size:20px;" class="fas fa-envelope"></i> </a> </div>
      </div>
  	  <div class="hotline-phone-ring" style="position: fixed;right: 0 ;bottom: 0">
			  <div class="hotline-phone-ring-circle"></div>
			  <div class="hotline-phone-ring-circle-fill"></div>
			  <div class="hotline-phone-ring-img-circle"> <a href="tel0989.8989.99" class="pps-btn-img">
				<i style="color:#fff;font-size:20px;" class="fas fa-phone-alt"></i> </a> </div>
      </div>
	</div>
</body>
</html>