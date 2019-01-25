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
                <?php include("header.php"); ?>	
					                    <div class="strm" >
                        <table border="2" bordercolor="#0000FF"  class="gridtable" width="95%">
<?php
						$query = "Select * from election_year ";
						
						if(isset($_SESSION['StreamId']))
					{
						$query = $query . " where streamid=".$_SESSION['StreamId'];
					}
						
						$result = mysqli_query($conn,$query);
						while ($row =mysqli_fetch_array($result))
						{
                    ?>
                            <tr>
                            <td>
                            <a href='voting.php?id=<?php echo $row["electionyearid"]; ?>' class="pro_font2">
	                            <?php echo $row["electionyearname"]; ?></a></td>
                                
                    <?php
    	                }
                    ?>
                    </table>
            	</div>
				<?php include("footer.php");?>
			</div>
		</div>
	</div>        
</body>
</html>