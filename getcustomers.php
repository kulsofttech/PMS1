<?php
include_once('connection.php');	
	$sql = "select *, a.email as custemail, a.address as custadd from customertb a,usertb b where a.deleted=0 && a.assignedto=b.uid";
	$result = mysql_query($sql);
	$r = array();
	while($row =mysql_fetch_array($result, MYSQL_ASSOC)){
		$r[] = $row;
	}
	echo json_encode($r);
?>