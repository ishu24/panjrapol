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
<script type="text/javascript">
	function delete_id(id,id1)
	{
		var r= confirm("Are you sure you want to delete?");
		
		if(r== true)
		{
			window.location.href='delete.php?tbl=bank_detail& delete_id='+id+'&pid='+id1;	
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
$rec4=$obj4->select();
$data1='<div id="page-wrapper">
<div class="abc">
<div class="round"><a href="panjrapolform.php?Id='.$pid.'"><span style="margin-top: 20px; float: left; width: 100%;">Panjarapole<br>detail</span></a></div>
<div class="line"></div>

<div class="round" ><a href="propertyform.php?Id='.$pid.'"><span style="margin-top: 20px; float: left; width: 100%;">Property<br>detail</span></a></div>
<div class="line"></div>

<div class="round" id="round"><a href="bankform.php?Id='.$pid.'"><span style="margin-top: 20px; float: left; width: 100%;">Bank<br>detail</span></a></div>
<div class="line"></div>

<div class="round"><a href="trusteeform.php?Id='.$pid.'"><span style="margin-top: 20px; float: left; width: 100%;">Trustee<br>detail</span></a></div>
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
											<th>Bank Name</th>
											<th>Branch Name</th>
											<th>IFSC</th>
											<th>Account No.</th>
											<th>Edit</th>
											<th>Delete</th>
										</tr>
									</thead>
									<tbody>";		
while($result4=mysqli_fetch_array($rec4))
{
	if($result4[1]==$pid){
		
	$rec=$obj->select1($result4[1]);
	while ($result=mysqli_fetch_array($rec))
	 {
		
			$data.="
										<tr>
											<td>".$result[1]."</td>
											<td>".$result4[2]."</td>
											<td>".$result4[3]."</td>
											
											<td>".$result4[4]."</td>
											<td>".$result4[5]."</td>
											<td><a href='editbank.php?Id1=".$result4[0]."&Id=".$result[0]."'><i title='Edit' class='fa fa-pencil'></i> </a></td>
											<td><a href='javascript:delete_id(".$result4[0].",".$result[0].")'><i title='Delete' class='fa fa-trash-o'></i> </a></td>
										</tr>";
	}
	
		}
}
$data.="</tbody></table>";
		echo $data;
		
}
if(isset($_POST["btnSub"]))
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
		if($bnm!=""){
			$obj4->insert($obj4);
		}
		echo "<script type='text/javascript'>location.href = 'trusteeform.php?Id=".$pid."'</script>";
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
		if($bnm!=""){
			$obj4->insert($obj4);
		}
		echo "<script type='text/javascript'>location.href = 'bankform.php?Id=".$pid."'</script>";
}
if(isset($_POST["btnFinal"]))
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
		if($bnm!=""){
			$obj4->insert($obj4);
		}
		echo "<script type='text/javascript'>location.href = 'displaypanjrapol.php'</script>";
}
?>
			
				<div class="graphs">
					<h3 class="blank1">Banks' Details</h3>
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
										<input type="text" class="form-control1" id="focusedinput" placeholder="Enter Bank Name" data-bvalidator="alpha" name="txtBnm">
									</div>
									
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Branch Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="focusedinput" data-bvalidator="alphanum" placeholder="Enter Branch Name" name="txtBrnm">
									</div>
									
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">IFSC</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="focusedinput" data-bvalidator="alphanum" placeholder="Enter IFSC" name="txtIfsc">
									</div>
									
								</div>
						  		<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Account No.</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="focusedinput" placeholder="Enter No." data-bvalidator="alphanum" name="txtAno">
									</div>
									
								</div>
								<div class="form-group">
									<div class="row">
									<div class="col-sm-9">
										<a href="bankform.php?Id=".$pid."><button name="btnAdd" style="float: right;"><i class="fa fa-plus-circle icon_3" style="color:red;"></i>
									
										<b><p class="help-block" style="color:red; float:right;">Click here to Add more than one bank</p></b></button></a>
									
									&nbsp;&nbsp;&nbsp;&nbsp;
									</div>
									<div class="col-sm-3">
									<button class='btn-warning btn' name='btnSub'>NEXT</button>
									<button class='btn-warning btn' name='btnFinal'>SUBMIT</button>
									
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
	include_once("footer.php");
?>  
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
</body>
</html>