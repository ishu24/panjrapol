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
<script  src="js/index.js"></script>
<link rel="stylesheet" href="css/style1.css">
<link rel="stylesheet" href="css/BeatPicker.css"/>

<script>
function showCity(str) {
    if (str.length == 0) { 
        document.getElementById("optCity").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("optCity").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "getCity_ajax.php?q=" + str, true);
        xmlhttp.send();
    }
}
</script>
<script src="js/BeatPicker.min.js"></script>
<script src="js/jquery-1.11.0.min.js"></script>

<?php
	include_once("../class/Panjrapol.php");
	$obj=new Panjrapol();
	$pnm=$state=$city=$dis=$add=$pin=$yr=$rno=$rdt=$a=$b=$c=$pno=$e=$email=$con=$isa=$rno12=$rdt12=$rno80=$rdt80=$rdtpan=$file1=$file2=$file3=$file4=$pid="";
if(isset($_GET["Id"]))
{
	$pid=$_GET["Id"];
	$rec=$obj->select1($pid);
	while($result=mysqli_fetch_array($rec))
	{
		$pnm=$result[1];
		$state=$result[2];
		$city=$result[3];
		$dis=$result[4];
		$add=$result[5];
		$pin=$result[6];
		$yr=$result[7];
		$rno=$result[8];
		$rdt=$result[9];		
		$a=$result[10];
		$b=$result[11];
		$c=$result[12];
		$e=$result[14];
		$pno=$result[13];
		$email=$result[15];
		$con=$result[16];
		$isa=$result[17];
		$rno12=$result[18];
		$rdt12=$result[19];
		$rno80=$result[20];
		$rdt80=$result[21];
		$rdtpan=$result[22];
	}		
}
	if(isset($_POST["btnSub"]))
	{
		$pnm=strtoupper($_POST["txtPnm"]);
		if(isset($_POST["optSt"]))
		{
			$state=$_POST["optSt"];
		}
		if(isset($_POST["optCt"]))
		{
			$city=$_POST["optCt"];
		}
		$dis=$_POST["txtDis"];
		$pin=$_POST["txtPin"];
		$add=$_POST["txtAdd"];
		$email=$_POST["txtEmail"];
		$con=$_POST["txtCon"];
		$yr=$_POST["txtYr"];
		$rno=$_POST["txtRno"];
		$rdt=$_POST["txtRdate"];
		$file1=$_FILES["txtFile1"]["name"];
		$file1s=$_FILES["txtFile1"]["size"];
		$file1t=$_FILES["txtFile1"]["type"];
		$file1tmp=$_FILES["txtFile1"]["tmp_name"];
		
		if($file1!="")
		{
			move_uploaded_file($file1tmp,"../certificates/".$pnm.$state.$city.$file1);
			$a="../certificates/".$pnm.$state.$city.$file1;
		}
	   
		$file2=$_FILES["txtFile2"]["name"];
		$file2s=$_FILES["txtFile2"]["size"];
		$file2t=$_FILES["txtFile2"]["type"];
		$file2tmp=$_FILES["txtFile2"]["tmp_name"];
		
		if($file2!="")
		{
			move_uploaded_file($file2tmp,"../certificates/".$pnm.$state.$city.$file2);
			$b="../certificates/".$pnm.$state.$city.$file2;
		}
		$file3=$_FILES["txtFile3"]["name"];
		$file3s=$_FILES["txtFile3"]["size"];
		$file3t=$_FILES["txtFile3"]["type"];
		$file3tmp=$_FILES["txtFile3"]["tmp_name"];
		if($file3!="")
		{
			move_uploaded_file($file3tmp,"../certificates/".$pnm.$state.$city.$file3);
			$c="../certificates/".$pnm.$state.$city.$file3;
		}
		$pno=$_POST["txtPno"];
		$file4=$_FILES["txtFile4"]["name"];
		$file4s=$_FILES["txtFile4"]["size"];
		$file4t=$_FILES["txtFile4"]["type"];
		$file4tmp=$_FILES["txtFile4"]["tmp_name"];
		if($file4!="")
		{
			move_uploaded_file($file4tmp,"../certificates/".$pnm.$state.$city.$file4);
			$e="../certificates/".$pnm.$state.$city.$file4;
		}
		$rno12=$_POST["txtRno12"];
		$rdt12=$_POST["txtRdate12"];
		$rno80=$_POST["txtRno80"];
		$rdt80=$_POST["txtRdate80"];
		$rdtpan=$_POST["txtRdatepan"];
		$obj->set_Panjrapol_name($pnm);
		$obj->set_State_id($state);
		$obj->set_City_id($city);
		$obj->set_District($dis);
		$obj->set_Address($add);
		$obj->set_Pincode($pin);
		$obj->set_Foundation_year($yr);
		$obj->set_Registration_no($rno);
		$obj->set_Registration_date($rdt);
		$obj->set_Charity_commisioner_certificate($a);
		$obj->set_Income_tax_12Acertificate($b);
		$obj->set_Income_tax_80Gcertificate($c);
		$obj->set_Pan_no($pno);
		$obj->set_Pancard_certificate($e);
		$obj->set_Mobile_no($con);
		$obj->set_Email($email);
		$obj->set_Registration_no12A($rno12);
		$obj->set_Registration_date12A($rdt12);
		$obj->set_Registration_no80G($rno80);
		$obj->set_Registration_date80G($rdt80);
		$obj->set_Pancard_date($rdtpan);
		
		if($pid!=""){
			$obj->set_Panjrapol_id($pid);
			$obj->update($obj);
			echo "<script type='text/javascript'>location.href = 'propertyform.php?Id=".$pid."'</script>";
		}
		else{
			$obj->insert($obj);
			$rec3=$obj->selectmax();
			$result3=mysqli_fetch_array($rec3);
			echo "<script type='text/javascript'>location.href = 'propertyform.php?Id=".$result3[0]."'</script>";
		}
	}
	
	if(isset($_POST["btnSub1"]))
	{
		$pnm=strtoupper($_POST["txtPnm"]);
		if(isset($_POST["optSt"]))
		{
			$state=$_POST["optSt"];
		}
		if(isset($_POST["optCt"]))
		{
			$city=$_POST["optCt"];
		}
		$dis=$_POST["txtDis"];
		$pin=$_POST["txtPin"];
		$add=$_POST["txtAdd"];
		$email=$_POST["txtEmail"];
		$con=$_POST["txtCon"];
		$yr=$_POST["txtYr"];
		$rno=$_POST["txtRno"];
		$rdt=$_POST["txtRdate"];
		$file1=$_FILES["txtFile1"]["name"];
		$file1s=$_FILES["txtFile1"]["size"];
		$file1t=$_FILES["txtFile1"]["type"];
		$file1tmp=$_FILES["txtFile1"]["tmp_name"];
		
		if($file1!="")
		{
			move_uploaded_file($file1tmp,"../certificates/".$pnm.$state.$city.$file1);
			$a="../certificates/".$pnm.$state.$city.$file1;
		}
	   
		$file2=$_FILES["txtFile2"]["name"];
		$file2s=$_FILES["txtFile2"]["size"];
		$file2t=$_FILES["txtFile2"]["type"];
		$file2tmp=$_FILES["txtFile2"]["tmp_name"];
		
		if($file2!="")
		{
			move_uploaded_file($file2tmp,"../certificates/".$pnm.$state.$city.$file2);
			$b="../certificates/".$pnm.$state.$city.$file2;
		}
		$file3=$_FILES["txtFile3"]["name"];
		$file3s=$_FILES["txtFile3"]["size"];
		$file3t=$_FILES["txtFile3"]["type"];
		$file3tmp=$_FILES["txtFile3"]["tmp_name"];
		if($file3!="")
		{
			move_uploaded_file($file3tmp,"../certificates/".$pnm.$state.$city.$file3);
			$c="../certificates/".$pnm.$state.$city.$file3;
		}
		$pno=$_POST["txtPno"];
		$file4=$_FILES["txtFile4"]["name"];
		$file4s=$_FILES["txtFile4"]["size"];
		$file4t=$_FILES["txtFile4"]["type"];
		$file4tmp=$_FILES["txtFile4"]["tmp_name"];
		if($file4!="")
		{
			move_uploaded_file($file4tmp,"../certificates/".$pnm.$state.$city.$file4);
			$e="../certificates/".$pnm.$state.$city.$file4;
		}
		$rno12=$_POST["txtRno12"];
		$rdt12=$_POST["txtRdate12"];
		$rno80=$_POST["txtRno80"];
		$rdt80=$_POST["txtRdate80"];
		$rdtpan=$_POST["txtRdatepan"];
		$obj->set_Panjrapol_name($pnm);
		$obj->set_State_id($state);
		$obj->set_City_id($city);
		$obj->set_District($dis);
		$obj->set_Address($add);
		$obj->set_Pincode($pin);
		$obj->set_Foundation_year($yr);
		$obj->set_Registration_no($rno);
		$obj->set_Registration_date($rdt);
		$obj->set_Charity_commisioner_certificate($a);
		$obj->set_Income_tax_12Acertificate($b);
		$obj->set_Income_tax_80Gcertificate($c);
		$obj->set_Pan_no($pno);
		$obj->set_Pancard_certificate($e);
		$obj->set_Mobile_no($con);
		$obj->set_Email($email);
		$obj->set_Registration_no12A($rno12);
		$obj->set_Registration_date12A($rdt12);
		$obj->set_Registration_no80G($rno80);
		$obj->set_Registration_date80G($rdt80);
		$obj->set_Pancard_date($rdtpan);
		
		if($pid!=""){
			$obj->set_Panjrapol_id($pid);
			$obj->update($obj);
			echo "<script type='text/javascript'>location.href = 'displaypanjrapol.php'</script>";
		}
		
	}	
?>
			<div id="page-wrapper">
				
				<div class="graphs">
					<h3 class="blank1">Panjrapole Details</h3>
						<div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							<form class="form-validate form-horizontal" id="frmregistration"  method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Name*</label>
									<div class="col-sm-8">
										<input type="text" name="txtPnm" class="form-control1" id="focusedinput" placeholder="Enter Panjrapol Name" data-bvalidator="alpha,required" value="<?php echo $pnm;?>">
									</div>
									
								</div>
								<div class="form-group">
									<label for="txtarea1" class="col-sm-2 control-label">Address*</label>
									<div class="col-sm-8"><textarea name="txtAdd" id="txtarea1" cols="50" rows="5" class="form-control" data-bvalidator="required"><?php echo $add;?></textarea></div>
								</div>
<?php
include_once("../class/State.php");
$obj=new State();
$rec=$obj->select();
include_once("../class/City.php");
$obj1=new City();
$rec1=$obj1->select();
								$data="<div class='form-group'>
									<label for='selector1' class='col-sm-2 control-label'>State*</label>
									<div class='col-sm-3'>
									<select name='optSt' id='selector1' class='form-control' data-bvalidator='required' onChange='showCity(this.value)'>
										<option value=''>------Select State------</option>";
										while ($result1=mysqli_fetch_array($rec1))
										{
											while ($result=mysqli_fetch_array($rec))
											{
												
												if($state==$result[0])
												{
													$data.="<option value='".$result[0]."' selected>".$result[1]."</option>";
												}
												else
												{
													$data.="<option value='".$result[0]."'>".$result[1]."</option>";
												}
											}
										}
										
										
									$data.="</select></div>";
include_once("../class/City.php");
$obj1=new City();
$rec1=$obj1->select();	
							
									$data.="<label for='selector1' class='col-sm-2 control-label'>City*</label>
									<div class='col-sm-3'>
									<select name='optCt' id='optCity' data-bvalidator='required' class='form-control' >
										<option value=''>------Select City------</option>";
										
											while ($result1=mysqli_fetch_array($rec1))
											{
												if($city==$result1[0])
												{
													$data.="<option value='".$result1[0]."' selected>".$result1[1]."</option>";
												}
												else
												{
													$data.="<option value='".$result1[0]."'>".$result1[1]."</option>";
												}
											}
										
										
									$data.="</select></div></div>";
								
	echo $data;
?>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">District</label>
									<div class="col-sm-3">
										<input type="text" name="txtDis" class="form-control1" id="focusedinput" placeholder="Enter District" data-bvalidator="alpha" value="<?php echo $dis;?>">
									</div>
									

									<label for="focusedinput" class="col-sm-2 control-label">Pincode</label>
									<div class="col-sm-3">
										<input type="text" name="txtPin" class="form-control1" id="focusedinput" placeholder="Enter Pincode" data-bvalidator="digit,maxlength[8]" value="<?php echo $pin;?>">
									</div>
									
								</div>
								
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Email</label>
									<div class="col-sm-8">
										<input type="text" name="txtEmail" class="form-control1" id="focusedinput" placeholder="Enter Email" data-bvalidator="email" value="<?php echo $email;?>">
									</div>
									
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Contact</label>
									<div class="col-sm-3">
										<input type="text" name="txtCon" class="form-control1" id="focusedinput" placeholder="Enter Contact No." data-bvalidator="number,maxlength[13]" value="<?php echo $con;?>">
									</div>
						<?php 
	$y=date("Y");
	$d=date("d");
	$m=date("m");

	?>			

									<label for="focusedinput" class="col-sm-2 control-label">Fondation Year</label>
									<div class="col-sm-3">
										<input type="date" name="txtYr" class="form-control1" data-beatpicker="true" data-beatpicker-position="['right','*']" data-beatpicker-id="myDatePicker" data-beatpicker-disable="{from:['<?php echo $y; ?>','<?php echo $m;  ?>','<?php echo $d; ?>'],to:'>'}" placeholder="Enter Year" value="<?php echo $yr;?>">
									</div>
									
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Charity Commisioner Registration No.</label>
									<div class="col-sm-3">
										<input type="text" name="txtRno" class="form-control1" id="focusedinput" placeholder="Enter Registration No." data-bvalidator="alphanum" value="<?php echo $rno;?>">
									</div>
									

									<label for="focusedinput" class="col-sm-2 control-label">Charity Commisioner Registration Date</label>
									<div class="col-sm-3">
										<input type="date" name="txtRdate" data-beatpicker="true" data-beatpicker-position="['right','*']" data-beatpicker-id="myDatePicker" class="form-control1" value="<?php echo $rdt;?>">
									</div>
									
								</div>
								
								<div class="form-group">
									<label for="exampleInputFile" class="col-sm-2 control-label">Attach charity commisioner certificate</label>
									<div class="col-sm-5">
										<input type="file" name="txtFile1">
									</div>
									 <div class="col-sm-5">
										<?php
											if($a!=""){
												$data="<embed src='$a' height='100' width='100'>";
											}
											else{
												$data="";
											}
											echo $data;
										?>
									</div>
 
									
						  		</div>
						  		<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Income tax 12A Registration No.</label>
									<div class="col-sm-3">
										<input type="text" name="txtRno12" class="form-control1" id="focusedinput" placeholder="Enter Registration No." data-bvalidator="alphanum" value="<?php echo $rno12;?>">
									</div>
									

									<label for="focusedinput" class="col-sm-2 control-label">Income tax 12A Registration Date</label>
									<div class="col-sm-3">
										<input type="date" name="txtRdate12" data-beatpicker="true" data-beatpicker-position="['right','*']" data-beatpicker-id="myDatePicker" class="form-control1" value="<?php echo $rdt12;?>">
									</div>
									
								</div>
						  		
						  	
						  		<div class="form-group">
									<label for="exampleInputFile" class="col-sm-2 control-label">Attach Income tax 12A certificate</label>
									<div class="col-sm-5">
										<input type="file" name="txtFile2">
									</div>
									 <div class="col-sm-5">
										<?php
											if($b!=""){
												$data="<embed src='$b' height='100' width='100'>";
											}
											else{
												$data="";
											}
											echo $data;
										?>
									</div>
									
						  		</div>
						  		<div class="form-group" >
									<label for="radio" class="col-sm-2 control-label">Do you have Income tax 80G?</label>
									<div class="col-sm-8" >
										<div class="radio block" id="showhide" >
											<label><input type="radio" name="Optgen" value="Yes" onclick="show2(); show4();" checked="">Yes</label>&nbsp;&nbsp;
											<label><input type="radio" name="Optgen" value="No" onclick="show1(); show3();" >No</label>
										</div>
									</div>
								</div>
							
						  		<div class="form-group" id="div1">
									<label for="focusedinput" class="col-sm-2 control-label">Income tax 80G Registration No.</label>
									<div class="col-sm-3">
										<input type="text" name="txtRno80" class="form-control1" id="focusedinput" placeholder="Enter Registration No." data-bvalidator="alphanum" value="<?php echo $rno80;?>">
									</div>
									

									<label for="focusedinput" class="col-sm-2 control-label">Income tax 80G Registration Date</label>
									<div class="col-sm-3">
										<input type="date" name="txtRdate80" class="form-control1" data-beatpicker="true" data-beatpicker-position="['right','*']" data-beatpicker-id="myDatePicker" value="<?php echo $rdt80;?>">
									</div>
									
								</div>
								<div class="form-group" id="div2" >
									<label for="exampleInputFile" class="col-sm-2 control-label">Attach Income tax 80G certificate</label>
									<div class="col-sm-5">
										<input type="file" name="txtFile3">
									</div>
									 <div class="col-sm-5">
										<?php
											if($c!=""){
												$data="<embed src='$c' height='100' width='100'>";
											}
											else{
												$data="";
											}
											echo $data;
										?>
									</div>
									
						  		</div>
						  		
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">PAN</label>
									<div class="col-sm-3">
										<input type="text" name="txtPno" class="form-control1" id="focusedinput" placeholder="Enter PAN No." data-bvalidator="alphanum" value="<?php echo $pno;?>">
									</div>

									<label for="focusedinput" class="col-sm-2 control-label">PAN Date</label>
									<div class="col-sm-3">
										<input type="date" name="txtRdatepan" class="form-control1" data-beatpicker="true" data-beatpicker-position="['right','*']" data-beatpicker-id="myDatePicker" value="<?php echo $rdtpan;?>">
									</div>
									
								</div>
						  		<div class="form-group">
									<label for="exampleInputFile" class="col-sm-2 control-label">Attach PANcard</label>
									<div class="col-sm-5">
										<input type="file" name="txtFile4" >
									</div>
									 <div class="col-sm-5">
										<?php
											if($e!=""){
												$data="<img src='$e' height='100' width='100'>";
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
									<?php
										if(isset($_GET["Id"]))
										{
											$data="<button class='btn-warning btn' name='btnSub'>NEXT</button>
											<button class='btn-warning btn' name='btnSub1'>SUBMIT</button>
											";
										}
										else{
											$data="<button class='btn-warning btn' name='btnSub'>NEXT</button>";
										}
										echo $data;
									?>
									
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