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
<?php

include_once("../class/City.php");
$obj1=new City();
include_once("../class/State.php");
$obj=new State();
$state=$city=$cid="";
if(isset($_GET["Id"]))
{
	$cid=$_GET["Id"];
	$rec=$obj1->select1($cid);
	
	while($result=mysqli_fetch_array($rec))
	{
		$city=$result[1];
		$state=$result[2];
	}		
}
$rec=$obj1->select();
$total=mysqli_num_rows($rec);
$start=0;
$limit=4;
if(isset($_GET['id'])){
	$id=$_GET['id'];
	$start=($id-1)*$limit;
}
else{
	$id=1;
}

$page=ceil($total/$limit);
$rec=$obj1->sel($start,$limit);
			$data="<div id='page-wrapper'>
				<div class='graphs'>
					<h3 class='blank1'>Add City</h3>
						<div class='tab-content'>
						<div class='tab-pane active' id='horizontal-form'>
							
							
						 
							<div class='panel panel-warning' data-widget='{&quot;draggable&quot;: &quot;false&quot;}' data-widget-static=''>
							<div class='panel-body no-padding'>
								
							<br>
								<table class='table table-striped'>
									<th>SR.No.</th>
									<th>State Name</th>
									<th>City Name</th>
									<tbody>";
$i=1;
while($result=mysqli_fetch_array($rec))
{
	$rec1=$obj->select1($result[2]);
	while ($result1=mysqli_fetch_array($rec1)) {
		
			$data.="	<tr>
											<td>".$i++."</td>
											<td>".$result[1]."</td>
											<td>".$result1[1]."</td>
											
										</tr>";
}
}
$data.="										
									</tbody>
								</table>";
			
       echo $data;
?>
<ul class="pagination">
<?php
if($id>1){
	

?>
<li><a href="?id=<?php echo ($id-1) ;?>">Previous</a></li>
<?php

}
?>
<?php
	for($i=1;$i<=$page;$i++){
		
?>

		<li><a href="?id=<?php echo $i ;?>"><?php echo $i ;?></a></li>
		<?php
	}
		?>
		<?php
if($id!=$page){	
?>
<li><a href="?id=<?php echo ($id+1) ;?>">Next</a></li>
<?php

}
?>
		</ul>	
<?php
if(isset($_POST["btnSub"]))
{
	$city=strtoupper($_POST["txtCt"]);
	if(isset($_POST["optSt"]))
	{
		$state=$_POST["optSt"];
	}
	$obj1->set_City_name($city);
	$obj1->set_State_id($state);
	if($cid!="")
	{
		$obj1->set_City_id($cid);
		$obj1->update($obj1);
	//echo "<script type='text/javascript'>alert('data updated')</script>";
	echo "<script type='text/javascript'>location.href = 'displaycity.php'</script>";
	}
	else
	{
		$rec=$obj1->select3($city);
		$t=mysqli_num_rows($rec);
		
		if ( $t> 0)
  		{
      		echo "<script type='text/javascript'>alert('data already exist')</script>";
      		echo "<script type='text/javascript'>location.href = 'addcity.php'</script>";
  		}
  		else{
  			$obj1->insert($obj1);
	//echo "<script type='text/javascript'>alert('data inserted')</script>";
	echo "<script type='text/javascript'>location.href = 'addcity.php'</script>";
  		}
	}
	

}
?>
			
							<form class="form-validate form-horizontal" id="frmregistration" method="post">
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">City*</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="focusedinput" placeholder="Enter City" name="txtCt" value="<?php echo $city;?>" data-bvalidator="alpha,required">
									</div>
									
								</div>

<?php
include_once("../class/State.php");
$obj=new State();
$rec=$obj->select();

								$data="<div class='form-group'>
									<label for='selector1' class='col-sm-2 control-label'>State*</label>
									<div class='col-sm-8'>
									<select name='optSt' id='selector1' class='form-control' data-bvalidator='required'>
										<option value=''>----select state---</option>
										";
										
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
										
										
									$data.="</select></div>
								</div>";
								echo $data;
?>
						  <div class="panel-footer">
							<div class="row">
								<div class="col-sm-7 col-sm-offset-5">
									<?php
										if(isset($_GET["Id"]))
										{
											$data="<button class='btn-warning btn' name='btnSub'>UPDATE</button>";
										}
										else{
											$data="<button class='btn-warning btn' name='btnSub'>NEXT</button>";
										}
										echo $data;
									?>
									
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