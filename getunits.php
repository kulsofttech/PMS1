<?php
include_once('connection.php');	
session_start();

$prid=$_SESSION['idprop'];
	$sql = "select * from unittb where propertyid='$prid' && deleted='0'";
	$result = mysql_query($sql);
	$r = array();
	while($row =mysql_fetch_array($result, MYSQL_ASSOC)){
		$r[] = $row;
	}
	echo json_encode($r);
?>