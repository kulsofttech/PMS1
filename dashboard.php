<?php 
include_once('connection.php'); 
session_start();
  $userid=$_SESSION["logid"];

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
  <title>Dashboard</title>
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
<body class="hold-transition skin-blue sidebar-mini">
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
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">Your Main Navigation</li>
        <li>
          <a href="dashboard.php">
           <font size="4"><i class="fa fa-dashboard"></i></font><font size="3">  <span> Dashboard</span></font>
            <span class="pull-right-container">
              <!--<i class="fa fa-angle-left pull-right"></i>-->
            </span>
          </a>
        </li>

        <li>
          <a href="user.php">
           <font size="5"><i class="ion ion-person-add"></i></font><font size="3">  <span> Users</span></font>
            <span class="pull-right-container">
              <!--<i class="fa fa-angle-left pull-right"></i>-->
            </span>
          </a>
        </li>
        

        <li>
          <a href="property.php">
           <font size="5"><i class="ion ion-home"></i> </font><font size="3"> <span> Properties</span></font>
            <span class="pull-right-container">
              <!--<i class="fa fa-angle-left pull-right"></i>-->
            </span>
          </a>
        </li>
        

        <li>
          <a href="prospect.php">
          <font size="5"> <i class="ion ion-person-add"></i></font><font size="3">  <span> Prospects</span></font>
            <span class="pull-right-container">
              <!--<i class="fa fa-angle-left pull-right"></i>-->
            </span>
          </a>
        </li>

        <li>
          <a href="customer.php">
           <font size="5"><i class="ion ion-person"></i></font><font size="3"> <span> Customers</span></font></font>
            <span class="pull-right-container">
              <!--<i class="fa fa-angle-left pull-right"></i>-->
            </span>
          </a>
        </li>

        <li>
          <a href="invoice.php">
          <font size="4"> <i class="glyphicon glyphicon-th-list"></i></font><font size="3">  <span> Invoices</span></font>
            <span class="pull-right-container">
              <!--<i class="fa fa-angle-left pull-right"></i>-->
            </span>
          </a>
        </li>

        <li>
          <a href="receipt.php">
          <font size="4"> <i class="glyphicon glyphicon-th-list"></i></font> <font size="3"> <span> Receipts</span></font>
            <span class="pull-right-container">
              <!--<i class="fa fa-angle-left pull-right"></i>-->
            </span>
          </a>
        </li>

        <li>
          <a href="task.php">
          <font size="4"> <i class="glyphicon glyphicon-comment"></i></font><font size="3">  <span> Task Management</span></font>
            <span class="pull-right-container">
              <!--<i class="fa fa-angle-left pull-right"></i>-->
            </span>
          </a>
        </li>

        <li>
          <a href="viewreceipts.php">
          <font size="4"> <i class="glyphicon glyphicon-folder-close"></i></font><font size="3">  <span> View Receipts</span></font>
            <span class="pull-right-container">
              <!--<i class="fa fa-angle-left pull-right"></i>-->
            </span>
          </a>
        </li>

         <li>
          <a href="document.php">
          <font size="4">  <i class="glyphicon glyphicon-level-up"></i></font><font size="3">  <span> Documents</span></font>
            <span class="pull-right-container">
              <!--<i class="fa fa-angle-left pull-right"></i>-->
            </span>
          </a>
        </li>

        <li>
          <a href="unitimages.php">
         <font size="4">  <i class="glyphicon glyphicon-picture"></i></font><font size="3">  <span> Property Images</span></font>
            <span class="pull-right-container">
              <!--<i class="fa fa-angle-left pull-right"></i>-->
            </span>
          </a>
        </li>



      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">

        <a href="prospect.php" style="color: white;">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
         
          <div class="small-box bg-green">
            <div class="inner">
            <?php
            $sql = "select * from prospecttb a,usertb b where a.assignedto=b.uid && (a.status='New' || a.status='Assigned')";
            $result = mysql_query($sql);
            $prospcnt=mysql_num_rows($result);
            ?>
              <h3> <?php echo $prospcnt; ?></h3>

              <p> Prospects </p>
            </div>
             <div class="icon">
              <img src="dist/img/icons/prospects.png" width="100" alt="User Image"> 
            </div><br>
            
            <!--<a href="prospect.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
          </div>
        </div>
        </a>
        <!-- ./col -->

        <a href="property.php" style="color: white;">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
         
          <div class="small-box bg-green">
            <div class="inner">
             <?php
            $sql = "select * from propertytb where deleted='0'";
            $result = mysql_query($sql);
            $propcnt=mysql_num_rows($result);
            ?>
              <h3> <?php echo $propcnt; ?></h3>

              <p> Property </p>
            </div>
             <div class="icon">
              <img src="dist/img/icons/property.png" width="100" alt="User Image"> 
            </div><br>
            
            <!--<a href="property.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
          </div>
        </div>
        </a>
        <!-- ./col -->

        <a href="user.php" style="color: white;">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
         
          <div class="small-box bg-green">
            <div class="inner">
            <?php
            $sql = "select * from usertb where type='1'";
            $result = mysql_query($sql);
            $execnt=mysql_num_rows($result);
            ?>
              <h3> <?php echo $execnt; ?></h3>

              <p> Users(Executive) </p>
            </div>
             <div class="icon">
              <img src="dist/img/icons/executives.png" width="100" alt="User Image"> 
            </div><br>
            
            <!--<a href="user.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
          </div>
        </div>
        </a>
        <!-- ./col -->

        
       
        <a href="invoice.php" style="color: white;">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
         
          <div class="small-box bg-green">
            <div class="inner">
            <?php
            $sql = "select * from invoicetb where status='Unpaid'";
            $result = mysql_query($sql);
            $invcnt=mysql_num_rows($result);
            ?>
              <h3> <?php echo $invcnt; ?></h3>

              <p> Invoices </p>
            </div>
             <div class="icon">
              <img src="dist/img/icons/invoices.png" width="100" alt="User Image"> 
            </div><br>
            
            <!--<a href="invoice.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
          </div>
        </div>
        </a>
        <!-- ./col -->

         <a href="receipt.php" style="color: white;">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
         
          <div class="small-box bg-green">
            <div class="inner">
            <?php
            $sql = "select * from receipttb";
            $result = mysql_query($sql);
            $rcpcnt=mysql_num_rows($result);
            ?>
            <h3> <?php echo $rcpcnt; ?></h3>

              <p> Receipts </p>
            </div>
             <div class="icon">
              <img src="dist/img/icons/receipts.png" width="100" alt="User Image"> 
            </div><br>
            
            <!--<a href="receipt.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
          </div>
        </div>
        </a>
        <!-- ./col -->


        <a href="customer.php" style="color: white;">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
         
          <div class="small-box bg-green">
            <div class="inner">
            <?php
            $sql = "select * from customertb where deleted='0'";
            $result = mysql_query($sql);
            $cuscnt=mysql_num_rows($result);
            ?>
              <h3> <?php echo $cuscnt; ?></h3>

              <p> Customer </p>
            </div>
             <div class="icon">
              <img src="dist/img/icons/customer.png" width="100" alt="User Image"> 
            </div><br>
            
            <!--<a href="customer.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
          </div>
        </div>
        </a>
        <!-- ./col -->

        <a href="document.php" style="color: white;">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
         
          <div class="small-box bg-green">
            <div class="inner">
            <?php
            $sql = "select * from documentstb";
            $result = mysql_query($sql);
            $doccnt=mysql_num_rows($result);
            ?>
              <h3> <?php echo $doccnt; ?></h3>

              <p> Documents </p>
            </div>
             <div class="icon">
              <img src="dist/img/icons/documents.png" width="100" alt="User Image"> 
            </div><br>
            
            <!--<a href="uploaddocument.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
          </div>
        </div>
        </a>
        <!-- ./col -->
       
        <a href="unitimages.php" style="color: white;">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
         
          <div class="small-box bg-green">
            <div class="inner">
            <?php
            $sql = "select * from unitimagestb";
            $result = mysql_query($sql);
            $galcnt=mysql_num_rows($result);
            ?>
              <h3> <?php echo $galcnt; ?></h3>

              <p> Gallery </p>
            </div>
             <div class="icon">
              <img src="dist/img/icons/gallery.png" width="100" alt="User Image"> 
            </div><br>
            
            <!--<a href="unitimages.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
          </div>
        </div>
        </a>
        <!-- ./col -->
       


<!--

        <div class="col-lg-3 col-xs-6">
          <!-- small box ->
         
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>00</h3>

              <p>Total Clients</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col ->
        
        <div class="col-lg-3 col-xs-6">
          <!-- small box ->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>00<!--<sup style="font-size: 20px">%</sup>-></h3>

              <p>Active Clients</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="client.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col ->
        
        <div class="col-lg-3 col-xs-6">
          <!-- small box ->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>00</h3>

              <p>Deactive Clients</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="deactiveclient.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col ->
        <div class="col-lg-3 col-xs-6">
          <!-- small box ->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>00</h3>

              <p>Unique Visitors</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
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
</body>
</html>
<?php 
}
else
{
header("location:404.html");

}?>