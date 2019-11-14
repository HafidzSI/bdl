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
    var server = "http://localhost/wisatasumbar/";
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
        </li> -->
      </ul>
      <!-- sidebar menu end-->
    </div>
  </aside>

  <section id="main-content">
    <section class="wrapper">
      <h1>Your Booking</h1>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header clearfix">


              <div class="box-body">
                <!-- <table id="" class="table table-hover table-bordered table-striped"> -->
                <table id="dataTableExample2" class="table table-hover table-bordered table-striped">
                  <thead>
                    <tr>
                      <th> DATE </th>
                      <th> PACKAGE NAME </th>
                      <th> NAME </th>
                      <!-- // <th> ADDRESS </th> -->
                      <th> PHONE </th>
                      <th> NUMBER OF PEOPLE </th>
                      <th> TOTAL PRICE </th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php
                    $id_package = $_SESSION['travel_id'];
                    $username = $_SESSION['username'];
                    $travel_id = $_SESSION['travel_id'];
                    // $querysearch = "SELECT 
                    // booking.date, 
                    // booking.username, 
                    // package.name,
                    // administrator.address,
                    // administrator.cp, 
                    // detail_booking.total, 
                    // detail_booking.totalprice 
                    // FROM detail_booking 
                    // LEFT JOIN booking on detail_booking.totalprice
                    // LEFT JOIN package on booking.id_package = package.id  
                    // LEFT JOIN travel on package.id_travel = travel.id 
                    // left join administrator on booking.username = administrator.username where package.id_travel = '".$username."'";

                    $querysearch = "SELECT 
                    detail_booking.total, 
                    
                    detail_booking.totalprice,
                    detail_booking.id_package,
                    booking.username,
                    booking.id_booking,
                    booking.date,
                    package.id,
                    package.id_travel, 
                    package.name as  nama_paket, 
                    travel.name,
                    -- travel.address,
                    -- administrator.username,
                    administrator.cp  ,
                    administrator.address

                               
                    FROM detail_booking 
                    LEFT JOIN package on detail_booking.id_package = package.id 
                    LEFT JOIN travel on package.id_travel = travel.id 
                    right join administrator on travel.name = administrator.username
                     LEFT join booking on detail_booking.id_booking=booking.id_booking
                     where administrator.travel_id = '" . $travel_id . "'";

                    $hasil = $conn->query($querysearch);
                    while ($baris = mysqli_fetch_array($hasil)) {
                      // $id_package = $baris['id_package'];
                      // $date = $baris['date'];
                      // $package = $baris['name'];
                      // $username = $baris['username'];
                      // $address = $baris['address'];
                      // $cp = $baris['cp'];
                      // $total = $baris['total'];
                      // $totalprice = $baris['totalprice'];
                      // $dataarray[]=array('id_package'=>$id_package,'date'=>$date, 'package'=>$package, 'username'=>$username, 'cp'=>$cp, 'address'=>$address, 'total'=>$total,  'totalprice'=>$totalprice );

                      $id_booking = $baris['id_booking'];
                      $id_package = $baris['id_package'];
                      $date = $baris['date'];
                      $address = $baris['address'];
                      $username = $baris['username'];

                      $package = $baris['nama_paket'];
                      $cp = $baris['cp'];
                      $total = $baris['total'];


                      $totalprice = $baris['totalprice'];
                      $dataarray[] = array(
                        'id_package' => $id_package,
                        'date' => $date,
                        //  'name'=>$travel,

                        'package' => $package,
                        'username' => $username,
                        'cp' => $cp,

                        'address' => $address,
                        'total' => $total,

                        'id_booking' => $id_booking,
                        'totalprice' => $totalprice
                      );
                      ?>

                      <tr>
                        <td><?php echo '29-10-2019' ?></td>
                        <td><?php echo 'bersahaja' ?></td>
                        <td><?php echo "user01" ?></td>
                        <td><?php echo "083180533410" ?></td>
                        <td><?php echo "3" ?></td>
                        <td><?php echo "3000000" ?>
                      </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>
    </section>
  </section>