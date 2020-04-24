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
body{overflow-y: hidden !important;}

.bottom-left {
    position: absolute;
    bottom: 8px;
    left: 16px;
}

.top-left {
    position: absolute;
    color: white;
    top: 100px;
    left: 550px;
    font-size: 50px;
    
}
.im{
    opacity: 0.6;

}

.a{
	font-size: 30px;
}
.top-right {
    position: absolute;
    top: 8px;
    right: 16px;
}

.bottom-right {
    position: absolute;
    bottom: 8px;
    right: 16px;
}

.centered {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

</style>

<img class="im" src="../website/images/17.jpg" style="width:100%; height:100%;">
			<div class="top-left">Welcome Admin

				<br>
				<div class="a">please <a href="addstate.php">click here </a>to start</div> 
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
