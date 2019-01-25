<?php	include("connection.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link style="text/css" href="CSS/style.css" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Election</title>
</head>

<body>
	<div id="bg_pattern">
        <div id="container">	
            <div id="backimage">
                <?php include("header.php"); 
							$eid = $_REQUEST['id'];
							$eStremId = 0;				
					if(isset($_POST['btnSubmit']))
					{
						$query1 = "Select DISTINCT electiontypeid from election_participants 
							where IsActive=1 and electionyearid =".$_POST['hdEid'];
						//echo $query1;
						$result3 = mysqli_query($conn,$query1);
						while ($row3 =mysqli_fetch_array($result3))
						{
						
						//Check first radio button is selecte/checked
							$t1 = $row3['electiontypeid'];
							//echo $t1;
						
							if ($_POST[$t1])
							{
								//echo $_POST[$t1];
								$sql = "select * from election_votelist where VoteUserId = ".$_SESSION['uid']." and electionyearid = ".$_POST['hdEid']."
									and electiontypeid = ".$t1;
									
									$result = mysqli_query($conn,$sql);
									$row=mysqli_fetch_array($result);		
								if (mysqli_num_rows($result) == 0)
								{
								
								$sql = "Insert into election_votelist (ParticipantId, VoteUserId, AddDate, electiontypeid, electionyearid)".
									" values (".$_POST[$t1].", ".$_SESSION['uid'].", NOW(),".$t1.", ".$_POST['hdEid'].")";
								mysqli_query($conn,$sql);
								}
							}
							header("Location:Election.php");
						}
					}
				?>
        <div class="strm" >
        <form id="frmRegElection" method="post" action="<?php $_PHP_SELF ?>">
         	<input type="hidden" name="hdEid" id="hdEid" value="<?php echo $eid; ?>" />
			<table border="2" bordercolor="#0000FF"  class="gridtable" width="95%">
            	<?php
					$query1 = "Select DISTINCT t.ElectionTypeId, t.ElectionType, s.ElectionFor from election_participants e, 
					election_year s, election_type t where e.IsActive=1 and e.electiontypeid = t.ElectionTypeId 
					and t.IsActive = 1 and e.electionyearid = s.electionyearid and s.electionyearid = ".$eid. " ORDER BY sequence;";						
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
                            <th>Nominate</th>
                        </tr>
						<?php
						$query1 = "Select u.UserFirstName, u.UserLastName, e.* from election_participants e, user u
							where e.IsActive=1 and e.ParticipantId = u.Id and u.IsActive = 1 and e.electionyearid =".$eid." 
							and e.electiontypeid = ".$electiontypeid ;
						
						$result2 = mysqli_query($conn,$query1);
						while ($row1 =mysqli_fetch_array($result2))
						{
                        ?>                               
                            <tr>                                
                                <td align="center"><?php echo $row1["UserFirstName"]." ".$row1["UserLastName"]; ?>
                                    <input type="hidden" value="<?php echo $row1["ParticipantId"]; ?>" id="pid" />
                                </td>
                                <td align="center">
                                    <input type="radio" id="<?php echo $row1["ParticipantId"]; ?>" value="<?php echo $row1["ParticipantId"]; ?>" name="<?php echo $electiontypeid;?>" />
                                </td>
                            </tr>
                    <?php 
						} 
						}
						
					?>
                    <?php
						
                            if(isset($_SESSION['login_user'])  && ($_SESSION['UserType'] == 3 || $_SESSION['UserType'] == 4))
							{
								
								$query4 = "Select ElectionFor 
								from election_year where electionyearid =".$_REQUEST['id'];
								
								$result4 = mysqli_query($conn,$query4);
								//echo $query4;
								while ($row4 =mysqli_fetch_array($result4))
								{
									
									$elfor=$row4["ElectionFor"];?>
									<?php 
									//echo $elfor;?> 
									<?php
                                    // echo $_SESSION['batch'];
									
									if($_SESSION['batch'] == $elfor)
									{
			                    ?>
  					<tr>
                    	<td colspan="2" align="center">
                        	<input type="submit" class="button2" id="btnSubmit" name="btnSubmit" value="Vote" />
                        </td>
                    </tr>
                    <?php
										}
								}
						}
					?>
              </table>
         </form>
				<?php include("footer.php");?>
			</div>
		</div>
	</div>        
</body>
</html>