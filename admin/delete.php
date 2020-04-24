<?php
$id="";
if(isset($_GET["tbl"])){
	$tb=$_GET["tbl"];
	 if($tb=="animal_detail")
	{
		include_once("../class/Animal.php");
		$obj=new Animal();
		/*$checkbox = $_POST['ch']; //from name="checkbox[]"
		 $countCheck = count($_POST['ch']);
			print_r($countCheck);*/
			foreach($_POST['ch'] as $i){
				$obj->set_Animal_id($i);
				$obj->delete($obj);	
			}
		 /*for($i=0;$i<$countCheck;$i++)
		 {
		    $del_id  = $checkbox[$i];
				$obj->set_Animal_id($del_id);
				$obj->delete($obj);	
		}*/
		//echo "<script type='text/javascript'>location.href = 'displayanimal.php'</script>";
	}
}
if(isset($_GET["delete_id"]))
{
	$id=$_GET["delete_id"];
	$id1=$_GET["pid"];	
	$yr1=$_GET["yr1"];	
	$tb=$_GET["tbl"];
	if($tb=="state_detail")
	{
		include_once("../class/State.php");
		$obj=new State();
		$obj->set_State_id($id);
		$obj->delete($obj);	
		echo "<script type='text/javascript'>location.href = 'displaystate.php'</script>";
	}	
	else if($tb=="city_detail")
	{
		include_once("../class/City.php");
		$obj=new City();
		$obj->set_City_id($id);
		$obj->delete($obj);	
		echo "<script type='text/javascript'>location.href = 'displaycity.php'</script>";
	}
	else if($tb=="panjrapol_detail")
	{
		include_once("../class/Panjrapol.php");
		$obj=new Panjrapol();
		$obj->set_Panjrapol_id($id);
		$obj->delete($obj);	
		echo "<script type='text/javascript'>location.href = 'displaypanjrapol.php'</script>";
	}
	else if($tb=="property_detail")
	{
		include_once("../class/Property.php");
		$obj=new Property();
		$obj->set_Property_id($id);
		$obj->delete($obj);	
		echo "<script type='text/javascript'>location.href = 'propertyform.php?Id=".$id1."'</script>";
	}
	else if($tb=="bank_detail")
	{
		include_once("../class/Bank.php");
		$obj=new Bank();
		$obj->set_Bank_id($id);
		$obj->delete($obj);	
		echo "<script type='text/javascript'>location.href = 'bankform.php?Id=".$id1."'</script>";
	}
	else if($tb=="trustee_detail")
	{
		include_once("../class/Trustee.php");
		$obj=new Trustee();
		$obj->set_Trustee_id($id);
		$obj->delete($obj);	
		echo "<script type='text/javascript'>location.href = 'trusteeform.php?Id=".$id1."'</script>";
	}
	
	else if($tb=="incomeexpense_detail")
	{
		include_once("../class/Incomeexpense.php");
		$obj=new Incomeexpense();
		$obj->set_Panjrapol_id($id);
		$obj->set_Year($yr1);
		$obj->delete($obj);	
		//echo "<script type='text/javascript'>location.href = 'animalincomeexpform.php?Id=".$id."'</script>";
	}
	else if($tb=="image_detail")
	{
		include_once("../class/Image.php");
		$obj=new Image();
		$obj->set_Image_id($id);
		$obj->delete($obj);	
		echo "<script type='text/javascript'>location.href = 'displayimagevideo.php'</script>";
	}
	else if($tb=="auditor_detail")
	{
		include_once("../class/Auditor.php");
		$obj=new Auditor();
		$obj->set_Auditor_id($id);
		$obj->delete($obj);	
		echo "<script type='text/javascript'>location.href = 'displayauditor.php'</script>";
	}
}
?>
