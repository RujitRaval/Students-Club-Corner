<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Admin - Add / Edit Event</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
                    <?php include("menu.php");  ?>
                </div>	
                <br />
                <div align="center">
                    <?php
						$sename = "";
						//$sdesc = "";
						$ssdate= "";
						$sedate = "";
						$isactive = 1;
						$id=0;
						if(isset($_POST['btnSubmit']))
						{
							if(! get_magic_quotes_gpc() )
							{  
							   $sename = addslashes ($_POST['txtEventName']);
							   //$sdesc = addslashes ($_POST['txted']);
							}
							else
							{
							   $sename =  $_POST['txtEventName'];
							   //$sdesc = $_POST['txted'];
							}
							$isactive = $_POST['EvIsActive'];
							$ssdate = $_POST['sdate'];
							$sedate = $_POST['edate'];
							$id = $_POST['hdEId'];
							if ($_POST['hdEId'] == 0)
							{
								$sql = "INSERT INTO event_master".
									   "(EventName, StreamId, EventStartTime, EventEndTime, IsActive, AddDate) ".
									   "VALUES('".$sename."',".$_SESSION['StreamId'].",'".$ssdate."','".$sedate."',$isactive, NOW())";
							}
							else
							{
								$sql = "update event_master set ".
			" EventName='".$sename."', EventStartTime='".$ssdate."',EventEndTime='".$sedate."',IsActive=".$isactive.
									" where EventId = ".$id;	
							}
							$retval = mysqli_query( $conn,$sql);
							if(! $retval )
							{
							  die('Could not enter data: ' . mysqli_error());
							}
							echo "Entered data successfully\n";
							header('location:subevent.php');
							mysqli_close($conn);
							}

						if (isset($_REQUEST['id']))
						{
							$id = $_REQUEST['id'];
							$sql = "Select * from event_master where EventId=".$id;
							$result = mysqli_query($conn, $sql );
							$row=mysqli_fetch_array($result);		
							$sename = $row["EventName"];
							//$sdesc = $row["SubDesc"];
							$ssdate= $row["EventStartTime"];
							$sedate = $row["EventEndTime"];
							$isactive = $row['IsActive'];

							}
					?>
                    <br/>
                	<form id="form1" name="form1" method="post" action="<?php $_PHP_SELF ?>" >
                    <input type="hidden" name="hdEId" value="<?php echo $id;?>"  />
                    <table class="gridtable" width="100%" >
                        <tr>
                        	<th colspan="2" align="center">Add / Edit Event</th>
                        </tr>
                       <tr>
                            <td>
                               Event Name
                            </td>
                            <td>
                                <input type="text" id="txtEventName" required="required" name="txtEventName" size="40"
                                value="<?php echo $sename; ?>"  />
                            </td>
                        </tr>
                        <!--<tr>
                            <td>
                                Event Description
                            </td>
                            <td>
                                <textarea id="txted" name="txted" required="required" size="40" cols="80" style="resize: none;" rows="10"><?php //echo $sdesc; ?>
								</textarea>
                            </td>
                        </tr>-->
                        <tr>
                            <td>
                                Event Start Time
                            </td>
                            <td>
                                <input type="datetime" id="sdate" required="required" name="sdate" value="<?php echo $ssdate;?>" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Event End Time
                            </td>
                            <td>
                                <input type="datetime" required="required" name="edate" value="<?php echo $sedate;?>" />
                            </td>
                        </tr>
                        
                        
                        <tr>
                            <td>
                                Event Is Active
                            </td>
                            <td>
                                <select id="EvIsActive" name="EvIsActive">
                                    <option value="1" <?php if($isactive == 1): ?> selected="selected"<?php endif; ?>>Yes</option>
                                    <option value="0" <?php if($isactive == 0): ?> selected="selected"<?php endif; ?>>No</option>                                                   
                                </select>
                            </td>
                        </tr>
                       
                        
                        <tr>
                        	<td colspan="2" align="center" >
                            <input type="submit" name="btnSubmit"  class="button2" id="btnSubmit" value="Submit" onClick="SaveData();" />
                            <a href="subevent.php" class="button2"> Cancel </a>
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