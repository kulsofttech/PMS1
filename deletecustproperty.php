<?php
	include_once("connection.php");
		
		if(isset($_POST['id']))
	{
		$upid= $_POST['id'];

		$tempres=mysql_query("select * from custpropertytb where custpropid='$upid'");
		for ($i=0; $i < mysql_num_rows($tempres); $i++) { 
		  $unitid=mysql_result($tempres, $i,'unitid');
		 }
			

			$updatesql = "UPDATE `webadmin_plmdb`.`unittb` SET `status` ='Vacant' WHERE `unittb`.`unitid` = $unitid;";
  	mysql_query($updatesql);


		$sql = "DELETE FROM `webadmin_plmdb`.`custpropertytb` WHERE `custpropertytb`.`custpropid` ='$upid';";

			mysql_query($sql);
				
			}
?>