<?php include("connection.php"); ?>
<html>
<head>
<link style="text/css" href="CSS/style.css" rel="stylesheet">
<title>Feedback</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-top: 0px;
}
-->
</style>
<link href="css.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style1 {
	font-size: 24px;
	color: #DF607B;
}
-->
</style>
</head>

<script type="text/javascript" language="javascript">

function validateForm()
{
	

var a = document.form4.contact.value;
if(a=="")
{
alert("please Enter the Contact Number");
document.form4.contact.focus();
return false;
}
if(isNaN(a))
{
alert("Enter the valid Mobile Number(Like : 9566137117)");
document.form4.contact.focus();
return false;
}
if((a.length < 1) || (a.length > 10))
{
alert(" Your Mobile Number must be 1 to 10 Integers");
document.form4.contact.select();
return false;
}


var x=document.forms["form4"]["emai"].value;
var atpos=x.indexOf("@");
var dotpos=x.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
  {
  alert("Not a valid e-mail address");
  return false;
  }



}




</script>
<body>


<div id="bg_pattern">
	<div id="container">
		<div id="backimage"> 
	<?php include("header_df.php"); 
		  
		  
	if(isset($_POST['button3']))
	{
		
		$a = $_SESSION['UserName'];
		$b = $_SESSION['email_user'];
		$c = $_SESSION['login_user'];	
	
$query="insert into feedback(Name,suggestion,Email,AddDate,user_id) values('".$a."','".$_POST['suggestion']."',
		'".$b."',NOW(),'".$c."')";	

		mysql_query($query);		
	}
	 ?>         
     <div align="center">
     <div id="fon3" >



 	<form action="<?php $_PHP_SELF ?>" method="post">
    
		<table align="center">
              <tr>
                <th height="30" align="center" valign="middle" colspan="2" class="title" style="background-color:#22222a"> FEEDBACK
                </th>
              </tr>

 				<!--<tr>
                      <td height="30" align="right" valign="top">&nbsp;</td>
                      <td align="left" valign="middle">&nbsp;</td>
                    </tr>              <tr>
                      <td  align="right" valign="top">&nbsp;Name</td>
                      <td align="left" valign="middle">
                      <form id="form4" name="form4" method="post" action="">
                          <label>
                          <input name="name" type="text" id="name" required size="50"  />
                          </label>
						
                      </td>
                </tr>
                    <tr>
                      <td height="30" align="right" valign="top">&nbsp;</td>
                      <td align="left" valign="middle">&nbsp;</td>
                    </tr>
                    <tr>
                      <td height="25" align="right" valign="top">Address&nbsp;</td>
                      <td align="left" valign="middle"><textarea style="resize:none" required name="address"  cols="39" id="address"></textarea></td>
                    </tr>
                    <tr>
                      <td height="30" align="left" valign="middle">&nbsp;</td>
                      <td align="left" valign="middle">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right" valign="top">Contact&nbsp;</td>
                      <td align="left" valign="middle"><input name="contact" type="text" id="contact" size="50" /></td>
                    </tr>
                    <tr>
                      <td height="30" align="left" valign="middle">&nbsp;</td>
                      <td align="left" valign="middle">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right" valign="top">Email&nbsp;</td>
                      <td align="left" valign="middle"><input name="emai" type="email" id="emai" size="50" /></td>
                    </tr>
                    <tr>
                      <td height="30" align="left" valign="middle">&nbsp;</td>
                      <td align="left" valign="middle">&nbsp;</td>
                    </tr>-->
                    
                    <tr>
                      <td height="37" align="right" valign="top"><font size="+2">Suggestions:&nbsp;</font></td>
                      <td align="left" valign="middle" style="padding-left:30px"><textarea name="suggestion" required style="resize:none" cols="65" rows="20" id="suggestion"></textarea></td>
                    </tr>
                    
                   <!-- <tr>
                      <td height="30" align="left" valign="middle">&nbsp;</td>
                      <td align="left" valign="middle">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right" valign="top">City&nbsp;</td>
                      <td align="left" valign="middle"><input name="city" type="text" required id="city" size="50" /></td>
                    </tr>
                    <tr>
                      <td height="30" align="left" valign="middle">&nbsp;</td>
                      <td align="left" valign="middle">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right" valign="top">State&nbsp;</td>
                      <td align="left" valign="middle"><input name="state" required type="text" id="state" size="50" /></td>
                    </tr>
                    <tr>
                      <td align="left" valign="middle">&nbsp;</td>
                      <td align="left" valign="middle">&nbsp;</td>
                    </tr>-->
                    
                        <tr>
                          <td align="center" colspan="2" valign="middle">
                          
                              <input type="submit" name="button3" id="button3" value="Submit" class="button2" />
                         	  <input type="reset" name="button4" id="button4" value="Reset" class="button2" /></td>
                        </tr>
                      </table>
              </div></div>
         </form>
          <?php include("footer_df.php");  ?>
        </div>
	</div>
</div>

</body>
</html>