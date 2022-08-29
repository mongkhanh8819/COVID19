<?php
	class tmdt
	{
		private function connect()
		{
			$con=mysql_connect("localhost","covid","123456");
			if(!$con)
			{
				echo('Không kết nối được csdl!');
				exit();
			}
			else
			{
				mysql_select_db("htdieuphoibncovid");
				mysql_query("SET NAME UTF8");
				return $con;
			}
		}
			
		public function themxoasua($sql)
		{
			$link=$this->connect();
			if(mysql_query($sql,$link))
			{
				return 1;	
			}
			else
			{
				return 0;
			}
		}
	}
?>