<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Student's Club Corner - Sub Admin</title>
        <link style="text/css" href="../CSS/style.css" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
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
                            <div class="strm" >
                        <div align="right" style="float:right; width:auto; font-weight:bold;">
                        	<form method="post" action="ae_newelection.php">
	                        	<input type="submit" class="button" value="Add New Participants">
                            </form>
                        </div>
                        <table border="2" bordercolor="#0000FF"  class="gridtable" width="95%">
                            <tr>
                                <th>Election Name</th>
                                <th>Election For</th>
                                <th>Election Start Date</th>
                                <th>Election End Date</th>
                              
                                <th>IsActive</th>
                                <th>Action</th>
                            </tr>
                            <?php
								                                
                                $query = "Select e.ElectionId, e.ElectionName, e.IsActive, e.ElectionStartDate, e.ElectionEndDate, et.ElectionTypeId, et.ElectionType from election e,election_type et where e.ElectionTypeId = et.ElectionTypeId and e.IsActive = 1 and et.IsActive = 1";
								if (isset($_SESSION['StreamId']))
								{
								 $query = $query . " and e.StreamId = ".$_SESSION['StreamId'] ;
								}
                                $result = mysql_query($query,$conn);
                                while ($row=mysql_fetch_array($result))
                                {
                            ?>
                                <tr>
	                                <td align="center"><?php print_r($row["ElectionName"]); ?></td>
                                    <td align="center"><?php print_r($row["ElectionType"]); ?></td>
                                    <td align="center"><?php print_r($row["ElectionStartDate"]); ?></td>
                                    <td align="center"><?php print_r($row["ElectionEndDate"]); ?></td>
                                    <td align="center"><?php echo $row["IsActive"]==1 ? 'Yes' : 'No' ?></td>	
                                    <td align="center">
                                    
                                    <a href="ae_newelection.php?id=<?php print_r($row["ElectionId"]); ?> ">Edit</a>&nbsp;|&nbsp;
                                    <a href="ElectionUser.php?id=<?php print_r($row["ElectionId"]); ?> ">Candidates</a>&nbsp;|&nbsp;
                                    <a href="ElectionResult.php?id=<?php print_r($row["ElectionId"]); ?> ">View Result</a>&nbsp;|&nbsp;
                                    <a id="Delete" href="deleteelection.php?id=<?php print_r($row["ElectionId"]); ?>">Delete</a> </td>
                                </tr>
                            <?php
                                }
                            ?>
                        </table>
                            
                            <?php include("footer.php");  ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

</body>
</html>