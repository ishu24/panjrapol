
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
								$rec=$obj6->select2($a);
								while ($result=mysqli_fetch_array($rec))
								{
									$Evidencemenu=$result[2];
		$arraymenu=explode(',', $Evidencemenu);
										 	$data.="
										 		<tr>
										 		<td class='col-sm-2 bg1'>Image</td>
										 		<td>";
										 		foreach($arraymenu as $array_menu)
	                						{
												$data.="
												
												<embed src='".$array_menu."' height='100' width='100'>&nbsp;&nbsp;&nbsp;&nbsp;
												";
											}
										 		$data.="</td>
										 		</tr>
										 		<tr>
										 		<td class='col-sm-2 bg1'>Video</td>
											<td ><video width='120' height='150' controls>
  										<source src='".$result[3]."' type='video/mp4'>
  
											</video></td>
										 		
										 		
										 		</tr>
										 		";
								}
	$data.="</table></div>";
	echo $data;
?>
