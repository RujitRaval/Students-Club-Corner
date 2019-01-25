<?php include("connection.php");  
	if(isset($_REQUEST['id']))
	{
		$sql = "Delete from activities where id=".$_REQUEST['id'];
		if(!mysqli_query($conn,$sql))
		{
			die('Could not delete data: ' . mysqli_error());
		}
		else
		{
			header("Location: subactivities.php");
		}
	}
?>
