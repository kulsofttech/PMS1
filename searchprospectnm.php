<?php
include_once("connection.php");
if(!empty($_POST["keyword"])) {
$query ="SELECT * FROM prospecttb a, usertb b WHERE a.assignedto=b.uid && a.firstname like '" . $_POST["keyword"] . "%' ORDER BY a.firstname LIMIT 0,6";
$result = mysql_query($query);
if(!empty($result)) {
?>
<ul id="medicine-list">
<?php
//foreach($result as $country) {
$tot=mysql_num_rows($result);
for($j=0;$j<$tot;$j++)
{
	$prospectid=mysql_result($result,$j,'prospectid');
	$firstname=mysql_result($result,$j,'firstname');
	$lastname=mysql_result($result,$j,'lastname');
	$city=mysql_result($result,$j,'city');
	$mobile1=mysql_result($result,$j,'mobile1');
	$mobile2=mysql_result($result,$j,'mobile2');
	$emailid=mysql_result($result,$j,'emailid');
	$status=mysql_result($result,$j,'status');
	$name=mysql_result($result,$j,'name');

	
?>
	<tr><td><input type='radio' name='id' value='<?php echo $prospectid?>'></td><td><a href="editprospect.php?id=<?php echo $prospectid?>"><?php echo $firstname; ?></a></td><td><?php echo $lastname; ?></td><td><?php echo $city; ?></td><td><?php echo $mobile1; ?></td><td><?php echo $mobile2; ?></td><td><?php echo $emailid; ?></td><td><?php echo $status; ?></td><td><?php echo $name; ?></td></tr>
<?php

	
} ?>
	</ul>
<?php } } ?>