<?php include ("connection.php");?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<title>TEMP</title>

<link style="text/css" href="CSS/style.css" rel="stylesheet">
<link rel="stylesheet" href="CSS/nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="CSS/custom-nivo-slider.css" type="text/css" media="screen" />
<script src="CSS/jquery.nivo.slider.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(window).load(function() {
	$('#slider').nivoSlider({
		effect:'random', //Specify sets like: 'fold,fade,sliceDown'
		slices:15,
		animSpeed:100,
		pauseTime:3000,
		startSlide:0, //Set starting Slide (0 index)
		directionNav:true, //Next and Prev
		directionNavHide:true, //Only show on hover
		controlNav:true, //1,2,3...
		pauseOnHover:true, //Stop animation while hovering
		beforeChange: function(){},
		afterChange: function(){},
		slideshowEnd: function(){} //Triggers after all slides have been shown
	});
});
</script>
</head>

<body>
<div id="slideshow">        	
        <div id="slider"> 
          <img src="IMAGES/ss_1.jpg" alt="" title="1" /> 
          <img src="IMAGES/ss_2.jpg" alt="" title="2" /> 
          <img src="IMAGES/ss_3.jpg" alt="" title="3" /> 
          <img src="IMAGES/ss_4.jpg" alt="" title="4" /> 
         </div>      
</div><!--slideshow ends-->
         
</body>
</html>