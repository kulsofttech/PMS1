<?php
include_once("connection.php");
session_start();
	
	$property=$_POST['property'];
	$unit=$_POST['unit'];
	$frequency=$_POST['frequency'];
	$startdate=$_POST['startdate'];
	$enddate=$_POST['enddate'];
	
	
	$customerid=$_SESSION['idcust'];

	$addunit = "INSERT INTO `webadmin_plmdb`.`custpropertytb` (`customerid`, `propertyid`, `unitid`, `invoicefrequency`, `leasestartdate`, `leaseenddate`) VALUES ('$customerid','$property','$unit','$frequency','$startdate','$enddate');";
	mysql_query($addunit);
	
	$updatesql = "UPDATE `webadmin_plmdb`.`unittb` SET `status` ='Rented' WHERE `unittb`.`unitid` = $unit;";
  	mysql_query($updatesql);
?>	
