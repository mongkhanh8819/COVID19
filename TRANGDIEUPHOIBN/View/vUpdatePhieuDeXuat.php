<?php 

   include("Controller/cBenhnhan.php");
   include_once("Controller/cTang.php");
   include_once("Controller/cBenhvien.php");
   include_once("Controller/cPhieudexuat.php");
   $mabn = $_REQUEST['mabn'];
   $maphieu = $_REQUEST['maphieu'];
   $dx = new cPhieudexuat();
   $p = new cBenhnhan();
   $a = new cTang();
   $b = new cBenhvien();
   $table = $p-> view_benhnhan_by_mabn($mabn);
   $sotang1 = $p -> view_tanghientai_bybenhnhan($mabn);
   if($sotang1){
      if(mysql_num_rows($sotang1)){
         while($tang = mysql_fetch_assoc($sotang1)){
               //echo $tang['SoTang'];
               $dstang = $a -> view_tang($tang['SoTang']);
            }
         }
      }

 ?>
<div id="tang" style="width: 90%;margin: auto;"><br>
   <h2 style="text-align: center;">PHIẾU ĐỀ XUẤT CHUYỂN BỆNH NHÂN</h2>
   <form id="form" action="#" method="post" enctype="multipart/form-data">
      <table style="width: 45%; float: left;">
      <h3>THÔNG TIN BỆNH NHÂN</h3>
      <?php 

         if($table){
            if(mysql_num_rows($table)){
               while($row = mysql_fetch_assoc($table)){
                  echo "<tr>";
                  echo "<td>Tên bệnh nhân</td>";
                  echo "<td>";
                  echo "<input type='text' name='txtTenBenhNhan' value='".$row['TenBenhNhan']."' disabled>";
                  echo "<input type='hidden' name='txtMaBN' value='".$row['MaBenhNhan']."'>";
                  echo "</td>";
                  echo "</tr>";
                  echo "<tr>";
                  echo "<td>Ngày sinh</td>";
                  echo "<td>";
                  echo "<input type='date' name='txtNgaySinh' value='".$row['NgaySinh']."' disabled>";
                  echo "</td>";
                  echo "</tr>";
                  echo "<tr>";
                  echo "<td>Quê quán</td>";
                  echo "<td>";
                  echo "<input type='text' name='txtQueQuan' value='".$row['QueQuan']."' disabled>";
                  echo "</td>";
                  echo "</tr>";
                  echo "<tr>";
                  echo "<td>Địa chỉ hiện tại</td>";
                  echo "<td>";
                  echo "<input type='text' name='txtDiaChi' value='".$row['DiaChi']."' disabled>";
                  echo "</td>";
                  echo "<tr>";
                  echo "<tr>";
                  echo "<td>Số điện thoại</td>";
                  echo "<td>";
                  echo "<input type='text' name='txtSDT' value='".$row['SoDienThoai']."' disabled>";
                  echo "</td>";
                  echo "</tr>";
                  echo "<tr>";
                  echo "<td>Giới tính</td>";
                  echo "<td>";
                  if($row['GioiTinh'] == 1){
                     echo "<input type='text' name='txtSDT' value='Nam' disabled>";
                  }else{
                     echo "<input type='text' name='txtSDT' value='Nữ' disabled>";
                  }
                  echo "</td>";
                  echo "</tr>";
                  echo "<tr>";
                  echo "<td>Tầng hiện tại</td>";
                  echo "<td>";
                  $sotang = $p -> view_tanghientai_bybenhnhan($row['MaBenhNhan']);
                  if($sotang){
                     if(mysql_num_rows($sotang)){
                        while($cot = mysql_fetch_assoc($sotang)){
                           echo "<input type='text' name='sotanght' value='".$cot['SoTang']."' disabled>";
                        }
                     }
                  }
                  echo "</td>";
                  echo "</tr>";
                  echo "<tr>";
                  echo "<td>Bệnh viện hiện tại</td>";
                  echo "<td>";
                  echo "<input type='text' name='TenBVHT' value='".$row['TenBV']."' disabled>";
                  echo "</td>";
                  echo "</tr>";
                  echo "<tr>";
                  echo "<td>Phường/Quận</td>";
                  echo "<td>";
                  echo "<input type='text' name='maphuong' value='".$row['MaPhuong']."' disabled>";
                  echo "</td>";
                  echo "</tr>";
                  echo "<tr>";
                  echo "<td>Tình trạng hiện tại</td>";
                  echo "<td>";
                  if($row['TrangThai'] == 1){
                     echo "<input type='text' name='TTHT' value='Đang điều trị' disabled>";
                  }elseif($row['TrangThai'] == 0){
                     echo "<input type='text' name='TTHT' value='Đã khỏi bệnh' disabled>";
                  }else{
                     echo "<input type='text' name='TTHT' value='Chờ chuyển viện' disabled>";
                  }
                  echo "</td>";
                  echo "</tr>";

       ?>
   </table>
      <table style="margin: auto;text-align: left; width: 49%; float:right;">
         <tr><td><h3>CẬP NHẬT PHIẾU ĐỀ XUẤT</h3></td></tr>
         <tr>
            <td><h4>Bệnh nhân sẽ được chuyển đến</h4></td>
            <td>
            <?php 

                  $thongtinphieu = $dx -> view_phieudexuat_by_id($maphieu);

                  if($thongtinphieu){
                     if(mysql_num_rows($thongtinphieu)){
                        while ($ttphieu = mysql_fetch_assoc($thongtinphieu)) {
                           echo "Tầng ".$ttphieu['TangDeXuat']." - ".$ttphieu['TenBV'];
                        }
                     }
                  }
             ?>
             </td>
         </tr>
         <tr>
            <?php 

                  $so = $p -> view_tanghientai_bybenhnhan($row['MaBenhNhan']);
                  if($so){
                     if(mysql_num_rows($so)){
                        while($cot9 = mysql_fetch_assoc($so)){
                           echo "<input type='hidden' name='sotanght' value='".$cot9['SoTang']."'>";
                        }
                     }
                  }
                  echo "<td><input type='hidden' name='TenBVHT' value='".$row['TenBV']."'></td>";

               }
            }
         }

             ?>
         </tr>
         <tr>
            <td><h4>Hãy chọn tầng nếu có thay đổi</h4></td>
            <td><select name="cboTang" onChange="myFunction();">
                  <option value="">Chọn tầng điều trị</option>
                  <?php
                     
                     $phieudexuat = $dx -> view_phieudexuat_by_id($maphieu);
                     //var_dump($phieudexuat);
                     if($phieudexuat){
                        while ($row_phieudx = mysql_fetch_assoc($phieudexuat)) {
                           //$sotang_phieu = $row_phieudx['TangDeXuat'];
                           if($dstang){
                        if(mysql_num_rows($dstang)){
                           while($row1 = mysql_fetch_assoc($dstang)){
                              if(($row_phieudx['TangDeXuat'] != $row1['SoTang'])){
                              ?>
                              <option value="<?php echo $row1['SoTang']; ?>" <?php if(isset($_POST['cboTang'])&&$_POST['cboTang']==$row1['SoTang']) {echo "selected"; $temp = 0;}  ?>>Tầng <?php echo $row1['SoTang'] ?></option>
                              <?php 
                              }
                              elseif($row_phieudx['TangDeXuat'] == $row1['SoTang']){
                                 if (isset($temp) && $temp == 0) {
                                    echo "<option value='".$row1['SoTang']."'>Tầng ".$row1['SoTang']."</option>";
                                 }else{
                                    echo "<option value='".$row1['SoTang']."' selected>Tầng ".$row1['SoTang']."</option>";
                                    $sotang_phieu = $row_phieudx['TangDeXuat'];
                                 }
                                 
                              }
                           }
                        }
                     }
                        }
                     }
                     
                  
                  ?>  
               </select></td>
         </tr>
         <tr>
            <?php
               if(isset($_REQUEST['cboTang']) || isset($sotang_phieu)){
                  if(isset($_REQUEST['cboTang'])){
                     $idtang = $_REQUEST['cboTang'];
                  }else{
                     $idtang = $sotang_phieu;
                  }
                  echo "<td><h4>Hãy chọn bệnh viện nếu có thay đổi</h3></td>";
                  echo "<td><select name='MaBV'>";
               }
                     $phieudexuat_tenbv = $dx -> view_phieudexuat_by_id($maphieu);
                     //var_dump($phieudexuat);
                     if($phieudexuat_tenbv){
                        while ($row_pdx_tenbv = mysql_fetch_assoc($phieudexuat_tenbv)) {
                           $mabv_phieu = $row_pdx_tenbv['MaBV'];
                           $lydo = $row_pdx_tenbv['LyDo'];
                        }
                     }
                     $dsbv = $b -> view_benhvien_by_sotang($idtang);
                     if($dsbv){
                        if(mysql_num_rows($dsbv)){
                           while($row2 = mysql_fetch_assoc($dsbv)){
                              if($mabv_phieu == $row2['MaBV']){
                                 echo "<option value='".$row2['MaBV']."' selected>".$row2['TenBV']."- Số lượng hiện tại:".$row2['SoLuongBenhNhan']." - Tối đa: ".$row2['SoGiuongToiDa']."</option>";
                              }else{
                              ?>
                              <option value="<?php echo $row2['MaBV'] ?>"><?php echo $row2['TenBV'] ?> - Số lượng hiện tại:<?php echo $row2['SoLuongBenhNhan']." - Tối đa: ".$row2['SoGiuongToiDa'];  ?></option>
                              <?php
                              }
                           }
                        }
                     }

                   ?>
               </select></td>
         </tr>
         <tr>
            <td><h4>Nhập lý do chuyển viện</h4></td>
            <td><textarea name="lydo" cols="47" rows="10"><?php echo $lydo; ?></textarea></td>
            <td><input type="hidden" name="maphieu" value="<?php echo $maphieu; ?>"></td>
         </tr>
         <tr>
            <td></td>
            <td><input type="checkbox" name="check">Xác nhận cập nhật thông tin</td>
         </tr>
         <tr>
            <td></td>
            <td><input type="submit" name="submit" value="CẬP NHẬT">
            <!-- <input type="reset" name="reset" value="Nhập lại"> --></td>
         </tr>
      </table>
   </form>
   <br><br><br>
</div>
   <?php 

      include_once("Controller/cPhieudexuat.php");
      if(isset($_REQUEST['submit']) && ($_REQUEST['check'] != "")){
         $maphieu = $_REQUEST['maphieu'];
         $tangdx = $_REQUEST['cboTang'];
         $lydo = $_REQUEST['lydo'];
         $MaBVDX = $_REQUEST['MaBV'] ;
         $capnhat = new cPhieudexuat();
         $kq = $capnhat -> capnhat_phieudexuat($maphieu,$tangdx,$lydo,$MaBVDX);
         //hiện thông báo
            if($kq == 1){
               echo "<script>alert('Cập nhật thành công, phiếu đề xuất đã được lưu vào hệ thống')</script>";
               //echo header("refresh:0; url='index.php?dexuat");
               echo "<script>window.location.href = 'index.php?dexuat';</script>";
            }else{
              //echo "<script>alert('Đề xuất chuyển không thành công')</script>";
         //echo "<script>window.location.href = 'index.php?insertdxchuyen&&mabn='".$MaBenhNhan."'';</script>";
            }
         }else{
            echo "<script>window.location.href = 'index.php?updatedxchuyen&&mabn=".$_REQUEST['mabn']."&&maphieu=".$maphieu."#tang';</script>";  
         }
         
    ?>