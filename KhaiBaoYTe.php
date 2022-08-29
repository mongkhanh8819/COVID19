<?php
	include ("Class/csdl.php");
	$p=new tmdt();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Khai báo y tế</title>
<link rel="stylesheet" type="text/css" href="CSS/style.css"/>
<link rel="stylesheet" type="text/css" href="CSS/test.css"/>
<link rel="stylesheet" type="text/css" href="CSS/all.css" />
<script type="text/javascript" src="JS/solid.min.js"></script>
<script type="text/javascript" src="JS/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="JS/bootstrap.min.js"></script>
<script type="text/javascript" src="JS/fontawesome.min.js"></script>
<script>

	$(document).ready(function(){
			$("#trieuchung").blur(function(){
				var trieuchung = $('#trieuchung').val();
				if(trieuchung == "")
					{
						$("#thongbaotrieuchung").html("Vui lòng nhập đầy đủ thông tin  ");
					}
				
			})
		})
	
	$(document).ready(function(){
			$("#lichsubenhnen").blur(function(){
				var lichsubenhnen = $('#lichsubenhnen').val();
				var reglichsubenhnen= /^[^0-9]{0,250}$/;
				if(lichsubenhnen == "")
					{
						$("#thongbaolichsu").html("Vui lòng nhập đầy đủ thông tin  ");
					}
				else if(reglichsubenhnen.test(lichsubenhnen))
					{
						$('#thongbaolichsu').html("");
						return true;
					}
				else
					{
					$('#thongbaolichsu').html("Thông tin nhập không hợp lệ");
					return false;
					}
			});
			$("#thoigianlap").blur(function () {
					var thoigianlap = new Date($("#thoigianlap").val());
					var regthoigianlap = new Date();
					var x = thoigianlap.getTime() - regthoigianlap.getTime();
					var Timechenhlech = Math.round(x /1000/60/60/24)
					if(Timechenhlech == 0 ){
						$("#thongbaothoigianlap").html("(*)");
						return true;
					}
					else {
						$("#thongbaothoigianlap").html("Thời gian lập không hợp lệ");
						return false;
					}
				});
			$("#ngayphathien").blur(function () {
					var ngayphathien = new Date($("#ngayphathien").val());
					var regngayphathien = new Date();
					var x = ngayphathien.getTime() - regngayphathien.getTime();
					var Timechenhlech = Math.round(x /1000/60/60/24)
					if(Timechenhlech < 0 || Timechenhlech ==0 ){
						$("#thongbaongayphathien").html("(*)");
						return true;
					}
					else {
						$("#thongbaongayphathien").html("Ngày phát hiện triệu chứng phải trước ngày hiện tại");
						return false;
					}
				});
	
		})
		
	
</script>
</head>

<body>
<div class="container">
	<div class="header">
		<div class="top-header">
			<div id="logan">HÃY GIỮ AN TOÀN CHO BẠN, GIA ĐÌNH VÀ CỘNG ĐỒNG TRƯỚC ĐẠI DỊCH COVID-19</div>
		</div>
		<div class="content">
			<div id="logo"><img src="IMG/image 1.png" height="80"/></div>
			<div id="title">ChiEmCovid</div>
			<div id="logo2"><img src="IMG/image 2.png"height="110"/></div>
			<div id="contact"><b style="padding-left: 50px;">HOTLINE</b>: 19006868 <br> <b>Email</b>: chiemcaykhe@gmail.com</div>
			<div id="sig">
				<a href="DangNhap.php" style="text-decoration: none;color:#000000;">Đăng nhập</a>
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
	<div class="header1">
		<div id="tieude" style="text-shadow: 2px 1px; padding-top: 5px; font-size: 50px;" >KHAI BÁO Y TẾ</div><br>
		<div id="tieude1" style="font-size: 20px; font-weight: bold;margin-top: -40px;">(PHÒNG CHỐNG DỊCH COVID 19)</div><br>
		<div id="tieude2" style="color: red; font-size: 20px; margin-top: -40px;">Khuyến cáo: Khai báo thông tin sai là vi phạm pháp luật Việt Nam và có thể xử lý hình sự </div>
	</div>
	<div class="nav1" style=" background-color:#F2EFEF; border-radius: 8px;">
		
		
		<form method="POST" class="fmkhaibao" style="padding-left: 10%; padding-right: 10%; padding-top:50px; padding-bottom: 10px;">
				
				
				<label for="mabenhnhan" >Mã bệnh nhân:</label><br>
				<input type="text" name="mabenhnhan" id="mabenhnhan"  required  style="width: 100%;"><span id="thongbaomabn" style="color: #FD0004;"></span><br><br>
				
				<label for="trieuchung" >Triệu chứng:</label><br>
				<input type="text" name="trieuchung" id="trieuchung"  style="width: 100%;" required><span id="thongbaotrieuchung" style="color: #FD0004;"></span><br><br>
				
				
				<label for="ngayphathien">Ngày phát hiện triệu chứng:</label><br>
				<input type="datetime-local" name="ngayphathien" id="ngayphathien" required  style="width: 100%;"><span id="thongbaongayphathien" style="color: #FD0004;"></span><br><br>
				
				<label for="lichsubenhnen" >Lịch sử bệnh nền:</label><br>
				<textarea name="lichsubenhnen" id="lichsubenhnen" required></textarea><span id="thongbaolichsu" style="color: #FD0004;"></span><br><br>
		
				<label for="thoigianlap" >Thời gian lập phiếu:</label><br>
				<input type="datetime-local" name="thoigianlap" id="thoigianlap" required  style="width: 100%;"><span id="thongbaothoigianlap" style="color: #FD0004;"></span><br><br>
				
				<input type="submit" id="button" name="button" value="GỬI PHIẾU KHAI BÁO" class="btn"> 
			
	<div align="center" style="font-weight: bold;">
		<?php
			switch($_POST['button'])
				{
					case 'GỬI PHIẾU KHAI BÁO':
						{

							$mabn=$_REQUEST['mabenhnhan'];
							$trieuchung=$_REQUEST['trieuchung'];
							$ngayphathien=$_REQUEST['ngayphathien'];
							$lichsubenhnen=$_REQUEST['lichsubenhnen'];
							$thoigianlap=$_REQUEST['thoigianlap'];
							if($p->themxoasua("INSERT INTO 	khaibaoyte(mabenhnhan,trieuchung,ngayphathien,lichsubenhnen,thoigianlap) VALUES('$mabn',N'$trieuchung','$ngayphathien',N'$lichsubenhnen','$thoigianlap')")==1)
							{
								echo 'Khai báo y tế thành công';
								//echo "INSERT INTO 	khaibaoyte(mabenhnhan,trieuchung,ngayphathien,lichsubenhnen,thoigianlap) VALUES('$mabn',N'$trieuchung','$ngayphathien',N'$lichsubenhnen','$thoigianlap'";
							}
							else
							{
								echo 'Khai báo y tế không thành công';
							}
							
						}
					break;					
				}
			?>
	</div>
			</form>
		
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
</div>
	
</body>
</html>