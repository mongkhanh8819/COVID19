<?php

    include("Controller/cBenhvien.php");

    $p = new cBenhvien();
    $table = $p-> view_benhvien();

    $dem = 0;
    echo "<h2 STYLE='text-align:center'>QUẢN LÝ BỆNH VIỆN</h2>";
    echo "<h3 STYLE='text-align:right'><a href='index.php?thembenhvien'>Thêm bệnh viện mới</a></h3>";
    echo "<table style='width:100%'>";
    echo "<tr style='background-color:aqua'>";
    echo "<th>Mã bệnh viện</th>";
    echo "<th>Tên bệnh viện</th>";
    echo "<th>Số điện thoại</th>";
    echo "<th>Email</th>";
    echo "<th>Số lượng bệnh nhân</th>";
    echo "<th>Số giường tối đa</th>";
    echo "<th>Chức năng</th>";
    echo "<th>Số tầng</th>";
    echo "<th>Mã phường</th>";
    echo "<th>Action</th>";
    echo "</tr>";
    if($table){
        if(mysql_num_rows($table)){
            while($row = mysql_fetch_assoc($table)){
                echo "<tr>";
                echo "<td style='text-align:center'>".$row['MaBV']."</td>";
                echo "<td style='text-align:center'>".$row['TenBV']."</td>";
                echo "<td style='text-align:center'>".$row['SoDienThoai']."</td>";
                echo "<td style='text-align:center'>".$row['Email']."</td>";
                echo "<td style='text-align:center'>".$row['SoLuongBenhNhan']."</td>";
                echo "<td style='text-align:center'>".$row['SoGiuongToiDa']."</td>";
                echo "<td style='text-align:center'>".$row['DieuTri']."</td>";
                echo "<td style='text-align:center'>".$row['SoTang']."</td>";
                echo "<td style='text-align:center'>".$row['maPhuong']."</td>";
                echo "<td style='text-align:center'><a href='index.php?updatebv&&mabv=".$row['MaBV']."'>Sửa</a></td>";
                echo "</tr>";
            }
        }
    }
    echo "</table>";






?>