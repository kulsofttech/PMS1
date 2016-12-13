<?php
include_once("connection.php");
session_start();
	/*$pname=$_POST['pname'];
	$plocation=$_POST['plocation'];
	
	$pcountry=$_POST['pcountry'];
	$pcity=$_POST['pcity'];
	$paddress=$_POST['paddress'];
	$pdescription=$_POST['pdescription'];*/

	$uno=$_POST['uno'];
	$area=$_POST['area'];
	$rateqr=$_POST['rateqr'];
	$furnished=$_POST['furnished'];
	$status=$_POST['status'];
	$bedrm=$_POST['bedrm'];
	$bathrm=$_POST['bathrm'];
	$hall=$_POST['hall'];
	$kitchen=$_POST['kitchen'];
	$electricity=$_POST['electricity'];
	$water=$_POST['water'];

	
	
	/*$sql = "INSERT INTO `webadmin_plmdb`.`propertytb` (`propertyname`,`location`, `country`,`city`,`address`,`description`,`propertystatus`) VALUES ('$pname','$plocation','$pcountry','$pcity','$paddress','$pdescription','0')";
	mysql_query($sql);

	$selectsql="select * from propertytb where propertyname='$pname' && location='$plocation' && city='$pcity' && address='$paddress' && propertystatus='0'";


	$selectres=mysql_query($selectsql);
	for ($i=0;$i<mysql_num_rows($selectres);$i++){ 
		$propertyid=mysql_result($selectres,$i,'propertyid');
	}*/
	$propertyid=$_SESSION['idprop'];

	$addunit = "INSERT INTO `webadmin_plmdb`.`unittb` (`propertyid`, `unitno`, `areasqm`, `rateqr`, `furnished`, `status`, `bedroom`, `bathroom`, `hall`, `kitchen`, `electricityno`, `waterno`) VALUES ('$propertyid','$uno','$area','$rateqr','$furnished','$status','$bedrm','$bathrm','$hall','$kitchen','$electricity','$water');";
	mysql_query($addunit);
	/*}

	else{
		$propertyid=$_SESSION['idprop'];

		$addunit = "INSERT INTO `webadmin_plmdb`.`unittb` (`propertyid`, `unitno`, `areasqm`, `rateqr`, `furnished`, `status`, `bedroom`, `bathroom`, `hall`, `kitchen`, `electricityno`, `waterno`) VALUES ('$propertyid','$uno','$area','$rateqr','$furnished','$status','$bedrm','$bathrm','$hall','$kitchen','$electricity','$water');";
		mysql_query($addunit);
	}
*/
?>	
