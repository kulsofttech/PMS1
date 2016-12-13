<?php
include_once("connection.php");
session_start();
  $userid=$_SESSION["logid"];


	$remarktxt=$_POST['remarktxt'];
	$statussel=$_POST['statussel'];
	$tidtxt=$_POST['tidtxt'];

	if ($remarktxt!="") {
		$rsql = "INSERT INTO `webadmin_plmdb`.`remarktb` (`taskid`, `remark`, `remarkaddedon`, `remarkaddedby`) VALUES ('$tidtxt','$remarktxt',now(),'$userid');";
		mysql_query($rsql);
	}
		

	$usql = "UPDATE `tasktb` SET `status` = '$statussel' WHERE `tasktb`.`taskid` ='$tidtxt';";
	mysql_query($usql);
	

	//-------------------------------------Mail Code*-----------------------------------------------

$tskresult=mysql_query("select * from tasktb where taskid=$tidtxt ");
for ($d=0; $d < mysql_num_rows($tskresult); $d++) { 
	$taskname=mysql_result($tskresult, $d,'taskname');
	$assignedto=mysql_result($tskresult, $d,'assignedto');
	$status=mysql_result($tskresult, $d,'status');
	
}

$excresult=mysql_query("select * from usertb where uid=$assignedto ");
for ($a=0; $a < mysql_num_rows($excresult); $a++) { 
	$excname=mysql_result($excresult, $a,'name');
/*	$excadr=mysql_result($excresult, $a,'address');
	$excmob=mysql_result($excresult, $a,'mobile');*/
	$exceml=mysql_result($excresult, $a,'email');

}



$to = $exceml;
$from = "info@kulsofttech.com";
$headers = "From:" . $from ."\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

$subject= "Update on Task ";

//$name ="Nikhil";
//$company ="Kulsoft tech";

$message ="
<html>
  
  <body>
  	<div>
  		Dear <b>$excname</b>,<br><br>
  		Please find the Update on the Assigned task :<b> $taskname </b>- <br><br>
  		Task Name : <b>$taskname</b><br>
  		Task Status : <b>$statussel</b><br>
  		Task Remark : <b>$remarktxt</b><br><br><br><br>
  		Regards,<br> <b>Team PMS</b><br>

  	</div>
  </body>
</html>
";
@mail($to,$subject,$message,$headers);
echo '<script type="text/javascript">  
      alert("Your Query has been received, We will contact you soon.");
</script>';
?>	
