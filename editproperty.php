<?php 
include_once('connection.php'); 
session_start();
  $userid=$_SESSION["logid"];
  $propid=$_GET["Pr_opI_d"];
  $_SESSION['idprop']=$propid;

  $propres=mysql_query("select * from propertytb where propertyid='$propid'");
  if(mysql_num_rows($propres)==1)
  {
    $i=0;
    $propertyname=mysql_result($propres,$i,"propertyname");
    $location=mysql_result($propres,$i,"location");
    $country=mysql_result($propres,$i,"country");
    $city=mysql_result($propres,$i,"city");
    $address=mysql_result($propres,$i,"address");
    $description=mysql_result($propres,$i,"description");

  }

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
  <title>Property</title>
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
<body class="hold-transition skin-blue sidebar-mini" onunload="destroysession();">
<div class="wrapper">

  <header class="main-header">
  <center>
    <!-- Logo -->
    <a href="dashboard.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">PMS<b></b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">PMS<b></b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>


  <img src="dist/img/logo-landscape.jpg" width="235" alt="User Image">


      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $name; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php echo $name; ?> <!-- - Web Developer
                  <small>Member since Nov. 2012</small>-->
                </p>
              </li>
             
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-info btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-info btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <!--<li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>-->
        </ul>
      </div>
    </nav>
  </center>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $name; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form ->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">Your Main Navigation</li>
        <li>
          <a href="dashboard.php">
           <i class="fa fa-dashboard"></i> <span> Dashboard</span>
            <span class="pull-right-container">
              <!--<i class="fa fa-angle-left pull-right"></i>-->
            </span>
          </a>
        </li>

        <li>
          <a href="user.php">
           <i class="ion ion-person-add"></i> <span> Users</span>
            <span class="pull-right-container">
              <!--<i class="fa fa-angle-left pull-right"></i>-->
            </span>
          </a>
        </li>
        

        <li>
          <a href="property.php">
           <i class="ion ion-home"></i> <span> Properties</span>
            <span class="pull-right-container">
              <!--<i class="fa fa-angle-left pull-right"></i>-->
            </span>
          </a>
        </li>
        

        <li>
          <a href="prospect.php">
           <i class="ion ion-person-add"></i> <span>Prospects</span>
            <span class="pull-right-container">
              <!--<i class="fa fa-angle-left pull-right"></i>-->
            </span>
          </a>
        </li>

        <li>
          <a href="customer.php">
           <i class="ion ion-person"></i> <span>Customers</span>
            <span class="pull-right-container">
              <!--<i class="fa fa-angle-left pull-right"></i>-->
            </span>
          </a>
        </li>

        <li>
          <a href="invoice.php">
           <i class="glyphicon glyphicon-th-list"></i> <span>Invoices</span>
            <span class="pull-right-container">
              <!--<i class="fa fa-angle-left pull-right"></i>-->
            </span>
          </a>
        </li>

        <li>
          <a href="receipt.php">
           <i class="glyphicon glyphicon-th-list"></i> <span>Receipts</span>
            <span class="pull-right-container">
              <!--<i class="fa fa-angle-left pull-right"></i>-->
            </span>
          </a>
        </li>

        <li>
          <a href="task.php">
           <i class="glyphicon glyphicon-comment"></i> <span>Task Management</span>
            <span class="pull-right-container">
              <!--<i class="fa fa-angle-left pull-right"></i>-->
            </span>
          </a>
        </li>

        <li>
          <a href="viewreceipts.php">
           <i class="glyphicon glyphicon-folder-close"></i> <span>View Receipts</span>
            <span class="pull-right-container">
              <!--<i class="fa fa-angle-left pull-right"></i>-->
            </span>
          </a>
        </li>

         <li>
          <a href="document.php">
           <i class="glyphicon glyphicon-level-up"></i> <span>Documents</span>
            <span class="pull-right-container">
              <!--<i class="fa fa-angle-left pull-right"></i>-->
            </span>
          </a>
        </li>

        <li>
          <a href="unitimages.php">
           <i class="glyphicon glyphicon-picture"></i> <span>Property Images</span>
            <span class="pull-right-container">
              <!--<i class="fa fa-angle-left pull-right"></i>-->
            </span>
          </a>
        </li>

       <!-- <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>-->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Propertie
        <small>(Edit)</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Property(Edit)<?php echo $_SESSION['idprop']; ?></li>
      </ol>
    </section>

    
    <div class="col-xs-12 col-sm-12 col-lg-12">
      
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <!-- The time line -->
          <ul class="timeline">
            <!-- timeline time label ->
            <li class="time-label">
                  <span class="bg-red">
                    _Detail_
                  </span>
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
              <i class="fa fa-user bg-red"></i>

              <div class="timeline-item">
               <!-- <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>-->

                <h3 class="timeline-header"><a href="#">Property </a> Details</h3>

                <div class="timeline-body">
                  <div id="pfrm">
                  <form id="addfrm" class="form-horizontal">
                      <div class="panel-body">
                      <div class="col-sm-12 col-lg-12 row">
                       <div class="col-sm-12 col-lg-4">
                        <!--<label>Personal:</label>-->
                        <label> Property Name:</label>
                        <input type="text" class="col-sm-12 col-lg-12 col-md-12 form-control" name="pname" value="<?php echo $propertyname; ?>"><br>
                        <label> Location:</label>
                        <input type="text" class="col-sm-12 col-lg-12 col-md-12 form-control" name="plocation" value="<?php echo $location; ?>"><br>
                        <label> Country:</label>
                         <select class="col-sm-12 col-lg-12 col-md-12 form-control" name="pcountry">
                              <option value="<?php echo $country; ?>"><?php echo $country; ?></option>
                              <option value='India'>India</option>
                              <option value='Qatar'>Qatar</option>
                            </select>
                        </div>

                        <div class="col-sm-12 col-lg-4">
                          <label> City:</label>
                           <input type="text" class="col-sm-12 col-lg-12 col-md-12 form-control" name="pcity" value="<?php echo $city; ?>"><br>
                          <label> Address:</label>
                           <textarea name="paddress" class="col-sm-12 col-lg-12 col-md-12 form-control"><?php echo $address; ?></textarea>
                        </div>
                       
                       <div class="col-sm-12 col-lg-4">
                          <label> Property Description:</label>
                          <textarea name="pdescription" class="col-sm-12 col-lg-12 col-md-12 form-control" rows="4"><?php echo $description; ?></textarea>
                             
                            
                       </div>
                       
                    </div>
                    </div>
                  <!--  <div class="panel-footer">
                        <center>
                        <!--<input type="button" id="addprbtn" class="btn btn-info" value="Submit" onclick="add();">  
                        <input type="button" id="editprbtn" class="btn btn-danger" value="Update" onclick="edit();"> 
                        

                       
                        </center>
                    </div>-->
                  </form>
                  </div>
                </div>
                <div class="timeline-footer">
                  
                  <!--<a class="btn btn-danger btn-xs">Delete</a>-->
                </div>
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline item -->
            
            <li>
              <i class="fa fa-upload bg-aqua"></i>
                <br>
              <div class="timeline-item" id="div1">
                
                <!--<span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>-->

                <h3 class="timeline-header"><a href="#">Unit </a> (Add)</h3><!--use no-border in class for not setting border for header-->
                
                <div class="timeline-body">
                  <form id="unitform">

                     <div id="unitdiv" class="col-sm-12 col-lg-12">
                       <table>
                         <tr>
                           
                           <td>
                             Unit No.
                           </td>
                           <td>
                             Area Sqm.
                           </td>
                           <td>
                             Rate QR
                           </td>
                           <td>
                             Furnished
                           </td>
                           <td>
                             Status
                           </td>
                           <td>
                             Bedrooms
                           </td>
                           <td>
                             Bathrooms
                           </td>
                           <td>
                             Halls
                           </td>
                           <td>
                             Kitchen
                           </td>
                           <td>
                             Electricity No.
                           </td>
                           <td>
                             Water No.
                           </td>
                           
                           
                         </tr> 
                         <tr>
                           <td>
                             <input type="text" class="col-sm-1 col-lg-1 col-md-1 form-control" name="uno" placeholder="Unit no.">
                           </td>
                           <td>
                             <input type="text" class="col-sm-1 col-lg-1 col-md-1 form-control" name="area" placeholder="Area Sqm.">
                           </td>
                           <td>
                             <input type="text" class="col-sm-1 col-lg-1 col-md-1 form-control" name="rateqr" placeholder="Rate QR">
                           </td>
                           <td>
                             <select class="col-sm-1 col-lg-1 col-md-1 form-control" name="furnished">
                               <option value='Unfurnished'>Unfurnished</option>
                               <option value='Semi-Unfurnished'>Semi-Furnished</option>
                               <option value='Full-Furnished'>Full-Furnished</option>
                             </select>
                           </td>
                           <td>
                             <select class="col-sm-1 col-lg-1 col-md-1 form-control" name="status">
                               <option value='Vacant'>Vacant</option>
                               <option value='Rented'>Rented</option>
                               <option value='Maintenance/On Hold'>Maintenance/On Hold</option>
                               <option value='Booked'>Booked</option>
                             </select>
                           </td>
                           <td>
                             <input type="text" class="col-sm-1 col-lg-1 col-md-1 form-control" name="bedrm" placeholder="Bedrooms">
                           </td>
                           <td>
                             <input type="text" class="col-sm-1 col-lg-1 col-md-1 form-control" name="bathrm" placeholder="Bathrooms">
                           </td>
                           <td>
                             <input type="text" class="col-sm-1 col-lg-1 col-md-1 form-control" name="hall" placeholder="Halls">
                           </td>
                           <td>
                             <input type="text" class="col-sm-1 col-lg-1 col-md-1 form-control" name="kitchen" placeholder="Kitchen">
                           </td>
                           <td>
                             <input type="text" class="col-sm-1 col-lg-1 col-md-1 form-control" name="electricity" placeholder="Electricity">
                           </td>
                           <td>
                             <input type="text" class="col-sm-1 col-lg-1 col-md-1 form-control" name="water" placeholder="Water No.">
                           </td>
                           <td>
                             <input type="button" class=" btn btn-success" name="unitbtn"  onclick="addunit();" value="Add Unit">
                           </td>

                         </tr>
                       </table>
                     </div>
                </form>
                </div>
                <div class="timeline-footer"><br><br>
                  <form id="unitlistdel">
                  <table class="table">
                    <thead>
                         <tr>
                           <th>
                             #
                           </th>
                           <th>
                             Unit No.
                           </th>
                           <th>
                             Area Sqm.
                           </th>
                           <th>
                             Rate QR
                           </th>
                           <th>
                             Furnished
                           </th>
                           <th>
                             Status
                           </th>
                           <th>
                             Bedrooms
                           </th>
                           <th>
                             Bathrooms
                           </th>
                           <th>
                             Halls
                           </th>
                           <th>
                             Kitchen
                           </th>
                           <th>
                             Electricity No.
                           </th>
                           <th>
                             Water No.
                           </th>
                            <th>
                              <a class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="bottom" title="Delete" onclick="del();"><span class="glyphicon glyphicon-trash"></span></a>
                           </th>
                           
                           
                         </tr>
                      </thead> 
                      <tbody id="unitlist">
                        
                      </tbody>
                    </table>
                    </form>
                  <!--<a class="btn btn-danger btn-xs">Delete</a>-->
                </div>
                <center>
               <!-- <a href="clearsession.php" class="btn btn-success">Save</a>-->
                <input type="submit" class="btn btn-success" onclick="edit();" name="edit" value="Save Changes">
                </center> 
              </div>
            </li>
            
            
            
            <!-- END timeline item -->
            <!-- timeline item -->

           
           <!-- <li>
              <i class="fa fa-fire bg-blue"></i>

              <div class="timeline-item">
                <!--<span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>->

                <h3 class="timeline-header"><a href="#">Hosting</a> Details</h3>

                <div class="timeline-body">
                
                </div>
                <div class="timeline-footer">
                  
                </div>
              </div>
            </li>-->
            
            <!-- END timeline item -->
            <!-- timeline time label -->
            
            <!-- END timeline item -->
            <!--<li>
              <i class="fa fa-clock-o bg-gray"></i>
            </li>-->
          </ul>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
     </div>
      
 
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->


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
 window.onload = function() {
 // $("#div1").hide();
  //$("#editprbtn").hide();
  getunits();
//  alert("hiyut");
};
</script>

<script type="text/javascript">

function getunits(){
  //alert("HHHIIIIII");
  $.ajax({
      
      url: "getunits.php",

  

      
      type: "GET",

      
      dataType : "json",

      
      success: function( data ) {
        console.log(data);
        //alert(data);
        $('#unitlist').html('');
        for(var i=0;i<data.length;i++){
          var res = "<tr><td><input type='radio' name='id' value='"+data[i]['unitid']+"'></td> <td><a href=\"editproperty.php?Pr_opI_d="+data[i]['unitid']+"\">"+data[i]['unitno']+"</a></td><td>"+data[i]['areasqm']+"</td><td>"+data[i]['rateqr']+"</td><td>"+data[i]['furnished']+"</td><td>"+data[i]['status']+"</td><td>"+data[i]['bedroom']+"</td><td>"+data[i]['bathroom']+"</td><td>"+data[i]['hall']+"</td><td>"+data[i]['kitchen']+"</td><td>"+data[i]['electricityno']+"</td><td>"+data[i]['waterno']+"</td></tr>";
          
        $('#unitlist').append(res);

        }
      },

     
      error: function( xhr, status, errorThrown ) {
       // alert( "Sorry, there was a problem!" );
        console.log( "Error: " + errorThrown );
        console.log( "Status: " + status );
        console.dir( xhr );
      },

      
      complete: function( xhr, status ) {
        //alert( "The request is complete!" );
      
      }
  });
}
</script>

<script type="text/javascript">
function add(){  
$("#div1").show();
$("#addprbtn").hide();
$("#editprbtn").show();


  var data = $('#addfrm').serialize();
  //alert(data);
  $.ajax({
      // The URL for the request
      url: "addpropertyquery.php",

      // The data to send (will be converted to a query string)
       data: data,

      // Whether this is a POST or GET request
      type: "POST",

      // The type of data we expect back
      dataType : "json",

      // Code to run if the request succeeds;
      // the response is passed to the function
      success: function( data ) {
        console.log(data);
      //alert(data);
        
      },

      // Code to run if the request fails; the raw request and
      // status codes are passed to the function
      error: function( xhr, status, errorThrown ) {
        //alert( "Sorry, there was a problem!" );
        console.log( "Error: " + errorThrown );
        console.log( "Status: " + status );
        console.dir( xhr );
      },

      // Code to run regardless of success or failure
      complete: function( xhr, status ) {
      getproperties();
      //document.getElementById("addfrm").reset();
      }
  });
}


function edit(){
    var data = $('#addfrm').serialize();
   //alert(data);
  $.ajax({
      url: "editpropertyquery.php",
       data: data,
      type: "POST",
      success: function( data ) {
        console.log(data); 
      },
      error: function( xhr, status, errorThrown ) {
        console.log( "Error: " + errorThrown );
        console.log( "Status: " + status );
        console.dir( xhr ); 
      },
      complete: function( xhr, status ) {
     
     window.location.assign("property.php");
      }
  });

}

function del(){
    var data = $('#unitlistdel').serialize();
    //alert(data);
  $.ajax({
      // The URL for the request
      url: "deleteunitfromlist.php",

      // The data to send (will be converted to a query string)
       data: data,

      // Whether this is a POST or GET request
      type: "POST",

      // The type of data we expect back
      dataType : "json",

      // Code to run if the request succeeds;
      // the response is passed to the function
      success: function( data ) {
        console.log(data);
        getunits();
      },

      // Code to run if the request fails; the raw request and
      // status codes are passed to the function
      error: function( xhr, status, errorThrown ) {
        //alert( "Sorry, there was a problem!" );
        console.log( "Error: " + errorThrown );
        console.log( "Status: " + status );
        console.dir( xhr );
      getunits();
      },

      // Code to run regardless of success or failure
      complete: function( xhr, status ) {
      getproperties();
      }
  });

}

function addunit(){  
$("#div1").show();
  var data = $('#unitform').serialize();
  //alert(data);
  $.ajax({
      // The URL for the request
      url: "addunitquery.php",

      // The data to send (will be converted to a query string)
       data: data,

      // Whether this is a POST or GET request
      type: "POST",

      // The type of data we expect back
      dataType : "json",

      // Code to run if the request succeeds;
      // the response is passed to the function
      success: function( data ) {
        console.log(data);
      //alert(data);
        
      },

      // Code to run if the request fails; the raw request and
      // status codes are passed to the function
      error: function( xhr, status, errorThrown ) {
        //alert( "Sorry, there was a problem!" );
        console.log( "Error: " + errorThrown );
        console.log( "Status: " + status );
        console.dir( xhr );
      },

      // Code to run regardless of success or failure
      complete: function( xhr, status ) {
      getunits();
      document.getElementById("unitform").reset();
      }
  });
}

</script> 

</body>
</html>
<?php 
}
else
{
header("location:404.html");

}?>