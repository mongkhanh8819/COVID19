<?php
	session_start();
?>

<body class="dangnhap">
	<div class="khung">
		<br><br><br><br><br><br><br>
		<form action="#" method="post">
			<table style='text-align:center;margin: auto; width:500px;background-color:blue; color:aqua;'>
				<tr>
					<td colspan="2"><div class="head"><h2>ĐĂNG NHẬP</h2></div></td>
				</tr>
				<tr>
					<td>Username:</td>
					<td><input type="text" name="username" style="width: 300px;"></td>
				</tr>
				<tr>
					<td>Password:</td>
					<td><input type="password" name="password" style="width: 300px"></td>
				</tr>
				<tr>
					<td colspan="2"><input style="float: none;" type="submit" name="submit" value="Đăng nhập">
					<input type="hidden" name="dnthanhcong"></td>
				</tr>
				<!-- <tr>
					<td></td>
					<td style="text-align:right;"><a href="../">VỀ TRANG CHỦ</a></td>
				</tr> -->
				<tr>
					<td></td>
					<td style="text-align:right; color: white;"><a style="color: white;" href="../DangNhap.php">Về trang chủ</a></td>
				</tr>
			</table>
		</form>
	</div>
	<?php
	
		include_once("Controller/cDangnhap.php");
		$dn = new cDangnhap();
			
			if(isset($_REQUEST['submit'])){
			$username = $_REQUEST['username'];
			$password = $_REQUEST['password'];
			$ketqua = $dn -> select_Dangnhap($username,$password);
			if($ketqua){
				//echo $ketqua;
				if(mysql_num_rows($ketqua)>0){
					$_SESSION['dn'] = true;
					if($_SESSION['dn'] = true){
						$_SESSION['matk'] = $username;
						$_SESSION['password'] = $password;
					}
					echo header("refresh:0,url='index.php'");
				}else{
					$_SESSION['dn'] = false;
					//echo header("refresh:0,url='index.php?dangnhap'");
				}
			}
			else{
				$_SESSION['dn'] = false;
				//echo header("refresh:0,url='index.php?dangnhap'");
			}
			
		}
	// 	else{
	// 		echo header("refresh:0,url='index.php'");
	// 	}
	// echo header("refresh:0,url='index.php?dangnhap'");
	
	?>
</body>