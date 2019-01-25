      <?php	include("connection.php"); ?>

<html>
<head>
<link style="text/css" href="CSS/style.css" rel="stylesheet">
<title>
<?php
$EId= $_REQUEST['id'];
$sql = "Select SubEventName from subevent_master where Id=".$EId;
$result = mysqli_query($conn,$sql);
echo "&nbsp;&nbsp;&nbsp;";
while ($row =mysqli_fetch_assoc($result))
{
print_r($row["SubEventName"]);
}
?>
</title>
</head>
<body>
<div id="bg_pattern">
	<div id="container">	
		<div id="backimage">
			<?php include("header.php"); ?>	
             <div class="strm" >
                <table border="2" bordercolor="#0000FF"  class="gridtable" width="95%">
                    <?php
                        $ev = $_REQUEST['id'];
                        $query = "Select * from subevent_master where Id=$ev";
                        $result = mysqli_query($conn,$query);
                        $row=mysqli_fetch_array($result);
                    ?>
                    <tr>
                        <th align="left" colspan="2"><?php print_r($row["SubEventName"]); ?></th>
                     </tr>   
                      <tr>
                        <td align="left" width="20%">DESCRIPTION</td>
                        <td align="left"><?php print_r($row["SubDesc"]); ?></td>
                     </tr>
                     <tr>
                        <td align="center" colspan="3">
                        <form action="edetails.php?id=<?php print_r($row["EventId"]); ?> " id="form1" name="form1" method="post" >
                            <input type="submit" class="button" style="margin-top:3px; margin-bottom:3px" value="OK"/>
                        </form>
                        </td>
                     </tr>
                </table>
	         </div>
			 <?php include("footer.php");  ?>
        </div>
	</div>
</div>  
</body>
</html>