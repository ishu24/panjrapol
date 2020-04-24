<?php 

class State
{
	private $_State_id;
	private $_State_name;

	public function set_State_id($State_id)
	{
		$this->_State_id=$State_id;
	}
	public function get_State_id()
	{
		return $this->_State_id;
	}
	public function set_State_name($State_name)
	{
		$this->_State_name = $State_name;
	}
	public function get_State_name()
	{
		return $this->_State_name;
	}

	public function select()
	{
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="SELECT * FROM `state_detail`";
		$data=mysqli_query($conn,$qry);
		return $data;
	}
	public function select1($sid)
	{
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="SELECT * FROM `state_detail` WHERE `State_id`='$sid'";
		$data=mysqli_query($conn,$qry);
		return $data;
	}
	public function select2($snm)
	{
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="SELECT * FROM `state_detail` WHERE `State_name`='$snm'";
		$data=mysqli_query($conn,$qry);
		return $data;
	}
	public function sel($start,$limit)
	{
			$conn=new mysqli("localhost","root","","panjrapol1");
			$qry="SELECT * FROM `state_detail` limit $start,$limit";
			$data=mysqli_query($conn,$qry);
			//echo $qry;
			return $data;
	}
	public function insert(State $rec)
	{
		
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="INSERT INTO `state_detail`(`State_name`) VALUES ('".$rec->get_State_name()."')";
		$data=mysqli_query($conn,$qry);
		//echo $qry;
	}
	public function update(State $rec)
	{
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="UPDATE `state_detail` SET `State_name`='".$rec->get_State_name()."' WHERE `State_id`=".$rec->get_State_id()."";
		$data=mysqli_query($conn,$qry);
		//echo $qry;
	}
	public function delete(State $rec)
	{
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="DELETE FROM `state_detail` WHERE `State_id`=".$rec->get_State_id();
		$data=mysqli_query($conn,$qry);
		//echo $qry;	
	}

}
?>