<?php
include_once('connection.php');	
	$sql = "select *, a.status AS mystatus from invoicetb a, customertb b, propertytb c, unittb d where a.customerid=b.customerid && a.propertyid=c.propertyid && a.unitid=d.unitid";
	$result = mysql_query($sql);
	$r = array();
	while($row =mysql_fetch_array($result, MYSQL_ASSOC)){
		$r[] = $row;
	}
	echo json_encode($r);
?>