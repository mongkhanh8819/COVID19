<?php
include('../Class/ClsDangNhapQTHT.php');
	$p=new login();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
  <link rel="stylesheet" href="../CSS/main.css">
	 <link rel="stylesheet" href="../CSS/base.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../font/fontawesome/css/all.min.css">
	<script>
	//alert('Bạn cần đăng nhập để vào được website nếu không có tài khoản vui lòng đăng ký ở góc trên bên phải.');
	</script>
</head>
<body>
	<div align="center">
	<span style="font-family: Baskerville, 'Palatino Linotype', Palatino, 'Century Schoolbook L', 'Times New Roman', 'serif';font-size: 30px;font-weight: bold; color: #000000; text-shadow:2px 5px 2px #4cff00;">ĐĂNG NHẬP TÀI KHOẢN NGƯỜI QUẢN TRỊ</span>
	</div>
    <div class="container-login" >
		<form action="" method="POST">
        <div class="auth-form">
            <div class="auth-form__container">
                <div class="auth-form__header">
                    <h3 class="auth-form__heading">
                        Đăng Nhập
                    </h3>
                    <span class="auth-form__switch-btn">
                        <a href="Dangky.php" class="auth-form__switch-btn">
                            Đăng Ký
                        </a>
                    </span>
                </div>
                <div class="auth-form__form">
                    <div class="auth-form__group">
                        <input type="text" class="auth-form__input" name="txtuser" placeholder="Mã tài khoản ">
                    </div>
                    <div class="auth-form__group">
                        <input type="password" class="auth-form__input" name="txtpass" placeholder="Mật khẩu của bạn">
                    </div>
                </div>
                <div class="auth-form__policy">
                   <div class="auth-form__help">
                        <a href="../DangNhap.php" class="auth-form__help-link auth-form__help-forgot">Tài khoản bệnh nhân</a>
                        <span class="auth-form__help-separate"></span>
                        <a href="../YTePhuong/DangNhapCBYTP.php" class="auth-form__help-link">Cán bộ y tế phường</a>
                    </div>
                </div>
                <div class="auth-form__controls">
                    <button class="btn auth-form__controls-back">
                        <a href="Trangchu.php" class="btn auth-form__controls-back"  >
                            TRỞ LẠI
                        </a>
                    </button>
                <input type='submit' style="background-color:#1774D3;border-radius:5px;" name='dangnhap' value="Đăng nhập"/>
                </div>
            </div>
            <div class="auth-form__socials">
             <div align="center" style="margin-left: 140px;font-family: Baskerville, 'Palatino Linotype', Palatino, 'Century Schoolbook L', 'Times New Roman', 'serif';font-size: 12px; color:red">
					<?php
					 switch ($_POST['dangnhap'])
					 {
						 case 'Đăng nhập':
						 {
							 $user=$_REQUEST['txtuser'];
							 $pass=$_REQUEST['txtpass'];
							 if($user!='' && $pass!='')
							 {
								 if($p->mylogin($user,$pass)==1)
								 {
                                    $_SESSION['dnadmin'] = true;
									header("location:TrangChuQTHT.php"); 
									echo 'Đăng nhập thành công!!!';	
								 }
								 else
								 {
									echo 'Đăng nhập không thành công!!!';	 
								 }
							 }
							 else
							 {
								echo 'Vui lòng nhập đầy đủ thông tin!!!'; 
							 }
							break;	 
						 }

					 }
					?>
				  </div>
            </div>
            <div><a href="../TRANGDIEUPHOIBN" style="text-decoration:none;"><h3>TRANG ĐIỀU PHỐI BỆNH NHÂN</h3></a></div>

</form>
        </div>
    </div>
</body>
</html>
