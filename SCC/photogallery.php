<?php	include("connection.php"); ?>

<html>
<head>
<link style="text/css" href="CSS/style.css" rel="stylesheet">
<title>
<?php
$AlbumId= $_REQUEST['id'];
$sql = "Select AlbumName from album where AlbumId=".$AlbumId;
$result = mysqli_query($conn,$sql);
echo "&nbsp;&nbsp;&nbsp;";
while ($row =mysqli_fetch_assoc($result))
{ 
print_r($row["AlbumName"]);
}
?>
</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="shadowbox/shadowbox.css">
<script type="text/javascript" src="shadowbox/shadowbox.js"></script>
<script type="text/javascript">
Shadowbox.init({

});
</script>
</head>

<body>
<div id="bg_pattern">
<div id="container">
<div id="backimage">
    <?php include("header.php"); ?>	
<div class="photogallerybox">
<?php   
	  
	//print_r($_REQUEST['id']);
	$AlbumId= $_REQUEST['id'];
    $result = mysqli_query($conn,"SELECT filename FROM photo_gallery WHERE IsActive=1 And AlbumId=".$AlbumId);

	while ($row=mysqli_fetch_assoc($result))
		{?>
		<div style="float:left; margin: 0 3px 0 4px; padding:10px; ">
        <a rel="shadowbox[album]" href="pg/<?php echo $row['filename']; ?>" > 
        <img src="pg/<?php echo $row['filename']; ?>" width="120" height="110" align="left">
        </a>
       </div>
	<?php } ?>
 </div>
 <?php include("footer.php");  ?>
        </div>
	</div>
</div>
  
</body>
</html>