<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Bukittinggi Tourism</title>
    
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link href="assets/js/fancybox/jquery.fancybox.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">    
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-timepicker/compiled/timepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datetimepicker/datertimepicker.html" />
       <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNnzxae2AewMUN0Tt_fC3gN38goeLVdVE"></script>
  <link rel="stylesheet" href="assets/css/bootstrap-slider.css" type="text/css">
    <script src="assets/js/chart-master/Chart.js"></script>
    <script src="script.js"></script>

        <!-- Custom styles for this template -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/style-responsive.css" rel="stylesheet">
 <!--    // <script src="../assets/js/chart-master/Chart.js"></script>
    // <script type="text/javascript" src="mapdraws.js"></script>
    // <script type="text/javascript" src="mapdrawrms.js"></script>
    // <script type="text/javascript" src="mapdrawindustris.js"></script>
    // <script type="text/javascript" src="mapdrawmasjids.js"></script>
    // <script type="text/javascript" src="mapdrawtravels.js"></script> -->
    


   
    </script>
  </head>
  
  <body onload="init();hapusmarker()">
  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
<header class="header black-bg">
  <div class="sidebar-toggle-box">
    <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
  </div>
  <a href="index.html" class="logo"><b>BUKITTINGGI TOURISM</b></a>
  <div class="nav notify-row" id="top_menu">
    <ul class="nav top-menu"></ul>   
  </div>

  <div class="btn-group pull-right">                 
    <!-- <button class="btn btn-inverse btn-default btn-sm"><a type="button" href="logout.php">Login</a></button>     -->
    <a href="login.php" class="logo1" title="Login" style="margin-top: 10px"><img src="assets/img/login.png"></a> 
    <!-- <td>
      <a href="register.php" class="logo1" title="Registration" style="margin-top: 10px"><img src="assets/img/register.png"></a>
    </td> -->
  </div> 
  <div class="top-menu">
  
  </ul>
  </div>
</header>

<aside>
  <div id="sidebar"  class="nav-collapse ">
  <!-- sidebar menu start-->
    <ul class="sidebar-menu" id="nav-accordion">
      <p class="centered"><a href="index3.php"><img src="assets/img/jalan.png" class="img-circle" width="60"></a></p>
        <h5 class="centered">TRAVEL AGENT</h5>

       <li class="sub-menu">
          <li><a href="index3.php">Create Package</a></li>
        </li>
        <li class="sub-menu">
          <li><a href="paket.php">My Package</a></li>
        </li>
        <li class="sub-menu">
          <li><a href="booking.php">Booking</a></li>
        </li>
        <li class="sub-menu">
          <li><a href="detailtravel.php">Travel Agent Information</a></li>
        </li>
        <!-- <li class="sub-menu">
          <li><a href="changepassword.php">Change Password</a></li>
        </li>  -->
    </ul>
              <!-- sidebar menu end-->
  </div>
</aside>

<section id="main-content">
  <section class="wrapper">
     <!--  <h1>TRAVEL AGENT INFORMATION</h1> -->
      <div class="row">
        <div class="col-xs-12">
        <div class="box">
        <div class="box-header clearfix">


<div class="box-body">
          <!-- <table id="" class="table table-hover table-bordered table-striped"> -->

<div class="col-sm-6"> <!-- menampilkan peta-->
  <section class="panel">
      <header class="panel-heading">
          <h3>                    
          <input id="latlng" type="text" class="form-control" style="width:200px" value="" placeholder="Latitude, Longitude">
          <button class="btn btn-default my-btn" id="btnlatlng" type="button" title="Geocode"><i class="fa fa-search"></i></button>
          <button class="btn btn-default my-btn" id="delete-button" type="button" title="Remove shape"><i class="fa fa-trash"></i></button> </h3>
      </header>
      <div class="panel-body">
          <div id="map" style="width:100%;height:420px; z-index:50"></div>
      </div>
  </section>
</div>

<div class="col-lg-6 ds">
  <div class="panel panel-bd " >
      <div class="panel-heading" style="height:45px;">
        <div class="panel-title">
          <h4>Update Travel's Information</h4>
        </div>
      </div>
      <div class="panel-body" style="height:580px;">
        <div class="message_inner" style="height:560px;overflow:auto;">
          <div class="message_widgets">
          <!--  <div class="form-group row"> -->
           <form role="form" method="post" action="saveupdatetravel.php" enctype="multipart/form-data">
            <?php 
            include 'connect.php';
            if (isset($_POST['id']))
              {
                $id=$_POST['id'];
                $sql = $conn->query("SELECT 
                  travel.id, 
                  travel.name,  
                  travel.cp, 
                  ST_AsText(geom) as geom, 
                  travel.address, 
                  travel.website, 
                  travel.open, 
                  travel.close, 
                  travel.description, 
                  travel.email, 
                  travel.fullname
                
                  FROM travel where travel.id='$id'" );
                $sql2 = $conn->query("SELECT password FROM administrator where travel_id='$id'");

                while ($data =  mysqli_fetch_array($sql) )
                {

              ?>
              <!-- </div> -->

            <input type="text" class="form-control hidden" id="id" name="id" value="<?php echo $id ?>">
            <div class="form-group">
              <label for="geom">Coordinat</label>
              <textarea class="form-control" id="geom" name="geom" readonly required><?php echo $data['geom'] ?></textarea>
            </div>
            <div class="form-group row">
             
                <input name="id"class="form-control hidden" type="text" value="<?php echo $id?>" id="id">
            </div>

            <div class="form-group">
              <label for="nama">Name</label>
              <input type="text" class="form-control" name="name" value="<?php echo $data['name'] ?>">
            </div>
            <div class="form-group">
              <label for="nama">Travel Agent Name</label>
              <input type="text" class="form-control" name="fullname" value="<?php echo $data['fullname'] ?>">
            </div>
            <div class="form-group">
              <label for="nama">Contact Person</label>
              <input type="text" class="form-control" name="cp" value="<?php echo $data['cp'] ?>">
            </div>
            <div class="form-group">
              <label for="address">Alamat</label>
              <input type="text" class="form-control" name="address" value="<?php echo $data['address'] ?>">
            </div>
            <div class="form-group">
              <label for="website">Website</label>
              <input type="text" class="form-control" name="website" value="<?php echo $data['website'] ?>">
            </div>
            <div class="form-group">
              <label for="email">E-mail</label>
              <input type="text" class="form-control" name="email" value="<?php echo $data['email'] ?>">
            </div>
            <div class="form-group">
              <label for="open">Open Hour</label>
              <input type="time" class="form-control" name="open" value="<?php echo $data['open'] ?>">
            </div>
            <div class="form-group">
              <label for="close">Close Hour</label>
              <input type="time" class="form-control" name="close" value="<?php echo $data['close'] ?>">
            </div>
            <div class="form-group">
              <label for="description">Description</label>
              <input type="text" class="form-control" name="description" value="<?php echo $data['description'] ?>">
            </div>
            <?php 
          }
              while ($data2=mysqli_fetch_array($sql2)) {
                
              


             ?>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="text" class="form-control" name="password" value="<?php echo $data2['password'] ?>">
            </div>
<?php
            }

              }
              ?>
           <button type="submit" class="btn btn-primary pull-center">Save <i class="fa fa-floppy-o"></i></button> 
           <script src="inc/mapdrawtravel.js" type="text/javascript"></script>

            </div>
          </div>
        </div>
      </div>
    </div>


  
    