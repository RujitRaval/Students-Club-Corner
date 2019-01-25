      <?php	include("connection.php"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link style="text/css" href="CSS/style.css" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Discussion Forum- Create Topic</title>
</head>

<body>

<div id="bg_pattern">
		<div id="container">
	<div id="backimage">
    <?php	include("header_df.php"); 
	if(!isset ($_SESSION['login_user']))
{
	header("Location:main_forum.php");
}?>

<form id="form1" name="form1" method="post" action="add_topic.php">

    <table border="0" align="center" cellpadding="3" cellspacing="1"  class="gridtable2" width="95%" style="margin:80px 0 0 22px">
        <tr>
        <th colspan="3"><strong>Create New Topic</strong> </th>
        </tr>
        <tr>
        <td width="14%"><strong>Topic</strong></td>
        <td width="2%">:</td>
        <td width="84%"><input name="topic" type="text" id="topic" size="50" required="required"  /></td>
        </tr>
        <tr>
        <td valign="top"><strong>Detail</strong></td>
        <td valign="top">:</td>
        <td><textarea name="detail" cols="50" rows="5" style="resize:none" required="required" id="detail"></textarea></td>
        </tr>
       
        <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><input type="submit" name="Submit" value="Submit" class="button2" /> <input type="reset" name="Submit2" value="Reset" class="button2"/></td>
        </tr>
	</table>

</form>

<?php	include("footer_df.php"); ?>
</div></div></div>
</body>
</html>