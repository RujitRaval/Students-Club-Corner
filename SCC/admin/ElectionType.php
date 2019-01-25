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
						<?php include("AdminMenu.php");  ?>
                    </div>	
                    <div class="strm" >
                        <div align="right" style="float:right; width:auto; font-weight:bold;">
                        	<form method="post" action="AE_electiontype.php">
	                        	<input type="submit" class="button" value="Add Election Type">
                            </form>
                        </div>
                        <table border="2" bordercolor="#0000FF"  class="gridtable" width="95%">
                            <tr>
                                <th>Election Type</th>
                              
                                <th>IsActive</th>
                                <th>Action</th>
                            </tr>
                            <?php
								                                
                                $query = "Select * from election_type" ;
                                $result = mysqli_query($conn,$query);
                                while ($row =mysqli_fetch_array($result))
                                {
                            ?>
                                <tr>
                                    <td align="center"><?php print_r($row["ElectionType"]); ?></td>
                                    <td align="center"><?php echo $row["IsActive"]==1 ? 'Yes' : 'No' ?></td>	
                                    <td align="center">
                                    <a href="AE_electiontype.php?id=<?php print_r($row["ElectionTypeId"]); ?> ">Edit</a>
                                    <a id="Delete" href="deleteelectiontype.php?id=<?php print_r($row["ElectionTypeId"]); ?>">Delete</a> </td>
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
