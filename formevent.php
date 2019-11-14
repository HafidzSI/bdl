<?php
include ('connect.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Bukittinggi Tourism</title>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNnzxae2AewMUN0Tt_fC3gN38goeLVdVE&libraries=drawing"></script>
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">    
    
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    <script src="assets/js/chart-master/Chart.js"></script>
    <script type="text/javascript" src="mapdrawmasjid.js"></script>
    <script type="text/javascript">

    var server = "https://gissurya.org/wisatasumbar/";
    </script>
    <style>

  #map{
    height: 580px;
  }
  #map-canvas {
    position:relative;
  }
  #floating-panel {
    position: absolute;
    top: 5px;
    right: 5px;
    z-index: 5;
    background-color: #fff;
    padding: 1px;
    border: 1px solid #999;
    border-radius: 3px;
  }
  #latlng{
    width: 200px;
  }
  .my-btn{
    padding:0px 6px;
    vertical-align: baseline;
  }
  </style>
  </head>
  <body >
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
                <button class="btn btn-inverse btn-default btn-sm"><a type="button" href="logout.php">Logout</a></button>               
            </div>
  <div class="top-menu">
  
  </ul>
  </div>
</header>
      <!--header end-->
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
<aside>
  <div id="sidebar"  class="nav-collapse ">
  <!-- sidebar menu start-->
    <ul class="sidebar-menu" id="nav-accordion">
      <p class="centered"><a href="profile.html"><img src="assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
        <h5 class="centered">HI, ADMIN!</h5>
        <li class="sub-menu">
          <li><a href="travel.php">MANAGE TRAVEL AGENT</a></li>
        </li>
          
        <li class="sub-menu">
          <a href="javascript:;">
            <span>MANAGE DATA</span></a>
          <ul class="sub">
            <li class="sub-menu">
              <li><a href="tempatwisata.php">TOURISM</a></li>
            </li>
          </ul>
          <ul class="sub">
            <li class="sub-menu">
              <li><a href="rumahmakan.php">RESTAURANT</a></li>
                </li>
          </ul>
          <ul class="sub">
            <li class="sub-menu">
              <li><a href="masjid.php">MOSQUE</a></li>
                </li>
              </ul>
              <ul class="sub">
                <li class="sub-menu">
                    <li><a href="industri.php">SOUVENIR</a></li>
                  </a>
                </li>
              </ul>
          </li>

          <li class="sub-menu">
            <li><a href="event.php">MANAGE EVENT</a></li>
          </li>
    </ul>
              <!-- sidebar menu end-->
  </div>
</aside>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
     
<section id="main-content">
  <section class="wrapper">
    <div class="col-lg-7 ds">
      <div class="panel panel-bd" style="width: 610px;" >
        <div class="panel-heading" style="height:45px;">
          <div class="panel-title" >
            <div style="float:left;width:75%"><h4>Tourism Map</h4></div>
              <div style="float:right;width:25%" align="right" >
              </div>
          </div>
        </div> 
                  <!--section class="wrapper"-->
      <div class="panel-body text-center" style="height:450px">
        <div id="map-canvas"  style="height:450px; width: 580px">
          <div id="map"></div>
          <div id="floating-panel">
            <button class="btn btn-default my-btn" id="delete-button" type="button" title="Remove shape"><i class="glyphicon glyphicon-trash"></i></button>
            <input id="latlng" type="text" value="" placeholder="latitude, longitude">
              <button class="btn btn-default my-btn" id="btnlatlng" type="button" title="Geocode"><i class="glyphicon glyphicon-search"></i></button>
          </div>
        </div>
      </div>
      </div>
    </div>
                  
      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->                  
  <div class="col-lg-5 ds">
    <div class="panel panel-bd " >
      <div class="panel-heading" style="height:45px;">
        <div class="panel-title">
          <h4>Detail Information</h4>
        </div>
      </div>
      <div class="panel-body" style="height:580px;">
        <div class="message_inner" style="height:560px;overflow:auto;">
          <div class="message_widgets">

            <div class="form-group row">
              <form  name = "form_input" action="simpaneventbaru.php" enctype="multipart/form-data" method="POST">
                <?php
                    $query = $conn->query("SELECT MAX(id) AS id FROM event");
                    $result = mysqli_fetch_array($query);
                    $idmax = $result['id'];
                    if ($idmax==null) {$idmax=1;}
                    else {$idmax++;}
                ?>
                 <input name="id"class="form-control hidden" type="text" value="<?php echo $idmax;?>" id="id" required>

                <label for="geom" class="col-sm-5 col-form-label">Coordinate
                <span style="color:green">*</span>
                  </label>
                    <div class="col-sm-7">
                      <input name="geom"class="form-control" type="text" value="" id="geom" readonly required>
                    </div>
            </div>

            <div class="form-group row">
              <label for="example-search-input" class="col-sm-5 col-form-label">Name 
                <span style="color:green">*</span>
              </label>
              <div class="col-sm-7">
                <input name="name" class="form-control" type="text" value="" id="name" value="" required>
              </div>
            </div>

            <div class="form-group row">
              <label for="example-email-input" class="col-sm-5 col-form-label">Address 
                <span style="color:green">*</span>
              </label>
              <div class="col-sm-7">
                <input name="address" class="form-control" type="text" value="" id="address">
              </div>
            </div>

            <div class="form-group row">
              <label for="open" class="col-sm-5 col-form-label">Date
                <span style="color:green">*</span>
              </label>
              <div class="col-sm-7">
                <input name="date" class="form-control" type="date" value="" id="date" required>
              </div>
            </div>            

            <div class="form-group row">
              <label for="open" class="col-sm-5 col-form-label">Open Hour
                <span style="color:green">*</span>
              </label>
              <div class="col-sm-7">
                <input name="open" class="form-control" type="time" value="" id="open" required>
              </div>
            </div>

            <div class="form-group row">
              <label for="close" class="col-sm-5 col-form-label">Close Hour
                <span style="color:green">*</span>
              </label>
                <div class="col-sm-7">
                  <input name="close" class="form-control" type="time" value="" id="close" required>
                </div>
            </div>

            <div class="form-group row">
              <label for="price" class="col-sm-5 col-form-label">Ticket
                <span class="required"></span>
              </label>
              <div class="col-sm-7">
                <input name="ticket"class="form-control" type="text" value="" id="ticket">
              </div>
            </div> 

            <div class="form-group">
                <label for="city"><span style="color:red">*</span>City</label>
                <select required name="city" id="kota" class="form-control" onchange="">
                  <?php
                    $sql = $conn->query("select * from city");
                    while($row1 = mysqli_fetch_array($sql)){
                      echo "<option value=\"$row1[id]\">$row1[name]</option>";}
                  ?>
                </select>
            </div>

            <div class="form-group">
                <label for="event_type"><span style="color:red">*</span>Event Type</label>
                <select required name="event_type" id="event_type" class="form-control" onchange="">
                  <?php
                    $sql = $conn->query("select * from event_type");
                    while($row1 = mysqli_fetch_array($sql)){
                      echo "<option value=\"$row1[id]\">$row1[name]</option>";}
                  ?>
                </select>
            </div>

            <div class="form-group">
                <label for="organizer"><span style="color:red">*</span>Organizer</label>
                <select required name="organizer" id="organizer" class="form-control" onchange="">
                  <?php
                    $sql = $conn->query("select * from organizer");
                    while($row1 = mysqli_fetch_array($sql)){
                      echo "<option value=\"$row1[id]\">$row1[name]</option>";}
                  ?>
                </select>
            </div>

              <!-- <div class="form-group">
                  <label for="file">Upload Foto</label>
                  <input type="file" class="" style="background:none;border:none; width:1000px; " name="image" required>
              </div> -->

            <input name="simpan" class="btn btn-default" type="submit" value="save">
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>

    <div class="panel-body text-center" style="height:450px">
      <div class="col-md-20 padding-0">
        <div class="col-md-12 padding-0">
          <div class="panel box-v1">
            <div class="panel-heading bg-white border-none">
              <div class="col-md-6 col-sm-6 col-xs-6 text-right">
              </div>
            </div>
            
          </div>
        </div>
      </div> 
    </div>
  </div>
                       <!-- USERS ONLINE SECTION -->
            
      <!--main content end-->
      <!--footer start-->
      
    <!-- js placed at the end of the document so the pages load faster -->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/jquery-1.8.3.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="assets/js/jquery.scrollTo.min.js"></script>
<script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="assets/js/jquery.sparkline.js"></script>

    <!--common script for all pages-->
<script src="assets/js/common-scripts.js"></script> 
<script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
<script type="text/javascript" src="assets/js/gritter-conf.js"></script>

    <!--script for this page-->
<script src="assets/js/sparkline-chart.js"></script>    
<script src="assets/js/zabuto_calendar.js"></script>  
<script type="application/javascript"></script>
  </body>
</html>

