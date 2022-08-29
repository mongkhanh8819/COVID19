<?php 

   include("Controller/cBenhnhan.php");
   include_once("Controller/cTang.php");
   include_once("Controller/cBenhvien.php");
   $mabn = $_REQUEST['mabn'];
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
<div style="width: 90%; margin: auto;"><br>
   <h2 id="tang" style="text-align: center;">PHIẾU ĐỀ XUẤT CHUYỂN BỆNH NHÂN</h2>
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
         <tr><td><h3>THÊM PHIẾU ĐỀ XUẤT</h3></td></tr>
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
            <td><h4>Hãy chọn tầng muốn chuyển</h4></td>
            <td><select name="cboTang" onChange="myFunction();">
                  <option value="">Chọn tầng điều trị</option>
                  <?php
                     

                     if($dstang){
                        if(mysql_num_rows($dstang)){
                           while($row1 = mysql_fetch_assoc($dstang)){
                              ?>
                              <option value="<?php echo $row1['SoTang']; ?>" <?php if(isset($_POST['cboTang'])&&$_POST['cboTang']==$row1['SoTang']) echo "selected" ?>>Tầng <?php echo $row1['SoTang'] ?></option>
                              <?php 
                           }
                        }
                     }
                  
                  ?>  
               </select></td>
         </tr>
         <tr>
            <?php
               if(isset($_POST['cboTang']) && $_POST['cboTang'] != ""){
                  $idtang = $_POST['cboTang'];
                  echo "<td><h4>Hãy chọn bệnh viện muốn chuyển:</h3></td>";
                  echo "<td><select name='MaBV'>";
               }
                     $dsbv = $b -> view_benhvien_by_sotang($idtang);
                     if($dsbv){
                        if(mysql_num_rows($dsbv)){
                           while($row2 = mysql_fetch_assoc($dsbv)){
                              ?>
                              <option value="<?php echo $row2['MaBV'] ?>"><?php echo $row2['TenBV'] ?> - Số lượng hiện tại:<?php echo $row2['SoLuongBenhNhan']." - Tối đa: ".$row2['SoGiuongToiDa'];  ?></option>
                              <?php 
                           }
                        }
                     }

                   ?>
               </select></td>
         </tr>
         <tr>
            <td><h4>Nhập lý do chuyển viện</h4></td>
            <td><textarea name="lydo" cols="47" rows="10"></textarea></td>
         </tr>
         <tr>
            <td></td>
            <td><input type="submit" name="submit" value="XÁC NHẬN CHUYỂN">
            <!-- <input type="reset" name="reset" value="Nhập lại"> --></td>
         </tr>
   </table>
   </form>
   <br><br><br>
</div>
   <?php 

      include("Controller/cPhieudexuat.php");
      if(isset($_REQUEST['submit']) && ($_REQUEST['lydo'] != "")){
         $tanght = $_REQUEST['sotanght'];
         $tangdx = $_REQUEST['cboTang'];
         $TenBVHT = $_REQUEST['TenBVHT'];
         //$lydo = $_REQUEST['lydo'];
         $maNVBV = $_SESSION['MaNVBV'];
         $MaBenhNhan = $_REQUEST['txtMaBN'];
         $MaBVDX = $_REQUEST['MaBV'];

         $soluongtoida = $b -> view_sogiuongtoida($MaBVDX);
         $soluongbenhnhan = $b -> view_soluongbenhnhan($MaBVDX);

         if($soluongtoida){
            while($bbb = mysql_fetch_assoc($soluongtoida)){
               $max = $bbb['SoGiuongToiDa'];
            }
         }

         if($soluongbenhnhan){
            while($bbbb = mysql_fetch_assoc($soluongbenhnhan)){
               $now = $bbbb['SoLuongBenhNhan'];
            }
         }

         $them = new cPhieudexuat();
         if ($now < $max){
            $kq = $them -> them_phieudexuat($tanght,$tangdx,$TenBVHT,$_REQUEST['lydo'],$maNVBV,$MaBenhNhan,$MaBVDX);
               //hiện thông báo
            if($kq == 1){
               echo "<script>alert('Đề xuất thành công, phiếu đề xuất đã được lưu vào hệ thống')</script>";
               //echo header("refresh:0; url='index.php");
               echo "<script>window.location.href = 'index.php?dexuat';</script>";
            }else{
               //echo "<script>alert('Đề xuất chuyển không thành công')</script>";
               //echo "<script>window.location.href = 'index.php?insertdxchuyen&&mabn='".$MaBenhNhan."'';</script>";
            }
         }else{
            echo "<script>alert('Đề xuất không thành công, bệnh viện vừa chọn hiện tại đã hết giường bệnh!!')</script>";
            echo "<script>window.location.href = 'index.php?insertdxchuyen&&mabn=".$_REQUEST['mabn']."#tang';</script>";
         }
         
   
         }
         else{
            echo "<script>window.location.href = 'index.php?insertdxchuyen&&mabn=".$_REQUEST['mabn']."#tang';</script>";  
         }
         
    ?>