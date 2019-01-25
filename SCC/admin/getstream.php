<?php include("connection.php");  ?>
<?php
	if(isset($_POST['id']))
	{
		$id = $_POST['id'];
		$sql = "Select * from stream where StreamId=".$id;
		$result = mysql_query( $sql );
		$row=mysql_fetch_assoc($result);	
		//$data["StreamId"]=$row["StreamId"];
//		$data["StreamName"]=$row["StreamName"];
//		$data["StreamDDescription"] = $row["StreamDDescription"];
//		$data["IsActive"]= $row["IsActive"];
//		
		//echo $row["StreamId"]; 
			                   
		echo '<div id="StreamAddEdit" style="display:none;">';
        echo '<form id="stream" name="stream" action="#" method="post">';
		echo '<table class="gridtable" width="100%" >';
		echo '<tr><th colspan="2" align="center">Edit Stream</th></tr>';
		echo '<tr><td>Stream Name</td><td><input type="text" id="streamname" name="streamname" size="40"  value="'.print_r($row['StreamName']).'yamraj" />';
		echo '</td></tr><tr><td>Stream Description</td><td><textarea name="desc" cols="80" id="desc" >'.$row['StreamDescription'];
		echo '</textarea></td></tr><tr><td>Stream Is Active</td><td><select id="isActive" name="isActive">';
		echo '<option value="1" "';
		if($result['IsActive'] == '1') 
		{
		echo 'selected="selected"';
		}
		echo '>Yes</option>';
		echo '<option value="0" "';
		if($result['IsActive'] == '0')
		echo 'selected="selected"';
		echo '>No</option>';
		echo '</select></td></tr><tr><td colspan="2" align="center" ><input type="submit" name="btnSubmit" id="Save" value="Save"  /></td>';
		echo '</tr></table></form></div>';

	}
?>