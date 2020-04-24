<?php 

class Contact
{
	private $_Contact_id;
	private $_Panjrapol_id;
	private $_Role;
	private $_Name;
	private $_Contact;

	public function set_Contact_id($Contact_id)
	{
		$this->_Contact_id=$Contact_id;
	}
	public function get_Contact_id()
	{
		return $this->_Contact_id;
	}
	public function set_Panjrapol_id($Panjrapol_id)
	{
		$this->_Panjrapol_id=$Panjrapol_id;
	}
	public function get_Panjrapol_id()
	{
		return $this->_Panjrapol_id;
	}
	public function set_Role($Role)
	{
		$this->_Role=$Role;
	}
	public function get_Role()
	{
		return $this->_Role;
	}
	public function set_Name($Name)
	{
		$this->_Name=$Name;
	}
	public function get_Name()
	{
		return $this->_Name;
	}
	public function set_Contact($Contact)
	{
		$this->_Contact=$Contact;
	}
	public function get_Contact()
	{
		return $this->_Contact;
	}

	public function select()
	{
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="SELECT * FROM `contact_detail`";
		$data=mysqli_query($conn,$qry);
		return $data;
	}
	public function select1($aid)
	{
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="SELECT * FROM `contact_detail` WHERE `contact_id`='$aid'";
		$data=mysqli_query($conn,$qry);
		return $data;
	}
	public function select2($pid)
	{
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="SELECT * FROM `contact_detail` WHERE `Panjrapol_id`='$pid'";
		$data=mysqli_query($conn,$qry);
		return $data;
		//echo $data;
	}
	public function sel($start,$limit)
	{
$conn=new mysqli("localhost","root","","panjrapol1");
			$qry="SELECT * FROM `contact_detail` limit $start,$limit";
			$data=mysqli_query($conn,$qry);
			//echo $qry;
			return $data;
	}
	public function insert(Contact $rec)
	{
		
$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="INSERT INTO `contact_detail`(`Panjrapol_id`,`Role`,`Name`,`Contact`) VALUES (".$rec->get_Panjrapol_Id().",'".$rec->get_Role()."','".$rec->get_Name()."','".$rec->get_Contact()."')";
		$data=mysqli_query($conn,$qry);
		//echo $qry;
	}
	public function update(Contact $rec)
	{
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="UPDATE `contact_detail` SET `Name`='".$rec->get_Name()."',`Contact`='".$rec->get_Contact()."' WHERE `Contact_id`=".$rec->get_Contact_id();
		$data=mysqli_query($conn,$qry);
		//echo $qry;
	}
	public function delete(Contact $rec)
	{
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="DELETE FROM `contact_detail` WHERE `Contact_id`=".$rec->get_Contact_id();
		$data=mysqli_query($conn,$qry);
		//echo $qry;	
	}
}
?>