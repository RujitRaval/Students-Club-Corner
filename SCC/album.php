<?php include ("connection.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link style="text/css" href="CSS/style.css" rel="stylesheet">
<title>ALBUMS</title>
</head>

<body>
<div id="bg_pattern">
	<div id="container">
		<div id="backimage">	

        	<?php include("header.php");  ?>
            <div class="albumbox">
            	 <?php
					$query = "Select AlbumName,AlbumId from album where IsActive=1 and StreamId=".$_SESSION['StreamId'];"";
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
</div>      
</body>
</html>