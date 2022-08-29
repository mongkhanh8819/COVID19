<?php

	include("Model/mQuan.php");

	class cQuan{
		function view_quan(){
			$p = new mQuan();
			$dsquan = $p -> select_quan();
			return $dsquan;
		}
	}


?>