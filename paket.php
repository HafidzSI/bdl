<?php
session_start();
if (!isset($_SESSION['b'])) {
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
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/style-responsive.css" rel="stylesheet">
  <script src="assets/js/chart-master/Chart.js"></script>
  <script type="text/javascript">
    var server = "https://gissurya.org/wisatasumbar/";
  </script>
</head>
<section id="container">

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
      <a href="logout.php" class="logo1" title="Logout" style="margin-top: 10px"><img src="assets/img/login.png"></a></button>
    </div>

    <div class="top-menu">
    </div>
  </header>

  <aside>
    <div id="sidebar" class="nav-collapse ">
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
      <h1>Manage Your Data</h1>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header clearfix">


              <div class="box-body">
                <!-- <table id="" class="table table-hover table-bordered table-striped"> -->
                <table id="dataTableExample2" class="table table-hover table-bordered table-striped">
                  <thead>
                    <tr>
                      <th> ID </th>
                      <th> NAME </th>
                      <th> PRICE </th>
                      <th> ACTION </th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php

                    $id_travel = $_SESSION['travel_id'];

                    $querysearch = "SELECT package.id, package.id_travel, package.name, package.price FROM package where id_travel = '" . $id_travel . "'";
                    $hasil = $conn->query($querysearch);
                    while ($baris = mysqli_fetch_array($hasil)) {
                      $id = $baris['id'];
                      $name = $baris['name'];
                      $price = $baris['price'];
                      $dataarray[] = array('id' => $id, 'name' => $name, 'price' => $price);
                      ?>

                      <tr>
                        <td><?php echo "$id" ?></td>
                        <td><?php echo "$name" ?></td>
                        <td><?php echo "$price" ?></td>
                        <td><?php echo "" ?>
                          <!-- <a href="formuploadtw.php?id=<?php echo $id ?>" class="btn btn-success"> UPLOAD </a> -->
                          <a href="detailpaket.php?id=<?php echo $id ?>" class="btn btn-sm btn-default" title='Detail'><i class="fa fa-list"></i> Detail</a>
                          <a href="hapuspaket.php?id=<?php echo $id; ?>" onclick="return confirm ('delete?')" class="btn btn-sm btn-default" title='Delete'><i class="fa fa-trash-o"></i></a>
                      </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>
    </section>
  </section>