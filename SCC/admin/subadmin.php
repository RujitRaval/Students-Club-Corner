<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Student's Club Corner - Admin - Sub Admin</title>
        <link style="text/css" href="../CSS/style.css" rel="stylesheet">
    </head>
    <body>
        <div id="bg_patern">
            <div id="container">
                <div id="backimage">
                    <div id='header'> 
                        <a href ='' id='logo' class='replace'></a> 
                        <p>Students' Club Corner</p> 
                        <?php include("connection.php");  ?>		
                       	<?php include("AdminMenu.php");  ?>
                    </div>	
       
                    <div class="subad">
                        <div align="right">
                            <form id="formSubAdmin" method="post" action="AE_SubAdmin.php">
                                <input type="submit" value="Add Sub Admin" class="button"  ><br>
                            </form>
                        </div>
                        <table border="2" bordercolor="#0000FF" class="gridtable" width="95%">
                            <tr>
                                <th>Sub Admin Name</th>
                                <th>Stream Name</th>
                                <th>IsActive</th>
                                <th>Action</th>
                            </tr>
                            <?php
                                
                                $query = "SELECT u.UserFirstName, u.UserLastName, s.StreamId, s.StreamName, u.IsActive, u.UserId ".
									" FROM stream_subadmin_relation ssr, stream s, user u ".
									" WHERE ssr.StreamId = s.StreamID and u.UserId = ssr.UserId and u.UserType = 2";
                                $result = mysqli_query($conn,$query);
                                while ($row =mysqli_fetch_assoc($result))
                                {
                            ?>
                                <tr>
                                    <td align="left"><?php print_r($row["UserFirstName"]); ?>&nbsp;<?php print_r($row["UserLastName"]); ?></td>
                                    <td align="left"><?php print_r($row["StreamName"]); ?></td>
                                    <td align="center"><?php if ($row["IsActive"]) { ?>Yes<?php  }else { ?> No <?php } ; ?></td>
<td align="center">                    
                    <a href="AE_Subadmin.php?id=<?php print_r($row["UserId"]); ?>&sid=<?php print_r($row["StreamId"]); ?>">Edit</a>
                                        <a href="DeleteSubadmin.php?id=<?php print_r($row["UserId"]); ?>">Delete</a> </td>
                                </tr>
                            <?php } ?>
                        </table>	               		
                    </div>
                </div>
                <?php include("footer.php");  ?>
            </div>
        </div>
    </body>
</html>