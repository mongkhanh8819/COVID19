<div>
    <meta charset="utf-8">
    <?php 

        include_once("Controller/cPhieudexuat.php");

        $a = new cPhieudexuat();
        $phieudexuat = $a -> view_phieudexuat_tiepnhan();


    	echo "<h2 STYLE='text-align:center'>DANH SÁCH PHIẾU ĐỀ XUẤT CÓ THỂ DUYỆT</h2>";
        echo "<table style='width:100%; background-color: rgb(230,230,230); ' >";
        echo "<tr style='background-color:#07DE44'>";
        echo "<th>Mã phiếu đề xuất</th>";
        echo "<th>Thời gian lập</th>";
        echo "<th>Mã bệnh nhân</th>";
        echo "<th>Tầng hiện tại</th>";
        echo "<th>Bệnh viện hiện tại</th>";
        echo "<th>Tầng đề xuất</th>";
        echo "<th>Bệnh viện mới</th>";
        echo "<th>Trạng thái duyệt</th>";
        echo "<th>Action</th>";
        echo "</tr>";
        if($phieudexuat){
            if(mysql_num_rows($phieudexuat)){
                while($row = mysql_fetch_assoc($phieudexuat)){
                    $dem++;
                    if($dem%2==0){
                        echo "<tr>";
                    }else{
                        echo "<tr style='background-color:none'>";
                    }
                    echo "<td style='text-align:center'>".$row['MaPhieuDeXuat']."</td>";
                    echo "<td style='text-align:center'>".$row['ThoiGianLapPhieu']."</td>";
                    echo "<td style='text-align:center'>".$row['MaBenhNhan']."</td>";
                    echo "<td style='text-align:center'>".$row['TangHienTai']."</td>";
                    echo "<td style='text-align:center'>".$row['TenBV']."</td>";
                    echo "<td style='text-align:center'>".$row['TangDeXuat']."</td>";
                    echo "<td style='text-align:center'>".$row['MaBV']."</td>";
                    if($row['TrangThaiDuyet']==1){
                        echo "<td style='text-align:center'>Chờ duyệt</td>";
                    }elseif($row['TrangThaiDuyet'] == 2){
                        echo "<td style='text-align:center'>Đã duyệt</td>";
                    }else{
                        echo "<td style='text-align:center'>Không được duyệt</td>";
                    }
                    echo "<td style='text-align:center'><a style='font-size:15px' href='index.php?duyetdxchuyen&&mabn=".$row['MaBenhNhan']."&&maphieu=".$row['MaPhieuDeXuat']."'>XEM CHI TIẾT</a> | <a style='font-size:15px' href='index.php?kduyetdxchuyen&&maphieudx=".$row['MaPhieuDeXuat']."''>KHÔNG DUYỆT</a> </td>";
                    echo "</tr>";
                }
            }
        }
        echo "</table>";

     ?> 
</div>