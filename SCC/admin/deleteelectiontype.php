<?php include("connection.php");  
	if(isset($_REQUEST['id']))
	{
		$sql = "Delete from election_type where ElectionTypeId=".$_REQUEST['id'];
		if(!mysqli_query($conn,$sql))
		{
			die('Could not enter data: ' . mysqli_error());
		}
		else
		{
			header("Location: ElectionType.php");
		}
	}
?>
