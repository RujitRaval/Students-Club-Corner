<?php include("connection.php");  
	if(isset($_REQUEST['id']))
	{
		$sql = "Delete from election_participants where ElectionId=".$_REQUEST['id'];
		$sql = "Delete from election where ElectionId=".$_REQUEST['id'];
		if(!mysql_query($sql))
		{
			die('Could not enter data: ' . mysql_error());
		}
		else
		{
			header("Location: subonlvoting.php");
		}
	}
?>
