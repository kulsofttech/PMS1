<?php
include_once('connection.php');	
	$sql = "select * from prospecttb a,usertb b where a.assignedto=b.uid && (a.status='New' || a.status='Assigned')";
	$result = mysql_query($sql);
	$r = array();
	while($row =mysql_fetch_array($result, MYSQL_ASSOC)){
		$r[] = $row;
	}
	echo json_encode($r);
?>