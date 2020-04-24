 <?php
session_start();
if(!isset($_SESSION["anm"]))
{
    echo "<script>alert('login again');document.location='../admin/login.php';</script>";
}
else{
?>
<?php
	include_once("header.php");
?>
<script type="text/javascript">
	$(document).ready(function() {
    //this calculates values automatically 
    sum2();
    sum3();
    sum4();
    sum5();
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
include_once("../class/Incomeexpense.php");
$obj2=new Incomeexpense();
$pid=$pnm=$yr=$r=$b=$s=$r4=$b4=$s4=$don=$don1=$sub=$divi=$oin=$cin=$tin=$gwexp=$adm=$adv=$cons=$texp=$net=$inv=$sav=$sha=$tinv=$file1=$a=$state=$city=$ieid="";
if(isset($_GET["Id"]))
{
		$pid=$_GET["Id"];
		$yr=$_GET["yr"];
		$rec=$obj->select1($pid);
		while($result=mysqli_fetch_array($rec))
		{
			$pnm=$result[1];
			$state=$result[2];
			$city=$result[3];
			$rec2=$obj2->select3($pid,$yr);
			while($result2=mysqli_fetch_array($rec2))
		{	
			$ieid=$result2[0];
			$yr=$result2[2];
			$don=$result2[3];
			$don1=$result2[4];
			$sub=$result2[5];
			$divi=$result2[6];
			$oin=$result2[7];
			$cin=$result2[8];
			$tin=$result2[9];
			$gwexp=$result2[10];
			$adm=$result2[11];
			$adv=$result2[12];
			$cons=$result2[13];
			$texp=$result2[14];
			$net=$result2[15];
			$inv=$result2[16];
			$sav=$result2[17];
			$sha=$result2[18];
			$tinv=$result2[19];
			$a=$result2[20];
		}		
		}
}

if(isset($_POST["btnSub"]))
{
	if(isset($_POST["optYr"]))
	{
			$yr=$_POST["optYr"];
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
	$obj2->set_Incomeexpense_id($ieid);
	$obj2->update($obj2);
	echo "<script type='text/javascript'>location.href = 'animalincomeexpform.php?Id=".$pid."'</script>";
}

?>
		<div id="page-wrapper">
				<div class="graphs">
					<h3 class="blank1">Income-expense,Investment yearwise Details<?php echo "<a href='animalincomeexpform.php?Id=".$pid."' style='float:right;'><u>BACK</u></a>" ;?></h3>
						<div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							<form class="form-horizontal" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Panjarapole Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="focusedinput" disabled="" value="<?php echo $pnm;?>">
									</div>
									
								</div>
								<div class="form-group">
									<label for="selector1" class="col-sm-2 control-label">Select Year</label>
									<div class="col-sm-3">
										<select name="optYr" id="selector1" class="form-control">
											<option value="">---select year---</option>
<?php
$date_y = date("Y");
$year =intval($date_y);
$years = $year-2;
do{
	$y1=$year-1;
	if($yr=="$y1-$year"){
		
		echo ("<option value='$yr' selected=''>$yr</option>");
	}
	else{
	    if($date_y == $year){
	    	
	        echo ("<option value='$year-$y1'>$year-$y1</option>");
	    }else{
	    	
	        echo ("<option value='$year-$y1'>$year-$y1</option>");
	    }
	}
    $year--;
}while($year>=$years);
?></select>
									</div>
								</div>
								<br>
								
								<h3  class="col-sm-11 col-sm-offset-1">Income Details</h3>
								<br><br>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Donation</label>
									<label for="focusedinput" class="col-sm-1 control-label">Corpus</label>
									<div class="col-sm-3">
										<input type="number" class="form-control1" id="num9" placeholder="Enter Amount" name="txtDon" value="<?php echo $don;?>">
									</div>
									<label for="focusedinput" class="col-sm-1 control-label">Revenue</label>
									<div class="col-sm-3">
										<input type="number" class="form-control1" id="num10" placeholder="Enter Amount" name="txtDon1" value="<?php echo $don1;?>">
									</div>	
								</div> 
								
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Subsidy</label>
									<div class="col-sm-8">
										<input type="number" class="form-control1" id="num11" placeholder="Enter Amount" name="txtSub" value="<?php echo $sub;?>">
									</div>
									
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">lutenest/Dividend</label>
									<div class="col-sm-8">
										<input type="number" class="form-control1" id="num12" placeholder="Enter Amount" name="txtDivi" value="<?php echo $divi;?>">
									</div>
									
								</div>

						  		<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Other Income(sale of milk etc.)</label>
									<div class="col-sm-8">
										<input type="number" class="form-control1" id="num13" placeholder="Enter Amount" name="txtOin" value="<?php echo $oin;?>">
									</div>
									
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Capital Income(sale of property etc.)</label>
									<div class="col-sm-8">
										<input type="number" class="form-control1" id="num14" placeholder="Enter Amount" name="txtCin" value="<?php echo $cin;?>">
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
										<input type="number" class="form-control1" id="num15" placeholder="Enter Amount" name="txtGWexp" value="<?php echo $gwexp;?>">
									</div>
									
								</div>
								
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Administration Expense</label>
									<div class="col-sm-8">
										<input type="number" class="form-control1" id="num16" placeholder="Enter Amount" name="txtAdm" value="<?php echo $adm;?>">
									</div>
									
								</div>
						  		<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Advertisement Expense</label>
									<div class="col-sm-8">
										<input type="number" class="form-control1" id="num17" placeholder="Enter Amount" name="txtAdv" value="<?php echo $adv;?>">
									</div>
									
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Capital Expense(land,Building etc.)</label>
									<div class="col-sm-8">
										<input type="number" class="form-control1" id="num18" placeholder="Enter Amount" name="txtCons" value="<?php echo $cons;?>">
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
										<input type="number" class="form-control1" id="num19" placeholder="Enter Amount" name="txtInv" value="<?php echo $inv;?>">
									</div>
									
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Saving balance</label>
									<div class="col-sm-8">
										<input type="number" class="form-control1" id="num20" placeholder="Enter Amount" name="txtSav" value="<?php echo $sav;?>">
									</div>
									
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Shares/Units etc.</label>
									<div class="col-sm-8">
										<input type="number" class="form-control1" id="num21" placeholder="Enter Amount" name="txtSha" value="<?php echo $sha;?>">
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
									<div class="col-sm-5">
										<input type="file"  id="exampleInputFile" name="fileAudit">
									</div>
									<div class="col-sm-5">
										<?php
											if($a!=""){
												$data="<img src='$a' height='100' width='100'";
											}
											else{
												$data="";
											}
											echo $data;
										?>
									</div>
						  		</div>
						  <div class="panel-footer">
							<div class="row">
								<div class="col-sm-3 col-sm-offset-9">
									<button class="btn-warning btn" name="btnSub">UPDATE</button>
									
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
}
	include_once("footer.php");
?>  
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
</body>
</html>