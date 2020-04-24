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

$pnm=$yr=$r4=$b4=$s4=$pid=$r=$s=$b="";
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
		$aid=$_GET["Id1"];
		$rec1=$obj1->select1($aid);
		
		while($result1=mysqli_fetch_array($rec1))
		{	
			
			$name=$result1[3];
			$contact=$result1[4];
			
		}		
	}
if(isset($_POST["btnSub"]))
{
	
	$obj1->set_Panjrapol_id($pid);
	
	for($i=0;$i<7;$i++)
	{
			$r[$i]=$_GET["txtRole"][$i];
			$n[$i]=$_POST["txtBig"][$i];
			$c[$i]=$_POST["txtSmall"][$i];
			$obj1->set_Role($r[$i]);
			$obj1->set_Name($n[$i]);
			$obj1->set_Contact($c[$i]);
			$obj1->insert($obj1);	
	}
}	
?>
			<div id="page-wrapper">
				<div class="graphs">
					<h3 class="blank1">Contact Details</h3>
						<div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							<form class="form-horizontal" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Panjarapole Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="focusedinput" disabled="" value="<?php echo $pnm;?>">
									</div>
									
								</div>
								
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