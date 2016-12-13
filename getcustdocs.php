<?php 
include_once('connection.php'); 
session_start();
  $userid=$_SESSION["logid"];

  $customer=$_POST['customer'];
  $custprop=$_POST['custprop'];

$logres=mysql_query("select * from usertb where uid='$userid'");
  if(mysql_num_rows($logres)==1)
  {
    $i=0;
    $name=mysql_result($logres,$i,"name");

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">


  
</head>
<body>
<div class="row">
<table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                      <th>Customer Name</th>
                                      <th>Document Name</th>
                                      <th>Property Name</th>
                                      <th>Unit No</th>                                      
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                      $result = mysql_query("SELECT * FROM documentstb a, customertb b, custpropertytb c, propertytb d, unittb e WHERE a.customerid='$customer' && a.custpropid='$custprop' && a.customerid=b.customerid && c.custpropid=a.custpropid && c.propertyid=d.propertyid && c.unitid=e.unitid");
                                      for ($i=0; $i <mysql_num_rows($result) ; $i++) { 
                                        $dpath=mysql_result($result, $i,'documentpath');
                                        $dname=mysql_result($result, $i,'docname');
                                        $fname=mysql_result($result, $i,'fname');
                                        $lname=mysql_result($result, $i,'lname');
                                        $propertyname=mysql_result($result, $i,'propertyname');
                                        $unitno=mysql_result($result, $i,'unitno');
                                        echo  "<tr>
                                                <td>$fname $lname</td>
                                                <td><a href='img/$dpath' target='_blank'>$dname</a></td>
                                                <td>$propertyname</td>
                                                <td>$unitno</td>
                                              </tr>";
                                      }
                                    ?>
                                     
                                    </tbody>
                                    
                                  </table>

    

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>


<script type="text/javascript">
/* window.onload = function() {
 getdocs();
 
//  alert("hiyut");
};*/
</script>

<script>/*
function myFunction() {
    var x = document.getElementById("mySelect").value;
    //alert(x);
    $.ajax({  
    type: "POST",
    url: "autopropunit.php",
    data:'keyword='+x,
    beforeSend: function(){
      
      //$("#search-box0").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
    },
    success: function(data){
      $("#unitbox").show();
      $("#unitbox").html(data);
      //$("#search-box0").css("background","#FFF");
    }
    });
}





  
function getimages(){
    var data = $('#inputfrm').serialize();
   
  $.ajax({
      // The URL for the request
      url: "getimages.php",

      // The data to send (will be converted to a query string)
       data: data,

      // Whether this is a POST or GET request
      type: "POST",

      // The type of data we expect back
      //dataType : "json",

      // Code to run if the request succeeds;
      // the response is passed to the function
      success: function( data ) {
        console.log(data);
      $('#igallery').html(data)
        
      },

      // Code to run if the request fails; the raw request and
      // status codes are passed to the function
      error: function( xhr, status, errorThrown ) {
        alert( "Sorry, there was a problem!" );
        console.log( "Error: " + errorThrown );
        console.log( "Status: " + status );
        console.dir( xhr );
      
      },

      // Code to run regardless of success or failure
      complete: function( xhr, status ) {
      getappointments();
      }
  });

}*/
</script>




</body>
</html>
<?php 
}
else
{
header("location:404.html");

}?>