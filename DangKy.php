
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
  <link rel="stylesheet" href="CSS/main.css">
	 <link rel="stylesheet" href="CSS/base.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="font/fontawesome/css/all.min.css">
	<script>
	//alert('Bạn cần đăng nhập để vào được website nếu không có tài khoản vui lòng đăng ký ở góc trên bên phải.');
	</script>
</head>
<body style="background-image: url("IMG/image 1.png")">
	<div align="center" style="margin-top: 20px;">
	<span style="font-family: Baskerville, 'Palatino Linotype', Palatino, 'Century Schoolbook L', 'Times New Roman', 'serif';font-size: 30px;font-weight: bold; color: #000000; text-shadow:2px 5px 2px #4cff00;">ĐĂNG KÝ TÀI KHOẢN BỆNH NHÂN</span>
	</div>
    <div class="container-login" >
		<form action="" method="POST">
        <div class="auth-form">
            <div class="auth-form__container">
                <div class="auth-form__header">
                    <h3 class="auth-form__heading">
                        Đăng Ký
                    </h3>
                    <span class="auth-form__switch-btn">
                        <a href="DangNhap.php" class="auth-form__switch-btn">
                            Đăng Nhập
                        </a>
                    </span>
                </div>
                <div class="auth-form__form">
                    <div class="auth-form__group">
                        <input type="number" class="auth-form__input" name="txtuser" required placeholder="Số điện thoại ">
                    </div>
                    <div class="auth-form__group">
                        <input type="password" class="auth-form__input" name="txtpass"  required placeholder="Mật khẩu của bạn">
                    </div>
                </div>
                <div class="auth-form__policy">
                    <div class="auth-form__help">
                        <a href="#" class="auth-form__help-link auth-form__help-forgot">Quên mật khẩu</a>
                        <span class="auth-form__help-separate"></span>
                        <a href="#" class="auth-form__help-link">Cần trợ giúp?</a>
                    </div>
                </div>
                <div class="auth-form__controls">
                    <button class="btn auth-form__controls-back">
                        <a href="Trangchu.php" class="btn auth-form__controls-back"  >
                            TRỞ LẠI
                        </a>
                    </button>
                <input type='submit' style="background-color:#1774D3;border-radius:5px;" name='dangky' value="Đăng ký"/>
                </div>
            </div>
            <div class="auth-form__socials">
             <div align="center" style="margin-left: 140px;font-family: Baskerville, 'Palatino Linotype', Palatino, 'Century Schoolbook L', 'Times New Roman', 'serif';font-size: 12px; color:red">
					
				  </div>
            </div>
<?php require 'Class/clsDangKy.php';?>
</form>
        </div>
    </div>
</body>
</html>
