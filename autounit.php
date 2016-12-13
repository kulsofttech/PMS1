<?php
include_once("connection.php");
session_start();
	
$x=$_POST['keyword'];
	
if(!empty($_POST["keyword"])) {
$query ="SELECT * FROM unittb WHERE propertyid='$x' && status='Vacant'";
$result = mysql_query($query);
if(!empty($result)) {
?>

<?php
//foreach($result as $country) {
$tot=mysql_num_rows($result);
for($j=0;$j<$tot;$j++)
{
	$unitid=mysql_result($result,$j,'unitid');
	$uno=mysql_result($result,$j,'unitno');
	
?>
<option value="<?php echo $unitid; ?>" ><?php echo $uno; ?></option>
<!--<li onClick="selectCountry1('<?php //echo $snm; ?>','<?php// echo $studid; ?>');"><?php// echo $snm; ?>_</li>-->
<?php } ?>
</ul>
<?php } } ?>