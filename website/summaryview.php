<?php
include_once("header.php");
?>
<link rel="stylesheet" href="css1/style.css">
<link rel="stylesheet" type="text/css" media="screen" href="http://cdnjs.cloudflare.com/ajax/libs/fancybox/1.3.4/jquery.fancybox-1.3.4.css" />

<style type="text/css">
    a.fancybox embed {
        border: none;
        box-shadow: 0 1px 7px rgba(0,0,0,0.6);
        -o-transform: scale(1,1); -ms-transform: scale(1,1); -moz-transform: scale(1,1); -webkit-transform: scale(1,1); transform: scale(1,1); -o-transition: all 0.2s ease-in-out; -ms-transition: all 0.2s ease-in-out; -moz-transition: all 0.2s ease-in-out; -webkit-transition: all 0.2s ease-in-out; transition: all 0.2s ease-in-out;
    } 
    a.fancybox:hover embed {
        position: relative; z-index: 999; -o-transform: scale(1.03,1.03); -ms-transform: scale(1.03,1.03); -moz-transform: scale(1.03,1.03); -webkit-transform: scale(1.03,1.03); transform: scale(1.03,1.03);
    }
</style>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/fancybox/1.3.4/jquery.fancybox-1.3.4.pack.min.js"></script>

<script type="text/javascript">
    $(function($){
        var addToAll = false;
        var gallery = true;
        var titlePosition = 'inside';
        $(addToAll ? 'embed' : 'embed.fancybox').each(function(){
            var $this = $(this);
            var title = $this.attr('title');
            var src = $this.attr('data-big') || $this.attr('src');
            var a = $('<a href="#" class="fancybox"></a>').attr('href', src).attr('title', title);
            $this.wrap(a);
        });
        if (gallery)
            $('a.fancybox').attr('rel', 'fancyboxgallery');
        $('a.fancybox').fancybox({
            titlePosition: titlePosition
        });
    });
    $.noConflict();
</script>
<style type="text/css">
	.bg{
	background:rgba(0,0,0,0.5);
	padding: 5px;
	color: #fff;
	font-weight: bold;
	font-size: 15px;
}
.bg1{
	color:#e1d41f;
}
.rcorners3 {
    border-radius: 45px 45px;
    background: #000;
    padding: 10px; 
    width: 220px;
    height: 60px; 
    margin-left: 20px;
    margin-top: 20px;
    text-align: center;
}
</style>
<script>
function showProperty(str) {
    if (str.length == 0) { 
        document.getElementById("Data6").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("Data6").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "getProperty_ajax.php?q=" + str, true);
        xmlhttp.send();
    }
}
function showFinancial(str) {
    if (str.length == 0) { 
        document.getElementById("Data").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("Data").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "getFinancial_ajax.php?q=" + str, true);
        xmlhttp.send();
    }
}
function showManagment(str) {
    if (str.length == 0) { 
        document.getElementById("Data2").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("Data2").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "getManagment_ajax.php?q=" + str, true);
        xmlhttp.send();
    }
}
function showContact(str) {
    if (str.length == 0) { 
        document.getElementById("Data5").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("Data5").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "getContact_ajax.php?q=" + str, true);
        xmlhttp.send();
    }
}
function showAnimal(str) {
    if (str.length == 0) { 
        document.getElementById("Data3").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("Data3").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "getAnimal_ajax.php?q=" + str, true);
        xmlhttp.send();
    }
}
function showGallary(str) {
    if (str.length == 0) { 
        document.getElementById("Data4").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("Data4").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "getGallary_ajax.php?q=" + str, true);
        xmlhttp.send();
    }
}
</script>
<!-- banner -->
<?php
include_once("../class/Panjrapol.php");
$obj=new Panjrapol();
include_once("../class/City.php");
$obj1=new City();
include_once("../class/State.php");
$obj2=new State();
include_once("../class/Animal.php");
$obj3=new Animal();
include_once("../class/Bank.php");
$obj4=new Bank();
include_once("../class/Trustee.php");
$obj5=new Trustee();
include_once("../class/Image.php");
$obj6=new Image();
include_once("../class/Property.php");
$obj7=new Property();
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
	$data="
	<div class='banner'>
		<div class='container'>
			<div id='page-wrapper' >
		<div class='form-group'>
		<div class='row'>
			<div class='col-sm-3 col-xs-3 rcorners3 bg1'>".$pnm."</div>";
			$rec2=$obj2->select1($state);
			$result2=mysqli_fetch_array($rec2);
			$data.="<div class='col-sm-3 col-xs-3 rcorners3 bg1' style=''>State<br>".$result2[1]."</div>";						
			$rec1=$obj1->select1($city);
			$result1=mysqli_fetch_array($rec1);
			$data.="<div class='col-sm-3 col-xs-3 rcorners3 bg1' style=''>City<br>".$result1[1]."</div>
			<a name='btnDon' href='donate.php'><div class='col-sm-3 col-xs-3 rcorners3 bg1' style=' padding:20px;'>DONATE</div></a>
			<a href='panjrapole.php' style='float:right; font-size:30px;'><u>BACK</u></a>
		</div>
		</div>";

		$data.="<div class='row'>
		<marquee style='scrollamount='5' loop='infinite''>
*All the details are as per provided by managment of respective panjarapole we can not assume responsibility of correctness of data
</marquee>
			<div class='col-md-6'>
		<div class='form-group'>
				
								";
								$rec=$obj->select1($pid);
								while ($result=mysqli_fetch_array($rec))
								{
										 	$data.="<table class='table bg'>
										 		<th colspan='5' style='background:#9E9E77; font-variant: small-caps;'><center>PANJARAPOLE DETAIL</center></th>
										 		<tr>
										 		<td class='col-sm-2 bg1' >Address</td>
										 		<td colspan='3'>".$result[5].",".$result[6]."</td>
										 		</tr>
										 		<tr>
										 		<td class='col-sm-3 bg1''>Foundation Year</td>
										 		<td colspan='3'>".$result[7]."</td>
										 		</tr>
										 		<tr>
										 		<td class='col-sm-4 bg1''>Charity commisinor Registration Date</td>
										 		<td>".$result[9]."</td>
										 		<td class='col-sm-4 bg1''>Charity commisinor Registration No.</td>
										 		<td>".$result[8]."</td>
										 		
										 		</tr>
										 		<tr>
										 		<td class='col-sm-4 bg1''>Income tax 12A Registration Date</td>
										 		<td>".$result[19]."</td>
										 		<td class='col-sm-4 bg1''>Income tax 12A Registration No.</td>
										 		<td>".$result[18]."</td>
										 		
										 		</tr>
										 		<tr>
										 		<td class='col-sm-4 bg1''>Income tax 80G Registration Date</td>
										 		<td>".$result[21]."</td>
										 		<td class='col-sm-4 bg1''>Income tax 80G Registration No.</td>
										 		<td>".$result[20]."</td>
										 		
										 		</tr>
										 		
										 		<tr>
										 		<td class='col-sm-4 bg1''>Pancard Date</td>
										 		<td>".$result[22]."</td>
										 		<td class='col-sm-2 bg1''>PAN No.</td>
										 		<td>".$result[13]."</td>

										 		</tr>
										 		<tr>
										 		<td class='col-sm-2 bg1''>Certificates</td>
										 		<td colspan='3'>";
										 			if(!$result[10]=="")
										 			$data.="<embed class='fancybox' src='".$result[10]."' width='100' height='100'>&nbsp;&nbsp;";
										 			if(!$result[11]=="")
										 			$data.="<embed class='fancybox' src='".$result[11]."' width='100' height='100' data-big='".$result[11]."'>&nbsp;&nbsp;";
										 			if(!$result[14]=="")
										 			$data.="<embed class='fancybox' src='".$result[14]."' width='100' height='100'>&nbsp;&nbsp;<br><br>";
										 			if(!$result[12]=="")
										 			$data.="<embed class='fancybox' src='".$result[12]."' width='100' height='100'>&nbsp;&nbsp;";
										 			
										 			
										 		$data.="</td>
										 		</tr>";
								}
								
								$data.="
				</table></div>
									
			</div>
			<div class='col-md-6' style='overflow-x: auto;'>
				
				<div class='box'>
				    <div class='top' onclick='showProperty(".$pid.")'>
				   Property Detail
				    
				    </div>
				    <div class='bottom'>
				      <div id='Data6'></div>
				    </div>
	  			</div>			
				<div class='box'>
				    <div class='top' onclick='showFinancial(".$pid.")'>
				   Financial Detail
				    
				    </div>
				    <div class='bottom'>
				      <div id='Data'></div>
				    </div>
	  			</div>
	  			<div class='box'>
				    <div class='top' onclick='showManagment(".$pid.")'>
				   Managment Detail
				    
				    </div>
				    <div class='bottom'>
				      <div id='Data2'></div>
				    </div>
	  			</div>
	  			<div class='box'>
				    <div class='top' onclick='showContact(".$pid.")'>
				   Contact Detail
				    
				    </div>
				    <div class='bottom'>
				      <div id='Data5'></div>
				    </div>
	  			</div>
	  			<div class='box'>
				    <div class='top' onclick='showAnimal(".$pid.")'>
				   Animal Detail
				    
				    </div>
				    <div class='bottom'>
				      <div id='Data3'></div>
				    </div>
	  			</div>
	  			<div class='box'>
				    <div class='top' onclick='showGallary(".$pid.")'>
				   Gallary
				    
				    </div>
				    <div class='bottom'>
				      <div id='Data4'></div>
				    </div>
	  			</div>
			
			</div>
			</div>
		</div>
	</div></div>";
	echo $data;
?>
 <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  

    <script  src="js1/index.js"></script>
<?php
	include_once("footer.php");
?>