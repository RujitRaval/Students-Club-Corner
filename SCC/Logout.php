<?php
session_start();

if(session_destroy())
{
header("Location:".$_SERVER['HTTP_REFERER']);
}
?>