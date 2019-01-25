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
                   
                
                
                </div>
                <?php include("menu.php") ?>	
                <br />
                <div align="center">
                    <?php
						if(isset($_POST['btnSubmit']))
						{
					
						
							if(! get_magic_quotes_gpc() )
							{
							   
							   $ename = addslashes ($_POST['txtEventName']);
							  
							   $edescr = addslashes ($_POST['txteds']);
							   
							}
							else
							{
							   
							   $ename =  $_POST['txtEventName'];
							  
							   $edescr = $_POST['txteds'];
							   
							   
							}
							$Evisactive = $_POST['EvIsActive'];
							$SDate = $_POST['sdate'];
							$EDate = $_POST['edate'];
							$eidd = $_REQUEST['id'];
							
							$sql = "INSERT INTO subevent_master".
								   "(SubEventName,SEStart,SEEnd,IsActive, AddDate,EventId) ".
								   "VALUES('$ename','$SDate','$EDate',$Evisactive, NOW(),$eidd)";
							
							$retval = mysql_query( $sql, $conn );
							if(! $retval )
							{
							  die('Could not enter data: ' . mysql_error());
							}
							echo "Entered data successfully\n";
							header("location:View_subevent.php?id=".$_REQUEST['id']);

							mysql_close($conn);
							}
//							else
//							{
					?>
                    <br/>
                	<form id="form1" name="form1" method="post" action="<?php $_PHP_SELF ?>" >
                    <table class="gridtable" width="100%" >
                        <tr>
                        	<th colspan="2" align="center">Add / Edit Sub Event</th>
                        </tr>
                       <tr>
                            <td>
                               Sub Event Name
                            </td>
                            <td>
                                <input type="text" required="required" id="txtEventName" name="txtEventName" size="40"  />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Event Description
                            </td>
                            <td>
                                <textarea id="txteds" required="required" name="txteds" size="70"  cols="80" style="resize: none;" rows="10">
								</textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Event Start Time
                            </td>
                            <td>
                                <input type="datetime" required="required" id="sdate" name="sdate" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Event End Time
                            </td>
                            <td>
                                <input type="datetime" required="required" name="edate"/>
                            </td>
                        </tr>
                        
                        
                        <tr>
                            <td>
                                Event Is Active
                            </td>
                            <td>
                                <select id="EvIsActive" name="EvIsActive">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>                            
                                </select>
                            </td>
                        </tr>
                       
                        
                        <tr>
                        	<td colspan="2" align="center" >
                            <input type="submit" name="btnSubmit" id="btnSubmit" value="Submit" class="button2" onClick="SaveData();" />
                            <a href="View_subevent.php?id=<?php echo $_REQUEST['id'] ?>" class="button2"> Cancel </a>
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