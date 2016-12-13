<?php
	include_once("connection.php");
		
		if(isset($_POST['id']))
	{
		$tid= $_POST['id'];
	
$sql = "DELETE FROM `webadmin_plmdb`.`remarktb` WHERE `remarktb`.`taskid` ='$tid';";

	mysql_query($sql);
		
$sql = "DELETE FROM `webadmin_plmdb`.`tasktb` WHERE `tasktb`.`taskid` ='$tid';";

	mysql_query($sql);
		
	}
?>