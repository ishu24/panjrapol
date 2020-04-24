
<style type="text/css">
	.bg{
	background:rgba(0,0,0,0.3);
	padding: 10px;
	color: #fff;
	font-size: 15px;
	font-weight: bold;
}
.bg1{
	color:#e1d41f;
}
</style>
<!-- banner -->
<?php
include_once("../class/Panjrapol.php");
$obj=new Panjrapol();
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
								$rec=$obj4->select2($a);
								while ($result=mysqli_fetch_array($rec))
								{
									
										 	$data.="
										 		<tr>
										 		<td class='col-sm-3 bg1'>Bank Name</td>
										 		<td>".$result[2]."</td>
										 		
										 		<td class='col-sm-3 bg1'>Branch Name</td>
										 		<td>".$result[3]."</td>
										 		</tr>

										 		<tr>
										 		<td class='col-sm-3 bg1'>IFSC</td>
										 		<td>".$result[4]."</td>
										 		
										 		<td class='col-sm-3 bg1'>Acc.No.</td>
										 		<td>".$result[5]."</td>
										 		</tr>
										 		<tr>
										 		<td colspan='4'>-------------------------------------------------------------------------------------------------------------</td>
										 		</tr>
										 		";
										
								}
	$data.="</table></div>";
	echo $data;
?>
