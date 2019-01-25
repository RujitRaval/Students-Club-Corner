<?php

include ("connection.php");
$flag=0;
$sql = "select Id,UserId,Password,UserType from user ".
	" where UserId = '".$_POST["txt_uid"]."' and Password='".$_POST["txt_pwd"]."' and IsActive = 1";
$result=mysqli_query($conn,$sql);
$flag=0;
while($row=mysqli_fetch_array($result))
{

$UserType=$row['UserType'];
$_SESSION['user']=$row['UserId'];
$_SESSION['uid']=$row['Id'];
}

if($UserType==1)
{
	header("Location: homedesc.php");
	exit;
}
else if($UserType==2)
{
	$sql = "select StreamId from stream_subadmin_relation where UserId = '".$_POST["txt_uid"]."' and IsActive = 1";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($result);
	$_SESSION['StreamId']=$row['StreamId'];
	header("Location: subhome.php");
	exit;
}
else
{
?>
<script type="text/javascript" language="javascript">
alert("Invalid UserName or Password");
</script>	
<?php


header("Location: login.php");
exit;

}

?>
