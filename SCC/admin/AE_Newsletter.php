<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Admin - Add / Edit Album</title>
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
                   // <?php
//						$nlid = 0;
//						$nlname= "";
//						$isactive = 1;
//						if(isset($_POST['btnSubmit']))
//						{
//							if(! get_magic_quotes_gpc() )
//							{
//							   $nlname = addslashes ($_POST['txtAlbumName']);
//							}
//							else
//							{
//							   $nlname =  $_POST['txtAlbumName'];
//							}
//							$isactive = $_POST['EvIsActive'];
//							if ($_POST['hdaid'] == 0)
//							{
//							$sql = "INSERT INTO album".
//								   "(AlbumName,IsActive, AddDate) ".
//								   "VALUES('$aname',$isactive, NOW())";
//							}
//							else
//							{
//								$sql = "update album set ".
//								   " AlbumName='".$aname."',IsActive=".$isactive." where AlbumId = ".$_POST['hdaid'];
//							}
//							$retval = mysql_query( $sql, $conn );
//							if(! $retval )
//							{
//							  die('Could not enter data: ' . mysql_error());
//							}
//							echo "Entered data successfully\n";
//							header("Location:subpg.php");
//							}
//						if(isset($_REQUEST['id']))
//						{
//							$id = $_REQUEST['id'];
//							$sql = "Select * from Album where AlbumId=".$id;
//							$result = mysql_query( $sql, $conn );
//							$row=mysql_fetch_array($result);		
//							$albumid = $row["AlbumId"];
//							$aname= $row["AlbumName"];
//							$isactive = $row["IsActive"];
//
//						}
//					?>
                    <br/>
                    <br/>
                    <br/>                                        
                	<form enctype="multipart/form-data" id="form1" name="form1" method="post" action="nl_insert.php" >
                        <input type="hidden" name="MAX_FILE_SIZE" value="1000000000" />
                       <!-- <input type="hidden" name="AId" id="AId" value="<?php echo $_REQUEST['NewsletterId']; ?>" />-->
                    <table class="gridtable" width="100%" >
                        <tr>
                        	<th colspan="2" align="center">Add / Edit NewsLetter</th>
                        </tr>
                       <tr>
                            <td>
                               NewsLetter Name
                            </td>
                            <td>
                                <input type="text" required="required" id="txtNlName" name="txtNlName" size="40"  />
                            </td>
                        </tr>
                        
                        
                        <tr>
                            <td>
                                NewsLetter Is Active
                            </td>
                            <td>
                                <select id="EvIsActive" name="EvIsActive">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>                              
                                 </select>
                            </td>
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
                        	<td colspan="2" align="center" >
                            <input type="submit" name="btnSubmit" id="btnSubmit" value="Submit" class="button2" />
                            <a class="button2" href="subbewsletter.php">Cancel</a>
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