<?php

	include("ketnoi.php");
	
	class mcanboytephuong{
		function get_canboytephuong(){
			$conn;
			$p = new ketnoi();
			if($p->moketnoi($conn)){
				$string = "SELECT * FROM canboytephuong";
				$table = mysql_query($string);
				$p->dongketnoi($conn);
				return $table;
			}else{
				return false;
			}
		}
		///hàm lấy cán bộ y tế phường by id
		function get_canboytephuong_by_id($macb){
			$conn;
			$p = new ketnoi();
			if($p->moketnoi($conn)){
				$string = "SELECT * FROM canboytephuong WHERE MaCBYTP ='".$macb."'";
				$table = mysql_query($string);
				$p->dongketnoi($conn);
				return $table;
			}else{
				return false;
			}
		}
		//
		///hàm insert cán bộ y tế phường
		function insert_canboytephuong($macb,$tencb,$sdt,$diachi,$donvicongtac,$email){
			$conn;
			$p = new ketnoi();
			if($p-> moketnoi($conn)){
				$string = "INSERT INTO canboytephuong(MaCBYTP,TenCBYTP, SoDienThoai, DiaChi, DonViCongTac, Email) VALUES ";
				$string .= "('".$macb."',N'".$tencb."','".$sdt."','".$diachi."',N'".$donvicongtac."','".$email."')";
				$kq = mysql_query($string);
				$p -> dongketnoi($conn);
				//echo $string;
				//var_dump($kq);
				return $kq;
			}else{
				return false;
			}
		}
		//hàm cập nhật thông tin cán bộ
		
		function update_canboytephuong($macb,$tencb,$sdt,$diachi,$donvicongtac,$email){
			$conn;
			$p = new ketnoi();
			if($p -> moketnoi($conn)){
				$string = "UPDATE canboytephuong ";
				$string .= " SET TenCBYTP = N'".$tencb."',SoDienThoai = '".$sdt."',DiaChi ='".$diachi."',DonViCongTac= N'".$donvicongtac."',Email = '".$email."'" ;
				$string .= " WHERE MaCBYTP ='".$macb."'";
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