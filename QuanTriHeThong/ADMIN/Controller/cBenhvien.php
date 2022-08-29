<?php

	include("Model/mBenhvien.php");

	class cBenhvien{
		function view_benhvien_by_maphuong($maphuong){
			$p = new mBenhvien();
			$table = $p -> select_benhvien_by_maphuong($maphuong);
			return $table;
		}
		function view_benhvien(){
			$p = new mBenhvien();
			$table = $p -> select_benhvien();
			return $table;
		}
		function view_benhvien_by_mabv($mabv){
			$p = new mBenhvien();
			$table = $p -> select_benhvien_by_mabv($mabv);
			return $table;
		}
		//
		//
		//thêm bệnh viện
		function them_benhvien($mabv,$tenbv,$sdt,$email,$sogiuongtoida,$dieutri,$sotang,$maphuong){
			$p = new mBenhvien();
			$ketqua = $p -> insert_benhvien($mabv,$tenbv,$sdt,$email,$sogiuongtoida,$dieutri,$sotang,$maphuong);
			//var_dump($ketqua);
			if($ketqua){
				return true;
			}
			else{
				return false;
			}
		}
		//cập nhật bệnh viện
		function capnhat_benhvien($mabv,$tenbv,$sdt,$email,$sogiuongtoida,$dieutri,$sotang,$maphuong){
			$p = new mBenhvien();
			$ketqua = $p -> update_benhvien($mabv,$tenbv,$sdt,$email,$sogiuongtoida,$dieutri,$sotang,$maphuong);
			//var_dump($ketqua);
			if($ketqua){
				return true;
			}
			else{
				return false;
			}
		}
	}


?>