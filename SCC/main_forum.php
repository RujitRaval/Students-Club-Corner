      <?php	include("connection.php"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link style="text/css" href="CSS/style.css" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Discussion Forum-HOME</title>
</head>

<body >

<div id="bg_pattern">
		<div id="container">
	<div id="backimage">	
        <?php	include("header_df.php");


$sql="SELECT * FROM forum_question where IsActive = 1";
// OREDER BY id DESC is order result by descending

$result=mysqli_query($conn,$sql);
if(! $result)
		{
		  die('Could not enter data: ' . mysqli_error());
		}

?>
 
 
<center>	  
         
<table border="2" bordercolor="#0000FF"  class="gridtable" width="95%" style="margin-top:90px;">
<tr>
<th width="6%" align="center" ><strong>#</strong></th>
<th width="53%" align="center" ><strong>Topic</strong></th>
<th width="15%" align="center" ><strong>Views</strong></th>
<th width="13%" align="center" ><strong>Replies</strong></th>
<th width="13%" align="center" ><strong>Date/Time</strong></th>
</tr>

<?php
 

while($rows=mysqli_fetch_array($result)){
	
?>
<tr>
<td ><?php echo $rows['id']; ?></td>
<td ><a href="view_topic.php?id=<?php echo $rows['id']; ?>"><?php echo $rows['topic']; ?></a><BR></td>
<td align="center" ><?php echo $rows['view']; ?></td>
<td align="center" ><?php echo $rows['reply']; ?></td>
<td align="center" ><?php echo $rows['datetime']; ?></td>
</tr>

<?php
// Exit looping and close connection 
}
//mysqli_close();
if(isset($_SESSION['login_user']))
        {
?>

<tr>
<td colspan="5" align="right"><a href="create_topic.php"><strong>Create New Topic</strong> </a></td>
</tr>
<?php } ?>
</table>
</center>
<?php include("footer_df.php");  ?>
</div>
</div>
</div>
</body>
</html>