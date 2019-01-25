<?php include("connection.php");  ?>

<html>
    <head>
        <title>Student's Club Corner - Admin - ELECTION</title>
        <link style="text/css" href="../CSS/style.css" rel="stylesheet">
     </head>
`    <body>   
  
        <div id="bg_patern">
            <div id="container">
                <div id="backimage">
                    <div id='header'> 
                        <a href ='' id='logo' class='replace'></a> 
                        <p>Students' Club Corner</p> 
                        <h3>WELCOME SUBADMIN</h3>	
                        </div>
                        	<?php include("menu.php"); 
							$eid = $_REQUEST['id'];
							 ?>
                	
                <br />	
                    <div class="strm" >
                         <?php 
						 $eid = $_REQUEST['id'];
							$sql = "Select e.ElectionName, t.ElectionType from election e,  election_type t where e.ElectionTypeId = t.ElectionTypeId and e.IsActive = 1 and e.ElectionId=".$eid;
							$result = mysql_query( $sql, $conn );
							$row=mysql_fetch_array($result);		
							$elname= $row["ElectionName"];
							$eltype = $row["ElectionType"];
						 ?>
                        <table border="2" bordercolor="#0000FF"  class="gridtable" width="95%">
                        	<tr>
                            <th >Election Name:&nbsp;<?php echo $elname; ?> </th>
                            <th >Election For:&nbsp;<?php echo $eltype; ?> </th>
                            </tr>
                            <tr>                                
                              	<th>Participant Name</th>
                                <th>Number of Votes</th>
                            </tr>
                            <?php
							   $query = "Select u.UserFirstName, u.UserLastName, p.IsActive, p.ParticipantId, ".
								   " (select count(Id) from election_votelist where ElectionId = ".$eid." and ".
								   " ParticipantId = p.ParticipantId) as result from ".
									" election_participants p, user u where p.ParticipantId = u.Id and u.IsActive = 1 ".
									" and p.IsActive = 1 and p.ElectionId = ".$eid ;
                                $result = mysql_query($query,$conn);
                                while ($row =mysql_fetch_array($result))
                                {
                            ?>
                                <tr>
                                    <td align="center"><?php echo $row["UserFirstName"]." ".$row["UserLastName"]; ?></td>
										<input type="hidden" value="<?php echo $row["ParticipantId"]; ?>" id="pid" />
                                    
                                     	
                                    <td align="center"><?php echo $row['result']; ?></td>
                                </tr>
                            <?php
                                }
                            ?>
                        </table>
                    </div>			
                </div>
	            <?php include("footer.php");  ?>
            </div>
        </div>
    </body>
</html>
