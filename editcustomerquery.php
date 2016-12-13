<?php
include_once("connection.php");
session_start();
	
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	
	$city=$_POST['city'];
	$country=$_POST['nationality'];
	$mobile1=$_POST['mob1'];
	$mobile2=$_POST['mob2'];
	$email=$_POST['email'];
	$address=$_POST['address'];
	$notes=$_POST['notes'];
	$assignedto=$_POST['assignedto'];
	$QatarId=$_POST['qatarid'];
	
	
	$customerid=$_SESSION['idcust'];

	/*$updatesql = "UPDATE `webadmin_plmdb`.`customertb` SET `fname` ='$fname', `lname` ='$lname', `city` ='$city', `country` ='$country', `mobile1` ='$mobile1', `mobile2` ='$mobile2', `email` ='$email', `address` ='$address', `notes` ='$notes', `assignedto` ='$assignedto', `QatarId` ='$QatarId', WHERE `customertb`.`customerid` = $customerid;";*/

	$sql = "UPDATE `webadmin_plmdb`.`customertb` SET `fname` ='$fname', `lname` ='$lname', `city` ='$city', `country` ='$country', `mobile1` ='$mobile1', `mobile2` ='$mobile2', `email` ='$email', `address` ='$address', `notes` ='$notes', `assignedto` ='$assignedto', `QatarId` ='$QatarId' WHERE `customertb`.`customerid` = $customerid;";
  	mysql_query($sql);
?>	
