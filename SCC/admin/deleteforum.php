<?php include("connection.php");  
	if(isset($_REQUEST["id"]))
	{
		$sql = "Delete from forum_ans where question_id=".$_REQUEST["id"];
		if(!mysqli_query($conn,$sql))
		{
			die('Could not enter data: ' . mysqli_error());
		}
		
		$sql = "Delete from forum_question where id=".$_REQUEST["id"];
		
		if(!mysqli_query($conn,$sql))
		{
			die('Could not enter data: ' . mysqli_error());
		}
		else
		{
						header("Location: subdf.php");
			
		}
	}
?>
