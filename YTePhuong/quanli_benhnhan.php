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
include("../Class/clsMain.php");
	$p = new mainFunction();
	$layma = 0;
	if(isset($_REQUEST['mabenhnhan'])) {
		$layma = $_REQUEST['mabenhnhan'];	
	}
?>
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
	<style type="text/css">
#form1 table {
	color: #000;
	background-color: #33CCFF;
	background-image: none;
}
</style>
	
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
		<div>
			<form id="form1" name="form1" method="post" action="">
  <table width="707" border="1" align="center" cellpadding="5" cellspacing="0">
    <tr>
      <td colspan="2" align="center" valign="middle" bgcolor="#33CCFF"><strong>THÔNG TIN BỆNH NHÂN</strong></td>
    </tr>
    <tr>
      <td width="180" bgcolor="#33CCFF">Mã bệnh nhân:</td>
      <td width="501" bgcolor="#33CCFF"><label for="txtmabn"></label>
      <input name="txtmabn" type="text" id="txtmabn" size="80" value="<?php echo $laymabn=$p->layCot("select MaBenhNhan from benhnhan where MaBenhNhan='$layma' LIMIT 1");?>"/>
      <input name="txtma" type="hidden" id="txtma" value="<?php echo $layma; ?>"/>
      </td>
    </tr>
    <tr>
      <td bgcolor="#33CCFF">Tên bệnh nhân:</td>
      <td bgcolor="#33CCFF"><label for="txttenbn"></label>
      <input name="txttenbn" type="text" id="txttenbn" size="80" value="<?php echo $p->layCot("select TenBenhNhan from benhnhan where MaBenhNhan='$layma' LIMIT 1"); ?>"/></td>
    </tr>
    <tr>
      <td bgcolor="#33CCFF">Email:</td>
      <td bgcolor="#33CCFF"><label for="txtemail"></label>
      <input name="txtemail" type="text" id="txtemail" size="80" value="<?php echo $p->layCot("select Email from benhnhan where MaBenhNhan='$layma' LIMIT 1"); ?>"/></td>
    </tr>
    <tr>
      <td bgcolor="#33CCFF">Số điện thoại:</td>
      <td bgcolor="#33CCFF"><label for="txtsdt"></label>
      <input name="txtsdt" type="text" id="txtsdt" size="80" value="<?php echo $p->layCot("select SoDienThoai from benhnhan where MaBenhNhan='$layma' LIMIT 1"); ?>"/></td>
    </tr>
    <tr>
      <td bgcolor="#33CCFF">Quê quán:</td>
      <td bgcolor="#33CCFF"><label for="txtquequan"></label>
      <input name="txtquequan" type="text" id="txtquequan" size="80" value="<?php echo $p->layCot("select QueQuan from benhnhan where MaBenhNhan='$layma' LIMIT 1"); ?>"/></td>
    </tr>
    <tr>
      <td bgcolor="#33CCFF">Ngày sinh:</td>
      <td bgcolor="#33CCFF"><label for="txtngaysinh"></label>
      <input name="txtngaysinh" type="date" id="txtngaysinh" size="80" value="<?php echo $p->layCot("select NgaySinh from benhnhan where MaBenhNhan='$layma' LIMIT 1"); ?>"/></td>
    </tr>
    <tr>
      <td bgcolor="#33CCFF">Địa chỉ:</td>
      <td bgcolor="#33CCFF"><label for="txtdiachi"></label>
      <input name="txtdiachi" type="text" id="txtdiachi" size="80" value="<?php echo $p->layCot("select DiaChi from benhnhan where MaBenhNhan='$layma' LIMIT 1"); ?>"/></td>
    </tr>
    <tr>
      <td bgcolor="#33CCFF">Trạng thái:</td>
      <td bgcolor="#33CCFF"><label for="txttrangthai"></label>
      <input name="txttrangthai" type="text" id="txttrangthai" size="80" value="<?php echo $p->layCot("select TrangThai from benhnhan where MaBenhNhan='$layma' LIMIT 1"); ?>"/></td>
    </tr>
    <tr>
      <td bgcolor="#33CCFF">Nơi điều trị:</td>
      <td bgcolor="#33CCFF"><label for="txtnoidieutri"></label>
      <input name="txtnoidieutri" type="text" id="txtnoidieutri" size="80" value="<?php echo $p->layCot("select NoiDieuTri from benhnhan where MaBenhNhan='$layma' LIMIT 1"); ?>"/></td>
    </tr>
    <tr>
      <td bgcolor="#33CCFF">Giới tính:</td>
      <td bgcolor="#33CCFF"><label for="txtgioitinh"></label>
      <input name="txtgioitinh" type="text" id="txtgioitinh" size="80" value="<?php echo $p->layCot("select GioiTinh from benhnhan where MaBenhNhan='$layma' LIMIT 1"); ?>"/></td>
    </tr>
    <tr>
      <td bgcolor="#33CCFF">CMND/CCCD:</td>
      <td bgcolor="#33CCFF"><label for="txtcmnd"></label>
      <input name="txtcmnd" type="text" id="txtcmnd" size="80" value="<?php echo $p->layCot("select CMND from benhnhan where MaBenhNhan='$layma' LIMIT 1"); ?>"/></td>
    </tr>
    <tr>
      <td bgcolor="#33CCFF">Quốc tịch:</td>
      <td bgcolor="#33CCFF"><label for="txtquoctich"></label>
      <input name="txtquoctich" type="text" id="txtquoctich" size="80" value="<?php echo $p->layCot("select QuocTich from benhnhan where MaBenhNhan='$layma' LIMIT 1"); ?>"/></td>
    </tr>
    <tr>
      <td bgcolor="#33CCFF">Mã bệnh viện:</td>
      <td bgcolor="#33CCFF"><label for="txtmabv"></label>
      <input name="txtmabv" type="text" id="txtmabv" size="80" value="<?php echo $p->layCot("select MaBV from benhnhan where MaBenhNhan='$layma' LIMIT 1"); ?>"/></td>
    </tr>
    <tr>
      <td bgcolor="#33CCFF">Mã phường:</td>
      <td bgcolor="#33CCFF"><label for="txtmaphuong"></label>
      <input name="txtmaphuong" type="text" id="txtmaphuong" size="80" value="<?php echo $p->layCot("select MaPhuong from benhnhan where MaBenhNhan='$layma' LIMIT 1"); ?>"/></td>
    </tr>
    <tr>
      <td bgcolor="#33CCFF">Số điện thoại - TK:</td>
      <td bgcolor="#33CCFF"><label for="txtsdt_tk"></label>
      <input name="txtsdt_tk" type="text" id="txtsdt_tk" size="80" value="<?php echo $p->layCot("select SoDienThoai_TK from benhnhan where MaBenhNhan='$layma' LIMIT 1"); ?>"/></td>
    </tr>
    <tr>
      <td colspan="2" align="center" bgcolor="#33CCFF"><input type="submit" name="btn" id="btn"  value="Thêm thông tin bệnh nhân" />
      <input type="submit" name="btn" id="btn" value="Sửa thông tin bệnh nhân" /></td>
    </tr>
  </table>
  <div align="center">
  	<?php 
		$btn = isset($_POST['btn'])?$_POST['btn']:'';
		switch($btn) {
			case 'Thêm thông tin bệnh nhân': {
				
				$mabn = $_REQUEST['txtmabn'];
				$tenbn = $_REQUEST['txttenbn'];
				$email = $_REQUEST['txtemail'];
				$sdt = $_REQUEST['txtsdt'];
				$quequan = $_REQUEST['txtquequan'];
				$ngaysinh = $_REQUEST['txtngaysinh'];
				$diachi = $_REQUEST['txtdiachi'];
				$trangthai = $_REQUEST['txttrangthai'];
				$noidieutri = $_REQUEST['txtnoidieutri'];
				$gioitinh = $_REQUEST['txtgioitinh'];
				$cmnd = $_REQUEST['txtcmnd'];
				$quoctich = $_REQUEST['txtquoctich'];
				$mabv = $_REQUEST['txtmabv'];
				$maphuong = $_REQUEST['txtmaphuong'];
				$sdt_tk = $_REQUEST['txtsdt_tk'];
				
				if($mabn!='') {
					if($p->themsua_benhnhan("INSERT INTO benhnhan (TenBenhNhan,Email,SoDienThoai,QueQuan,NgaySinh,DiaChi,TrangThai,NoiDieuTri,GioiTinh,CMND,QuocTich,MaBV,MaPhuong,SoDienThoai_TK) VALUES (N'$tenbn','$email','$sdt',N'$quequan','$ngaysinh',N'$diachi',$trangthai,N'$noidieutri',$gioitinh,'$cmnd',N'$quoctich','$mabv','$maphuong','$sdt_tk')")==1) {
						echo 'Thêm thông tin bệnh nhân thành công!';
					}
					else {
						echo 'Thêm thông tin bệnh nhân không thành công !';
						//echo "INSERT INTO benhnhan (TenBenhNhan,Email,SoDienThoai,QueQuan,NgaySinh,DiaChi,TrangThai,NoiDieuTri,GioiTinh,CMND,QuocTich,MaBV,MaPhuong,SoDienThoai_TK) VALUES (N'$tenbn','$email','$sdt',N'$quequan','$ngaysinh',N'$diachi',$trangthai,N'$noidieutri',$gioitinh,'$cmnd',N'$quoctich','$mabv','$maphuong','$sdt_tk')";	
					}
				}
				else {
					echo 'Vui lòng nhập đầy đủ thông tin!';	
				}
				break;	
			}
			case 'Sửa thông tin bệnh nhân': {
				
				$mabn_sua = $_REQUEST['txtma'];
				$mabn = $_REQUEST['txtmabn'];
				$tenbn = $_REQUEST['txttenbn'];
				$email = $_REQUEST['txtemail'];
				$sdt = $_REQUEST['txtsdt'];
				$quequan = $_REQUEST['txtquequan'];
				$ngaysinh = $_REQUEST['txtngaysinh'];
				$diachi = $_REQUEST['txtdiachi'];
				$trangthai = $_REQUEST['txttrangthai'];
				$noidieutri = $_REQUEST['txtnoidieutri'];
				$gioitinh = $_REQUEST['txtgioitinh'];
				$cmnd = $_REQUEST['txtcmnd'];
				$quoctich = $_REQUEST['txtquoctich'];
				$mabv = $_REQUEST['txtmabv'];
				$maphuong = $_REQUEST['txtmaphuong'];
				$sdt_tk = $_REQUEST['txtsdt_tk'];
				
				if($mabn_sua>0) {
					if($p->themsua_benhnhan("UPDATE benhnhan SET MaBenhNhan='$mabn',TenBenhNhan='$tenbn', Email='$email',								       SoDienThoai='$sdt',QueQuan='$quequan',NgaySinh='$ngaysinh',DiaChi='$diachi',TrangThai='$trangthai',NoiDieuTri='$noidieutri',GioiTinh='$gioitinh', CMND='$cmnd', QuocTich='$quoctich',MaBV='$mabv',MaPhuong='$maphuong',SoDienThoai_TK='$sdt_tk' WHERE MaBenhNhan='$mabn_sua'")==1) {
						echo 'Sửa thông tin thành công!';
					}
					else {
						echo 'Sửa thông tin không thành công!';	
					}
				}
				else {
					echo 'Vui lòng chọn bệnh nhân cần sửa thông tin!';	
				}
				
				break;	
			}	
		}
	?>
    <hr />
    
   <?php 
   	$p->loadDS_BenhNhan("select * from benhnhan order by MaBenhNhan asc");
	 
   ?>
    </table>
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
			  <div class="hotline-phone-ring-img-circle"> <a href="../tel0989.8989.99" class="pps-btn-img">
				<i style="color:#fff;font-size:20px;" class="fas fa-phone-alt"></i> </a> </div>
      </div>
	</div>
</body>
</html>