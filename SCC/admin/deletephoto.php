<?php include("connection.php");  
	if(isset($_REQUEST["id"]))
	{
		$sql = "select filename from photo_gallery where PhotoId=".$_REQUEST["id"];
		
		if(!$result=mysqli_query($conn,$sql))
		{
			die('Could not enter data: ' . mysqli_error());
		}
		
		else
		{
			while($row=mysqli_fetch_array($result))
			{

				if(!unlink("../pg/".$row['filename']))
				{
					die('Could not delete file:');
					exit;
					}
				$sql = "delete from photo_gallery where PhotoId=".$_REQUEST["id"];
				if(!mysqli_query($conn,$sql))
				{
					die('Could not enter data: ' . mysqli_error());
				}
			}
			header("Location: AlbumDetails.php?id=".$_REQUEST["aid"]);
			
		}
		
	}
?>
