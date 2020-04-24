
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
include_once("../class/Property.php");
$obj7=new Property();
$a=$_GET["q"];

	$data="
			<div class='form-group'>
		<table class='table bg'>
										 	
				";
								$rec7=$obj7->select2($a);
								while ($result7=mysqli_fetch_array($rec7))
								{
									$Evidencemenu=$result7[3];
									$arraymenu=explode(',', $Evidencemenu);
										 	$data.="	<tr>
										 		<td class='col-sm-2 bg1''>Area Sq.ft</td>
										 		<td>".$result7[2]." Sq.ft</td>
										 		
										 		<td class='col-sm-2 bg1''>Installed capacity</td>
										 		<td>".$result7[4]."</td>
										 		</tr>";
										 		if($Evidencemenu!=""){
										 			$data.="<tr>
										 		<td class='col-sm-2 bg1'>Property Evidence</td>
										 		<td colspan='3'>";
										 		foreach($arraymenu as $array_menu)
	                						{
												$data.="
												
												<embed class='fancybox' src='".$array_menu."' height='100' width='100'>&nbsp;&nbsp;
												";
											}
										 		$data.="</td>
										 		</tr>";
										 	
										 		}
										 		
										 				$data.="<tr>
										 		<td colspan='4'>------------------------------------------------------------------------------------------------------</td>
										 		</tr>
										 		";
								}
	$data.="</table></div>";
	echo $data;
?>
