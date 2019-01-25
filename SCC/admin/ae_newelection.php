<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sub Admin - Add / Edit Election</title>
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
                        <h3>WELCOME SUBADMIN</h3>	
                        </div>
                        	<?php include("menu.php");  ?>
                	
                <br />
                
                <div align="center" style="float:left; text-align:left; margin: 30px 0 0 30px; width:93%;" >
                    <?php
							$elname = "";
							$eid = 0;
							$isactive = 1;
							$eltype = 0;
							$elsdate = "";
							$eledate = "";
							$sisactive = 1;
					
						if(isset($_POST['btnSubmit']))
						{
						
							if(! get_magic_quotes_gpc() )
							{
							   $elname = addslashes ($_POST['txtEname']);
							}
							else
							{
							   $elname = $_POST['txtEname'];
							}
							$eltype = $_POST['eltype'];
							$elsdate = $_POST['txtSdate'];
							$eledate = $_POST['txtEdate'];
							$sisactive = $_POST['selIsActive'];
						
							
							if ($_POST['hdelId'] != 0)
							{
								
						
								$sql = "Update election set ElectionTypeId = '".$eltype."',".
										" ElectionName = '".$elname."',".
										" ElectionStartDate = '".$elsdate."',".
										" ElectionEndDate = '".$eledate."',".
								$sql = $sql." IsActive = '".$sisactive."'";
								$sql = $sql." where ElectionId = ".$_REQUEST['hdelId'];
								}
							else							
							{
									$sql = "INSERT INTO election ".
									   "(ElectionName, ElectionTypeId, StreamId, ElectionStartDate, ElectionEndDate, AddUserId, AddDate, IsActive) ".
									   "VALUES('".$elname."',".$eltype.",".$_SESSION['StreamId'].",'".$elsdate."','".
									   	$eledate."',".$_SESSION['uid'].", NOW(),".$sisactive.")";
							}
							$retval = mysql_query( $sql, $conn );
							if(! $retval )
							{
							  die('Could not enter data: ' . mysql_error());
							}
							echo "Entered data successfully\n";
							header("Location: subonlvoting.php");
						}
						if (isset($_REQUEST['id']))
						{
							$id = $_REQUEST['id'];
							$sql = "Select * from election where ElectionId=".$id;
							$result = mysql_query( $sql, $conn );
							$row=mysql_fetch_array($result);		
							$elid = $row["ElectionTypeId"];
							$elname= $row["ElectionName"];
							//$elname = "";
							$eid = $_REQUEST['id'];
							$isactive =  $row["IsActive"];
							$eltype = $row["ElectionTypeId"];
							$elsdate =  $row["ElectionStartDate"];
							$eledate =  $row["ElectionEndDate"];
							//$sisactive =  $row["ElectionTypeId"];
							
						}
							
					?>
                    <br />
                	<form id="form1" name="form1" method="post" action="<?php $_PHP_SELF ?>">
                    <table class="gridtable" width="100%" >
                        <tr>
                        	<th colspan="2" align="center">Add / Edit ELECTION</th>
                        </tr>
                   <tr>
                            <td valign="top">
                                Election Name
                            </td>
                            <td>
                            	<input type="text" name="txtEname"  required="required"  size="40"  
                                	id="txtEname"  value="<?php echo $elname; ?>" />
								<input type="hidden" id="hdelId" name="hdelId" value="<?php echo $eid; ?>" />
                          </td>
                        </tr>

                        <tr>
                            <td valign="top">
                                Election Type
                            </td>
                            <td>
                            	<select id="eltype" name="eltype" >
                                 <?php
								                                
                                $query = "Select * from election_type where IsActive = 1" ;
                                $result = mysql_query($query,$conn);
                                while ($row1 =mysql_fetch_array($result))
                                {
                            ?>
                                <option value="<?php echo $row1['ElectionTypeId']; ?>" <?php if($isactive == 0): ?> selected="selected"<?php endif; ?> ><?php echo $row1['ElectionType']; ?></option>
                                <?php } ?>
	                                </select>
			
                            </td>
                        </tr>
		

						<tr>
                            <td valign="top">
                                Election Start Date
                            </td>
                            <td>
                            	<input type="text" name="txtSdate"  required="required"  size="40"  id="txtSdate"  value="<?php echo $elsdate ?>" />
								
                            </td>
                        </tr>
                        
                        <tr>
                            <td valign="top">
                                Election End Date
                            </td>
                            <td>
                            	<input type="text" name="txtEdate"  required="required"  size="40"  id="txtEdate"  value="<?php echo $eledate ?>" />
								
                            </td>
                        </tr>
						
                        
                        <tr>
                            <td>
                                Election Type Is Active
                            </td>
                            <td>
                            
                                <select id="selIsActive" name="selIsActive">
                                    <option value="1" <?php if($isactive == 1): ?> selected="selected"<?php endif; ?>>Yes</option>
                                    <option value="0" <?php if($isactive == 0): ?> selected="selected"<?php endif; ?>>No</option>                            
                                </select>
                            </td>
                        </tr>
                        <tr>
                        	<td colspan="2" align="center" >
                            <input type="submit" name="btnSubmit" id="btnSubmit" value="Submit" class="button2" />
							<a href="subonlvoting.php" class="button2"> Cancel </a>
                           
                            </td>
                        </tr>    
                    </table>                    
                    </form>
                                        <br />
                </div>				
            </div>
            <?php include("footer.php");  ?>
        </div>
    </div>
</body>
</html>