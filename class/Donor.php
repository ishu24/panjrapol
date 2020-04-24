<?php 

class Donor
{
	private $_Donor_id;
	private $_Panjrapol_id;
	private $_Transaction_id;	
	private $_Firstname;
	private $_Lastname;
	private $_Email;
	private $_Contact;
	private $_CardNo;
	private $_Exp_Date;
	private $_Donation_Date;
	private $_Donation_Time;
	private $_Amount;

	public function set_Donor_id($Donor_id)
	{
		$this->_Donor_id=$Donor_id;
	}
	public function get_Donor_id()
	{
		return $this->_Donor_id;
	}
	public function set_Panjrapol_id($Panjrapol_id)
	{
		$this->_Panjrapol_id=$Panjrapol_id;
	}
	public function get_Panjrapol_id()
	{
		return $this->_Panjrapol_id;
	}
	public function set_Transaction_id($Transaction_id)
	{
		$this->_Transaction_id=$Transaction_id;
	}
	public function get_Transaction_id()
	{
		return $this->_Transaction_id;
	}
	public function set_Firstname($Firstname) {
		$this->_Firstname = $Firstname;
	}
	public function get_Firstname() {
		return $this->_Firstname;
	}
	public function set_Lastname($Lastname) {
		$this->_Lastname = $Lastname;
	}
	public function get_Lastname() {
		return $this->_Lastname;
	}
	public function set_Email($Email) {
		$this->_Email = $Email;
	}
	public function get_Email() {
		return $this->_Email;
	}
	public function set_Contact($Contact) {
		$this->_Contact = $Contact;
	}
	public function get_Contact() {
		return $this->_Contact;
	}
	public function set_CardNo($CardNo) {
		$this->_CardNo = $CardNo;
	}
	public function get_CardNo() {
		return $this->_CardNo;
	}
	public function set_Exp_Date($Exp_Date)
	{
		$this->_Exp_Date=$Exp_Date;
	}
	public function get_Exp_Date()
	{
		return $this->_Exp_Date;
	}
	public function set_Donation_Date($Donation_Date) {
		$this->_Donation_Date = $Donation_Date;
	}
	public function get_Donation_Date() {
		return $this->_Donation_Date;
	}
	public function set_Donation_Time($Donation_Time) {
		$this->_Donation_Time = $Donation_Time;
	}
	public function get_Donation_Time() {
		return $this->_Donation_Time;
	}
	public function set_Amount($Amount) {
		$this->_Amount = $Amount;
	}
	public function get_Amount() {
		return $this->_Amount;
	}
		
	/*public function display($Aid){
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
	public function Checklogin($email,$password)
	{
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="SELECT * FROM `auditor_detail` WHERE `Email`='$email' and `Password`='$password'";
		$data=mysqli_query($conn,$qry);
		return $data;
	}*/
	public function insert(Donor $rec)
	{
		
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="INSERT INTO `donor_detail`(`Panjrapol_id`,`Transaction_id`,`Firstname`,`Lastname`,`Email`,`Contact`,`CardNo`,`Exp_Date`,`Donation_Date`,`Donation_Time`,`Amount`) VALUES (".$rec->get_Panjrapol_id().",".$rec->get_Transaction_id().",'".$rec->get_Firstname()."','".$rec->get_Lastname()."','".$rec->get_Email()."','".$rec->get_Contact()."','".$rec->get_CardNo()."','".$rec->get_Exp_Date()."','".$rec->get_Donation_Date()."','".$rec->get_Donation_Time()."',".$rec->get_Amount().")";
		$data=mysqli_query($conn,$qry);
		//echo $qry;
	}
	/*public function update(Auditor $rec)
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
	}*/

}
 ?>
