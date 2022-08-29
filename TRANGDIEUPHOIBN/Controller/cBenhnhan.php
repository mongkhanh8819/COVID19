<?php

	include("Model/mBenhnhan.php");

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
		function view_tanghientai_bybenhnhan($mabn){
			$p = new mBenhnhan();
			$sotang = $p -> select_tanghientai_bybenhnhan($mabn);
			return $sotang;
		}
	}


?>