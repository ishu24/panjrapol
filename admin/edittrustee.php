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
include_once("../class/City.php");
$obj1=new City();
include_once("../class/State.php");
$obj2=new State();
include_once("../class/Trustee.php");
$obj4=new Trustee();

$pnm=$tnm=$pos=$city=$add=$con=$vt=$pid=$tid="";
if(isset($_GET["Id"]))
{
		$pid=$_GET["Id"];
		$rec=$obj->select1($pid);
		while($result=mysqli_fetch_array($rec))
		{
			$pnm=$result[1];
		}
	
}
if(isset($_GET["Id1"]))
	{
		$tid=$_GET["Id1"];
		$rec1=$obj4->select1($tid);
		
		while($result1=mysqli_fetch_array($rec1))
		{	
			$tnm=$result1[1];
			$pos=$result1[3];
			$add=$result1[4];
			$city=$result1[5];
			$con=$result1[6];
			$vt=$result1[7];
		}		
	}

if(isset($_POST["btnAdd"]))
{
	
		$tnm=$_POST["txtTnm"];
	$pos=$_POST["txtPos"];
	if(isset($_POST["optCt"]))
	{
			$city=$_POST["optCt"];
	}
	$add=$_POST["txtAdd"];
	$con=$_POST["txtCon"];
	$vt=$_POST["txtDt"];
	$obj4->set_Trustee_name($tnm);
	$obj4->set_Panjrapol_id($pid);
	$obj4->set_Position($pos);
	$obj4->set_Address($add);
	$obj4->set_City_id($city);
	$obj4->set_Mobile_no($con);
	$obj4->set_Validity_term($vt);
	if($tid!=""){
			$obj4->set_Trustee_id($tid);
			$obj4->update($obj4);
			echo '<script type="text/javascript">location.href = "trusteeform.php?Id='.$pid.'"</script>';
		}
	
	}
?>
			<div id="page-wrapper">
				<div class="graphs">
					<h3 class="blank1">Trustees' Details<?php echo "<a href='trusteeform.php?Id=".$pid."' style='float:right;'><u>BACK</u></a>" ;?></h3>
						<div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							<form class="form-validate form-horizontal" id="frmregistration" method="post">
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Panjarapole Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="focusedinput" disabled="" value="<?php echo $pnm;?>">
									</div>
									
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Trustee Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="focusedinput" data-bvalidator="alpha" placeholder="Enter Trustee Name" name="txtTnm" value="<?php echo $tnm;?>">
									</div>
									
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Position</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="focusedinput" placeholder="Enter position" value="<?php echo $pos;?>" data-bvalidator="alpha" name="txtPos">
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
									<label for="txtarea1" class="col-sm-2 control-label">Address</label>
									<div class="col-sm-8"><textarea  id="txtarea1" cols="50" rows="5" class="form-control" name="txtAdd"><?php echo $add;?></textarea></div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Mobile No.</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="focusedinput" placeholder="Enter Mobile No." name="txtCon" data-bvalidator="number,maxlength[13]" value="<?php echo $con;?>">
									</div>
									
								</div>
						  		<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Validity </label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="focusedinput" name="txtDt" data-bvalidator="alphanum" placeholder="Enter year" value="<?php echo $vt;?>">
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