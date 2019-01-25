<?php include ("connection.php"); ?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<title>Students' Club Corner</title>


<link style="text/css" href="CSS/style.css" rel="stylesheet">

<link rel="stylesheet" href="CSS/nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="CSS/custom-nivo-slider.css" type="text/css" media="screen" />

<script src="CSS/jquery.nivo.slider.pack.js" type="text/javascript"></script>

<script type="text/javascript">
$(window).load(function() {
	$('#slider').nivoSlider({
		effect:'random', //Specify sets like: 'fold,fade,sliceDown'
		slices:15,
		animSpeed:500,
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

<div id="bg_pattern"> 

	<div id="container">

		<div id="backimage">	
            <?php //include("flogin.php"); ?>
        	<?php //include("header.php");  ?>
			<?php include("flogin.php"); ?>
 <div id='header'> 
 <a href ='' id='logo' class='replace'></a> 
 <p><?php echo $TitleStream; ?></p> 
 </div>
			 
		<div id="slideshow">
        		
       		
        <div id="slider">
          <img src="IMAGES/ss_1.jpg" alt="" title="C-Block ...The wonderful dream.." /> 
          <img src="IMAGES/ss_2.jpg" alt="" title="The Lab..." /> 
          <img src="IMAGES/ss_3.jpg" alt="" title="C-Audi and Prayer..." /> 
          <img src="IMAGES/ss_4.jpg" alt="" title="Our C-Block Enterence..." /> </div>      
         </div><!--slideshow ends-->
		 
	
		 <div id="news">
		<marquee id="test"  scrollamount="3" direction="up"  hspace="5" height="300" vspace="5" style="color:#FFF" behavior="scroll"  onMouseOver="this.stop();" onMouseOut="this.start();">
         <?php
// include ("connection.php");
$query = "Select NewsSubject, NewsDescription from news where IsActive = 1";
$result = mysqli_query($conn,$query);
while ($row =mysqli_fetch_assoc($result))
{?>
	<div class="xx">
	<p ><?php print_r($row["NewsSubject"]); echo "</br>"; ?> </p>
    </div>
    <p><?php print_r($row["NewsDescription"]); echo "</br>";echo "</br>"; ?> </p>
	<?php  } ?>
		
	
        </marquee>
        
       
		 <div id="intro2">
          <p style="text-align:center; font-family:mySecondFont; font-size:30px; margin-bottom:-40px;" ;>VISION & MISSION</p>
		<?php	$query = "Select description from home_desc";
			$result = mysqli_query($conn,$query);
			 $fetch=mysqli_fetch_array($result); 
			echo $fetch["description"];?>
		 </div>
		 </div>
         
         
      <marquee style="background-image:url(IMAGES/cr.png); margin-left:5px; margin-right:7px; height:30px; margin-top:10px; border-radius:10px; font-size:20px; padding-top:5px; color:#CCC" vspace="20px" hspace="20px" onMouseOver="this.stop();" onMouseOut="this.start();"> 
        ||
         <?php
		 
		 $s="SELECT * FROM activities where IsActive = 1 order by id desc;";
		 
		 $result = mysqli_query($conn,$s);
         while ($row =mysqli_fetch_assoc($result))
                                {
         print_r($row["act_name"]);  ?> at <?php print_r($row["act_place"]); 
							?> ||
                            <?php	}
								?> 
         </marquee>
		
          
		 <div id="clubs" class="box"  >
		 <?php
 
$query = "Select StreamId, StreamName from stream where IsActive = 1";
$result = mysqli_query($conn,$query);
while ($row =mysqli_fetch_assoc($result))
{
	?>
    
   
	<div class="pro_box" ><p>
		<a href='Club_home.php?cid= <?php print_r($row["StreamId"]); ?>' class="pro_font"><?php print_r($row["StreamName"]); ?></a></p>
	</div>

	<?php
}
?>
		 </div>
		
        <div class="yy">
                
                <div class="df">
                    <a href="main_forum.php"><img src="IMAGES/forum.jpg">
                	<p>Discussion Forum</p></a>
               
               		
                
                    <a href="https://www.facebook.com/pages/Students-Club-Corner/495847433808124?ref=hl">
                    <img src="IMAGES/fb.jpg">
                    </a>
                    <img src="IMAGES/Tw.jpg">
                
                  </div>
                  
                  
         </div>
       
         
		 <?php //include("footer.php");  ?>
         <div id="footer">
            
           <?php
                                if(isset($_SESSION['login_user']) && ($_SESSION['UserType'] == 3 || $_SESSION['UserType'] == 4))
								{
                            ?>
              	<a href="feedback.php">
                	<p style="font-size:20px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; color:#FFF; 
                    margin-top:15px; width:600px; padding-left:20px;">Give us a Feedback</p></a>
                    <?php
								}
					?>
		  		<div id="foot_line"></div>
            	<div id="foot_logo">
            				
				<div id="devloper">DEVELOPERS :</br> <a href= "mailto:08dit201@nirmauni.ac.in" style="color:#09F" >Rujit Raval </a>(08DIT201)</br>
                
                <a href= "mailto:09dit005@nirmauni.ac.in" style="color:#09F" >Hiral Joshi </a>(09DIT005)</br>
                <a href= "mailto:08dit005@nirmauni.ac.in" style="color:#09F" >Rutva Thumar </a>(08DIT005)</div>

            
            <div id="foot_line"></div>
            </div>
            </div>
            </div><!--footer ends-->

		</div>
	</div>
</div>

</body>
</html>
