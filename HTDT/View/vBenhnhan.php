<?php

	include_once("Controller/cBenhnhan.php");

	$p = new cBenhnhan();
	$table = $p -> control_hienthi_benhnhan();

	if($table){
		if(mysql_num_rows($table)>0){
			echo "<div style='width:300px;text-align:center'>";
			while($row = mysql_fetch_assoc($table)){
				echo "<b><a href='index.php?MaBenhNhan=".$row['MaBenhNhan']."'>".$row['TenBenhNhan']."</a></b><br>";
				
				$_SESSION['MaBenhNhan'] = $row['MaBenhNhan'];
				
			}
			echo "</div>";
		}
	}



?>