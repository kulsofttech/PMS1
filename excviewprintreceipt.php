<?php
include_once("connection.php");
session_start();
  $userid=$_SESSION["excid"];

  	$receiptid=$_GET['id'];
  	


  	$result=mysql_query("select * from receipttb a, customertb b, propertytb c, unittb d where  a.receiptno=$receiptid && a.customerid=b.customerid && a.propertyid=c.propertyid && a.unitid=d.unitid");
for ($i=0; $i <mysql_num_rows($result) ; $i++) { 
		//$custpropid=mysql_result($result, $i,'custpropid');
     	$firstname=mysql_result($result, $i,'fname');
     	$lastname=mysql_result($result, $i,'lname');
     	$startdate=mysql_result($result, $i,'startdate');
		$enddate=mysql_result($result, $i,'enddate');
		$propertyname=mysql_result($result, $i,'propertyname');
		$description=mysql_result($result, $i,'description');
		$unitno=mysql_result($result, $i,'unitno');
		$rateqr=mysql_result($result, $i,'rateqr');
		//$invoicefrequency=mysql_result($result, $i,'invoicefrequency');
		$customer=mysql_result($result, $i,'customerid');
		$property=mysql_result($result, $i,'propertyid');
		$unit=mysql_result($result, $i,'unitid');
		$invoiceamt=mysql_result($result, $i,'receiptamount');
		$commission=mysql_result($result, $i,'commission');
		$subtotal=mysql_result($result, $i,'subtotal');
		$paymentmethod=mysql_result($result, $i,'paymentmethod');
		$reference=mysql_result($result, $i,'reference');
     }     



//******************************************************************************


$ones = array(
 "",
 " One",
 " Two",
 " Three",
 " Four",
 " Five",
 " Six",
 " Seven",
 " Eight",
 " Nine",
 " Ten",
 " Eleven",
 " Twelve",
 " Thirteen",
 " Fourteen",
 " Fifteen",
 " Sixteen",
 " Seventeen",
 " Eighteen",
 " Nineteen"
);
 
$tens = array(
 "",
 "",
 " Twenty",
 " Thirty",
 " Forty",
 " Fifty",
 " Sixty",
 " Seventy",
 " Eighty",
 " Ninety"
);
 
$triplets = array(
 "",
 " Thousand",
 " Million",
 " Billion",
 " Trillion",
 " Quadrillion",
 " Quintillion",
 " Sextillion",
 " Septillion",
 " Octillion",
 " Nonillion"
);
 
 // recursive fn, converts three digits per pass
function convertTri($num, $tri) {
  global $ones, $tens, $triplets;
 
  // chunk the number, ...rxyy
  $r = (int) ($num / 1000);
  $x = ($num / 100) % 10;
  $y = $num % 100;
 
  // init the output string
  $str = "";
 
  // do hundreds
  if ($x > 0)
   $str = $ones[$x] . " hundred";
 
  // do ones and tens
  if ($y < 20)
   $str .= $ones[$y];
  else
   $str .= $tens[(int) ($y / 10)] . $ones[$y % 10];
 
  // add triplet modifier only if there
  // is some output to be modified...
  if ($str != "")
   $str .= $triplets[$tri];
 
  // continue recursing?
  if ($r > 0)
   return convertTri($r, $tri+1).$str;
  else
   return $str;
 }
 
// returns the number as an anglicized string
function convertNum($num) {
 $num = (int) $num;    // make sure it's an integer
 
 if ($num < 0)
  return "negative".convertTri(-$num, 0);
 
 if ($num == 0)
  return "zero";
 
 return convertTri($num, 0);
}
 
 // Returns an integer in -10^9 .. 10^9
 // with log distribution
 function makeLogRand() {
  $sign = mt_rand(0,1)*2 - 1;
  $val = randThousand() * 1000000
   + randThousand() * 1000
   + randThousand();
  $scale = mt_rand(-9,0);
 
  return $sign * (int) ($val * pow(10.0, $scale));
 }
 
// example of usage
/*echo "564 : ".convertNum(564)."<br>";
echo "892 : ".convertNum(892);*/

//*******************************************************************************************




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
					THE SUM OF : <b><?php echo "QR ".convertNum($invoiceamt); ?></b> <br>
					DATE : <b> <?php echo date("d/m/Y"); ?></b> <br>
					FOR THE PERIOD : <b> <?php echo $startdate; ?></b> TO <b> <?php echo $enddate; ?></b> <br>
				</font>
			</td>
			<td width="30%">
				<font color="green" size="2px">
					<b>PAID BY:</b><br>
					<?php 
					if ($paymentmethod=='Cash') {
					?>
			        <input type="checkbox" checked="ture"> CASH :<?php echo $invoiceamt; ?><br>
			        <input type="checkbox"> CARD NO. : <br>
			        <input type="checkbox"> CHEQUE NO. :
			        <?php }elseif ($paymentmethod=='Card') { ?>
			        <input type="checkbox"> CASH : <br>
			        <input type="checkbox" checked="true"> CARD NO. : <?php echo $reference; ?><br>
			        <input type="checkbox"> CHEQUE NO. :
			        <?php }elseif ($paymentmethod=='Cheque') { ?>
			        <input type="checkbox"> CASH : <br>
			        <input type="checkbox"> CARD NO. : <br>
			        <input type="checkbox" checked="True"> CHEQUE NO. :<?php echo $reference; ?>
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
