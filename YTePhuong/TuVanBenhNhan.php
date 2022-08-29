<?php
session_start();
 if(isset($_SESSION['user']) && isset($_SESSION['pass']))
 {
	include("../Class/ClsDangNhapYTP.php");
	$q=new login();
	$q->confirmlogin($_SESSION['user'],$_SESSION['pass']);
 }
 else
 {
	header("location:DangNhapCBYTP.php");	 
 }
include("../Class/ClsXuLi.php");
$p = new COVID();

	
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tư vấn bệnh nhân</title>
<link rel="stylesheet" type="text/css" href="../CSS/style.css"/>
<link rel="stylesheet" type="text/css" href="../CSS/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="../CSS/all.css" />
<script type="text/javascript" src="../JS/solid.min.js"></script>
<script type="text/javascript" src="../JS/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="../JS/bootstrap.min.js"></script>
<script type="text/javascript" src="../JS/fontawesome.min.js"></script>
</head>

<body>
	<div class="container-fluid">
	<div class="header">
		<div class="top-header">
			<div id="logan">HÃY GIỮ AN TOÀN CHO BẠN, GIA ĐÌNH VÀ CỘNG ĐỒNG TRƯỚC ĐẠI DỊCH COVID-19</div>
		</div>
		<div class="content">
			<div id="logo"><img src="../IMG/image 1.png" height="80"/></div>
			<div id="title">ChiEmCovid</div>
			<div id="logo2"><img src="../IMG/image 2.png"height="110"/></div>
			<div id="contact"><b style="padding-left: 50px;">HOTLINE</b>: 19006868 <br> <b>Email</b>: chiemcaykhe@gmail.com</div>
			<div id="sig">
				<ul class="menu" style="float: left">
					<li id="dn"><a href="DangNhapCBYTP.php" style="padding-right:15px;text-decoration:none;color:#000000;margin-left: 50px;"><i class="fas fa-user" style="font-size:25px;"></i>
					<?php
						echo $_SESSION['user'];
					?></a>
						<ul id="cn">
							<li><a href="../QuanTriHeThong/DangNhapQTHT.php" >Quản trị hệ thống</a></li>
							<li><a href="../DangNhap.php">Tài khoản bệnh nhân</a></li>
						</ul>
					</li>	
					</ul>
			</div>
		</div>
	</div>
		<div class="nav">
			<ul>
				<li><a href="TrangChuCBYTP.php">Trang chủ</a></li>
				<li><a href="XacNhanTTBN.php">Xác nhận tình trạng bệnh nhân</a></li>
				<li><a href="quanli_benhnhan.php">Quản lý thông tin bệnh nhân</a></li>
				<li><a href="TuVanBenhNhan.php">Tư vấn bệnh nhân</a></li>
			</ul>
		</div>
	  	<div class="session" style="font-family: Baskerville, 'Palatino Linotype', Palatino, 'Century Schoolbook L', 'Times New Roman', 'serif'">
			<div class="TMHD">CÂU HỎI CẦN GIẢI ĐÁP </div>
			<form name="form1" id="form1" method="POST" action="https://accounts.google.com/ServiceLogin">
            	<table border="1" style="width: 100%;">
                	<tr style="background-color: #07DE44">
                    	<th>STT</th>
                        <th>Họ tên</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th>Tiêu đề</th>
                    </tr>
                    <tr>
                    	<td>1</td>
                        <td>
                        	<?php
								$p->hoten("select TenBenhNhan from benhnhan where MaBenhNhan='1'");
							?>
                        </td>
                        <td>
                        	<?php
									$p->sodienthoai("select SoDienThoai from benhnhan where MaBenhNhan='1'");
							?>
                        </td>
                        <td>
                        	<?php
									$p->email("select Email from benhnhan where MaBenhNhan='1'");
							?>
                        </td>
                        <td>
                        	<a href="#" data-toggle="modal" data-target="#noidung1"> 
                            	<?php
									$p->tieude("select TieuDe from cauhoi where MaCauHoi='1'");
								?>
                            </a>
                        </td>
    
                    </tr>
                     <tr>
                    	<td>2</td>
                        <td>
							<?php
                                    $p->hoten("select TenBenhNhan from benhnhan where MaBenhNhan='2'");
                            ?>
                        </td>
                        <td>
                        	<?php
									$p->sodienthoai("select SoDienThoai from benhnhan where MaBenhNhan='2'");
							?>
                        </td>
                        <td>
                        	<?php
									$p->email("select Email from benhnhan where MaBenhNhan='2'");
							?>
                        </td>
                        <td>
							<a href="#" data-toggle="modal" data-target="#noidung2"> 
                            	<?php
									$p->tieude("select TieuDe from cauhoi where MaCauHoi='2'");
								?>
                            </a>
                        </td>
  
                    </tr>
                     <tr>
                    	<td>3</td>
                        <td>
                        	<?php
								$p->hoten("select TenBenhNhan from benhnhan where MaBenhNhan='3'");
							?>
                        </td>
                        <td>
                        	<?php
									$p->sodienthoai("select SoDienThoai from benhnhan where MaBenhNhan='3'");
							?>
                        </td>
                        <td>
                        	<?php
									$p->email("select Email from benhnhan where MaBenhNhan='3'");
							?>
                        </td>
                        <td>
							<a href="#" data-toggle="modal" data-target="#noidung3"> 
                            	<?php
									$p->tieude("select TieuDe from cauhoi where MaCauHoi='3'");
								?>
                            </a>
                        </td>

                    </tr>
                </table>
                <div class="modal" id="noidung1" >
                	<div class="modal-dialog">
                    	<div class="modal-content">
                        	<div class="modal-header">
                            	<?php
									$p->tieude("select TieuDe from cauhoi where MaCauHoi='1'");
								?>
                            </div>
                            <div class="modal-body">
                            	<?php
									$p->noidung("select NoiDung from cauhoi where MaCauHoi='1'");
								?>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-danger close" data-dismiss="modal">Đóng</button>
                            <a href="https://accounts.google.com/ServiceLogin">
                            	<button type="submit" class="btn btn-success">Trả lời</button>
                            </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal" id="noidung2">
                	<div class="modal-dialog">
                    	<div class="modal-content">
                        	<div class="modal-header">
                            	<?php
									$p->tieude("select TieuDe from cauhoi where MaCauHoi='2'");
								?>
                            </div>
                            <div class="modal-body">
                            	<?php
									$p->noidung("select NoiDung from cauhoi where MaCauHoi='2'");
								?>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-danger close" data-dismiss="modal">Đóng</button>
                            <a href="https://accounts.google.com/ServiceLogin">
                            	<button type="submit" class="btn btn-success">Trả lời</button>
                            </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal" id="noidung3">
                	<div class="modal-dialog">
                    	<div class="modal-content">
                        	<div class="modal-header">
                            	<?php
									$p->tieude("select TieuDe from cauhoi where MaCauHoi='3'");
								?>
                            </div>
                            <div class="modal-body">
                            	<?php
									$p->noidung("select NoiDung from cauhoi where MaCauHoi='3'");
								?>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-danger close" data-dismiss="modal">Đóng</button>
                            <button type="button" class="btn btn-success" data-dismiss="modal">Trả lời</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
		</div>
		<div class="footer" style="clear: both;margin-top: 250px;">
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
			  <div class="hotline-phone-ring-img-circle"> <a href="../tel0989.8989.99" class="pps-btn-img">
				<i style="color:#fff;font-size:20px;" class="fas fa-phone-alt"></i> </a> </div>
      </div>
	</div>
</body>
</html>

