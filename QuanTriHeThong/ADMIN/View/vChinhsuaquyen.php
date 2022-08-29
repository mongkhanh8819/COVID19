<?php

	include("Controller/cTaikhoan.php");
	$matk = $_REQUEST['matk'];
	//echo $compID;
	$p = new cTaikhoan();
	$table = $p->view_taikhoan_by_id($matk);
	//var_dump($table);

?>
<div>
	<h3 style="text-align: center">Chỉnh sửa quyền hạn tài khoản</h3>
	<form action="#" method="post" enctype="multipart/form-data">
		<table style="margin: auto; width: 60%;text-align: left">
			<?php
			
				if($table){
					if(mysql_num_rows($table)>0){
						while($row = mysql_fetch_assoc($table)){
							//mã tài khoản
							echo "<tr>";
							echo "<td>Mã tài khoản:</td>";
							echo "<td><input type='text' size='70' name='MaTK' value='".$row['MaTK']."' disabled></td>";
							echo "</tr>";
							//pass
							echo "<tr>";
							echo "<td>Mật khẩu:</td>";
							echo "<td><input type='text' size='70' name='password' value='".$row['password']."'disabled></td>";
							echo "</tr>";
							//quyền
							$array = array(
    							"1" => "Nhân viên bệnh viện",
    							"2" => "Nhân viên y tế phường",
    							"3" => "ADMIN",
							);
							echo "<tr>";
							echo "<td>Loại tài khoản:</td>";
							echo "<td>";
							foreach($array as $key=>$a){
								//if(in_array($a,$array)){
									if($key != $row['phanquyen']){
										echo "<input type='radio' name='loaitaikhoan' value='".$key."'>".$a."";
									}else{
										echo "<input type='radio' name='loaitaikhoan' value='".$row['phanquyen']."' checked='checked'>".$a."";
									}
								//}
							}	
							echo "</td>";
							echo "</tr>";
							echo "<tr>";
							echo "<td></td>";
							echo "<td><input type='submit' name='update_quyen' value='Update'></td>";
							echo "</tr>";
						}
					}
				}
				//var_dump($table);
			
			
			?>
		</table>
	</form>
	<?php 

			if(isset($_REQUEST['update_quyen'])){
					//$macb = $_REQUEST['MaCBYTP'];
					//var_dump($mabn);
					//$tencb = $_REQUEST['TenCBYTP'];
					$phanquyen = $_REQUEST['loaitaikhoan'];
					

					$ketqua = $p->capnhat_quyen($matk,$phanquyen);
					//var_dump($ketqua);
					if($ketqua){
						echo "<script>alert('Phân quyền tài khoản thành công');</script>";
						echo header("refresh:0; url='index.php?phanquyen'");
					}else{
						echo "<script>alert('Phân quyền thất bại');</script>";
					}
				}

		 ?>
</div>