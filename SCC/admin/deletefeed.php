<?php include("connection.php");  
	if(isset($_REQUEST['id']))
	{
		$sql = "Delete from feedback where FeedbackId=".$_REQUEST['id'];
		if(!mysqli_query($conn,$sql))
		{
			die('Could not enter data: ' . mysqli_error());
		}
		else
		{
			header("Location: subfeed.php");
		}
	}
?>
