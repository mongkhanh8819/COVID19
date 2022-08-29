<?php 

	include_once("Controller/ccanboyte.php");

	$p = new ccanboytephuong();

 ?>
<body>
	<h3 style="text-align: center">THÊM CÁN BỘ Y TẾ  MỚI</h3>

	<form action="#" method="post" enctype="multipart/form-data">
		<table style="margin: auto; width: 60%;text-align: left">
			<?php
					//mã cán bộ
					
					$permitted_chars = 'abcdefghijklmnopqrstuvwxyz';
					$number = '0123456789';
					$macanbo =  strtoupper(substr(str_shuffle($permitted_chars), 0, 2));
					$macanbo .=  strtoupper(substr(str_shuffle($number), 0, 2));
					echo "<tr>";
					echo "<td>Mã Cán Bộ Y Tế Phường:</td>";
					echo "<td><input type='text' size='70' name='MaCBYTP' value='".$macanbo."'></td>";
					echo "</tr>";

								//tên cán bộ

					echo "<tr>";
					echo "<td>Tên Cán Bộ Y Tế Phường:</td>";
					echo "<td><input type='text' size='70' name='TenCBYTP'></td>";
					echo "</tr>";
								//số điện thoại
					echo "<tr>";
					echo "<td>Số điện thoại:</td>";
					echo "<td><input type='text' size='70' name='SoDienThoai'></td>";
					echo "</tr>";

								//Địa chỉ
					echo "<tr>";
					echo "<td>Địa chỉ:</td>";
					echo "<td><input type='text' size='70' name='DiaChi'></td>";
					echo "</tr>";
						//Đơn vị công tác
					echo "<tr>";
					echo "<td>Đơn vị công tác:</td>";
					echo "<td><input type='text' size='70' name='DonViCongTac'></td>";
					echo "</tr>";
					            //email
					echo "<tr>";
					echo "<td>Email:</td>";
					echo "<td><input type='email' size='70' name='Email'></td>";
					echo "</tr>";
								//
					echo "<tr>";
					echo "<td></td>";
					echo "<td><input type='submit' name='insert_canboyte' value='THÊM'></td>";
					echo "</tr>";
			
				if(isset($_REQUEST['insert_canboyte'])){
					//$mabn = $_REQUEST['MaBenhNhan'];
					//var_dump($mabn);
					$macb = $_REQUEST['MaCBYTP'];
					$tencb = $_REQUEST['TenCBYTP'];
					$sdt = $_REQUEST['SoDienThoai'];
					$diachi = $_REQUEST['DiaChi'];
					$donvicongtac = $_REQUEST['DonViCongTac'];
					$email = $_REQUEST['Email'];

					$ketqua = $p->them_canboytephuong($macb,$tencb,$sdt,$diachi,$donvicongtac,$email);
					if($ketqua){
						echo "<script>alert('Thêm thành công');</script>";
						echo header("refresh:0; url='index.php?quanlycanboyte'");
					}else{
						echo "<script>alert('Thêm thất bại');</script>";
					}
				}
			
			?>
		</table>
	</form>
</body>