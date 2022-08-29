<?php
session_start();
 if(isset($_SESSION['user']) && isset($_SESSION['pass']))
 {
	include("../Class/ClsDangNhapYTP.php");
	$q=new login();
	$q->confirmlogin($_SESSION['user'],$_SESSION['pass']);
 }
include("../Class/ClsXuLi.php");
$p = new COVID();

$layid=0;
	if(isset($_REQUEST['idbn']))
	{
		$layid=$_REQUEST['idbn'];
	}	
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Xác nhận tình trạng bệnh nhân</title>
<link rel="stylesheet" type="text/css" href="../CSS/style.css"/>
<link rel="stylesheet" type="text/css" href="../CSS/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="../CSS/all.css" />
<script type="text/javascript" src="../JS/solid.min.js"></script>
<script type="text/javascript" src="../JS/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="../JS/bootstrap.min.js"></script>
<script type="text/javascript" src="../JS/fontawesome.min.js"></script>
	<script>
		$(document).ready(function(){
			 $("#button").click(function () {
                $("#myModal").modal();
            });
			$("#traloi").blur(function(){
				var Traloi = $('#traloi').val();
				var regTraloi= /[a-z0-9_-]{0,255}$/;
				if(Traloi == "")
					{
						$("#tbtraloi").html("Chưa nhập nội dung vào phiếu trả lời");
					}
				else if(regTraloi.test(Traloi)){
					$('#tbtraloi').html("");
					return true;
				}
				else{
				$('#tbtraloi').html("Không hợp lệ");
				return false;
				}
			});
			$("#txtMaBenhNhan").blur(function(){
				var MaBN = $('#txtMaBenhNhan').val();
				var regMaBN= /^[0-9]{0,255}$/;
				if(MaBN == "")
					{
						$("#tbMaBN").html("Chưa nhập mã bệnh nhân");
					}
				else if(regMaBN.test(MaBN)){
					$('#tbMaBN').html("");
					return true;
				}
				else{
				$('#tbMaBN').html("Không hợp lệ");
				return false;
				}
			});
			$("#txtTinhTrang").blur(function(){
				var MaBN = $('#txtTinhTrang').val();
				if(MaBN == "")
					{
						$("#tbTinhTrang").html("Chưa nhập tình trạng bệnh nhân");
					}
				else{
					$("#tbTinhTrang").html("");
				}
			});
				$("#txtMaCBYTP").blur(function(){
				var MaBN = $('#txtMaCBYTP').val();
				if(MaBN == "")
					{
						$("#tbCBYTP").html("Chưa nhập mã cán bộ y tế phường");
					}
					else{
						$("#tbCBYTP").html("");
					}
			});
			$("#txtMaBenhVien").blur(function(){
				var MaBN = $('#txtMaBenhVien').val();
				if(MaBN == "")
					{
						$("#tbMaBV").html("Chưa nhập mã bệnh viện");
					}
				else{
					$("#tbMaBV").html("");
				}
			});
			  $("#txtNgayLapPhieu").blur(function () {
                var ngaylp = new Date($("#txtNgayLapPhieu").val());
                var Ngayht = new Date();
                var x = ngaylp.getTime() - Ngayht.getTime();
                var Timechenhlech = Math.round(x /1000/60/60/24)
                if (Timechenhlech ==0) {
                    $("#tbNgayLapPhieu").html("");
                    return true;
                }
                else {
                    $("#tbNgayLapPhieu").html("Ngày lập phiếu phải là ngày hiện tại");
                    return falsel;
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
		<div class="session">
		  <div class="articel">
			<form id="form1" name="form1" method="POST" style="font-family: Baskerville, 'Palatino Linotype', Palatino, 'Century Schoolbook L', 'Times New Roman', 'serif'">
				<span style="font-family: Baskerville, 'Palatino Linotype', Palatino, 'Century Schoolbook L', 'Times New Roman', 'serif';font-size: 30px;font-weight: bold; color: #000000; text-shadow:2px 5px 2px #4cff00;">THÔNG TIN BỆNH NHÂN</span>
				<div class="topmenu">
					<div style="width:100%;height:25px;">
					<form id="search" action="" method="POST" style="float:right">
						<input type="text" name ="name" placeholder="Tìm kiếm"/>
						<input type="submit" value="Tìm kiếm" name="search" style="background-color:#10E425;border-radius: 5px;"/>
					</form>
					</div>
					<div style="width:50%;height:25px;color:#000">
				 <?php
					if(isset($_POST['search']))
					{
						$s=$_POST['name'];	
						if($s == "")
						{
							echo 'Vui lòng nhập mã bệnh nhân';	
						}
						else
						{
							$sqli= "SELECT * FROM benhnhan WHERE MaBenhNhan LIKE '%$s%'";
							$count = $p->sotrang($sqli);
							if($count <=0)
							{
								echo 'không tìm thấy mã bệnh nhân với từ khoá: <b>'.$s.'</b>';
							}
							else
							{
								echo 'Tìm thấy '.$count.' mã bệnh nhân với từ khoá: <b>'.$s.'</b> ';

							}
						}
					}
			
		?>
						 </div>
    </div>
				
				  <?php 
			
					$page = 8;
					$current_page = 1;
					if(isset($_GET['page']))
					{
						$current_page = $_GET['page'];
					}
					$offset=($current_page-1)*$page;


						$layid = $_REQUEST['id'];
						if($layid >0)
						{
							$p->loadTTBN("select * from benhnhan where MaBenhNhan=".$layid." limit 10  OFFSET ".$offset);
						}
						else if(isset($_POST['name']))
							{
								$s=$_POST['name'];	

									$sqli= "SELECT * FROM benhnhan WHERE MaBenhNhan LIKE '%$s%'";
									$p->loadTTBN($sqli);

							}
						else
						{
							$p->loadTTBN("select * from benhnhan limit ".$page." OFFSET ".$offset);
						}

					$sql = "select * from benhnhan ";
					$ds=$p->sotrang($sql);
					$total_page =ceil($ds/ $page);

			?>
				
			  </form>
				</div>
			<div class="art2">
				<form id="form2" name="form2" method="post" style="font-family: Baskerville, 'Palatino Linotype', Palatino, 'Century Schoolbook L', 'Times New Roman', 'serif';">
					<style>
									input[type=text]{
							width:550px;
							transition: width .55s ease-in-out;
						}
						   input[type=text]:focus{
							   width:560px;
							   background-color:rgb(0 123 255 / 25%);
						   }
					</style>
				<span style="font-family: Baskerville, 'Palatino Linotype', Palatino, 'Century Schoolbook L', 'Times New Roman', 'serif';font-size: 30px;font-weight: bold; text-shadow:2px 5px 2px #4cff00;">PHIẾU XÁC NHẬN TÌNH TRẠNG BỆNH NHÂN</span></br>
				
				<div class="act">
				<label style="font-weight: bold">Mã bệnh nhân</label>
				<input type="text" id="txtMaBenhNhan" name="txtMaBenhNhan" required style="margin-left:183px;"/>
				<span id="tbMaBN" style="color:red"></span>
				</div>
				
				<div class="act">
				<label style="font-weight: bold">Ngày lập phiếu xác nhận</label>
				<input type="datetime-local" id="txtNgayLapPhieu" name="txtNgayLapPhieu" required style="margin-left:108px;width: 550px" />
				<span id="tbNgayLapPhieu" style="color:red"></span>
				</div>
				
				<div class="act">
				<label style="font-weight: bold">Tình Trạng</label>
				<input type="number" id="txtTinhTrang" name="txtTinhTrang" required style="margin-left:206px;width:550px;"/>
				<span id="tbTinhTrang" style="color:red"></span>
				</div>
				
				<div class="act">
				<label style="font-weight: bold">Mã cán bộ y tế phường</label>
				<input type="text" id="txtMaCBYTP" name="txtMaCBYTP" required style="margin-left:121px;"/>
				<span id="tbCBYTP" style="color:red"></span>
				</div>
				
				<div class="act">
				<label style="font-weight: bold">Mã bệnh viện</label>
				<input type="text" id="txtMaBenhVien" name="txtMaBenhVien" required style="margin-left:187px;"/>
				<span id="tbMaBV" style="color:red"></span>	
				</div>
				
				<div class="act">
				<label style="font-weight: bold">Giải pháp</label>
				<div style="font-family: Baskerville, 'Palatino Linotype', Palatino, 'Century Schoolbook L', 'Times New Roman', 'serif'"><textarea cols="100%" rows="10"  id="traloi" name="traloi" style="background-color:rgb(0 123 255 / 25%);resize: none;border-radius:10px;"></textarea>
				</br><span id="tbtraloi" style="color:red"></span>
					
				</div>

				<input type="submit" name="button" style="background-color:#10E425;font-size:20px;border-radius:5px;" id="button" value="Lưu phiếu xác nhận"/>
<!--
				<div class="modal fade" id="myModal">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h2>PHIẾU TRẢ LỜI</h2>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<div class="modal-body">
							
								
								</div>
							</div>
						</div>
					</div>
-->
				<?php
								switch($_POST['button'])
								{
									case 'Lưu phiếu xác nhận':
										{

											$MaBenhNhan = $_REQUEST['txtMaBenhNhan'];
											$NgayLapPhieu = $_REQUEST['txtNgayLapPhieu'];
											$TinhTrang = $_REQUEST['txtTinhTrang'];
											$MaCBYTP = $_REQUEST['txtMaCBYTP'];
											$MaBenhVien = $_REQUEST['txtMaBenhVien'];
											$GiaiPhap = $_REQUEST['traloi'];
												if($p->themxoasua("INSERT INTO 	phieuxntinhtrangbenhnhan(NgayLapPhieu,TinhTrang,GiaiPhap,MaBenhNhan,MaCBYTP,MaBV) VALUES('$NgayLapPhieu','$TinhTrang','$GiaiPhap','$MaBenhNhan','$MaCBYTP','$MaBenhVien')")==1)
												{
													echo '<span style="color:blue">Lưu thành công</span>';
													

												}
												else{
													echo '<span style="color:red">Lưu không thành công</span>';
											
												}
										}
										break;
								}
							?>
				</form>
				</div>
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
			  <div class="hotline-phone-ring-img-circle"> <a href="../tel0989.8989.99" class="pps-btn-img">
				<i style="color:#fff;font-size:20px;" class="fas fa-phone-alt"></i> </a> </div>
      </div>
	</div>
</body>
</html>