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
	header("location:Dangnhap.php");
	//echo "<script>window.location.href = 'DangNhap.php';</script>";	 
 }
 include("Class/ClsXuLi.php");
	$p=new COVID();
$user = $_SESSION['user'];
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Trang Chủ</title>
<link rel="stylesheet" type="text/css" href="CSS/style.css"/>
<link rel="stylesheet" type="text/css" href="CSS/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="CSS/all.css" />
<script type="text/javascript" src="JS/solid.min.js"></script>
<script type="text/javascript" src="JS/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="JS/bootstrap.min.js"></script>
<script type="text/javascript" src="JS/fontawesome.min.js"></script>
<script type="text/javascript">
	function dangxuat(){
    var x = confirm("Bạn có chắc chắn muốn đăng xuất?");
    if(x){
        return true;
    }else{
        return false;
    }
}
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
					?></a>
						<ul id="cn">
							<li><a href="QuanTriHeThong/DangNhapQTHT.php" >Quản trị hệ thống</a></li>
							<li><a href="YTePhuong/DangNhapCBYTP.php">Cán bộ y tế phường</a></li>
						</ul>
					</li>
					
					</ul>
				
				<!-- <a href="#" style="text-decoration: none;color:#000000;">Đăng ký</a> -->
				<a href="dangxuat.php" onclick="return dangxuat();" style="text-decoration: none;color:#000000;">Đăng xuất</a>
				
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
				
					
				</li>
			</ul>
		</div>
	  <div class='slide_bar' style="background-color: #6AE317;">
        
        <div id="banner" class="carousel slide" data-ride="carousel">
          
          <!-- Indicators -->
          <ul class="carousel-indicators">
            <li data-target="#banner" data-slide-to="0" class="active"></li>
            <li data-target="#banner" data-slide-to="1"></li>
            </ul>
          
          <!-- The slideshow -->
          <div class="carousel-inner" style="width: 100%;background-color: #F02B2F">
            <div class="carousel-item active" style="width:100%;background-color: aqua">
              <img src="IMG/image 3.png" height="600" width="100%" />
              </div>
            <div class="carousel-item">
              <img src="IMG/image 4.png" height="600" width="100%" />
              </div>
            </div>
          
          <!-- Left and right controls -->
          <a class="carousel-control-prev" href="#banner" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
          </a>
          <a class="carousel-control-next" href="#banner" data-slide="next">
            <span class="carousel-control-next-icon"></span>
          </a>
          </div>
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