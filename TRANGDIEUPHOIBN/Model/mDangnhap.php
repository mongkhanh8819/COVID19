<?php

	include_once("ketnoi.php");

	class mDangnhap{
		function selectUser($tenDN,$pass,$mahoapass){
			$conn;
			$p = new ketnoi();
			if($p -> moketnoi($conn,$tenDN,$pass)){
				$string = "SELECT * FROM taikhoancv WHERE MaTK = '".$tenDN."' and password = '".$mahoapass."' ";
				$string .= " and phanquyen = 1";
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