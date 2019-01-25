<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>



<?php
$conn = mysql_connect('localhost', 'root', '');
mysql_select_db('scc');

 
                              ?> <table border="2" bordercolor="#0000FF"  class="gridtable" width="95%">
                            <tr>
                            	
                                <th>First Name</th>
                                <th>Last Name</th>
                                
                            </tr>
							<?php
                                $query = "Select UserFirstName, UserLastName from user";
                                $result = mysql_query($query);
                                while ($row =mysql_fetch_assoc($result))
                                {
									
                              ?>
                               <tr>
                                    <td ><?php echo $row["UserFirstName"] ?></td>
                                    <td ><?php echo $row["UserLastName"] ?></td>
                                </tr>
								<?php } ?> 
?>
</body>
</html>