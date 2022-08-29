<?php

	include_once("ketnoi.php");

	class mBenhnhan{
		// lấy thông tin bệnh nhân theo mã bệnh viện của người nhân viên đăng nhập
		function select_benhnhan($mabv){
			$conn;
			$p = new ketnoi();
			if($p -> moketnoi($conn,$_SESSION['matk'],$_SESSION['password'])){
				$string = "SELECT * FROM benhnhan WHERE MaBV = '".$mabv."' AND TrangThai = 1";
				//echo $string;
				$table = mysql_query($string);
				$p -> dongketnoi($conn);
				//var_dump($table);
				return $table;
			}else{
				return false;
			}
		}
		//lấy thông tin bệnh nhân muốn đề xuất chuyển đi hiện ra màn hình
		function select_benhnhan_by_mabn($mabn){
			$conn;
			$p = new ketnoi();
			if($p -> moketnoi($conn,$_SESSION['matk'],$_SESSION['password'])){
				$string = "SELECT * FROM benhnhan JOIN benhvien ON benhnhan.MaBV = benhvien.MaBV WHERE MaBenhNhan = '".$mabn."'";
				//echo $string;
				$table = mysql_query($string);
				$p -> dongketnoi($conn);
				//var_dump($table);
				return $table;
			}else{
				return false;
			}
		}
		//lấy thông tin bệnh nhân hiện đang thuộc tầng điều trị nào
		function select_tanghientai_bybenhnhan($mabn){
			$conn;
			$p = new ketnoi();
			if($p -> moketnoi($conn,$_SESSION['matk'],$_SESSION['password'])){
				$string = "SELECT SoTang FROM benhnhan JOIN benhvien ON benhnhan.MaBV = benhvien.MaBV ";
				$string.= "WHERE MaBenhNhan = '".$mabn."'";
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