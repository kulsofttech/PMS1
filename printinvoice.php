<?php
include_once("connection.php");
session_start();
  $userid=$_SESSION["logid"];


  	$invcno=$_GET['id'];

 
$result=mysql_query("select * from invoicetb a, customertb b, propertytb c, unittb d where a.invoiceno=$invcno &&  a.customerid=b.customerid && a.propertyid=c.propertyid && a.unitid=d.unitid");
for ($i=0; $i <mysql_num_rows($result) ; $i++) { 
		
     	$fname=mysql_result($result, $i,'fname');
     	$lname=mysql_result($result, $i,'lname');
     	
		$propertyname=mysql_result($result, $i,'propertyname');
		
		$unitno=mysql_result($result, $i,'unitno');
		$rateqr=mysql_result($result, $i,'rateqr');
		
		

		$invoicestartdate=mysql_result($result, $i,'invoicestartdate');
		$invoiceenddate=mysql_result($result, $i,'invoiceenddate');
		$commission=mysql_result($result, $i,'commission');
		$description=mysql_result($result, $i,'description');
		$subtotal=mysql_result($result, $i,'subtotal');
		$total=mysql_result($result, $i,'total');
		$invoicedate=mysql_result($result, $i,'invoicedate');

     }     



          
         

	
	//echo $oldcount."<br><br><br><br>";

	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Invoice</title>
</head>
<body>
<div> 
	<table border="0" width="100%">
		<tr>
			<td width="60%">&nbsp;</td>
			<td width="70%">&nbsp;</td>
			<td width="10%"><img width="200px" src="logo.jpg"></td>
		</tr>
		<tr>
			<td width="60%">Date : <b><?php echo $invoicedate; ?></b><br>Invoice Number : <b>1234 </b><br> Clients Name : <b><?php echo $fname." ".$lname; ?></b></td>
			<td width="50%"><center><b>Invoice</b></center></td>
			<td width="50%"><center></center></td>
		</tr>
	</table><br><br><br>
	<table border="1px" style="border-collapse: collapse;" width="100%">
		<tr>
			<th>Description</th>
			<th>Property Details</th>
		</tr>
		<tr>
			<th><br>RENTAL FOR THE PERIOD<br><?php echo $invoicestartdate." - ".$invoiceenddate;?><br><br><br></th>
			<th><br><center><?php echo $propertyname." - ".$unitno;?></center><br><br><br><br><br></th>
		</tr>
	</table>
	<br><br><br>
	<table border="0" width="100%">
		<tr>
			<th  width="50%" align="right"></th>
			<th bgcolor="#F5E0DB" align="right">SUB-TOTAL</th>
			<td bgcolor="#F5E0DB" width="25%" align="right"><?php echo $subtotal;?></td>
		</tr>
		<tr>
			<th  width="50%" align="right"></th>
			<th bgcolor="#F5E0DB" align="right">&nbsp;</th>
			<td bgcolor="#F5E0DB" width="25%" align="right"></td>
		</tr>
		<tr>
			<th width="50%" align="right"></th>
			<th bgcolor="#F5E0DB" align="right">ADMINISTRATIVE FEES/ COMMISSION</th>
			<td bgcolor="#F5E0DB" width="25%" align="right"><?php echo $commission;?></td>
		</tr>
		<tr>
			<th  width="50%" align="right"></th>
			<th bgcolor="#F5E0DB" align="right">&nbsp;</th>
			<td bgcolor="#F5E0DB" width="25%" align="right"></td>
		</tr>
		<tr>
			<th width="50%" align="right"></th>
			<th bgcolor="#F5E0DB" align="right">TOTAL</th>
			<th bgcolor="#F5E0DB" width="25%" align="right"><?php echo $total;?></th>
		</tr>
		
	</table><br><br>
	<b>INVOICE PAYABLE TO: Makan investment & Real Estate Development</b><br>
	<br><br><br><br>
	<img width="100%" src="buysellinvest.jpg">


	<br><br><br>
	<font size="0.5px" color="grey">
	IMPORTANT NOTICE				
Makan gives notice to anyone who may read these particulars as follows: 1.These particulars are prepared for the guidance only of prospective purchasers. They are intended to give a fair overall description of the property but are not intended to constitute part of an offer or contract. 2. Any information contained herein (whether in the text, plans or photographs) is given in good faith but should not be relied upon as being a statement or representation of fact. 3. Nothing in these particulars shall be deemed to be a statement that the property is in good condition or otherwise nor that any services or facilities are in good working order. 4 The photographs appearing in this brochure show only certain parts and aspects of the property at the time when the photographs were taken. Certain aspects may have changed since the photographs were taken and it should not be assumed that the property remains precisely as displayed in the photographs. Furthermore no assumptions should be made in respect of parts of the property which are not shown in the photographs. 5. Any areas, measurements or distances referred to herein are approximate only. 6. Where there is reference in these particulars to the fact that alterations have been carried out or that a particular use is made of any part of the property this is not intended to be a statement that any necessary planning, building regulations or other consents have been obtained and these matters must be verified by any intending purchaser. 7. Descriptions of a property are inevitably subjective and the descriptions contained herein are used in good faith as an opinion and not by way of statement of fact.

</font>
	
</div>
</body>
</html>
<script>
 window.onload = function() {
  //alert("Hiii");
  window.print();
  window.location("invoice.php");
  }
</script>
<?php


?>	
