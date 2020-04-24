
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
$a=$_GET["q"];

	$data="
			<div class='form-group'>
		<table class='table bg'>
										 	
				";
								$rec=$obj5->select2($a);
								while ($result=mysqli_fetch_array($rec))
								{
									
									$rec1=$obj1->select1($result[5]);
									while ($result1=mysqli_fetch_array($rec1)) 
									{
										$rec2=$obj2->select1($result1[2]);
										while ($result2=mysqli_fetch_array($rec2))
										 {
										 	$data.="
										 		<tr>
										 		<td class='col-sm-2 bg1'>Trustee</td>
										 		<td>".$result[1]."</td>
										 		<td class='col-sm-2 bg1'>Position</td>
										 		<td>".$result[3]."</td>
										 		</tr>

										 		<tr>
										 		<td class='col-sm-2 bg1'>Address </td>
										 		<td colspan='3'>".$result[4].",".$result1[1].",".$result2[1]."</td>
										 		</tr>
										 		
										 		<tr>
										 		<td class='col-sm-3 bg1'>Mobile No.</td>
										 		<td>".$result[6]."</td>
										 		<td class='col-sm-3 bg1'>Validity</td>
										 		<td>".$result[7]."</td>

										 		</tr>
										 		<tr>
										 		<td colspan='4'>-------------------------------------------------------------------------------------------------------------</td>
										 		</tr>

										 		";
										 }
									}
								}
	$data.="</table></div>";
	echo $data;
?>
