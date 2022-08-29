
<body>
	<h3 style="text-align: center">CẬP NHẬT THÔNG TIN BỆNH VIỆN</h3>
<?php

	include("Controller/cBenhvien.php");
	include_once("Controller/cTang.php");
	include_once("Controller/cQuan.php");
	$mabenhvien = $_REQUEST['mabv'];
	//echo $compID;
	$p = new cBenhvien();
	$tt = new cTang();
	$qq = new cQuan();
	$table = $p-> view_benhvien_by_mabv($mabenhvien);

	//var_dump($row);

?>
	<form action="#" method="post" enctype="multipart/form-data">
		<table style="margin: auto; width: 60%;text-align: left">
			<?php
			
				if($table){
					if(mysql_num_rows($table)>0){
						while($row = mysql_fetch_assoc($table)){
							//mã bệnh viện
							echo "<tr>";
							echo "<td>Mã bệnh viện:</td>";
							echo "<td><input type='text' size='70' name='MaBV' value='".$row['MaBV']."'></td>";
							echo "</tr>";
							//tên bệnh nhân
							echo "<tr>";
							echo "<td>Tên bệnh viện:</td>";
							echo "<td><input type='text' size='70' name='TenBV' value='".$row['TenBV']."'></td>";
							echo "</tr>";
						
							//email
							echo "<tr>";
							echo "<td>Email:</td>";
							echo "<td><input type='email' size='70' name='Email' value='".$row['Email']."'></td>";
							echo "</tr>";
							//số điện thoại
							echo "<tr>";
							echo "<td>Số điện thoại:</td>";
							echo "<td><input type='text' size='70' name='SDT' value='".$row['SoDienThoai']."'></td>";
							echo "</tr>";
							//
							echo "<tr>";
							echo "<td>Số lượng bệnh nhân hiện tại:</td>";
							echo "<td><input type='text' size='70' name='soluongbn' value='".$row['SoLuongBenhNhan']."' disabled></td>";
							echo "</tr>";
							//ngaysinh 
							echo "<tr>";
							echo "<td>Số lượng bệnh nhân tối đa:</td>";
							echo "<td><input type='text' size='70' name='soluongtoida' value='".$row['SoGiuongToiDa']."'></td>";
							echo "</tr>";
							//Địa chỉ
							echo "<tr>";
							echo "<td>Chức năng điều trị:</td>";
							echo "<td><input type='text' size='70' name='dieutri' value='".$row['DieuTri']."'></td>";
							echo "</tr>";
							//tầng hiện tại
							
							echo "<tr>";
							echo "<td>Tầng hiện tại</td>";
							echo "<td><select name='SoTang";
							echo "'>";	
							$tablee = $tt -> view_tang();
							while($cot = mysql_fetch_assoc($tablee)){
								if($cot['SoTang'] == $row['SoTang']){
									echo "<option value='".$cot['SoTang']."' selected>Tầng ".$cot['SoTang']."</option>";
								}else{
									echo "<option value='".$cot['SoTang']."'>Tầng ".$cot['SoTang']."</option>";
								}
							}
						echo "</select></td>";
						echo "</tr>";
							//phường
							//tầng hiện tại
							
							echo "<tr>";
							echo "<td>Phường hiện tại</td>";
							echo "<td><select name='MaPhuong";
							echo "'>";	
							$dsquan = $qq -> view_quan();
							while($cotqq = mysql_fetch_assoc($dsquan)){
								if($cotqq['MaPhuong'] == $row['maPhuong']){
									echo "<option value='".$cotqq['MaPhuong']."' selected>".$cotqq['TenPhuong']."- ".$cotqq['TenQuan']."</option>";
								}else{
									echo "<option value='".$cotqq['MaPhuong']."'>".$cotqq['TenPhuong']."- ".$cotqq['TenQuan']."</option>";
								}
							}
						echo "</select></td>";
						echo "</tr>";
						}
					}
				}
				
					echo "<tr>";
					echo "<td></td>";
					echo "<td><input type='submit' name='update_benhvien' value='CẬP NHẬT'></td>";
					echo "</tr>";
				if(isset($_REQUEST['update_benhvien'])){
					//$mabn = $_REQUEST['MaBenhNhan'];
					//var_dump($mabn);
					$mabv = $_REQUEST['MaBV'];
					$tenbv = $_REQUEST['TenBV'];
					$email = $_REQUEST['Email'];
					$sdt = $_REQUEST['SDT'];
					//echo $sdt;
					$sogiuongtoida = $_REQUEST['soluongtoida'];
					$dieutri = $_REQUEST['dieutri'];
					$maphuong = $_REQUEST['MaPhuong'];
					$sotang = $_REQUEST['SoTang'];

					$ketqua = $p-> capnhat_benhvien($mabenhvien,$tenbv,$sdt,$email,$sogiuongtoida,$dieutri,$sotang,$maphuong);
					if($ketqua){
						echo "<script>alert('Chỉnh sửa thành công');</script>";
						echo "<script>window.location.href = 'index.php?quanlybenhvien';</script>";
					}else{
						echo "<script>alert('Chỉnh sửa thất bại');</script>";
					}
				}
			
			?>
		</table>
	</form>
</body>