<?php include("connection.php");  ?>
<html>
    <head>
        <title>Student's Club Corner - Admin - ELECTION</title>
        <link style="text/css" href="CSS/style.css" rel="stylesheet">
    </head>
	<body>   
    <div id="bg_pattern">
        <div id="container">	
            <div id="backimage">
                <?php include("header.php"); 
                 $id = $_REQUEST['id'];
                ?>
                <br />	
                <div class="strm" >
                     <?php 
                        $sql = "Select EventName from event_master where EventId=".$id;
                        $result = mysqli_query($conn,$sql);
                        $row=mysqli_fetch_array($result);		
                        $elname= $row["EventName"];
                     ?>
                    <table border="2" bordercolor="#0000FF"  class="gridtable" width="95%">
                        <tr>
                        <th class="pro_font2"><?php echo $elname; ?> </th>
                        </tr>
                    </table>
                       <?php
							$query = "Select * from subevent_master where EventId = ".$id;
							$result = mysqli_query($conn,$query);
							while ($row0=mysqli_fetch_array($result))
                            {
                        ?>	
                                <br>
                                <table border="2" bordercolor="#0000FF"  class="gridtable" width="95%">
                                    <tr>                                
                                        <th colspan="2"><?php echo $row0['SubEventName'];?></th>
                                    </tr>                       
                                    <?php
                                       $query1 = "Select u.UserFirstName, u.UserLastName, u.UserId ".
                                         " from event_users e, user u where e.EventUserId = u.Id and u.IsActive = 1 ".
                                            " and e.IsActive = 1 and e.EventId = ".$row0['Id'] ;
                                            //echo $query;
                                        $result1 = mysqli_query($conn,$query1);
										
                                        while($row1 =mysqli_fetch_assoc($result1))
                                        {
                                    ?>
                                    
                                        <tr>
                                            <td align="center"><?php echo $row1["UserId"]; ?></td>
                                        
                                            <td align="center"><?php echo $row1["UserFirstName"]." ".$row1["UserLastName"]; ?></td>
                                        </tr>
                                    <?php
                                        }
                                    ?>
                                </table>
						<?php } ?>
                </div>			
            </div>
            <?php include("footer.php");  ?>
        </div>
    </div>
    </body>
</html>
