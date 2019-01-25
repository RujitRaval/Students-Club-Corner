<?php	include("connection.php"); ?>

<html>
<head>
<link style="text/css" href="CSS/style.css" rel="stylesheet">
<title>

Newsletter</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<div id="bg_pattern">
<div id="container">
<div id="backimage">
    <?php include("header.php"); ?>	
<div class="photogallerybox">
<?php   
	  
	//print_r($_REQUEST['id']);
	$query="SELECT FileName FROM newsletter WHERE IsActive=1 and StreamId =".$_SESSION['StreamId'];
	
						
    $result = mysqli_query($conn,$query);
						
	
	while ($row=mysqli_fetch_assoc($result))
		{
			$fname = $row["FileName"];
?>
		<div style="float:left; margin: 0 3px 0 4px; padding:10px; ">
      <iframe id="fred" style="border:1px solid #666CCC" title="PDF in an i-Frame" src="pg/<?php echo $fname; ?>" 
      frameborder="1" scrolling="auto" height="900" width="850" >
      </iframe>
      
       </div>
       

       
       
       	<?php } ?>
 </div>
 <?php include("footer.php");  ?>
        </div>
	</div>
</div>
  
</body>
</html>