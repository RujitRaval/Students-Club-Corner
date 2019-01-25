<?php include("connection.php"); ?>

<html>
<head>
<title>
<?php
echo $TitleStream;
//$sql = "select StreamName from stream where streamId= ".$_REQUEST["id"];
//$result = mysqli_query($sql);
//echo "&nbsp;&nbsp;&nbsp;";
//while ($row =mysqli_fetch_assoc($result))
//{ 
//print_r($row["StreamName"]);
//}
?>

</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link style="text/css" href="CSS/style.css" rel="stylesheet">
<link rel="stylesheet" href="CSS/nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="CSS/custom-nivo-slider.css" type="text/css" media="screen" />

<script src="CSS/jquery.min.js" type="text/javascript"></script>
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
        <?php include('header.php');
		
		?>	
		<div id="slideshow">
        		
       		
        <div id="slider"> 
          <img src="IMAGES/ss_1.jpg" alt="" title="What a Pretty View" /> 
          <img src="IMAGES/ss_2.jpg" alt="" title="Hungry Kya ?!?" /> 
          <img src="IMAGES/ss_3.jpg" alt="" title="UNITY in DIVERSITY..." /> 
          <img src="IMAGES/ss_4.jpg" alt="" title="One would like to be" /> </div>      
         </div><!--slideshow ends-->
		 
	
		 <div id="news">
		<marquee direction="up" draggable="false" hspace="5" height="300" vspace="5" scrollamount="3" style="color:#FFF">
        
         <?php
$_SESSION['StreamId']  = $_REQUEST["cid"];
$query = "Select NewsSubject, NewsDescription from news where IsActive = 1 and StreamId =".$_REQUEST["cid"]." ORDER BY AddDate";
$result = mysqli_query($conn,$query);
while ($row =mysqli_fetch_assoc($result))
{?>
	
	<p><?php print_r($row["NewsSubject"]); echo "</br>";echo "</br>"; ?> 
	<?php  } ?>
		
	
        </marquee>
		<div id="intro">
		<?php	
			$query = "Select StreamDescription from stream where StreamId =".$_REQUEST["cid"];
			$result = mysqli_query($conn,$query);
			$fetch=mysqli_fetch_array($result); 
		?> 
         <span style="color:#FFFFFF; font-size:16px; "> <?php echo $fetch["StreamDescription"];?> </span>
		 </div>
		 </div>
         
         <div id="futureevent"> 
         <marquee style="background-image:url(IMAGES/cr.png); height:30px; border-radius:10px; font-size:20px; padding-top:5px; color:#CCC" vspace="20px" hspace="20px" onMouseOver="this.stop();" onMouseOut="this.start();">
	<?php 
		$query2 = "Select EventName,EventId from event_master where StreamId =".$_REQUEST["cid"];
		$result2 = mysqli_query($conn,$query2);
		while ($row2 =mysqli_fetch_assoc($result2))
		{
	?>    
    <a href="edetails.php?id=<?php print_r($row2["EventId"]); ?>"> &nbsp; || &nbsp; <?php print_r($row2["EventName"]);  ?></a>
    <?php 
		}
	?>
 </marquee>
          </div>
         
         
         <div id="newsletter" class="albumbox">
        	<?php
                $query = "Select * from newsletter where IsActive=1 and  StreamId =".$_REQUEST["cid"];
                $result = mysqli_query($conn,$query);
                while ($row =mysqli_fetch_assoc($result))
                {
                    ?>
                    <div class="pro_box2" ><p>
                        <a href='newsletter.php?id= <?php print_r($row["NewsletterId"]); ?>' class="pro_font2"><?php print_r($row["Name"]); ?></a></p>
                    </div>
				<?php
                }
                ?>
         </div>
         
         
		 
		 <div class="albumbox">
			 <?php
                $query = "Select AlbumName,AlbumId from album where IsActive=1 and  StreamId =".$_REQUEST["cid"];
                $result = mysqli_query($conn,$query);
                while ($row =mysqli_fetch_assoc($result))
                {
                    ?>
                    <div class="pro_box2" ><p>
                        <a href='photogallery.php?id= <?php print_r($row["AlbumId"]); ?>' class="pro_font2"><?php print_r($row["AlbumName"]); ?></a></p>
                    </div>
				<?php
                }
                ?>
            </div>
                   

		 
		 <?php include("footer.php");  ?>

	
        	
		</div>
	</div>
</div>	 
 
</body>
</html>
