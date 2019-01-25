<?php include("connection.php");  
	if(isset($_REQUEST['id']))
	{
		//$sql = "Delete from election_participants where ElectionId=".$_REQUEST['id'];
		$sql = "Delete from election_year where electionyearid=".$_REQUEST['id'];
		if(!mysqli_query($conn,$sql))
		{
			die('Could not enter data: ' . mysqli_error());
		}
		else
		{
			header("Location: AE_Electionyear.php");
		}
	}
?>
