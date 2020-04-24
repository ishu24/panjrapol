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
<style>
.layout{
    border: none;
    background-color: #f9f9f9;
}

</style>
<script type="text/javascript">
	$(document).ready(function() {
    //this calculates values automatically 
    sum();
    sum1();
    sum2();
    sum3();
    sum4();
    sum5();
    $("#num1, #num2, #num3, #num4").on("keydown keyup", function() {
        sum();
    });
    $("#num5, #num6, #num7, #num8").on("keydown keyup", function() {
        sum1();
    });
    $("#num9, #num10, #num11, #num12, #num13, #num14").on("keydown keyup", function() {
        sum2();
    });
    $("#num15, #num16, #num17, #num18").on("keydown keyup", function() {
        sum3();
    });
    $("#sum2, #sum3").on("keydown keyup", function() {
        sum4();
    });
    $("#num19, #num20, #num21").on("keydown keyup", function() {
        sum5();
    });
   
});
function sum6() {
            var num1 = document.getElementById("selector1").value;
			var result=num1.split('-');
           	document.getElementById("yr1").innerHTML = result[1];
			document.getElementById("yr2").innerHTML = result[0]; 
        }
function sum7() {
            var num1 = document.getElementById("selector1").value;
			var result=num1.split('-');
           	document.getElementById("yr3").innerHTML = result[1];
			document.getElementById("yr4").innerHTML = result[0]; 
        }
function sum() {
            var num1 = document.getElementById('num1').value;
            var num2 = document.getElementById('num2').value;
            var num3 = document.getElementById('num3').value;
            var num4 = document.getElementById('num4').value;
			var result = parseInt(num1) + parseInt(num2) -  parseInt(num3) - parseInt(num4);
			
            if (!isNaN(result)) {
                document.getElementById('sum').value = result;
				
            }
        }
function sum1() {
            var num5 = document.getElementById('num5').value;
            var num6 = document.getElementById('num6').value;
            var num7 = document.getElementById('num7').value;
            var num8 = document.getElementById('num8').value;
			var result = parseInt(num5) + parseInt(num6) -  parseInt(num7) - parseInt(num8);
			
            if (!isNaN(result)) {
                document.getElementById('sum1').value = result;
				
            }
        }
 function sum2() {
            var num9 = document.getElementById('num9').value;
            var num10 = document.getElementById('num10').value;
            var num11 = document.getElementById('num11').value;
            var num12 = document.getElementById('num12').value;
            var num13 = document.getElementById('num13').value;
            var num14 = document.getElementById('num14').value;
			var result = parseInt(num9) + parseInt(num10) + parseInt(num11) + parseInt(num12) + parseInt(num13) + parseInt(num14) ;
			
            if (!isNaN(result)) {
                document.getElementById('sum2').value = result;
				
            }
        }
 function sum3() {
            var num15 = document.getElementById('num15').value;
            var num16 = document.getElementById('num16').value;
            var num17 = document.getElementById('num17').value;
            var num18 = document.getElementById('num18').value;
            
			var result = parseInt(num15) + parseInt(num16) + parseInt(num17) + parseInt(num18);
			
            if (!isNaN(result)) {
                document.getElementById('sum3').value = result;
				
            }
        }
  function sum4() {
            var sum2 = document.getElementById('sum2').value;
            var sum3 = document.getElementById('sum3').value;
            
            
			var result = parseInt(sum2) - parseInt(sum3);
			
            if (!isNaN(result)) {
                document.getElementById('sum4').value = result;
				
            }
        }
function sum5() {
            var num19 = document.getElementById('num19').value;
            var num20 = document.getElementById('num20').value;
            var num21 = document.getElementById('num21').value;
            
            
			var result = parseInt(num19) + parseInt(num20) + parseInt(num21);
			
            if (!isNaN(result)) {
                document.getElementById('sum5').value = result;
				
            }
        }
</script>
<?php
include_once("../class/Panjrapol.php");
$obj=new Panjrapol();
include_once("../class/Animal.php");
$obj1=new Animal();
include_once("../class/Incomeexpense.php");
$obj2=new Incomeexpense();
$pid=$pnm=$yr=$r=$b=$s=$r4=$b4=$s4=$don=$don1=$sub=$divi=$oin=$cin=$tin=$gwexp=$adm=$adv=$cons=$texp=$net=$inv=$sav=$sha=$tinv=$file1=$a=$state=$city="";
if(isset($_GET["Id"]))
{
		$pid=$_GET["Id"];
		$yr=$_GET["yr"];
		$rec=$obj->select1($pid);
		while($result=mysqli_fetch_array($rec))
		{
			$pnm=$result[1];
			
		}
}	
if(isset($_POST["btnSub"]))
{
	if(isset($_POST["optYr"]))
	{
			$yr=$_POST["optYr"];
	}
	$obj1->set_Panjrapol_id($pid);
	$obj1->set_Year($yr);
	$rec1=$obj1->select3($pid,$yr);
		$total=mysqli_num_rows($rec1);	
		if($total>0){
			for($i=0;$i<$total;$i++)
				{
					$result1=mysqli_fetch_array($rec1);
					
						if($i==4)
						{
							//$r4=$_GET["txtRole4"];
							$b4=$b[0]+$b[1]-$b[2]-$b[3];
							$s4=$s[0]+$s[1]-$s[2]-$s[3];
							//$obj1->set_Role($r4);
							$obj1->set_Big($b4);
							$obj1->set_Small($s4);
							$obj1->set_Animal_id($result1[0]);
						//print_r($obj1);
						$obj1->update($obj1);
						}
						else{
							//$r[$i]=$_GET["txtRole"][$i];
							$b[$i]=$_POST["txtBig"][$i];
							$s[$i]=$_POST["txtSmall"][$i];
							//$obj1->set_Role($r[$i]);
							$obj1->set_Big($b[$i]);
							$obj1->set_Small($s[$i]);
							$obj1->set_Animal_id($result1[0]);
						//print_r($obj1);
						$obj1->update($obj1);
						}
						
					
				}
			}
				else{
						for($i=0;$i<=4;$i++)
	{
		if($i==4)
		{
			$r4=$_POST["txtRole4"];
			$b4=$b[0]+$b[1]-$b[2]-$b[3];
			$s4=$s[0]+$s[1]-$s[2]-$s[3];
			
					$obj1->set_Role($r4);
					$obj1->set_Big($b4);
					$obj1->set_Small($s4);
					$obj1->insert($obj1);
			
			
		}
		else{
			$r[$i]=$_POST["txtRole"][$i];
			$b[$i]=$_POST["txtBig"][$i];
			$s[$i]=$_POST["txtSmall"][$i];
			
					$obj1->set_Role($r[$i]);
					$obj1->set_Big($b[$i]);
					$obj1->set_Small($s[$i]);
					$obj1->insert($obj1);
			
		}
		
	}
				}	
	
	echo "<script type='text/javascript'>location.href = 'animalincomeexpform.php?Id=".$pid."'</script>";
}

?>


			<div id="page-wrapper">
				<div class="graphs">
					<h3 class="blank1">Animal Details<?php echo "<a href='animalincomeexpform.php?Id=".$pid."' style='float:right;'><u>BACK</u></a>" ;?></h3>
						<div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							<form class="form-horizontal" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Panjarapole Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="focusedinput" disabled="" value="<?php echo $pnm;?>">
									</div>
									
								</div>
								<div class="form-group">
									<label for="selector1" class="col-sm-2 control-label">Select Year</label>
									<div class="col-sm-3">
										<select name="optYr" id="selector1" class="form-control">
											<option value="">---select year---</option>
<?php
$date_y = date("Y");
$year =intval($date_y);
$years = $year-2;
do{
	$y1=$year-1;
	if($yr=="$y1-$year"){
		
		echo ("<option value='$yr' selected=''>$yr</option>");
	}
	else{
	    if($date_y == $year){
	    	
	        echo ("<option value='$year-$y1'>$year-$y1</option>");
	    }else{
	    	
	        echo ("<option value='$year-$y1'>$year-$y1</option>");
	    }
	}
    $year--;
}while($year>=$years);
?></select>
									</div>
								</div>
								
								<br><br>
								

								<?php
$id=$_GET["Id"];
$y=$_GET["yr"];
$rec1=$obj1->select3($id,$y);
		$total=mysqli_num_rows($rec1);	
		if($total>0){
			?>
			<div class="ishani" style="float: left; margin-left: 213px;">
								<label style="margin-bottom: 35px;">Opening Balance</label>
									<br>
								<label style="margin-bottom: 35px;">New Arrived</label>
								<br>
								<label style="margin-bottom: 35px;">Taken Away</label>
									<br>
								<label style="margin-bottom: 35px;">Died</label>
									<br>
									<label style="margin-bottom: 35px;">Closing Balance</label>
								</div>
			<?php
			while($result1=mysqli_fetch_array($rec1))
				{	
							
					
?>

								<label for="focusedinput" class="col-sm-1 control-label">Big</label>
									<div class="col-sm-3 form-group" style="">
										<input type="number" class="form-control1" id="num1" placeholder="Enter No." name="txtBig[]" value="<?php echo $result1[4]; ?>">
									</div>
									<label for="focusedinput" class="col-sm-1 control-label">Small</label>
									<div class="col-sm-3 form-group">
										<input type="number" class="form-control1" id="num5" placeholder="Enter No." name="txtSmall[]" value="<?php echo $result1[5]; ?>">
									</div>	
								
								
								<?php 

							}
						}
							else{
								?>
								<div class="form-group">
									<div class="col-sm-2 col-sm-offset-1">
										<input type="text" for="focusedinput" class="layout" name="txtRole[]" id="txtRole[]" value="Opening Balance" >
										
									</div>
									<label for="focusedinput" class="col-sm-1 control-label">Big</label>
										<div class="col-sm-3 form-group" style="">
											<input type="number" class="form-control1" id="num1" placeholder="Enter No." name="txtBig[]" value="0">
										</div>
									<label for="focusedinput" class="col-sm-1 control-label">Small</label>
										<div class="col-sm-3 form-group">
											<input type="number" class="form-control1" id="num5" placeholder="Enter No." name="txtSmall[]" value="0">
										</div>
								
									<div class="col-sm-2 col-sm-offset-1">
										<input type="text" for="focusedinput" class="layout" name="txtRole[]" id="txtRole[]" value="New Arrived" >
										
									</div>
									<label for="focusedinput" class="col-sm-1 control-label">Big</label>
									<div class="col-sm-3 form-group" style="">
										<input type="number" class="form-control1" id="num2" placeholder="Enter No." name="txtBig[]" value="0">
									</div>
									<label for="focusedinput" class="col-sm-1 control-label">Small</label>
									<div class="col-sm-3 form-group">
										<input type="number" class="form-control1" id="num6" placeholder="Enter No." name="txtSmall[]" value="0">
									</div>
								
									<div class="col-sm-2 col-sm-offset-1">
										<input type="text" for="focusedinput" class="layout" name="txtRole[]" id="txtRole[]" value="Taken Away" >
										
									</div>	
									<label for="focusedinput" class="col-sm-1 control-label">Big</label>
									<div class="col-sm-3 form-group" style="">
										<input type="number" class="form-control1" id="num3" placeholder="Enter No." name="txtBig[]" value="0">
									</div>
									<label for="focusedinput" class="col-sm-1 control-label">Small</label>
									<div class="col-sm-3 form-group">
										<input type="number" class="form-control1" id="num7" placeholder="Enter No." name="txtSmall[]" value="0">
									</div>	
								
									<div class="col-sm-2 col-sm-offset-1">
										<input type="text" for="focusedinput" class="layout" name="txtRole[]" id="txtRole[]" value="Died" >
										
									</div>
									<label for="focusedinput" class="col-sm-1 control-label">Big</label>
									<div class="col-sm-3 form-group" style="">
										<input type="number" class="form-control1" id="num4" placeholder="Enter No." name="txtBig[]" value="0">
									</div>
									<label for="focusedinput" class="col-sm-1 control-label">Small</label>
									<div class="col-sm-3 form-group">
										<input type="number" class="form-control1" id="num8" placeholder="Enter No." name="txtSmall[]" value="0">
									</div>
								
									<div class="col-sm-2 col-sm-offset-1">
										<input type="text" for="focusedinput" class="layout" name="txtRole4" id="txtRole4" value="Closing Balance" >
										
									</div>	
									<label for="focusedinput" class="col-sm-1 control-label">Big</label>
									<div class="col-sm-3 form-group" style="">
										<input type="number" class="form-control1" id="sum" placeholder="Enter No." name="txtBig[]" disabled="">
									</div>
									<label for="focusedinput" class="col-sm-1 control-label">Small</label>
									<div class="col-sm-3 form-group">
										<input type="number" class="form-control1" id="sum1" placeholder="Enter No." name="txtSmall[]" disabled="">
									</div>	
								</div>
								</div>
									<?php 
							}
							 ?>
							
						  <div class="panel-footer">
							<div class="row">
								<div class="col-sm-3 col-sm-offset-9">
									<button class="btn-warning btn" name="btnSub">UPDATE</button>
									
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