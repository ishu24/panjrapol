<?php
	include_once("header.php");
?>
<style>
.layout{
    border: none;
    background-color: #f9f9f9;
}

</style>

<?php
include_once("../class/Panjrapol.php");
$obj=new Panjrapol();
include_once("../class/Contact.php");
$obj1=new Contact();
$pid=$r=$n=$c="";
if(isset($_GET["Id"]))
{
		$pid=$_GET["Id"];
		$rec=$obj->select1($pid);
		while($result=mysqli_fetch_array($rec))
		{
			$pnm=$result[1];
		}
		$data1='<div id="page-wrapper">
<div class="abc">
<div class="round"><a href="panjrapolform.php?Id='.$pid.'"><span style="margin-top: 20px; float: left; width: 100%;">Panjarapole<br>detail</span></a></div>
<div class="line"></div>

<div class="round" ><a href="propertyform.php?Id='.$pid.'"><span style="margin-top: 20px; float: left; width: 100%;">Property<br>detail</span></a></div>
<div class="line"></div>

<div class="round" ><a href="bankform.php?Id='.$pid.'"><span style="margin-top: 20px; float: left; width: 100%;">Bank<br>detail</span></a></div>
<div class="line"></div>

<div class="round"><a href="trusteeform.php?Id='.$pid.'"><span style="margin-top: 20px; float: left; width: 100%;">Trustee<br>detail</span></a></div>
<div class="line"></div>

<div class="round"><a href="animalincomeexpform.php?Id='.$pid.'"><span>Animal<br>Income<br>Expense detail</span></a></div>
<div class="line"></div>

<div class="round" id="round"><a href="contactform.php?Id='.$pid.'"><span style="margin-top: 20px; float: left; width: 100%;">Contact<br>detail</span></a></div>
<div class="line"></div>

<div class="round"><a href="auditorform.php?Id='.$pid.'"><span style="margin-top: 20px; float: left; width: 100%;">Auditor<br>Detail</span></a></div>
<div class="line"></div>

<div class="round"><a href="imageform.php?Id='.$pid.'"><span style="margin-top: 20px; float: left; width: 100%;">Image<br>Detail</span></a></div></div>


				';
				
echo $data1;
}
if(isset($_POST["btnDis"]))
{
	
	$obj1->set_Panjrapol_id($pid);
	$rec1=$obj1->select2($pid);
		$total=mysqli_num_rows($rec1);	
		if($total>0){
			for($i=0;$i<$total;$i++)
				{
			$result1=mysqli_fetch_array($rec1);
				
						//print_r($result1);
						$n[$i]=$_POST["txtBig"][$i];
						$c[$i]=$_POST["txtSmall"][$i];
						$obj1->set_Name($n[$i]);
						$obj1->set_Contact($c[$i]);
						$obj1->set_Contact_id($result1[0]);
						//print_r($obj1);
						$obj1->update($obj1);
					
				}
		}
		else{
				for($i=0;$i<7;$i++)
				{
						$r[$i]=$_POST["txtRole"][$i];
						$n[$i]=$_POST["txtBig"][$i];
						$c[$i]=$_POST["txtSmall"][$i];
						$obj1->set_Role($r[$i]);
						$obj1->set_Name($n[$i]);
						$obj1->set_Contact($c[$i]);
						$obj1->insert($obj1);
					
				}
		}
	
	
	echo "<script type='text/javascript'>location.href = 'auditorform.php?Id=".$pid."'</script>";
}
?>
			<br><br>
				<div class="graphs">
					<h3 class="blank1">Contact Details</h3>
						<div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							<form class="form-validate form-horizontal" id="frmregistration" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Panjarapole Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="focusedinput" disabled="" value="<?php echo $pnm;?>">
									</div>
									
								</div>
								<br>
								
								<?php
$id=$_GET["Id"];
$rec1=$obj1->select2($id);
		$total=mysqli_num_rows($rec1);	
		if($total>0){
			?>
			<div class="ishani" style="float: left; margin-left: 213px;">
								<label style="margin-bottom: 35px;">Main executive trustee</label>
									<br>
								<label style="margin-bottom: 35px;">Local Person</label>
								<br>
								<label style="margin-bottom: 35px;">Panjrapole</label>
									<br>
								<label style="margin-bottom: 35px;">Mumbai</label>
									<br>
									<label style="margin-bottom: 35px;">Ahmedabad</label>
									<br>
									<label style="margin-bottom: 35px;">Surat</label>
									<br>
									<label style="margin-bottom: 35px;">Other</label>
								</div>
								<?php
			while($result1=mysqli_fetch_array($rec1))
				{	
					?>

							<label for="focusedinput" class="col-sm-1 control-label">Name</label>
									<div class="col-sm-3 form-group">
										<input type="text" class="form-control1" id="num1" placeholder="Enter Name" name="txtBig[]" data-bvalidator="alpha" value="<?php echo $result1[3]; ?>">
									</div>
									<label for="focusedinput" class="col-sm-1 control-label">Contact No.</label>
									<div class="col-sm-3 form-group">
										<input type="text" class="form-control1" id="num5" placeholder="Enter No." name="txtSmall[]" data-bvalidator="digit,maxlength[13]" value="<?php echo $result1[4]; ?>">
									</div>
					


						<?php 

							}
						}
							else{
								?>
								<br>
								<div class="form-group">
									<div class="col-sm-2 col-sm-offset-1">
									<input type="text" for="focusedinput" class="layout" name="txtRole[]" id="txtRole[]" value="Main executive trustee" >
									
								</div>
								<label for="focusedinput" class="col-sm-1 control-label">Name</label>
									<div class="col-sm-3">
										<input type="text" class="form-control1" id="num1" placeholder="Enter Name" name="txtBig[]" data-bvalidator="alpha">
									</div>
									<label for="focusedinput" class="col-sm-1 control-label">Contact No.</label>
									<div class="col-sm-3">
										<input type="text" class="form-control1" id="num5" placeholder="Enter No." name="txtSmall[]" data-bvalidator="digit,maxlength[13]" >
									</div>	
								</div>
								<div class="form-group">
									<div class="col-sm-2 col-sm-offset-1">
									<input type="text" for="focusedinput" class="layout" name="txtRole[]" id="txtRole[]" value="Local Person" >
								</div>
									<label for="focusedinput" class="col-sm-1 control-label">Name</label>
									<div class="col-sm-3">
										<input type="text" class="form-control1" id="num2" placeholder="Enter Name" name="txtBig[]" data-bvalidator="alpha" >
									</div>
									<label for="focusedinput" class="col-sm-1 control-label">Contact No.</label>
									<div class="col-sm-3">
										<input type="text" class="form-control1" id="num6" placeholder="Enter No." name="txtSmall[]" data-bvalidator="digit,maxlength[13]" >
									</div>	
								</div>
								<div class="form-group">
									<div class="col-sm-2 col-sm-offset-1">
									<input type="text" for="focusedinput" class="layout" name="txtRole[]" id="txtRole[]" value="Panjrapole"  >
								</div>
									<label for="focusedinput" class="col-sm-1 control-label">Name</label>
									<div class="col-sm-3">
										<input type="text" class="form-control1" id="num1" placeholder="Enter Name" name="txtBig[]" data-bvalidator="alpha">
									</div>
									<label for="focusedinput" class="col-sm-1 control-label">Contact No.</label>
									<div class="col-sm-3">
										<input type="text" class="form-control1" id="num5" placeholder="Enter No." name="txtSmall[]" data-bvalidator="digit,maxlength[13]" >
									</div>	
								</div>
								<div class="form-group">
									<div class="col-sm-2 col-sm-offset-1">
									<input type="text" for="focusedinput" class="layout" name="txtRole[]" id="txtRole[]" value="Mumbai" >
								</div>
									<label for="focusedinput" class="col-sm-1 control-label">Name</label>
									<div class="col-sm-3">
										<input type="text" class="form-control1" id="num1" placeholder="Enter Name" name="txtBig[]" data-bvalidator="alpha">
									</div>
									<label for="focusedinput" class="col-sm-1 control-label">Contact No.</label>
									<div class="col-sm-3">
										<input type="text" class="form-control1" id="num5" placeholder="Enter No." name="txtSmall[]" data-bvalidator="digit,maxlength[13]" >
									</div>	
								</div>
								<div class="form-group">
									<div class="col-sm-2 col-sm-offset-1">
									<input type="text" for="focusedinput" class="layout" name="txtRole[]" id="txtRole[]" value="Ahmedabad" >
								</div>
									<label for="focusedinput" class="col-sm-1 control-label">Name</label>
									<div class="col-sm-3">
										<input type="text" class="form-control1" id="num1" placeholder="Enter Name" name="txtBig[]" data-bvalidator="alpha">
									</div>
									<label for="focusedinput" class="col-sm-1 control-label">Contact No.</label>
									<div class="col-sm-3">
										<input type="text" class="form-control1" id="num5" placeholder="Enter No." name="txtSmall[]" data-bvalidator="digit,maxlength[13]" >
									</div>	
								</div>
								<div class="form-group">
									<div class="col-sm-2 col-sm-offset-1">
									<input type="text" for="focusedinput" class="layout" name="txtRole[]" id="txtRole[]" value="Surat" >
								</div>
									<label for="focusedinput" class="col-sm-1 control-label">Name</label>
									<div class="col-sm-3">
										<input type="text" class="form-control1" id="num1" placeholder="Enter Name" name="txtBig[]" data-bvalidator="alpha">
									</div>
									<label for="focusedinput" class="col-sm-1 control-label">Contact No.</label>
									<div class="col-sm-3">
										<input type="text" class="form-control1" id="num5" placeholder="Enter No." name="txtSmall[]" data-bvalidator="digit,maxlength[13]" >
									</div>	
								</div>
								<div class="form-group">
									<div class="col-sm-2 col-sm-offset-1">
									<input type="text" for="focusedinput" class="layout" name="txtRole[]" id="txtRole[]" value="Other" >
								</div>
									<label for="focusedinput" class="col-sm-1 control-label">Name</label>
									<div class="col-sm-3">
										<input type="text" class="form-control1" id="num1" placeholder="Enter Name" name="txtBig[]" data-bvalidator="alpha">
									</div>
									<label for="focusedinput" class="col-sm-1 control-label">Contact No.</label>
									<div class="col-sm-3">
										<input type="text" class="form-control1" id="num5" placeholder="Enter No." name="txtSmall[]" data-bvalidator="digit,maxlength[13]" >
									</div>	
								</div>
								<br>
								<?php 
							}
							 ?>
								 <div class="form-group">
									<div class="row">
									<div class="col-sm-9">
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