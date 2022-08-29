<?php

	include_once("ketnoi.php");

	class mDangnhap{
		function selectUser($tenDN,$pass,$mahoapass){
			$conn;
			$p = new ketnoi();
			if($p -> moketnoi($conn,$tenDN,$pass)){
			$string = "SELECT * FROM taikhoanbn WHERE SoDienThoai = '".$tenDN."' and password = '".$mahoapass."' ";
			//echo $string;
			$table = mysql_query($string);
			$p -> dongketnoi($conn);
				//var_dump($table);
				return $table;
			}else{
				return false;
			}
		}
	}


?>