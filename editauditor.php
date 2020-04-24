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
<?php
	include_once("../class/Panjrapol.php");
	$obj=new Panjrapol();
	include_once("../class/Auditor.php");
	$obj2=new Auditor();
	$pnm=$vd=$state=$city=$file1=$a="";
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
	}
	$Aid=$anm=$mob=$rno="";
	if(isset($_GET["Id1"]))
	{
		$Aid=$_GET["Id1"];
		$rec1=$obj2->display1($Aid);
		
		while($result1=mysqli_fetch_array($rec1))
		{	
			
			$anm=$result1[2];
			$city=$result1[3];
			$rno=$result1[4];
			$mob=$result1[5];
			
		}		
	}
	if(isset($_POST["btnAdd"]))
	{
		$anm=$_POST["txtAnm"];
		if(isset($_POST["optCt"]))
		{
			$city=$_POST["optCt"];
		}
		$rno=$_POST["txtRno"];
		$mob=$_POST["txtMob"];
		$obj2->set_Panjrapol_id($pid);
		$obj2->set_Auditor_name($anm);
		$obj2->set_City_id($city);
		$obj2->set_CA_registration_no($rno);
		$obj2->set_Mobile_no($mob);

		if($Aid!=""){
			$obj2->set_Auditor_id($Aid);
			$obj2->update($obj2);
			echo "<script type='text/javascript'>location.href = 'displayauditor.php'</script>";
		}
	}
?>
<div id="page-wrapper">
				<div class="graphs">
					<h3 class="blank1">Auditor Details</h3>
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
									<label for="focusedinput" class="col-sm-2 control-label">Auditor Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="focusedinput" name="txtAnm" placeholder="Enter Name" value="<?php echo $anm;?>">
									</div>
									
								</div>
								<?php
include_once("../class/State.php");
$obj=new State();
$rec=$obj->select();
								$data="<div class='form-group'>
									<label for='selector1' class='col-sm-2 control-label'>State</label>
									<div class='col-sm-3'>
									<select name='optSt' id='selector1' class='form-control' onChange='showCity(this.value)''>
										<option value=''>------Select State------</option>";
										while ($result=mysqli_fetch_array($rec))
											{
												$data.="<option value='".$result[0]."'>".$result[1]."</option>";
											}
										
										
									$data.="</select></div>";
include_once("../class/City.php");
$obj1=new City();
$rec1=$obj1->select();								
									$data.="<label for='selector1' class='col-sm-2 control-label'>City</label>
									<div class='col-sm-3'>
									<select name='optCt' id='optCity' class='form-control'>
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
									<label for="focusedinput" class="col-sm-2 control-label">CA Registration No.</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="focusedinput" name="txtRno" placeholder="Enter Registration No." data-bvalidator="alphanum" value="<?php echo $rno;?>">
									</div>
									
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Mobile No.</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="focusedinput" name="txtMob" placeholder="Enter Contact No." data-bvalidator="number,maxlength[13]" value="<?php echo $mob;?>">
									</div>
									
								</div>
						  		
						  <div class="panel-footer">
							<div class="row">
								<div class="col-sm-3 col-sm-offset-9">
									<button class='btn-warning btn' name='btnAdd'>UPDATE</button>
										
									
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