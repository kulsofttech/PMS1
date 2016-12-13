<?php
include_once("connection.php");
session_start();
	
$x=$_POST['keyword'];
	
if(!empty($_POST["keyword"])) {

$result = mysql_query("SELECT * FROM unittb WHERE propertyid='$x'");
if(!empty($result)) {

$tot=mysql_num_rows($result);
echo "<label>Select Unit: </label><br><select name='untid' class='form-control'>";
for($j=0;$j<$tot;$j++)
{
	$unitid=mysql_result($result,$j,'unitid');
	$unitno=mysql_result($result,$j,'unitno');
	

echo "<option value='$unitid'> $unitno </option>";

 } 
echo "</select>";
 } } ?>