<?php 

class Bank
{
	private $_Bank_id;
	private $_Panjrapol_id;
	private $_Bank_name;
	private $_Branch_name;
	private $_IFSC;
	private $_Acc_no;

	public function set_Bank_id($Bank_id)
	{
		$this->_Bank_id=$Bank_id;
	}
	public function get_Bank_id()
	{
		return $this->_Bank_id;
	}
	public function set_Panjrapol_id($Panjrapol_id)
	{
		$this->_Panjrapol_id=$Panjrapol_id;
	}
	public function get_Panjrapol_id()
	{
		return $this->_Panjrapol_id;
	}
	public function set_Bank_name($Bank_name)
	{
		$this->_Bank_name=$Bank_name;
	}
	public function get_Bank_name()
	{
		return $this->_Bank_name;
	}
	public function set_Branch_name($Branch_name)
	{
		$this->_Branch_name=$Branch_name;
	}
	public function get_Branch_name()
	{
		return $this->_Branch_name;
	}
	public function set_IFSC($IFSC)
	{
		$this->_IFSC=$IFSC;
	}
	public function get_IFSC()
	{
		return $this->_IFSC;
	}
	public function set_Acc_no($Acc_no)
	{
		$this->_Acc_no=$Acc_no;
	}
	public function get_Acc_no()
	{
		return $this->_Acc_no;
	}

	public function select()
	{
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="SELECT * FROM `bank_detail`";
		$data=mysqli_query($conn,$qry);
		return $data;
	}
	public function select1($bid)
	{
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="SELECT * FROM `bank_detail` WHERE `Bank_id`='$bid'";
		$data=mysqli_query($conn,$qry);
		return $data;
	}
	public function select2($pid)
	{
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="SELECT * FROM `bank_detail` WHERE `Panjrapol_id`='$pid'";
		$data=mysqli_query($conn,$qry);
		return $data;
		//echo $data;
	}
	public function sel($start,$limit)
	{
			$conn=new mysqli("localhost","root","","panjrapol1");
			$qry="SELECT * FROM `bank_detail` limit $start,$limit";
			$data=mysqli_query($conn,$qry);
			//echo $qry;
			return $data;
	}
	public function insert(Bank $rec)
	{
		
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="INSERT INTO `bank_detail`(`Panjrapol_id`,`Bank_name`,`Branch_name`,`IFSC`,`Acc_no`) VALUES (".$rec->get_Panjrapol_Id().",'".$rec->get_Bank_name()."','".$rec->get_Branch_name()."','".$rec->get_IFSC()."','".$rec->get_Acc_no()."')";
		$data=mysqli_query($conn,$qry);
		//echo $qry;
	}
	public function update(Bank $rec)
	{
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="UPDATE `bank_detail` SET `Bank_name`='".$rec->get_Bank_name()."',`Branch_name`='".$rec->get_Branch_name()."',`IFSC`='".$rec->get_IFSC()."',`Acc_no`='".$rec->get_Acc_no()."' WHERE `Bank_id`=".$rec->get_Bank_id();
		$data=mysqli_query($conn,$qry);
		//echo $qry;
	}
	public function delete(Bank $rec)
	{
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="DELETE FROM `bank_detail` WHERE `Bank_id`=".$rec->get_Bank_id();
		$data=mysqli_query($conn,$qry);
		//echo $qry;	
	}
}
?>