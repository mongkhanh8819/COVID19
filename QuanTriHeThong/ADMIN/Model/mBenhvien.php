<?php

	include_once("ketnoi.php");

	class mBenhvien{
		function select_benhvien(){
			$conn;
			$p = new ketnoi();
			if($p -> moketnoi($conn,$_SESSION['matk'],$_SESSION['password'])){
				$string = "SELECT * FROM benhvien";
				//echo $string;
				$table = mysql_query($string);
				$p -> dongketnoi($conn);
				//var_dump($table);
				return $table;
			}else{
				return false;
			}
		}
		//
		function select_benhvien_by_maphuong($maphuong){
			$conn;
			$p = new ketnoi();
			if($p -> moketnoi($conn,$_SESSION['matk'],$_SESSION['password'])){
				$string = "SELECT * FROM benhvien WHERE maPhuong = '".$maphuong."'";
				//echo $string;
				$table = mysql_query($string);
				$p -> dongketnoi($conn);
				//var_dump($table);
				return $table;
			}else{
				return false;
			}
		}
		//
		function select_benhvien_by_mabv($mabv){
			$conn;
			$p = new ketnoi();
			if($p -> moketnoi($conn,$_SESSION['matk'],$_SESSION['password'])){
				$string = "SELECT * FROM benhvien WHERE MaBV = '".$mabv."'";
				//echo $string;
				$table = mysql_query($string);
				$p -> dongketnoi($conn);
				//var_dump($table);
				return $table;
			}else{
				return false;
			}
		}
		////
		///hàm insert benh vien
		function insert_benhvien($mabv,$tenbv,$sdt,$email,$sogiuongtoida,$dieutri,$sotang,$maphuong){
			$conn;
			$p = new ketnoi();
			if($p-> moketnoi($conn)){
				$string = "INSERT INTO benhvien(MaBV,TenBV,SoDienThoai,Email,SoLuongBenhNhan,SoGiuongToiDa,DieuTri,SoTang,maPhuong) VALUES ";
				$string .= "(N'".$mabv."',N'".$tenbv."','".$sdt."','".$email."',0,".$sogiuongtoida.",N'".$dieutri."',".$sotang.",'".$maphuong."')";
				$kq = mysql_query($string);
				$p -> dongketnoi($conn);
				//echo $string;
				//var_dump($kq);
				return $kq;
			}else{
				return false;
			}
		}
		//hàm cập nhật thông tin bệnh viện
		function update_benhvien($mabv,$tenbv,$sdt,$email,$sogiuongtoida,$dieutri,$sotang,$maphuong){
			$conn;
			$p = new ketnoi();
			if($p -> moketnoi($conn)){
				$string = "UPDATE benhvien ";
				$string .= " SET TenBV = N'".$tenbv."',Email = '".$email."',SoDienThoai ='".$sdt."',SoGiuongToiDa = ".$sogiuongtoida.",DieuTri = N'".$dieutri."',SoTang = ".$sotang.",maPhuong = '".$maphuong."'" ;
				$string .= " WHERE MaBV = '".$mabv."'";
				//echo $string;
				$ketqua = mysql_query($string);
				//var_dump($ketqua);
				$p-> dongketnoi($conn);
				return $ketqua;
			}else{
				echo false;
			}
		}
	}


?>