<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Admin - Add / Edit Photos</title>
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
						//if(isset($_POST['btnSubmit']))
//						{
//					
//							$aid=$_REQUEST["id"];
//							if(! get_magic_quotes_gpc() )
//							{
//							   
//							   $pname = addslashes ($_POST['txtPhotoName']);
//							  
//							}
//							else
//							{
//							   
//							   $pname =  $_POST['txtPhotoName'];
//							  
//							   
//							}
//							$Pisactive = $_POST['PIsActive'];
//							
//							
//							$sql = "INSERT INTO photo_gallery".
//								   "(filename,IsActive, AddDate,AlbumId) ".
//								   "VALUES('$pname',$Pisactive, NOW(),$aid)";
//							
//							$retval = mysql_query( $sql, $conn );
//							if(! $retval )
//							{
//							  die('Could not enter data: ' . mysql_error());
//							}
//							echo "Entered data successfully\n";
//							mysql_close($conn);
//							}
//							else
//							{
					?>
                    <br/>
                    <br/>
                    <br/>
                	<form enctype="multipart/form-data" id="form1" name="form1" method="post" action="photo_insert.php" >
                        <input type="hidden" name="MAX_FILE_SIZE" value="1000000000" />
                        <input type="hidden" name="AId" id="AId" value="<?php echo $_REQUEST['id']; ?>" />
                    <table class="gridtable" width="100%" >
                        <tr>
                        	<th colspan="2" align="center">Add Photo</th>
                        </tr>
                       <tr>
                            <td>
                               File Name
                            </td>
                            <td>
                                <!--<input type="text" id="txtPhotoName" name="txtPhotoName" size="40"  />-->
                                        			<input name="file" type="file" id="file" />

                            </td>
                        </tr>
                        
                        	
                        <tr>
                            <td>
                                Photo Is Active
                            </td>
                            <td>
                                <select id="PIsActive" name="PIsActive">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>                            
                                </select>
                            </td>
                        </tr>
                       
                        
                        <tr>
                        	<td colspan="2" align="center" >
                            <input type="submit" name="btnSubmit" id="btnSubmit" value="Submit" class="button2" />
                            <a class="button2" href="AlbumDetails.php?id=<?php echo $_REQUEST['id'];?>">Cancel</a>
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