<?php	include("connection.php"); ?>
<html>
<head>
<link style="text/css" href="CSS/style.css" rel="stylesheet">
<title>
<?php
if(!isset($_SESSION['login_user']))
{
	header("Location:event.php");
}
$AlbumId= $_REQUEST['id'];
$sql = "Select EventName from event_master where EventId=".$AlbumId;
$result = mysqli_query($conn,$sql);
echo "&nbsp;&nbsp;&nbsp;";
while ($row =mysqli_fetch_assoc($result))
{ 
print_r($row["EventName"]);
}
?>
</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="shadowbox.css">
<script type="text/javascript" src="shadowbox.js"></script>
<script type="text/javascript">
Shadowbox.init({
handleOversize: "drag",
modal: true
});
</script>
</head>

<body>
<div id="bg_pattern">
<div id="container">	
<div id="backimage">
	<?php include("header.php"); ?>	
    <?php 
		if (isset($_POST['btnsubmit']))
		{
			//$EventId= $_REQUEST['id'];
			//$result = mysqli_query("SELECT * FROM subevent_master WHERE IsActive=1 And EventId=".$EventId);
			//$result = mysqli_query($result);
			if(isset($_POST['chkEvent']))
			{
				$aSubEvent = $_POST['chkEvent'];
			}
			else
			{
				$aSubEvent = "";
				}
			if(empty($aSubEvent))
			{
				echo("You didn't select any Event(s) to participant.");
			}
			else
			{
				$N = count($aSubEvent);
				//echo("You selected $N door(s): ");
				for($i=0; $i < $N; $i++)
				{
					$sql = "select * from event_users where EventId = ".$aSubEvent[$i]." and EventUserId = '".$_SESSION['uid']."'";//echo $sql;
					$result = mysqli_query($conn,$sql);
					$row=mysqli_fetch_array($result);		
					if (mysqli_num_rows($result) == 0)
					{
						//echo 'hi yam';
						$sql = "insert into event_users (EventId, EventUserId, AddDate, IsActive)".
							" values (".$aSubEvent[$i].", '". $_SESSION['uid'] ."', NOW(), 1)";
							//echo $sql;
						mysqli_query($conn,$sql);
						//echo 'Registered';
					}
				}
				echo("You are registered successfully.");
				?>
               <!-- <script language="javascript" type="text/javascript">
				alert("REGISTERED");
				</script>-->
				<?php  header("Location:event.php");
				
			}
		}    
    ?>
    <div class="strm" >
        <form id="frmRegEvent" method="post" action="<?php $_PHP_SELF ?>">
            <table border="2" bordercolor="#0000FF"  class="gridtable" width="95%">
                <tr>
                    <th>EventName</th>
                    <th>Register</th>
                </tr>
                <?php
                    $EventId= $_REQUEST['id'];
                    $result = mysqli_query($conn,"SELECT s.*, e.* FROM subevent_master s , event_master e WHERE e.EventId=s.EventId and s.IsActive=1 And s.EventId=".$EventId);
                    //$result = mysqli_query($result);
                    while ($row =mysqli_fetch_array($result))
                    {
                ?>
                    <tr>
                        <td align="left"><?php print_r($row["SubEventName"]); ?></td>
                        <?php
						//if($row["StreamId"] == $_SESSION['UserStreamId'])
//						{
							?>
                        <td align="center"><input type="checkbox" name="chkEvent[]" value="<?php print_r($row["Id"]);?>"></td>
                    	<?php
						//}
						//else
						//{
						//if ($row["EventScope"] == 1)
						//{
						?>
                        <!--<td align="center"><input type="checkbox" name="chkEvent[]" value="<?php print_r($row["Id"]);?>"></td>-->
                    	<?php
                  		//}
						//}
                		?>
                    </tr>
                    
                <?php
                    }
					
                ?>
            </table>
            <div align="right">
                <input type="submit"  value="REGISTER" class="button" name="btnsubmit" id="btnsubmit" ><br>
            </div>
        </form>
    </div>			
 </div>
 <?php include("footer.php");  ?>
        </div>
	</div>
</div>
  
</body>
</html>