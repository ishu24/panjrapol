<?php 

class Panjrapol
{
	private $_Panjrapol_id;
	private $_Panjrapol_name;
	private $_State_id;
	private $_City_id;
	private $_District;
	private $_Address;
	private $_Pincode;
	private $_Foundation_year;
	private $_Charity_commisioner;
	private $_Registration_no;
	private $_Registration_date;
	private $_Charity_commisinor_certificate;
	private $_Trust_dead_certificate;
	private $_Registration_no12A;
	private $_Registration_date12A;
	private $_Income_tax_12Acertificate;
	private $_Registration_no80G;
	private $_Registration_date80G;
	private $_Income_tax_80Gcertificate;
	private $_Pan_no;
	private $_Pancard_certificate;
	private $_Pancard_date;
	private $_Email;
	private $_Mobile_no;
	private $_Is_allow;
	

	public function set_Panjrapol_id($Panjrapol_id)
	{
		$this->_Panjrapol_id=$Panjrapol_id;
	}
	public function get_Panjrapol_id()
	{
		return $this->_Panjrapol_id;
	}
	public function set_Panjrapol_name($Panjrapol_name)
	{
		$this->_Panjrapol_name = $Panjrapol_name;
	}
	public function get_Panjrapol_name()
	{
		return $this->_Panjrapol_name;
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
	public function set_District($District)
	{
		$this->_District=$District;
	}
	public function get_District()
	{
		return $this->_District;
	}
	public function set_Address($Address)
	{
		$this->_Address=$Address;
	}
	public function get_Address()
	{
		return $this->_Address;
	}
	public function set_Pincode($Pincode)
	{
		$this->_Pincode=$Pincode;
	}
	public function get_Pincode()
	{
		return $this->_Pincode;
	}
	public function set_Foundation_year($Foundation_year)
	{
		$this->_Foundation_year=$Foundation_year;
	}
	public function get_Foundation_year()
	{
		return $this->_Foundation_year;
	}
	public function set_Charity_commisioner($Charity_commisioner)
	{
		$this->_Charity_commisioner=$Charity_commisioner;
	}
	public function get_Charity_commisioner()
	{
		return $this->_Charity_commisioner;
	}
	public function set_Registration_no($Registration_no)
	{
		$this->_Registration_no=$Registration_no;
	}
	public function get_Registration_no()
	{
		return $this->_Registration_no;
	}
	public function set_Registration_date($Registration_date)
	{
		$this->_Registration_date=$Registration_date;
	}
	public function get_Registration_date()
	{
		return $this->_Registration_date;
	}
	public function set_Charity_commisioner_certificate($Charity_commisioner_certificate)
	{
		$this->_Charity_commisioner_certificate=$Charity_commisioner_certificate;
	}
	public function get_Charity_commisioner_certificate()
	{
		return $this->_Charity_commisioner_certificate;
	}
	public function set_Trust_dead_certificate($Trust_dead_certificate)
	{
		$this->_Trust_dead_certificate=$Trust_dead_certificate;
	}
	public function get_Trust_dead_certificate()
	{
		return $this->_Trust_dead_certificate;
	}
	public function set_Registration_no12A($Registration_no12A)
	{
		$this->_Registration_no12A=$Registration_no12A;
	}
	public function get_Registration_no12A()
	{
		return $this->_Registration_no12A;
	}
	public function set_Registration_date12A($Registration_date12A)
	{
		$this->_Registration_date12A=$Registration_date12A;
	}
	public function get_Registration_date12A()
	{
		return $this->_Registration_date12A;
	}
	public function set_Income_tax_12Acertificate($Income_tax_12Acertificate)
	{
		$this->_Income_tax_12Acertificate=$Income_tax_12Acertificate;
	}
	public function get_Income_tax_12Acertificate()
	{
		return $this->_Income_tax_12Acertificate;
	}
	public function set_Registration_no80G($Registration_no80G)
	{
		$this->_Registration_no80G=$Registration_no80G;
	}
	public function get_Registration_no80G()
	{
		return $this->_Registration_no80G;
	}
	public function set_Registration_date80G($Registration_date80G)
	{
		$this->_Registration_date80G=$Registration_date80G;
	}
	public function get_Registration_date80G()
	{
		return $this->_Registration_date80G;
	}
	public function set_Income_tax_80Gcertificate($Income_tax_80Gcertificate)
	{
		$this->_Income_tax_80Gcertificate=$Income_tax_80Gcertificate;
	}
	public function get_Income_tax_80Gcertificate()
	{
		return $this->_Income_tax_80Gcertificate;
	}
	public function set_Pan_no($Pan_no)
	{
		$this->_Pan_no=$Pan_no;
	}
	public function get_Pan_no()
	{
		return $this->_Pan_no;
	}
	public function set_Pancard_date($Pancard_date)
	{
		$this->_Pancard_date=$Pancard_date;
	}
	public function get_Pancard_date()
	{
		return $this->_Pancard_date;
	}
	public function set_Pancard_certificate($Pancard_certificate)
	{
		$this->_Pancard_certificate=$Pancard_certificate;
	}
	public function get_Pancard_certificate()
	{
		return $this->_Pancard_certificate;
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
	public function set_Is_allow($Is_allow) {
		$this->_Is_allow = $Is_allow;
	}
	public function get_Is_allow() {
		return $this->_Is_allow;
	}
	
	

	public function select()
	{
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="SELECT * FROM `panjrapol_detail`";
		$data=mysqli_query($conn,$qry);
		return $data;
	}
	public function select1($pid)
	{
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="SELECT * FROM `panjrapol_detail` WHERE `Panjrapol_id`='$pid'";
		$data=mysqli_query($conn,$qry);
		return $data;
		echo $data;
	}
	public function select2($cid)
	{
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="SELECT * FROM `panjrapol_detail` WHERE `City_id`='$cid'";
		$data=mysqli_query($conn,$qry);
		return $data;
		//echo $data;
	}
	public function select3($sid)
	{
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="SELECT * FROM `panjrapol_detail` WHERE `State_id`='$sid'";
		$data=mysqli_query($conn,$qry);
		return $data;
		//echo $data;
	}
	public function select4($ch)
	{
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="SELECT * FROM `panjrapol_detail` WHERE `Panjrapol_name` LIKE '$ch%'";
		$data=mysqli_query($conn,$qry);
		return $data;
		//echo $data;
	}
	public function sel($start,$limit)
	{
			$conn=new mysqli("localhost","root","","panjrapol1");
			$qry="SELECT * FROM `panjrapol_detail` limit $start,$limit";
			$data=mysqli_query($conn,$qry);
			//echo $qry;
			return $data;
	}
	public function selectmax(){
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="SELECT max(Panjrapol_id) FROM `panjrapol_detail`";
		$data=mysqli_query($conn,$qry);
		return $data;
		//echo $qry;
	}
	public function insert(Panjrapol $rec)
	{
		
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="INSERT INTO `panjrapol_detail`(`Panjrapol_name`,`State_id`,`City_id`,`District`,`Address`,`Pincode`,`Foundation_year`,`Registration_no`,`Registration_date`,`Charity_commisioner_certificate`,`Registration_no12A`,`Registration_date12A`,`Income_tax_12Acertificate`,`Registration_no80G`,`Registration_date80G`,`Income_tax_80Gcertificate`,`Pan_no`,`Pancard_date`,`Pancard_certificate`,`Email`,`Mobile_no`) VALUES ('".$rec->get_Panjrapol_name()."',".$rec->get_State_id().",".$rec->get_City_id().",'".$rec->get_District()."','".$rec->get_Address()."','".$rec->get_Pincode()."','".$rec->get_Foundation_year()."','".$rec->get_Registration_no()."','".$rec->get_Registration_date()."','".$rec->get_Charity_commisioner_certificate()."','".$rec->get_Registration_no12A()."','".$rec->get_Registration_date12A()."','".$rec->get_Income_tax_12Acertificate()."','".$rec->get_Registration_no80G()."','".$rec->get_Registration_date80G()."','".$rec->get_Income_tax_80Gcertificate()."','".$rec->get_Pan_no()."','".$rec->get_Pancard_date()."','".$rec->get_Pancard_certificate()."','".$rec->get_Email()."','".$rec->get_Mobile_no()."')";
		$data=mysqli_query($conn,$qry);
		//echo $qry;
	}
	public function update(Panjrapol $rec)
	{
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="UPDATE `panjrapol_detail` SET `Panjrapol_name`='".$rec->get_Panjrapol_name()."',`State_id`=".$rec->get_State_id().",`City_id`=".$rec->get_City_id().",`District`='".$rec->get_District()."',`Address`='".$rec->get_Address()."',`Pincode`='".$rec->get_Pincode()."',`Foundation_year`='".$rec->get_Foundation_year()."',`Registration_no`='".$rec->get_Registration_no()."',`Registration_date`='".$rec->get_Registration_date()."',`Charity_commisioner_certificate`='".$rec->get_Charity_commisioner_certificate()."',`Registration_no12A`='".$rec->get_Registration_no12A()."',`Registration_date12A`='".$rec->get_Registration_date12A()."',`Income_tax_12Acertificate`='".$rec->get_Income_tax_12Acertificate()."',`Registration_no80G`='".$rec->get_Registration_no80G()."',`Registration_date80G`='".$rec->get_Registration_date80G()."',`Income_tax_80Gcertificate`='".$rec->get_Income_tax_80Gcertificate()."',`Pan_no`='".$rec->get_Pan_no()."',`Pancard_date`='".$rec->get_Pancard_date()."',`Pancard_certificate`='".$rec->get_Pancard_certificate()."',`Email`='".$rec->get_Email()."',`Mobile_no`='".$rec->get_Mobile_no()."' WHERE `Panjrapol_id`=".$rec->get_Panjrapol_id();
		$data=mysqli_query($conn,$qry);
		//echo $qry;
	}
	public function update1(Panjrapol $rec)
	{
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="UPDATE `panjrapol_detail` SET `Is_allow`='".$rec->get_Is_allow()."'";
		$data=mysqli_query($conn,$qry);
		echo $qry;
	}
	public function delete(Panjrapol $rec)
	{
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="DELETE FROM `panjrapol_detail` WHERE `Panjrapol_id`=".$rec->get_Panjrapol_id();
		$data=mysqli_query($conn,$qry);
		//echo $qry;	
	}
}
?>