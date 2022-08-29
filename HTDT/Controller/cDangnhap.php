<?php

	include_once("Model/mDangnhap.php");

	class cDangnhap{
		function select_Dangnhap($tenDN,$pass){
			//xử lý tên đăng nhập: dùng hàm str_replace để xóa bỏ các kí tự ' và -- tránh sqlInjection
			$tenDN = str_replace("'","",$tenDN);
			$user = str_replace("--","",$tenDN); //ham trim() dùng để xóa khoảng trắng đầu và cuối chữ--không dùng
			// // //mã hóa chuỗi nhập vào bằng md5 và so sánh với dữ liệu bàn mờ trong table user
			$mahoapass = md5($pass);
			$p = new mDangnhap();
			$table  = $p -> selectUser($tenDN,$pass,$mahoapass);
			//var_dump($table);
			return $table;
		}
	}



?>