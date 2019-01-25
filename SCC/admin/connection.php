<?php
	$conn = mysqli_connect('localhost', 'root', '');

if(! $conn )
{
  die('Could not connect: ' . mysqlii_error());
}
mysqli_select_db($conn,'scc');
session_start();
?>