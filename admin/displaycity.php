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
	function delete_id(id)
	{
		var r= confirm("Are you sure you want to delete?");
		
		if(r==true)
		{
			window.location.href='delete.php?tbl=city_detail& delete_id='+id;	
		}
		
	}
</script>
<?php
include_once("../class/State.php");
$obj1=new State();
include_once("../class/City.php");
$obj=new City();
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
			$data="<div id='page-wrapper'>
				<div class='graphs'>
					<h3 class='blank1'>City List</h3>
						<div class='tab-content'>
						<div class='tab-pane active' id='horizontal-form'>
							
							
						 
							<div class='panel panel-warning' data-widget='{&quot;draggable&quot;: &quot;false&quot;}' data-widget-static=''>
							<div class='panel-body no-padding'>
								<div class='row'>
								<div class='col-sm-1 col-sm-offset-11'>
									<a href='addcity.php'><button class='btn-warning btn'>ADD</button></a>
									
								</div>
							</div>
							<br>
								<table class='table table-striped'>
									<thead>
										<tr class='warning'>
											<th>Sr No.</th>
											<th>City Name</th>
											<th>State Name</th>
											<th>Edit</th>
											<th>Delete</th>
										</tr>
									</thead>
									<tbody>";
$i=1;
while($result=mysqli_fetch_array($rec))
{
	$rec1=$obj1->select1($result[2]);
	while ($result1=mysqli_fetch_array($rec1)) {
		
			$data.="	<tr>
											<td>".$i++."</td>
											<td>".$result[1]."</td>
											<td>".$result1[1]."</td>
											<td><a href='addcity.php?Id=".$result[0]."'><i class='fa fa-pencil'></i></a></td>
											<td><a href='javascript:delete_id(".$result[0].")'><i class='fa fa-trash-o'></i></a></td>
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
						</div>
						</div>
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
