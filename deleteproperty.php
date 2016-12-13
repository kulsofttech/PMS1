<?php
	include_once("connection.php");
		
		if(isset($_POST['id']))
	{
		$pid= $_POST['id'];
	
$sql = "UPDATE `webadmin_plmdb`.`propertytb` SET `deleted` ='1' WHERE `propertytb`.`propertyid` = $pid;";

	mysql_query($sql);
		
	}
?>