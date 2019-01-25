<script src="CSS/jquery.min.js" type="text/javascript"></script>
<?php
$conn = mysqli_connect('localhost', 'root', '');

if(! $conn )
{
  die('Could not connect: ' . mysqli_error());
}
mysqli_select_db($conn,'scc');
session_start();
$TitleStream = "Students' Club Corner";
if (isset($_REQUEST["cid"]))
{
		$sql = "select StreamName from stream where streamId= ".$_REQUEST["cid"];
		$result = mysqli_query($conn,$sql);
		while ($row =mysqli_fetch_assoc($result))
		{?><!--<div id="headerclb"><p>Welcome to </p> --><?php
		$TitleStream  = $row["StreamName"];
		?><!--</div>--><?php
		}
}
//		$sql = "select StreamDescription from stream where streamId= ".$_REQUEST["id"];
//		$result = mysqli_query($sql);
//		while ($row =mysqli_fetch_assoc($result))
		//{?> <!--<div id="headerclb1">--><?php
		//print_r($row["StreamDescription"]);
		?><!--</div>--><?php
		//}

?>