<?php

	include_once("ketnoi.php");

	class mNhanvienbenhvien{
		function select_nvbv(){
			$conn;
			$p = new ketnoi();
			if($p -> moketnoi($conn,$_SESSION['matk'],$_SESSION['password'])){
				$string = "SELECT * FROM nhanvienbenhvien JOIN benhvien ON nhanvienbenhvien.MaBV = benhvien.MaBV WHERE MaTK = '".$_SESSION['matk']."' ";
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