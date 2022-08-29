<?php 

   include_once("Controller/cBenhnhan.php");
   include_once("Controller/cTang.php");
   include_once("Controller/cBenhvien.php");
   $mabn = $_SESSION['MaBenhNhan'];
   //echo $mabn;
   $p = new cBenhnhan();
   $a = new cTang();
   $b = new cBenhvien();
   $table = $p-> view_benhnhan_hinhthucdieutri($mabn);
   $sotang1 = $p -> view_tanghientai_bybenhnhan($mabn);
  

 ?>
<div style="width: 90%; margin: auto;"><br>
   <h2 id="tang" style="text-align: center;">HÌNH THỨC ĐIỀU TRỊ</h2>
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
                  
                  echo "</tr>";
                  
                }
             }  
                  
       ?>
   </table>
   <table style="margin: auto;text-align: left; width: 49%; float:right;">
         <tr><td><h3>LỰA CHỌN HÌNH THỨC ĐIỀU TRỊ</h3></td></tr>
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
            
         

             ?>
         </tr>
         <tr>
            <td><h4>Chọn hình thức điều trị</h4></td>
            <td><select name="cboHT" onChange="myFunction();">
                  <option value="">Chọn hình thức</option>
                  <?php
                  
                  ?>
                  <option value="3" <?php if(isset($_POST['cboHT'])&&$_POST['cboHT']==3) echo "selected" ?>> Tại nhà</option>
                  <option value="1" <?php if(isset($_POST['cboHT'])&&$_POST['cboHT']==1) echo "selected" ?>>Tại cơ sở y tế</option>
                              <?php 
                  
                  ?>  
               </select></td>
         </tr>
         <tr>
            <?php
               if(isset($_POST['cboHT']) && $_POST['cboHT'] == 1){
                  //$idtang = $_POST['cboTang'];
                  echo "<td><h4>Hãy chọn bệnh viện tại tầng 1:</h3></td>";
                  echo "<td><select name='MaBV'>";
               
                     $dsbv = $b -> view_benhvien_by_sotang(1);
                     if($dsbv){
                        if(mysql_num_rows($dsbv)){
                           while($row2 = mysql_fetch_assoc($dsbv)){
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
            <td></td>
            <td><input type="checkbox" name="check">Xác nhận cập nhật thông tin</td>
         </tr>
      </form>
         <tr>
            <td></td>
            <td><input type="submit" name="submit" value="XÁC NHẬN ĐIỀU TRỊ">
            <!-- <input type="reset" name="reset" value="Nhập lại"> --></td>
         </tr>
   </table>
   </form>
   <br><br><br>
   <?php 

      include("Controller/cPhieuyeucau.php");
      if(isset($_REQUEST['submit']) && ($_REQUEST['cboHT'] == 1) && $_REQUEST['check'] != ""){
         
         $MaBV = $_REQUEST['MaBV'];
         $MaBenhNhan = $_SESSION['MaBenhNhan'];
         $them = new cPhieuyeucau();
         $kq = $them -> them_phieuyeucau($MaBenhNhan,$MaBV);
         //hiện thông báo
            if($kq == 1){
               echo "<script>alert('Lựa chọn thành công!')</script>";
               //echo header("refresh:0; url='index.php");
               echo "<script>window.location.href = 'index.php';</script>";
            }else{
              //echo "<script>alert('Đề xuất chuyển không thành công')</script>";
         //echo "<script>window.location.href = 'index.php?insertdxchuyen&&mabn='".$MaBenhNhan."'';</script>";
            }
         }
         elseif (isset($_REQUEST['submit']) && ($_REQUEST['cboHT'] == 3 && $_REQUEST['check'] != "")) {
            $MaBenhNhan = $_SESSION['MaBenhNhan'];
            $ketqua = $p -> capnhat_HTDT_TaiNha($MaBenhNhan);
            //hiện thông báo
            if($ketqua == 1){
               echo "<script>alert('Lựa chọn thành công!')</script>";
               //echo header("refresh:0; url='index.php");
               echo "<script>window.location.href = 'index.php';</script>";
            }else{
              //echo "<script>alert('Đề xuất chuyển không thành công')</script>";
            //echo "<script>window.location.href = 'index.php?insertdxchuyen&&mabn='".$MaBenhNhan."'';</script>";
            }
         }
         else{
            //echo "<script>window.location.href = 'index.php?insertdxchuyen&&mabn=".$_REQUEST['mabn']."#tang';</script>";  
         }
         
    ?>
</div>