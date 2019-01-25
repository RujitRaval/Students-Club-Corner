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
                          
                           
                           
                           
                            <table border="2" bordercolor="#0000FF"  class="gridtable" width="95%">
                            <tr>
                            	<th>ID</th>
								<th>Suggestion</th>
                               <!-- <th>User ID</th>-->
                                <th>Name</th>
                                <th>Email</th>
                                <th>Date & Time</th>
                                <th>Action</th>
                            </tr>
                            <?php
                                
                                $query = "Select * from feedback";
                                $result = mysqli_query($conn,$query);
                                while ($row=mysqli_fetch_array($result))
                                {
                            ?>
                                <tr>
                                	<td align="left"><?php print_r($row["FeedBackId"]); ?></td>
                                    <td align="left"><?php print_r($row["suggestion"]); ?></td>
<!--                                    <td align="left"><?php /*?><?php print_r($row["UserId"]); ?><?php */?></td>
-->                                    <td align="left"><?php print_r($row["Name"]); ?></a></td>
                                    <td align="left"><?php print_r($row["Email"]); ?></td>
                                    <td align="left"><?php print_r($row["AddDate"]); ?></td>
                                    
                                    <td align="center">
                                    <a id="Delete" href="deletefeed.php?id=<?php print_r($row["FeedBackId"]); ?> ">Delete</a> </td>
                                </tr>
                            <?php
                                }
                            ?>
                        </table>
                           
                           
                            </div>
                            
                    </div><?php include("footer.php");  ?>
                </div>
            </div>
        </div>
    </body>
</html>

</body>
</html>