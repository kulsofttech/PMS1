<?php
include_once("connection.php");
if(!empty($_POST["keyword"])) {
$query ="SELECT * FROM propertytb WHERE deleted=0 && propertyname like '" . $_POST["keyword"] . "%' ORDER BY propertyname LIMIT 0,6";
$result = mysql_query($query);
if(!empty($result)) {
?>
<ul id="medicine-list">
<?php
//foreach($result as $country) {
$tot=mysql_num_rows($result);
for($j=0;$j<$tot;$j++)
{
	$propertyid=mysql_result($result,$j,'propertyid');
	$propertyname=mysql_result($result,$j,'propertyname');
	$location=mysql_result($result,$j,'location');
	$country=mysql_result($result,$j,'country');
	$city=mysql_result($result,$j,'city');
	$address=mysql_result($result,$j,'address');
	$description=mysql_result($result,$j,'description');

	
?>
	<tr><td><input type='radio' name='id' value='<?php echo $propertyid?>'></td><td><a href="editproperty.php?id=<?php echo $propertyid?>"><?php echo $propertyname; ?></a></td><td><?php echo $location; ?></td><td><?php echo $country; ?></td><td><?php echo $city; ?></td><td><?php echo $address; ?></td><td><?php echo $description; ?></td></tr>
<?php

	
} ?>
	</ul>
<?php } } ?>