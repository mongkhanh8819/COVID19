<?php

	include("Controller/cNhanvienbenhvien.php");

	$p = new cNhanvienbenhvien();
	$table = $p-> view_nvbv();

	if($table){
		if(mysql_num_rows($table)>0){
			echo "<div style='width:300px;text-align:center'>";
			while($row = mysql_fetch_assoc($table)){
				echo "<b><a href='index.php?MaNVBV=".$row['MaNVBV']."'>".$row['TenNVBV']."</a></b><br>";
				$_SESSION['TenBV'] = $row['TenBV'];
				$_SESSION['mabv'] = $row['MaBV'];
				$_SESSION['MaNVBV'] = $row['MaNVBV'];
				echo $_SESSION['mabv'];
			}
			echo "</div>";
		}
	}



?>