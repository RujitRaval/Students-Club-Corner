<?php include("connection.php");  
	if(isset($_REQUEST['eid']))
	{
		$sql = "Delete from election_participants where ParticipantId=".$_REQUEST['pid']."";
		if(!mysqli_query($conn,$sql))
		{
			die('Could not enter data: ' . mysqli_error());
		}
		else
		{
			header("Location: ElectionUser.php?id=".$_REQUEST['eid']);
		}
	}
?>
