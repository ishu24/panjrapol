
<?php
include_once("../class/Panjrapol.php");
$obj=new Panjrapol();
$a=$_GET["q"];
$rec=$obj->select2($a);

	$data="<select name='optPn' id='optPan' class='form-control' required >
										<option value=''>------Select Panjrapol------</option>";
										while ($result=mysqli_fetch_array($rec))
											{

												$data.="<option value='".$result[0]."'>".$result[1]."</option>";
											}
										
									$data.="</select>";
									echo $data;
?>
