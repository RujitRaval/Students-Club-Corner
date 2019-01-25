      <?php	include("connection.php"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link style="text/css" href="CSS/style.css" rel="stylesheet">

</head>

<body>
<div id="bg_pattern">
		<div id="container">
	<div id="backimage">	
        <?php	include("header.php");
if(!isset ($_SESSION['login_user']))
{
	header("Location:main_forum.php");
}


// get data that sent from form 
$topic=$_POST['topic'];
$detail=$_POST['detail'];
$name=$_SESSION['login_user'];
//$email=$_SESSION['email_user'];*********************EMAIL KARVANU CHE.

$datetime=date("d/m/y h:i:s"); //create date time

$sql="INSERT INTO forum_question(topic, detail, name, datetime,IsActive)VALUES('$topic', '$detail', '$name', '$datetime',0)";
$result=mysqli_query($conn,$sql);

if($result){
?> <div id="suc">	<?php echo "Successful<BR>"; echo "<a href=main_forum.php>View your topic</a>";?></div><?php 
}
else {
echo "ERROR";
}
mysqli_close($conn);
?>
<?php include("footer.php");  ?>
</div>
</div>
</div>
</body>
</html>