<?php
include_once("connection.php");
session_start();
	
	$uname=$_POST['uname'];
	$emailid=$_POST['emailid'];

$userresult=mysql_query("select * from usertb where username=$uname && email=$emailid");
for ($a=0; $a < mysql_num_rows($userresult); $a++) { 
	$excname=mysql_result($userresult, $a,'name');
	$ueml=mysql_result($userresult, $a,'email');
	$password=mysql_result($userresult, $a,'password');

}

$to = $ueml;
$from = "info@kulsofttech.com";
$headers = "From:" . $from ."\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

$subject= "Your PMS Password";

//$name ="Nikhil";
//$company ="Kulsoft tech";

$message ="
<html>
  
  <body>
  	<div>
  		Dear <b>$excname</b>,<br><br>
  		As per your request on forgot password of PMS application below gieven are your Login details - <br><br>
  		Name : <b>$excname</b><br>
  		Username : <b>$uname</b><br>
  		Password : <b>$password</b><br>
  		<br><br><br>
  		Regards,<br> <b>Team PMS</b><br>
  		<br><br><br>
  		<center><a href='http://kulsofttech.org/plm/'>Click here to Login</a></center>
  	</div>
  </body>
</html>
";
@mail($to,$subject,$message,$headers);
echo '<script type="text/javascript">  
      alert("Your Query has been received, We will contact you soon.");
</script>';
?>	

?>