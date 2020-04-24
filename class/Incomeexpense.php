<?php 

class Incomeexpense
{
	private $_Incomeexpense_id;
	private $_Panjrapol_id;
	private $_Year;
	private $_Donation_recevied;
	private $_Donation_recevied1;
	private $_Subsidy;
	private $_Dividend;
	private $_Other_income;
	private $_Capital_income;
	private $_Total_income;
	private $_Grasswater_expense;
	private $_Administration_expense;
	private $_Advertisement_expense;
	private $_Construction_expense;
	private $_Total_expense;
	private $_Net_surplus;
	private $_Investment;
	private $_Savings;
	private $_Shares;
	private $_Total_investment;
	private $_Audit_report_certificate;

	public function set_Incomeexpense_id($Incomeexpense_id)
	{
		$this->_Incomeexpense_id = $Incomeexpense_id;
	}
	public function get_Incomeexpense_id()
	{
		return $this->_Incomeexpense_id;
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
	public function set_Donation_recevied($Donation_recevied)
	{
		$this->_Donation_recevied=$Donation_recevied;
	}
	public function get_Donation_recevied()
	{
		return $this->_Donation_recevied;
	}
	public function set_Donation_recevied1($Donation_recevied1)
	{
		$this->_Donation_recevied1=$Donation_recevied1;
	}
	public function get_Donation_recevied1()
	{
		return $this->_Donation_recevied1;
	}
	public function set_Subsidy($Subsidy)
	{
		$this->_Subsidy=$Subsidy;
	}
	public function get_Subsidy()
	{
		return $this->_Subsidy;
	}
	public function set_Dividend($Dividend)
	{
		$this->_Dividend=$Dividend;
	}
	public function get_Dividend()
	{
		return $this->_Dividend;
	}
	public function set_Other_income($Other_income)
	{
		$this->_Other_income=$Other_income;
	}
	public function get_Other_income()
	{
		return $this->_Other_income;
	}
	public function set_Capital_income($Capital_income)
	{
		$this->_Capital_income=$Capital_income;
	}
	public function get_Capital_income()
	{
		return $this->_Capital_income;
	}
	public function set_Total_income($Total_income)
	{
		$this->_Total_income=$Total_income;
	}
	public function get_Total_income()
	{
		return $this->_Total_income;
	}
	public function set_Grasswater_expense($Grasswater_expense)
	{
		$this->_Grasswater_expense=$Grasswater_expense;
	}
	public function get_Grasswater_expense()
	{
		return $this->_Grasswater_expense;
	}
	public function set_Administration_expense($Administration_expense)
	{
		$this->_Administration_expense=$Administration_expense;
	}
	public function get_Administration_expense()
	{
		return $this->_Administration_expense;
	}
	public function set_Advertisement_expense($Advertisement_expense)
	{
		$this->_Advertisement_expense=$Advertisement_expense;
	}
	public function get_Advertisement_expense()
	{
		return $this->_Advertisement_expense;
	}
	public function set_Construction_expense($Construction_expense)
	{
		$this->_Construction_expense=$Construction_expense;
	}
	public function get_Construction_expense()
	{
		return $this->_Construction_expense;
	}
	public function set_Total_expense($Total_expense)
	{
		$this->_Total_expense=$Total_expense;
	}
	public function get_Total_expense()
	{
		return $this->_Total_expense;
	}
	public function set_Net_surplus($Net_surplus)
	{
		$this->_Net_surplus=$Net_surplus;
	}
	public function get_Net_surplus()
	{
		return $this->_Net_surplus;
	}
	public function set_Investment($Investment)
	{
		$this->_Investment=$Investment;
	}
	public function get_Investment()
	{
		return $this->_Investment;
	}
	public function set_Savings($Savings)
	{
		$this->_Savings=$Savings;
	}
	public function get_Savings()
	{
		return $this->_Savings;
	}
	public function set_Shares($Shares)
	{
		$this->_Shares=$Shares;
	}
	public function get_Shares()
	{
		return $this->_Shares;
	}
	public function set_Total_investment($Total_investment)
	{
		$this->_Total_investment=$Total_investment;
	}
	public function get_Total_investment()
	{
		return $this->_Total_investment;
	}
	public function set_Audit_report_certificate($Audit_report_certificate)
	{
		$this->_Audit_report_certificate=$Audit_report_certificate;
	}
	public function get_Audit_report_certificate()
	{
		return $this->_Audit_report_certificate;
	}

	public function select()
	{
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="SELECT * FROM `incomeexpense_detail`";
		$data=mysqli_query($conn,$qry);
		return $data;
	}
	public function select1($ieid)
	{
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="SELECT * FROM `incomeexpense_detail` WHERE `Incomeexpense_id`='$ieid'";
		$data=mysqli_query($conn,$qry);
		return $data;
	}
	public function select2($pid)
	{
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="SELECT * FROM `incomeexpense_detail` WHERE `Panjrapol_id`='$pid'";
		$data=mysqli_query($conn,$qry);
		return $data;
		//echo $data;
	}
	public function select3($pid,$yr)
	{
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="SELECT * FROM `incomeexpense_detail` WHERE `Panjrapol_id`='$pid' and `Year`='$yr'";
		$data=mysqli_query($conn,$qry);
		return $data;
		//echo $data;
	}
	public function sel($start,$limit)
	{
			$conn=new mysqli("localhost","root","","panjrapol1");
			$qry="SELECT * FROM `incomeexpense_detail` limit $start,$limit";
			$data=mysqli_query($conn,$qry);
			//echo $qry;
			return $data;
	}
	public function insert(Incomeexpense $rec)
	{
		
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="INSERT INTO `incomeexpense_detail`(`Panjrapol_id`,`Year`,`Donation_recevied`,`Donation_recevied1`,`Subsidy`,`Dividend`,`Other_income`,`Capital_income`,`Total_income`,`Grasswater_expense`,`Administration_expense`,`Advertisement_expense`,`Construction_expense`,`Total_expense`,`Net_surplus`,`Investment`,`Savings`,`Shares`,`Total_investment`,`Audit_report_certificate`) VALUES (".$rec->get_Panjrapol_Id().",'".$rec->get_Year()."','".$rec->get_Donation_recevied()."','".$rec->get_Donation_recevied1()."','".$rec->get_Subsidy()."','".$rec->get_Dividend()."','".$rec->get_Other_income()."','".$rec->get_Capital_income()."','".$rec->get_Total_income()."','".$rec->get_Grasswater_expense()."','".$rec->get_Administration_expense()."','".$rec->get_Advertisement_expense()."','".$rec->get_Construction_expense()."','".$rec->get_Total_expense()."','".$rec->get_Net_surplus()."','".$rec->get_Investment()."','".$rec->get_Savings()."','".$rec->get_Shares()."','".$rec->get_Total_investment()."','".$rec->get_Audit_report_certificate()."')";
		$data=mysqli_query($conn,$qry);
		//echo $qry;
	}
	public function update(Incomeexpense $rec)
	{
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="UPDATE `incomeexpense_detail` SET `Year`='".$rec->get_Year()."',`Donation_recevied`='".$rec->get_Donation_recevied()."',`Donation_recevied1`='".$rec->get_Donation_recevied1()."',`Subsidy`='".$rec->get_Subsidy()."',`Dividend`='".$rec->get_Dividend()."',`Other_income`='".$rec->get_Other_income()."',`Capital_income`='".$rec->get_Capital_income()."',`Total_income`='".$rec->get_Total_income()."',`Grasswater_expense`='".$rec->get_Grasswater_expense()."',`Administration_expense`='".$rec->get_Administration_expense()."',`Advertisement_expense`='".$rec->get_Advertisement_expense()."',`Construction_expense`='".$rec->get_Construction_expense()."',`Total_expense`='".$rec->get_Total_expense()."',`Net_surplus`='".$rec->get_Net_surplus()."',`Investment`='".$rec->get_Investment()."',`Savings`='".$rec->get_Savings()."',`Shares`='".$rec->get_Shares()."',`Total_investment`='".$rec->get_Total_investment()."',`Audit_report_certificate`='".$rec->get_Audit_report_certificate()."' WHERE `Incomeexpense_id`=".$rec->get_Incomeexpense_id();
		$data=mysqli_query($conn,$qry);
		//echo $qry;
	}
	public function delete(Incomeexpense $rec)
	{
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="DELETE FROM `incomeexpense_detail` WHERE `Panjrapol_id`=".$rec->get_Panjrapol_Id()." and `Year`='".$rec->get_Year()."'";
		$data=mysqli_query($conn,$qry);
		echo $qry;	
	}
	
}
?>