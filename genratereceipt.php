<?php
include_once("connection.php");
session_start();
  $userid=$_SESSION["logid"];

  	$invoiceid=$_POST['inid'];
  	$mode=$_POST['mode'];
  	$cardno=$_POST['cardno'];
  	$chequeno=$_POST['chequeno'];
  	$pmode="";
  	if ($mode==0) {
  		$pmode="Cash";
  		$ref="-";
  	}elseif ($mode==1) {
  		$pmode="Card";
  		$ref=$cardno;
  	}elseif ($mode==2) {
  		$pmode="Cheque";
  		$ref=$chequeno;
  	}


  	$result=mysql_query("select * from invoicetb a, customertb b, propertytb c, unittb d where  a.invoiceno='$invoiceid' && a.customerid=b.customerid && a.propertyid=c.propertyid && a.unitid=d.unitid");
for ($i=0; $i <mysql_num_rows($result) ; $i++) { 
		//$custpropid=mysql_result($result, $i,'custpropid');
     	$firstname=mysql_result($result, $i,'fname');
     	$lastname=mysql_result($result, $i,'lname');
     	$startdate=mysql_result($result, $i,'invoicestartdate');
		$enddate=mysql_result($result, $i,'invoiceenddate');
		$propertyname=mysql_result($result, $i,'propertyname');
		$description=mysql_result($result, $i,'description');
		$unitno=mysql_result($result, $i,'unitno');
		$rateqr=mysql_result($result, $i,'rateqr');
		//$invoicefrequency=mysql_result($result, $i,'invoicefrequency');
		$customer=mysql_result($result, $i,'customerid');
		$property=mysql_result($result, $i,'propertyid');
		$unit=mysql_result($result, $i,'unitid');
		$invoiceamt=mysql_result($result, $i,'total');
		$commission=mysql_result($result, $i,'commission');
		$subtotal=mysql_result($result, $i,'subtotal');
     }     
/*echo $invoiceid."<br>1";
echo $customer."<br>2";
echo $property."<br>3";
echo $unit."<br>4";
echo $startdate."<br>5";
echo $enddate."<br>6";
echo $commission."<br>7";
echo $subtotal."<br>8";
echo $invoiceamt."<br>9";
echo $userid."<br>0";*/



	$sql = "INSERT INTO `webadmin_plmdb`.`receipttb` (`invoiceno`, `customerid`, `propertyid`, `unitid`, `startdate`, `enddate`, `commission`, `subtotal`, `receiptamount`, `paymentmethod`, `reference`, `receiptdate`, `receiptby`) VALUES ('$invoiceid','$customer','$property','$unit','$startdate','$enddate','$commission','$subtotal','$invoiceamt','$pmode','$ref',now(),'$userid');";
	mysql_query($sql);

	 $updatesql = "UPDATE `webadmin_plmdb`.`invoicetb` SET `status` ='Paid' WHERE `invoicetb`.`invoiceno` = $invoiceid;";
  mysql_query($updatesql);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Receipt</title>
</head>
<body>
<div>
	<table border="0" width="100%">
		<tr>
			<td width="70%"><img src="dist/img/logo-landscape.jpg" width="235" alt="User Image"></td>
			<td width="30%"><font color="green" size="10px"> Receipt </font></td>
			
		</tr>
		<tr>
			<td width="70%">
				&nbsp;
			</td>
			<td width="30%">
				Date <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo date("d/m/Y");?></b><br>
				Receipt Number <b>: 1234 </b>
			</td>
			
		</tr>
		<tr>
			<td width="70%">
				<font color="green" size="2px">
					RECEIVED FROM :<b> <?php echo $firstname." ".$lastname; ?></b> <br>
					THE SUM OF : <br>
					DATE : <b> <?php echo date("d/m/Y"); ?></b> <br>
					FOR THE PERIOD : <b> <?php echo $startdate; ?></b> TO <b> <?php echo $enddate; ?></b> <br>
				</font>
			</td>
			<td width="30%">
				<font color="green" size="2px">
					<b>PAID BY:</b><br>
					<?php 
					if ($mode==0) {
					?>
			        <input type="checkbox" checked="ture"> CASH :<?php echo $invoiceamt; ?><br>
			        <input type="checkbox"> CARD NO. : <br>
			        <input type="checkbox"> CHEQUE NO. :
			        <?php }elseif ($mode==1) { ?>
			        <input type="checkbox"> CASH : <br>
			        <input type="checkbox" checked="true"> CARD NO. : <?php echo $cardno; ?><br>
			        <input type="checkbox"> CHEQUE NO. :
			        <?php }elseif ($mode==2) { ?>
			        <input type="checkbox"> CASH : <br>
			        <input type="checkbox"> CARD NO. : <br>
			        <input type="checkbox" checked="True"> CHEQUE NO. :<?php echo $chequeno; ?>
					<?php } ?>
				</font>
			</td>
			
		</tr>
	</table><br>
	<table border="1px" bordercolor="green" style="border-collapse: collapse;" width="100%">
		<tr bgcolor="#F0FFF0">
			<th width="10%">Person Assigned</th>
			<th width="50%">Job</th>
			<th width="20%">Payment Terms</th>
			<th width="20%">Date</th>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		
	</table><br>
	
	<table border="1px" bordercolor="green" style="border-collapse: collapse;" width="100%">
		<tr bgcolor="#F0FFF0">
			<th width="10%"> Qty </th>
			<th width="50%"> Description </th>
			<th width="20%"> Unit Price </th>
			<th width="20%"> Amount </th>
		</tr>
		<tr>
			<td><br> 1. <br><br><br><br><br><br><br><br><br><br><br><br></td>
			<td>
				<br>
				<u>Proerty Name:</u><b> <?php echo $propertyname; ?></b><br>
				<u>Unit Number:</u> <b><?php echo $unitno; ?></b> <br><br><br><br><br><br><br><br><br><br><br><br>
			</td>

			<td align="right"><br><?php echo $rateqr; ?> <br><br><br><br><br><br><br><br><br><br><br><br></td>
			<td align="right"><br><?php echo $subtotal; ?> <br><br><br><br><br><br><br><br><br><br><br><br></td>
		</tr>
		<tr>
			<td style="border: none;"></td>
			<td style="border: none;"></td>
			<td style="border: none;" align="right">Subtotal</td>
			<td align="right"><?php echo $subtotal; ?></td>
		</tr>
		<tr>
			<td style="border: none;"></td>
			<td style="border: none;"></td>
			<td style="border: none;" align="right">Administrative Fee/ Commission</td>
			<td align="right"><?php echo $commission; ?></td>
		</tr>
		<tr>
			<td style="border: none;"></td>
			<td style="border: none;"></td>
			<td style="border: none;" align="right">Total</td>
			<td align="right"><?php echo $invoiceamt; ?></td>
		</tr>
		
	</table><br>

	<table style="border-collapse: collapse;" width="100%">
		<tr>
			<th width="33%" style="border: none;"><br><br>______________________ </th>
			<th width="33%" style="border: none;"><br><br>______________________ </th>
			<td width="33%" style="border: none;"></td>
		</tr>
		<tr>
			<th style="border: none;">CLIENT</th>
			<th style="border: none;">RECEIVED BY</th>
			<td style="border: none;"></td>
		</tr>
		
	</table>

	<br><br>
	<center><i>Thank you for your business!</i><br>
	<br><br>
	<font color="green">
	Makan Investment and Real Estate Development  Al Aziziya, Othman Ibn Affan Street, Doha, Qatar P.O. Box 93644  Phone: 974 4016 0666  Fax: 974 4016 0660  Email: admin@makan.qa
	</font>
	</center>
	
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
