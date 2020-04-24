<?php 

class Property
{
	private $_Property_id;
	private $_Panjrapol_id;
	private $_Area_sq_ft;
	private $_Evidence;
	private $_Installed_capacity;
	private $_State_id;
	private $_City_id;

	public function set_Property_id($Property_id)
	{
		$this->_Property_id=$Property_id;
	}
	public function get_Property_id()
	{
		return $this->_Property_id;
	}
	public function set_Panjrapol_id($Panjrapol_id)
	{
		$this->_Panjrapol_id=$Panjrapol_id;
	}
	public function get_Panjrapol_id()
	{
		return $this->_Panjrapol_id;
	}
	public function set_Area_sq_ft($Area_sq_ft)
	{
		$this->_Area_sq_ft=$Area_sq_ft;
	}
	public function get_Area_sq_ft()
	{
		return $this->_Area_sq_ft;
	}
	public function set_Evidence($Evidence)
	{
		$this->_Evidence=$Evidence;
	}
	public function get_Evidence()
	{
		return $this->_Evidence;
	}
	public function set_Installed_capacity($Installed_capacity)
	{
		$this->_Installed_capacity=$Installed_capacity;
	}
	public function get_Installed_capacity()
	{
		return $this->_Installed_capacity;
	}
	public function set_State_id($State_id)
	{
		$this->_State_id=$State_id;
	}
	public function get_State_id()
	{
		return $this->_State_id;
	}
	public function set_City_id($City_id)
	{
		$this->_City_id=$City_id;
	}
	public function get_City_id()
	{
		return $this->_City_id;
	}

	public function select()
	{
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="SELECT * FROM `property_detail`";
		$data=mysqli_query($conn,$qry);
		return $data;
	}
	public function select1($proid)
	{
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="SELECT * FROM `property_detail` WHERE `Property_id`='$proid'";
		$data=mysqli_query($conn,$qry);
		return $data;
	}
	public function select2($pid)
	{
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="SELECT * FROM `property_detail` WHERE `Panjrapol_id`='$pid'";
		$data=mysqli_query($conn,$qry);
		return $data;
		//echo $data;
	}
	public function sel($start,$limit)
	{
			$conn=new mysqli("localhost","root","","panjrapol1");
			$qry="SELECT * FROM `property_detail` limit $start,$limit";
			$data=mysqli_query($conn,$qry);
			//echo $qry;
			return $data;
	}
	public function insert(Property $rec)
	{
		
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="INSERT INTO `property_detail`(`Panjrapol_id`,`Area_sq_ft`,`Evidence`,`Installed_capacity`,`State_id`,`City_id`) VALUES (".$rec->get_Panjrapol_Id().",'".$rec->get_Area_sq_ft()."','".$rec->get_Evidence()."','".$rec->get_Installed_capacity()."',".$rec->get_State_id().",".$rec->get_City_id().")";
		$data=mysqli_query($conn,$qry);
		//echo $qry;
	}
	public function update(Property $rec)
	{
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="UPDATE `property_detail` SET `Area_sq_ft`='".$rec->get_Area_sq_ft()."',`Evidence`='".$rec->get_Evidence()."',`Installed_capacity`='".$rec->get_Installed_capacity()."',`State_id`=".$rec->get_State_id().",`City_id`=".$rec->get_City_id()." WHERE `Property_id`=".$rec->get_Property_id();
		$data=mysqli_query($conn,$qry);
		//echo $qry;
	}
	public function delete(Property $rec)
	{
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="DELETE FROM `property_detail` WHERE `Property_id`=".$rec->get_Property_id();
		$data=mysqli_query($conn,$qry);
		//echo $qry;	
	}
}
?>