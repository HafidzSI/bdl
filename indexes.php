<?php 
session_start();
if(!isset($_SESSION['c'])){
  echo"<script language='JavaScript'>document.location='login.php'</script>";
    exit();
}
include("connect.php");?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=dfevice-width, initial-scale=1.0">
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
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNnzxae2AewMUN0Tt_fC3gN38goeLVdVE&sensor=true"></script>
  <link rel="stylesheet" href="assets/css/bootstrap-slider.css" type="text/css">
    <script src="assets/js/chart-master/Chart.js"></script>
    <script src="script.js"></script>


    
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
  <a href="indexes.php" class="logo"><b>BUKITTINGGI TOURISM</b></a>
  <div class="nav notify-row" id="top_menu">
    <ul class="nav top-menu"></ul>   
  </div>

  <div class="btn-group pull-right">                 
    <!-- <button class="btn btn-inverse btn-default btn-sm"><a type="button" href="logout.php">Login</a></button>     -->
    <a href="logout.php" class="logo1" title="Logout" style="margin-top: 10px"><img src="assets/img/logout.png"></a> 
    <!-- <td>
      <a href="admin/register.php" class="logo1" title="Login" style="margin-top: 10px"><img src="assets/img/register.png"></a>
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
      <p class="centered"><a href="indexes.php"><img src="assets/img/jalan.png" class="img-circle" width="60"></a></p>
        <h5 class="centered"><?php echo $_SESSION['username'];?></h5>

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
                                <!-- <option value="">-- Choose Subject </option>
                                <option value="S0051">Mangkuak</option>
                                <option value="S0001">oleh oleh khas ikan bilih</option>
                                <option value="S0052">Samek</option>
                                <option value="S0053">Sikek Kutu</option>
                                <option value="S0027">Nan Sari Gallery</option> -->
                              </select>
                                
                                <br>
                                <button type="submit" class="btn btn-default" id="carides"  value="cari" onclick="carides()"><i class="fa fa-search"></i></button>
                          </div>
                      </ul>
                  </li>

                   <li class="sub-menu">
                          <li>
                          <a href="mybooking.php" onclick="mybooking()" >
                          <i class="fa fa-book"></i>
                          <span>My Booking</span>
                      </a>
                          </li>
                    </li>

    <!--                 {    
      console.log(a);
    window.open(server+'gallery.php?id_package='+a);    
   } -->


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
      <div class="col-sm-7">
        <section class="panel">
                     <header class="panel-heading">
                          <label style="color: black">Google Map with Location List</label>
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
    background-image: url("http://localhost/paketwisatahalal/assets/img/mas.png");
    background-repeat: no-repeat;
    padding-left: 30px;
    background-size: 40%;
    background-position-y: 20%;  
  }
  .class2
  {
    background-image: url("http://localhost/paketwisatahalal/assets/img/rm.png");
    background-repeat: no-repeat;
    padding-left: 30px;
    background-size: 40%;
    background-position-y: 20%;  
  }
  .class3
  {
    background-image: url("http://localhost/paketwisatahalal/assets/img/tw.png");
    background-repeat: no-repeat;
    padding-left: 30px;
    background-size: 40%;
    background-position-y: 20%;  
  }
  .class4
  {
    background-image: url("http://localhost/paketwisatahalal/assets/img/sov.png");
    background-repeat: no-repeat;
    padding-left: 30px;
    background-size: 40%;
    background-position-y: 20%;  
  }
  .class5
  {
    background-image: url("http://localhost/paketwisatahalal/assets/img/trav.png");
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
                  
<div class="col-sm-5"  id="caritempatwisata" >
  <section class="panel">
                    <div class="panel-body">
                        <a class="btn btn-compose">Information</a>
                        <div class="box-body" style="max-height:400px;overflow:auto;">
             
                      <div class="form-group" id="hasilcari1">
                        <table class="table table-bordered" id='hasilcaritempat'>
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

<div class="col-sm-5"  id="mybooking" hidden>
  <section class="panel">
                    <div class="panel-body">
                        <a class="btn btn-compose">My Booking</a>
                        <div class="box-body" style="max-height:400px;overflow:auto;">
             
                      <div class="form-group">
                        <table class="table table-bordered" id='mybooking'>
                        </table>  
                      </div>                   
                  </div>
                    </div>
                </section>
</div>
<!-- <div class="col-sm-5"   hidden>
  <section class="panel">
                    <div class="panel-body">
                        <a class="btn btn-compose">Dashboard</a>
                        <div class="box-body" style="max-height:400px;overflow:auto;">
             
                      <div class="form-group">

                      </div>                   
                  </div>
                    </div>
                </section>
</div>
 -->
<!-- <li class="sub-menu">
                      <a class="active" href="../">
                          <i class="fa fa-hand-o-left"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
 -->





</div>  

 </section>
         
      </section>

      
      <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modalbooking" class="modal fade">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title">Booking Your Package</h4>
                          </div>

                          <form action="simpanbooking.php" method="POST" enctype="multipart/form-data">
                          <div class="modal-body">
                              <p>Fill The Field</p>
                              <div class="form-group">           
                                <div class="col-md-10 col-sm-10 col-lg-10">
                                  <input type="number" name="total" id = "total" onchange="hitung()" placeholder="Number of People" autocomplete="off" class="form-control placeholder-no-fix">

                                   <?php
                                include 'connect.php';
                                  $query = $conn->query("SELECT MAX(id_booking) AS id_booking FROM booking");
                                  $result = mysqli_fetch_array($query);
                                  $idmax = $result['id_booking'];
                                  if ($idmax==null) {$idmax=1;}
                                  else {$idmax++;}
                              ?>



                                  <input name="id_booking" id = "id_booking" class="form-control hidden" value="<?php echo $idmax;?>">
                                  <input name="id_package" id = "id_package" class="form-control hidden">
                                  <input name="username" id = "username" class="form-control hidden" value="<?php echo "$_SESSION[username]" ?>">
                                </div>
                              </div>
                              <br>

                             <div class="form-group">  
                                <div class="col-md-10 col-sm-10 col-lg-10">
                                  <input type="date" name="date" id="date" placeholder="Date" autocomplete="off" class="form-control placeholder-no-fix">
                                </div>
                              </div>
                              <br>

                              <div class="form-group"> 
                                <div class="col-md-10 col-sm-10 col-lg-10">
                                  <input type="text" id="totalprice" name="totalprice" placeholder="Total Price"  autocomplete="off" class="form-control placeholder-no-fix" readonly>
                                </div>
                              </div>

                              <div class="modal-footer">
                                  <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                                  <button class="btn btn-theme" type="submit">Submit</button>
                                  <!-- <button type="button" class="btn btn-default" data-dismiss="modal" onclick="Up3()">Save</button> -->
                              </div>
                          </div>
                        </form>
      </div>
</div>
</div>


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

