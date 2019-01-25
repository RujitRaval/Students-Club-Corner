<?php	include("connection.php"); ?>
<html>
<head>
<link style="text/css" href="CSS/style.css" rel="stylesheet">
<title>Events</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>


<div id="bg_pattern">
	  
		<div id="container">
	<div id="backimage">	
        	<?php include("header.php");  
			
			?>
             <div class="albumbox">
            	 <?php
					$query = "Select EventName,EventId from event_master where IsActive=1 ";
					if(isset($_SESSION['StreamId']))
					{
						$query = $query . " and StreamId=".$_SESSION['StreamId'];
					}
					$query = $query . " ORDER BY EventEndTime ";
					$result = mysqli_query($conn,$query);
					
					while ($row =mysqli_fetch_assoc($result))
					{
						?>
						<div class="pro_box2" ><p>
							<a href='edetails.php?id=<?php print_r($row["EventId"]); ?>' class="pro_font2">
								<?php print_r($row["EventName"]); ?></a></p>
						</div>
					
						<?php
					}
					?>
		 
            
            	
            
            </div>
			<?php include("footer.php");?>
		</div>
	</div>
</div>

</body>
</html>