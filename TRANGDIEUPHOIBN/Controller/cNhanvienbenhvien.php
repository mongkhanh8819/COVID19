<?php

	include("Model/mNhanvienbenhvien.php");

	class cNhanvienbenhvien{
		function view_nvbv(){
			$p = new mNhanvienbenhvien();
			$table = $p -> select_nvbv();
			return $table;
		}
	}





?>