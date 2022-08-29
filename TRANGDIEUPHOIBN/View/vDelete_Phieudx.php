<?php

	include("Controller/cPhieudexuat.php");
	if(isset($_REQUEST['maphieudx'])){
		$maphieudx = $_REQUEST['maphieudx'];
		$delete = new cPhieudexuat();
		$kq = $delete -> xoa_phieudx($maphieudx);
		//
		if($kq){
			echo "<script>alert('Xóa thành công');</script>";
			echo "<script>window.location.href = 'index.php?dexuat';</script>";
		}else{
			echo "<script>alert('Xóa thất bại');</script>";
			echo "<script>window.location.href = 'index.php?dexuat';</script>";
		}	
	}else{
		echo "<script>window.location.href = 'index.php?dexuat';</script>";
	}
	



?>