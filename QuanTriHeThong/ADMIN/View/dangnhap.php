<?php
	session_start();
?>

<body class="dangnhap">
	<div class="khung">
		<br><br><br><br><br><br><br>
		<form action="#" method="post">
			<table style='text-align:center;margin: auto; width:500px;background-color:blue; color:aqua;'>
				<tr>
					<td colspan="2"><div class="head"><h2>ĐĂNG NHẬP ADMIN</h2></div></td>
				</tr>
				<tr>
					<td>Username:</td>
					<td><input type="text" name="username"></td>
				</tr>
				<tr>
					<td>Password:</td>
					<td><input type="password" name="password"></td>
				</tr>
				<tr>
					<td colspan="2"><input style="float: none;" type="submit" name="submit" value="Đăng nhập">
					<input type="hidden" name="dnthanhcong"></td>
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
			//echo mysql_num_rows($ketqua);
			if($ketqua){
				if(mysql_num_rows($ketqua)>0){
					//echo "1";
					$_SESSION['dnadmin'] = true;
					if($_SESSION['dnadmin'] = true){
						$_SESSION['tk'] = $username;
						$_SESSION['mk'] = $password;
					}
					//echo $_SESSION['tk'];
					echo header("refresh:0,url='index.php'");
				}else{
					$_SESSION['dnadmin'] = false;
					//echo "111";
					//echo header("refresh:0,url='index.php?dangnhap'");
				}
			}
			else{
				$_SESSION['dnadmin'] = false;
				//echo header("refresh:0,url='index.php?dangnhap'");
			}
			
		}
		//var_dump($_SESSION['dnadmin']);
		//var_dump($_SESSION['dnbn']);
	// 	else{
	// 		echo header("refresh:0,url='index.php'");
	// 	}
	// echo header("refresh:0,url='index.php?dangnhap'");
	
	?>
</body>