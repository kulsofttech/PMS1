<?php
include_once('connection.php');	
session_start();

$custid=$_SESSION['idcust'];
	$sql = "select * from custpropertytb a, propertytb b, unittb c where a.customerid='$custid' && a.propertyid=b.propertyid && a.unitid=c.unitid";
	$result = mysql_query($sql);
	$r = array();
	while($row =mysql_fetch_array($result, MYSQL_ASSOC)){
		$r[] = $row;
	}
	echo json_encode($r);
?>