<?php
include_once("header.php");
?>
<style type="text/css">
	
.rcorners3 {
    border-radius: 45px 45px;
    background: #fff;
    padding: 10px; 
    width: 225px;
    height: 60px; 
    
    text-align: center;
}
</style>
<!-- banner -->
	<div class="banner" >

		<div class="container">
			<br>
			<div class="row" style="overflow-x: hidden; overflow-y: hidden;">
				<div class="col-md-8">
								<h3>Welcome to Panjarapole Portal, Inspired by Shraman parivar.</h3>
								<h3>We aim to consolidate all leading Panjarapoles, under one portal and provide all possible details about animals, funding, management, financial records, location etc.</h3>
								<h3>Our aim is to offer information transparently and securely and connect the donors to respective panjrapoles of their choices.</h3>
									
				</div>
				<div class="col-md-offset-1 col-md-3">
					<a href="panjrapole.php"><button class="rcorners3">Click here to search panjarapole</button></a>
				</div>

			</div>
			
			<section class="slider" style="padding-top: 120px;">
				
					<div class="flexslider">
					<ul class="slides">
						<li>
							<div class="w3l_banner_info">
								<h3>પાંજરાપોળ પોર્ટલમાં આપનું સ્વાગત છે.</h3>
							</div>
						</li>
						<li>
							<div class="w3l_banner_info">
								<h3>અમે અગ્રણી પાંજરાપોળ એકત્રીકરણ કરવા અને પ્રાણીઓ, ભંડોળ, સંચાલન, નાણાકીય નોંધો, સ્થાન વગેરે વિશેની તમામ શક્ય વિગતો પૂરી પાડવાનો હેતુ ધરાવીએ છીએ.</h3>
							</div>
						</li>
						<li>
							<div class="w3l_banner_info">
								<h3>અમારું લક્ષ્ય માહિતીને પારદર્શક અને સલામત રીતે પ્રદાન કરવાની છે અને દાતાઓને તેમની પસંદગીઓના સંબંધિત પાંજરાપોળ સાથે કનેક્ટ કરવાનું છે.</h3>
							</div>
						</li>
						
					</ul>
				</div>
							
			</section>
			<!-- flexSlider -->
				<script defer src="js/jquery.flexslider.js"></script>
				<script type="text/javascript">
				$(window).load(function(){
				  $('.flexslider').flexslider({
					animation: "slide",
					start: function(slider){
					  $('body').removeClass('loading');
					}
				  });
				});
			  </script>
			<!-- //flexSlider -->
		</div>
	</div>
<!-- //banner -->


<?php
	include_once("footer.php");
?>