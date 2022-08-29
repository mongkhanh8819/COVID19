<?php

	include_once("ketnoi.php");

	class mTang{
		// lấy danh sách tầng hiển trị combobox
		function select_tang($sotang){
			$conn;
			$p = new ketnoi();
			if($p -> moketnoi($conn,$_SESSION['matk'],$_SESSION['password'])){
				$string = "SELECT * FROM tang WHERE SoTang > ".$sotang."";
				//echo $string;
				$table = mysql_query($string);
				$p -> dongketnoi($conn);
				//var_dump($table);
				return $table;
			}else{
				return false;
			}
		}
	}


?>