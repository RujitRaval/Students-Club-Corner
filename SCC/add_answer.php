<?php include("connection.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php

include("header.php");

// Get value of id that sent from hidden field 
$id=$_POST['id'];

// Find highest answer number. 
$sql="SELECT MAX(a_id) AS Maxa_id FROM forum_ans WHERE question_id='$id'";
$result=mysqli_query($conn,$sql);
$rows=mysqli_fetch_array($result);

// add + 1 to highest answer number and keep it in variable name "$Max_id". if there no answer yet set it = 1 
if ($rows) {
$Max_id = $rows['Maxa_id']+1;
}
else {
$Max_id = 1;
}

// get values that sent from form 
$a_name=$_SESSION['UserName'];
$a_email=$_POST['a_email'];
$a_answer=$_POST['a_answer']; 

//$datetime=NOW(); // create date and time

// Insert answer 
$sql2="INSERT INTO forum_ans(question_id, a_id, a_name, a_email, a_ans, a_datetime)VALUES('$id', '$Max_id', '$a_name', '$a_email', '$a_answer', NOW())";
$result2=mysqli_query($conn,$sql2);
if(! $result2)
		{
		  die('Could not enter data: ' . mysqli_error());
		}
else{
echo "Successful<BR>";
//echo "<a href='view_topic.php?id=".$id."'>View your answer</a>";

// If added new answer, add value +1 in reply column 
$tbl_name2="forum_question";
$sql3="UPDATE forum_question SET reply='$Max_id' WHERE id='$id'";
$result3=mysqli_query($conn,$sql3);
header("location:view_topic.php?id=".$id);
}


// Close connection
mysqli_close();
?>

</body>
</html>