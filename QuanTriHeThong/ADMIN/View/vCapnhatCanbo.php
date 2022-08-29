<body>
	<h3 style="text-align: center">CẬP NHẬT THÔNG TIN CÁN BỘ Y TẾ PHƯỜNG </h3>
<?php

	include("Controller/ccanboyte.php");
	$macanbo = $_REQUEST['macb'];
	//echo $compID;
	$p = new ccanboytephuong();
	$table = $p->view_canboytephuong_by_id($macanbo);
	//var_dump($row);

?>
	<form action="#" method="post" enctype="multipart/form-data">
		<table style="margin: auto; width: 60%;text-align: left">
			<?php
			
				if($table){
					if(mysql_num_rows($table)>0){
						while($row = mysql_fetch_assoc($table)){
							//mã bệnh nhân
							echo "<tr>";
							echo "<td>Mã Cán Bộ:</td>";
							echo "<td><input type='text' size='70' name='MaCBYTP' value='".$row['MaCBYTP']."' disabled></td>";
							echo "</tr>";
							//tên bệnh nhân
							echo "<tr>";
							echo "<td>Tên Cán Bộ :</td>";
							echo "<td><input type='text' size='70' name='TenCBYTP' value='".$row['TenCBYTP']."'></td>";
							echo "</tr>";
							//số điện thoại
							echo "<tr>";
							echo "<td>Số điện thoại:</td>";
							echo "<td><input type='text' size='70' name='SoDienThoai' value='".$row['SoDienThoai']."'></td>";
							echo "</tr>";
							//Địa chỉ
							echo "<tr>";
							echo "<td>Địa chỉ:</td>";
							echo "<td><input type='text' size='70' name='DiaChi' value='".$row['DiaChi']."'></td>";
							echo "</tr>";
							//Đơn vị công tác
							echo "<tr>";
							echo "<td>Đơn vị công tác:</td>";
							echo "<td><input type='text' size='70' name='DonViCongTac' value='".$row['DonViCongTac']."'></td>";
							echo "</tr>";
							//email
							echo "<tr>";
							echo "<td>Email:</td>";
							echo "<td><input type='email' size='70' name='Email' value='".$row['Email']."'></td>";
							echo "</tr>";
							//
							echo "<tr>";
							echo "<td></td>";
							echo "<td><input type='submit' name='update_canboytephuong' value='CẬP NHẬT'></td>";
							echo "</tr>";
							
						}
					}
				}
			
				if(isset($_REQUEST['update_canboytephuong'])){
					//$macb = $_REQUEST['MaCBYTP'];
					//var_dump($mabn);
					$tencb = $_REQUEST['TenCBYTP'];
					$sdt = $_REQUEST['SoDienThoai'];
					$diachi = $_REQUEST['DiaChi'];
					$donvicongtac = $_REQUEST['DonViCongTac'];
					$email = $_REQUEST['Email'];
					

					$ketqua = $p->capnhat_canboytephuong($macanbo,$tencb,$sdt,$diachi,$donvicongtac,$email);
					if($ketqua){
						echo "<script>alert('Chỉnh sửa thành công');</script>";
						echo header("refresh:0; url='index.php?quanlycanboyte'");
					}else{
						echo "<script>alert('Chỉnh sửa thất bại');</script>";
					}
				}
			
			?>
		</table>
	</form>
</body>