<?php
	include_once("connection.php");
		
		if(isset($_POST['id']))
	{
		$uid= $_POST['id'];
	
$sql = "UPDATE `webadmin_plmdb`.`unittb` SET `deleted` ='1' WHERE `unittb`.`unitid` = $uid;";

	mysql_query($sql);
		
	}
?>