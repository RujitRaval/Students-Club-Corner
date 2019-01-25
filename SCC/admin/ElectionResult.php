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
                    
                    <input type="hidden" name="hdEid" id="hdEid" value="<?php echo $eid; ?>" />
			<table border="2" bordercolor="#0000FF"  class="gridtable" width="95%">
            	<?php
					$query1 = "Select DISTINCT t.ElectionTypeId, t.ElectionType from election_participants e, 
					election_year s, election_type t where e.IsActive=1 and e.electiontypeid = t.ElectionTypeId 
					and t.IsActive = 1 and e.electionyearid = s.electionyearid and s.electionyearid = ".$eid;						
					if(isset($_SESSION['StreamUserId']))
					{
						$query1 = $query1 . " and s.streamid=".$_SESSION['StreamUserId'];
					}			
					
					$result1 = mysqli_query($conn,$query1);
					while ($row2 =mysqli_fetch_array($result1))
					{
						$type = $row2["ElectionType"];
						$electiontypeid = $row2["ElectionTypeId"];
				?>
                    <tr>
                        <th colspan="2"> <?php echo $type; ?></th>
                    </tr>
                         <tr>                             
                            <th>Participant Name</th>
                            <th>Vote</th>
                        </tr>
						<?php
						$query1 = "Select u.UserFirstName, u.UserLastName, e.*, (select count(v.Id) from election_votelist v where v.electionyearid = ".$eid." and v.ParticipantId = e.ParticipantId and v.electiontypeid = ".$electiontypeid.") as result from election_participants e, user u
							where e.IsActive=1 and e.ParticipantId = u.Id and u.IsActive = 1 and e.electionyearid =".$eid." 
							and e.electiontypeid = ".$electiontypeid;
						
						$result2 = mysqli_query($conn,$query1);
						while ($row1 =mysqli_fetch_array($result2))
						{
                        ?>                               
                            <tr>                                
                                <td align="center"><?php echo $row1["UserFirstName"]." ".$row1["UserLastName"]; ?>
                                    <input type="hidden" value="<?php echo $row1["ParticipantId"]; ?>" id="pid" />
                                </td>
                                <td align="center">
                                   <?php echo $row1['result']; ?>
                                </td>
                            </tr>
                        <?php } 
						
					}?>
  					
              </table>
                    
                    
                    
                    
                    
                    
                       
                    </div>			
                </div>
	            <?php include("footer.php");  ?>
            </div>
        </div>
    </body>
</html>
