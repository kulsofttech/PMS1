<?php
include_once("connection.php");
if(!empty($_POST["keyword"])) {
$query ="SELECT * FROM customertb a, usertb b WHERE a.deleted=0 && a.assignedto=b.uid && a.fname like '" . $_POST["keyword"] . "%' ORDER BY a.fname LIMIT 0,6";
$result = mysql_query($query);
if(!empty($result)) {
?>
<ul id="medicine-list">
<?php
//foreach($result as $country) {
$tot=mysql_num_rows($result);
for($j=0;$j<$tot;$j++)
{
	$customerid=mysql_result($result,$j,'customerid');
	$fname=mysql_result($result,$j,'fname');
	$lname=mysql_result($result,$j,'lname');
	$city=mysql_result($result,$j,'city');
	$country=mysql_result($result,$j,'country');
	$mobile1=mysql_result($result,$j,'mobile1');
	$mobile2=mysql_result($result,$j,'mobile2');
	$email=mysql_result($result,$j,'email');
	$address=mysql_result($result,$j,'address');
	$notes=mysql_result($result,$j,'notes');
	$name=mysql_result($result,$j,'name');

	
?>
	<tr><td><input type='radio' name='id' value='<?php echo $customerid?>'></td><td><a href="editprospect.php?id=<?php echo $customerid?>"><?php echo $fname; ?></a></td><td><?php echo $lname; ?></td><td><?php echo $city; ?></td><td><?php echo $country; ?></td><td><?php echo $mobile1; ?></td><td><?php echo $mobile2; ?></td><td><?php echo $email; ?></td><td><?php echo $address; ?></td><td><?php echo $notes; ?></td><td><?php echo $name; ?></td></tr>
<?php

	
} ?>
	</ul>
<?php } } ?>