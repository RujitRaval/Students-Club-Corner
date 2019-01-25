<?php include("connection.php");  

//if(isset($_POST['save']))
//	{
		if(! get_magic_quotes_gpc() )
		{
		   $sdesc = addslashes ($_POST['desc']);
		}
		else
		{
		   $sdesc = $_POST['desc'];
		}

		if ($_POST['descid'] == "")
		{
			$sql = "insert into home_desc (description, adddate) values ('".$sdesc."', NOW())";								
		}
		else
		{
			$sql = "update home_desc set description = '".$sdesc."', editdate = NOW() where ID = ".$_POST['descid'];								
		}						
		if(! mysql_query( $sql, $conn ))
		{
					print_r('hi yamraj');
		print_r($sdesc);
exit();
		  die('Could not enter data: ' . mysql_error());
		}
		echo "Entered data successfully\n";
	//}

	header("location:homedesc.php");
?>    
