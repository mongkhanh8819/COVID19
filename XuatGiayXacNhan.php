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
$user = $_SESSION['user'];
	$layid=0;
	if(isset($_REQUEST['id']))
	{
		$layid=$_REQUEST['id'];
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Xuất giấy xác nhận</title>
<link rel="stylesheet" type="text/css" href="CSS/style.css"/>
<link rel="stylesheet" type="text/css" href="CSS/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="CSS/all.css" />
<script type="text/javascript" src="JS/solid.min.js"></script>
<script type="text/javascript" src="JS/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="JS/bootstrap.min.js"></script>
<script type="text/javascript" src="JS/fontawesome.min.js"></script>
	<script>
		$(document).ready(function(){
			 $("#button").click(function () {
                $("#myModal").modal();
            });
			$("#traloi").blur(function(){
				var Traloi = $('#traloi').val();
				var regTraloi= /^[a-z0-9_-]{0,255}$/;
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
			<div id="logo"><img src="IMG/image 1.png" height="80"/></div>
			<div id="title">ChiEmCovid</div>
			<div id="logo2"><img src="IMG/image 2.png"height="110"/></div>
			<div id="contact"><b style="padding-left: 50px;">HOTLINE</b>: 19006868 <br> <b>Email</b>: chiemcaykhe@gmail.com</div>
			<div id="sig" style="margin-top:">
				<ul class="menu" style="float: left">
					<li id="dn"><a href="DangNhap.php" style="padding-right:15px;text-decoration:none;color:#000000;margin-left: 25px;"><i class="fas fa-user" style="font-size:25px;"></i>
					<?php
						echo $_SESSION['user'];
					?></a>
						<ul id="cn">
							<li><a href="QuanTriHeThong/DangNhapQTHT.php" >Quản trị hệ thống</a></li>
							<li><a href="YTePhuong/DangNhapCBYTP.php">Cán bộ y tế phường</a></li>
						</ul>
					</li>	
					</ul>
			</div>
		</div>
	</div>
		<div class="nav">
			<ul>
				<li><a href="index.php">Trang chủ</a></li>
				<li><a href="XuatGiayXacNhan.php"></a>Xuất giấy xác nhận</li>
				<li><a href="KhaiBaoYTe.php">Khai báo y tế</a></li>
				<li><a href="DatCauHoi.php">Đặt câu hỏi</a></li>
				<li><a href="HTDT/index.php?htdt">Lựa chọn hình thức điều trị</a></li>
				<li><a href="#">Hướng dẫn</a></li>
			</ul>
		</div>
		<div class="session">
		  <div class="articel">
			<form id="form1" name="form1" method="POST" style="font-family: Baskerville, 'Palatino Linotype', Palatino, 'Century Schoolbook L', 'Times New Roman', 'serif'">
				<span style="font-family: Baskerville, 'Palatino Linotype', Palatino, 'Century Schoolbook L', 'Times New Roman', 'serif';font-size: 30px;font-weight: bold; color: #000000; text-shadow:2px 5px 2px #4cff00;">THÔNG TIN BỆNH NHÂN</span>
				<?php
				$laysdt=$_SESSION['user'];
				if($laysdt>0){
					$p->loadTTBN("select * from benhnhan where SoDienThoai='$laysdt'");
					}
				else{
					$p->loadTTBN("select * from benhnhan");
				}
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
										<span style="font-family: Baskerville, 'Palatino Linotype', Palatino, 'Century Schoolbook L', 'Times New Roman', 'serif';font-size: 30px;font-weight: bold; text-shadow:2px 5px 2px #4cff00;">GIẤY XÁC NHẬN</span></br>
							<?php
							// Array containing sample image file names
							$images = array("giayxacnhan.pdf", );

							// Loop through array to create image gallery
				if($layid==""){
							foreach($images as $image){
								echo '<div class="img-box">';
								    echo '<img src="IMG/covid.jpg" width="200" alt="' .  pathinfo($image, PATHINFO_FILENAME) .'">';
									echo '<p><a href="tst.php?file=' . urlencode($image) . '" style="font-size:25px;">Download</a></p>';
								echo '</div>';
							}
				}
				else{
					echo "Bạn chưa đủ điều kiện xuất giấy xác nhận";
				}
							?>
							<?php
					
							
						if(isset($_REQUEST["file"])){
							// Get parameters
							$file = urldecode($_REQUEST["file"]); // Decode URL-encoded string
							$filepath = "IMG/" . $file;

							// Process download
						
							if(file_exists($filepath)) {
								header('Content-Description: File Transfer');
								header('Content-Type: application/octet-stream');
								header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
								header('Expires: 0');
								header('Cache-Control: must-revalidate');
								header('Pragma: public');
								header('Content-Length: ' . filesize($filepath));
								flush(); // Flush system output buffer
								readfile($filepath);
								exit;
							//}
					
					
						}
						}
						?>

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