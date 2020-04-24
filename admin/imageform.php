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
	include_once("../class/Image.php");
	$obj1=new Image();
	$pnm=$vd=$state=$city=$file1=$a=$email="";
	$Iid=$filepath=$req=$event="";
	if(isset($_GET["Id"]))
	{
		$pid=$_GET["Id"];
		$rec=$obj->select1($pid);
		while($result=mysqli_fetch_array($rec))
		{
			$pnm=$result[1];
			$state=$result[2];
			$city=$result[3];
			$email=$result[15];
		}
		$rec1=$obj1->select2($pid);
		
		while($result1=mysqli_fetch_array($rec1))
		{	
			$Iid=$result1[0];
			$filepath=$result1[2];
			$a=$result1[3];
			$req=$result1[4];
			$event=$result1[5];
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

<div class="round"><a href="contactform.php?Id='.$pid.'"><span style="margin-top: 20px; float: left; width: 100%;">Contact<br>detail</span></a></div>
<div class="line"></div>

<div class="round"><a href="auditorform.php?Id='.$pid.'"><span style="margin-top: 20px; float: left; width: 100%;">Auditor<br>Detail</span></a></div>
<div class="line"></div>

<div class="round" id="round"><a href="imageform.php?Id='.$pid.'"><span style="margin-top: 20px; float: left; width: 100%;">Image<br>Detail</span></a></div></div>


				';
				echo $data1;	
	}
	
	
	if(isset($_POST["btnSub"]))
	{
		
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
			$req="../certificates/".$pnm.$state.$city.$file2;
		}
		$file3=$_FILES["txtFile3"]["name"];
		$file3s=$_FILES["txtFile3"]["size"];
		$file3t=$_FILES["txtFile3"]["type"];
		$file3tmp=$_FILES["txtFile3"]["tmp_name"];
		
		if($file3!="")
		{
			move_uploaded_file($file3tmp,"../certificates/".$pnm.$state.$city.$file3);
			$event="../certificates/".$pnm.$state.$city.$file3;
		}
		//$file_name_all1="";
		$obj1->set_Panjrapol_id($pid);
		$obj1->set_Images($filepath);
		$obj1->set_Video($a);
		$obj1->set_Request($req);
		$obj1->set_Event($event);
		if($Iid!=""){
			$obj1->set_Image_id($Iid);
			$obj1->update($obj1);
			echo "<script type='text/javascript'>alert('Your form updated successfully')</script>";
			echo "<script type='text/javascript'>location.href = 'displaypanjrapol.php'</script>";
		}
		else{
			$obj1->insert($obj1);
			if($email!=""){
				$headers = "MIME-Version: 1.0\r\n";
	                    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	                    $message="<p>વ્યવસ્થાપક શ્રી,
	                    		<b>".$pnm."</b>
આપના તરફથી આપની પાંજરાપોળની વિગતો જણાવતું ફોર્મ મળ્યું છે.
આપના શિઘ્ર સહકારની અમે અનુમોદના કરીએ છીએ અને હાર્દિક આભાર માનીએ છીએ..
આપની  પાંજરાપોળની વિગતો વેબસાઈટ પર મૂકી દેવામાં આવી છે.આપ panjarapole.jinshasan.com પર તે જોઈ શકશો.</p>";
	                    mail($email," Thanking mail !!!",$message,$headers);
						header('Content-type: application/json');
			}
			echo "<script type='text/javascript'>alert('Your form filled successfully')</script>";
			echo "<script type='text/javascript'>location.href = 'displaypanjrapol.php'</script>";
		}
	}
?>
<br><br>
				<div class="graphs">
						<div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							<form class="form-validate form-horizontal" id="frmregistration" method="post" enctype="multipart/form-data">
							<h3 class="blank1">Pictures, video and Event</h3>
						
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Panjarapole Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="focusedinput" disabled="" value="<?php echo $pnm;?>">
									</div>
									
								</div>
								<div class="form-group">
									<label for="exampleInputFile" class="col-sm-2 control-label">Add pictures</label>
									<div class="col-sm-3">
										<input type="file" name="FileImg[]" multiple="multiple">
									</div>
									
										
										<?php
											if($filepath!=""){
												$arraymenu=explode(',', $filepath);
												$data="";
												foreach($arraymenu as $array_menu)
	                							{
												$data.="<div class='col-sm-1'><embed src='".$array_menu."' height='100' width='100'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>";
												}
											}
											else{
												$data="";
											}
											echo $data;
										?>
									
									<div class="col-sm-2 jlkdfj1">
										<b><p class="help-block" style="color:red;">You can add more than one Pictures</p></b>
									</div>
									
						  		</div>
						  		<div class="form-group">
									<label for="exampleInputFile" class="col-sm-2 control-label">Add video</label>
									<div class="col-sm-3">
										<input type="file" name="txtFile1" >
									</div>
									
										<?php
											if($a!=""){
										
												$data1="<div class='col-sm-1'><video width='220' height='240' controls>
  										<source src='".$a."' type='video/mp4'>
  
											</video></div>";
											}
											else{
												$data1="";
											}
									
									echo $data1;
									?>
						  		</div>
						  		<div class="form-group">
									<label for="exampleInputFile" class="col-sm-2 control-label">Donation Request</label>
									<div class="col-sm-3">
										<input type="file" name="txtFile2" >
									</div>
									
										<?php
											if($req!=""){
										
												$data1="<div class='col-sm-1'><embed src='".$req."' height='100' width='100'>
  
											</div>";
											}
											else{
												$data1="";
											}
									
									echo $data1;
									?>
						  		</div>
						  		<div class="form-group">
									<label for="exampleInputFile" class="col-sm-2 control-label">Donation Event</label>
									<div class="col-sm-3">
										<input type="file" name="txtFile3" >
									</div>
									
										<?php
											if($event!=""){
										
												$data1="<div class='col-sm-1'><embed src='".$event."' height='100' width='100'>
  
											</div>";
											}
											else{
												$data1="";
											}
									
									echo $data1;
									?>
						  		</div>
						  		
						  		<br>
						  <div class="panel-footer">
							<div class="row">
								<div class="col-sm-3 col-sm-offset-9">
									<?php
										
											$data="<button class='btn-warning btn' name='btnSub'>SUBMIT</button>";
										
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