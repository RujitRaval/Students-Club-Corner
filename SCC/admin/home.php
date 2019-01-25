<?php include("connection.php");  ?>

<html>
    <head>
        <title>Student's Club Corner - Admin - Stream</title>
        <link style="text/css" href="../CSS/style.css" rel="stylesheet">
     </head>
`    <body>
        <div id="bg_patern">
            <div id="container">
                <div id="backimage">
                    <div id='header'>
                        <a href ='' id='logo' class='replace'></a> 
                        <p>Students' Club Corner</p> 		
						<?php include("AdminMenu.php");  ?>
                    </div>	
                    <div class="strm" >
                        <div align="right" style="float:right; width:auto; font-weight:bold;">
                        	<form method="post" action="AE_Stream.php">
	                        	<input type="submit" class="button" value="Add Stream">
                            </form>
                        </div>
                        <table border="2" bordercolor="#0000FF"  class="gridtable" width="95%">
                            <tr>
                                <th>Stream Name</th>
                                <th>Description</th>
                                <th>IsActive</th>
                                <th>Action</th>
                            </tr>
                            <?php
								                                
                                $query = "Select StreamId, StreamName,StreamDescription,IsActive from stream" ;
                                $result = mysqli_query($conn,$query);
                                while ($row =mysqli_fetch_assoc($result))
                                {
                            ?>
                                <tr>
                                    <td align="center"><?php print_r($row["StreamName"]); ?></td>
                                    <td align="left"><?php print_r($row["StreamDescription"]); ?></td>
                                    <td align="center"><?php echo $row["IsActive"]==1 ? 'Yes' : 'No' ?></td>	
                                    <td align="center">
                                    <a href="AE_Stream.php?id=<?php print_r($row["StreamId"]); ?> ">Edit</a>
                                    <a id="Delete" href="deleteStream.php?id=<?php print_r($row["StreamId"]); ?>">Delete</a> </td>
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
