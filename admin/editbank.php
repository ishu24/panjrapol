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

include_once("../class/Bank.php");
$obj4=new Bank();

$pnm=$bnm=$brnm=$ifsc=$ano=$bid="";
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
		$bid=$_GET["Id1"];
		$rec1=$obj4->select1($bid);
		
		while($result1=mysqli_fetch_array($rec1))
		{	
			$bnm=$result1[2];
			$brnm=$result1[3];
			$ifsc=$result1[4];
			$ano=$result1[5];
		}		
	}
if(isset($_POST["btnAdd"]))
{
		$bnm=$_POST["txtBnm"];
		$brnm=$_POST["txtBrnm"];
		$ifsc=$_POST["txtIfsc"];
		$ano=$_POST["txtAno"];
		$obj4->set_Panjrapol_id($pid);
		$obj4->set_Bank_name($bnm);
		$obj4->set_Branch_name($brnm);
		$obj4->set_IFSC($ifsc);
		$obj4->set_Acc_no($ano);
		if($bid!=""){
			$obj4->set_Bank_id($bid);
			$obj4->update($obj4);
			echo '<script type="text/javascript">location.href = "bankform.php?Id='.$pid.'"</script>';
		}
		
}
?>
			<div id="page-wrapper">
				<div class="graphs">
					<h3 class="blank1">Banks' Details<?php echo "<a href='bankform.php?Id=".$pid."' style='float:right;'><u>BACK</u></a>" ;?></h3>
						<div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							<form class="form-validate form-horizontal" id="frmregistration" method="post">
								<div class="form-group">
									<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Panjarapole Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="focusedinput" disabled="" value="<?php echo $pnm;?>">
									</div>
									
								</div>
									<label for="focusedinput" class="col-sm-2 control-label">Bank Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="focusedinput" placeholder="Enter Bank Name" name="txtBnm" data-bvalidator="alpha" value="<?php echo $bnm;?>">
									</div>
									
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Branch Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="focusedinput" placeholder="Enter Branch Name" name="txtBrnm" data-bvalidator="alphanum" value="<?php echo $brnm;?>">
									</div>
									
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">IFSC</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="focusedinput" placeholder="Enter IFSC" name="txtIfsc" data-bvalidator="alphanum" value="<?php echo $ifsc;?>">
									</div>
									
								</div>
						  		<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Account No.</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="focusedinput" placeholder="Enter No." name="txtAno" data-bvalidator="alphanum" value="<?php echo $ano;?>">
									</div>
									
								</div>
								<div class="panel-footer">
							<div class="row">
								<div class="col-sm-3 col-sm-offset-9">
									<button class='btn-warning btn' name='btnAdd'>UPDATE</button>
										
									
								</div>
							</div>
						 </div>
								
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