<?php 
include_once('connection.php'); 
session_start();
  $userid=$_SESSION["excid"];
  $tskid=$_GET['id'];
  $sql = "select *,a.status as mystatus from tasktb a,usertb b, prospecttb c,customertb d where a.taskid=$tskid && a.assignedto=b.uid && a.prospectid=c.prospectid && a.customerid=d.customerid";
  $taskdetail=mysql_query($sql);
  $i=0;
  $taskname=mysql_result($taskdetail, $i,'taskname');
  $name=mysql_result($taskdetail, $i,'name');
  $startdate=mysql_result($taskdetail, $i,'startdate');
  $enddate=mysql_result($taskdetail, $i,'enddate');
  $status=mysql_result($taskdetail, $i,'status');
  $prospectid=mysql_result($taskdetail, $i,'prospectid');
  $customerid=mysql_result($taskdetail, $i,'customerid');
  $addedon=mysql_result($taskdetail, $i,'addedon');
  $priority=mysql_result($taskdetail, $i,'priority');
  $firstname=mysql_result($taskdetail, $i,'firstname');
  $lastname=mysql_result($taskdetail, $i,'lastname');
  $fname=mysql_result($taskdetail, $i,'fname');
  $lname=mysql_result($taskdetail, $i,'lname');


 


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
  <title>Prospect</title>
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
    <a href="executivehome.php" class="logo">
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
          <a href="executivehome.php">
           <i class="fa fa-dashboard"></i> <span> Dashboard</span>
            <span class="pull-right-container">
              <!--<i class="fa fa-angle-left pull-right"></i>-->
            </span>
          </a>
        </li>

        <li>
          <a href="excprospect.php">
           <i class="ion ion-person-add"></i> <span>Prospects</span>
            <span class="pull-right-container">
              <!--<i class="fa fa-angle-left pull-right"></i>-->
            </span>
          </a>
        </li>

        <li>
          <a href="exccustomer.php">
           <i class="ion ion-person"></i> <span>Customers</span>
            <span class="pull-right-container">
              <!--<i class="fa fa-angle-left pull-right"></i>-->
            </span>
          </a>
        </li>

        
        
        <li>
          <a href="exctask.php">
           <i class="glyphicon glyphicon-comment"></i> <span>Task Management</span>
            <span class="pull-right-container">
              <!--<i class="fa fa-angle-left pull-right"></i>-->
            </span>
          </a>
        </li>

        <li>
          <a href="excunitimages.php">
           <i class="glyphicon glyphicon-picture"></i> <span>Property Images</span>
            <span class="pull-right-container">
              <!--<i class="fa fa-angle-left pull-right"></i>-->
            </span>
          </a>
        </li>
         <li>
          <a href="excinvoice.php">
           <i class="glyphicon glyphicon-th-list"></i> <span>Invoices</span>
            <span class="pull-right-container">
              <!--<i class="fa fa-angle-left pull-right"></i>-->
            </span>
          </a>
        </li>

        <li>
          <a href="excviewreceipts.php">
           <i class="glyphicon glyphicon-th-list"></i> <span>Receipts</span>
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
        view Task
        <small>(Add)</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="executivehome.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">View Task</li>
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

                <h3 class="timeline-header"><a href="#">Task </a> Details</h3>

                <div class="timeline-body">
                  <div id="pfrm">
                  
                      <div class="panel-body">
                      <div class="col-sm-12 col-lg-12 row">
                       <div class="col-sm-6 col-lg-2">
                        <!--<label>Personal:</label>-->
                        <label> Taskname:</label><br>
                        <label> Assigned To:</label><br> 
                        <label> Task start date:</label><br>  
                        <label> Task end date:</label><br>  
                        <label> Status:</label><br> 

                        <?php if($prospectid==0) {?>
                        <label> Customer Name:</label><br>
                        <?php } else { ?>

                        <label> Prospect Name:</label><br> 
                         <?php } ?>
                        <label> Added on:</label><br>  
                        <label> Priority:</label><br> 
                         
                        
                       </div>

                      <div class="col-sm-6 col-lg-3"> 
                        <label> : <?php echo $taskname; ?></label> <br>
                        <label> : <?php echo $name; ?></label> <br>
                        <label> : <?php echo $startdate; ?></label> <br>
                        <label> : <?php echo $enddate; ?></label> <br>
                        <label> : <?php echo $status; ?></label> <br>

                        <?php if($prospectid==0) {?>
                        <label> : <?php echo $fname; ?> <?php echo $lname; ?></label> <br>
                        <?php } else { ?>
                         <label> : <?php echo $firstname; ?> <?php echo $lastname; ?></label> <br>
                         <?php } ?>
                        <label> : <?php echo $addedon; ?></label> <br>
                        <label> : <?php echo $priority; ?></label> <br>
                        
                       
                        
                       
                        
                      </div>
            
                        
                       <div class="col-sm-12 col-lg-7" style="height:300px; overflow: auto;">
                        <table id="example1" class="table table-bordered table-striped">
                          <thead>
                          <tr>
                            <th> Name</th>
                            <th>Remark</th>
                            <th>Date</th>
                          </tr>
                          </thead>
                          <tbody id="invoicelist">
                          <?php
                              $resql = "select * from remarktb a,usertb b where a.taskid=$tskid && a.remarkaddedby=b.uid";
                              $remarkresult = mysql_query($resql);
                              for ($i=0; $i <mysql_num_rows($remarkresult) ; $i++) { 
                                $name=mysql_result($remarkresult, $i,'name');
                                $remark=mysql_result($remarkresult, $i,'remark');
                                $remarkdate=mysql_result($remarkresult, $i,'remarkaddedon');
                                echo "<tr><td>$name</td><td>$remark</td><td>$remarkdate</td></tr>";
                              }
                          ?>
                           
                          </tbody>
                
                        </table>
                        <form id="remarkfrm">
                         <table class="table">
                          <thead>
                          <tr>
                          <input type="hidden" value="<?php echo $tskid; ?>" name="tidtxt">
                          <td><input type="text" class="form-control" placeholder="Type Remark here" name="remarktxt"></td>
                          <td><select class="form-control" name="statussel">
                                <option value="<?php echo $status; ?>">
                                  <?php echo $status; ?>
                                </option>
                                <option value="Open">
                                  Open
                                </option>
 
                                <option value="Pending">
                                  Pending
                                </option>
 
                                <option value="Completed">
                                  Completed
                                </option>
                              </select></td>
                          <td><input type="button" class="btn btn-info" value="Save" onclick="addremark();"></td></tr>
                          </thead>
                        </table>
                        </form>
                       </div>
                       
                    </div>
                    </div>
                    <!--<div class="panel-footer">
                        <center>
                        <input type="button" id="addprbtn" class="btn btn-info" value="Update" onclick="add();">  
                        <input type="submit" id="addprbtn" class="btn btn-primary" value="Convert to Customer" >  

                       
                        </center>
                    </div>-->
                 
                  </div>
                </div>
                <div class="timeline-footer">
                  
                  <!--<a class="btn btn-danger btn-xs">Delete</a>-->
                </div>
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline item -->
            
            
            
            
           
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
 
 
//  alert("hiyut");
};
</script>



<script type="text/javascript">
function addremark(){  
  var data = $('#remarkfrm').serialize();
  //alert(data);
  $.ajax({
      // The URL for the request
      url: "excaddremarkquery.php",

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
      location.reload();
      location.reload();
      location.reload();
      //document.getElementById("addfrm").reset();
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