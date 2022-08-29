<?php 

	include_once("Controller/cQuan.php");
   include_once("Controller/cBenhvien.php");
   include_once("Controller/cXuatThongKe.php");
	$p = new cQuan();
	$b = new cBenhvien();
   $tk = new cXuatThongKe();
   $dsquan = $p -> view_quan();


 ?>
<body>
	<h3 style="text-align: center">XUẤT THỐNG KÊ</h3>

	<form action="#" method="post" enctype="multipart/form-data">
		<table style="margin: auto; width: 60%;text-align: left">
		
			 <tr>
            <td><h4>Chọn địa bàn quận , huyện</h4></td>
            <td><select name="cboQuan" onChange="myFunction();">
                  <option value="">Chọn quận huyện</option>
                  <?php
                     

                     if($dsquan){
                        if(mysql_num_rows($dsquan)){
                           while($row = mysql_fetch_assoc($dsquan)){
                              ?>
                              <option value="<?php echo $row['MaPhuong']; ?>" <?php if(isset($_POST['cboQuan'])&&$_POST['cboQuan'] == $row['MaPhuong']) echo "selected" ?>><?php echo $row['TenPhuong'] ?> - <?php echo $row['TenQuan'] ?></option>
                              <?php 
                           }
                        }
                     }
                  
                  ?>  
               </select></td>
         </tr>
         <tr>
            <?php
               if(isset($_POST['cboQuan']) && $_POST['cboQuan'] != ""){
                  $id = $_POST['cboQuan'];
                  echo "<td><h4>Chọn bệnh viện</h3></td>";
                  echo "<td><select name='MaBV' onChange='myFunction();'>";
               }
                     $ds = $b -> view_benhvien_by_maphuong($id);
                     if($ds){
                        if(mysql_num_rows($ds)>0){
                           while($row2 = mysql_fetch_assoc($ds)){
                              ?>
                              <option value="<?php echo $row2['MaBV'] ?>" <?php if(isset($_POST['MaBV'])&&$_POST['MaBV'] == $row2['MaBV']) echo "selected" ?>><?php echo $row2['TenBV'] ?></option>
                              <?php 
                           }
                        }
                     }

                   ?>
               </select></td>
               <!-- <td><input type="hidden" name="TenBV" value='<?php echo $TenBV; ?>'></td> -->
         </tr>
         <tr>
            <td><h4>Từ ngày</h4></td>
            <td><input name="ngaybatdau" type="date"></td>
         </tr>
         <tr>
            <td><h4>Đến hôm nay</h4></td>
            <?php 

               $t=time();
               ($t . "<br>");
               $thoigian = (date("Y-m-d",$t));
               echo "<td><input name='ngayketthuc' type='date' value=".$thoigian."></td>";
             ?>
         </tr>
         <tr>
            <td></td>
            <td>Số lượng bệnh nhân đang điều trị<input type="radio" name="luachon" value="1"><br>
            Số lượng bệnh nhân đã khỏi bệnh<input type="radio" name="luachon" value="2"><br>
            Số lượng chờ chuyển viện<input type="radio" name="luachon" value="3"><br>
            Số ca điều trị tại nhà<input type="radio" name="luachon" value="4"><br>
            Các đề xuất chuyển viện theo khoảng thời gian<input type="radio" name="luachon" value="5">
         </tr>
		   <tr>
            <td></td>
            <td><input type="submit" name="submit" value="XÁC NHẬN ">
            <!-- <input type="reset" name="reset" value="Nhập lại"> --></td>
         </tr>
		</table>
	</form>
   <?php 

      if(isset($_REQUEST['submit'])){

         $maphuong = $_REQUEST['cboQuan'];
         $mabv = $_REQUEST['MaBV'];
         $tenbv = $b -> view_benhvien_by_mabv($mabv);
         if($tenbv){
            while($bb = mysql_fetch_assoc($tenbv)){
               $tenBenhvien = $bb['TenBV'];
            }
         }
         $ngaybatdau = $_REQUEST['ngaybatdau'];
         $ngayketthuc = $_REQUEST['ngayketthuc'];
         $luachon = $_REQUEST['luachon'];
         $ketqua = $tk -> xuatthongke($maphuong,$mabv,$tenBenhvien,$ngaybatdau,$ngayketthuc,$luachon);
         // var_dump($ketqua);
         // var_dump(mysql_fetch_assoc($ketqua));
         if($ketqua){
            if(mysql_num_rows($ketqua)>0){
               if ($luachon == 5) {
                     echo "<table style='margin: auto; width: 60%;text-align: center' border='1'>";
                     echo "<tr style='background-color:#07DE44'>";
                     echo "<th>Mã phiếu đề xuất</th>";
                     echo "<th>Thời gian lập</th>";
                     echo "<th>Mã bệnh nhân</th>";
                     echo "<th>Tầng hiện tại</th>";
                     echo "<th>Bệnh viện hiện tại</th>";
                     echo "<th>Tầng đề xuất</th>";
                     echo "<th>Bệnh viện mới</th>";
                     echo "<th>Trạng thái duyệt</th>";
                     echo "</tr>";
                  }
               while($kq = mysql_fetch_assoc($ketqua)) {

                  if($luachon == 1){
                     echo "Số lượng bệnh nhân hiện tại : ".$kq['SoLuongBenhNhan'];
                  }elseif($luachon == 2){
                     echo "Số lượng bệnh nhân đã khỏi bệnh : ".$kq['count(*)'];
                  }elseif($luachon == 3){
                     echo "Số lượng chờ chuyển viện : ".$kq['count(*)'];
                  }elseif($luachon == 4){
                     echo "Số ca điều trị tại nhà : ".$kq['count(*)'];
                  }elseif($luachon == 5){
                     echo "<tr>";
                     echo "<td style='text-align:center'>".$kq['MaPhieuDeXuat']."</td>";
                     echo "<td style='text-align:center'>".$kq['ThoiGianLapPhieu']."</td>";
                     echo "<td style='text-align:center'>".$kq['MaBenhNhan']."</td>";
                     echo "<td style='text-align:center'>".$kq['TangHienTai']."</td>";
                     echo "<td style='text-align:center'>".$kq['TenBV']."</td>";
                     echo "<td style='text-align:center'>".$kq['TangDeXuat']."</td>";
                     echo "<td style='text-align:center'>".$kq['MaBV']."</td>";
                     if($kq['TrangThaiDuyet']==1){
                        echo "<td style='text-align:center'>Chờ duyệt</td>";
                     }elseif($kq['TrangThaiDuyet'] == 2){
                        echo "<td style='text-align:center'>Đã duyệt</td>";
                     }else{
                        echo "<td style='text-align:center'>Không được duyệt</td>";
                     }
                  }
               }
               echo "</table>";
            }
         }
      }

    ?>
</body>