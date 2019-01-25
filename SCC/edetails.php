<?php	include("connection.php"); ?>
<html>
<head>
<link style="text/css" href="CSS/style.css" rel="stylesheet">
<title>
<?php
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
	
	

	 <div class="strm" >
                        
                        <table border="2" bordercolor="#0000FF"  class="gridtable" width="95%">
                            <tr>
                                <th>Event Name</th>
                                <th>Event Start Time</th>
                                <th>Event End Time</th>
                                <th>ACTION</th>
                            </tr>
                         
						    <?php
                                
                                $EventId= $_REQUEST['id'];
   								 $result = mysqli_query($conn,"SELECT * FROM subevent_master WHERE IsActive=1 And EventId=".$EventId);
                                //$result = mysqli_query($result);
                                while ($row =mysqli_fetch_array($result))
                                {
                            ?>
                                <tr>
                                	
                                    
                                     <td align="left"><?php print_r($row["SubEventName"]); ?></td>
                                    <td align="left"><?php print_r($row["SEStart"]); ?></td>
                                    <td align="left"><?php print_r($row["SEEnd"]); ?></td>
                                    
                                    <td align="center">
                                    
                                    <a href="evdetails.php?id=<?php print_r($row["Id"]); ?> ">Details<br /></a>
                                     </td>
                                </tr>
                            <?php
                                }
                            ?>
                        </table>
                        
                            <div align="right">
                                    <div style="float:right;">
                                        <form id="formStream" method="post" action="eventparticipantlist.php?id=<?php echo $EventId; ?>" />
                                            <input type="submit" value="Participant List" class="button"  ><br>
                                        </form>
                                       
                                    </div>

                          <?php
                                if(isset($_SESSION['login_user']) && ($_SESSION['UserType'] == 3 || $_SESSION['UserType'] == 4))
								{
                            ?>
                                    <div style="float:right;">
                                        <form id="formStream" method="post" action="eventregister.php?id=<?php echo $_REQUEST["id"] ?>" />
                                            <input type="submit" value="REGISTER" class="button"  ><br>
                                        </form>
                                       
                                    </div>
                               </div>
                            <?php
                                }
                            ?>
                    </div>			
        
 </div>
 <?php include("footer.php");  ?>
        </div>
	</div>
</div>
  
</body>
</html>