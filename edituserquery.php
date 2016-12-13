<?php
include_once("connection.php");
session_start();
	
	$uname=$_POST['uname'];
	$uaddress=$_POST['uaddress'];
	
	$umobile=$_POST['umobile'];
	$utype=$_POST['utype'];
	$uemail=$_POST['uemail'];
	$uunm=$_POST['uunm'];
	$upass=$_POST['upass'];

	
	
	
	$usrid=$_POST['usrid'];

	/*$updatesql = "UPDATE `webadmin_plmdb`.`customertb` SET `fname` ='$fname', `lname` ='$lname', `city` ='$city', `country` ='$country', `mobile1` ='$mobile1', `mobile2` ='$mobile2', `email` ='$email', `address` ='$address', `notes` ='$notes', `assignedto` ='$assignedto', `QatarId` ='$QatarId', WHERE `customertb`.`customerid` = $customerid;";*/

	$sql = "UPDATE `webadmin_plmdb`.`usertb` SET `name` ='$uname', `address` ='$uaddress', `mobile` ='$umobile', `email` ='$uemail', `username` ='$uunm', `password` ='$upass', `type` ='$utype' WHERE `usertb`.`uid` = $usrid;";
  	mysql_query($sql);



?>	
