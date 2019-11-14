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
  <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css">
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
        <p class="centered"><a href="indexes.php"><img src="assets/img/jalan.png" class="img-circle" width="60"></a></p>
        <h5 class="centered"><?php echo $_SESSION['username']; ?></h5>


        <li class="sub-menu">
          <a class="active" href="indexes.php">
            <i class="fa fa-hand-o-left"></i>
            <span>Back</span>
          </a>
        </li>


      </ul>
      <!-- sidebar menu end-->
    </div>
  </aside>

  <section id="main-content">
    <section class="wrapper">
      <h1>My Booking</h1>
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
                      <th> TRAVEL NAME </th>
                      <th> PACKAGE NAME </th>
                      <th> PHONE </th>
                      <th> NUMBER OF PEOPLE </th>
                      <th> TOTAL PRICE </th>
                      <th> ACTION </th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php
                    $id_package = $_SESSION['name'];
                    $username = $_SESSION['username'];


                    $querysearch = "SELECT booking.statusbooking, booking.date, travel.fullname as nama_travel, package.name as nama_paket, travel.cp,  detail_booking.id_booking as id_booking, detail_booking.total, detail_booking.totalprice , package.price
                  FROM booking 
                   LEFT JOIN detail_booking on booking.id_booking = detail_booking.id_booking
                  LEFT JOIN package on detail_booking.id_package = package.id  
                  LEFT JOIN travel on package.id_travel = travel.id 
                  left join administrator on booking.username = administrator.username where booking.username = '" . $username . "'";

                    $hasil = $conn->query($querysearch);
                    while ($baris = mysqli_fetch_array($hasil)) {
                      $id_booking = $baris['id_booking'];
                      $date = $baris['date'];
                      $travel = $baris['nama_travel'];
                      $package = $baris['nama_paket'];
                      // $username = $baris['username'];
                      // $address = $baris['address'];
                      $cp = $baris['cp'];
                      $total = $baris['total'];
                      $totalprice = $baris['totalprice'];
                      $dataarray[] = array('id_package' => $id_package, 'date' => $date, 'package' => $package, 'username' => $username, 'cp' => $cp, 'total' => $total,  'totalprice' => $totalprice);
                      ?>

                      <tr>
                        <td><?php echo "$date" ?></td>

                        <td><?php echo "$travel" ?></td>
                        <td><?php echo "$package" ?></td>

                        <!--   <td><?php echo "$address" ?></td> -->
                        <td><?php echo "$cp" ?></td>
                        <td><?php echo "$total" ?></td>
                        <td><?php echo "$totalprice" ?> </td>

                        <td>
                          <button a <?php echo "onclick= 'hapus($id_booking)'";
                                      if ($baris['statusbooking'] == "TERKIRIM") {
                                        echo "disabled";
                                      } ?> id="btndel" class="btn btn-success btn-danger tbl" title'Delete'> <i class="fa fa-trash-o"></i></a> </button>
                          <button a <?php echo "onclick='update($id_booking)'";
                                      if ($baris['statusbooking'] == "TERKIRIM") {
                                        echo "disabled";
                                      } ?> id="btnup" class="btn btn-success btn-default tbl" title='Update'><i class="fa fa-list"></i></a></button>
                          <button a <?php echo "onclick= 'send($id_booking)'";
                                      if ($baris['statusbooking'] == "TERKIRIM") {
                                        echo "disabled";
                                      } ?> id="btnsend" class="btn btn-success btn-default tbl" title='Send'><i class="fa fa-send"></i></a></button>


                        </td>
                      </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>
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
                <input type="number" name="total" id="total" onchange="hitung()" placeholder="Number of People" autocomplete="off" class="form-control placeholder-no-fix">
                <?php
                include 'connect.php';
                $query = $conn->query("SELECT MAX(id_booking) AS id_booking FROM booking");
                $result = mysqli_fetch_array($query);
                $idmax = $result['id_booking'];
                if ($idmax == null) {
                  $idmax = 1;
                } else {
                  $idmax++;
                }
                ?>
                <!-- <input name="username" id = "username" class="form-control hidden" value="">
                                   -->
                <input name="id_booking" id="id_booking" class="form-control hidden" value="<?php echo $idmax; ?>">
                <input name="id_package" id="id_package" class="form-control hidden">
                <input name="username" id="username" class="form-control hidden" value="<?php echo "$_SESSION[username]" ?>">
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
                <input type="text" id="totalprice" name="totalprice" placeholder="Total Price" autocomplete="off" class="form-control placeholder-no-fix" readonly>
              </div>
            </div>

            <div class="modal-footer">
              <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
              <button class="btn btn-theme" type="submit">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->