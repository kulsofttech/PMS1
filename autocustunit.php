<?php
include_once("connection.php");
session_start();
	
$x=$_POST['keyword'];
	
if(!empty($_POST["keyword"])) {

$result = mysql_query("SELECT * FROM custpropertytb a, customertb b, propertytb c, unittb d WHERE a.customerid='$x' && a.customerid=b.customerid && a.propertyid=c.propertyid && a.unitid=d.unitid");
if(!empty($result)) {

$tot=mysql_num_rows($result);
echo "<label>Select Property & Unit: </label><br>";
for($j=0;$j<$tot;$j++)
{
	$custpropid=mysql_result($result,$j,'custpropid');
	$propertyname=mysql_result($result,$j,'propertyname');
	$unitno=mysql_result($result,$j,'unitno');
	

echo "<input type='radio' name='custprop' value='$custpropid'><b> Property:</b> $propertyname | <b> Unit: </b>$unitno<br>";

 } 

 } } ?>