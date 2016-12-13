<?php
include_once("connection.php");
session_start();
  $userid=$_SESSION["excid"];


	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$nationality=$_POST['nationality'];
	//$city=$_POST['city'];
	$paddress=$_POST['paddress'];
	$mob1=$_POST['mob1'];
	$mob2=$_POST['mob2'];
	$email=$_POST['email'];
	$intrest=$_POST['intrest'];
	$pdescription=$_POST['pdescription'];

		$status="Assigned";
$assignedto=$userid;
/*
	

	if ($assignedto==0) {
		$status="New";
	}
	else
	{
		$status="Assigned";
	}
*/


	/*$sql = "INSERT INTO `webadmin_plmdb`.`prospecttb` (`fname`,`lname`, `nationality`,`city`,`mobile1`,`mobile2`,`emailid`,`intrestedin`,`propertydetails`,`status`,`assignedto`,`createdon`,`createdby`) VALUES ('$fname','$lname','$nationality','$city','$mob1','$mob2','$email','$intrest','$pdescription','$status','$assignedto',now(),'$userid')";
	mysql_query($sql);*/

	$sql = "INSERT INTO `webadmin_plmdb`.`prospecttb` (`firstname`, `lastname`, `nationality`, `address`, `mobile1`, `mobile2`, `emailid`, `intrestedin`, `propertydetails`, `status`, `assignedto`, `createdon`, `createdby`) VALUES ('$fname','$lname','$nationality','$paddress','$mob1','$mob2','$email','$intrest','$pdescription','$status','$assignedto',now(),'$userid');";
	mysql_query($sql);
	
?>	
