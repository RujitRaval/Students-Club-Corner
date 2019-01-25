<?php include("connection.php");  
	if(isset($_REQUEST['id']))
	{
								

		$sql = "Delete from election_participants where Id=".$_REQUEST['id'];
		if(!mysql_query($sql))
		{
			die('Could not enter data: ' . mysql_error());
		}
		else
		{
			
	 $eid = $_REQUEST['sid'];
			header("Location: ElectionUser.php?id=".$eid);
		}
	}
?>

