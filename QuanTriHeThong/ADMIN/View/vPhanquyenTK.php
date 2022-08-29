<div>
	<?php

    include("Controller/cTaikhoan.php");

    $p = new cTaikhoan();
    $table = $p-> view_taikhoan();

    echo "<h2 STYLE='text-align:center'>PHÂN QUYỀN TÀI KHOẢN CÔNG VỤ</h2>";
    echo "<h6 STYLE='text-align:center'>Loại tài khoản 1 - Tài khoản của NVBV</h6>";
    echo "<h6 STYLE='text-align:center'>Loại tài khoản 2 - Tài khoản của CBYTP</h6>";
    echo "<h6 STYLE='text-align:center'>Loại tài khoản 3 - Tài khoản của ADMIN</h6>";
    echo "<table style='width:100%'>";
    echo "<tr>";
    echo "<th>Mã tài khoản</th>";
    echo "<th>Password</th>";
    echo "<th>Loại tài khoản</th>";
    echo "<th>Phân quyền tài khoản</th>";
    echo "</tr>";
    if($table){
        if(mysql_num_rows($table)){
            while($row = mysql_fetch_assoc($table)){
                echo "<tr>";
                echo "<td>".$row['MaTK']."</td>";
                echo "<td>".$row['password']."</td>";
                echo "<td >".$row['phanquyen']."</td>";
                echo "<td><a href='index.php?updatequyen&&matk=".$row['MaTK']."'>Chỉnh sửa quyền</a></td>";
                echo "</tr>";
            }
        }
    }
    echo "</table>";






?>
</div>