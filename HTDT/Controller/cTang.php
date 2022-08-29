<?php

	include("Model/mTang.php");

	class cTang{
		function view_tang($sotang){
			$p = new mTang();
			$dstang = $p -> select_tang($sotang);
			return $dstang;
		}
	}


?>