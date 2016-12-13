<?php
include_once('connection.php');	
session_start();
  $userid=$_SESSION["excid"];
	$sql = "select * from customertb a where deleted=0 && assignedto=$userid";
	$result = mysql_query($sql);
	$r = array();
	while($row =mysql_fetch_array($result, MYSQL_ASSOC)){
		$r[] = $row;
	}
	echo json_encode($r);
?>