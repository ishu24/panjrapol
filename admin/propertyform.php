
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
			window.location.href='delete.php?tbl=property_detail& delete_id='+id+'&pid='+id1;	
		}
		
	}
</script>
<?php
include_once("../class/Panjrapol.php");
	$obj=new Panjrapol();
	include_once("../class/Property.php");
	$obj1=new Property();
	include_once("../class/City.php");
$obj3=new City();
include_once("../class/State.php");
$obj2=new State();
	$pnm=$cap=$area=$file1=$pid=$proid=$filepath=$state=$city="";
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
$rec1=$obj1->select();
$data1='
<div id="page-wrapper">
<div class="abc">
<div class="round"><a href="panjrapolform.php?Id='.$pid.'"><span style="margin-top: 20px; float: left; width: 100%;">Panjarapole<br>detail</span></a></div>
<div class="line"></div>

<div class="round" id="round"><a href="propertyform.php?Id='.$pid.'"><span style="margin-top: 20px; float: left; width: 100%;">Property<br>detail</span></a></div>
<div class="line"></div>

<div class="round"><a href="bankform.php?Id='.$pid.'"><span style="margin-top: 20px; float: left; width: 100%;">Bank<br>detail</span></a></div>
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
											<th>City</th>
											<th>State</th>
											<th>Area Sq.ft.</th>
											<th>Installed capacity</th>
											<th>Edit</th>
											<th>Delete</th>
										</tr>
									</thead>
									<tbody>";	

while($result1=mysqli_fetch_array($rec1))
{
	if($result1[1]==$pid)
	{		
	$rec=$obj->select1($result1[1]);
	while ($result=mysqli_fetch_array($rec))
	 {
		$rec3=$obj3->select1($result1[6]);
		while ($result3=mysqli_fetch_array($rec3)) 
		{
			$rec2=$obj2->select1($result1[5]);
			while ($result2=mysqli_fetch_array($rec2))
			 {
			$data.="
										<tr>
											<td>".$result[1]."</td>
											<td>".$result3[1]."</td>
											<td>".$result2[1]."</td>
											<td>".$result1[2]."</td>
											<td>".$result1[4]." Animals</td>
											<td width='8%'><a href='editproperty.php?Id1=".$result1[0]."&Id=".$result[0]."'><i title='Edit' class='fa fa-pencil'></i> </a></td>
											<td width='8%'><a href='javascript:delete_id(".$result1[0].",".$result[0].")'><i title='Delete' class='fa fa-trash-o'></i> </a></td>
										</tr>";
			}
		}
	}
	
	}
	
}
$data.="</tbody></table>";
		echo $data;
		
}
	$proid=$filepath="";
	if(isset($_POST["btnAdd"]))
	{
		$area=$_POST["txtArea"];
		$file_name_all1="";
    							
    							if(isset($_FILES['FileImg'])){
    								
    							foreach($_FILES["FileImg"]["name"] as $file=>$name)
    							{
    									$menuimage=$_FILES["FileImg"]["name"][$file];
	    								$menuimage_tmp=$_FILES["FileImg"]["tmp_name"][$file];
	    								$path="../certificates/".$pnm.$state.$city.$menuimage;
	                  					$pathmenu=preg_replace("/\s+/","",$path);
	                  					$menuimage_ext=array('jpg','png','gif','jpeg','pdf','doc');
	                  					$upload_menuimage_ext=pathinfo($menuimage,PATHINFO_EXTENSION);
	                  					//list($txt, $ext) = explode(".", $menuimage);
	                
	                  					if(move_uploaded_file($menuimage_tmp, $pathmenu))
	                  					{
	                  						$file_name_all1.=$path.",";
	                  						$filepath = rtrim($file_name_all1,',');
	                  					}

	                  			}
	                  		}
		$cap=$_POST["txtCap"];
		if(isset($_POST["optSt"]))
		{
			$state=$_POST["optSt"];
		}
		if(isset($_POST["optCt"]))
		{
			$city=$_POST["optCt"];
		}
		$obj1->set_Panjrapol_id($pid);
		$obj1->set_Area_sq_ft($area);
		$obj1->set_Evidence($filepath);
		$obj1->set_Installed_capacity($cap);
		$obj1->set_State_id($state);
		$obj1->set_City_id($city);
		
		$obj1->insert($obj1);
		echo "<script type='text/javascript'>location.href = 'propertyform.php?Id=".$pid."'</script>";
		
	}
	if(isset($_POST["btnSub"]))
	{
		$area=$_POST["txtArea"];
		$file_name_all1="";
    							
    							if(isset($_FILES['FileImg'])){
    								
    							foreach($_FILES["FileImg"]["name"] as $file=>$name)
    							{
    									$menuimage=$_FILES["FileImg"]["name"][$file];
	    								$menuimage_tmp=$_FILES["FileImg"]["tmp_name"][$file];
	    								$path="../certificates/".$pnm.$state.$city.$menuimage;
	                  					$pathmenu=preg_replace("/\s+/","",$path);
	                  					$menuimage_ext=array('jpg','png','gif','jpeg','pdf','doc');
	                  					$upload_menuimage_ext=pathinfo($menuimage,PATHINFO_EXTENSION);
	                  					//list($txt, $ext) = explode(".", $menuimage);
	                
	                  					if(move_uploaded_file($menuimage_tmp, $pathmenu))
	                  					{
	                  						$file_name_all1.=$path.",";
	                  						$filepath = rtrim($file_name_all1,',');
	                  					}

	                  			}
	                  		}
		$cap=$_POST["txtCap"];
		if(isset($_POST["optSt"]))
		{
			$state=$_POST["optSt"];
		}
		if(isset($_POST["optCt"]))
		{
			$city=$_POST["optCt"];
		}
		$obj1->set_Panjrapol_id($pid);
		$obj1->set_Area_sq_ft($area);
		$obj1->set_Evidence($filepath);
		$obj1->set_Installed_capacity($cap);
		$obj1->set_State_id($state);
		$obj1->set_City_id($city);
		
		$obj1->insert($obj1);
		echo "<script type='text/javascript'>location.href = 'bankform.php?Id=".$pid."'</script>";
		
	}
	if(isset($_POST["btnFinal"]))
	{
		$area=$_POST["txtArea"];
		$file_name_all1="";
    							
    							if(isset($_FILES['FileImg'])){
    								
    							foreach($_FILES["FileImg"]["name"] as $file=>$name)
    							{
    									$menuimage=$_FILES["FileImg"]["name"][$file];
	    								$menuimage_tmp=$_FILES["FileImg"]["tmp_name"][$file];
	    								$path="../certificates/".$pnm.$state.$city.$menuimage;
	                  					$pathmenu=preg_replace("/\s+/","",$path);
	                  					$menuimage_ext=array('jpg','png','gif','jpeg','pdf','doc');
	                  					$upload_menuimage_ext=pathinfo($menuimage,PATHINFO_EXTENSION);
	                  					//list($txt, $ext) = explode(".", $menuimage);
	                
	                  					if(move_uploaded_file($menuimage_tmp, $pathmenu))
	                  					{
	                  						$file_name_all1.=$path.",";
	                  						$filepath = rtrim($file_name_all1,',');
	                  					}

	                  			}
	                  		}
		$cap=$_POST["txtCap"];
		if(isset($_POST["optSt"]))
		{
			$state=$_POST["optSt"];
		}
		if(isset($_POST["optCt"]))
		{
			$city=$_POST["optCt"];
		}
		$obj1->set_Panjrapol_id($pid);
		$obj1->set_Area_sq_ft($area);
		$obj1->set_Evidence($filepath);
		$obj1->set_Installed_capacity($cap);
		$obj1->set_State_id($state);
		$obj1->set_City_id($city);
		
		$obj1->insert($obj1);
		echo "<script type='text/javascript'>location.href = 'displaypanjrapol.php'</script>";
		
	}
?>
			
				<div class="graphs">
					<h3 class="blank1">Property Details</h3>
						<div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							<form class="form-validate form-horizontal" id="frmregistration" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Panjarapole Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="focusedinput" disabled="" value="<?php echo $pnm;?>">
									</div>
									
								</div>
<?php
include_once("../class/State.php");
$obj=new State();
$rec=$obj->select();
include_once("../class/City.php");
$obj1=new City();
$rec1=$obj1->select();
								$data="<div class='form-group'>
									<label for='selector1' class='col-sm-2 control-label'>State</label>
									<div class='col-sm-3'>
									<select name='optSt' id='selector1' class='form-control' onChange='showCity(this.value)'>
										<option value=''>------Select State------</option>";
										while ($result1=mysqli_fetch_array($rec1))
										{
											while ($result=mysqli_fetch_array($rec))
											{
												
												
													$data.="<option value='".$result[0]."'>".$result[1]."</option>";
												
											}
										}
										
										
									$data.="</select></div>";
include_once("../class/City.php");
$obj1=new City();
$rec1=$obj1->select();	
							
									$data.="<label for='selector1' class='col-sm-2 control-label'>City</label>
									<div class='col-sm-3'>
									<select name='optCt' id='optCity' class='form-control' >
										<option value=''>------Select City------</option>";
										
											while ($result1=mysqli_fetch_array($rec1))
											{
												
													$data.="<option value='".$result1[0]."'>".$result1[1]."</option>";
												
											}
										
										
									$data.="</select></div></div>";
								
	echo $data;
?>								
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Area(Sq.mt.)</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="focusedinput" placeholder="Enter Sq.mt." name="txtArea" data-bvalidator="digit" value="<?php echo $area;?>">
									</div>
									
								</div>
								
								
								<div class="form-group">
									<label for="exampleInputFile" class="col-sm-2 control-label">Attach Evidence</label>
									<div class="col-sm-3">
										<input type="file" name="FileImg[]" multiple="multiple">
									</div>
									
										
										<?php
											if($filepath!=""){
												$arraymenu=explode(',', $filepath);
												$data="";
												foreach($arraymenu as $array_menu)
	                							{
												$data.="<div class='col-sm-1'><embed src='".$array_menu."' width='100' height='100' />&nbsp;&nbsp;&nbsp;</div>";
												}
											}
											else{
												$data="";
											}
											echo $data;
										?>
									
									<div class="col-sm-2 jlkdfj1">
										<b><p class="help-block" style="color:red;">You can attach more than one Evidence</p></b>
									</div>
									
						  		</div>
						  		
						  		<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Installed Capacity</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="focusedinput" placeholder="Enter No." name="txtCap" data-bvalidator="digit" value="<?php echo $cap;?>">
									</div>
									
								</div>
						  		
						  <div class="form-group">
									<div class="row">
									<div class="col-sm-9">
										<a href="trusteeform.php?Id=".$pid."><button name="btnAdd" style="float: right;"><i class="fa fa-plus-circle icon_3" style="color:red;"></i>
									
										<b><p class="help-block" style="color:red; float:right;">Click here to Add more than one Property</p></b></button></a>
									
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

	include_once("footer.php");
?>  
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
</body>
</html>