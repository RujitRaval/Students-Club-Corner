<?php include("connection.php");  
	if(isset($_REQUEST['id']))
	{
		$sql = "Delete from stream_subadmin_relation where UserId='".$_REQUEST['id']."'";
		if(!mysqli_query($conn,$sql))
		{
			die('Could not enter data: ' . mysqli_error());
		}

		$sql = "Delete from user where UserId='".$_REQUEST['id']."'";
		if(!mysqli_query($conn,$sql))
		{
			die('Could not enter data: ' . mysqli_error());
		}
		else
		{
			header("Location: subhome.php");
		}
	}
?>
