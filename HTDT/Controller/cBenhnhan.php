<?php

	include_once("Model/mBenhnhan.php");

	class cBenhnhan{
		function view_benhnhan($mabv){
			$p = new mBenhnhan();
			$table = $p -> select_benhnhan($mabv);
			return $table;
		}
		function view_benhnhan_by_mabn($mabn){
			$p = new mBenhnhan();
			$table = $p -> select_benhnhan_by_mabn($mabn);
			return $table;
		}
		function view_benhnhan_hinhthucdieutri($mabn){
			$p = new mBenhnhan();
			$table = $p -> select_benhnhan_hinhthucdieutri($mabn);
			return $table;
		}
		function view_tanghientai_bybenhnhan($mabn){
			$p = new mBenhnhan();
			$sotang = $p -> select_tanghientai_bybenhnhan($mabn);
			return $sotang;
		}
		function control_hienthi_benhnhan(){
			$p = new mBenhnhan();
			$table = $p -> hien_thi_benh_nhan();
			return $table;
		}
		function capnhat_HTDT_TaiNha($MaBenhNhan){
			$p = new mBenhnhan();
			$table = $p -> update_HTDT_TaiNha($MaBenhNhan);
			if($table){
				return 1;//cập nhật thành công
			}
			else{
				return 0; //không thể cập nhật
			}
		}
	}


?>