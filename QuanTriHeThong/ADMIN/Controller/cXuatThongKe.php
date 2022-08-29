<?php

	include("Model/mXuatThongKe.php");

	class cXuatThongKe{
		function xuatthongke($maphuong,$mabv,$tenbv,$ngaybatdau,$ngayketthuc,$luachon){
			$p = new mXuatThongKe();
			$ds = $p -> xuat_thong_ke($maphuong,$mabv,$tenbv,$ngaybatdau,$ngayketthuc,$luachon);
			return $ds;
		}
	}


?>