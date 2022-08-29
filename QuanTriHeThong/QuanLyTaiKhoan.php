<?php
session_start();
 if(isset($_SESSION['user']) && isset($_SESSION['pass']))
 {
	include("../Class/ClsDangNhapQTHT.php");
	$q=new login();
	$q->confirmlogin($_SESSION['user'],$_SESSION['pass']);
 }
 else
 {
	header("location:DangNhapQTHT.php");	 
 }
include("../Class/ClsXuLi.php");
$p = new COVID();
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
<title>Quản lý tài khoản</title>
<link rel="stylesheet" type="text/css" href="../CSS/style.css"/>
<link rel="stylesheet" type="text/css" href="../CSS/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="../CSS/all.css" />
<script type="text/javascript" src="../JS/solid.min.js"></script>
<script type="text/javascript" src="../JS/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="../JS/bootstrap.min.js"></script>
<script type="text/javascript" src="../JS/fontawesome.min.js"></script>
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
	<script>
		$(document).ready(function(){
			
			 $("#txtMaTaiKhoan").blur(function(){
				var MaTK = $('#txtMaTaiKhoan').val();
				if(MaTK == "")
					{
						$("#tbMaTK").html("Chưa nhập mã tài khoản");
					}
				else{
					$("#tbMaTK").html("");
					}
			});
			$("#txtPhanquyen").blur(function(){
				var PQ = $('#txtPhanquyen').val();
				if(PQ == "")
					{
						$("#tbPQ").html("Chưa nhập phân quyền");
					}
				else{
					$("#tbPQ").html("");
				}
			});
				$("#txtMatKhau").blur(function(){
				var MK = $('#txtMatKhau').val();
				if(MK == "")
					{
						$("#tbMK").html("Chưa nhập mật khẩu");
					}
					else{
						$("#tbMK").html("");
					}
			});
			
		});
	</script>
</head>

<body>
	<div class="container-fluid">
	<div class="header">
		<div class="top-header">
			<div id="logan">TRANG ADMIN</div>
		</div>
		<div class="content">
			<div id="logo"><img src="../IMG/image 1.png" height="80"/></div>
			<div id="title">ChiEmCovid</div>
			<div id="logo2"><img src="../IMG/image 2.png"height="110"/></div>
			<div id="contact"><b style="padding-left: 50px;">HOTLINE</b>: 19006868 <br> <b>Email</b>: chiemcaykhe@gmail.com</div>
			<div id="sig" style="margin-top:">
				<ul class="menu" style="float: left">
					<li id="dn"><a href="DangNhapQTHT.php" style="padding-right: 15px;text-decoration:none;color:#000000;margin-left:50px;"><i class="fas fa-user" style="font-size:25px;"></i>
					<?php
						echo $_SESSION['user'];
					?></a>
						<ul id="cn">
							<li><a href="../YTePhuong/DangNhapCBYTP.php">Cán bộ y tế phường</a></li>
							<li><a href="../DangNhap.php" >Tài khoản bệnh nhân</a></li>
						</ul>
					</li>
					</ul>
					<a href="dangxuat.php" onclick="return dangxuat();" style="text-decoration: none;color:#000000;">Đăng xuất</a>
			</div>
		</div>
	</div>
		<div class="nav">
			<ul>
				<li><a href="TrangChuQTHT.php">Trang chủ</a></li>
				<li><a href="QuanLyTaiKhoan.php">Quản lý tài khoản công vụ</a></li>
				<li><a href="/COVID19/QuanTriHeThong/ADMIN/index.php?quanlybenhvien">Quản lý thông tin bệnh viện</a></li>
        		<li><a href="/COVID19/QuanTriHeThong/ADMIN/index.php?quanlycanboyte">Quản lý thông tin cán bộ y tế phường</a></li>
       			<li><a href="/COVID19/QuanTriHeThong/ADMIN/index.php?xuatthongke">Xuất thống kê</a></li>
        		<li><a href="/COVID19/QuanTriHeThong/ADMIN/index.php?phanquyen">Phân quyền</a></li>
				<!-- <li><a href="#">Điều trị</a></li> -->
				
			</ul>
		</div>
		<div class="session">
			<div class="art2">
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
					echo 'Vui lòng nhập mã tài khoản';	
				}
				else
				{
					$sqli= "SELECT * FROM taikhoancv WHERE MaTK LIKE '%$s%'";
					$count = $p->sotrang($sqli);
					if($count <=0)
					{
						echo 'không tìm thấy mã tài khoản với từ khoá: <b>'.$s.'</b>';
					}
					else
					{
						echo 'Tìm thấy '.$count.' mã tài khoản với từ khoá: <b>'.$s.'</b> ';
						
					}
				}
			}
			
		?>
        </div>
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
				<span style="font-family: Baskerville, 'Palatino Linotype', Palatino, 'Century Schoolbook L', 'Times New Roman', 'serif';font-size: 30px;font-weight: bold; text-shadow:2px 5px 2px #4cff00;">TÀI KHOẢN CÔNG VỤ</span></br>
				<div class="topmenu">
  
    </div>
				<div class="act">
				<label style="font-weight: bold">Mã Tài khoản</label>
				<input type="text" id="txtMaTaiKhoan" required name="txtMaTaiKhoan" style="margin-left:184px;" value="<?php echo $p->laycot("select MaTK from taikhoancv where MaTK='$layid' limit 1"); ?>"/>
				<label for="txtid"></label>
				<input type="hidden" id="txtid" name="txtid" value="<?php echo $layid ?>" />
				<span id="tbMaTK" style="color:red"></span>
				</div>
				
				<div class="act">
				<label style="font-weight: bold">Mật khẩu</label>
				<input type="password" id="txtMatKhau" name="txtMatKhau" style="margin-left:215px;width: 550px;" value="<?php echo $p->laycot("select password from taikhoancv where MaTK='$layid' limit 1"); ?>"/>
				<span id="tbMK" style="color:red"></span>
				</div>
				
				<div class="act">
				<label style="font-weight: bold">Phân quyền</label>
				<input type="number" id="txtPhanquyen" name="txtPhanquyen"  style="margin-left:198px;width:550px;" value="<?php echo $p->laycot("select phanquyen from taikhoancv where MaTK='$layid' limit 1"); ?>"/>
				<span id="tbPQ" style="color:red"></span>
				</div>
				<div style="margin-top: 10px;margin-bottom: 10px;">
					<input type="submit" name="themtaikhoan" style="background-color:#10E425;font-size:20px;border-radius:5px;margin-right: 175px;" id="button" value="Thêm tài khoản"/>
					
					<input type="submit" name="button" style="background-color:#10E425;font-size:20px;border-radius:5px;margin-right: 175px;" id="button" value="Xoá tài khoản"/>
					
					<input type="submit" name="button" style="background-color:#10E425;font-size:20px;border-radius:5px;" id="button" value="Cập nhật tài khoản"/>
				</div>
				<?php
					switch($_POST['button'])
					{
						case 'Xoá tài khoản':
							{
								$idxoa = $_REQUEST['txtid'];
								if($idxoa!="")
								{
									if($p->themxoasua("delete from taikhoancv where MaTK='$idxoa' limit 1")==1)
									{
										echo 'Xóa thành công';
									}
									else
									{
										echo 'Xóa không thành công';	
									}
								}
								else
								{
									echo'Vui lòng chọn tài khoản cần xóa';	
								}
								break;
							}
						case 'Cập nhật tài khoản':
								{
									$idsua=$_REQUEST['txtid'];	
									$taikhoan=$_REQUEST['txtMaTaiKhoan'];
									$matkhau=$_REQUEST['txtMatKhau'];
									$phanquyen=$_REQUEST['txtPhanquyen'];
									if($idsua!="")
									{
										if($p->themxoasua("UPDATE taikhoancv SET MaTK = '$taikhoan',password= '$matkhau',phanquyen='$phanquyen' WHERE MaTK ='$idsua' LIMIT 1")==1)
										{
											echo'Sửa thành công!!!';	
										}
										else
										{
											echo'Sửa không thành công!!!';	
										}
									}
									else
									{
									 echo 'Vui lòng chọn sản phẩm cần sửa!!!';	
									}
									break;
								}

						}
				?>
				<?php require '../Class/ClsThemTaiKhoan.php';?>
				</form>
				</div>
		  <div class="articel">
			<form id="form1" name="form1" method="POST" style="font-family: Baskerville, 'Palatino Linotype', Palatino, 'Century Schoolbook L', 'Times New Roman', 'serif'">
				<span style="font-family: Baskerville, 'Palatino Linotype', Palatino, 'Century Schoolbook L', 'Times New Roman', 'serif';font-size: 30px;font-weight: bold; color: #000000; text-shadow:2px 5px 2px #4cff00;">THÔNG TIN TÀI KHOẢN</span></br>
				
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
					$p->loadTKCV("select * from taikhoancv where MaTK=".$layid." limit 10  OFFSET ".$offset);
				}
				else if(isset($_POST['name']))
					{
						$s=$_POST['name'];	
						
							$sqli= "SELECT * FROM taikhoancv WHERE MaTK LIKE '%$s%'";
							$p->loadTKCV($sqli);
							
					}
				else
				{
					$p->loadTKCV("select * from taikhoancv limit ".$page." OFFSET ".$offset);
				}
		
			$sql = "select * from taikhoancv ";
			$ds=$p->sotrang($sql);
			$total_page =ceil($ds/ $page);
			
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