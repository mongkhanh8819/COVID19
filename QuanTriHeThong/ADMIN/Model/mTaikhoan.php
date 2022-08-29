<?php

	include_once("ketnoi.php");

	class mTaikhoan{
		// lấy danh sách quận hiển trị combobox
		function select_taikhoan(){
			$conn;
			$p = new ketnoi();
			if($p -> moketnoi($conn,$_SESSION['matk'],$_SESSION['password'])){
				$string = "SELECT * FROM taikhoancv WHERE phanquyen IN (1,2)";
				//echo $string;
				$table = mysql_query($string);
				$p -> dongketnoi($conn);
				//var_dump($table);
				return $table;
			}else{
				return false;
			}
		}
		///
		function select_taikhoan_by_id($matk){
			$conn;
			$p = new ketnoi();
			if($p -> moketnoi($conn,$_SESSION['matk'],$_SESSION['password'])){
				$string = "SELECT * FROM taikhoancv WHERE MaTK = '".$matk."'";
				//echo $string;
				$table = mysql_query($string);
				$p -> dongketnoi($conn);
				//var_dump($table);
				return $table;
			}else{
				return false;
			}
		}
		///
		function update_quyen($matk,$phanquyen){
			$conn;
			$p = new ketnoi();
			if($p -> moketnoi($conn,$_SESSION['matk'],$_SESSION['password'])){
				$string = "UPDATE taikhoancv ";
				$string .= " SET phanquyen = ".$phanquyen." " ;
				$string .= " WHERE MaTK ='".$matk."'";
				//echo $string;
				$ketqua = mysql_query($string);
				//var_dump($ketqua);
				$p-> dongketnoi($conn);
				return $ketqua;
			}else{
				echo false;
			}
		}
	}


?>