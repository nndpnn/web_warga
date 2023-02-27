<?php
session_start();
if (!isset($_SESSION["nik"])) 
{
	header("Location:login.php");
}
else if (!isset($_SESSION["nik"])) 
{
	header("Location:dashboard_admin.php");
}
else
{
	header("Location:dashoboard_.php");
}
?>