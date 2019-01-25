<?php 
include ("connection.php");

if (isset($_POST['Login']))
{
	// username and password sent from Form 
	$myusername=addslashes($_POST['uname']); 
	$mypassword=addslashes($_POST['upass']); 
	
	$sql="SELECT * FROM user WHERE UserId='$myusername' and Password='$mypassword' and IsActive = 1";
	$result=mysqli_query($conn,$sql);
	if(! $result )
		{
		  die('Could not enter data: ' . mysqli_error());
		}
	$row=mysqli_fetch_array($result);
	//$active=$row['active'];
	$count=mysqli_num_rows($result);
				
	// If result matched $myusername and $mypassword, table row must be 1 row
	if($count==1)
	{
		//session_register("userid");
		$_SESSION['login_user']=$myusername;
		$_SESSION['uid']=$row['Id'];
		$_SESSION['batch']=$row['Batch'];
		$_SESSION['email_user']=$row['Email'];
		$_SESSION['phone']=$row['Phone'];
		$_SESSION['UserType']=$row['UserType'];
		$_SESSION['UserName']=$row['UserFirstName']." ".$row["UserLastName"];
						
		if ($myusername != "admin")						
		{
			$sql="SELECT StreamId FROM stream_subadmin_relation WHERE UserId='$myusername'";
			$result=mysqli_query($conn,$sql);
			if(! $result )
				{
				  die('Could not enter data: ' . mysqli_error());
				}
			$row=mysqli_fetch_array($result);
			$_SESSION['UserStreamId']=$row['StreamId'];
		}
		header("Location:".$_SERVER['HTTP_REFERER']);
	}
	else 
	{
		echo "<script>alert('You must enter both values.')</script>";

		?>
        <!--$error="Your Login Name or Password is invalid";
		print_r($error);-->
		<!--<script type="text/javascript">
alert("Hello world");
</script>
-->

<!--<script type="application/javascript">alert("Registered"); window.location.href = "index.php";</script>';
--> 

		<?php
	}
}
else
{
	$error="No request generate.";
	print_r($error);
	exit;
}
?>