<?php
	include_once("header.php");
?>
<style>
.layout{
    border: none;
    background-color: #f9f9f9;
}

</style>
<script type="text/javascript">
	function delete_id(id,yr)
	{
		var r= confirm("Are you sure you want to delete?");
		
		if(r== true)
		{
			
			window.location.href='delete.php?tbl=incomeexpense_detail& delete_id='+id+'&yr1='+yr;	
		}
		
	}
</script>
<script type="text/javascript">
	$(document).ready(function() {
    //this calculates values automatically 
    sum();
    sum1();
    sum2();
    sum3();
    sum4();
    sum5();
    $("#num1, #num2, #num3, #num4").on("keydown keyup", function() {
        sum();
    });
    $("#num5, #num6, #num7, #num8").on("keydown keyup", function() {
        sum1();
    });
    $("#num9, #num10, #num11, #num12, #num13, #num14").on("keydown keyup", function() {
        sum2();
    });
    $("#num15, #num16, #num17, #num18").on("keydown keyup", function() {
        sum3();
    });
    $("#sum2, #sum3").on("keydown keyup", function() {
        sum4();
    });
    $("#num19, #num20, #num21").on("keydown keyup", function() {
        sum5();
    });
   
});
function sum6() {
            var num1 = document.getElementById("selector1").value;
			var result=num1.split('-');
           	document.getElementById("yr1").innerHTML = result[1];
			document.getElementById("yr2").innerHTML = result[0]; 
        }
function sum7() {
            var num1 = document.getElementById("selector1").value;
			var result=num1.split('-');
           	document.getElementById("yr3").innerHTML = result[1];
			document.getElementById("yr4").innerHTML = result[0]; 
        }
function sum() {
            var num1 = document.getElementById('num1').value;
            var num2 = document.getElementById('num2').value;
            var num3 = document.getElementById('num3').value;
            var num4 = document.getElementById('num4').value;
			var result = parseInt(num1) + parseInt(num2) -  parseInt(num3) - parseInt(num4);
			
            if (!isNaN(result)) {
                document.getElementById('sum').value = result;
				
            }
        }
function sum1() {
            var num5 = document.getElementById('num5').value;
            var num6 = document.getElementById('num6').value;
            var num7 = document.getElementById('num7').value;
            var num8 = document.getElementById('num8').value;
			var result = parseInt(num5) + parseInt(num6) -  parseInt(num7) - parseInt(num8);
			
            if (!isNaN(result)) {
                document.getElementById('sum1').value = result;
				
            }
        }
 function sum2() {
            var num9 = document.getElementById('num9').value;
            var num10 = document.getElementById('num10').value;
            var num11 = document.getElementById('num11').value;
            var num12 = document.getElementById('num12').value;
            var num13 = document.getElementById('num13').value;
            var num14 = document.getElementById('num14').value;
			var result = parseInt(num9) + parseInt(num10) + parseInt(num11) + parseInt(num12) + parseInt(num13) + parseInt(num14) ;
			
            if (!isNaN(result)) {
                document.getElementById('sum2').value = result;
				
            }
        }
 function sum3() {
            var num15 = document.getElementById('num15').value;
            var num16 = document.getElementById('num16').value;
            var num17 = document.getElementById('num17').value;
            var num18 = document.getElementById('num18').value;
            
			var result = parseInt(num15) + parseInt(num16) + parseInt(num17) + parseInt(num18);
			
            if (!isNaN(result)) {
                document.getElementById('sum3').value = result;
				
            }
        }
  function sum4() {
            var sum2 = document.getElementById('sum2').value;
            var sum3 = document.getElementById('sum3').value;
            
            
			var result = parseInt(sum2) - parseInt(sum3);
			
            if (!isNaN(result)) {
                document.getElementById('sum4').value = result;
				
            }
        }
function sum5() {
            var num19 = document.getElementById('num19').value;
            var num20 = document.getElementById('num20').value;
            var num21 = document.getElementById('num21').value;
            
            
			var result = parseInt(num19) + parseInt(num20) + parseInt(num21);
			
            if (!isNaN(result)) {
                document.getElementById('sum5').value = result;
				
            }
        }
</script>

<?php
include_once("../class/Panjrapol.php");
$obj=new Panjrapol();
include_once("../class/Animal.php");
$obj1=new Animal();
include_once("../class/Incomeexpense.php");
$obj2=new Incomeexpense();
$pid=$pnm=$yr=$r=$b=$s=$r4=$b4=$s4=$don=$don1=$sub=$divi=$oin=$cin=$tin=$gwexp=$adm=$adv=$cons=$texp=$net=$inv=$sav=$sha=$tinv=$file1=$a=$state=$city="";
if(isset($_GET["Id"]))
{
		$pid=$_GET["Id"];
		$rec=$obj->select1($pid);
		while($result=mysqli_fetch_array($rec))
		{
			$pnm=$result[1];
			$state=$result[2];
			$city=$result[3];
		}
		$data1='<div id="page-wrapper">
<div class="abc">
<div class="round"><a href="panjrapolform.php?Id='.$pid.'"><span style="margin-top: 20px; float: left; width: 100%;">Panjarapole<br>detail</span></a></div>
<div class="line"></div>

<div class="round" ><a href="propertyform.php?Id='.$pid.'"><span style="margin-top: 20px; float: left; width: 100%;">Property<br>detail</span></a></div>
<div class="line"></div>

<div class="round"><a href="bankform.php?Id='.$pid.'"><span style="margin-top: 20px; float: left; width: 100%;">Bank<br>detail</span></a></div>
<div class="line"></div>

<div class="round"><a href="trusteeform.php?Id='.$pid.'"><span style="margin-top: 20px; float: left; width: 100%;">Trustee<br>detail</span></a></div>
<div class="line"></div>

<div class="round" id="round"><a href="animalincomeexpform.php?Id='.$pid.'"><span>Animal<br>Income<br>Expense detail</span></a></div>
<div class="line"></div>

<div class="round"><a href="contactform.php?Id='.$pid.'"><span style="margin-top: 20px; float: left; width: 100%;">Contact<br>detail</span></a></div>
<div class="line"></div>

<div class="round"><a href="auditorform.php?Id='.$pid.'"><span style="margin-top: 20px; float: left; width: 100%;">Auditor<br>Detail</span></a></div>
<div class="line"></div>

<div class="round"><a href="imageform.php?Id='.$pid.'"><span style="margin-top: 20px; float: left; width: 100%;">Image<br>Detail</span></a></div></div>


				';
echo $data1;
$data="<br><br>
								<table class='table table-striped'>
									<thead>
										<tr class='warning'>
											<th>Panjarapole Name</th>
											<th>Year</th>
											<th>Edit/Delete Animal</th>
											<th>Edit/Delete Income-Expense</th>
											
										</tr>
									</thead>
									<tbody>";	

$date_y = date("Y");
$year =intval($date_y);
$years = $year-2;
do{
    
    	$y1=$year-1;
    	$yr="$y1-$year";
    	$data.="
										<tr>
											<td width='20%'>".$pnm."</td>
											<td width='30%'>$y1-$year</td>
											<td width='30%'>
											&nbsp;&nbsp;
											<a href='editanimal.php?Id=".$pid."&yr=$y1-$year'><i title='Edit' class='fa fa-pencil'></i> </a>&nbsp;&nbsp;
											<a href='javascript:delete_id1(".$result[0].",".$result[0].")'><i title='Delete' class='fa fa-trash-o'></i> </a>
											</td>
											<td>
											&nbsp;&nbsp;
											<a href='editincomeexp.php?Id=".$pid."&yr=$y1-$year'><i title='Edit' class='fa fa-pencil'></i> </a>
											&nbsp;&nbsp;
											<a href='javascript:delete_id(".$pid.",".$yr.")'><i title='Delete' class='fa fa-trash-o'></i> </a>
											</td>
											
										</tr>";
       
    $year--;
}while($year>=$years);
$data.="</tbody></table>";
		echo $data;		
}

if(isset($_POST["btnSub"]))
{
if(isset($_POST["optYr"]))
	{
			$yr=$_POST["optYr"];
	}
	$obj1->set_Panjrapol_id($pid);
	$obj1->set_Year($yr);
	if($yr!=""){
		for($i=0;$i<=4;$i++)
	{
		if($i==4)
		{
			$r4=$_POST["txtRole4"];
			$b4=$b[0]+$b[1]-$b[2]-$b[3];
			$s4=$s[0]+$s[1]-$s[2]-$s[3];
			
					$obj1->set_Role($r4);
					$obj1->set_Big($b4);
					$obj1->set_Small($s4);
					$obj1->insert($obj1);
			
			
		}
		else{
			$r[$i]=$_POST["txtRole"][$i];
			$b[$i]=$_POST["txtBig"][$i];
			$s[$i]=$_POST["txtSmall"][$i];
			
					$obj1->set_Role($r[$i]);
					$obj1->set_Big($b[$i]);
					$obj1->set_Small($s[$i]);
					$obj1->insert($obj1);
			
		}
		
	}
	}
	
	$don=$_POST["txtDon"];
	$don1=$_POST["txtDon1"];
	$sub=$_POST["txtSub"];
	$divi=$_POST["txtDivi"];
	$oin=$_POST["txtOin"];
	$cin=$_POST["txtCin"];
	$tin=$don+$don1+$sub+$divi+$oin+$cin;

	$gwexp=$_POST["txtGWexp"];
	$adm=$_POST["txtAdm"];
	$adv=$_POST["txtAdv"];
	$cons=$_POST["txtCons"];
	$texp=$gwexp+$adm+$adv+$cons;

	$net=$tin-$texp;

	$inv=$_POST["txtInv"];
	$sav=$_POST["txtSav"];
	$sha=$_POST["txtSha"];
	$tinv=$inv+$sav+$sha;

	$file1=$_FILES["fileAudit"]["name"];
	$file1s=$_FILES["fileAudit"]["size"];
	$file1t=$_FILES["fileAudit"]["type"];
	$file1tmp=$_FILES["fileAudit"]["tmp_name"];
	if($file1!="")
	{
			move_uploaded_file($file1tmp,"../certificates/".$pnm.$state.$city.$file1);
			$a="../certificates/".$pnm.$state.$city.$file1;
	}
	if($tin!="" && $texp!="" && $net!=""){
		$obj2->set_Panjrapol_id($pid);
	$obj2->set_Year($yr);
	$obj2->set_Donation_recevied($don);
	$obj2->set_Donation_recevied1($don1);
	$obj2->set_Subsidy($sub);
	$obj2->set_Dividend($divi);
	$obj2->set_Other_income($oin);
	$obj2->set_Capital_income($cin);
	$obj2->set_Total_income($tin);
	$obj2->set_Grasswater_expense($gwexp);
	$obj2->set_Administration_expense($adm);
	$obj2->set_Advertisement_expense($adv);
	$obj2->set_Construction_expense($cons);
	$obj2->set_Total_expense($texp);
	$obj2->set_Net_surplus($net);
	$obj2->set_Investment($inv);
	$obj2->set_Savings($sav);
	$obj2->set_Shares($sha);
	$obj2->set_Total_Investment($tinv);
	$obj2->set_Audit_report_certificate($a);
	$obj2->insert($obj2);	
	}
	echo "<script type='text/javascript'>location.href = 'animalincomeexpform.php?Id=".$pid."'</script>";
}
if(isset($_POST["btnDis"]))
{
	if(isset($_POST["optYr"]))
	{
			$yr=$_POST["optYr"];
	}
	$obj1->set_Panjrapol_id($pid);
	$obj1->set_Year($yr);
	if($yr!=""){
		for($i=0;$i<=4;$i++)
	{
		if($i==4)
		{
			$r4=$_POST["txtRole4"];
			$b4=$b[0]+$b[1]-$b[2]-$b[3];
			$s4=$s[0]+$s[1]-$s[2]-$s[3];
			
					$obj1->set_Role($r4);
					$obj1->set_Big($b4);
					$obj1->set_Small($s4);
					$obj1->insert($obj1);
		
			
		}
		else{
			$r[$i]=$_POST["txtRole"][$i];
			$b[$i]=$_POST["txtBig"][$i];
			$s[$i]=$_POST["txtSmall"][$i];
			
					$obj1->set_Role($r[$i]);
					$obj1->set_Big($b[$i]);
					$obj1->set_Small($s[$i]);
					$obj1->insert($obj1);
			
		}
		
	}
	}
	
	$don=$_POST["txtDon"];
	$don1=$_POST["txtDon1"];
	$sub=$_POST["txtSub"];
	$divi=$_POST["txtDivi"];
	$oin=$_POST["txtOin"];
	$cin=$_POST["txtCin"];
	$tin=$don+$don1+$sub+$divi+$oin+$cin;

	$gwexp=$_POST["txtGWexp"];
	$adm=$_POST["txtAdm"];
	$adv=$_POST["txtAdv"];
	$cons=$_POST["txtCons"];
	$texp=$gwexp+$adm+$adv+$cons;

	$net=$tin-$texp;

	$inv=$_POST["txtInv"];
	$sav=$_POST["txtSav"];
	$sha=$_POST["txtSha"];
	$tinv=$inv+$sav+$sha;

	$file1=$_FILES["fileAudit"]["name"];
	$file1s=$_FILES["fileAudit"]["size"];
	$file1t=$_FILES["fileAudit"]["type"];
	$file1tmp=$_FILES["fileAudit"]["tmp_name"];
	if($file1!="")
	{
			move_uploaded_file($file1tmp,"../certificates/".$pnm.$state.$city.$file1);
			$a="../certificates/".$pnm.$state.$city.$file1;
	}
	if($tin!="" && $texp!="" && $net!=""){
		$obj2->set_Panjrapol_id($pid);
	$obj2->set_Year($yr);
	$obj2->set_Donation_recevied($don);
	$obj2->set_Donation_recevied1($don1);
	$obj2->set_Subsidy($sub);
	$obj2->set_Dividend($divi);
	$obj2->set_Other_income($oin);
	$obj2->set_Capital_income($cin);
	$obj2->set_Total_income($tin);
	$obj2->set_Grasswater_expense($gwexp);
	$obj2->set_Administration_expense($adm);
	$obj2->set_Advertisement_expense($adv);
	$obj2->set_Construction_expense($cons);
	$obj2->set_Total_expense($texp);
	$obj2->set_Net_surplus($net);
	$obj2->set_Investment($inv);
	$obj2->set_Savings($sav);
	$obj2->set_Shares($sha);
	$obj2->set_Total_Investment($tinv);
	$obj2->set_Audit_report_certificate($a);
	$obj2->insert($obj2);	
	}
	
	echo "<script type='text/javascript'>location.href = 'contactform.php?Id=".$pid."'</script>";
}
if(isset($_POST["btnFinal"]))
{
	if(isset($_POST["optYr"]))
	{
			$yr=$_POST["optYr"];
	}
	$obj1->set_Panjrapol_id($pid);
	$obj1->set_Year($yr);
	if($yr!=""){
		for($i=0;$i<=4;$i++)
	{
		if($i==4)
		{
			$r4=$_POST["txtRole4"];
			$b4=$b[0]+$b[1]-$b[2]-$b[3];
			$s4=$s[0]+$s[1]-$s[2]-$s[3];
			
					$obj1->set_Role($r4);
					$obj1->set_Big($b4);
					$obj1->set_Small($s4);
					$obj1->insert($obj1);
			
			
		}
		else{
			$r[$i]=$_POST["txtRole"][$i];
			$b[$i]=$_POST["txtBig"][$i];
			$s[$i]=$_POST["txtSmall"][$i];
			
					$obj1->set_Role($r[$i]);
					$obj1->set_Big($b[$i]);
					$obj1->set_Small($s[$i]);
					$obj1->insert($obj1);
			
		}
		
	}
	}
	
	$don=$_POST["txtDon"];
	$don1=$_POST["txtDon1"];
	$sub=$_POST["txtSub"];
	$divi=$_POST["txtDivi"];
	$oin=$_POST["txtOin"];
	$cin=$_POST["txtCin"];
	$tin=$don+$don1+$sub+$divi+$oin+$cin;

	$gwexp=$_POST["txtGWexp"];
	$adm=$_POST["txtAdm"];
	$adv=$_POST["txtAdv"];
	$cons=$_POST["txtCons"];
	$texp=$gwexp+$adm+$adv+$cons;

	$net=$tin-$texp;

	$inv=$_POST["txtInv"];
	$sav=$_POST["txtSav"];
	$sha=$_POST["txtSha"];
	$tinv=$inv+$sav+$sha;

	$file1=$_FILES["fileAudit"]["name"];
	$file1s=$_FILES["fileAudit"]["size"];
	$file1t=$_FILES["fileAudit"]["type"];
	$file1tmp=$_FILES["fileAudit"]["tmp_name"];
	if($file1!="")
	{
			move_uploaded_file($file1tmp,"../certificates/".$pnm.$state.$city.$file1);
			$a="../certificates/".$pnm.$state.$city.$file1;
	}
	if($tin!="" && $texp!="" && $net!=""){
		$obj2->set_Panjrapol_id($pid);
	$obj2->set_Year($yr);
	$obj2->set_Donation_recevied($don);
	$obj2->set_Donation_recevied1($don1);
	$obj2->set_Subsidy($sub);
	$obj2->set_Dividend($divi);
	$obj2->set_Other_income($oin);
	$obj2->set_Capital_income($cin);
	$obj2->set_Total_income($tin);
	$obj2->set_Grasswater_expense($gwexp);
	$obj2->set_Administration_expense($adm);
	$obj2->set_Advertisement_expense($adv);
	$obj2->set_Construction_expense($cons);
	$obj2->set_Total_expense($texp);
	$obj2->set_Net_surplus($net);
	$obj2->set_Investment($inv);
	$obj2->set_Savings($sav);
	$obj2->set_Shares($sha);
	$obj2->set_Total_Investment($tinv);
	$obj2->set_Audit_report_certificate($a);
	$obj2->insert($obj2);	
	}
	echo "<script type='text/javascript'>location.href = 'displaypanjrapol.php'</script>";
}
?>
			
				<div class="graphs">
					<h3 class="blank1">Animal, Income-expense,Investment yearwise Details</h3>
						<div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							<form class="form-validate form-horizontal" id="frmregistration" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Panjarapole Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="focusedinput" disabled="" value="<?php echo $pnm;?>">
									</div>
									
								</div>
								<div class="form-group">
									<label for="selector1" class="col-sm-2 control-label">Select Year</label>
									<div class="col-sm-3">
										<select name="optYr" id="selector1" class="form-control" onchange="sum6(),sum7()">
											<option value="">---select year---</option>
<?php
$date_y = date("Y");
$year =intval($date_y);
$years = $year-2;
do{
    if($date_y == $year){
    	$y1=$year-1;
        echo ("<option value='$y1-$year'>$y1-$year</option>");
    }else{
    	$y1=$year-1;
        echo ("<option value='$y1-$year'>$y1-$year</option>");
    }
    $year--;
}while($year>=$years);
?></select>
									</div>
								</div>
								<br>
								<h3  class="col-sm-11 col-sm-offset-1">Animal Details</h3>
								<br><br>
								<div class="form-group">
									<div class="col-sm-1 col-sm-offset-1">
									<input type="text" for="focusedinput" class="layout" name="txtRole[]" id="txtRole[]" value="Opening Balance" >
									<br>
									<label style="color:red;" >01/04/<label style="color:red; font-size: 15px;" id="yr1"></label></label>

									
								</div>
								<label for="focusedinput" class="col-sm-1 control-label">Big</label>
									<div class="col-sm-3">
										<input type="number" class="form-control1" id="num1" placeholder="Enter No." name="txtBig[]" value="0">
									</div>
									<label for="focusedinput" class="col-sm-1 control-label">Small</label>
									<div class="col-sm-3">
										<input type="number" class="form-control1" id="num5" placeholder="Enter No." name="txtSmall[]" value="0">
									</div>	
								</div>
								<div class="form-group">
									<div class="col-sm-1 col-sm-offset-1">
									<input type="text" for="focusedinput" class="layout" name="txtRole[]" id="txtRole[]" value="New Arrived" >
								</div>
									<label for="focusedinput" class="col-sm-1 control-label">Big</label>
									<div class="col-sm-3">
										<input type="number" class="form-control1" id="num2" placeholder="Enter No." name="txtBig[]" value="0">
									</div>
									<label for="focusedinput" class="col-sm-1 control-label">Small</label>
									<div class="col-sm-3">
										<input type="number" class="form-control1" id="num6" placeholder="Enter No." name="txtSmall[]" value="0">
									</div>	
								</div>
								<div class="form-group">
									<div class="col-sm-1 col-sm-offset-1">
									<input type="text" for="focusedinput" class="layout" name="txtRole[]" id="txtRole[]" value="Taken Away"  >
								</div>
									<label for="focusedinput" class="col-sm-1 control-label">Big</label>
									<div class="col-sm-3">
										<input type="number" class="form-control1" id="num3" placeholder="Enter No." name="txtBig[]" value="0">
									</div>
									<label for="focusedinput" class="col-sm-1 control-label">Small</label>
									<div class="col-sm-3">
										<input type="number" class="form-control1" id="num7" placeholder="Enter No." name="txtSmall[]" value="0">
									</div>	
								</div>
								<div class="form-group">
									<div class="col-sm-1 col-sm-offset-1">
									<input type="text" for="focusedinput" class="layout" name="txtRole[]" id="txtRole[]" value="Died" >
								</div>
									<label for="focusedinput" class="col-sm-1 control-label">Big</label>
									<div class="col-sm-3">
										<input type="number" class="form-control1" id="num4" placeholder="Enter No." name="txtBig[]" value="0">
									</div>
									<label for="focusedinput" class="col-sm-1 control-label">Small</label>
									<div class="col-sm-3">
										<input type="number" class="form-control1" id="num8" placeholder="Enter No." name="txtSmall[]" value="0">
									</div>	
								</div>
								 <div class="form-group">
									<div class="col-sm-1 col-sm-offset-1">
									<input type="text" for="focusedinput" class="layout" name="txtRole4" id="txtRole4" value="Closing Balance">
									<br>
									<label style="color:red;" >31/03/<label style="color:red; font-size: 15px;" id="yr2"></label></label>
								</div>

								
									<label for="focusedinput" id="total" class="col-sm-1 control-label">Big</label>
									<div class="col-sm-3">
										<input type="text" class="form-control1" id="sum" readonly value="<?php echo $b4;?>">
									</div>
									<label for="focusedinput" id="total" class="col-sm-1 control-label">Small</label>
									<div class="col-sm-3">
										<input type="text" class="form-control1" id="sum1" readonly value="<?php echo $s4;?>">
									</div>	
								</div> 
								<br>
								<center>
									<label style="color:red; font-size: 15px;" >Financial Details::</label>
								<label style="color:red; font-size: 15px;" >01/04/<label style="color:red; font-size: 15px;" id="yr3"></label></label>
								-
								<label style="color:red; font-size: 15px;" >31/03/<label style="color:red; font-size: 15px;" id="yr4"></label></label>
							</center>
								<h3  class="col-sm-11 col-sm-offset-1">Income Details</h3>
								<br>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Donation</label>
									<label for="focusedinput" class="col-sm-1 control-label">Corpus</label>
									<div class="col-sm-3">
										<input type="number" class="form-control1" id="num9" placeholder="Enter Amount" name="txtDon" value="0">
									</div>
									<label for="focusedinput" class="col-sm-1 control-label">Revenue</label>
									<div class="col-sm-3">
										<input type="number" class="form-control1" id="num10" placeholder="Enter Amount" name="txtDon1" value="0">
									</div>	
								</div> 
								
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Subsidy</label>
									<div class="col-sm-8">
										<input type="number" class="form-control1" id="num11" placeholder="Enter Amount" name="txtSub" value="0">
									</div>
									
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">lutenest/Dividend</label>
									<div class="col-sm-8">
										<input type="number" class="form-control1" id="num12" placeholder="Enter Amount" name="txtDivi" value="0">
									</div>
									
								</div>

						  		<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Other Income(sale of milk etc.)</label>
									<div class="col-sm-8">
										<input type="number" class="form-control1" id="num13" placeholder="Enter Amount" name="txtOin" value="0">
									</div>
									
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Capital Income(sale of property etc.)</label>
									<div class="col-sm-8">
										<input type="number" class="form-control1" id="num14" placeholder="Enter Amount" name="txtCin" value="0">
									</div>
									
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Total Income</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="sum2" readonly value="<?php echo $tin;?>">
									</div>
									
								</div>
								<br>
								<h3  class="col-sm-11 col-sm-offset-1">Expense Details</h3>
								<br><br>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Cattle feed Expense</label>
									<div class="col-sm-8">
										<input type="number" class="form-control1" id="num15" placeholder="Enter Amount" name="txtGWexp" value="0">
									</div>
									
								</div>
								
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Administration Expense</label>
									<div class="col-sm-8">
										<input type="number" class="form-control1" id="num16" placeholder="Enter Amount" name="txtAdm" value="0">
									</div>
									
								</div>
						  		<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Advertisement Expense</label>
									<div class="col-sm-8">
										<input type="number" class="form-control1" id="num17" placeholder="Enter Amount" name="txtAdv" value="0">
									</div>
									
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Capital Expense(land,Building etc.)</label>
									<div class="col-sm-8">
										<input type="number" class="form-control1" id="num18" placeholder="Enter Amount" name="txtCons" value="0">
									</div>
									
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Total Expense</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="sum3" readonly value="<?php echo $texp;?>">
									</div>
									
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Total Net</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="sum4" readonly value="<?php echo $net;?>">
									</div>
									
								</div>
								<br>
								<h3  class="col-sm-11 col-sm-offset-1">Investment Details</h3>
								<br><br>
								
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">F.D.</label>
									<div class="col-sm-8">
										<input type="number" class="form-control1" id="num19" placeholder="Enter Amount" name="txtInv" value="0">
									</div>
									
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Saving balance</label>
									<div class="col-sm-8">
										<input type="number" class="form-control1" id="num20" placeholder="Enter Amount" name="txtSav" value="0">
									</div>
									
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Shares/Units etc.</label>
									<div class="col-sm-8">
										<input type="number" class="form-control1" id="num21" placeholder="Enter Amount" name="txtSha" value="0">
									</div>
									
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Total Investment</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="sum5" disabled="" value="<?php echo $tinv;?>">
									</div>
									
								</div>
								<div class="form-group">
									<label for="exampleInputFile" class="col-sm-2 control-label">Attach Audit Report</label>
									<div class="col-sm-8">
										<input type="file"  id="exampleInputFile" name="fileAudit">
									</div>
						  		</div>
						  		<div class="form-group">
									<div class="row">
									<div class="col-sm-9">
										<button class="btn-warning btn" name="btnSub" style="float:right;">Add more privious year detail</button>
									<br>
										 <b><p class="help-block" style="color:red; float:right; clear: both;">Select other year</p></b> 
									&nbsp;&nbsp;&nbsp;&nbsp;
									</div>
									
									<div class="col-sm-3">
									<button class='btn-warning btn' name='btnDis'>NEXT</button>
									<button class='btn-warning btn' name='btnFinal'>SUBMIT</button>
									
									</div>
										
								</div>
							</div>
								
						  
						 <br>
						</form>
					  </div>
				</div>
			</div>
			 
		</div>
       
      <!-- main content end-->
   </section>
  <?php
	include_once("footer.php");
?>  
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
</body>
</html>