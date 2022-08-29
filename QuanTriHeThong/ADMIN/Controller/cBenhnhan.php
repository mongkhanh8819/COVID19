<?php

	include("Model/mBenhnhan.php");

	class cBenhnhan{
		function view_benhnhan(){
			$p = new mBenhnhan();
			$table = $p -> get_benhnhan();
			return $table;
		}
		//lấy thông tin bệnh nhân
		function view_benhnhan_by_id($mabn){
			$p = new mBenhnhan();
			$table = $p ->  get_benhnhan_by_id($mabn);
			return $table;
		}
		//
		//thêm bệnh nhân
		function them_benhnhan($tenbn,$email,$sdt,$quequan,$ngaysinh,$diachi,$gioitinh,$cmnd){
			$p = new mBenhnhan();
			$ketqua = $p -> insert_benhnhan($tenbn,$email,$sdt,$quequan,$ngaysinh,$diachi,$gioitinh,$cmnd);
			//var_dump($ketqua);
			if($ketqua){
				return true;
			}
			else{
				return false;
			}
		}
		//cập nhật bệnh nhân
		function capnhat_benhnhan($mabn,$tenbn,$email,$sodienthoai,$quequan,$ngaysinh,$diachi,$gioitinh,$cmnd){
			$p = new mBenhnhan();
			$ketqua = $p -> update_benhnhan($mabn,$tenbn,$email,$sodienthoai,$quequan,$ngaysinh,$diachi,$gioitinh,$cmnd);
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