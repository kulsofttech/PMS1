<?php
include_once("connection.php");

	$unm=$_POST['uname'];
	$adr=$_POST['adr'];
	
	$mob=$_POST['mob'];
	$eml=$_POST['email'];
	$usrnm=$_POST['usrnm'];
	$pass=$_POST['pass'];
	$type=$_POST['type'];
	
	
	$sql = "INSERT INTO `webadmin_plmdb`.`usertb` (`name`,`address`, `mobile`,`email`,`username`,`password`,`type`) VALUES ('$unm','$adr','$mob','$eml','$usrnm','$pass','$type')";
	mysql_query($sql);
?>	
