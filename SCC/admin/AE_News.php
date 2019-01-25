<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin - Add / Edit News</title>
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
                    <ul>
	                    <li><a href='subhome.php'>Home</a></li>
                        <li><a href='login.php'>Logout</a></li>
                    </ul>
                </div>	
                <br />
                <div align="center">
                    <?php
							$ns = "";
							$nd = "";
							$newsid= 0;
							$isactive = 1;
						
						if(isset($_POST['btnSubmit']))
						{
							if(! get_magic_quotes_gpc() )
							{   
							   $ns = addslashes ($_POST['txtns']);
							   $nd = addslashes ($_POST['txtnd']);
							}
							else
							{
							   $ns =  $_POST['txtns'];
							   $nd = $_POST['txtnd'];
							}
							
							$uisactive = $_POST['selIsActive'];
							$sid = $_SESSION['StreamId'];
							
							if ($_REQUEST['id'] != 0)
							{	
								$sql = "Update news set NewsSubject = '".$ns."',";
								$sql = $sql." IsActive = '".$uisactive."',";
								$sql = $sql." NewsDescription = '".$nd."'";
								$sql = $sql." where NewsId = ".$_REQUEST['hdNewsId'];
							}
							else
							{
								$sql = "INSERT INTO news ".
								   "(NewsSubject,NewsDescription,StreamId,IsActive, AddDate) ".
								   "VALUES('$ns','$nd',$sid,$uisactive, NOW())";
							}
							$retval = mysqli_query( $conn,$sql );
							if(! $retval )
							{
							  die('Could not enter data: ' . mysqli_error());
							}
							echo "Entered data successfully\n";
							header ("location:subnews.php");
						}
						if (isset($_REQUEST['id']))
						{
							$id = $_REQUEST['id'];
							$sql = "Select * from news where NewsId=".$id;
							$result = mysqli_query( $conn,$sql );
							$row=mysqli_fetch_array($result);		
							$ns = $row["NewsSubject"];
							$nd = $row["NewsDescription"];
							$isactive= $row["IsActive"];
							$newsid = $row["NewsId"];
						}
					?>
                    <br/>
                	<form id="form1" name="form1" method="post" action="<?php $_PHP_SELF ?>" >
                    <table class="gridtable" width="100%" >
                        <tr>
                        	<th colspan="2" align="center">Add / Edit News</th>
                        </tr>
                       <tr>
                            <td>
                                News Subject
                            </td>
                            <td>
                                <input type="text" required id="txtns" name="txtns" size="40" value="<?php echo $ns; ?>" />
                                <input type="hidden" id="hdNewsId" name="hdNewsId" value="<?php echo $newsid;?>" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                News Description 
                            </td>
                            <td>
                            
                                <textarea id="txtnd" required name="txtnd"  cols="80" style="resize: none;" rows="10" id="txtnd">
                                <?php echo $nd; ?>
								</textarea>
                            </td>
                        </tr>
                        
                        
 						
                        <tr>
                            <td>
                                News Is Active
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
                           <a href="subnews.php" class="button2"> Cancel </a>
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