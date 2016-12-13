<?php
include_once('connection.php');	
	$sql = "select * from documentstb a,customertb b, custpropertytb c, propertytb d, unittb e where a.customerid=b.customerid && a.custpropid=c.custpropid && c.propertyid=d.propertyid && c.unitid=e.unitid";
	$result = mysql_query($sql);
	$r = array();
	while($row =mysql_fetch_array($result, MYSQL_ASSOC)){
		$r[] = $row;
	}
	echo json_encode($r);
?>