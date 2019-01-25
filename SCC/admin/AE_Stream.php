<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin - Add / Edit Stream</title>
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
                <div align="center" style="float:left; text-align:left; margin: 30px 0 0 30px; width:93%;" >
                    <?php
							$streamname = "";
							$streamid = 0;
							$isactive = 1;
							$sdesc = "";	
					
						if(isset($_POST['btnSubmit']))
						{
						
							if(! get_magic_quotes_gpc() )
							{
							   $sname = addslashes ($_POST['txtStreamName']);
							   $sdesc = addslashes ($_POST['txtStreamDesc']);
							}
							else
							{
							   $sname = $_POST['txtStreamName'];
							   $sdesc = $_POST['txtStreamDesc'];
							}
							$sisactive = $_POST['selIsActive'];
						
							
							if ($_POST['hdStreamId'] != 0)
							{
								
						
								$sql = "Update Stream set StreamName = '".$sname."',";
								$sql = $sql." StreamDescription = '".$sdesc."',";
								$sql = $sql." IsActive = '".$sisactive."'";
								$sql = $sql." where StreamId = ".$_REQUEST['hdStreamId'];
								}
							else							
							{
									$sql = "INSERT INTO stream ".
									   "(StreamName,StreamDescription, IsActive, AddDate) ".
									   "VALUES('".$sname."','".$sdesc."',".$sisactive.", NOW())";
							}
							$retval = mysqli_query( $conn,$sql);
							if(! $retval )
							{
							  die('Could not enter data: ' . mysqli_error());
							}
							echo "Entered data successfully\n";
							header("Location: home.php");
						}
						if (isset($_REQUEST['id']))
						{
							$id = $_REQUEST['id'];
							$sql = "Select * from stream where StreamId=".$id;
							$result = mysqli_query($conn,$sql);
							$row=mysqli_fetch_array($result);		
							$streamid = $row["StreamId"];
							$streamname= $row["StreamName"];
							$sdesc = $row["StreamDescription"];
						}
							
					?>
                    <br />
                	<form id="form1" name="form1" method="post" action="<?php $_PHP_SELF ?>">
                    <table class="gridtable" width="100%" >
                        <tr>
                        	<th colspan="2" align="center">Add / Edit Stream</th>
                        </tr>
                       <tr>
                            <td>
                                Stream Name
                            </td>
                            <td>
                                <input type="text" id="txtStreamName" required="required" name="txtStreamName" size="40" value="<?php echo $streamname?>" />
                                <input type="hidden" id="hdStreamId" name="hdStreamId" value="<?php echo $streamid?>" />
                            </td>
                        </tr>
                        <tr>
                            <td valign="top">
                                Stream Description
                            </td>
                            <td>
                            	<textarea name="txtStreamDesc" cols="80" required="required"  style="resize: none;" rows="10"  id="txtStreamDesc" ><?php echo $sdesc ?>
								</textarea>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Stream Is Active
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
							<a href="home.php" class="button2"> Cancel </a>
                           
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