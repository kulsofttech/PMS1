<?php
include_once("connection.php");
session_start();
  $userid=$_SESSION["logid"];


	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$nationality=$_POST['nationality'];
	//$city=$_POST['city'];
	$mob1=$_POST['mob1'];
	$mob2=$_POST['mob2'];
	$email=$_POST['email'];
	$address=$_POST['address'];
	$assignedto=$_POST['assignedto'];
	$qatarid=$_POST['qatarid'];
	$notes=$_POST['notes'];

	

	/*$sql = "INSERT INTO `webadmin_plmdb`.`prospecttb` (`fname`,`lname`, `nationality`,`city`,`mobile1`,`mobile2`,`emailid`,`intrestedin`,`propertydetails`,`status`,`assignedto`,`createdon`,`createdby`) VALUES ('$fname','$lname','$nationality','$city','$mob1','$mob2','$email','$intrest','$pdescription','$status','$assignedto',now(),'$userid')";
	mysql_query($sql);*/

	$sql = "INSERT INTO `webadmin_plmdb`.`customertb` (`fname`, `lname`, `country`, `mobile1`, `mobile2`, `email`, `address`, `notes`, `assignedto`, `QatarId`) VALUES ('$fname','$lname','$nationality','$mob1','$mob2','$email','$address','$notes','$assignedto','$qatarid');";
	mysql_query($sql);

	$selectsql="select * from customertb where fname='$fname' && lname='$lname' && address='$address' && mobile1='$mob1' && mobile2='$mob2' && email='$email' && QatarId='$qatarid'";


	$selectres=mysql_query($selectsql);
	for ($i=0;$i<mysql_num_rows($selectres);$i++){ 
		$customerid=mysql_result($selectres,$i,'customerid');
	}
	$_SESSION['idcust']=$customerid;
	
	
?>	
