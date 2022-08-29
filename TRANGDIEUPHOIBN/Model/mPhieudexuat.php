<?php

	include_once("ketnoi.php");

	class mPhieudexuat{
		//số 1 là chờ duyệt
		//số 2 là đã duyệt
		//số 3 là không được duyệt
		// lấy thông tin phiếu đề xuất chưa được duyệt và chờ duyệt
		function select_phieudexuat(){
			$conn;
			$p = new ketnoi();
			if($p -> moketnoi($conn,$_SESSION['matk'],$_SESSION['password'])){
				$string = "SELECT * FROM phieudexuatchuyenvien WHERE TrangThaiDuyet IN (1,2,3) AND TenBV LIKE N'".$_SESSION['TenBV']."'";
				//echo $string;
				$table = mysql_query($string);
				$p -> dongketnoi($conn);
				//var_dump($table);
				return $table;
			}else{
				return false;
			}
		}
		// lấy thông tin phiếu đề xuất để thực hiện tiếp nhận chờ duyệt theo mã bệnh viện hiện tại 
		function select_phieudexuat_tiepnhan(){
			$conn;
			$p = new ketnoi();
			if($p -> moketnoi($conn,$_SESSION['matk'],$_SESSION['password'])){
				$string = "SELECT * FROM phieudexuatchuyenvien WHERE TrangThaiDuyet IN (1) AND MaBV LIKE '".$_SESSION['mabv']."'";
				//echo $string;
				$table = mysql_query($string);
				$p -> dongketnoi($conn);
				//var_dump($table);
				return $table;
			}else{
				return false;
			}
		}
		// lấy thông tin phiếu đề xuất theo mã phiếu truyền vào
		function select_phieudexuat_by_id($maphieudx){
			$conn;
			$p = new ketnoi();
			if($p -> moketnoi($conn,$_SESSION['matk'],$_SESSION['password'])){
				$string = "SELECT * FROM phieudexuatchuyenvien JOIN benhvien ON phieudexuatchuyenvien.MaBV = benhvien.MaBV WHERE MaPhieuDeXuat = ".$maphieudx;
				//echo $string;
				$table = mysql_query($string);
				$p -> dongketnoi($conn);
				//var_dump($table);
				return $table;
			}else{
				return false;
			}
		}
		//HÀM THÊM MỚI PHIẾU ĐỀ XUẤT
		function insert_phieudexuat($tanght,$tangdx,$TenBVHT,$lydo,$maNVBV,$MaBenhNhan,$MaBVDX){
			$conn;
			$p = new ketnoi();
			if($p -> moketnoi($conn,$_SESSION['matk'],$_SESSION['password'])){
				$string = "INSERT INTO phieudexuatchuyenvien(ThoiGianLapPhieu, TangHienTai, TangDeXuat, TenBV, LyDo,TrangThaiDuyet, MaNVBV, MaBenhNhan, MaBV) values";
				$string .= " (NOW(),".$tanght.",".$tangdx.",N'".$TenBVHT."',N'".$lydo."',1,N'".$maNVBV."'";
				$string .= " ,".$MaBenhNhan.",N'".$MaBVDX."')";
				//echo $string;
				$table = mysql_query($string);
				$p -> dongketnoi($conn);
				//var_dump($table);
				return $table;
			}else{
				return false;
			}
		}
		//HÀM CẬP NHẬT PHIẾU ĐỀ XUẤT ??bổ sung update TrangThai Duyet = 1
		function update_phieudexuat($maphieu,$tangdx,$lydo,$MaBVDX){
			$conn;
			$p = new ketnoi();
			if($p -> moketnoi($conn,$_SESSION['matk'],$_SESSION['password'])){
				$string = "UPDATE phieudexuatchuyenvien SET ";
				$string .= " ThoiGianLapPhieu = NOW(), TangDeXuat = ".$tangdx.", LyDo = N'".$lydo."', MaBV = '".$MaBVDX."' ,TrangThaiDuyet = 1";
				$string .= " WHERE MaPhieuDeXuat = ".$maphieu;
				//echo $string;
				$table = mysql_query($string);
				$p -> dongketnoi($conn);
				//var_dump($table);
				return $table;
			}else{
				return false;
			}
		}
		////HÀM duyệt PHIẾU ĐỀ XUẤT
		function update_duyet_phieudexuat($maphieu,$trangthaiduyet){
			$conn;
			$p = new ketnoi();
			if($p -> moketnoi($conn,$_SESSION['matk'],$_SESSION['password'])){
				$string = "UPDATE phieudexuatchuyenvien SET ";
				$string .= " TrangThaiDuyet = ".$trangthaiduyet."";
				$string .= " WHERE MaPhieuDeXuat = ".$maphieu;
				//echo $string;
				$table = mysql_query($string);
				$p -> dongketnoi($conn);
				//var_dump($table);
				return $table;
			}else{
				return false;
			}
		}
		//xóa phiếu đề xuất
		function delete_phieudx($maphieudx){
			$conn;
			$p = new ketnoi();
			if($p -> moketnoi($conn,$_SESSION['matk'],$_SESSION['password'])){
				$string = "DELETE FROM phieudexuatchuyenvien WHERE MaPhieuDeXuat =".$maphieudx;
				$kq = mysql_query($string);
				$p -> dongketnoi($conn);
				return $kq;
			}else{
				return false;
			}
		}
	}


?>