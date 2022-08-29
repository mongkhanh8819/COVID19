<?php 
	
	class mainFunction {
		
		private function connect(){
			$con = mysql_connect("localhost","covid","123456");
			if(!$con) {
				echo("Không kết nối được cơ sở dữ liệu!");
				exit();	
			}
			else {
				mysql_select_db("htdieuphoibncovid");
				mysql_query("set names utf8");
				return $con;	
			}
		}
		
		public function themsua_benhnhan($sql) {
			$link = $this->connect();
			if(mysql_query($sql,$link)) {
				return 1;	
			}
			else {
				return 0;	
			}
		}
		
		public function loadDS_BenhNhan($sql) {
			$link = $this->connect();
			$result = mysql_query($sql,$link);
			@mysql_close($result);
			$i = mysql_num_rows($result);
			if($i>0) {
				echo '<tr>
		  					<td colspan="2" align="center" valign="middle"><strong>DANH SÁCH BỆNH NHÂN</strong></td>
						</tr>' ;
				echo '<table width="1500" border="1" align="center" cellpadding="5" cellspacing="0">
						  <tr>
							<td align="center">Mã bệnh nhân</td>
							<td align="center">Tên bệnh nhân</td>
							<td align="center">Email</td>
							<td align="center">Số điện thoại</td>
							<td align="center">Quê quán</td>
							<td align="center">Ngày sinh</td>
							<td align="center">Địa chỉ</td>
							<td align="center">Trạng thái</td>
							<td align="center">Nơi điều trị</td>
							<td align="center">Giới tính</td>
							<td align="center">CMND/CCCD</td>
							<td align="center">Quốc tịch</td>
							<td align="center">Mã bệnh viện</td>
							<td align="center">Mã phường</td>
							<td align="center">Số điện thoại-TK</td>
						  </tr>';
				while($row=mysql_fetch_array($result)) {
				
					$mabn = $row['MaBenhNhan'];
					$tenbn = $row['TenBenhNhan'];
					$email = $row['Email'];
					$sdt = $row['SoDienThoai'];
					$quequan = $row['QueQuan'];
					$ngaysinh = $row['NgaySinh'];
					$diachi = $row['DiaChi'];
					$trangthai = $row['TrangThai'];
					$noidieutri = $row['NoiDieuTri'];
					$gioitinh = $row['GioiTinh'];
					$cmnd = $row['CMND'];
					$quoctich = $row['QuocTich'];
					$mabv = $row['MaBV'];
					$maphuong = $row['MaPhuong'];
					$sdt_tk = $row['SoDienThoai_TK'];
					
					echo '<tr>';
					echo '<td align="center"><a style="text-decoration: none;" href="?mabenhnhan='.$mabn.'">'.$mabn.'</a></td>';
					echo '		<td align="center"><a style="text-decoration: none;" href="?mabenhnhan='.$mabn.'">'.$tenbn.'</a></td>';
					echo '		<td align="center"><a style="text-decoration: none;" href="?mabenhnhan='.$mabn.'">'.$email.'</a></td>';
					echo '		<td align="center"><a style="text-decoration: none;" href="?mabenhnhan='.$mabn.'">'.$sdt.'</a></td>';
					echo '		<td align="center"><a style="text-decoration: none;" href="?mabenhnhan='.$mabn.'">'.$quequan.'</a></td>';
					echo '		<td align="center"><a style="text-decoration: none;" href="?mabenhnhan='.$mabn.'">'.$ngaysinh.'</a></td>';
					echo '		<td align="center"><a style="text-decoration: none;" href="?mabenhnhan='.$mabn.'">'.$diachi.'</a></td>';
					if ($trangthai == 1) {
						echo '		<td align="center"><a style="text-decoration: none;" href="?mabenhnhan='.$mabn.'">Đang điều trị</a></td>';
					}elseif($trangthai == 0) {
						echo '		<td align="center"><a style="text-decoration: none;" href="?mabenhnhan='.$mabn.'">Đã khỏi bệnh</a></td>';
					}elseif($trangthai == 2) {
						echo '		<td align="center"><a style="text-decoration: none;" href="?mabenhnhan='.$mabn.'">Chờ chuyển viện</a></td>';
					}elseif($trangthai == 3) {
						echo '		<td align="center"><a style="text-decoration: none;" href="?mabenhnhan='.$mabn.'">Điều trị tại nhà</a></td>';
					}
					echo '		<td align="center"><a style="text-decoration: none;" href="?mabenhnhan='.$mabn.'">'.$noidieutri.'</a></td>';
					if ($gioitinh == 1) {
						echo '		<td align="center"><a style="text-decoration: none;" href="?mabenhnhan='.$mabn.'">Nam</a></td>';
					} else {
						echo '		<td align="center"><a style="text-decoration: none;" href="?mabenhnhan='.$mabn.'">Nữ</a></td>';
					}
					
					echo '		<td align="center"><a style="text-decoration: none;" href="?mabenhnhan='.$mabn.'">'.$cmnd.'</a></td>';
					echo '		<td align="center"><a style="text-decoration: none;" href="?mabenhnhan='.$mabn.'">'.$quoctich.'</a></td>';
					echo '		<td align="center"><a style="text-decoration: none;" href="?mabenhnhan='.$mabn.'">'.$mabv.'</a></td>';
					echo '		<td align="center"><a style="text-decoration: none;" href="?mabenhnhan='.$mabn.'">'.$maphuong.'</a></td>';
					echo '		<td align="center"><a style="text-decoration: none;" href="?mabenhnhan='.$mabn.'">'.$sdt_tk.'</a></td>';
      				echo '</tr>';
				} 	
				echo '</table>';
			}	
			else {
				echo 'Đang cập nhật dữ liệu!';	
			}
		}
		
		public function layCot($sql) {
			$link = $this->connect();
			$result = mysql_query($sql,$link);
			@mysql_close($link);
			$i = mysql_num_rows($result);
			$value = '';
			if($i>0) {
				while($row = mysql_fetch_array($result)) {
					$mabn = $row[0];
					$value = $mabn;	
				}	
			}	
			return $value;
		}
		
	}
	
?>