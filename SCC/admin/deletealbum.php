<?php include("connection.php");  
	if(isset($_REQUEST["id"]))
	{
		$sql = "Delete from photo_gallery where AlbumId=".$_REQUEST["id"];
		if(!mysqli_query($conn,$sql))
		{
			die('Could not enter data: ' . mysqli_error());
		}
		
		$sql = "Delete from album where AlbumId=".$_REQUEST["id"];
		
		if(!mysqli_query($conn,$sql))
		{
			die('Could not enter data: ' . mysqli_error());
		}
		else
		{
						header("Location: subpg.php");
			
		}
	}
?>
