<?php 
include_once('connection.php'); 
session_start();
  $userid=$_SESSION["logid"];
  $prospid=$_GET['Pr_ospI_d'];
  $prospdetail=mysql_query("select * from prospecttb where prospectid=$prospid");
  $i=0;
  $firstname=mysql_result($prospdetail, $i,'firstname');
  $lastname=mysql_result($prospdetail, $i,'lastname');
  $nationality=mysql_result($prospdetail, $i,'nationality');
  //$city=mysql_result($prospdetail, $i,'city');
  $address=mysql_result($prospdetail, $i,'address');
  $mobile1=mysql_result($prospdetail, $i,'mobile1');
  $mobile2=mysql_result($prospdetail, $i,'mobile2');
  $emailid=mysql_result($prospdetail, $i,'emailid');
  $intrestedin=mysql_result($prospdetail, $i,'intrestedin');
  $propertydetails=mysql_result($prospdetail, $i,'propertydetails');
  $status=mysql_result($prospdetail, $i,'status');
  $assignedto=mysql_result($prospdetail, $i,'assignedto');



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
        Prospect
        <small>(Add)</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Prospect</li>
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

                <h3 class="timeline-header"><a href="#">Prospect </a> Details</h3>

                <div class="timeline-body">
                  <div id="pfrm">
                  <form id="addfrm" action="addcustomer.php" method="POST" class="form-horizontal">
                      <div class="panel-body">
                      <div class="col-sm-12 col-lg-12 row">
                       <div class="col-sm-12 col-lg-4">
                        <!--<label>Personal:</label>-->
                        <label>First Name:</label>
                        <input type="hidden" name="editprospid" value="<?php echo $prospid; ?>">
                        <input type="text" class="col-sm-12 col-lg-12 col-md-12 form-control" name="fname" value="<?php echo $firstname; ?>"><br>
                        <label>Last Name:</label>
                        <input type="text" class="col-sm-12 col-lg-12 col-md-12 form-control" name="lname" value="<?php echo $lastname; ?>"><br>
                        <label>Select Nationality:</label>
                       <!-- <select class="col-sm-12 col-lg-12 col-md-12 form-control" name="nationality">
                              <option value="<?php //echo $nationality; ?>"><?php //echo $nationality; ?></option>
                              <option value='India'>India</option>
                              <option value='USA'>USA</option>
                         </select>-->
                        <input list="countries" name="nationality" class="form-control" value="<?php echo $nationality; ?>">
                      <datalist id="countries">
                        <option value="Internet Explorer">
                        <option value="Afghanistan">
                        <option value="Albania"></option>
                        <option value="Algeria"></option>
                        <option value="American Samoa"></option>
                        <option value="Andorra"></option>
                        <option value="Angola"></option>
                        <option value="Anguilla"></option>
                        <option value="Antartica"></option>
                        <option value="Antigua and Barbuda"></option>
                        <option value="Argentina"></option>
                        <option value="Armenia"></option>
                        <option value="Aruba"></option>
                        <option value="Australia"></option>
                        <option value="Austria"></option>
                        <option value="Azerbaijan"></option>
                        <option value="Bahamas"></option>
                        <option value="Bahrain"></option>
                        <option value="Bangladesh"></option>
                        <option value="Barbados"></option>
                        <option value="Belarus"></option>
                        <option value="Belgium"></option>
                        <option value="Belize"></option>
                        <option value="Benin"></option>
                        <option value="Bermuda"></option>
                        <option value="Bhutan"></option>
                        <option value="Bolivia"></option>
                        <option value="Bosnia and Herzegowina"></option>
                        <option value="Botswana"></option>
                        <option value="Bouvet Island"></option>
                        <option value="Brazil"></option>
                        <option value="British Indian Ocean Territory"></option>
                        <option value="Brunei Darussalam"></option>
                        <option value="Bulgaria"></option>
                        <option value="Burkina Faso"></option>
                        <option value="Burundi"></option>
                        <option value="Cambodia"></option>
                        <option value="Cameroon"></option>
                        <option value="Canada"></option>
                        <option value="Cape Verde"></option>
                        <option value="Cayman Islands"></option>
                        <option value="Central African Republic"></option>
                        <option value="Chad"></option>
                        <option value="Chile"></option>
                        <option value="China"></option>
                        <option value="Christmas Island"></option>
                        <option value="Cocos Islands"></option>
                        <option value="Colombia"></option>
                        <option value="Comoros"></option>
                        <option value="Congo"></option>
                        
                        <option value="Cook Islands"></option>
                        <option value="Costa Rica"></option>
                        <option value="Cota D'Ivoire"></option>
                        <option value="Croatia"></option>
                        <option value="Cuba"></option>
                        <option value="Cyprus"></option>
                        <option value="Czech Republic"></option>
                        <option value="Denmark"></option>
                        <option value="Djibouti"></option>
                        <option value="Dominica"></option>
                        <option value="Dominican Republic"></option>
                        <option value="East Timor"></option>
                        <option value="Ecuador"></option>
                        <option value="Egypt"></option>
                        <option value="El Salvador"></option>
                        <option value="Equatorial Guinea"></option>
                        <option value="Eritrea"></option>
                        <option value="Estonia"></option>
                        <option value="Ethiopia"></option>
                        <option value="Falkland Islands"></option>
                        <option value="Faroe Islands"></option>
                        <option value="Fiji"></option>
                        <option value="Finland"></option>
                        <option value="France"></option>
                        <option value="France Metropolitan"></option>
                        <option value="French Guiana"></option>
                        <option value="French Polynesia"></option>
                        <option value="French Southern Territories"></option>
                        <option value="Gabon"></option>
                        <option value="Gambia"></option>
                        <option value="Georgia"></option>
                        <option value="Germany"></option>
                        <option value="Ghana"></option>
                        <option value="Gibraltar"></option>
                        <option value="Greece"></option>
                        <option value="Greenland"></option>
                        <option value="Grenada"></option>
                        <option value="Guadeloupe"></option>
                        <option value="Guam"></option>
                        <option value="Guatemala"></option>
                        <option value="Guinea"></option>
                        <option value="Guinea-Bissau"></option>
                        <option value="Guyana"></option>
                        <option value="Haiti"></option>
                        <option value="Heard and McDonald Islands"></option>
                        <option value="Holy See"></option>
                        <option value="Honduras"></option>
                        <option value="Hong Kong"></option>
                        <option value="Hungary"></option>
                        <option value="Iceland"></option>
                        <option value="India"></option>
                        <option value="Indonesia"></option>
                        <option value="Iran"></option>
                        <option value="Iraq"></option>
                        <option value="Ireland"></option>
                        <option value="Israel"></option>
                        <option value="Italy"></option>
                        <option value="Jamaica"></option>
                        <option value="Japan"></option>
                        <option value="Jordan"></option>
                        <option value="Kazakhstan"></option>
                        <option value="Kenya"></option>
                        <option value="Kiribati"></option>
                        <option value="Democratic People's Republic of Korea"></option>
                        <option value="Korea"></option>
                        <option value="Kuwait"></option>
                        <option value="Kyrgyzstan"></option>
                        <option value="Lao"></option>
                        <option value="Latvia"></option>
                        <option value="Lebanon" selected></option>
                        <option value="Lesotho"></option>
                        <option value="Liberia"></option>
                        <option value="Libyan Arab Jamahiriya"></option>
                        <option value="Liechtenstein"></option>
                        <option value="Lithuania"></option>
                        <option value="Luxembourg"></option>
                        <option value="Macau"></option>
                        <option value="Macedonia"></option>
                        <option value="Madagascar"></option>
                        <option value="Malawi"></option>
                        <option value="Malaysia"></option>
                        <option value="Maldives"></option>
                        <option value="Mali"></option>
                        <option value="Malta"></option>
                        <option value="Marshall Islands"></option>
                        <option value="Martinique"></option>
                        <option value="Mauritania"></option>
                        <option value="Mauritius"></option>
                        <option value="Mayotte"></option>
                        <option value="Mexico"></option>
                        <option value="Micronesia"></option>
                        <option value="Moldova"></option>
                        <option value="Monaco"></option>
                        <option value="Mongolia"></option>
                        <option value="Montserrat"></option>
                        <option value="Morocco"></option>
                        <option value="Mozambique"></option>
                        <option value="Myanmar"></option>
                        <option value="Namibia"></option>
                        <option value="Nauru"></option>
                        <option value="Nepal"></option>
                        <option value="Netherlands"></option>
                        <option value="Netherlands Antilles"></option>
                        <option value="New Caledonia"></option>
                        <option value="New Zealand"></option>
                        <option value="Nicaragua"></option>
                        <option value="Niger"></option>
                        <option value="Nigeria"></option>
                        <option value="Niue"></option>
                        <option value="Norfolk Island"></option>
                        <option value="Northern Mariana Islands"></option>
                        <option value="Norway"></option>
                        <option value="Oman"></option>
                        <option value="Pakistan"></option>
                        <option value="Palau"></option>
                        <option value="Panama"></option>
                        <option value="Papua New Guinea"></option>
                        <option value="Paraguay"></option>
                        <option value="Peru"></option>
                        <option value="Philippines"></option>
                        <option value="Pitcairn"></option>
                        <option value="Poland"></option>
                        <option value="Portugal"></option>
                        <option value="Puerto Rico"></option>
                        <option value="Qatar"></option>
                        <option value="Reunion"></option>
                        <option value="Romania"></option>
                        <option value="Russia"></option>
                        <option value="Rwanda"></option>
                        <option value="Saint Kitts and Nevis"></option> 
                        <option value="Saint LUCIA"></option>
                        <option value="Saint Vincent"></option>
                        <option value="Samoa"></option>
                        <option value="San Marino"></option>
                        <option value="Sao Tome and Principe"></option> 
                        <option value="Saudi Arabia"></option>
                        <option value="Senegal"></option>
                        <option value="Seychelles"></option>
                        <option value="Sierra"></option>
                        <option value="Singapore"></option>
                        <option value="Slovakia"></option>
                        <option value="Slovenia"></option>
                        <option value="Solomon Islands"></option>
                        <option value="Somalia"></option>
                        <option value="South Africa"></option>
                        <option value="South Georgia"></option>
                        <option value="Span"></option>
                        <option value="SriLanka"></option>
                        <option value="St. Helena"></option>
                        <option value="St. Pierre and Miguelon"></option>
                        <option value="Sudan"></option>
                        <option value="Suriname"></option>
                        <option value="Svalbard"></option>
                        <option value="Swaziland"></option>
                        <option value="Sweden"></option>
                        <option value="Switzerland"></option>
                        <option value="Syria"></option>
                        <option value="Taiwan"></option>
                        <option value="Tajikistan"></option>
                        <option value="Tanzania"></option>
                        <option value="Thailand"></option>
                        <option value="Togo"></option>
                        <option value="Tokelau"></option>
                        <option value="Tonga"></option>
                        <option value="Trinidad and Tobago"></option>
                        <option value="Tunisia"></option>
                        <option value="Turkey"></option>
                        <option value="Turkmenistan"></option>
                        <option value="Turks and Caicos"></option>
                        <option value="Tuvalu"></option>
                        <option value="Uganda"></option>
                        <option value="Ukraine"></option>
                        <option value="United Arab Emirates"></option>
                        <option value="United Kingdom"></option>
                        <option value="United States"></option>
                        <option value="United States Minor Outlying Islands"></option>
                        <option value="Uruguay"></option>
                        <option value="Uzbekistan"></option>
                        <option value="Vanuatu"></option>
                        <option value="Venezuela"></option>
                        <option value="Vietnam"></option>
                        <option value="Virgin Islands (British)"></option>
                        <option value="Virgin Islands (U.S)"></option>
                        <option value="Wallis and Futana Islands"></option>
                        <option value="Western Sahara"></option>
                        <option value="Yemen"></option>
                        <option value="Yugoslavia"></option>
                        <option value="Zambia"></option>
                        <option value="Zimbabwe"></option>
                      </datalist>
                         <br>
                        <!-- <label>City:</label>
                           <input type="text" class="col-sm-12 col-lg-12 col-md-12 form-control" name="city" value="<?php// echo $city; ?>">-->
                        </div>

                        <div class="col-sm-12 col-lg-4">
                         <label>Address :</label>
                          <textarea name="paddress" class="col-sm-12 col-lg-12 col-md-12 form-control" rows="4"><?php echo $address; ?></textarea>
                          <br>
                        <label>Mobile (1):</label>
                           <input type="text" class="col-sm-12 col-lg-12 col-md-12 form-control" name="mob1" value="<?php echo $mobile1; ?>"><br>
                        <label>Mobile (2):</label>
                           <input type="text" class="col-sm-12 col-lg-12 col-md-12 form-control" name="mob2" value="<?php echo $mobile2; ?>"><br>
                        <label>Email - Id:</label>
                           <input type="text" class="col-sm-12 col-lg-12 col-md-12 form-control" name="email" value="<?php echo $emailid; ?>">
                           
                           
                        </div>
            
                        
                       <div class="col-sm-12 col-lg-4">
                       <label>Intrested In:</label>
                          <select class="col-sm-12 col-lg-12 col-md-12 form-control" name="intrest">
                              <option value="<?php echo $intrestedin; ?>"><?php echo $intrestedin; ?></option>
                              <option value='Residential'>Residential</option>
                              <option value='Commercial'>Commercial</option>
                            </select><br>
                        <label>Property Description:</label>
                          <textarea name="pdescription" class="col-sm-12 col-lg-12 col-md-12 form-control" rows="4"><?php echo $propertydetails; ?></textarea>
                          <br>
                        <label>Assign to: </label>
                          <select class="col-sm-12 col-lg-12 col-md-12 form-control" name="assignedto">
                              
                              <?php
                                $result1=mysql_query("select * from usertb where uid='$assignedto'");
                                $uid1=mysql_result($result1, 0,'uid');
                                $nm1=mysql_result($result1, 0,'name');
                                echo "<option value='$uid1'>$nm1</option>";
                                echo "<option value='0'>None</option>";
                                $result=mysql_query("select * from usertb where type='1'");
                                for ($i=0; $i < mysql_num_rows($result); $i++) { 
                                  $uid=mysql_result($result, $i,'uid');
                                  $nm=mysql_result($result, $i,'name');
                                  echo "<option value='$uid'>$nm</option>";

                                }
                              ?>
                            </select>
                             
                            
                       </div>
                       
                    </div>
                    </div>
                    <div class="panel-footer">
                        <center>
                        <input type="button" id="addprbtn" class="btn btn-info" value="Update" onclick="add();">  
                        <input type="submit" id="addprbtn" class="btn btn-primary" value="Convert to Customer" >  

                       
                        </center>
                    </div>
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
function add(){  
  var data = $('#addfrm').serialize();
  //alert(data);
  $.ajax({
      // The URL for the request
      url: "editprospectquery.php",

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
      window.location.assign("prospect.php")
      //document.getElementById("addfrm").reset();
      }
  });
}

</script> 

<script type="text/javascript">
function convert(){  
  var data = $('#addfrm').serialize();
  //alert(data);
  $.ajax({
      // The URL for the request
      url: "addcustomer.php",

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
      //window.location.assign("prospect.php")
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