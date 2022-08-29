<?php

	include_once("Model/mPhieudexuat.php");

	class cPhieudexuat{
		//lấy danh sách tất cả phiếu đề xuất
		function view_phieudexuat(){
			$p = new mPhieudexuat();
			$table = $p -> select_phieudexuat();
			return $table;
		}
		//lấy danh sách tất cả phiếu đề xuất để tiếp nhận
		function view_phieudexuat_tiepnhan(){
			$p = new mPhieudexuat();
			$table = $p -> select_phieudexuat_tiepnhan();
			return $table;
		}
		//lấy thông tin phiếu đề xuất theo mã phiếu truyền vào
		function view_phieudexuat_by_id($maphieudx){
			$p = new mPhieudexuat();
			$table = $p -> select_phieudexuat_by_id($maphieudx);
			return $table;
		}
		//thêm phiếu đề xuất
		function them_phieudexuat($tanght,$tangdx,$TenBVHT,$lydo,$maNVBV,$MaBenhNhan,$MaBVDX){
			$p = new mPhieudexuat();
			//var_dump($lydo);
			$insert = $p ->insert_phieudexuat($tanght,$tangdx,$TenBVHT,$lydo,$maNVBV,$MaBenhNhan,$MaBVDX);
			//var_dump($insert);
			if($insert){
				return 1;//chèn thành công
			}
			else{
				return 0; //không thể insert
			}

		}
		//cập nhật phiếu đề xuất
		function capnhat_phieudexuat($maphieu,$tangdx,$lydo,$MaBVDX){
			$p = new mPhieudexuat();
			//var_dump($lydo);
			$up = $p ->update_phieudexuat($maphieu,$tangdx,$lydo,$MaBVDX);
			//var_dump($insert);
			if($up){
				return 1;//cập nhật thành công
			}
			else{
				return 0; //không thể cập nhật
			}

		}
		//duyệt phiếu đề xuất
		function duyet_phieudexuat($maphieu,$trangthaiduyet){
			$p = new mPhieudexuat();
			//var_dump($lydo);
			$up = $p ->update_duyet_phieudexuat($maphieu,$trangthaiduyet);
			//var_dump($insert);
			if($up){
				return 1;//cập nhật thành công
			}
			else{
				return 0; //không thể cập nhật
			}

		}
		//xóa phiếu đề xuất
		function xoa_phieudx($phieudexuat){
			$p = new mPhieudexuat();
			$delete = $p ->delete_phieudx($phieudexuat);
			return $delete;
		}
	}


?>