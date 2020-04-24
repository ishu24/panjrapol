<?php 

class City
{
	private $_City_id;
	private $_City_name;
	private $_State_id;

	public function set_City_id($City_id)
	{
		$this->_City_id=$City_id;
	}
	public function get_City_id()
	{
		return $this->_City_id;
	}
	public function set_City_name($City_name)
	{
		$this->_City_name = $City_name;
	}
	public function get_City_name()
	{
		return $this->_City_name;
	}
	public function set_State_id($State_id)
	{
		$this->_State_id=$State_id;
	}
	public function get_State_id()
	{
		return $this->_State_id;
	}
	
	public function select()
	{
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="SELECT * FROM `city_detail`";
		$data=mysqli_query($conn,$qry);
		return $data;
	}
	public function select1($cid)
	{
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="SELECT * FROM `city_detail` WHERE `City_id`='$cid'";
		$data=mysqli_query($conn,$qry);
		return $data;
		//echo $data;
	}
	public function select2($sid)
	{
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="SELECT * FROM `city_detail` WHERE `State_id`='$sid'";
		$data=mysqli_query($conn,$qry);
		return $data;
		//echo $data;
	}
	public function select3($cnm)
	{
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="SELECT * FROM `city_detail` WHERE `City_name`='$cnm'";
		$data=mysqli_query($conn,$qry);
		return $data;
	}
	public function sel($start,$limit)
	{
			$conn=new mysqli("localhost","root","","panjrapol1");
			$qry="SELECT * FROM `city_detail` limit $start,$limit";
			$data=mysqli_query($conn,$qry);
			//echo $qry;
			return $data;
	}
	public function insert(City $rec)
	{
		
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="INSERT INTO `city_detail`(`City_name`,`State_id`) VALUES ('".$rec->get_City_name()."',".$rec->get_State_id().")";
		$data=mysqli_query($conn,$qry);
		//echo $qry;
	}
	public function update(City $rec)
	{
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="UPDATE `city_detail` SET `City_name`='".$rec->get_City_name()."',`State_id`=".$rec->get_State_id()." WHERE `City_id`=".$rec->get_City_id()."";
		$data=mysqli_query($conn,$qry);
		//echo $qry;
	}
	public function delete(City $rec)
	{
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="DELETE FROM `city_detail` WHERE `City_id`=".$rec->get_City_id();
		$data=mysqli_query($conn,$qry);
		//echo $qry;	
	}

}
?>