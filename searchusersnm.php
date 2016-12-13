<?php
include_once("connection.php");
if(!empty($_POST["keyword"])) {
$query ="SELECT * FROM usertb WHERE name like '" . $_POST["keyword"] . "%' ORDER BY name LIMIT 0,6";
$result = mysql_query($query);
if(!empty($result)) {
?>
<ul id="medicine-list">
<?php
//foreach($result as $country) {
$tot=mysql_num_rows($result);
for($j=0;$j<$tot;$j++)
{
	$uid=mysql_result($result,$j,'uid');
	$name=mysql_result($result,$j,'name');
	$address=mysql_result($result,$j,'address');
	$mobile=mysql_result($result,$j,'mobile');
	$email=mysql_result($result,$j,'email');
	$username=mysql_result($result,$j,'username');
	$type=mysql_result($result,$j,'type');

	if($type==0)
	{
?>
	<tr><td><input type='radio' name='id' value='<?php echo $uid?>'></td><td><a href="edituser.php?id=<?php echo $uid?>"><?php echo $name; ?></a></td><td><?php echo $address; ?></td><td><?php echo $mobile; ?></td><td><?php echo $email; ?></td><td><?php echo $username; ?></td><td>Admin</td></tr>
<?php
} elseif ($type==1) {
	?>
<tr><td><input type='radio' name='id' value='<?php echo $uid?>'></td><td><a href="edituser.php?id=<?php echo $uid?>"><?php echo $name; ?></a></td><td><?php echo $address; ?></td><td><?php echo $mobile; ?></td><td><?php echo $email; ?></td><td><?php echo $username; ?></td><td>Executive</td></tr>

	<?php
} 
} ?>
	</ul>
<?php } } ?>