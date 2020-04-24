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
	function delete_id()
	{
		document.frm.action='delete.php?tbl=contact_detail';	
	}
	
</script>
<?php
include_once("../class/Panjrapol.php");
	$obj=new Panjrapol();
	include_once("../class/Contact.php");
	$obj1=new Contact();
	$rec=$obj1->select();
$total=mysqli_num_rows($rec);
$start=0;
$limit=7;
if(isset($_GET['id'])){
	$id=$_GET['id'];
	$start=($id-1)*$limit;
}
else{
	$id=1;
}

$page=ceil($total/$limit);
$rec=$obj1->sel($start,$limit);
$count=mysqli_num_rows($rec);
			$data="
			<div id='page-wrapper'>
				<div class='graphs'>
					<h3 class='blank1'>Contact Person Detail List</h3>
						<div class='tab-content'>
						<div class='tab-pane active' id='horizontal-form'>
							
							
						 
							<div class='panel panel-warning' data-widget='{&quot;draggable&quot;: &quot;false&quot;}' data-widget-static=''>
							<div class='panel-body no-padding'>
								
							<br>
							<form method='post' name='frm'>
								<table class='table table-striped'>
									<thead>
										<tr class='warning'>
											<th>Select</th>
											<th>Panjrapol Name</th>				
											<th>Role</th>
											<th>Name</th>
											<th>Contact No.</th>
											
										</tr>
									</thead>
									<tbody>";
				while($result=mysqli_fetch_array($rec))
{
	$rec1=$obj->select1($result[1]);
	while ($result1=mysqli_fetch_array($rec1)) {

									$data.="	<tr>
											<td><input type='checkbox' name='ch[]' value=".$result[0]."/></td>
											<td>".$result1[1]."</td>
											<td>".$result[2]."</td>
											<td>".$result[3]."</td>
											<td>".$result[4]."</td>
											
											
										</tr>";
									}}
									/*if($count>0){
										$data.="<td>
										<a href='editanimal.php?Id1=".$result[0]."&Id=".$result1[0]."'></a>
										
										<input type='submit' name='delete' value='DELETE' onclick='delete_id()'>
										</td>";
									}*/
		$data.="</tbody></table></form>";
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
