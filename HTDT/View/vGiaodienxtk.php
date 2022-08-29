	<div style="width:95%; margin: auto;">
<?php

	include("Controller/cBenhnhan.php");
	include_once("Controller/cPhieudexuat.php");
	$mabv = $_SESSION['mabv'];
	$p = new cBenhnhan();
	$table = $p-> view_benhnhan($mabv);
	$a = new cPhieudexuat();
	$phieudexuat = $a -> view_phieudexuat();
	$dem = 0;
	echo "<h2 STYLE='text-align:left'>DANH SÁCH BỆNH NHÂN </h2>";
	echo "<table style='width:50%;   background-color: rgb(230,230,230);'>";
	echo "<tr style='background-color:#07DE44'>";
	echo "<th>Mã bệnh nhân</th>";
	echo "<th>Tên bệnh nhân</th>";
	echo "<th>Giới tính</th>";
	echo "<th>Địa chỉ</th>";
	echo "<th>Số điện thoại</th>";
	echo "<th>Trạng thái</th>";
	echo "</tr>";
	if($table){
		if(mysql_num_rows($table)){
			while($row = mysql_fetch_assoc($table)){
				$dem++;
				if($dem%2==0){
					echo "<tr style='background-color:#07DE44'>";
				}else{
					echo "<tr>";
				}
				echo "<td style='text-align:center'>".$row['MaBenhNhan']."</td>";
				echo "<td style='text-align:center'>".$row['TenBenhNhan']."</td>";
				if($row['GioiTinh']==0){
					echo "<td style='text-align:center'>Nữ</td>";
				}else{
					echo "<td style='text-align:center'>Nam</td>";
				}
				echo "<td style='text-align:center'>".$row['DiaChi']."</td>";
				echo "<td style='text-align:center'>".$row['SoDienThoai']."</td>";
				if($row['TrangThai'] == 1){
					echo "<td style='text-align:center'>Đang điều trị</td>";
				}elseif($row['TrangThai'] == 2){
					echo "<td style='text-align:center'>Chờ chuyển viện</td>";
				}else{
					echo "<td style='text-align:center'>Đã khỏi bệnh</td>";
				}

			}
		}
	}
	echo "</table><br><br><br>";


	echo "</table>";

?>
</div>