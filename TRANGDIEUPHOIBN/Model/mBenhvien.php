<?php

	include_once("ketnoi.php");

	class mBenhvien{
		function select_benhvien_by_sotang($sotang){
			$conn;
			$p = new ketnoi();
			if($p -> moketnoi($conn,$_SESSION['matk'],$_SESSION['password'])){
				$string = "SELECT * FROM benhvien WHERE SoTang = '".$sotang."'";
				//echo $string;
				$table = mysql_query($string);
				$p -> dongketnoi($conn);
				//var_dump($table);
				return $table;
			}else{
				return false;
			}
		}
		//LẤY SỐ GIƯỜNG TỐI ĐA 
		function select_sogiuongtoida($mabv){
			$conn;
			$p = new ketnoi();
			if($p -> moketnoi($conn,$_SESSION['matk'],$_SESSION['password'])){
				$string = "SELECT SoGiuongToiDa FROM benhvien WHERE MaBV = '".$mabv."'";
				//echo $string;
				$table = mysql_query($string);
				$p -> dongketnoi($conn);
				//var_dump($table);
				return $table;
			}else{
				return false;
			}
		}
		//LẤY SỐ LƯỢNG BỆNH HIỆN TẠI
		function select_soluongbenhnhan($mabv){
			$conn;
			$p = new ketnoi();
			if($p -> moketnoi($conn,$_SESSION['matk'],$_SESSION['password'])){
				$string = "SELECT SoLuongBenhNhan FROM benhvien WHERE MaBV = '".$mabv."'";
				//echo $string;
				$table = mysql_query($string);
				$p -> dongketnoi($conn);
				//var_dump($table);
				return $table;
			}else{
				return false;
			}
		}
		////HÀM CẬP NHẬT SỐ LƯỢNG BỆNH NHÂN giảm
		function capnhat_soluong_giam($tenbvcu){
			$conn;
			$p = new ketnoi();
			if($p -> moketnoi($conn,$_SESSION['matk'],$_SESSION['password'])){
				$string = "UPDATE benhvien SET ";
				$string .= " SoLuongBenhNhan = SoLuongBenhNhan - 1";
				$string .= " WHERE TenBV LIKE '".$tenbvcu."'";
				//echo $string;
				$table = mysql_query($string);
				$p -> dongketnoi($conn);
				//var_dump($table);
				return $table;
			}else{
				return false;
			}
		}
		////HÀM CẬP NHẬT SỐ LƯỢNG BỆNH NHÂN TĂNG
		function capnhat_soluong_tang($mabv){
			$conn;
			$p = new ketnoi();
			if($p -> moketnoi($conn,$_SESSION['matk'],$_SESSION['password'])){
				$string = "UPDATE benhvien SET ";
				$string .= " SoLuongBenhNhan = SoLuongBenhNhan + 1";
				$string .= " WHERE MaBV LIKE '".$mabv."'";
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