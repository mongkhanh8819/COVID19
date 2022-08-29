<?php

    include("Controller/ccanboyte.php");

    $p = new ccanboytephuong();
    $table = $p-> view_canboytephuong();

    $dem = 0;
    echo "<h2 STYLE='text-align:center'>QUẢN LÝ CÁN BỘ Y TẾ PHƯỜNG </h2>";
    echo "<h3 STYLE='text-align:right'><a href='index.php?themcanboyte'>Thêm cán bộ y tế mới</a></h3>";
    echo "<table style='width:100%'>";
    echo "<tr style='background-color:aqua'>";
    echo "<th>Mã Cán Bộ Y Tế</th>";
    echo "<th>Tên Cán Bộ Y Tế</th>";
    echo "<th>Số điện thoại</th>";
    echo "<th>Địa chỉ</th>";
    echo "<th>Đơn vị công tác </th>";
    echo "<th>Email</th>";
    echo "<th>Action</th>";
    echo "</tr>";
    if($table){
        if(mysql_num_rows($table)){
            while($row = mysql_fetch_assoc($table)){
                echo "<tr>";
                echo "<td>".$row['MaCBYTP']."</td>";
                echo "<td>".$row['TenCBYTP']."</td>";
                echo "<td >".$row['SoDienThoai']."</td>";
                echo "<td >".$row['DiaChi']."</td>";
                echo "<td >".$row['DonViCongTac']."</td>";
                echo "<td >".$row['Email']."</td>";
                echo "<td ><a href='index.php?updatecb&&macb=".$row['MaCBYTP']."'>Sửa</a></td>";
                echo "</tr>";
            }
        }
    }
    echo "</table>";






?>