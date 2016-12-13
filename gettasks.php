<?php
include_once('connection.php');	
	$sql = "select *,a.status as mystatus from tasktb a,usertb b, prospecttb c,customertb d where a.assignedto=b.uid && a.prospectid=c.prospectid && a.customerid=d.customerid";
	$result = mysql_query($sql);
	$r = array();
	while($row =mysql_fetch_array($result, MYSQL_ASSOC)){
		$r[] = $row;
	}
	echo json_encode($r);
?>