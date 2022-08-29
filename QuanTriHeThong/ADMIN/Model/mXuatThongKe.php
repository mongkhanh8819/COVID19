<?php

	include_once("ketnoi.php");

	class mXuatThongke{
		// lấy danh sách quận hiển trị combobox
		function xuat_thong_ke($maphuong,$mabv,$tenbv,$ngaybatdau,$ngayketthuc,$luachon){
			$conn;
			$p = new ketnoi();
			if($p -> moketnoi($conn,$_SESSION['matk'],$_SESSION['password'])){
				if($luachon == 1) {
					$string = "SELECT SoLuongBenhNhan FROM benhvien WHERE MaBV = '".$mabv."'";
				}elseif($luachon == 2){
					$string = "SELECT count(*) FROM benhnhan WHERE MaBV = '".$mabv."' AND TrangThai = 0";
				}elseif($luachon == 3){
					$string = "SELECT count(*) FROM benhnhan WHERE MaBV = '".$mabv."' AND TrangThai = 2";
				}elseif($luachon == 4){
					$string = "SELECT count(*) FROM benhnhan WHERE MaBV = '".$mabv."' AND TrangThai = 3";
				}elseif($luachon == 5){
					$string = "SELECT * FROM phieudexuatchuyenvien WHERE TenBV = N'".$tenbv."' AND ThoiGianLapPhieu BETWEEN '".$ngaybatdau."' AND '".$ngayketthuc."'";
				}

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