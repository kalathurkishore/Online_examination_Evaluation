<?php
include("class/users.php");
session_start();  
$_SESSION['sess_user']=$e;  
$signin=new users;
extract($_POST);
if($signin->signin($e,$p))
{
	$signin->url("home.php");
}
else
{
	$signin->url("index.php?run=failed");
}
?>