<?php
    
    session_start();
//  $_SESSION['username'] = "admin";
//  $_SESSION['password'] = "123456";
    //var_dump($_SESSION['dn']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang điều phối bệnh nhân</title>
    <link rel="stylesheet" type="text/css" href="CSS/style1.css"/>
    <style>
        a{
            text-decoration: none;
            font-size: 24px;
        }
        .dangnhap{
            background-image: url("IMG/background.jpeg");
            background-size: cover;
            background-repeat: no-repeat;
        }
        .menu ul
        {
            margin-top:  20px;padding-left: 0px;
        }
        .menu ul li
        {
            list-style-type: none;
            display: inline;
            margin-left: 50px;
        }
        input[type=text], input[type=password], select, textarea {
            width: 90%;
            padding: 12px;
            border: 2px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }

        label {
            padding: 12px 12px 12px 0;
            display: inline-block;
        }

        input[type=submit] {
          background-color: #58257b;
          color: white;
          padding: 12px 20px;
          border: none;
          border-radius: 4px;
          cursor: pointer;
          float: left;
        }

        input[type=submit]:hover {
          background-color: #45a049;
        }

        /*.container {
          border-radius: 5px;
          background-color: #f2f2f2;
          padding: 20px;
        }*/

        .col-25 {
          float: left;
          width: 25%;
          margin-top: 6px;
        }

        .col-75 {
          float: left;
          width: 75%;
          margin-top: 6px;
        }

        .row:after {
          content: "";
          display: table;
          clear: both;
        }

        /* Bố cục linh hoạt: khi màn hình có chiều rộng dưới 600px thì hai cột chồng 
        lên nhau thay vì nằm cạnh nhau */
        @media screen and (max-width: 600px) {
          .col-25, .col-75, input[type=submit] {
            width: 100%;
            margin-top: 0;
        }
        select {
            width: 100%;
            padding: 16px 20px;
            border: none;
            border-radius: 4px;
            background-color: #f1f1f1;
        }
        .tb{
            background-color: red;
            color: white;
        }
    </style>
    <script type="text/javascript" src="JS/script.js"/>
    </script>
</head>
<body>
    <?php
        
        if(($_SESSION['dn']) == false){

            include("View/dangnhap.php");
            
        }
        elseif(isset($_SESSION['dn']) && $_SESSION['dn'] == true){
            
                ?>
    <div class="container">
        <div class="header">
            <div class="top-header">
                <div id="logan">HÃY GIỮ AN TOÀN CHO BẠN, GIA ĐÌNH VÀ CỘNG ĐỒNG TRƯỚC ĐẠI DỊCH COVID-19</div>
            </div>
            <div class="content">
                <div id="logo"><img src="IMG/image 1.png" height="80"/></div>
                <div id="title">ChiEmCovid</div>
                <div id="logo2"><img src="IMG/image 2.png"height="110"/></div>
                <div id="contact"><b style="padding-left: 50px;">HOTLINE</b>: 19006868 <br> <b>Email</b>: chiemcaykhe@gmail.com</div>
            </div>
        </div>
            <div class="nav">
                <ul>
                    <!-- <li><a href="../index.html">TRANG CHỦ</a></li> -->
                    <li><a href="index.php?dexuat">ĐỀ XUẤT CHUYỂN BỆNH NHÂN</a></li>
                    <li><a href="index.php?tiepnhan">TIẾP NHẬN BỆNH NHÂN</a></li>
                    <?php 

                        if(($_SESSION['dn']) == true){
                            echo "<li><a href='VIEW/dangxuat.php' onclick='return dangxuat();'>ĐĂNG XUẤT</a></li>";
                            echo "<li>";
                            include_once("View/vNhanvienbenhvien.php");
                            echo "</li>";
                    }
                ?>
            </ul>
            </div>
            <div class="session" style="height: 100%;">
                <!-- <div id="ar_left"> -->
                    <?php 

                    if(isset($_REQUEST['dexuat'])){
                        include("View/vDanhsachbenhnhan.php");
                    }
                    elseif(isset($_REQUEST['tiepnhan'])){
                        include("View/vGiaodientiepnhan.php");
                    }
                    elseif(isset($_REQUEST['insertdxchuyen'])){
                        include("View/vInsertPhieuDeXuat.php"); 
                    }
                    elseif(isset($_REQUEST['updatedxchuyen'])){
                        include("View/vUpdatePhieuDeXuat.php");
                    }
                    elseif(isset($_REQUEST['duyetdxchuyen'])){
                        include("View/vDuyetPhieuDeXuat.php");
                    }
                    elseif(isset($_REQUEST['xoadxchuyen'])){
                        include("View/vDelete_Phieudx.php");
                    }
                    else{
                        //print_r(getdate());
                        $t=time();
                        ($t . "<br>");
                        $thoigian = (date("Y-m-d",$t));  
                        //$thoigian;                  
                        include_once("Controller/cPhieudexuat.php");
                        $r = new cPhieudexuat();
                        $time = $r -> view_phieudexuat_tiepnhan();
                        $tb = 0;
                        if($time){
                            if(mysql_num_rows($time)>0){
                                while($rowtime = mysql_fetch_assoc($time)){
                                    //echo(date("Y-m-d",$rowtime['ThoiGianLapPhieu'])); 
                                    // echo "<br>";
                                     $kq = explode(' ',$rowtime['ThoiGianLapPhieu']);
                                     if($kq[0] == $thoigian){
                                        $tb++;
                                     }    
                                }
                                if($tb >= 1){
                                    echo "<div class='tb' style='background-color: red;
            color: white; text-indent:150px'>BỆNH VIỆN HIỆN CÓ ".$tb." PHIẾU ĐỀ XUẤT CÓ THỂ DUYỆT!!</div>";
                                }
                            }
                        }
                        echo "<img src='IMG/dieu-tri-covi-de-5-tang-tphcm.jpg' width='100%'; height='500px'/>";
                    }


                    ?>
                <!-- </div> -->
            </div>
            <div class="footer">
            <div id="ft_contact"><b style="padding-left: 50px;">HOTLINE</b>: 19006868 <br> <b>Email</b>: chiemcaykhe@gmail.com</div>
            <div class="ft_nav">
                <ul>
                    <li>Hướng dẫn</li>
                    <li>Tư vấn - Hỗ trợ</li>
                    <li>Điều khoản sử dụng</li>
                </ul>
            </div>
        </div>
        <?php
                
            
        }
        else{
            echo header("refresh:0,url='index.php'");
        }
        //
        
    
        ?>
    </div>
</body>
</html>