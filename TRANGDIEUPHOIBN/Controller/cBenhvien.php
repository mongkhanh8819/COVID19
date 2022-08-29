<?php

	include("Model/mBenhvien.php");

	class cBenhvien{
		function view_benhvien_by_sotang($sotang){
			$p = new mBenhvien();
			$table = $p -> select_benhvien_by_sotang($sotang);
			return $table;
		}
		function view_sogiuongtoida($mabv){
			$p = new mBenhvien();
			$soluong = $p -> select_sogiuongtoida($mabv);
			return $soluong;
		}
		function view_soluongbenhnhan($mabv){
			$p = new mBenhvien();
			$soluong = $p -> select_soluongbenhnhan($mabv);
			return $soluong;
		}
		function control_capnhat_soluong_giam($tenbvcu){
			$p = new mBenhvien();
			$ketqua = $p -> capnhat_soluong_giam($tenbvcu);
			return $ketqua;
		}
		function control_capnhat_soluong_tang($mabv){
			$p = new mBenhvien();
			$ketqua = $p -> capnhat_soluong_tang($mabv);
			return $ketqua;
		}
	}


?>