<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link style="text/css" href="../CSS/style.css" rel="stylesheet">
</head>

<body>

<div id="bg_patern">
            <div id="container">
                <div id="backimage">
                    <div id='header'> 
                        <a href ='' id='logo' class='replace'></a> 
                        <p>Students' Club Corner</p> 
                        <h3>WELCOME SUBADMIN</h3>	
                        </div>
                        	<?php include("menu.php");  ?>	
 

<?php

$conn=mysqli_connect('localhost','root','');
mysqli_select_db($conn,'scc');

$sql = "select * from user where Id= ".$_REQUEST["id"];
$result = mysqli_query($conn,$sql);
while ($row = mysqli_fetch_assoc($result))
{
?>
<div class="strm" >
<form id="formStream" method="post" action="subhome.php">
 <table class="gridtable" width="100%" >
                        <tr>
                        	<th colspan="2" align="center"><?php print_r($row["UserFirstName"]); ?></th>
                        </tr>
                       <tr>
                            <td>
                                ID
                            </td>
                            <td>
                                <?php print_r($row["Id"])?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                First Name:
                            </td>
                            <td>
                            	<?php print_r($row["UserFirstName"]); ?>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Last Name:
                            </td>
                            <td>
                                <?php print_r($row["UserLastName"]); ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                User Name:
                            </td>
                            <td>
                                <?php print_r($row["UserId"]); ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Password:
                            </td>
                            <td>
                                <?php print_r($row["Password"]); ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Date Activated:
                            </td>
                            <td>
                                <?php print_r($row["ActivationDate"]); ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Is Active:
                            </td>
                            <td>
                                <?php print_r($row["IsActive"]); ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Date of Creation:
                            </td>
                            <td>
                                <?php print_r($row["CreateDate"]); ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Email Id:
                            </td>
                            <td>
                                <?php print_r($row["Email"]); ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Phone:
                            </td>
                            <td>
                                <?php print_r($row["Phone"]); ?>
                            </td>
                        </tr><tr>
                            <td>
                                User Type:
                            </td>
                            <td>
                                <?php print_r($row["UserType"]); ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Edit User Id:
                            </td>
                            <td>
                                <?php print_r($row["EditUserId"]); ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Edit Date:
                            </td>
                            <td>
                                <?php print_r($row["EditDate"]); ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Activation User Id:
                            </td>
                            <td>
                                <?php print_r($row["ActivationUserId"]); ?>
                            </td>
                        </tr>
                        <tr>
                        	<td colspan="2" align="center" >
                            <input type="submit" name="btn" id="btn" value="OK" class="button"  />
                            
                            </td>
                        </tr>    
                    </table>                    
                    </form>
                    <?php //} ?>
                    <?php include("footer.php");  ?> 
                
<?php }?>
</div></div>
                    </div>			
        
                      
	               		
                   
                </div>
            </div>
        </div>
</body>
</html>