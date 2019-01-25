<?
// This is the DSN we have create for our database
$connect = odbc_connect("forum", "root", "");
?>
<HTML>
<BODY>
Discussion Forum using PHP/Access under IIS<BR>
<BR>
<A HREF='node.php?node=0'>Post New Message</A>
<?
shownode(0); // display all the main threads
// This function is a recursive function which shall display all the branches
// and sub branches of the threads
function shownode($nodecode)
{
global $connect; // using the global variable for connection
// Get a list of all the sub nodes which specific parentcode
$noderesult = odbc_exec($connect,"select * from forum where parentcode = $nodecode");
echo "<UL type='disc'>";
while(odbc_fetch_row($noderesult)) // get all the rows
{
$code = odbc_result($noderesult,"code");
$title = odbc_result($noderesult,"title");
$uname = odbc_result($noderesult,"uname");
$email = odbc_result($noderesult,"email");
echo "<LI>";
echo "<A HREF='node.php?node=$code'> $title </A>";
echo "-- by ($uname) $email<BR>";
shownode($code);
}
echo "</UL>";
}
?>
</BODY>
</HTML>

Here's the code for the second PHP file (node.php) file:

<?
$connect = odbc_connect("forum", "root", "");
if(isset($submit)) // check if submitted button is clicked
{
// insert the record in the database
$resultupdate=odbc_exec($connect,"insert into forum
(parentcode,title,description,uname,email) VALUES
($_POST[node],'$_POST[title]','$_POST[description]','$_POST[postname]','$_POST
[email]')");
header("location:forum.php"); // open forum.php file to display the thread
exit;
}
?>
<CENTER>Post to Discussion Forum using PHP/Access under IIS</CENTER>
<?
if ( $node != 0 )
{
// Displaying the details of the thread
echo "<HR>";
$noderesult = odbc_exec($connect,"select * from forum where code = $node");
$noderow=odbc_fetch_row($noderesult);
$title = odbc_result($noderesult,"title");
$description = odbc_result($noderesult,"description");
$uname = odbc_result($noderesult,"uname");
$email = odbc_result($noderesult,"email");
echo "$title by ($uname) $email<BR>";
echo "$description <BR><HR>";
}
?>
<!-- Form to enter the message -->
<FORM method='post'>
Name : <INPUT TYPE=TEXT NAME=postname> <BR>
E-Mail : <INPUT TYPE=TEXT NAME=email> <BR>
Title : <INPUT TYPE=TEXT NAME=title VALUE = '' size=50> <BR>
Description : <BR> <TEXTAREA name=description rows=10 cols=45></TEXTAREA>
<!-- we need a hidden field to store the node -->
<INPUT TYPE=hidden NAME=node value='<? echo $node;?>'> <BR>
<INPUT type=submit name=submit value='Post Message'>
</FORM>