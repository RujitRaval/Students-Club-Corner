<?php include("connection.php");  
	if(isset($_REQUEST["sid"]))
	{
		$sql = "Delete from subevent_master where Id=".$_REQUEST["sid"];
		
		if(!mysqli_query($conn,$sql))
		{
			die('Could not enter data: ' . mysqli_error());
		}
		else
		{
			header("Location: View_subevent.php?id=".$_REQUEST["id"]);
			
		}
	}
?>
