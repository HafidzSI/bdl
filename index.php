<?php
include("connect.php");
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
      <!--header end-->
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
<aside>
  <div id="sidebar"  class="nav-collapse ">
  <!-- sidebar menu start-->
    <ul class="sidebar-menu" id="nav-accordion">
      <p class="centered"><a href="index.php"><img src="assets/img/jalan.png" class="img-circle" width="60"></a></p>
        <h5 class="centered">VISITOR</h5>

        <li class="treeview">
            
                  
                  <li class="sub-menu">
                      <a href="javascript:;" id="showall" onclick="tampilsemua()">
                        <i class="fa fa-list"></i>
                          <span>Travel Agent List</span>
                      </a>
                  </li> 

                  <li class="sub-menu">
                      <a href="javascript:;" id="showall" onclick="tampilsemuapaket()">
                        <i class="fa fa-list"></i>
                          <span>Travel Package List</span>
                      </a>
                  </li> 

                 <li class="sub-menu">
                      <a href="#">
                        <i class="fa fa-search"></i>
                          <span>Search by Name</span>
                      </a>
                      <ul class="sub">
                        <input type="text" class="form-control" placeholder="Name" id="nama_paket">
                        <span class="input-group-btn">
                          <br>
                        <button type="button" class="btn btn-default" value="caripaket" onclick="caripaket();"><i class="fa fa-search"></i></button>
                      </ul>
                  </li> 

                  <li class="sub-menu">
                      <a href="#">
                        <i class="fa fa-industry"></i>
                          <span>Search by Travel Agent</span>
                      </a>
                      <ul class="sub">
                        <input type="text" class="form-control" placeholder="Travel" id="name_travel">
                        <span class="input-group-btn">
                          <br>
                        <button type="submit" class="btn btn-default" id="caritravel"  value="caritravel" onclick="caritravel();"><i class="fa fa-search"></i></button>
                         </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" onclick="reset()" >
                          <i class="fa fa-map-signs"></i>
                          <span>Search by Destination</span>
                      </a>
                      <ul class="sub">
                         <div  class="panel-body" >
                            <select class="form-control" id="city" onchange="cariobjek()">
                                <?php
                              $sql = $conn->query("select * from city");
                              while($row1 = mysqli_fetch_array($sql)){
                                echo "<option value=\"$row1[id]\">$row1[name]</option>";}
                            ?>
                                </select>
                                <br><br>
                                <select class="form-control select2" style="width: 100%;" id="objek" onchange="cariobjek()">
                                <option value="0">-- Choose Object --</option>
                                <option value="1">Souvenir</option>
                                <option value="2">Mosque</option>
                                <option value="3">Restaurant</option>
                                <option value="4">Tourism</option>
                              </select>
                              <br>
                              <br>
                                <select class="form-control select2" style="width: 100%;" id="cariobjek" >
                                <option value="">-- Choose Subject </option>
                                <option value="S0051">Mangkuak</option>
                                <option value="S0001">oleh oleh khas ikan bilih</option>
                                <option value="S0052">Samek</option>
                                <option value="S0053">Sikek Kutu</option>
                                <option value="S0027">Nan Sari Gallery</option> 
                                </select>
                              <br>
                              <br>
                              <input type="number" name="harga" id="harga">
                              <br>
                                <button type="submit" class="btn btn-default" id="carides"  value="cari" onclick="carides()"><i class="fa fa-search"></i></button>
                          </div>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="#">
                        <i class="fa fa-industry"></i>
                          <span>Paket berdasarkan kategori</span>
                      </a>
                      <ul class="sub">
                      <input type="checkbox" class="form-check-input" name="masjid" id="masjid" value="checkedValue" >
                      Masjid
                      <input type="checkbox" class="form-check-input" name="rm" id="rm" value="checkedValue" >
                      Rumah makan
                      <input type="checkbox" class="form-check-input" name="tm" id="tm" value="checkedValue" >
                      Tempat wisata
                      <input type="checkbox" class="form-check-input" name="souvenir" id="souvenir" value="checkedValue" >
                      Souvenir
                        <span class="input-group-btn">
                          <br>
                        <button type="submit" class="btn btn-default" id="caritravel"  value="caritravel" onclick="caritravel();"><i class="fa fa-search"></i></button>
                         </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="#">
                        <i class="fa fa-search"></i>
                          <span>Search by time</span>
                      </a>
                      <ul class="sub">
                        <input type="text" class="form-control" placeholder="Name" id="nama_paket">
                        <span class="input-group-btn">
                          <br>
                        <button type="button" class="btn btn-default" value="caripaket" onclick=""><i class="fa fa-search"></i></button>
                      </ul>
                  </li> 

                  <li class="sub-menu">
                      <a class="" href="../">
                          <i class="fa fa-hand-o-left"></i>
                          <span>Dashboard</span>
                      </a>
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
  <section class="wrapper site-min-height">
    <div class="row mt">
    <!-- <div class="panel-body text-center" style="height:450px"> -->
      <div class="col-lg-8 ds">
        <section class="panel">
                      <header class="panel-heading">
                          <label style="color: black">Google Map with Location List:</label>
                   <button type="button" onclick="posisisekarang()" class="btn btn-default " data-toggle="tooltip" id="posisinow" title="Posisi Saya" 
                    style="margin: 15px" style="margin-right: 7px;" ><i class="fa fa-location-arrow" > </i>
                      </button>

                       <button type="button" onclick="lokasimanual()" class="btn btn-default"  data-toggle="tooltip" id="posmanual" title="Posisi Manual" 
                              style="margin-right: 7px;"><i class="fa fa-map-marker" ></i>
                      </button>

                      <label id="tombol">
                       <a type="button" onclick="legenda()" id="showlegenda" class="btn btn-default" data-toggle="tooltip" title="Legenda" style="margin-right: 7px;"><i class="fa fa-eye"></i>
                       </a>
                       </label>
                      <!--  <label id="seeall">
                     <a type="button" id="showall" onclick="tampilsemua()" class="btn btn-default btn-sm " data-toggle="tooltip"  
                      style="margin-right: 7px;"><i class="fa fa-database" style="color:black;"> </i></a> -->
                      </label>
                     </header>
                     
                      <div class="panel-body">
                          <div id="map" style="width:100%;height:400px; z-index:50"></div>
                      </div>

                 </section>
     </div>

     <style type="text/css">
  #legend
  {
    background: grey;
    padding: 10px;
    padding-right: 120px;
    margin: 5px;
    font-size: 12px;
    font-family: Arial, sans-serif;
   
  }
  .color
  {
    border: 0.2px solid;
    border-color: white;
    height: 7px;
    width: 10px;
    margin-right: 1px;
    float-left;
  }
  .color1
  {
    height: 18px;
    width: 15px;
    margin-right: 5px;
    float-left;
  }
  .class1
  {
    background-image: url("https:///assets/img/mas.png");
    background-repeat: no-repeat;
    padding-left: 30px;
    background-size: 40%;
    background-position-y: 20%;  
  }
  .class2
  {
    background-image: url("localhost/assets/assets/img/rm.png");
    background-repeat: no-repeat;
    padding-left: 30px;
    background-size: 40%;
    background-position-y: 20%;  
  }
  .class3
  {
    background-image: url("localhost/assets/assets/img/tw.png");
    background-repeat: no-repeat;
    padding-left: 30px;
    background-size: 40%;
    background-position-y: 20%;  
  }
  .class4
  {
    background-image: url("localhost/assets/assets/img/sov.png");
    background-repeat: no-repeat;
    padding-left: 30px;
    background-size: 40%;
    background-position-y: 20%;  
  }
  .class5
  {
    background-image: url("localhost/assets/assets/img/trav.png");
    background-repeat: no-repeat;
    padding-left: 30px;
    background-size: 40%;
    background-position-y: 20%;  
  }
  .a
  {
   padding-left: 30px;
    background-size: 40%;
    background-position-y: 20%;
    background: blue;
  }
  .b
  {
    padding-left: 30px;
    background-size: 40%;
    background-position-y: 20%;
    background: #00ff7f;
  }
  .c
  {
   padding-left: 30px;
    background-size: 40%;
    background-position-y: 20%;
    background: #800000;
  }
  .d
  {
   padding-left: 30px;
    background-size: 40%;
    background-position-y: 20%;
    background: #20b2aa;
  }
  .e
  {
   padding-left: 30px;
    background-size: 40%;
    background-position-y: 20%;
    background: #ffff66;
  }
  .f
  {
   padding-left: 30px;
    background-size: 40%;
    background-position-y: 20%;
    background: #ff0000;
  }
  .g
  {
   padding-left: 30px;
    background-size: 40%;
    background-position-y: 20%;
    background: #B8860B;
  }
  .h
  {
   padding-left: 30px;
    background-size: 40%;
    background-position-y: 20%;
    background: #ADD8E6;
  }
  .i
  {
   padding-left: 30px;
    background-size: 40%;
    background-position-y: 20%;
    background: #FF69B4;
  }
  .j
  {
   padding-left: 30px;
    background-size: 40%;
    background-position-y: 20%;
    background: #008000;
  }
  .k
  {
   padding-left: 30px;
    background-size: 40%;
    background-position-y: 20%;
    background: #663399;
  }
  .l
  {
   padding-left: 30px;
    background-size: 40%;
    background-position-y: 20%;
    background: #8B008B;
  }
  .m
  {
   padding-left: 30px;
    background-size: 40%;
    background-position-y: 20%;
    background: #FFD700;
  }
  
</style> 
               
                  
<div class="col-lg-4 ds"  id="caritempatwisata" >
  <section class="panel">
                    <div class="panel-body">
                        <a class="btn btn-compose">Information</a>
                        <div class="box-body" style="max-height:450px;overflow:auto;">
             
                            <div class="form-group" id="hasilcari1">
                              <table class="table table-bordered" id='hasilcaritempat'>
                              </table>  
                            </div>                   
                        </div>
                    </div>
                </section>
</div>

<div class="col-sm-5"  id="caritrav" hidden>
  <section class="panel">
                    <div class="panel-body">
                        <a class="btn btn-compose">Result of Travel</a>
                        <div class="box-body" style="max-height:400px;overflow:auto;">
             
                      <div class="form-group">
                        <table class="table table-bordered" id='hasilcaritrav'>
                        </table>  
                      </div>                   
                  </div>
                    </div>
                </section>
</div>

<div class="col-sm-5"  id="carides2" hidden>
  <section class="panel">
                    <div class="panel-body">
                        <a class="btn btn-compose">Result of Package</a>
                        <div class="box-body" style="max-height:400px;overflow:auto;">
             
                      <div class="form-group" id="hasilcarides1">
                        <table class="table table-bordered" id='hasilcarides'>
                        </table>  
                      </div>                   
                  </div>
                    </div>
                </section>
</div>



</div>  

 </section>
         
      </section>

<script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-1.8.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
  <script src="assets/js/fancybox/jquery.fancybox.js"></script>    
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/jquery.sparkline.js"></script>
    <script src="script.js" type="text/javascript"></script>
    <script src="assets/js/common-scripts.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap-slider.js"></script>
    
    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap-daterangepicker/date.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>
  
  <script type="text/javascript" src="assets/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap-daterangepicker/moment.min.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
  <script src="assets/js/advanced-form-components.js"></script>
  
  </body>
</html>

