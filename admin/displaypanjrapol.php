<?php
	include_once("header.php");
?>
<script type="text/javascript">
	function delete_id(id)
	{
		var r= confirm("Are you sure you want to delete?");
		
		if(r== true)
		{
			window.location.href='delete.php?tbl=panjrapol_detail&delete_id='+id;	
		}
		
	}
</script>
<script>
function showAllow(str) {
    if (str.length == 0) { 
        document.getElementById("Optallow").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("Optallow").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "setAllow_ajax.php?q=" + str, true);
        xmlhttp.send();
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
$rec=$obj->select();

			$data="<div id='page-wrapper'>
				<div class='graphs'>
					<h3 class='blank1'>Panjarapole List</h3>
						<div class='tab-content'>
						<div class='tab-pane active' id='horizontal-form'>
							
							
						 
							<div class='panel panel-warning' data-widget='{&quot;draggable&quot;: &quot;false&quot;}' data-widget-static=''>
							<div class='panel-body no-padding'>
								
							<br>
								<table class='table table-striped' id='basic-datatable'>
									<thead>
										<tr class='warning'>
											<th>Panjrapol Name</th>
											<th>Address</th>
											<th>Email</th>
											<th>Contact</th>
											<th>Foundation year</th>
											<th>Edit</th>
											<th>Delete</th>
										</tr>
									</thead>
									<tbody>";
	while($result=mysqli_fetch_array($rec))
{
	$rec1=$obj1->select1($result[3]);
	while ($result1=mysqli_fetch_array($rec1)) {

		$rec2=$obj2->select1($result1[2]);
	while ($result2=mysqli_fetch_array($rec2)) {
			$data.="
										<tr>
											<td>".$result[1]."</td>
											<td width='25%'>".$result[5].",".$result[6].",".$result1[1].",".$result2[1]."</td>
											<td>".$result[15]."</td>
											<td>".$result[16]."</td>
											<td>".$result[7]."</td>";
											/*if($result[19]==0){
												$data.="<td>
												<div class='radio block' id='showhide' >
											<label><input type='radio' name='Optallow' value='1' onChange='showAllow(this.value)'>Enable</label>&nbsp;&nbsp;
											<label><input type='radio' name='Optallow' value='0' checked=''>Disable</label>
										</div></td>";

											}
											else{
												$data.="<td>
												<div class='radio block' id='showhide' >
											<label><input type='radio' name='Optallow' value='1' checked=''>Enable</label>&nbsp;&nbsp;
											<label><input type='radio' name='Optallow' value='0' onChange='showAllow(this.value)'>Disable</label>
										</div></td>";
											}*/
											
											$data.="<td><a href='panjrapolform.php?Id=".$result[0]."'><i title='edit' class='fa fa-pencil'></i> </a></td>
											<td><a href='javascript:delete_id(".$result[0].")'><i title='Delete' class='fa fa-trash-o'></i></a></td>
										</tr>";
}}}
		$data.="</tbody></table>";
		echo $data;
?>
						</div>
						</div>
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
       <!-- Data Table -->
    <script src="js/jquery.dataTables.js"></script>
    <script src="js/DT_bootstrap.js"></script>
    <script src="js/jquery.dataTables-conf.js"></script>
</body>
</html>
