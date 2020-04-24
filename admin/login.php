<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Easy Admin Panel an Admin Panel Category Flat Bootstrap Responsive Website Template | Sign In :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Easy Admin Panel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
<!-- chart -->
<script src="js/Chart.js"></script>
<!-- //chart -->
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!----webfonts--->
<link href='//fonts.googleapis.com/css?family=Cabin:400,400italic,500,500italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
<!---//webfonts---> 
 <!-- Meters graphs -->
<script src="js/jquery-1.10.2.min.js"></script>
<!-- Placed js at the end of the document so the pages load faster -->

</head> 
   <?php
   session_start();
include_once("../class/Auditor.php");
$obj=new Auditor();
$_email=$_pwd="";	
$_SESSION["aid"]="";
$_SESSION["anm"]="";	

if(isset($_POST["btnSub"]))
{
$email=$_POST["txtEmail"];
$pwd=$_POST["txtPwd"];
$obj->set_Email($email);
	$ans1=$obj->Checklogin($email,$pwd);
	if($result = mysqli_fetch_array($ans1))
	{
		$_Auditor_id=$result[0];
		$_Auditor_name=$result[2];
		$_Email =$result[6];
		$_Password =$result[7];
		
		
		
		if($email==$_Email)
		{
			if($pwd==$_Password)
			{
				
				$_SESSION["aid"]=$_Auditor_id;
		$_SESSION["anm"]=$_Auditor_name;
				//print_r($_SESSION["anm"]);
				//print_r($_SESSION["aid"]);
				echo "<script>document.location='../admin/index.php';</script>";	
				
			}
			else
			{
				echo "Password Does not Match";	
			}
		}
		else
		{
			echo "User name Does not Match";	
		}
	}
	else
	{
				echo "<script type='text/javascript'>alert('username not match')</script>";
	}		
}
?>
 <body class="sign-in-up">
    <section>
			<div id="page-wrapper" class="sign-in-wrapper">
				<div class="graphs">
					<div class="sign-in-form">
						<div class="sign-in-form-top">
							<p><span>Sign In to</span> Admin</p>
						</div>
						<div class="signin">
							
							<form method="post">
							<div class="log-input">
								
								<div class="log-input-left">
								   <input type="text" class="user" name="txtEmail" placeholder="Username" />
								</div>
								
								<div class="clearfix"> </div>
							</div>
							<div class="log-input">
								<div class="log-input-left">
								   <input type="password" class="lock" name="txtPwd" placeholder="Password" />
								</div>
								
								<div class="clearfix"> </div>
							</div>
							<input type="submit" value="Login to your account" name="btnSub">
						</form>	 
						</div>
						<div class="new_people">
							<h4>For New People</h4>
							<p><br></p>
							<a href="#">Register Now!</a>
						</div>
					</div>
				</div>
			</div>
		 <?php
	include_once("footer.php");
?>  
	</section>
	
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
</body>
</html>