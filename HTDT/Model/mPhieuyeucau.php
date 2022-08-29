<?php

	include_once("ketnoi.php");

	class mPhieuyeucau{
		//HÀM THÊM MỚI PHIẾU YÊU CẦU
		function insert_phieuyeucau($MaBenhNhan,$MaBV){
			$conn;
			$p = new ketnoi();
			if($p -> moketnoi($conn,$_SESSION['matk'],$_SESSION['password'])){
				$string = "INSERT INTO phieuyeucaudieutri(MaBenhNhan, MaBV, NgayLap) values";
				$string .= " (".$MaBenhNhan.",N'".$MaBV."',NOW())";
				//echo $string;
				$table = mysql_query($string);
				$p -> dongketnoi($conn);
				var_dump($table);
				return $table;
			}else{
				return false;
			}
		}
	}


?>