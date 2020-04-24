<?php
include_once("header.php");
?>
<style type="text/css">
	.formRight select {
    background: none repeat scroll 0 0 #FFFFFF;
    border: 1px solid #E5E5E5;
    border-radius: 5px 5px 5px 5px;
    box-shadow: 0 0 10px #E8E8E8 inset;
    height: 40px;
    margin: 0 0 0 25px;
    padding: 10px;
    width: 220px;
}
.rcorners3 {
    border-radius: 15px 15px;
    background: #fff;
    padding: 20px; 
    width: 190px;
    height: 50px; 
}

.btn-primary{
border-radius: 15px 20px;	
	padding: 10px; 
	width: 150px;
    height: 40px;
    font-size: 16px;
    background-color: slategrey;
}
</style>
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
function showPanjrapol(str) {
    if (str.length == 0) { 
        document.getElementById("optPan").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("optPan").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "getPanjrapol_ajax.php?q=" + str, true);
        xmlhttp.send();
    }
}
function showDetail(str) {
    if (str.length == 0) { 
        document.getElementById("Pan").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("Pan").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "getDetail_ajax.php?q=" + str, true);
        xmlhttp.send();
    }
}
function showDetail1(str) {
    if (str.length == 0) { 
        document.getElementById("Pan").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("Pan").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "getDetail1_ajax.php?q=" + str, true);
        xmlhttp.send();
    }
}
function showDetail2(str) {
    if (str.length == 0) { 
        document.getElementById("Pan").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("Pan").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "getDetail2_ajax.php?q=" + str, true);
        xmlhttp.send();
    }
}
</script>

<!-- banner -->
	<div class="banner">
		<div class="container">
			<div id="page-wrapper" >
				<div class="graphs">
					<h3 class="blank1"><center>Panjarapole Details</center></h3>
					<br><br>
						<div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							<form class="form-horizontal" method="post" enctype="multipart/form-data">
<?php
include_once("../class/State.php");
$obj=new State();
$rec=$obj->select();
include_once("../class/City.php");
$obj1=new City();
$rec1=$obj1->select();


if(isset($_POST["btnAlpha"]))
{
	if(isset($_POST["optPn"]))
	{
			$pid=$_POST["optPn"];
	}
	echo "<script type='text/javascript'>location.href = 'alphabeticview.php'</script>";
}

								$data="<div class='row'>
								<label for='selector1' class='col-sm-2 control-label'>Summary View ::</label>
								
									<label for='selector1' class='col-sm-1 control-label'>State</label>
									<div class='col-sm-2'>
									<div class='form-group'>
									<select name='optSt' id='selector1' class='form-control' onChange='showDetail1(this.value); showCity(this.value);'>
										<option value=''>-------- Select State --------</option>";
										while ($result1=mysqli_fetch_array($rec1))
										{
											while ($result=mysqli_fetch_array($rec))
											{
													$data.="<option value='".$result[0]."'>".$result[1]."</option>";	
											}
										}
										
										
									$data.="</select></div></div>";
include_once("../class/City.php");
$obj1=new City();
$rec1=$obj1->select();	
							
									$data.="<label for='selector1' class='col-sm-1 control-label'>City</label>
									<div class='col-sm-2'>
									<div class='form-group'>
									<select name='optCt' id='optCity' class='form-control' onChange='showDetail2(this.value); showPanjrapol(this.value);'>
										<option value=''>-------- Select City --------</option>";
										
											while ($result1=mysqli_fetch_array($rec1))
											{
												
													$data.="<option value='".$result1[0]."'>".$result1[1]."</option>";
												
											}
										
										
									$data.="</select></div></div>";
include_once("../class/Panjrapol.php");
$obj2=new Panjrapol();
$rec2=$obj2->select();	
						
									$data.="<label for='selector1' class='col-sm-2 control-label'>Panjarapole</label>
									
									<div class='col-sm-2'>
									<div class='form-group'>
									<select name='optPn' id='optPan' class='form-control' onChange='showDetail(this.value)'>
										<option value=''>----Select Panjrapol----</option>";
										
											while ($result2=mysqli_fetch_array($rec2))
											{
												
													$data.="<option value='".$result2[0]."'>".$result2[1]."</option>";
												
											}
										

											$data.="</select></div></div></div>
											<br>
											<div class='row'>
												<label for='selector1' class='col-sm-2 control-label'>Alphabetic View ::</label><div style='font-size:24px;'>";
												foreach (range('A', 'Z') as $char) {
    			$data.="<a href='detailedview.php?Ch=".$char."'>$char </a>";
    			$data.="|";
		}
											$data.="<a href='detailedview.php'> ALL</a></div></div>
											
											
											
											";
								
	echo $data;
?>
</form>
			<br><br>
		<div id='Pan' style="box-shadow: 3px 3px 5px #888888;"></div>						
							
							</div>
							

						</div>
				</div>
			</div>
		</div>
	</div>
	
<!-- //banner -->
<?php
	include_once("footer.php");
?>