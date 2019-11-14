<?php
session_start();
if (!isset($_SESSION['c'])) {
  echo "<script language='JavaScript'>document.location='login.php'</script>";
  exit();
}
include("connect.php"); ?>

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
  <script src="assets/js/jquery-1.8.3.min.js"></script>
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/style-responsive.css" rel="stylesheet">
  <script src="assets/js/chart-master/Chart.js"></script>
  <script src="script.js"></script>
  <script type="text/javascript">
    var server = "https://gissurya.org/wisatasumbar/";
  </script>
</head>
<section id="container">


  <header class="header black-bg">
    <div class="sidebar-toggle-box">
      <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
    </div>
    <a class="logo"><b>BUKITTINGGI TOURISM</b></a>
  </header>
  <aside>
    <div id="sidebar" class="nav-collapse ">
      <ul class="sidebar-menu" id="nav-accordion">
        <h5 class="centered">WELCOME</h5>
        <p class="centered"><a href="#"><img src="assets/img/jalan.png" class="img-circle" width="60" height="60"></a></p>
        <h5 class="centered"><?php echo $_SESSION['username']; ?></h5>
        <li class="sub-menu">
          <a href="mybooking.php">
            <i class="fa fa-a rrow-left"></i>
            <span>Back</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>

  <section id="main-content">
    <section class="wrapper">
      <h1>Update Your Booking</h1>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header clearfix">

              <div class="panel-body" style="height:580px;">
                <div class="message_inner" style="height:560px;overflow:auto;">
                  <div class="message_widgets">
                    <?php
                    include 'connect.php';
                    if (isset($_GET['id_booking'])) {
                      $id_booking = $_GET['id_booking'];
                      $sql = $conn->query("SELECT booking.date, package.price, booking.id_booking, detail_booking.total, detail_booking.totalprice FROM booking 
                    LEFT JOIN detail_booking on booking.id_booking = detail_booking.id_booking  
                    LEFT JOIN package on detail_booking.id_package = package.id where booking.id_booking = '" . $id_booking . "'");



                      $data =  mysqli_fetch_array($sql);
                    }


                    ?>


                    <form action="simpanupdatebooking.php" method="POST" enctype="multipart/form-data">
                      <div class="modal-body">
                        <div class="form-group">
                          <div class="col-md-10 col-sm-10 col-lg-10">
                            <p>Number Of People :</p>
                            <input type="number" name="total" id="total" value="<?php echo $data['total'] ?>" onchange="hitungupdate()" placeholder="Number of People" autocomplete="off" class="form-control placeholder-no-fix">

                            <!-- <input type="text" class="form-control hidden" id="id_booking" name="id_booking" value="<?php echo $id_booking ?>">
                                   -->


                            <input name="no_urut" id="no_urut" class="form-control hidden" value="">
                            <input name="id_booking" id="id_booking" class="form-control hidden" value="<?php echo $id_booking; ?>">
                            <input name="id_package" id="id_package" class="form-control hidden">
                            <input name="user_id" id="user_id" class="form-control hidden" value="<?php echo "$_SESSION[username]" ?>">
                          </div>
                        </div>
                        <br>
                        <input name="no_urut" id="no_urut" class="form-control hidden" value="">


                        <div hidden class="form-group">
                          <div class="col-md-10 col-sm-10 col-lg-10">
                            <p>Price :</p>
                            <input type="text" name="price" id="price" placeholder="Price" value="<?php echo $data['price'] ?>" autocomplete="off" class="form-control placeholder-no-fix">
                          </div>
                        </div>
                        <br>


                        <div class="form-group">
                          <div class="col-md-10 col-sm-10 col-lg-10">
                            <p>Date :</p>
                            <input type="date" name="date" id="date" placeholder="Date" value="<?php echo $data['date'] ?>" autocomplete="off" class="form-control placeholder-no-fix">
                          </div>
                        </div>
                        <br>

                        <div class="form-group">
                          <div class="col-md-10 col-sm-10 col-lg-10">
                            <p>Total Price :</p>
                            <input type="text" id="totalprice" name="totalprice" placeholder="Total Price" value="<?php echo $data['totalprice'] ?>" autocomplete="off" class="form-control placeholder-no-fix" readonly>
                          </div>
                        </div>

                        <div class="modal-footer">
                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                          <button class="btn btn-theme" type="submit">Update</button>
                        </div>
                      </div>
                    </form>