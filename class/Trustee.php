<?php 

class Trustee
{
	private $_Trustee_id;
	private $_Trustee_name;
	private $_Panjrapol_id;
	private $_Position;
	private $_Address;
	private $_City_id;
	private $_Mobile_no;
	private $_Validity_term;

	public function set_Trustee_id($Trustee_id)
	{
		$this->_Trustee_id=$Trustee_id;
	}
	public function get_Trustee_id()
	{
		return $this->_Trustee_id;
	}
	public function set_Trustee_name($Trustee_name)
	{
		$this->_Trustee_name=$Trustee_name;
	}
	public function get_Trustee_name()
	{
		return $this->_Trustee_name;
	}
	public function set_Panjrapol_id($Panjrapol_id)
	{
		$this->_Panjrapol_id=$Panjrapol_id;
	}
	public function get_Panjrapol_id()
	{
		return $this->_Panjrapol_id;
	}
	public function set_Position($Position)
	{
		$this->_Position=$Position;
	}
	public function get_Position()
	{
		return $this->_Position;
	}
	public function set_Address($Address)
	{
		$this->_Address=$Address;
	}
	public function get_Address()
	{
		return $this->_Address;
	}
	public function set_City_id($City_id)
	{
		$this->_City_id=$City_id;
	}
	public function get_City_id()
	{
		return $this->_City_id;
	}
	public function set_Mobile_no($Mobile_no)
	{
		$this->_Mobile_no=$Mobile_no;
	}
	public function get_Mobile_no()
	{
		return $this->_Mobile_no;
	}
	public function set_Validity_term($Validity_term)
	{
		$this->_Validity_term=$Validity_term;
	}
	public function get_Validity_term()
	{
		return $this->_Validity_term;
	}

	public function select()
	{
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="SELECT * FROM `trustee_detail`";
		$data=mysqli_query($conn,$qry);
		return $data;
	}
	public function select1($tid)
	{
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="SELECT * FROM `trustee_detail` WHERE `Trustee_id`='$tid'";
		$data=mysqli_query($conn,$qry);
		return $data;
	}
	public function select2($pid)
	{
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="SELECT * FROM `trustee_detail` WHERE `Panjrapol_id`='$pid'";
		$data=mysqli_query($conn,$qry);
		return $data;
		//echo $data;
	}
	public function sel($start,$limit)
	{
			$conn=new mysqli("localhost","root","","panjrapol1");
			$qry="SELECT * FROM `trustee_detail` limit $start,$limit";
			$data=mysqli_query($conn,$qry);
			//echo $qry;
			return $data;
	}
	public function insert(Trustee $rec)
	{
		
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="INSERT INTO `trustee_detail`(`Trustee_name`,`Panjrapol_id`,`Position`,`Address`,`City_id`,`Mobile_no`,`Validity_term`) VALUES ('".$rec->get_Trustee_name()."',".$rec->get_Panjrapol_Id().",'".$rec->get_Position()."','".$rec->get_Address()."',".$rec->get_City_id().",'".$rec->get_Mobile_no()."','".$rec->get_Validity_term()."')";
		$data=mysqli_query($conn,$qry);
		//echo $qry;
	}
	public function update(Trustee $rec)
	{
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="UPDATE `trustee_detail` SET `Trustee_name`='".$rec->get_Trustee_name()."',`Position`='".$rec->get_Position()."',`Address`='".$rec->get_Address()."',`City_id`=".$rec->get_City_id().",`Mobile_no`='".$rec->get_Mobile_no()."',`Validity_term`='".$rec->get_Validity_term()."' WHERE `Trustee_id`=".$rec->get_Trustee_id();
		$data=mysqli_query($conn,$qry);
		//echo $qry;
	}
	public function delete(Trustee $rec)
	{
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="DELETE FROM `trustee_detail` WHERE `Trustee_id`=".$rec->get_Trustee_id();
		$data=mysqli_query($conn,$qry);
		//echo $qry;	
	}
}
?>