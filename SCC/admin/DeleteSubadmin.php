<?php include("connection.php");  ?>
<?php 
	if(isset($_REQUEST['id']))
	{
		$sql = "Delete from user where UserId='".$_REQUEST['id']."'";
		echo $sql;
		if(!mysqli_query($conn,$sql))
		{
			die('Could not enter data: ' . mysqli_error());
		}
		else
		{
			header("Location: subadmin.php");
		}
	}
?>
