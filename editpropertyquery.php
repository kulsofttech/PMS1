<?php
	include_once("connection.php");
	
	session_start();
	$propertyid=$_SESSION['idprop'];

	$pname=$_POST['pname'];
	$plocation=$_POST['plocation'];
	
	$pcountry=$_POST['pcountry'];
	$pcity=$_POST['pcity'];
	$paddress=$_POST['paddress'];
	$pdescription=$_POST['pdescription'];
	$pid=$_POST['pid'];
	
	
	/*$sql1 = "INSERT INTO `pearldb`.`temp` (`id`, `namee`) VALUES ('$apid', '$apm');";
		mysql_query($sql1);
	  */
		$sql = "UPDATE `propertytb` SET `propertyname` = '$pname', `location` ='$plocation', `country` = '$pcountry', `city` = '$pcity', `address` = '$paddress', `description` = '$pdescription' WHERE `propertytb`.`propertyid` ='$propertyid';";
		mysql_query($sql);

		
	unset($_SESSION["idprop"]);
?>