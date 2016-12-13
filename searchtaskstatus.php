<?php
include_once("connection.php");
$st=$_POST["keyword"];
if(!empty($_POST["keyword"])) {
$query ="SELECT *,a.status as mystatus FROM tasktb a,usertb b, prospecttb c,customertb d WHERE a.assignedto=b.uid && a.prospectid=c.prospectid && a.customerid=d.customerid && a.status='$st'";



$result = mysql_query($query);
if(!empty($result)) {
?>
<ul id="medicine-list">
<?php
//foreach($result as $country) {
$tot=mysql_num_rows($result);
for($j=0;$j<$tot;$j++)
{
	$taskid=mysql_result($result,$j,'taskid');
	$taskname=mysql_result($result,$j,'taskname');
	$startdate=mysql_result($result,$j,'startdate');
	$enddate=mysql_result($result,$j,'enddate');
	$name=mysql_result($result,$j,'name');
	$mystatus=mysql_result($result,$j,'mystatus');
	$firstname=mysql_result($result,$j,'firstname');
	$priority=mysql_result($result,$j,'priority');
	$fname=mysql_result($result,$j,'fname');

	/*<a href="#?id=<?php echo $taskid?>">  </a> */
?>
	<tr><td><input type='radio' name='id' value='<?php echo $taskid; ?>'></td><td><a href="viewtask.php?id=<?php echo $taskid; ?>"><?php echo $taskname; ?></a></td><td><?php echo $startdate; ?></td><td><?php echo $enddate; ?></td><td><?php echo $name; ?></td><td><?php echo $mystatus; ?></td><td><?php echo $firstname; ?></td><td><?php echo $priority; ?></td><td><?php echo $fname; ?></td></tr>
<?php

	
} ?>
	</ul>
<?php } } ?>