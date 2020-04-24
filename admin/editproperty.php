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
	include_once("../class/Property.php");
	$obj1=new Property();
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
	}
	
	$proid=$filepath="";
	if(isset($_GET["Id1"]))
	{
		$proid=$_GET["Id1"];
		$rec1=$obj1->select1($proid);
		
		while($result1=mysqli_fetch_array($rec1))
		{	
			$area=$result1[2];
			$filepath=$result1[3];
			$cap=$result1[4];
			$state=$result1[5];
			$city=$result1[6];
		}		
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
		if($proid!=""){
			$obj1->set_Property_id($proid);
			$obj1->update($obj1);
			echo '<script type="text/javascript">location.href = "propertyform.php?Id='.$pid.'"</script>';
		}
	}
?>
			<div id="page-wrapper">
				<div class="graphs">
					<h3 class="blank1">Property Details <?php echo "<a href='propertyform.php?Id=".$pid."' style='float:right;'><u>BACK</u></a>" ;?></h3>

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
							
									$data.="<label for='selector1' class='col-sm-2 control-label'>City</label>
									<div class='col-sm-3'>
									<select name='optCt' id='optCity' class='form-control' >
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
						  		
						  <div class="row">
								<div class="col-sm-3 col-sm-offset-9">
									<button class='btn-warning btn' name='btnSub'>UPDATE</button>
										
									
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