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
include_once("../class/State.php");
$obj=new State();
$state=$sid="";
if(isset($_GET["Id"]))
{
	$sid=$_GET["Id"];
	$rec=$obj->select1($sid);
	
	while($result=mysqli_fetch_array($rec))
	{
		$state=$result[1];
	}		
}
$rec=$obj->select();
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
$rec=$obj->sel($start,$limit);
		$data="	<div id='page-wrapper'>
				<div class='graphs'>
				<h3 class='blank1'>Add state</h3>
					<div class='tab-content'>
						<div class='tab-pane active' id='horizontal-form'>
						<div class='panel panel-warning' data-widget='{&quot;draggable&quot;: &quot;false&quot;}' data-widget-static=''>
							<div class='panel-body no-padding'>
							
								<table class='table table-striped'>
									<th>SR.No.</th>
									<th>State Name</th>
									<tbody>";
				$i=1;					
while($result=mysqli_fetch_array($rec))
{
	
			$data.="						<tr>
											<td>".$i++."</td>
											<td>".$result[1]."</td>
											
										</tr>";
		
}
$data.="</tbody></table>";
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
	$state=strtoupper($_POST["txtSt"]);
	$obj->set_State_name($state);
	if($sid!="")
	{
		$obj->set_State_id($sid);
		$obj->update($obj);
	//echo "<script type='text/javascript'>alert('data updated')</script>";
	echo "<script type='text/javascript'>location.href = 'displaystate.php'</script>";
	}
	else
	{
		$rec=$obj->select2($state);
		$t=mysqli_num_rows($rec);
		
		if ( $t> 0)
  		{
      		echo "<script type='text/javascript'>alert('data already exist')</script>";
      		echo "<script type='text/javascript'>location.href = 'addstate.php'</script>";
  		}
  		else{
  			$obj->insert($obj);
	//echo "<script type='text/javascript'>alert('data inserted')</script>";
	echo "<script type='text/javascript'>location.href = 'addstate.php'</script>";
  		}
	}
	

}
?>
							<form class="form-validate form-horizontal" id="frmregistration" method="post">
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">State*</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="focusedinput" placeholder="Enter State" name="txtSt" value="<?php echo $state;?>" data-bvalidator="alpha,required">
									</div>
									
								</div>
								
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