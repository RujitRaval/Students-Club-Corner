<?php include("connection.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CHANGE PASSWORD</title>
<link style="text/css" href="CSS/style.css" rel="stylesheet">
</head>

<body>
<div id="bg_pattern">
<div id="container">
<div id="backimage">
    <?php include("header.php"); 
if (!isset($_SESSION['login_user']))
{
	header("Location:index.php");
}




if(isset($_POST['btnSubmit']))
{

$username = $_SESSION['login_user'];

$password = $_POST['password'];

$newpassword = $_POST['newpassword'];

$repeatnewpassword = $_POST['repeatnewpassword'];


$result = mysql_query("SELECT Password FROM user WHERE UserId='$username'");

if(!$result) 
{ 
  //  echo "ERROR"; 
} 

if ($row = mysql_fetch_assoc($result))
{ 
   // echo "ERROR"; 
} 

if($newpassword==$repeatnewpassword) 
{
    $sql=mysql_query("UPDATE user SET Password='$newpassword' where UserId='$username'"); 
echo $_SESSION['login_user'];
}

if($sql) 
{
	//echo "DONE"; 
}
else
{ 
  // echo "NOTE DONE";
}  

}
?> 
<div align="center">
     
<form id="form1" name="form1" method="post" action="<?php $_PHP_SELF ?>" >
                    <!--<table style="margin-top:60px;" width="50%" align="center" >
                        <tr bgcolor="#000066" height="50">-->
                        <table border="2" bordercolor="#0000FF" class="gridtable" width="95%">
                        <tr>
                        	<th style="color:#FFF" colspan="2" align="center">CHANGE PASSWORD</th>
                        </tr>
                       <tr >
                            <td>
                                USER ID
                            </td>
                            <td align="left" height="30">
                               <?php echo $_SESSION['login_user']; ?>
                                
                            </td>
                        </tr>
                        <tr >
                            <td>
                                PASSWORD
                            </td>
                            <td>
                                <input type="password" id="password" required="required" name="password" size="40"  />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                NEW PASSWORD
                            </td>
                            <td>
                                <input type="password" id="newpassword" required="required" name="newpassword" size="40" />
                            </td>
                        </tr>
                        <tr >
                            <td>
                                CONFIRM PASSWORD
                            </td>
                            <td>
                                <input type="password" id="repeatnewpassword" required="required" name="repeatnewpassword" size="40" />
                            </td>
                        </tr>
                         <tr bgcolor="#000066" height="50">
                        	<td colspan="2" align="center" >
                            <input type="submit" name="btnSubmit" id="btnSubmit" class="button2" value="Submit"  />
                            
                            </td>
                        </tr>    
                    </table>     
                    </div>               
</form>
<?php include("footer.php");  ?>
        </div>
	</div>
</div>
  
</body>
</html>