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
                        <div align="right" style="float:right; width:auto; font-weight:bold;">
                        	<form method="post" action="AE_electionusers.php?id=<?php echo $eid; ?>">
	                        	<input type="submit" class="button" value="Add Participants">
                            </form>
                        </div>
                         <?php 
						 $eid = $_REQUEST['id'];
							$sql = "Select * from election_year where electionyearid=".$eid;
							$result = mysqli_query( $conn,$sql);
							$row=mysqli_fetch_array($result);		
							$elname= $row["electionyearname"];
						//	$eltype = $row["ElectionType"];
						 ?>
                        <table border="2" bordercolor="#0000FF"  class="gridtable" width="95%">
                        	<tr>
                            <th colspan="4">Election Name:&nbsp;<?php echo $elname; ?> </th>
                           <!-- <th colspan="2">Election For:&nbsp;<?php// echo $eltype; ?> </th>-->
                            </tr>
                            <tr>
                                <th>Election For</th>
                              	<th>Participant Name</th>
                                <th>IsActive</th>
                                <th>Action</th>
                            </tr>
                            <?php
							   $query = "Select u.UserFirstName, u.UserLastName, p.IsActive, p.ParticipantId, t.ElectionTypeId, t.ElectionType from ".
									" election_participants p, user u , election_type t ".
									" where p.ParticipantId = u.Id and u.IsActive = 1 ".
									" and t.electiontypeid = p.electiontypeid ".
									" and p.IsActive = 1 and p.electionyearid = ".$eid ;
									//echo $query;
                                $result = mysqli_query($conn,$query);
                                while ($row =mysqli_fetch_array($result))
                                {
                            ?>
                                <tr>
                                <td align="center"><?php echo $row["ElectionType"]; ?></td>
                                    <td align="center"><?php echo $row["UserFirstName"]." ".$row["UserLastName"]; ?></td>
										<input type="hidden" value="<?php echo $row["ParticipantId"]; ?>" id="pid" />
                                    
                                     	
                                    <td align="center"><?php echo $row["IsActive"]==1 ? 'Yes' : 'No' ?></td>	
                                    <td align="center">
                                   
                                    <a id="Delete" href="DeleteElectionCandidate.php?eid=<?php echo $eid; ?>&pid=<?php echo $row['ParticipantId']; ?>">Delete</a> </td>
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
