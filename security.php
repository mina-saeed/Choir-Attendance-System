<?php
if(!isset($_SESSION['userID']))
{
	header("Location: login.php");
}
?>