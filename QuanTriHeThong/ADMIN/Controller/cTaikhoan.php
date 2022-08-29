<?php

	include("Model/mTaikhoan.php");

	class cTaikhoan{
		function view_taikhoan(){
			$p = new mTaikhoan();
			$ds = $p -> select_taikhoan();
			return $ds;
		}
		function view_taikhoan_by_id($matk){
			$p = new mTaikhoan();
			$ds = $p -> select_taikhoan_by_id($matk);
			return $ds;
		}
		function capnhat_quyen($matk,$phanquyen){
			$p = new mTaikhoan();
			$ds = $p -> update_quyen($matk,$phanquyen);
			return $ds;
		}
	}


?>