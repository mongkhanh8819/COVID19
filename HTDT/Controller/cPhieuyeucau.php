<?php

	include("Model/mPhieuyeucau.php");

	class cPhieuyeucau{
		//thêm phiếu yêu cầu
		function them_phieuyeucau($MaBenhNhan,$MaBV){
			$p = new mPhieuyeucau();
			//var_dump($lydo);
			$insert = $p ->insert_phieuyeucau($MaBenhNhan,$MaBV);
			//var_dump($insert);
			if($insert){
				return 1;//chèn thành công
			}
			else{
				return 0; //không thể insert
			}

		}
	}


?>