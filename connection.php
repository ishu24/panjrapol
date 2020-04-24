<?php

	class connection

	{

		var $con,$sql,$res;

		function connect()

		{

			$this->con=mysqli_connect("204.93.216.11","shraman_panjara","Panjarapole#108","shraman_panjarapole");

			/*$this->db=mysql_select_db("emagazine",$this->con);*/

		}

		function select_query($str)

		{

			$this->sql=$str;

			$this->res=mysqli_query($this->con,$this->sql);

		}

		function insert_update_delete($str)

		{

			$this->sql=$str;

			mysqli_query($this->con,$this->sql);

		}

	}

?>

