<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin - Add / Edit Sub Admin</title>
<link style="text/css" href="../CSS/style.css" rel="stylesheet">

</head>
<body>
   	<?php include("connection.php");  ?>
 	<div id="bg_patern">
        <div id="container">
            <div id="backimage">
                <div id='header'> 
                    <a href ='' id='logo' class='replace'></a> 
                    <p>Students' Club Corner</p> 		
                    <?php include("AdminMenu.php");  ?>
                </div>	
                <br />
                <div align="center">
                    <?php
							$id = "";
					
							$fn = "";
							$ln= "";
							$uid = "";
							$pwd = "";
							$uia = 1;
							$email = "";
							$phn = "";
							$sid = 0;
						
						if(isset($_POST['btnSubmit']))
						{
					
						
							if(! get_magic_quotes_gpc() )
							{
							   
							   $ufname = addslashes ($_POST['txtUserFirstName']);
							   $ulname = addslashes ($_POST['txtUserLastName']);
							   $uuid = addslashes ($_POST['txtUserId']);
							   $pwd = addslashes ($_POST['txtPassword']);
							   $uemail = addslashes ($_POST['txtemail']);
							   $uphone = addslashes ($_POST['txtphone']);
							   
							}
							else
							{
							   
							   $ufname =  $_POST['txtUserFirstName'];
							   $ulname = $_POST['txtUserLastName'];
							   $uuid = $_POST['txtUserId'];
							   $pwd = $_POST['txtPassword'];
							   $uemail = $_POST['txtemail'];
							   $uphone = $_POST['txtphone'];
							}
							$uisactive = $_POST['selIsActive'];
							$streamid = $_POST['stream'];
							
							
							if(isset($_POST["btnSubmit"]))
							{
							
							if($_POST['hdId'] == "")
							{
								
								$sql = "INSERT INTO user ".
									   "(UserType,UserFirstName,UserLastName,UserId,Password,Email,Phone,IsActive, ActivationDate) ".
									   "VALUES(2,'$ufname','$ulname','$uuid','$pwd','$uemail','$uphone',$uisactive, NOW())";
								$retval = mysqli_query( $conn,$sql);
								if(! $retval )
								{
								  die('Could not enter data: ' . mysqli_error());							  
								}
															$uid = mysqli_insert_id();
								$sql = "INSERT INTO stream_subadmin_relation".
									   "(StreamId, UserId,IsActive, AddDate) ".
									   "VALUES('$streamid','$uuid', $uisactive, NOW())";
								$retval = mysqli_query($conn,$sql );
								if(! $retval )
								{
								  die('Could not enter data: ' . mysqli_error());							  
								}
							}
							else
							{
								
								$sql = "Update user set UserFirstName = '".$ufname."',";
								$sql = $sql." UserLastName = '".$ulname."',";
								//$sql = $sql." UserId = '".$uuid."',";
								$sql = $sql." Password = '".$pwd."',";
								$sql = $sql." Email = '".$uemail."',";
								$sql = $sql." Phone = '".$uphone."',";
								$sql = $sql." IsActive = '".$uisactive."'";
								$sql = $sql." where UserId = '".$_REQUEST['hdId']."'";
									$retval = mysqli_query( $sql, $conn );
								if(! $retval )
								{
								  die('Could not enter data: ' . mysqli_error());							  
								}
							}

							echo $uid;
							
							echo "Entered data successfully\n";
							header("Location: subadmin.php");
							exit;
							}
						}
					
					
					if (isset($_REQUEST['id']))
						{
							
							$id = $_REQUEST['id'];
							$sql = "Select * from user where UserId='".$id."'";
							$result = mysqli_query($conn,$sql);
							$row=mysqli_fetch_array($result);
									
							$fn = $row["UserFirstName"];
							$ln= $row["UserLastName"];
							$uid = $row["UserId"];
							$pwd = $row["Password"];
							$uia = $row["IsActive"];
							$email = $row["Email"];
							$phn = $row["Phone"];
							//$sid = $row["StreamId"];
						}
							
					
					?>
                    
                    
                    <br/>
                	<form id="form1" name="form1" method="post" action="<?php $_PHP_SELF ?>" >
                    <table class="gridtable" width="100%" >
                        <tr>
                        	<th colspan="2" align="center">Add / Edit Sub Admin</th>
                        </tr>
                       <tr>
                            <td>
                                First Name
                            </td>
                            <td>
                                <input type="text" id="txtUserFirstName" required="required" name="txtUserFirstName" size="40" value="<?php echo $fn; ?>" />
                                <input type="hidden" id="hdId" name="hdId" value="<?php echo $id?>" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Last Name 
                            </td>
                            <td>
                                <input type="text" id="txtUserLastName" required="required" name="txtUserLastName" size="40"  value="<?php echo $ln; ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                User Id
                            </td>
                            <td>
                                <input type="text" id="txtUserId" required="required" name="txtUserId" size="40" value="<?php echo $uid; ?>"  />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Password
                            </td>
                            <td>
                            	<input type="password" required="required" id="txtPassword" name="txtPassword" size="40" value="<?php echo $pwd; ?>"  />
								
                            </td>
                        </tr>
                        <tr>
                            <td>
                                User Is Active
                            </td>
                            <td>
                                <select id="selIsActive" name="selIsActive">
                                     <option value="1" <?php if($uia == 1): ?> selected="selected"<?php endif; ?>>Yes</option>
                                    <option value="0" <?php if($uia == 0): ?> selected="selected"<?php endif; ?>>No</option>                           
                                </select>
                            </td>
                        </tr>
                         <tr>
                            <td>
                                Email-ID
                            </td>
                            <td>
                                <input type="text" id="txtemail" required="required" name="txtemail" size="40" value="<?php echo $email; ?>"  />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Phone No.
                            </td>
                            <td>
                            	<input type="text" id="txtphone" required="required" name="txtphone" size="40" value="<?php echo $phn; ?>"  />
								
                            </td>
                        </tr>
 						
                        <tr>
                            <td>
                                STREAM
                            </td>
                            <td>
                                <select id="stream" name="stream">
                                  <?php  $query = "Select StreamId,StreamName from stream where IsActive=1 ";
									$result = mysqli_query($conn,$query);
					while ($row =mysqli_fetch_array($result))
					{
						?>
                                    <option value="<?php echo $row['StreamId'];?>"><?php echo $row['StreamName'];?></option>    
                                    <?php } ?>                        
                                </select>
                            </td>
                        </tr>
                       
                        
           	             <tr>
                        	<td colspan="2" align="center" >
                            <input type="submit" name="btnSubmit" id="btnSubmit" value="Submit" class="button2" onClick="SaveData();" />
                            <a href="subadmin.php" class="button2"> Cancel </a>
                            </td>
                        </tr>    
                    </table>                    
                    </form>
                    <?php //} ?>
                
                </div>				<?php include("footer.php");  ?>
            </div>
            
        </div>
    </div>
</body>
</html>