<?php
include_once('connection.php');	
session_start();

$custid=$_SESSION['idcust'];
	$sql = "select *, b.email as custemail from customertb b, usertb a where b.customerid='$custid' && b.assignedto=a.uid";
	$result = mysql_query($sql);
	$r = array();
	while($row =mysql_fetch_array($result, MYSQL_ASSOC)){
		$r[] = $row;
	}
	echo json_encode($r);
?>