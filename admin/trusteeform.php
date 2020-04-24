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
	function delete_id(id,id1)
	{
		var r= confirm("Are you sure you want to delete?");
		
		if(r== true)
		{
			window.location.href='delete.php?tbl=trustee_detail& delete_id='+id+'&pid='+id1;	
		}
		
	}
</script>
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

$rec4=$obj4->select();
$data1='<div id="page-wrapper">
<div class="abc">
<div class="round"><a href="panjrapolform.php?Id='.$pid.'"><span style="margin-top: 20px; float: left; width: 100%;">Panjarapole<br>detail</span></a></div>
<div class="line"></div>

<div class="round" ><a href="propertyform.php?Id='.$pid.'"><span style="margin-top: 20px; float: left; width: 100%;">Property<br>detail</span></a></div>
<div class="line"></div>

<div class="round"><a href="bankform.php?Id='.$pid.'"><span style="margin-top: 20px; float: left; width: 100%;">Bank<br>detail</span></a></div>
<div class="line"></div>

<div class="round" id="round"><a href="trusteeform.php?Id='.$pid.'"><span style="margin-top: 20px; float: left; width: 100%;">Trustee<br>detail</span></a></div>
<div class="line"></div>

<div class="round"><a href="animalincomeexpform.php?Id='.$pid.'"><span>Animal<br>Income<br>Expense detail</span></a></div>
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
											<th>Trustee Name</th>
											<th>Position</th>
											<th>Address</th>
											<th>Mobile No.</th>
											<th>Validity </th>
											<th>Edit</th>
											<th>Delete</th>
										</tr></thead>";
while($result4=mysqli_fetch_array($rec4))
{
	if($result4[2]==$pid){
		
		$rec=$obj->select1($result4[2]);
	while ($result=mysqli_fetch_array($rec))
	 {
		$rec1=$obj1->select1($result4[5]);
		while ($result1=mysqli_fetch_array($rec1)) 
		{
			$rec2=$obj2->select1($result1[2]);
			while ($result2=mysqli_fetch_array($rec2))
			 {
			$data.="
										<tr>
											<td>".$result[1]."</td>
											<td>".$result4[1]."</td>
											<td>".$result4[3]."</td>
											<td>".$result4[4].",".$result1[1].",".$result2[1]."</td>
											<td>".$result4[6]."</td>
											<td>".$result4[7]."</td>
											<td><a href='edittrustee.php?Id1=".$result4[0]."&Id=".$result[0]."'><i title='Edit' class='fa fa-pencil'></i> </a></td>
											<td><a href='javascript:delete_id(".$result4[0].",".$result[0].")'><i title='Delete' class='fa fa-trash-o'></i> </a></td>
										</tr>";
	}}}
	
	}
}
	$data.="</tbody></table>";
		echo $data;	
}

if(isset($_POST["btnSub"]))
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
	
	$obj4->insert($obj4);
	
	echo "<script type='text/javascript'>location.href = 'animalincomeexpform.php?Id=".$pid."'</script>";
	
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
	
	$obj4->insert($obj4);
	echo "<script type='text/javascript'>location.href = 'trusteeform.php?Id=".$pid."'</script>";
}
if(isset($_POST["btnFinal"]))
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
	
	$obj4->insert($obj4);
	echo "<script type='text/javascript'>location.href = 'displaypanjrapol.php'</script>";
}
?>
			
				<div class="graphs">
					<h3 class="blank1">Trustees' Details</h3>
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
										<input type="text" class="form-control1" id="focusedinput" data-bvalidator="alpha" placeholder="Enter Trustee Name" name="txtTnm">
									</div>
									
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Position</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="focusedinput" data-bvalidator="alpha" placeholder="Enter position" name="txtPos">
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
												
													$data.="<option value='".$result1[0]."'>".$result1[1]."</option>";
												
											}
										
									$data.="</select></div></div>";
								
	echo $data;
?>
								<div class="form-group">
									<label for="txtarea1" class="col-sm-2 control-label">Address</label>
									<div class="col-sm-8"><textarea  id="txtarea1" cols="50" rows="5" class="form-control"  name="txtAdd"></textarea></div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Mobile No.</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="focusedinput" placeholder="Enter Mobile No." name="txtCon" data-bvalidator="number,maxlength[13]" >
									</div>
									
								</div>
						  		<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Validity </label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="focusedinput" data-bvalidator="alphanum" name="txtDt" placeholder="Enter year">
									</div>
									
								</div>
								
								<div class="form-group">
									<div class="row">
									<div class="col-sm-9">
										<a href="trusteeform.php?Id=".$pid."><button name="btnAdd" style="float: right;"><i class="fa fa-plus-circle icon_3" style="color:red;"></i>
									
										<b><p class="help-block" style="color:red; float:right;">Click here to Add more than one Trustee</p></b></button></a>
									
									&nbsp;&nbsp;&nbsp;&nbsp;
									</div>
									<div class="col-sm-3">
									<button class='btn-warning btn' name='btnSub'>NEXT</button>
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
}
	include_once("footer.php");
?>  
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
</body>
</html>