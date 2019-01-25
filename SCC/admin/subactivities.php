<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Activities</title>
<link style="text/css" href="../CSS/style.css" rel="stylesheet">
</head>

<body>

<?php include("connection.php");  ?>
<div id="bg_patern">
<div id="container">
<div id="backimage">
	<div id='header'> 
		<a href ='' id='logo' class='replace'></a> 
        <p>Students' Club Corner</p> 
        <h3>WELCOME SUBADMIN</h3>
	</div>
<?php include("menu.php");  ?>	

 <div class="strm" >
                        <div align="right">
							<form id="formStream" method="post" action="AE_Activities.php">
	                            <input type="submit" value="Add Activities" class="button"  ><br>
							</form>
                        </div>      
	<table border="2" bordercolor="#0000FF"  class="gridtable" width="95%">
                            <tr>
                            	<th>Activity Id</th>
                                <th>Activity Name</th>
                                <th>Place</th>
                                <th>IsActive</th>
                                <th>Action</th>
                            </tr>
                            <?php
                                
                                $query = "Select * from activities;";
                                $result = mysqli_query($conn,$query);
                                while ($row =mysqli_fetch_assoc($result))
                                {
                            ?>
                                <tr>
                                	<td align="left"><?php print_r($row["id"]) ?></td>
                                    <td align="left"><?php print_r($row["act_name"]);   ?></a></td>
                                    <td align="left"><?php print_r($row["act_place"]); ?></td>
                                    <td align="center"><?php if ($row["IsActive"]) { ?>Yes<?php  }else { ?> No <?php } ; ?></td>
                                    <td align="center">
                                    <a href="AE_Activities.php?id=<?php print_r($row["id"]); ?> ">Edit</a>
                                    |
                                    <a id="Delete" href="deleteActivities.php?id=<?php print_r($row["id"]); ?> ">Delete</a> </td>
                                </tr>
                            <?php
                                }
                            ?>
                        </table>
                    </div>			
        
                       
	               		
                   
                </div><?php include("footer.php");  ?>
            </div>
        </div>
    </body>
</html>
               
                        
                    	

</body>
</html>