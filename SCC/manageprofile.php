      <?php	include("connection.php"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link style="text/css" href="CSS/style.css" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Details</title>
</head>

<body >

<div id="bg_pattern">
<div id="container">
<div id="backimage">	
<?php	include("header_df.php");
?>      
	<form id="form1" name="form1" method="post" action="<?php $_PHP_SELF ?>" >
                    <table class="gridtable" width="100%" >
                    
                    
                        <tr>
                        	<th colspan="2" align="center">Add Details</th>
                        </tr>
                        
                       <tr>
                            <td>
                               User ID
                            </td>
                            <td>
                               
                               <?php echo $_SESSION['login_user'] ?>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                Name 
                            </td>
                            <td>
                               <?php echo $_SESSION['UserName'] ?>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                Batch
                            </td>
                            <td>
                                <?php echo $_SESSION['batch'] ?>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                Contact No.
                            </td>
                            <td>
                                <?php echo $_SESSION['phone'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Email Id
                            </td>
                            <td>
                            	<?php echo $_SESSION['email_user'] ?>
                            </td>
                        </tr>
                         <tr>
                            <td>
                                Address
                            </td>
                            <td>
                                <input type="text" id="txtemail" required name="txtemail" size="40"  />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Zip
                            </td>
                            <td>
                                <input type="text" id="txtemail" required name="txtemail" size="40"/>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                Phone No.
                            </td>
                            <td>
                            	<input type="text" id="txtphone" required name="txtphone" size="40"   />
								
                            </td>
                        </tr>
 						
                       
                        
                        <tr>
                        	<td colspan="2" align="center" >
                            <input type="submit" name="btnSubmit" id="btnSubmit" value="Submit" class="button2" onClick="SaveData();" />
                            <a href="index.php" class="button2"> Cancel </a>
							                            </td>
                        </tr>    
                    </table>                    
                    </form>        
        
<?php 

include("footer_df.php");  ?>
</div>
</div>
</div>
</body>
</html>