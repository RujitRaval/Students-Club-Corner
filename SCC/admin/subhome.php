<html>
    <head>
        <title>Welcome SubAdmin</title>
        <link style="text/css" href="../CSS/style.css" rel="stylesheet">
     </head> 
`    <body>  
       	<?php include("connection.php");  ?>
		<?php include("headersub.php"); ?>
		
        	
                    
                    	<div class="strm" >
                        <div align="right">
							<form id="formStream" method="post" action="AE_User.php">
	                    	<input type="submit" value="Add User" class="button"  ><br>
							</form>
                        </div>
                        <table border="2" bordercolor="#0000FF"  class="gridtable" width="95%">
                            <tr>
                            	<th>UserType</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Batch</th>
                                <th>User ID</th>
                                <th>Password</th>
                                <th>IsActive</th>
                                <th>Action</th>
                            </tr>
                            <?php
                                
                                $query = "Select u.Id,u.UserType,u.UserFirstName, u.UserLastName, u.Batch, u.UserId,u.Password,u.IsActive ".
								" from user u,  stream_subadmin_relation r where u.UserId = r.UserId ".
								" and u.Id != ".$_SESSION['uid']." and u.UserType in (3,4)".
								" and r.StreamId = ".$_SESSION['StreamId']." ORDER BY u.Batch,u.UserId, u.UserFirstName, u.UserLastName";
                                $result = mysqli_query($conn,$query);
							//	echo $query;
                                while ($row =mysqli_fetch_assoc($result))
                                {
                            ?>
                                <tr>
                                	<td align="left"><?php if ($row["UserType"]==1) { ?>Admin<?php  }
													else if($row["UserType"]==2) { ?> Sub Admin <?php } 
													else if($row["UserType"]==3) { ?> Faculty <?php } 
													else { ?> Student <?php } ; ?></td>
                                    <td align="left"><a href='userdetail.php?id= <?php print_r($row["Id"]); ?>'><?php print_r($row["UserFirstName"]); ?></a></td>
                                    <td align="left"><?php print_r($row["UserLastName"]); ?></td>
                                    <td align="left"><?php print_r($row["Batch"]); ?></td>
                                    <td align="left"><?php print_r($row["UserId"]); ?></td>
                                    <td align="left"><?php print_r($row["Password"]); ?></td>
                                    <td align="center"><?php if ($row["IsActive"]) { ?>Yes<?php  }else { ?> No <?php } ; ?></td>
                                    <td align="center">
                                    <a href="AE_User.php?id=<?php print_r($row["UserId"]); ?> ">Edit</a>
                                    
                                    <a id="Delete" href="deleteUser.php?id=<?php print_r($row["UserId"]); ?> ">Delete</a> </td>
                                </tr>
                            <?php
                                }
                            ?>
                        </table>
                    </div>			
        
                       
	               		
                   
                </div><?php include("footer.php");  ?>
            </div>
        </div>
    </body>
</html>
