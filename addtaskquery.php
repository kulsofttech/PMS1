<?php
include_once("connection.php");
session_start();
  $userid=$_SESSION["logid"];


	$tname=$_POST['tname'];
	$sdate=$_POST['sdate'];
	$edate=$_POST['edate'];
	$assignedto=$_POST['assignedto'];
	$tstatus=$_POST['tstatus'];
	$tremark=$_POST['tremark'];
	$tprospect=$_POST['tprospect'];
	$tcustomer=$_POST['tcustomer'];
	$tpriority=$_POST['tpriority'];

	if ($tprospect==NULL) {
		$tprospect=0;
	}
	elseif ($tcustomer==NULL) {
		$tcustomer=0;
	}

	

	$sql = "INSERT INTO `webadmin_plmdb`.`tasktb` (`taskname`, `assignedto`, `startdate`, `enddate`, `status`, `prospectid`, `customerid`, `addedon`, `addedby`, `priority`) VALUES ('$tname','$assignedto','$sdate','$edate','$tstatus','$tprospect','$tcustomer',now(),'$userid','$tpriority');";
	mysql_query($sql);

	$selectres=mysql_query("select * from tasktb where taskname='$tname' && assignedto='$assignedto' && startdate='$sdate' && enddate='$edate' && status='$tstatus' && prospectid='$tprospect' && customerid='$tcustomer'");
	for ($i=0; $i <mysql_num_rows($selectres) ; $i++) { 
		$tskid=mysql_result($selectres, $i, 'taskid');
	}

	$rsql = "INSERT INTO `webadmin_plmdb`.`remarktb` (`taskid`, `remark`, `remarkaddedon`, `remarkaddedby`) VALUES ('$tskid','$tremark',now(),'$userid');";
	mysql_query($rsql);
	


//-------------------------------------Mail Code*-----------------------------------------------



$excresult=mysql_query("select * from usertb where uid=$assignedto ");
for ($a=0; $a < mysql_num_rows($excresult); $a++) { 
	$excname=mysql_result($excresult, $a,'name');
/*	$excadr=mysql_result($excresult, $a,'address');
	$excmob=mysql_result($excresult, $a,'mobile');*/
	$exceml=mysql_result($excresult, $a,'email');

}

	if ($tprospect==NULL) {
		$cusresult=mysql_query("select * from customertb where customerid=$tcustomer ");
		for ($b=0; $b < mysql_num_rows($cusresult); $b++) { 
			$pcfname=mysql_result($cusresult, $b,'fname');
			$pclname=mysql_result($cusresult, $b,'lname');
			$pcmob=mysql_result($cusresult, $b,'mobile1');
		}
	}
	elseif ($tcustomer==NULL) {
		$prospresult=mysql_query("select * from prospecttb where prospectid=$tprospect ");
		for ($c=0; $c < mysql_num_rows($prospresult); $c++) { 
			$pcfname=mysql_result($prospresult, $c,'firstname');
			$pclname=mysql_result($prospresult, $c,'lastname');
			$pcmob=mysql_result($prospresult, $c,'mobile1');
		}
	}

$to = $exceml;
$from = "info@kulsofttech.com";
$headers = "From:" . $from ."\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

$subject= "New Task Assigned ";

//$name ="Nikhil";
//$company ="Kulsoft tech";

$message ="
<html>
  
  <body>
  	<div>
  		Dear <b>$excname</b>,<br><br>
  		Below given Task has been Assigned to you - <br><br>
  		Task Name : <b>$tname</b><br>
  		Task Start Date : <b>$sdate</b><br>
  		Task End Date : <b>$edate</b><br>
  		Customer/Prospect Name : <b>$pcfname $pclname</b><br>
  		Customer/Prospect Mobile : <b>$pcmob</b><br>
  		Task Priority : <b>$tpriority</b><br><br><br><br>
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
