<?php 

class Animal
{
	private $_Animal_id;
	private $_Panjrapol_id;
	private $_Year;
	private $_Role;
	private $_Big;
	private $_Small;

	public function set_Animal_id($Animal_id)
	{
		$this->_Animal_id=$Animal_id;
	}
	public function get_Animal_id()
	{
		return $this->_Animal_id;
	}
	public function set_Panjrapol_id($Panjrapol_id)
	{
		$this->_Panjrapol_id=$Panjrapol_id;
	}
	public function get_Panjrapol_id()
	{
		return $this->_Panjrapol_id;
	}
	public function set_Year($Year)
	{
		$this->_Year=$Year;
	}
	public function get_Year()
	{
		return $this->_Year;
	}
	public function set_Role($Role)
	{
		$this->_Role=$Role;
	}
	public function get_Role()
	{
		return $this->_Role;
	}
	public function set_Big($Big)
	{
		$this->_Big=$Big;
	}
	public function get_Big()
	{
		return $this->_Big;
	}
	public function set_Small($Small)
	{
		$this->_Small=$Small;
	}
	public function get_Small()
	{
		return $this->_Small;
	}

	public function select()
	{
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="SELECT * FROM `animal_detail`";
		$data=mysqli_query($conn,$qry);
		return $data;
	}
	public function select1($aid)
	{
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="SELECT * FROM `animal_detail` WHERE `Animal_id`='$aid'";
		$data=mysqli_query($conn,$qry);
		return $data;
	}
	public function select2($pid)
	{
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="SELECT * FROM `animal_detail` WHERE `Panjrapol_id`='$pid'";
		$data=mysqli_query($conn,$qry);
		return $data;
		//echo $data;
	}
	public function select3($pid,$yr)
	{
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="SELECT * FROM `animal_detail` WHERE `Panjrapol_id`='$pid' and `Year`='$yr'";
		$data=mysqli_query($conn,$qry);
		return $data;
		//echo $data;
	}
	public function sel($start,$limit)
	{
$conn=new mysqli("localhost","root","","panjrapol1");
			$qry="SELECT * FROM `animal_detail` limit $start,$limit";
			$data=mysqli_query($conn,$qry);
			//echo $qry;
			return $data;
	}
	public function insert(Animal $rec)
	{
		
$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="INSERT INTO `animal_detail`(`Panjrapol_id`,`Year`,`Role`,`Big`,`Small`) VALUES (".$rec->get_Panjrapol_Id().",'".$rec->get_Year()."','".$rec->get_Role()."','".$rec->get_Big()."','".$rec->get_Small()."')";
		$data=mysqli_query($conn,$qry);
		//echo $qry;
	}
	public function update(Animal $rec)
	{
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="UPDATE `animal_detail` SET `Year`='".$rec->get_Year()."',`Big`='".$rec->get_Big()."',`Small`='".$rec->get_Small()."' WHERE `Animal_id`=".$rec->get_Animal_id();
		$data=mysqli_query($conn,$qry);
		//echo $data;
	}
	public function delete(Animal $rec)
	{
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="DELETE FROM `animal_detail` WHERE `Animal_id`=".$rec->get_Animal_id();
		$data=mysqli_query($conn,$qry);
		//echo $qry;	
	}
}
?>