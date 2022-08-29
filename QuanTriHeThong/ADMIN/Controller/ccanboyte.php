<?php

	include("Model/mCanboyte.php");

	class ccanboytephuong{
		function view_canboytephuong(){
			$p = new mcanboytephuong();
			$table = $p -> get_canboytephuong();
			return $table;
		}
		//lấy thông tin cán bộ y tế phường 
		function view_canboytephuong_by_id($macb){
			$p = new mcanboytephuong();
			$table = $p ->  get_canboytephuong_by_id($macb);
			return $table;
		}
		//
		//thêm Cán bộ y tế phường 
		function them_canboytephuong($macb,$tencb,$sdt,$diachi,$donvicongtac,$email){
			$p = new mcanboytephuong();
			$ketqua = $p -> insert_canboytephuong($macb,$tencb,$sdt,$diachi,$donvicongtac,$email);
			//var_dump($ketqua);
			if($ketqua){
				return true;
			}
			else{
				return false;
			}
		}
		//cập nhật cán bộ y tế phường 
		function capnhat_canboytephuong($macb,$tencb,$sdt,$diachi,$donvicongtac,$email){
			$p = new mcanboytephuong();
			$ketqua = $p -> update_canboytephuong($macb,$tencb,$sdt,$diachi,$donvicongtac,$email);
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