<?php
include_once("connection.php");
session_start();
  $userid=$_SESSION["logid"];


  	$pid=$_POST['editprospid'];
		

	
	$sql = "UPDATE `prospecttb` SET `status` = 'Converted' WHERE `prospecttb`.`prospectid` ='$pid';";
		mysql_query($sql);

	$sql = "select * from prospecttb where prospectid='$pid'";
	$result = mysql_query($sql);

	for ($i=0; $i <mysql_num_rows($result) ; $i++) { 
		$firstname=mysql_result($result, $i,'firstname');
	}
	
?>	
