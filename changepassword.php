<?php 
session_start();
if(!isset($_SESSION['b'])){
  echo"<script language='JavaScript'>document.location='login.php'</script>";
    exit();
}
include("connect.php");?>

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
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">    
    
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    <script src="assets/js/chart-master/Chart.js"></script>
    <script type="text/javascript">

    var server = "https://gissurya.org/wisatasumbar/";
    </script>
  </head>
  <section id="container" >

<header class="header black-bg">
  <div class="sidebar-toggle-box">
    <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
  </div>
  <a href="index.html" class="logo"><b>BUKITTINGGI TOURISM</b></a>
  <div class="nav notify-row" id="top_menu">
    <ul class="nav top-menu"></ul>   
  </div>

  <div class="btn-group pull-right">                 
                <!--   <button class="btn btn-inverse btn-default btn-sm"> -->
              <a  href="logout.php" class="logo1" title="Logout" style="margin-top: 10px"><img src="assets/img/login.png"></a></button>               
            </div> 

  <div class="top-menu">
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
          <li><a href="infoagen.php">Travel Agent Information</a></li>
        </li>
        <li class="sub-menu">
          <li><a href="changepassword.php">Change Password</a></li>
        </li> 
    </ul>
              <!-- sidebar menu end-->
  </div>
</aside>

<section id="main-content">
  <section class="wrapper">
      <h1>CHANGE PASSWORD</h1>
      <div class="row">
        <div class="col-xs-12">
        <div class="box">
        <div class="box-header clearfix">


<div class="box-body">
          <!-- <table id="" class="table table-hover table-bordered table-striped"> -->
 <form role="form" method="post" action="savepwagen.php" enctype="multipart/form-data">
<?php

$id = $_SESSION['travel_id'];
$query = "SELECT password FROM administrator where travel_id='$id'";

$hasil=$conn->query($query);
while($row = mysqli_fetch_array($hasil)){
  $id=$row['travel_id'];
  
  $password=$row['password'];
}
?>
   <div class="col-sm-6"> 
                  <section class="panel">
  <table class="detgal">
  <tbody>
          <div class="form-group">
              <label for="password">Input New Password</label>
              <input type="text" class="form-control" name="password" value="<?php echo $password ?>">
            </div>         
          </tbody>
          
        </table>
        </form>
        <div class="btn-group">
            <a href="savepwagen.php" class="btn btn-default"><i class="fa fa-edit"></i>&nbsp Save</a>
        </div>
                      </div>

</section>
  </div>
</section>
</section>