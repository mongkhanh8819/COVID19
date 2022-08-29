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
	}


?>