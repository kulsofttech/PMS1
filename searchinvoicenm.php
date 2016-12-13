<?php
include_once("connection.php");
if(!empty($_POST["keyword"])) {
$query ="SELECT *, a.status AS mystatus FROM invoicetb a, customertb b, propertytb c, unittb d WHERE a.customerid=b.customerid && a.propertyid=c.propertyid && a.unitid=d.unitid && b.fname like '" . $_POST["keyword"] . "%' ORDER BY b.fname LIMIT 0,6";




$result = mysql_query($query);
if(!empty($result)) {
?>
<ul id="medicine-list">
<?php
//foreach($result as $country) {
$tot=mysql_num_rows($result);
for($j=0;$j<$tot;$j++)
{
	$fname=mysql_result($result,$j,'fname');
	$lname=mysql_result($result,$j,'lname');
	$propertyname=mysql_result($result,$j,'propertyname');
	$unitno=mysql_result($result,$j,'unitno');
	$invoicestartdate=mysql_result($result,$j,'invoicestartdate');
	$invoiceenddate=mysql_result($result,$j,'invoiceenddate');
	$total=mysql_result($result,$j,'total');
	$mystatus=mysql_result($result,$j,'mystatus');
	$invoiceno=mysql_result($result,$j,'invoiceno');
	

	$cnt=$j+1;

	
?>
	<tr><td><?php echo $cnt; ?></td><td><a target='_blank' href="printinvoice.php?id=<?php echo $invoiceno; ?>"><?php echo $fname." ".$lname; ?></a></td><td><?php echo $propertyname; ?></td><td><?php echo $unitno; ?></td><td><?php echo $invoicestartdate; ?></td><td><?php echo $invoiceenddate; ?></td><td><?php echo $total; ?></td><td><?php echo $mystatus; ?></td></tr>
<?php

	
} ?>
	</ul>
<?php } } ?>