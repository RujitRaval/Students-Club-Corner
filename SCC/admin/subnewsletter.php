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
                          <div align="right">
							<form id="formStream" method="post" action="AE_Newsletter.php">
	                            <input type="submit" value="Add NewsLetter" class="button"  ><br>
							</form>
                        </div>
                           
                           
                           
                            <table border="2" bordercolor="#0000FF"  class="gridtable" width="95%">
                            <tr>
                            	<th>NewsLetter Id</th>
                                <th>NewsLetter Name</th>
                                <th>Add User Id</th>
                                <th>File Name</th>
                                <th>Date Added</th>
                                <th>Stream</th>
                                <th>IsActive</th>
                                <th>Action</th>
                            </tr>
                            <?php
                                
                                $query = "Select * from newsletter where StreamId =".$_SESSION['StreamId']."";
                                $result = mysqli_query($conn,$query);
                                while ($row =mysqli_fetch_assoc($result))
                                {
                            ?>
                                <tr>
                                	<td align="left"><?php print_r($row["NewsletterId"]); ?></td>
                                    <td align="left"><?php print_r($row["Name"]); ?></td>
                                    <td align="left"><?php print_r($row["AddUserId"]); ?></td>
                                    <td align="left"><?php print_r($row["FileName"]); ?></td>
                                    <td align="left"><?php print_r($row["AddDate"]); ?></td>
                                    <td align="left"><?php print_r($row["StreamId"]); ?></td>
                                    <td align="center"><?php if ($row["IsActive"]) { ?>Yes<?php  }else { ?> No <?php } ; ?></td>
                                    <td align="center">
                                    <a href="deletenl.php?id=<?php print_r($row["NewsletterId"]); ?> ">Delete</a> </td>
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