<?php
 class login
 {
	 private function connect()
	 { 
		$con= mysql_connect("localhost","covid","123456");
		if(!$con)
		{
			echo 'không kết nối được CSDL';
			exit(); 	
		}
		else
		{
			mysql_select_db("htdieuphoibncovid");
			mysql_query("SET NAMES UTF8");
			return $con;
		}
	 }
	 public function mylogin($user,$pass)
	 {
		$pass=md5($pass);	
		$link=$this->connect();
		$sql="select MaNQT,password from taikhoannqt where MaNQT='$user' and password='$pass' limit 1"; 
		$ketqua=mysql_query($sql,$link);
		$i=mysql_num_rows($ketqua);
		if($i==1)
		{
			while($row=mysql_fetch_array($ketqua))
			{
				$username=$row['MaNQT'];	
				$password=$row['password'];
				session_start();
				$_SESSION['user']=$username;
				$_SESSION['pass']=$password;
			}
			return 1;
		}
		else
		{
			return 0;
		}
		
	 }
	 function confirmlogin($user,$pass)
	 {
		$link=$this->connect();	 
		$sql="select MaNQT,password from taikhoannqt where MaNQT='$user' and password='$pass' limit 1"; 
		$ketqua=mysql_query($sql,$link);
		$i=mysql_num_rows($ketqua);
		if($i!=1)
		{
			header("location:../QuanTriHeThong/DangNhapQTHT.php");
		}
	 }
	 
 }
?>