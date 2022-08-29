<?php

	include("Model/mTang.php");

	class cTang{
		function view_tang(){
			$p = new mTang();
			$dstang = $p -> select_tang();
			return $dstang;
		}
	}


?>