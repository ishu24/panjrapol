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
		
		if(r== true)
		{
			window.location.href='delete.php?tbl=incomeexpense_detail& delete_id='+id;	
		}
		
	}
</script>
<?php
include_once("../class/Panjrapol.php");
	$obj=new Panjrapol();
	include_once("../class/Incomeexpense.php");
	$obj1=new IncomeExpense();
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
			$data="
			<div id='page-wrapper'>
				<div class='graphs'>
					<h3 class='blank1'>Income-Expense,Investment List</h3>
						<div class='tab-content'>
						<div class='tab-pane active' id='horizontal-form'>
							
							
						 
							<div class='panel panel-warning' data-widget='{&quot;draggable&quot;: &quot;false&quot;}' data-widget-static=''>
							<div class='panel-body no-padding'>
								
							<br>
								<table class='table table-striped'>
									<thead>
										<tr class='warning'>
											<th>Panjrapol Name</th>
											<th>Year</th>
											<th>Total Income</th>
											<th>Total Expense</th>
											<th>Total Net</th>
											<th>Total Investment</th>
											<th>Edit</th>
											<th>Delete</th>
										</tr>
									</thead>
									<tbody>";
									while($result=mysqli_fetch_array($rec))
{
	$rec1=$obj->select1($result[1]);
	while ($result1=mysqli_fetch_array($rec1)) {

									$data.="	<tr>
											<td>".$result1
											[1]."</td>
											<td>".$result[2]."</td>
											<td>".$result[9]." RS/-</td>
											<td>".$result[14]." RS/-</td>
											<td>".$result[15]." RS/-</td>
											<td>".$result[19]." RS/-</td>
											<td><a href='editincomeexp.php?Id1=".$result[0]."&Id=".$result1[0]."'><i class='fa fa-pencil'></i> </a></td>
											<td><a href='javascript:delete_id(".$result[0].")'><i class='fa fa-trash-o'></i> </a></td>
										</tr>";
									}}
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
