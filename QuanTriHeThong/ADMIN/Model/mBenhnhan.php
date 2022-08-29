<?php

	include("ketnoi.php");
	
	class mBenhnhan{
		function get_benhnhan(){
			$conn;
			$p = new ketnoi();
			if($p->moketnoi($conn)){
				$string = "SELECT * FROM benhnhan";
				$table = mysql_query($string);
				$p->dongketnoi($conn);
				return $table;
			}else{
				return false;
			}
		}
		///hàm lấy khách hàng by id
		function get_benhnhan_by_id($mabn){
			$conn;
			$p = new ketnoi();
			if($p->moketnoi($conn)){
				$string = "SELECT * FROM benhnhan WHERE MaBenhNhan ='".$mabn."'";
				$table = mysql_query($string);
				$p->dongketnoi($conn);
				return $table;
			}else{
				return false;
			}
		}
		//
		///hàm insert benh nhan
		function insert_benhnhan($tenbn,$email,$sdt,$quequan,$ngaysinh,$diachi,$gioitinh,$cmnd){
			$conn;
			$p = new ketnoi();
			if($p-> moketnoi($conn)){
				$string = "INSERT INTO benhnhan(TenBenhNhan, Email, SoDienThoai, QueQuan, NgaySinh,DiaChi,GioiTinh,CMND) VALUES ";
				$string .= "(N'".$tenbn."','".$email."','".$sdt."',N'".$quequan."','".$ngaysinh."',N'".$diachi."',".$gioitinh.",'".$cmnd."')";
				$kq = mysql_query($string);
				$p -> dongketnoi($conn);
				echo $string;
				//var_dump($kq);
				return $kq;
			}else{
				return false;
			}
		}
		//hàm cập nhật thông tin bệnh nhân
		//1 là nam, 0 là nữ
		function update_benhnhan($mabn,$tenbn,$email,$sodienthoai,$quequan,$ngaysinh,$diachi,$gioitinh,$cmnd){
			$conn;
			$p = new ketnoi();
			if($p -> moketnoi($conn)){
				$string = "UPDATE benhnhan ";
				$string .= " SET TenBenhNhan = N'".$tenbn."',Email = '".$email."',SoDienThoai ='".$sodienthoai."',QueQuan= N'".$quequan."',NgaySinh = '".$ngaysinh."',DiaChi = N'".$diachi."',GioiTinh = ".$gioitinh.",CMND = '".$cmnd."'" ;
				$string .= " WHERE MaBenhNhan =".$mabn."";
				echo $string;
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