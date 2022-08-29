<?php 

	include_once("Controller/cBenhvien.php");
	include_once("Controller/cQuan.php");
	include_once("Controller/cTang.php");

	$p = new cBenhvien();
	$q = new cQuan();
	$t = new cTang();
	$dsquan = $q -> view_quan();
	$dstang = $t -> view_tang();
 ?>
<body>
	<h3 style="text-align: center">THÊM BỆNH VIỆN MỚI</h3>

	<form action="#" method="post" enctype="multipart/form-data">
		<table style="margin: auto; width: 100%;text-align: left">
			<?php
								//mã bệnh nhân
					echo "<tr>";
					echo "<td>Mã bệnh viện:</td>";
					echo "<td><input type='text' size='70' name='MaBV'></td>";
					echo "</tr>";
								//tên bệnh viện
					echo "<tr>";
					echo "<td>Tên bệnh viện:</td>";
					echo "<td><input type='text' size='70' name='TenBV'></td>";
					echo "</tr>";
								//số điện thoại
					echo "<tr>";
					echo "<td>Số điện thoại:</td>";
					echo "<td><input type='text' size='70' name='SDT'></td>";
					echo "</tr>";
								//email
					echo "<tr>";
					echo "<td>Email:</td>";
					echo "<td><input type='email' size='70' name='Email'></td>";
					echo "</tr>";
			
					//số giường tối đa
					echo "<tr>";
					echo "<td>Số giường tối đa:</td>";
					echo "<td><input type='number' size='70' name='SoGiuongToiDa'></td>";
					echo "</tr>";
								//Điều trị
					echo "<tr>";
					echo "<td>Chức năng chính của bệnh viện:</td>";
					echo "<td><input type='text' size='70' name='dieutri'></td>";
					echo "</tr>";
								//Số tầng

					?>	
					<tr>
            			<td>Chọn địa bàn quận , huyện</td>
           		 		<td><select name="cboPhuong">
                  			<option value="">Chọn quận huyện</option>
                  	<?php
                     

                     if($dsquan){
                        if(mysql_num_rows($dsquan)){
                           while($row = mysql_fetch_assoc($dsquan)){
                              ?>
                              <option value="<?php echo $row['MaPhuong']; ?>"><?php echo $row['TenPhuong'] ?> - <?php echo $row['TenQuan'] ?></option>
                              <?php 
                           }
                        }
                     }
                  
                  ?>  
               </select></td>
         </tr>
         <?php
							//chọn tầng
					?>	
					<tr>
            			<td>Chọn tầng</td>
           		 		<td><select name="cboTang">
                  			<option value="">Chọn tầng</option>
                  	<?php
                     

                     if($dstang){
                        if(mysql_num_rows($dstang)){
                           while($rowt = mysql_fetch_assoc($dstang)){
                              ?>
                              <option value="<?php echo $rowt['SoTang']; ?>">Tầng <?php echo $rowt['SoTang'] ?> - <?php echo $rowt['MoTaTinhTrang']; ?></option>
                              <?php 
                           }
                        }
                     }
                  
                  ?>  
               </select></td>
         </tr>
         <?php
								//
					echo "<tr>";
					echo "<td></td>";
					echo "<td><input type='submit' name='insert_benhvien' value='THÊM MỚI'></td>";
					echo "</tr>";
			
				if(isset($_REQUEST['insert_benhvien'])){
					//$mabn = $_REQUEST['MaBenhNhan'];
					//var_dump($mabn);
					$mabv = $_REQUEST['MaBV'];
					$tenbv = $_REQUEST['TenBV'];
					$email = $_REQUEST['Email'];
					$sdt = $_REQUEST['SDT'];
					$sogiuongtoida = $_REQUEST['SoGiuongToiDa'];
					$dieutri = $_REQUEST['dieutri'];
					$maphuong = $_REQUEST['cboPhuong'];
					$sotang = $_REQUEST['cboTang'];

					$ketqua = $p->them_benhvien($mabv,$tenbv,$sdt,$email,$sogiuongtoida,$dieutri,$sotang,$maphuong);
					if($ketqua){
						echo "<script>alert('Thêm thành công');</script>";
						echo "<script>window.location.href = 'index.php?quanlybenhvien';</script>";
					}else{
						echo "<script>alert('Thêm thất bại');</script>";
					}
				}
			
			?>
		</table>
	</form>
</body>