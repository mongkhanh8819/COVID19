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
      <h3>THÔNG TIN BỆNH NHÂN VÀ PHIẾU ĐỀ XUẤT</h3>
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
         <tr><td><h3>DUYỆT PHIẾU ĐỀ XUẤT</h3></td></tr>
         <tr>
            <td><h4>Bệnh nhân sẽ được chuyển đến</h4></td>
            <td>
            <?php 

                  $thongtinphieu = $dx -> view_phieudexuat_by_id($maphieu);

                  if($thongtinphieu){
                     if(mysql_num_rows($thongtinphieu)){
                        while ($ttphieu = mysql_fetch_assoc($thongtinphieu)) {
                           echo "Tầng ".$ttphieu['TangDeXuat']." - ".$ttphieu['TenBV'];
                           echo "<td><input type='hidden' name='MaBVMoi' value='".$ttphieu['MaBV']."'></td>";
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
            <td></td>
            <td><input type="radio" name="check" value="2">Xác nhận tiếp nhận bệnh nhân
               <input type="radio" name="check" value="3">Xác nhận không tiếp nhận bệnh nhân</td>
         </tr>
         <tr>
            <td></td>
            <td><input type="submit" name="submit" value="XÁC NHẬN" onClick="return confirm_dexuat()">
            <!-- <input type="reset" name="reset" value="Nhập lại"> --></td>
         </tr>
      </table>
   </form>
   <br><br><br>
</div>
   <?php 

      include_once("Controller/cPhieudexuat.php");
      if(isset($_REQUEST['submit']) && ($_REQUEST['check'] != "")){
         $trangthaiduyet = $_REQUEST['check'];
         $tenbv = $_REQUEST['TenBVHT'];
         $mabv = $_REQUEST['MaBVMoi'];
         // $lydo = $_REQUEST['lydo'];
         // $MaBVDX = $_REQUEST['MaBV'] ;
         $duyet = new cPhieudexuat();
         $kq = $duyet -> duyet_phieudexuat($maphieu,$trangthaiduyet);
         //hiện thông báo
            if($kq == 1){
               if($trangthaiduyet == 2){
                  $up_tang = $b -> control_capnhat_soluong_tang($mabv);
                  $up_giam = $b -> control_capnhat_soluong_giam($tenbv);
                  // if(!$up_giam && !$up_tang){
                  //    echo "<script>alert('như nào')</script>";
                  // }
               }
               echo "<script>alert('Cập nhật thành công, phiếu đề xuất đã được lưu vào hệ thống')</script>";
               //echo header("refresh:0; url='index.php?dexuat");
               echo "<script>window.location.href = 'index.php?dexuat';</script>";
            }else{
              //echo "<script>alert('Đề xuất chuyển không thành công')</script>";
         //echo "<script>window.location.href = 'index.php?insertdxchuyen&&mabn='".$MaBenhNhan."'';</script>";
            }
         }else{
            echo "<script>window.location.href = 'index.php?duyetdxchuyen&&mabn=".$_REQUEST['mabn']."&&maphieu=".$maphieu."#tang';</script>";  
         }
         
    ?>