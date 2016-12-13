<?php
	include_once("connection.php");
		
		if(isset($_POST['id']))
	{
		$pid= $_POST['id'];
	
$sql = "DELETE FROM `webadmin_plmdb`.`prospecttb` WHERE `prospecttb`.`prospectid` ='$pid';";

	mysql_query($sql);
		
	}
?>