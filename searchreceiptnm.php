<?php
include_once("connection.php");
if(!empty($_POST["keyword"])) {
$query ="SELECT , a.status AS mystatus FROM invoicetb a, customertb b, propertytb c, unittb d WHERE a.customerid=b.customerid && a.propertyid=c.propertyid && a.unitid=d.unitid && b.fname like '" . $_POST["keyword"] . "%' ORDER BY b.fname LIMIT 0,6";




$result = mysql_query($query);
if(!empty($result)) {
?>
<ul id="medicine-list">
<?php
//foreach($result as $country) {
$tot=mysql_num_rows($result);
for($j=0;$j<$tot;$j++)
{
	$invoiceno=mysql_result($result,$j,'invoiceno');
	$fname=mysql_result($result,$j,'fname');
	$lname=mysql_result($result,$j,'lname');
	$propertyname=mysql_result($result,$j,'propertyname');
	$unitno=mysql_result($result,$j,'unitno');
	$invoicestartdate=mysql_result($result,$j,'invoicestartdate');
	$invoiceenddate=mysql_result($result,$j,'invoiceenddate');
	$total=mysql_result($result,$j,'total');
	$mystatus=mysql_result($result,$j,'mystatus');
	
	
if($mystatus='Unpaid'){
	
?>
	<tr><td><input type='radio' name='id' value='<?php echo $invoiceno?>'></td><td><?php echo $fname; ?></td><td><?php echo $lname; ?></td><td><?php echo $propertyname; ?></td><td><?php echo $unitno; ?></td><td><?php echo $invoicestartdate; ?></td><td><?php echo $invoiceenddate; ?></td><td><?php echo $total; ?></td><td><?php echo $mystatus; ?></td></tr>
<?php

	}
} ?>
	</ul>
<?php } } ?>