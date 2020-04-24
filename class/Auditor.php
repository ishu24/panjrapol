<?php 

class Auditor
{
	private $_Auditor_id;
	private $_Panjrapol_id;	
	private $_Auditor_name;
	private $_City_id;
	private $_CA_registration_no;
	private $_Mobile_no;
	private $_Email;
	private $_Password;

	public function set_Auditor_id($Auditor_id)
	{
		$this->_Auditor_id=$Auditor_id;
	}
	public function get_Auditor_id()
	{
		return $this->_Auditor_id;
	}
	public function set_Panjrapol_id($Panjrapol_id)
	{
		$this->_Panjrapol_id=$Panjrapol_id;
	}
	public function get_Panjrapol_id()
	{
		return $this->_Panjrapol_id;
	}
	public function set_Auditor_name($Auditor_name) {
		$this->_Auditor_name = $Auditor_name;
	}
	public function get_Auditor_name() {
		return $this->_Auditor_name;
	}
	public function set_City_id($City_id)
	{
		$this->_City_id=$City_id;
	}
	public function get_City_id()
	{
		return $this->_City_id;
	}
	public function set_CA_registration_no($CA_registration_no) {
		$this->_CA_registration_no = $CA_registration_no;
	}
	public function get_CA_registration_no() {
		return $this->_CA_registration_no;
	}
	public function set_Mobile_no($Mobile_no) {
		$this->_Mobile_no = $Mobile_no;
	}
	public function get_Mobile_no() {
		return $this->_Mobile_no;
	}
	public function set_Email($Email) {
		$this->_Email = $Email;
	}
	public function get_Email() {
		return $this->_Email;
	}
	public function set_Password($Password) {
		$this->_Password = $Password;
	}
	public function get_Password() {
		return $this->_Password;
	}

	public function display($Aid){
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="SELECT Auditor_name FROM `auditor_detail` WHERE `Auditor_id`='$Aid'";
		$data=mysqli_query($conn,$qry);
		return $data;
		//echo $qry;
	}
	public function display1($Aid){
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="SELECT * FROM `auditor_detail` WHERE `Auditor_id`='$Aid'";
		$data=mysqli_query($conn,$qry);
		return $data;
		//echo $qry;
	}
	public function sel($start,$limit)
	{
			$conn=new mysqli("localhost","root","","panjrapol1");
			$qry="SELECT * FROM `auditor_detail` limit $start,$limit";
			$data=mysqli_query($conn,$qry);
			//echo $qry;
			return $data;
	}
	public function select(){
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="SELECT * FROM `auditor_detail`";
		$data=mysqli_query($conn,$qry);
		return $data;
		//echo $qry;
	}
	public function select1($pid){
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="SELECT * FROM `auditor_detail` where `Panjrapol_id`='$pid'";
		$data=mysqli_query($conn,$qry);
		return $data;
		//echo $qry;
	}
	public function Checklogin($email,$password)
	{
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="SELECT * FROM `auditor_detail` WHERE `Email`='$email' and `Password`='$password'";
		$data=mysqli_query($conn,$qry);
		return $data;
	}
	public function insert(Auditor $rec)
	{
		
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="INSERT INTO `auditor_detail`(`Panjrapol_id`,`Auditor_name`,`City_id`,`CA_registration_no`,`Mobile_no`,`Email`,`Password`) VALUES (".$rec->get_Panjrapol_id().",'".$rec->get_Auditor_name()."',".$rec->get_City_id().",'".$rec->get_CA_registration_no()."','".$rec->get_Mobile_no()."','".$rec->get_Email()."','".$rec->get_Password()."')";
		$data=mysqli_query($conn,$qry);
		//echo $qry;
	}
	public function update(Auditor $rec)
	{
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="UPDATE `auditor_detail` SET `Auditor_name`='".$rec->get_Auditor_name()."',`City_id`=".$rec->get_City_id().",`CA_registration_no`='".$rec->get_CA_registration_no()."',`Mobile_no`='".$rec->get_Mobile_no()."' WHERE `Auditor_id`=".$rec->get_Auditor_id();
		$data=mysqli_query($conn,$qry);
		//echo $qry;
	}
	public function delete(Auditor $rec)
	{
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="DELETE FROM `auditor_detail` WHERE `Auditor_id`=".$rec->get_Auditor_id();
		$data=mysqli_query($conn,$qry);
		//echo $qry;	
	}

}
 ?>
