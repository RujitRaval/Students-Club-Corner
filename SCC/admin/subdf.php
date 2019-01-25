<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Student's Club Corner - Sub Admin</title>
        <link style="text/css" href="../CSS/style.css" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>

<body>

<?php include("connection.php");  ?>

<?php 
	if (isset($_REQUEST['id']))
	{
		
		$query = "Select IsActive from forum_question where id=".$_REQUEST['id'];
		$result = mysqli_query($conn,$query);
		$row =mysqli_fetch_array($result);
		
		if ($row["IsActive"])
		{
		$sql = "update forum_question set IsActive = 0 where id=".$_REQUEST['id'];
		mysqli_query($conn,$sql);
		}
		else
		{
			$sql = "update forum_question set IsActive = 1 where id=".$_REQUEST['id'];
		mysqli_query($conn,$sql);
			}
	}
?>
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
                        
                        <table border="2" bordercolor="#0000FF"  class="gridtable" width="95%">
                            <tr>
                            	<th>Topic</th>
                                <th>Details</th>
                                <th>Name of user</th>
                                <!--<th>EMail</th>-->
                                <th>Time</th>
                                <th>IsActive</th>
                                <th>Action</th>
                            </tr>
                            <?php
                                
                                $query = "Select * from forum_question";
                                $result = mysqli_query($conn,$query);
                                while ($row =mysqli_fetch_array($result))
                                {
                            ?>
                                <tr>
                                	
                                    <td align="left"><?php print_r($row["topic"]); ?></td>
                                    <td align="left"><?php print_r($row["detail"]); ?></td>
                                
                                    <td align="left"><?php print_r($row["name"]); ?></td>
                                  <!--  <td align="left"><?php //print_r($row["email"]); ?></td>-->
                                    <td align="left"><?php print_r($row["name"]); ?></td>
                                    
                                    <td align="center"><?php if ($row["IsActive"]) { ?>Yes<?php  }else { ?> No <?php } ?></td>
                                    <td align="center">
                                    <a id="Delete" href="subdf.php?id=<?php print_r ($row["id"]); ?> ">
                                    <?php if ($row["IsActive"]) { ?>Make Inactive<?php  }else { ?> Make Active <?php }  ?>
                                    </a><a id="Delete" href="deleteforum.php?id=<?php print_r ($row["id"]); ?> ">Delete</a> </td>
                                </tr>
                            <?php
                                }
                            ?>
                        </table>
                    </div>			
        
                       
                            
                            
                            <?php include("footer.php");  ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

</body>
</html>