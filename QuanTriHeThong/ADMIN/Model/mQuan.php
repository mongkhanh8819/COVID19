<?php

	include_once("ketnoi.php");

	class mQuan{
		// lấy danh sách quận hiển trị combobox
		function select_quan(){
			$conn;
			$p = new ketnoi();
			if($p -> moketnoi($conn,$_SESSION['matk'],$_SESSION['password'])){
				$string = "SELECT * FROM phuong JOIN quan ON phuong.MaQuan = quan.MaQuan";
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