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
	echo "<h2 STYLE='text-align:center'>DANH SÁCH BỆNH NHÂN CÓ THỂ CHUYỂN</h2>";
	echo "<table style='width:100%;   background-color: rgb(230,230,230);'>";
	echo "<tr style='background-color:#07DE44'>";
	echo "<th>Mã bệnh nhân</th>";
	echo "<th>Tên bệnh nhân</th>";
	echo "<th>Giới tính</th>";
	echo "<th>Địa chỉ</th>";
	echo "<th>Số điện thoại</th>";
	echo "<th>Trạng thái</th>";
	echo "<th>Action</th>";
	echo "</tr>";
	if($table){
		if(mysql_num_rows($table)){
			while($row = mysql_fetch_assoc($table)){
				$dem++;
				if($dem%2==0){
					echo "<tr>";//style='background-color:#07DE44'
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
				echo "<td style='text-align:center'><a style='font-size:15px' href='index.php?insertdxchuyen&&mabn=".$row['MaBenhNhan']."'>Chuyển đi</a>";
				echo "</tr>";
			}
		}
	}
	echo "</table><br><br><br>";

	echo "<h2 STYLE='text-align:center'>DANH SÁCH PHIẾU ĐỀ XUẤT</h2>";
	echo "<table style='width:100%; background-color: rgb(230,230,230); ' >";
	echo "<tr style='background-color:#07DE44'>";
	echo "<th>Mã phiếu đề xuất</th>";
	echo "<th>Thời gian lập</th>";
	echo "<th>Mã bệnh nhân</th>";
	echo "<th>Tầng hiện tại</th>";
	echo "<th>Bệnh viện hiện tại</th>";
	echo "<th>Tầng đề xuất</th>";
	echo "<th>Bệnh viện mới</th>";
	echo "<th>Trạng thái duyệt</th>";
	echo "<th>Action</th>";
	echo "</tr>";
	if($phieudexuat){
		if(mysql_num_rows($phieudexuat)){
			while($row = mysql_fetch_assoc($phieudexuat)){
				$dem++;
				if($dem%2==0){
					echo "<tr>";
				}else{
					echo "<tr style='background-color:none'>";
				}
				echo "<td style='text-align:center'>".$row['MaPhieuDeXuat']."</td>";
				echo "<td style='text-align:center'>".$row['ThoiGianLapPhieu']."</td>";
				echo "<td style='text-align:center'>".$row['MaBenhNhan']."</td>";
				echo "<td style='text-align:center'>".$row['TangHienTai']."</td>";
				echo "<td style='text-align:center'>".$row['TenBV']."</td>";
				echo "<td style='text-align:center'>".$row['TangDeXuat']."</td>";
				echo "<td style='text-align:center'>".$row['MaBV']."</td>";
				if($row['TrangThaiDuyet']==1){
                        echo "<td style='text-align:center'>Chờ duyệt</td>";
               	}elseif($row['TrangThaiDuyet'] == 2){
                        echo "<td style='text-align:center'>Đã duyệt</td>";
                }else{
                        echo "<td style='text-align:center'>Không được duyệt</td>";
                }
				echo "<td style='text-align:center'><a style='font-size:15px' href='index.php?updatedxchuyen&&mabn=".$row['MaBenhNhan']."&&maphieu=".$row['MaPhieuDeXuat']."'>Cập nhật đề xuất</a> | <a style='font-size:15px' href='index.php?xoadxchuyen&&maphieudx=".$row['MaPhieuDeXuat']."		'onClick='return confirm_delete()''>Xóa đề xuất</a> </td>";
				echo "</tr>";
			}
		}
	}
	echo "</table>";

?>
</div>