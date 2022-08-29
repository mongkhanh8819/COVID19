<?php 

    class ketnoi{
        function moketnoi(&$conn){
            // $dbHost = "localhost";
            // $dbUser = $tenDN;
            // $dbPass = $pass;

            //echo $user_conn;
            $conn = mysql_connect("localhost","covid","123456");
            //echo $conn;
            mysql_set_charset('utf8');
            if($conn){
                return mysql_select_db("htdieuphoibncovid");
                //echo "Connected successfully";
            }else{
                return false;
            }
        }
        function dongketnoi($conn){
            mysql_close($conn);
        }
    }

 ?>