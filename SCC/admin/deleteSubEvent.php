<?php include("connection.php");  
	if(isset($_REQUEST["id"]))
	{
		$sql = "Delete from subevent_master where EventId=".$_REQUEST["id"];
		if(!mysql_query($sql))
		{
			die('Could not enter data: ' . mysql_error());
		}
		else
		{
			header("Location: View_subevent.php");
		}
	}
?>
