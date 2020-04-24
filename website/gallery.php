<?php
include_once("header.php");
?>
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
<div class="banner1">
	<div class="container">
		<br><br>
<?php
include_once("class/Image.php");
$obj=new Image();
$data="";
$rec=$obj->select();
								while ($result=mysqli_fetch_array($rec))
								{
									$Evidencemenu=$result[2];
		$arraymenu=explode(',', $Evidencemenu);
										 	
										 		
										 		foreach($arraymenu as $array_menu)
	                						{
												$data.="
												
												<embed class='fancybox' src='".$array_menu."' height='200' width='200'>&nbsp;&nbsp;&nbsp;&nbsp;
												";
											}
										 		if($result[3]!=""){
										 			$data.="<video width='200' height='200' controls>
  										<source src='".$result[3]."' type='video/mp4'>
  
											</video>
										 		";
										 		}
											
								}
								echo $data;
?>
</div></div>
<?php
	include_once("footer.php");
?>