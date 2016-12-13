<?php
include_once("connection.php");
session_start();
  $userid=$_SESSION["logid"];

  	$custprop=$_POST['custprop'];
  	$commission=$_POST['commission'];
  	$val=$_POST['val'];
  	if($val==NULL)
  	{
  		$val=0;
  	}


	/*$customer=$_POST['customer'];
	$property=$_POST['property'];
	$unit=$_POST['unit'];
	echo $customer." <br>".$property." <br>".$unit."<br>";*/
	
	
	/*$sql = "INSERT INTO `webadmin_plmdb`.`prospecttb` (`firstname`, `lastname`, `nationality`, `city`, `address`, `mobile1`, `mobile2`, `emailid`, `intrestedin`, `propertydetails`, `status`, `assignedto`, `createdon`, `createdby`) VALUES ('$fname','$lname','$nationality','$city','$paddress','$mob1','$mob2','$email','$intrest','$pdescription','$status','$assignedto',now(),'$userid');";
	mysql_query($sql);*/
	
	/*$curesult = mysql_query("select * from customertb where customerid=$customer");
	for ($i=0; $i <mysql_num_rows($curesult) ; $i++) { 
		$custid=mysql_result($curesult, $i,'customerid');
		$fnm=mysql_result($curesult, $i,'fname');
		$lnm=mysql_result($curesult, $i,'lname');
		
	}

	$propresult=mysql_query("select * from propertytb where deleted='0'");
	for ($i=0; $i < mysql_num_rows($propresult); $i++) { 
		$prid=mysql_result($propresult, $i,'propertyid');
		$prnm=mysql_result($propresult, $i,'propertyname');
		
	}


	$unitresult = mysql_query("SELECT * FROM unittb WHERE propertyid='$property'");*/

$result=mysql_query("select * from custpropertytb a, customertb b, propertytb c, unittb d where a.custpropid=$custprop && a.customerid=b.customerid && a.propertyid=c.propertyid && a.unitid=d.unitid");
for ($i=0; $i <mysql_num_rows($result) ; $i++) { 
		$custpropid=mysql_result($result, $i,'custpropid');
     	$firstname=mysql_result($result, $i,'fname');
     	$lastname=mysql_result($result, $i,'lname');
     	$startdate=mysql_result($result, $i,'leasestartdate');
		$enddate=mysql_result($result, $i,'leaseenddate');
		$propertyname=mysql_result($result, $i,'propertyname');
		$description=mysql_result($result, $i,'description');
		$unitno=mysql_result($result, $i,'unitno');
		$rateqr=mysql_result($result, $i,'rateqr');
		$invoicefrequency=mysql_result($result, $i,'invoicefrequency');
		$customer=mysql_result($result, $i,'customerid');
		$property=mysql_result($result, $i,'propertyid');
		$unit=mysql_result($result, $i,'unitid');
     }     
     /*
     echo $custpropid."<br>";
     echo $firstname."<br>";
     echo $lastname."<br>";
     echo $startdate."<br>";
     echo $enddate."<br>";
     echo $propertyname."<br>";
     echo $description."<br>";
     echo $unitno."<br>";
     echo $rateqr."<br>";
     echo $invoicefrequency."<br><br><br><br><br>";    */ 

		   if ($invoicefrequency==0) {
           	$temp=1;
           }elseif ($invoicefrequency==1) {
           	$temp=3;
           }elseif ($invoicefrequency==2) {
           	$temp=6;
           }elseif ($invoicefrequency==3) {
           	$temp=12;
           }
//$temp=3;
            //echo $startdate."<br>";
           $effectiveDate = date('Y-m-d', strtotime("+".$temp." months", strtotime($startdate)));
          // echo $effectiveDate."<br>";
          // echo $temp."<br>";
	/*$date1 = '2000-01-25';
$date2 = '2010-02-20';

$ts1 = strtotime($date1);
$ts2 = strtotime($date2);

$year1 = date('Y', $ts1);
$year2 = date('Y', $ts2);

$month1 = date('m', $ts1);
$month2 = date('m', $ts2);

$diff = (($year2 - $year1) * 12) + ($month2 - $month1);*/

	$oldres = mysql_query("select * from invoicetb where customerid=$customer && propertyid=$property && unitid=$unit");
	$oldcount=mysql_num_rows($oldres);
	//echo $oldcount."<br><br><br><br>";

	if ($oldcount==0) {
		$invoicestartdate=$startdate;
		//echo " Invoice Start date: ".$invoicestartdate."<br>";
		$invoiceenddate = date('Y-m-d', strtotime("+".$temp." months", strtotime($startdate)));
		//echo " Invoice End date: ".$invoiceenddate."<br>";

		
	}
	elseif ($oldcount>0) {
		for ($k=0; $k < $oldcount; $k++) { 
			$invoicestartdate=mysql_result($oldres, $k,'invoiceenddate');
		}
		$invoiceenddate = date('Y-m-d', strtotime("+".$temp." months",strtotime($invoicestartdate)));
		/*echo " Invoice Start date: ".$invoicestartdate."<br>";
		echo " Invoice End date: ".$invoiceenddate."<br><br>";*/

	}

	$subtotal=$rateqr*$temp;
	if($commission==0){
		$val=($rateqr*$val)/100;
	}
		$invoiceamount=$subtotal+$val;
	
		/*echo " Invoice Amount: ".$invoiceamount."<br>";
		echo " Description: ".$description."<br>";


echo $invoicestartdate;
echo $enddate;*/

//$date1=strtotime($invoicestartdate);
//$date2=strtotime($enddate);
if($invoicestartdate<$enddate)
{
$insertinvoice = "INSERT INTO `webadmin_plmdb`.`invoicetb` (`customerid`, `propertyid`, `unitid`, `invoicestartdate`, `invoiceenddate`, `description`, `commission`, `subtotal`, `total`, `status`, `invoicedate`) VALUES ('$customer','$property','$unit','$invoicestartdate','$invoiceenddate','$description','$val','$subtotal','$invoiceamount','Unpaid',now());";
	mysql_query($insertinvoice);
	//echo "Valid";
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
			<td width="60%">Date : <b><?php echo date("d/m/Y"); ?></b><br>Invoice Number : <b>1234 </b><br> Clients Name : <b><?php echo $firstname." ".$lastname; ?></b></td>
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
			<td bgcolor="#F5E0DB" width="25%" align="right"><?php echo $val;?></td>
		</tr>
		<tr>
			<th  width="50%" align="right"></th>
			<th bgcolor="#F5E0DB" align="right">&nbsp;</th>
			<td bgcolor="#F5E0DB" width="25%" align="right"></td>
		</tr>
		<tr>
			<th width="50%" align="right"></th>
			<th bgcolor="#F5E0DB" align="right">TOTAL</th>
			<th bgcolor="#F5E0DB" width="25%" align="right"><?php echo $invoiceamount;?></th>
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
}
else
{
	echo "<b><center>invalid</center></b>";
}
?>	
