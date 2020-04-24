<?php 

class Image
{
	private $_Image_id;
	private $_Panjrapol_id;
	private $_Images;
	private $_Video;
	private $_Request;
	private $_Event;

	public function set_Image_id($Image_id)
	{
		$this->_Image_id=$Image_id;
	}
	public function get_Image_id()
	{
		return $this->_Image_id;
	}
	public function set_Panjrapol_id($Panjrapol_id)
	{
		$this->_Panjrapol_id=$Panjrapol_id;
	}
	public function get_Panjrapol_id()
	{
		return $this->_Panjrapol_id;
	}
	public function set_Images($Images)
	{
		$this->_Images = $Images;
	}
	public function get_Images()
	{
		return $this->_Images;
	}
	public function set_Video($Video)
	{
		$this->_Video=$Video;
	}
	public function get_Video()
	{
		return $this->_Video;
	}
	public function set_Request($Request)
	{
		$this->_Request=$Request;
	}
	public function get_Request()
	{
		return $this->_Request;
	}
	public function set_Event($Event)
	{
		$this->_Event=$Event;
	}
	public function get_Event()
	{
		return $this->_Event;
	}
	
	public function select()
	{
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="SELECT * FROM `image_detail`";
		$data=mysqli_query($conn,$qry);
		return $data;
	}
	public function select1($bid)
	{
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="SELECT * FROM `image_detail` WHERE `Image_id`='$bid'";
		$data=mysqli_query($conn,$qry);
		return $data;
	}
	public function select2($pid)
	{
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="SELECT * FROM `image_detail` WHERE `Panjrapol_id`='$pid'";
		$data=mysqli_query($conn,$qry);
		return $data;
		//echo $data;
	}
	public function sel($start,$limit)
	{
			$conn=new mysqli("localhost","root","","panjrapol1");
			$qry="SELECT * FROM `image_detail` limit $start,$limit";
			$data=mysqli_query($conn,$qry);
			//echo $qry;
			return $data;
	}
	public function insert(Image $rec)
	{
		
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="INSERT INTO `image_detail`(`Panjrapol_id`,`Images`,`Video`,`Request`,`Event`) VALUES (".$rec->get_Panjrapol_Id().",'".$rec->get_Images()."','".$rec->get_Video()."','".$rec->get_Request()."','".$rec->get_Event()."')";
		$data=mysqli_query($conn,$qry);
		//echo $qry;
	}
	public function update(Image $rec)
	{
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="UPDATE `image_detail` SET `Images`='".$rec->get_Images()."',`Video`='".$rec->get_Video()."',`Request`='".$rec->get_Request()."',`Event`='".$rec->get_Event()."' WHERE `Image_id`=".$rec->get_Image_id();
		$data=mysqli_query($conn,$qry);
		//echo $qry;
	}
	public function delete(Image $rec)
	{
		$conn=new mysqli("localhost","root","","panjrapol1");
		$qry="DELETE FROM `image_detail` WHERE `Image_id`=".$rec->get_Image_id();
		$data=mysqli_query($conn,$qry);
		//echo $qry;	
	}


}
?>