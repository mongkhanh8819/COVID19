<?php 
    
    session_start();

 ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Trang ADMIN</title>

<link rel="stylesheet" href="CSS/style.css">
<link rel="stylesheet" type="text/css" href="CSS/style1.css"/>
<link rel="stylesheet" type="text/css" href="CSS/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="CSS/all.css" />
<script type="text/javascript" src="JS/solid.min.js"></script>
<script type="text/javascript" src="JS/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="JS/bootstrap.min.js"></script>
<script type="text/javascript" src="JS/fontawesome.min.js"></script>
<script type="text/javascript" src="JS/script.js"></script>
<script>
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

    <?php
        
        //if(($_SESSION['dnadmin']) == false){
        //    include("View/dangnhap.php");
        //}
        //else
        if(isset($_SESSION['dnadmin']) && $_SESSION['dnadmin'] == true){
                ?>
        <div class="container-fluid">
            	<div class="header">
            		<div class="top-header">
            			<div id="logan">TRANG ADMIN</div>
            		</div>
            		<div class="content">
            			<div id="logo"><img src="IMG/image 1.png" height="80"/></div>
            			<div id="title">ChiEmCovid</div>
            			<div id="logo2"><img src="IMG/image 2.png"height="110"/></div>
            			<div id="contact"><b style="padding-left: 50px;">HOTLINE</b>: 19006868 <br> <b>Email</b>: chiemcaykhe@gmail.com</div>
            			<div id="sig" style="margin-top:0">
            				<a href="VIEW/dangxuat.php" onclick='return dangxuat();' style="padding-right: 15px;text-decoration:none;color:#000000;">Đăng xuất</a>
            			</div>
            		</div>
            	</div>
            		<div class="nav">
            			<ul>
                            <li><a href="../TrangChuQTHT.php">Trang chủ</a></li>
                            <li><a href="../QuanLyTaiKhoan.php">Quản lý tài khoản công vụ</a></li>
                            <li><a href="index.php?quanlybenhvien">Quản lý thông tin bệnh viện</a></li>
                            <li><a href="index.php?quanlycanboyte">Quản lý thông tin cán bộ y tế phường</a></li>
                            <li><a href="index.php?xuatthongke">Xuất thống kê</a></li>
                            <li><a href="index.php?phanquyen">Phân quyền</a></li>
            			</ul>
            		</div>
                    <div>
                        <?php 

                            if(isset($_REQUEST['quanlybenhvien'])){
                                include("View/vQuanLyTTBenhVien.php");
                            }elseif (isset($_REQUEST['updatebv'])) {
                                include("View/vCapnhatBenhVien.php");
                            }elseif(isset($_REQUEST['thembenhvien'])){
                                include("View/vThembenhvien.php");
                            }elseif(isset($_REQUEST['quanlycanboyte'])){
                                include("View/vQuanLyTTCanbo.php");
                            }elseif(isset($_REQUEST['updatecb'])){
                                include("View/vCapnhatCanbo.php");
                            }elseif(isset($_REQUEST['themcanboyte'])){
                                include("View/vThemcanbo.php");
                            }elseif(isset($_REQUEST['xuatthongke'])){
                                include("View/vXuatthongke.php");
                            }elseif(isset($_REQUEST['phanquyen'])){
                                include("View/vPhanquyenTK.php");
                            }elseif(isset($_REQUEST['updatequyen'])){
                                include("View/vChinhsuaquyen.php");
                            }
                            

                         ?>
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
        <?php        
        }
        else{
            echo header("refresh:0,url='../TrangChuQTHT.php'");
        }
        //
        
        ?>
</body>
</html>