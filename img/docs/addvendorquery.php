<?php
include_once("connection.php");

	$vnm=$_POST['vname'];
	$vcpnm=$_POST['vcpname'];
	$vnum=$_POST['vnumber'];
	$desc=$_POST['vdesc'];

	$sql = "INSERT INTO `webadmin_clientdb`.`vendortb` (`vname`,`vcpname`, `contact`,`description`) VALUES ('$vnm','$vcpnm','$vnum','$desc');";
	mysql_query($sql);
?>	
