<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin - Add / Edit Stream</title>
<link style="text/css" href="../CSS/style.css" rel="stylesheet">

</head>
<body>
   	<?php include("connection.php");  ?>
 	<?php include("headersub.php"); ?>
    
    
                <div align="center">
                <br><br><br><br>
                    <?php
					$id = "";
					
							$fn = "";
							$ln= "";
							$batch= "";
							$uid = "";
							$pwd = "";
							$uia = 1;
							$email = "";
							$phn = "";
							$sid = 0;
							$ut = 3;
							$uisactive = 1;
						if(isset($_POST['btnSubmit']))
						{
					
						
							if(! get_magic_quotes_gpc() )
							{
							   
							   $ufname = addslashes ($_POST['txtUserFirstName']);
							   $ulname = addslashes ($_POST['txtUserLastName']);
							   $bch =  addslashes ($_POST['txtBatch']);
							   $uuid = addslashes ($_POST['txtUserId']);
							   $pwd = addslashes ($_POST['txtPassword']);
							   $uemail = addslashes ($_POST['txtemail']);
							   $uphone = addslashes ($_POST['txtphone']);
							}
							else
							{
							   
							   $ufname =  $_POST['txtUserFirstName'];
							   $ulname = $_POST['txtUserLastName'];
							   $bch = $_POST['txtBatch'];
							   $uuid = $_POST['txtUserId'];
							   $pwd = $_POST['txtPassword'];
							   $uemail = $_POST['txtemail'];
							   $uphone = $_POST['txtphone'];
							}
							$uisactive = $_POST['selIsActive'];
							$utype =  $_POST['txtUserType'];
							
							
							if(isset($_POST["btnSubmit"]))
							{
							
							if($_POST['hdId'] == "")
							{
								
								$sql = "INSERT INTO user ".
								   "(UserType,UserFirstName,UserLastName,Batch,UserId,Password,Email,Phone,IsActive, ActivationDate) ".
								   "VALUES('$utype','$ufname','$ulname','$bch','$uuid','$pwd','$uemail','$uphone',$uisactive, NOW())";
								$retval = mysqli_query( $conn,$sql);
								
								if(! $retval )
								{
								  die('Could not enter data: ' . mysqli_error());							  
								}
								$uid = mysqli_insert_id();
								$sql = "INSERT INTO stream_subadmin_relation".
									   "(StreamId, UserId,IsActive, AddDate) ".
									   "VALUES(".$_SESSION['StreamId'].",'$uuid', $uisactive, NOW())";
								$retval = mysqli_query( $conn,$sql);
								if(! $retval )
								{
								  die('Could not enter data: ' . mysqli_error());							  
								}

							}
							else
							{
								
								$sql = "Update user set UserFirstName = '".$ufname."',";
								$sql = $sql." UserLastName = '".$ulname."',";
								$sql = $sql." Batch = '".$bch."',";
								//$sql = $sql." UserId = '".$uuid."',";
								$sql = $sql." Password = '".$pwd."',";
								$sql = $sql." Email = '".$uemail."',";
								$sql = $sql." Phone = '".$uphone."',";
								$sql = $sql." IsActive = ".$uisactive;
								$sql = $sql." where UserId = '".$_REQUEST['hdId']."'";
								$retval = mysqli_query( $conn,$sql);
								if(! $retval )
								{
								  die('Could not enter data: ' . mysqli_error());							  
								}
							}

							echo $uid;
							
							echo "Entered data successfully\n";
							header("Location: subhome.php");
							exit;
							}
						}
							
							if (isset($_REQUEST['id']))
						{
							
							$id = $_REQUEST['id'];
							$sql = "Select * from user where UserId='".$id."'";
							$result = mysqli_query( $conn,$sql);
							$row=mysqli_fetch_array($result);
									
							$fn = $row["UserFirstName"];
							$ln= $row["UserLastName"];
							$batch = $row["Batch"];
							$uid = $row["UserId"];
							$pwd = $row["Password"];
							$uia = $row["IsActive"];
							$email = $row["Email"];
							$phn = $row["Phone"];
							//$sid = $row["StreamId"];
							$ut = $row["UserType"];
						}
							
							
//							
					?>
                    <br/>
                	<form id="form1" name="form1" method="post" action="<?php $_PHP_SELF ?>" >
                    <table class="gridtable" width="100%" >
                        <tr>
                        	<th colspan="2" align="center">Add / Edit User</th>
                        </tr>
                       <tr>
                            <td>
                                First Name
                            </td>
                            <td>
                                <input type="text" required id="txtUserFirstName" name="txtUserFirstName" size="40"  value="<?php echo $fn; ?>"  />
                              <input type="hidden" id="hdId" name="hdId" value="<?php echo $id?>" />

                            </td>
                        </tr>
                        <tr>
                            <td>
                                Last Name 
                            </td>
                            <td>
                                <input type="text" id="txtUserLastName" required name="txtUserLastName" size="40"  value="<?php echo $ln; ?>"  />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Batch
                            </td>
                            <td>
                                <input type="text" id="txtBatch" required name="txtBatch" size="40"  value="<?php echo $batch; ?>"  />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                User Id
                            </td>
                            <td>
                                <input type="text" id="txtUserId" required name="txtUserId" size="40" value="<?php echo $uid; ?>"   />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Password
                            </td>
                            <td>
                            	<input type="password"  required="required" id="txtPassword"  Name="txtPassword" size="40"  value="<?php echo $pwd; ?>"  />
								
                            </td>
                        </tr>
                         <tr>
                            <td>
                                Email-ID
                            </td>
                            <td>
                                <input type="text" id="txtemail" required name="txtemail" size="40"  value="<?php echo $email; ?>"  />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Phone No.
                            </td>
                            <td>
                            	<input type="text" id="txtphone" required name="txtphone" size="40"  value="<?php echo $phn; ?>"  />
								
                            </td>
                        </tr>
 						<tr>
                            <td>
                                User Type
                            </td>
                            <td>
                                <select id="txtUserType" name="txtUserType">
                                     <option value="3" <?php if($ut == 3): ?> selected="selected"<?php endif; ?>>Faculty</option>
                                    <option value="4" <?php if($ut == 4): ?> selected="selected"<?php endif; ?>>Student</option> 
                                                                
                                </select>
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
                        	<td colspan="2" align="center" >
                            <input type="submit" name="btnSubmit" id="btnSubmit" value="Submit" class="button2" onClick="SaveData();" />
                            <a href="subhome.php" class="button2"> Cancel </a>
							                            </td>
                        </tr>    
                    </table>                    
                    </form>
                    <?php //} ?>
                </div>
				<?php include("footer.php");  ?>
            </div>
        </div>
    </div>
</body>
</html>