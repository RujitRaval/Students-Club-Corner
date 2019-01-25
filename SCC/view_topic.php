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
    <p>
      <?php	include("header_df.php"); 
 
$id=$_GET['id'];
$sql="SELECT * FROM forum_question WHERE id='$id'";
$result=mysqli_query($conn,$sql);

while($rows=mysqli_fetch_array($result))
{
?>
<center>
    <table border="2" bordercolor="#0000FF"  class="gridtable" width="95%" style="margin-top:90px;">
<tr>
<th ><strong><?php echo $rows['topic']; ?></strong></th>
</tr>

<tr>
<td><?php echo $rows['detail']; ?></td>
</tr>

<tr>
<td bgcolor="#F8F7F1"><strong>By :</strong> <?php echo $rows['name']; ?></td>
</tr>

<tr>
<td bgcolor="#F8F7F1"><strong>Date/time : </strong><?php echo $rows['datetime']; ?></td>
</tr>
</table>
<BR>
<?php } ?>
<?php

$tbl_name2="forum_answer"; // Switch to table "forum_answer"
$sql2="SELECT * FROM forum_ans WHERE question_id='$id'";
$result2=mysqli_query($conn,$sql2);
while($rows=mysqli_fetch_array($result2)){
?>

<table border="2" bordercolor="#0000FF"  class="gridtable" width="95%" >

<tr align="left">
    <th bgcolor="#F8F7F1" colspan="2" width="70%"><span style="font-weight:bold"><?php echo 'User Name: '.$rows['a_name'] ?> </span></th>
    <td><span style="text-align:right" ><?php echo $rows['a_datetime']; ?></span></td>
</tr>

<tr>
<td colspan="3" style="background-color:#FFF"><?php echo $rows['a_ans'];?></td>
</tr>
</table>
 
<?php
}

$sql3="SELECT view FROM forum_question WHERE id='$id'";
$result3=mysqli_query($conn,$sql3);
$rows=mysqli_fetch_array($result3);
$view=$rows['view'];
 
// if have no counter value set counter = 1
if(empty($view)){
$view=1;
$sql4="INSERT INTO forum_question(view) VALUES('$view') WHERE id='$id'";
$result4=mysqli_query($conn,$sql4);
}
 
// count more value
$addview=$view+1;
$sql5="update forum_question set view='$addview' WHERE id='$id'";
$result5=mysqli_query($conn,$sql5);
if(isset($_SESSION['login_user']))
{
?>
    
    <div align="center" style="margin:10px 0 0 10px; font-size:16px; font-weight:bold; color:#FFF;">
    	ADD ANSWER
    </div>
    <form name="form1" method="post" action="add_answer.php">
        <table border="2" bordercolor="#0000FF"  class="gridtable" width="95%">
            
            <tr>
                <td style="border-top-left-radius:30px" valign="top"><strong>Answer</strong></td>
                <td><textarea name="a_answer" cols="50" required="required" style="resize:none" rows="8" id="a_answer"></textarea></td>
            </tr>
            <tr>
                <td style="border-top:hidden"><input name="id" type="hidden" value="<?php echo $id; ?>"></td>
                <td style="border-bottom-right-radius:30px"><input type="submit" name="Submit" value="Submit" class="button2"> <input type="reset" name="Submit2" value="Reset" class="button2"></td>
            </tr>
        </table>    
    </form>
<?php }	

include("footer_df.php"); ?>
</center>
</div></div></div>
</body>
</html>