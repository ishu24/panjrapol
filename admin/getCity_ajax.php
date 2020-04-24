
<?php
include_once("../class/City.php");
$obj=new City();
$a=$_GET["q"];
$rec=$obj->select2($a);

	$data="<select name='optCt' id='optCity' class='form-control' required >
										<option value=''>------Select City------</option>";
										while ($result=mysqli_fetch_array($rec))
											{

												$data.="<option value='".$result[0]."'>".$result[1]."</option>";
											}
										
									$data.="</select>";
									echo $data;
?>
