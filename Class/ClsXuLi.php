<?php
class COVID
{
	private function connect()
	{
		$con= mysql_connect("localhost","covid","123456");
		if(!$con)
	{
		echo 'không kết nối được CSDL';
		exit(); 	
	}
	else
	{
		mysql_select_db("htdieuphoibncovid");
		mysql_query("SET NAMES UTF8");
		return $con;
	}
	 
	}
	 public function loadTTBN($sql)
	 {
		 $link=$this->connect();
		 $ketqua=mysql_query($sql,$link);
		 mysql_close($link);
		 $i=mysql_num_rows($ketqua);
		 if($i>0)
		 {
			  echo'<table width="100%" height="336" border="2" align="left" cellpadding="5" cellspacing="0">
					<tbody>
					  <tr style="background-color:#07DE44;">
						
						<th width="88">Mã bệnh nhân</th>
						<th width="61">Tên bệnh nhân</th>
						<th width="61">Email</th>
						<th width="60">Số điện thoại</th>
						<th width="60">Quê quán</th>
						<th width="62">Ngày sinh</th>
						<th width="58">Địa chỉ</th>
						<th width="63">Trạng thái</th>
						<th width="60">Nơi điều trị</th>
						<th width="60">Giới tính</th>
						<th width="63">CMND</th>
						<th width="62">Quốc tịch</th>
						<th width="61">Mã bệnh viện</th>
						<th width="66">Mã phường</th>
						<th width="67">Số điện thoại tài khoản</th>
					  </tr>';
			 while($row=mysql_fetch_array($ketqua))
			 {
				 $MaBN = $row['MaBenhNhan'];
				 $TenBN = $row['TenBenhNhan'];
				 $Email = $row['Email'];
				 $SDT = $row['SoDienThoai'];
				 $QueQuan = $row['QueQuan'];
				 $NgaySinh = $row['NgaySinh'];
				 $DiaChi = $row['DiaChi'];
				 $TrangThai = $row['TrangThai'];
				 $NoiDieuTri = $row['NoiDieuTri'];
				 $GioiTinh = $row['GioiTinh'];
				 $CMND = $row['CMND'];
				 $QuocTich = $row['QuocTich'];
				 $MaBV = $row['MaBV'];
				 $MaPhuong = $row['MaPhuong'];
				 $SDT_TK = $row['SoDienThoai_TK'];
				
					 echo' <tr style="background-color:rgb(0 123 255 / 25%);">';
				
					echo '<td><a href="?idbn='.$MaBN.'" style="color:#1d2124;">'.$MaBN.'</a></td>';
					echo '	<td>'.$TenBN.'</td>';
					echo '	<td>'.$Email.'</td>';
					echo '	<td>'.$SDT.'</td>';
					echo '	<td>'.$QueQuan.'</td>';
					echo '	<td>'.$NgaySinh.'</td>';
					echo '	<td>'.$DiaChi.'</td>';
					if ($TrangThai == 1) {
						echo '	<td><a href="?id='.$TrangThai.'" style="color:#1d2124;">Đang điều trị</a></td>';
					}elseif($TrangThai == 0) {
						echo '	<td><a href="?id='.$TrangThai.'" style="color:#1d2124;">Đã khỏi bệnh</a></td>';
					}elseif($TrangThai == 2) {
						echo '	<td><a href="?id='.$TrangThai.'" style="color:#1d2124;">Chờ chuyển viện</a></td>';
					}elseif($TrangThai == 3) {
						echo '	<td><a href="?id='.$TrangThai.'" style="color:#1d2124;">Điều trị tại nhà</a></td>';
					}
					
					echo '	<td>'.$NoiDieuTri.'</td>';
					if ($GioiTinh == 1) {
						echo '<td>Nam</td>';
					} else {
						echo '<td>Nữ</td>';
					}
					
					echo '	<td>'.$CMND.'</td>';
					echo '	<td>'.$QuocTich.'</td>';
					echo '	<td>'.$MaBV.'</td>';
					echo '	<td>'.$MaPhuong.'</td>';
					echo '	<td>'.$SDT_TK.'</td>';
					echo ' </tr>';
					echo '</tbody>';	  
				
			 }
			  echo '</table>';
		 }
		 else
		{
			echo 'Dữ liệu đang được cập nhật!';
		}
	 }
		public function themxoasua($sql)
	{
		$link=$this->connect();
		if(mysql_query($sql,$link))
		{
			return 1;	
		}
		else
		{
			return 0;	
		}
		
	}
	public function select_mabenhnhan($sql)
	{
		$link=$this->connect();
		$ketqua=mysql_query($sql,$link);
		mysql_close($link);
		$i=mysql_num_rows($ketqua);
		if($i>0){
			while($row=mysql_fetch_array($ketqua)){
				$_SESSION['MaBenhNhan'] = $row['MaBenhNhan'];
				//echo $_SESSION['MaBenhNhan'];
			}		 
		}
		else
		{
			echo 'Dữ liệu đang được cập nhật!';
		}
		
	}
	public function loadcombo_MaBenhNhan($sql)
	{
		$link=$this->connect();
		$ketqua=mysql_query($sql,$link);
		mysql_close($link);
		$i=mysql_num_rows($ketqua);
		if($i>0)
		{
			echo '<select name="benhnhan" id="benhnhan">';
			echo '<option>Chọn mã bệnh nhân</option>';
			while($row=mysql_fetch_array($ketqua))
			{
				$MaBN=$row['MaBenhNhan'];
			
					
					echo '<option value="'.$MaBN.'" selected="selected">'.$MaBN.'</option>';
				
			}
			echo '</select>';
		}
	}
	 public function loadTKCV($sql)
	 {
		 $link=$this->connect();
		 $ketqua=mysql_query($sql,$link);
		 mysql_close($link);
		 $i=mysql_num_rows($ketqua);
		 if($i>0)
		 {
			  echo'<table width="50%" height="230" border="2" align="left" cellpadding="5" cellspacing="0">
					<tbody>
					  <tr style="background-color:#07DE44;">
						<th width="">Số thứ tự</th>
						<th width="">Mã tài khoản</th>
						<th width="">Mật khẩu</th>
						<th width="">Phân quyền</th>
					  </tr>';
			 $dem=1;
			 while($row=mysql_fetch_array($ketqua))
			 {
				 $MaTKCV = $row['MaTK'];
				 $MatKhau = $row['password'];
				 $Phanquyen = $row['phanquyen'];
				
					 echo' <tr style="background-color:rgb(0 123 255 / 25%);">
						<td><a href="?id='.$MaTKCV.'" style="color:#1d2124;">'.$dem.'</a></td>
						<td><a href="?id='.$MaTKCV.'" style="color:#1d2124;">'.$MaTKCV.'</a></td>
						<td><a href="?id='.$MaTKCV.'" style="color:#1d2124;">'.$MatKhau.'</a></td>
						<td><a href="?id='.$MaTKCV.'" style="color:#1d2124;">'.$Phanquyen.'</a></td>
					  </tr>
					</tbody>';	  
				$dem++;
			 }
			  echo '</table>';
		 }
		 else
		{
			echo 'Dữ liệu đang được cập nhật!';
		}
	 }
	public function laycot($sql)
		{
			$link=$this->connect();
			$ketqua=mysql_query($sql,$link);
			mysql_close($link);
			$i=mysql_num_rows($ketqua);
			$giatri='';
			if($i>0)
			{
				while($row=mysql_fetch_array($ketqua))
				{
					$id=$row[0];
					$giatri=$id;
				}
			}
			return $giatri;
		}
	public function hoten($sql)
	{
		$link=$this->connect();
		$ketqua=mysql_query($sql,$link);
		mysql_close($link);
		$i=mysql_num_rows($ketqua);
		if($i>0)
		{
			while($row=mysql_fetch_array($ketqua))
			{
				$hoten=$row['TenBenhNhan'];
				echo $hoten;
			}
		}
		else 
		{
			echo 'Không có dữ liệu';
		}
	}
	
		public function sodienthoai($sql)
	{
		$link=$this->connect();
		$ketqua=mysql_query($sql,$link);
		mysql_close($link);
		$i=mysql_num_rows($ketqua);
		if($i>0)
		{
			while($row=mysql_fetch_array($ketqua))
			{
				$sodienthoai=$row['SoDienThoai'];
				echo $sodienthoai;
			}
		}
		else 
		{
			echo 'Không có dữ liệu';
		}
	}
	
		public function email($sql)
	{
		$link=$this->connect();
		$ketqua=mysql_query($sql,$link);
		mysql_close($link);
		$i=mysql_num_rows($ketqua);
		if($i>0)
		{
			while($row=mysql_fetch_array($ketqua))
			{
				$email=$row['Email'];
				echo $email;
			}
		}
		else 
		{
			echo 'Không có dữ liệu';
		}
	}
	
		public function tieude($sql)
	{
		$link=$this->connect();
		$ketqua=mysql_query($sql,$link);
		mysql_close($link);
		$i=mysql_num_rows($ketqua);
		if($i>0)
		{
			while($row=mysql_fetch_array($ketqua))
			{
				$tieude=$row['TieuDe'];
				echo $tieude;
			}
		}
		else 
		{
			echo 'Không có dữ liệu';
		}
	}
	
		public function noidung($sql)
	{
		$link=$this->connect();
		$ketqua=mysql_query($sql,$link);
		mysql_close($link);
		$i=mysql_num_rows($ketqua);
		if($i>0)
		{
			while($row=mysql_fetch_array($ketqua))
			{
				$noidung=$row['NoiDung'];
				echo $noidung;
			}
		}
		else 
		{
			echo 'Không có dữ liệu';
		}
	}
	public function sotrang($sql)
	 {
		$link=$this->connect();
		 $result = mysql_query($sql,$link);
		 mysql_close($link);
		 $i= mysql_num_rows($result);
		 return $i;
	 }
}

?>