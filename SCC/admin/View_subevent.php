<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Student's Club Corner - Sub Admin</title>
        <link style="text/css" href="../CSS/style.css" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

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
                        <div align="right">
							<form id="formStream" method="post" action="AE_subevent2.php?eid=<?php echo $_REQUEST["id"] ?>&sid=0" />
	                            <input type="submit" value="Add Sub Event" class="button"  ><br>
							</form>
                           
                        </div>
                        <table border="2" bordercolor="#0000FF"  class="gridtable" width="95%">
                            <tr>
                            	<th>Event Name</th>
                                <th>Event Description</th>
                                <th>EventStartTime</th>
                                <th>EventEndTime</th>
                                <th>IsActive</th>
                                <th>Action</th>
                            </tr>
                            <?php
                                
                                $query = "Select * from subevent_master where EventId= ".$_REQUEST["id"];
                                $result = mysqli_query($conn,$query);
                                while ($row =mysqli_fetch_array($result))
                                {
                            ?>
                                <tr>
                                	
                                    <td align="left"><?php print_r($row["SubEventName"]); ?></td>
                                    <td align="left"><?php print_r($row["SubDesc"]); ?></td>
                                
                                    <td align="left"><?php print_r($row["SEStart"]); ?></td>
                                    <td align="left"><?php print_r($row["SEEnd"]); ?></td>
                                    
                                    <td align="center"><?php if ($row["IsActive"]) { ?>Yes<?php  }else { ?> No <?php } ; ?></td>
                                    <td align="center">
                                    
                                    <a href="AE_subevent2.php?eid=<?php print_r ($row["EventId"]); ?>&sid=<?php echo $row['Id'];?> ">Edit<br /></a>
                                    
                                    <a id="Delete" href="deleteSubEvent2.php?id=<?php print_r ($row["EventId"]); ?>&sid=<?php print_r ($row['Id']); ?> ">Delete</a> </td>
                                </tr>
                            <?php
                                }
                            ?>
                        </table>
                    </div>			
        
                       
                            
                            
                            <?php include("footer.php");  ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

</body>
</html>