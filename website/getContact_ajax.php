
<style type="text/css">
	.bg{
	background:rgba(0,0,0,0.3);
	padding: 20px;
	color: #fff;
	font-weight: bold;
	font-size: 15px;
}
.bg1{
	color:#e1d41f;
}
</style>
<!-- banner -->
<?php
include_once("../class/Panjrapol.php");
$obj=new Panjrapol();
include_once("../class/City.php");
$obj1=new City();
include_once("../class/State.php");
$obj2=new State();
include_once("../class/Animal.php");
$obj3=new Animal();
include_once("../class/Bank.php");
$obj4=new Bank();
include_once("../class/Trustee.php");
$obj5=new Trustee();
include_once("../class/Image.php");
$obj6=new Image();
include_once("../class/Property.php");
$obj7=new Property();
include_once("../class/Contact.php");
$obj8=new Contact();
$a=$_GET["q"];

	$data="
			<div class='form-group'>
		<table class='table bg'>
										 	
				";
								$rec=$obj8->select2($a);
								while ($result=mysqli_fetch_array($rec))
								{
									
										 	$data.="
										 		<tr>
										 		
										 		
										 		<td colspan='1' class='col-sm-3'>".$result[2]."</td>
										 		
										 		<td class='col-sm-1 bg1'>Name</td>
										 		<td class='col-sm-2'>".$result[3]."</td>
										 		
										 		<td class='col-sm-1 bg1'>Contact No.</td>
										 		<td class='col-sm-2'>".$result[4]."</td>
										 		</tr>
										 		";
										 	
								}
	$data.="</table></div>";
	echo $data;
?>
