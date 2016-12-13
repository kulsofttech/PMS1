<?php
	include_once("connection.php");
		
		if(isset($_POST['id']))
	{
		$uid= $_POST['id'];
	
$sql = "DELETE FROM `webadmin_plmdb`.`usertb` WHERE `usertb`.`uid` ='$uid';";

	mysql_query($sql);
		
	}
?>