<?php
include_once("connection.php");


$startdate=$_POST['isdate'];
$enddate=$_POST['iedate'];


if(!empty($_POST["iedate"])) {
$query ="SELECT * FROM receipttb a, customertb b, propertytb c, unittb d WHERE a.customerid=b.customerid && a.propertyid=c.propertyid && a.unitid=d.unitid && a.startdate>='$startdate' && a.enddate<='$enddate'";


$result = mysql_query($query);
if(!empty($result)) {
?>

<?php
//foreach($result as $country) {
$tot=mysql_num_rows($result);
for($j=0;$j<$tot;$j++)
{
	$receiptno=mysql_result($result,$j,'receiptno');
	$fname=mysql_result($result,$j,'fname');
	$lname=mysql_result($result,$j,'lname');
	$propertyname=mysql_result($result,$j,'propertyname');
	$unitno=mysql_result($result,$j,'unitno');
	$startdate=mysql_result($result,$j,'startdate');
	$enddate=mysql_result($result,$j,'enddate');
	$receiptamount=mysql_result($result,$j,'receiptamount');
	

	
?>
	<tr><td><a target="_blank" href="viewprintreceipt.php?id=<?php echo $receiptno?>"><?php echo $fname." ". $lname; ?></a></td><td><?php echo $propertyname; ?></td><td><?php echo $unitno; ?></td><td><?php echo $startdate; ?></td><td><?php echo $enddate; ?></td><td><?php echo $receiptamount; ?></td></tr>
<?php

	
} ?>
	
<?php } } ?>